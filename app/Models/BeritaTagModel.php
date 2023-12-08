<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaTagModel extends Model
{
    protected $table = 'tb_berita_tag';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'berita_id',
        'tag_id',
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
