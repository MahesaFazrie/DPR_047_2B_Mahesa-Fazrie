<?php

namespace App\Controllers;
use App\Models\KomponenModel;

class Komponen extends BaseController
{
    protected $komponen;

    public function __construct()
    {
        $this->komponen = new KomponenModel();
    }

    public function index()
    {
        $q = $this->request->getGet('q');

        if ($q) {
            $this->komponen
                ->like('id_komponen', $q)
                ->orLike('nama_komponen', $q)
                ->orLike('kategori', $q)
                ->orLike('jabatan', $q)
                ->orLike('nominal', $q)
                ->orLike('satuan', $q);
        }

        return view('komponen/index', [
            'komponen' => $this->komponen->findAll()
        ]);
    }

    public function create()
    {
        return view('komponen/create');
    }

    public function store()
    {
        $rules = [
            'nama_komponen' => 'required',
            'kategori'      => 'required',
            'jabatan'       => 'required',
            'nominal'       => 'required|numeric',
            'satuan'        => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->komponen->save($this->request->getPost());
        return redirect()->to('/komponen');
    }

    public function edit($id)
    {
        return view('komponen/edit', [
            'data' => $this->komponen->find($id)
        ]);
    }

    public function update($id)
    {
        $this->komponen->update($id, $this->request->getPost());
        return redirect()->to('/komponen');
    }

    public function delete($id)
    {
        $this->komponen->delete($id);
        return redirect()->to('/komponen');
    }
}
