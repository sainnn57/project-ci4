<?php

namespace App\Controllers;

use App\Models\PerpustakaanModel;

class Perpustakaan extends BaseController
{

    protected $session;
    protected $perpustakaanModel;
    public function __construct()
    {
        $this->session = session();
        $this->perpustakaanModel = new PerpustakaanModel();
    }

    public function save()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'no_buku' => [
                'rules' => 'required|is_unique[perpustakaan.no_buku]',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.',
                    'is_unique' => '{field} perpustakaan sudah terdaftar.'
                ]
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'jumlah_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/perpustakaan/new')->withInput()->with('validation', $validation);
        }

        $this->perpustakaanModel->save([
            'no_buku' => $this->request->getVar('no_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/user/perpustakaan/new');
    }

    public function saveadmin()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'no_buku' => [
                'rules' => 'required|is_unique[perpustakaan.no_buku]',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.',
                    'is_unique' => '{field} perpustakaan sudah terdaftar.'
                ]
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'jumlah_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambah/perpustakaan')->withInput()->with('validation', $validation);
        }

        $this->perpustakaanModel->save([
            'no_buku' => $this->request->getVar('no_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }


        $this->perpustakaanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($id)
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'perpustakaan' => $this->perpustakaanModel->getPerpustakaan($id)
        ];

        return view('admin/edit', $data);
    }

    public function update($id)
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'no_buku' => [
                'rules' => 'required|is_unique[perpustakaan.no_buku,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.',
                    'is_unique' => '{field} perpustakaan sudah terdaftar.'
                ]
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ],
            'jumlah_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} perpustakaan harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->perpustakaanModel->save([
            'id' => $id,
            'no_buku' => $this->request->getVar('no_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin');
    }
}
