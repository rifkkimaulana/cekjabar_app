<?php

namespace App\Controllers\Admin;

use App\Models\BeritaModel;
use App\Models\KomentarModel;

class Komentar extends BaseController
{
    public function index()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $komentarModel = new KomentarModel();

        $artikelModel = new BeritaModel();

        $artikelMap = [];
        foreach ($artikelModel->findAll() as $artikel) {
            $artikelMap[$artikel['id']] = $artikel;
        }

        if (session('hak_akses') === 'administrator') {
            $komentarData = $komentarModel->findAll();
        } else {
            $komentarData = $komentarModel->where('user_id', session('user_id'))->get()->getResultArray();
        }

        $data = [
            'title' => 'Komentar',
            'user' => $this->user,
            'komentarData' => $komentarData,
            'artikelMap' => $artikelMap
        ];
        return view('Admin/Pages/Komentar', $data);
    }

    public function hapus_selected()
    {
        $selectedItems = $this->request->getPost('selected_items');

        if (!empty($selectedItems)) {
            $komentarModel = new KomentarModel();
            foreach ($selectedItems as $itemId) {
                $komentar = $komentarModel->find($itemId);
                $penulis_id = $komentar['user_id'];
                if (session('user_id') !== $penulis_id && session('user_level') !== 'administrator') {
                    return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
                }

                $komentarModel->deleteId($itemId);
            }

            return redirect()->to(base_url('komentar'))->with('success', 'Data terpilih berhasil dihapus.');
        } else {
            return redirect()->to(base_url('komentar'))->with('error', 'Pilih setidaknya satu item untuk dihapus.');
        }
    }

    //--------------------------------------------------------------------

}
