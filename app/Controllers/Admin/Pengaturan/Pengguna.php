<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Models\UserModel;

use App\Controllers\Admin\BaseController;

class Pengguna extends BaseController
{
    public function index()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }

        if ($this->user['hak_akses'] !== session()->get('hak_akses')) {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $usersModel = new UserModel();

        $data = [
            'title' => 'Pengaturan Pengguna',
            'user' => $this->user,
            'userData' => $usersModel->findAll()
        ];
        return view('Admin/Pages/Pengaturan/Pengguna', $data);
    }

    public function tambah()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $penggunaModel = new UserModel();

        $data = [
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'telpon' => $this->request->getPost('telpon'),
            'hak_akses' => 'pengguna'
        ];

        $file = $this->request->getFile('user_foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('assets/image/user_foto/', $newName);
            $data['user_foto'] = $newName;
        }

        $penggunaModel->insertData($data);

        return redirect()->to(base_url('pengaturan/pengguna'))->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function ubah()
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $penggunaModel = new UserModel();

        $id = $this->request->getPost('user_id');

        $user = $penggunaModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('pengaturan/pengguna'))->with('error', 'User not found.');
        }

        $newPassword = $this->request->getPost('new_password');
        $currentPassword = $this->request->getPost('current_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (!empty($currentPassword)) {
            if (!password_verify($currentPassword, $user['password'])) {
                return redirect()->back()->with('error', 'Password lama salah.');
            }

            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak sesuai.');
            }

            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $data = [
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'telpon' => $this->request->getPost('telpon'),
            'hak_akses' => $this->request->getPost('hak_akses'),
        ];

        $file = $this->request->getFile('user_foto');
        $foto_lama = $this->request->getPost('foto_lama');

        if ($file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();
            $file->move('assets/image/user_foto/', $newName);
            $data['user_foto'] = $newName;

            if (!empty($foto_lama)) {
                $photoPath = 'assets/image/user_foto/' . $foto_lama;

                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
        }

        $penggunaModel->updateData($id, $data);

        return redirect()->to(base_url('pengaturan/pengguna'))->with('success', 'Pengguna berhasil diubah.');
    }


    public function hapus($id)
    {
        if (empty(session('user_id'))) {
            return redirect()->to(base_url('login'))->with('error', 'Silahkan login terlebih dahulu!.');
        }
        if ($this->user['hak_akses'] !== 'administrator') {
            return redirect()->to(base_url('error/access-denied'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $penggunaModel = new UserModel();

        $pengguna = $penggunaModel->find($id);
        if (!$pengguna) {
            return redirect()->to(base_url('pengaturan/pengguna'))->with('error', 'Pengguna ini tidak ada.');
        }

        $user_foto = $pengguna['user_foto'];
        if (!empty($user_foto)) {
            $photoPath = 'assets/image/user_foto/' . $user_foto;

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $penggunaModel->deleteData($id);

        return redirect()->to(base_url('pengaturan/pengguna'))->with('success', 'Pengguna berhasil dihapus.');
    }

    //--------------------------------------------------------------------

}
