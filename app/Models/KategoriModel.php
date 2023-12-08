<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_kategori',
        'keterangan',
        'slug',
        'jenis_kategori',
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
