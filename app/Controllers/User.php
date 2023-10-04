<?php

namespace App\Controllers;

use App\Models\PerpustakaanModel;

class User extends BaseController
{

    protected $session;
    protected $perpustakaanModel;
    public function __construct()
    {
        $this->session = session();
        $this->perpustakaanModel = new PerpustakaanModel();
    }
    
    public function new()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Tambah Data Perpustakaan',
            'validation' => \Config\Services::validation()
        ];

        return view('user/new', $data);
    }

    public function lihat()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $perpustakaan = $this->perpustakaanModel->findAll();

        $data = [
            'title' => 'Data Perpustakaan',
            'perpustakaan' => $perpustakaan
        ];

        return view('user/lihat', $data);
    }

    public function dashboard()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Dashboard',
        ];

        return view('user/dashboard', $data);
    }
    
}