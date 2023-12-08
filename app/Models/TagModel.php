<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table = 'tb_tag';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_tag',
        'slug',
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
