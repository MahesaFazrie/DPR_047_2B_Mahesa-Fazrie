<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class PublicController extends BaseController
{
    public function anggota()
    {
        return view('public/anggota', [
            'anggota' => (new AnggotaModel())->findAll()
        ]);
    }
}
