<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'tb_komentar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'berita_id',
        'isi_komentar',
        'status',
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
