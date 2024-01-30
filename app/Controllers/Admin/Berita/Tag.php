<?php

namespace App\Controllers\Admin\Berita;

use App\Models\TagModel;

use App\Controllers\Admin\BaseController;

class Tag extends BaseController
{
    public function index()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $tagModel = new TagModel();

        $data = [
            'title' => 'Tag Berita',
            'user' => $this->user,
            'tagData' => $tagModel->findAll()
        ];
        return view('Admin/Pages/Berita/Tag', $data);
    }

    public function hapus($id)
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $tagModel = new TagModel();

        $tag = $tagModel->find($id);

        if (!$tag) {
            return redirect()->to(base_url('berita/tag'))->with('error', 'Tag tidak ditemukan.');
        }

        try {
            $tagModel->deleteData($id);
            return redirect()->to(base_url('berita/tag'))->with('success', 'Tag berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('berita/tag'))->with('error', 'Tag ini terkait dengan artikel.');
        }
    }

    public function tambah()
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $tagModel = new TagModel();

        $nama = $this->request->getPost('nama_tag');

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $nama);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $data = [
            'nama_tag' => $nama,
            'slug' => $slug
        ];

        $tagModel->insertData($data);

        return redirect()->to(base_url('berita/tag'))->with('success', 'Tag berhasil ditambahkan.');
    }

    public function ubah()
    {
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $id = $this->request->getPost('id');

        $nama = $this->request->getPost('nama_tag');

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $nama);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $tagModel = new TagModel();

        $data = [
            'nama_tag' => $nama,
            'keterangan' => $this->request->getPost('nama'),
            'slug' => $slug
        ];

        $tagModel->updateData($id, $data);

        return redirect()->to(base_url('berita/tag'))->with('success', 'Tag Artikel berhasil diubah.');
    }
}
