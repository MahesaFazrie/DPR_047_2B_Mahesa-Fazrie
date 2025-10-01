<?php
namespace App\Controllers;
use App\Models\AnggotaModel;

class Anggota extends BaseController {
    public function index() {
        $model = new AnggotaModel();
        $data['anggota'] = $model->findAll();
        return view('anggota/index', $data);
    }

    public function create() {
        return view('anggota/create');
    }

    public function store() {
        $model = new AnggotaModel();
        $data = [
            'gelar_depan'       => $this->request->getPost('gelar_depan'),
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak'       => $this->request->getPost('jumlah_anak'),
        ];
        $model->insert($data);
        return redirect()->to('/anggota');
    }
}
