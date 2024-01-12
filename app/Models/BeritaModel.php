<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tb_berita';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul',
        'isi',
        'gambar',
        'slug',
        'status',
        'user_id',
        'tag_ids',
        'kategori_ids',
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
