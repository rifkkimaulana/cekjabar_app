<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_berita';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_depan',
        'nama_belakang',
        'username',
        'password',
        'email',
        'telpon',
        'alamat',
        'hak_akses',
    ];

    public function insertData($data)
    {
        $this->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->set($data)
            ->where($this->primaryKey, $id)
            ->update();
    }

    public function deleteData($id)
    {
        $this->where($this->primaryKey, $id)->delete();
    }
}
