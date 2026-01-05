<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KomponenModel;

class Penggajian extends BaseController
{
    // Hapus constructor yang memanggil model yang tidak ada

    public function index()
    {
        $db = \Config\Database::connect();

        // Query Transparansi Gaji (Disesuaikan dengan tabel 'penggajian' pivot)
        $query = $db->query("
            SELECT 
                a.id_anggota, 
                a.nama_depan, 
                a.nama_belakang, 
                a.jabatan,
                a.status_pernikahan,
                SUM(CASE WHEN k.kategori = 'Gaji Pokok' THEN k.nominal ELSE 0 END) as total_gaji_pokok,
                SUM(CASE WHEN k.kategori != 'Gaji Pokok' THEN k.nominal ELSE 0 END) as total_tunjangan
            FROM anggota a
            LEFT JOIN penggajian p ON a.id_anggota = p.id_anggota
            LEFT JOIN komponen_gaji k ON p.id_komponen_gaji = k.id_komponen_gaji
            GROUP BY a.id_anggota, a.nama_depan, a.nama_belakang, a.jabatan, a.status_pernikahan
        ");

        return view('penggajian/index', [
            'data' => $query->getResultArray()
        ]);
    }

    public function create()
    {
        // Panggil Model Anggota & Komponen langsung
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenModel();

        return view('penggajian/create', [
            'anggota_list'  => $anggotaModel->findAll(),
            'komponen_list' => $komponenModel->findAll()
        ]);
    }

    public function store()
    {
        $idAnggota = $this->request->getPost('id_anggota');
        $komponenIds = $this->request->getPost('komponen'); // Array

        if (!$idAnggota || empty($komponenIds)) {
            return redirect()->back()->withInput()->with('error', 'Pilih Anggota dan minimal satu Komponen.');
        }

        $db = \Config\Database::connect();
        
        // 1. Hapus data lama (Reset gaji anggota tersebut)
        $db->table('penggajian')->where('id_anggota', $idAnggota)->delete();

        // 2. Siapkan data baru
        $dataInsert = [];
        foreach ($komponenIds as $idKomponen) {
            $dataInsert[] = [
                'id_anggota'       => $idAnggota,
                'id_komponen_gaji' => $idKomponen // Sesuai nama kolom di DB
            ];
        }

        // 3. Simpan
        $db->table('penggajian')->insertBatch($dataInsert);

        return redirect()->to('/penggajian')->with('success', 'Gaji berhasil disimpan!');
    }
    
    // Hapus function detail() dan komponenByJabatan() yang bikin error sementara ini
}