<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;

class Daftar extends BaseController
{
    public function index()
    {
        if (!empty(session('user_id'))) {
            return redirect()->to(base_url('dashboard'))->with('success', 'Anda sudah login!.');
        }

        $data = [
            'title' => 'Buat Akun Baru!'
        ];
        return view('Auth/Pages/Daftar', $data);
    }

    public function buat()
    {
        $userModel = new UserModel();

        $nama_depan = $this->request->getPost('nama_depan');
        $nama_belakang = $this->request->getPost('nama_belakang');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $konfirmasiPassword = $this->request->getPost('konfirmasi_password');

        if ($password !== $konfirmasiPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sesuai.');
        } else {

            if ($userModel->where('email', $email)->first()) {
                return redirect()->back()->with('error', 'Email sudah terdaftar. Gunakan email lain.');
            } else {

                $data = [
                    'nama_depan' => $nama_depan,
                    'nama_belakang' => $nama_belakang,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'hak_akses' => 'Pengguna'
                ];

                $userModel->insertData($data);

                return redirect()->to(base_url('login'))->with('success', 'Akun berhasil dibuat. Silakan login.');
            }
        }
    }
}
