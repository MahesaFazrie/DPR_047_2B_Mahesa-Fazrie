<?php
namespace App\Models;
use CodeIgniter\Model;

class AnggotaModel extends Model {
    protected $table = 'anggota_dpr';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'gelar_depan','nama_depan','nama_belakang','gelar_belakang',
        'jabatan','status_pernikahan','jumlah_anak'
    ];
}
