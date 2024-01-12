<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;

class Lupa_password extends BaseController
{
    public function index()
    {
        if (!empty(session('user_id'))) {
            return redirect()->to(base_url('dashboard'))->with('success', 'Anda sudah login!.');
        }

        $data = [
            'title' => 'Lupa Password!'
        ];
        return view('Auth/Pages/Lupa-password', $data);
    }

    public function post()
    {
        $usersModel = new UserModel();

        $email = $this->request->getPost('email');

        $user = $usersModel->where('email', $email)->first();

        if ($user) {

            $noWa = $user['whatsapp'];

            $token = bin2hex(random_bytes(16));
            $usersModel->updateResetToken($email, $token, $noWa);

            session()->setFlashdata('success', 'Silahkan buat password baru melalui link yang kami kirim ke nomor Whatsapp (' . $noWa);
            return redirect()->to(base_url('lupa-password'));
        } else {
            session()->setFlashdata('error', 'Email yang anda kirim tidak tersedia.');
            return redirect()->to(base_url('lupa-password'));
        }
    }

    //--------------------------------------------------------------------

}
