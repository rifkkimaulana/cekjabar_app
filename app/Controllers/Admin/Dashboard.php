<?php

namespace App\Controllers\Admin;

class Dashboard extends BaseController
{
    public function index()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $data = [
            'title' => 'Dashboard Cek Jabar',
            'user' => $this->user
        ];
        return view('Admin/Pages/Dashboard', $data);
    }

    public function noAkses()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        $data = [
            'title' => 'Access Denied!',
            'user' => $this->user
        ];
        return view('Admin/Pages/BlokAkses', $data);
    }

    public function keluar()
    {
        session()->destroy();
        $this->response->deleteCookie('remember_me');

        return redirect()->to(base_url('login'))->with('success', 'Anda sudah keluar dari sesi aplikasi.');
    }

    //--------------------------------------------------------------------

}
