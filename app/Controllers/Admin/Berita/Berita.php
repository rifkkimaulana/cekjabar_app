<?php

namespace App\Controllers\Admin\Berita;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

use App\Controllers\Admin\BaseController;
use App\Models\PengunjungModel;
use App\Models\TagModel;

class Berita extends BaseController
{
    public function index()
    {
        $artikelModel = new BeritaModel();
        $tagModel = new TagModel();
        $kategoriModel = new KategoriModel();
        $usersModel = new UserModel();

        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        if (session('hak_akses') === 'administrator') {
            $beritaData = $artikelModel->orderBy('created_at', 'desc')->findAll();
        } else {
            $beritaData = $artikelModel->orderBy('created_at', 'desc')->where('user_id', session('user_id'))->findAll();
        }

        $tagMap = [];
        foreach ($tagModel->findAll() as $tag) {
            $tagMap[$tag['id']] = $tag;
        }

        $kategoriMap = [];
        foreach ($kategoriModel->findAll() as $kt) {
            $kategoriMap[$kt['id']] = $kt;
        }

        $userMap = [];
        foreach ($usersModel->findAll() as $user) {
            $userMap[$user['id']] = $user;
        }

        $data = [
            'title' => 'Cek Jabar Berita',
            'user' => $this->user,
            'beritaData' => $beritaData,
            'kategoriMap' => $kategoriMap,
            'userMap' => $userMap,
            'tagMap' => $tagMap
        ];

        return view('Admin/Pages/Berita/Berita', $data);
    }

    public function tambah_view()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $tagModel = new TagModel();
        $kategoriData = new KategoriModel();

        $data = [
            'title' => 'New Post Artikel',
            'user' => $this->user,
            'tagData' => $tagModel->findAll(),
            'kategoriData' => $kategoriData->findAll()
        ];

        return view('Admin/Pages/Berita/Tambah-Berita', $data);
    }

    public function tambah()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $beritaModel = new BeritaModel();

        $kategoriIds = $this->request->getPost('kategori_ids');
        $kategoriIdString = is_array($kategoriIds) ? implode(',', $kategoriIds) : '0';

        $tagIds = $this->request->getPost('tag_ids');
        $tagIdString = is_array($tagIds) ? implode(',', $tagIds) : '0';

        $judul = $this->request->getPost('judul');

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $judul);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $data = [
            'judul' => $judul,
            'isi' =>  $this->request->getPost('isi'),
            'kategori_ids' => $kategoriIdString,
            'tag_ids' => $tagIdString,
            'status' => $this->request->getPost('status'),
            'slug' => $slug,
            'user_id' => session('user_id')
        ];

        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $namaUnik = $gambar->getRandomName();
            $gambar->move(FCPATH . 'assets/image/berita/', $namaUnik);

            $data['gambar'] = $namaUnik;
        }

        $beritaModel->insertData($data);

        return redirect()->to(base_url('berita/list'))->with('success', 'Berita berhasil ditambahkan.');
    }

    public function ubah_view($id)
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $beritaModel = new BeritaModel();

        $berita = $beritaModel->where('id', $id)->first();
        $user_id = $berita['user_id'];

        if (session('user_id') !== $user_id && session('hak_akses') !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $tagModel = new TagModel();
        $kategoriData = new KategoriModel();

        $data = [
            'title' => 'Perbaharui Informasi Berita:' . $berita['judul'],
            'user' => $this->user,
            'tagData' => $tagModel->findAll(),
            'kategoriData' => $kategoriData->findAll(),
            'berita' => $beritaModel->find($id)
        ];

        return view('Admin/Pages/Berita/Ubah-Berita', $data);
    }

    public function ubah()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $beritaModel = new BeritaModel();

        $id = $this->request->getPost('id');

        $berita = $beritaModel->where('id', $id)->first();
        $user_id = $berita['user_id'];
        if (session('user_id') !== $user_id && session('hak_akses') !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $kategoriIds = $this->request->getPost('kategori_id');
        $kategoriIdString = is_array($kategoriIds) ? implode(',', $kategoriIds) : '0';

        $tagIds = $this->request->getPost('tag_id');
        $tagIdString = is_array($tagIds) ? implode(',', $tagIds) : '0';

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'kategori_id' => $kategoriIdString,
            'tag_id' => $tagIdString,
            'status' => $this->request->getPost('status'),
        ];

        $gambar = $this->request->getFile('gambar');
        $gambarLama = $this->request->getPost('gambar_lama');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $namaUnik = $gambar->getRandomName();
            $gambar->move(FCPATH . 'assets/image/berita/', $namaUnik);

            if (!empty($gambarLama)) {
                $gambarPath = FCPATH . 'assets/image/berita/' . $gambarLama;
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            $data['gambar'] = $namaUnik;
        }

        $beritaModel->updateData($id, $data);

        return redirect()->to(base_url('berita/list'))->with('success', 'Artikel berhasil diubah.');
    }

    public function hapus($id)
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $beritaModel = new BeritaModel();
        $pengunjungModel = new PengunjungModel();

        $berita = $beritaModel->find($id);

        $user_id = $berita['user_id'];
        if (session('user_id') !== $user_id && session('hak_akses') !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        if (!$berita) {
            return redirect()->to(base_url('berita/list'))->with('error', 'Artikel tidak ditemukan.');
        }

        try {
            $beritaModel->deleteData($id);

            $pengunjungId = $pengunjungModel->where('berita_id', $id)->first();
            $pengunjungModel->deleteData($pengunjungId);

            $gambarPath = FCPATH . 'assets/image/berita/' . $berita['gambar'];
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            return redirect()->to(base_url('berita/list'))->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('berita/list'))->with('error', 'Berita ini terkait dengan Berita.');
        }
    }
}
