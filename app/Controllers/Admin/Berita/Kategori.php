<?php

namespace App\Controllers\Admin\Berita;

use App\Models\KategoriModel;

use App\Controllers\Admin\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Kategori Berita',
            'user' => $this->user,
            'kategoriData' => $kategoriModel->findAll()
        ];
        return view('Admin/Pages/Berita/Kategori', $data);
    }

    public function tambah()
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $kategoriModel = new KategoriModel();

        $nama_kategori = $this->request->getPost('nama_kategori');
        $jenis_kategori = $this->request->getPost('jenis_kategori');
        $keterangan = $this->request->getPost('keterangan');

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $nama_kategori);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $data = [
            'nama_kategori' => $nama_kategori,
            'jenis_kategori' => $jenis_kategori,
            'keterangan' => $keterangan,
            'slug' => $slug
        ];

        $kategoriModel->insertData($data);

        return redirect()->to(base_url('berita/kategori'))->with('success', 'Kategori Berita berhasil ditambahkan.');
    }

    public function ubah()
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $id = $this->request->getPost('id');

        $nama_kategori = $this->request->getPost('nama_kategori');
        $jenis_kategori = $this->request->getPost('jenis_kategori');
        $keterangan = $this->request->getPost('keterangan');

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $nama_kategori);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $data = [
            'nama_kategori' => $nama_kategori,
            'jenis_kategori' => $jenis_kategori,
            'keterangan' => $keterangan,
            'slug' => $slug
        ];

        $kategoriModel = new KategoriModel();
        $kategoriModel->updateData($id, $data);

        return redirect()->to(base_url('berita/kategori'))->with('success', 'Kategori Berita berhasil diubah.');
    }

    public function hapus($id)
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $kategoriModel = new KategoriModel();

        $kategori = $kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(base_url('berita/kategori'))->with('error', 'Kategori tidak ditemukan.');
        }

        try {
            $kategoriModel->deleteData($id);
            return redirect()->to(base_url('berita/kategori'))->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('berita/kategori'))->with('error', 'Kategori ini terkait dengan Berita.');
        }
    }
}
