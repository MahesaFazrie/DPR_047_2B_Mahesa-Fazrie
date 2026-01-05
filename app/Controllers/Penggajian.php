<?php

namespace App\Controllers;
use App\Models\PenggajianModel;
use App\Models\PenggajianDetailModel;
use App\Models\AnggotaModel;
use App\Models\KomponenModel;

class Penggajian extends BaseController
{
    protected $penggajian, $detail, $anggota, $komponen;

    public function __construct()
    {
        $this->penggajian = new PenggajianModel();
        $this->detail = new PenggajianDetailModel();
        $this->anggota = new AnggotaModel();
        $this->komponen = new KomponenModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $query = $db->query("
            SELECT a.id_anggota, a.nama_depan, a.nama_belakang, a.jabatan,
                SUM(
                    CASE
                        WHEN k.nama_komponen = 'Tunjangan Istri/Suami'
                            AND a.status_pernikahan = 'Kawin'
                        THEN k.nominal

                        WHEN k.nama_komponen = 'Tunjangan Anak'
                            AND a.jumlah_anak > 0
                        THEN k.nominal * LEAST(a.jumlah_anak, 2)

                        WHEN k.satuan = 'Tahunan'
                        THEN k.nominal / 12

                        ELSE k.nominal
                    END
                )
            FROM penggajian p
            JOIN anggota_dpr a ON p.id_anggota = a.id_anggota
            JOIN penggajian_detail pd ON p.id_penggajian = pd.id_penggajian
            JOIN komponen_gaji k ON pd.id_komponen = k.id_komponen
            GROUP BY a.id_anggota
        ");

        return view('penggajian/index', [
            'data' => $query->getResultArray()
        ]);
    }

    public function create()
    {
        return view('penggajian/create', [
            'anggota' => $this->anggota->findAll()
        ]);
    }

    public function store()
    {
        $idPenggajian = $this->penggajian->insert([
            'id_anggota' => $this->request->getPost('id_anggota')
        ]);

        foreach ($this->request->getPost('komponen') as $idKomponen) {
            $this->detail->insert([
                'id_penggajian' => $idPenggajian,
                'id_komponen' => $idKomponen
            ]);
        }

        return redirect()->to('/penggajian');
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();

        $query = $db->query("
            SELECT a.*, k.nama_komponen, k.nominal, k.satuan
            FROM penggajian p
            JOIN anggota_dpr a ON p.id_anggota = a.id_anggota
            JOIN penggajian_detail pd ON p.id_penggajian = pd.id_penggajian
            JOIN komponen_gaji k ON pd.id_komponen = k.id_komponen
            WHERE p.id_anggajian = ?
        ", [$id]);

        return view('penggajian/detail', [
            'data' => $query->getResultArray()
        ]);
    }
    
    public function komponenByJabatan($jabatan)
    {
        return $this->response->setJSON(
            $this->komponen
                ->whereIn('jabatan', [$jabatan, 'Semua'])
                ->findAll()
        );
    }

}
