<?php
namespace App\Controllers;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    public function index()
    {
        $model = new AnggotaModel();
        $data['anggota'] = $model->findAll();
        return view('anggota/index', $data);
    }

    public function delete($id)
    {
        $model = new AnggotaModel();
        $anggota = $model->find($id);
        if (!$anggota) {
            return redirect()->to('/anggota')->with('error', 'Data tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/anggota')->with('success', 'Data anggota berhasil dihapus.');
    }
}
