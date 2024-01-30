<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if (!empty(session('user_id'))) {
            return redirect()->to(base_url('dashboard'))->with('success', 'Anda sudah login!.');
        }

        $data = [
            'title' => 'CEK JABAR LOGIN!'
        ];
        return view('Auth/Pages/Login', $data);
    }

    public function login_post()
    {
        $identitas = $this->request->getPost('usernameOrEmail');
        $password = $this->request->getPost('password');

        $usersModel = new UserModel();
        if (filter_var($identitas, FILTER_VALIDATE_EMAIL)) {
            $pengguna = $usersModel->where('email', $identitas)->first();
        } else {
            $pengguna = $usersModel->where('username', $identitas)->first();
        }

        if ($pengguna && password_verify($password, $pengguna['password'])) {

            session()->set('user_id', $pengguna['id']);
            session()->set('hak_akses', $pengguna['hak_akses']);

            if ($this->request->getPost('remember')) {
                $cookieValue = $pengguna['user_id'] . '|' . $pengguna['password'];

                $this->response->setCookie('remember_me', $cookieValue, 3600 * 24 * 30);
            }

            session()->setFlashdata('success', 'Selamat anda berhasil login.');
            return redirect()->to(base_url('dashboard'));
        } else {
            session()->setFlashdata('error', 'Kredensial tidak valid. Silakan coba lagi.');
            return redirect()->to(base_url('login'));
        }
    }
}
