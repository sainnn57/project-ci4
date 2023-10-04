<?php

namespace App\Controllers;

use App\Models\PerpustakaanModel;

class Admin extends BaseController
{

    protected $perpustakaanModel;
    protected $session;
    public function __construct()
    {
        $this->perpustakaanModel = new PerpustakaanModel();
        $this->session = session();
    }

    public function index(): string
    {

        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $perpustakaan = $this->perpustakaanModel->findAll();

        $data = [
            'title' => 'Data Kelahiran Sleman',
            'perpustakaan' => $perpustakaan
        ];

        return view('admin/index', $data);
    }

    public function tambah_perpustakaan()
    {

        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Tambah Data Kelahiran Sleman',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambah', $data);
    }

}
