<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpustakaanModel extends Model
{
    protected $table      = 'perpustakaan';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['no_buku', 'judul_buku', 'pengarang', 'jumlah_buku'];

    public function getPerpustakaan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}