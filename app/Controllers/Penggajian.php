<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel; // Pastikan model ini ada

class Penggajian extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Query Transparansi Gaji (Sama seperti sebelumnya)
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

    // Method baru untuk menampilkan Form
    public function create()
    {
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();

        return view('penggajian/create', [
            'anggota_list'  => $anggotaModel->findAll(),
            'komponen_list' => $komponenModel->findAll()
        ]);
    }

    // Method baru untuk Menyimpan Data
    public function store()
    {
        $idAnggota = $this->request->getPost('id_anggota');
        $komponenIds = $this->request->getPost('komponen'); // Ini array (checkbox)

        // Validasi sederhana
        if (!$idAnggota || empty($komponenIds)) {
            return redirect()->back()->withInput()->with('error', 'Harap pilih Anggota dan minimal satu Komponen Gaji.');
        }

        $db = \Config\Database::connect();
        
        // 1. Bersihkan gaji lama anggota ini (agar tidak duplikat saat di-update)
        $db->table('penggajian')->where('id_anggota', $idAnggota)->delete();

        // 2. Siapkan data baru untuk di-insert
        $dataInsert = [];
        foreach ($komponenIds as $idKomponen) {
            $dataInsert[] = [
                'id_anggota'       => $idAnggota,
                'id_komponen_gaji' => $idKomponen
            ];
        }

        // 3. Masukkan data (Insert Batch)
        $db->table('penggajian')->insertBatch($dataInsert);

        return redirect()->to('/penggajian')->with('success', 'Komponen gaji berhasil diatur!');
    }
}