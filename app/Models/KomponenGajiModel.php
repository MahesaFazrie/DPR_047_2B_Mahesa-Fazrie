<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen_gaji';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_komponen', 'kategori_komponen', 'jabatan_komponen', 'nilai_dasar', 'satuan_komponen'];
}