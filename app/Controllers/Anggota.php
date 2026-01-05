<?php

namespace App\Controllers;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggota;

    public function __construct()
    {
        $this->anggota = new AnggotaModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $this->anggota
                ->like('id_anggota', $keyword)
                ->orLike('nama_depan', $keyword)
                ->orLike('nama_belakang', $keyword)
                ->orLike('jabatan', $keyword);
        }

        $data['anggota'] = $this->anggota->findAll();
        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create');
    }

    public function store()
    {
        $rules = [
            'nama_depan' => 'required',
            'jabatan' => 'required',
            'status_pernikahan' => 'required',
            // 'jumlah_anak' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->anggota->save($this->request->getPost());
        return redirect()->to('/anggota');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggota->find($id);
        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        $this->anggota->update($id, $this->request->getPost());
        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        $this->anggota->where('id_anggota', $id)->delete();
        return redirect()->to('/anggota');
    }
}
