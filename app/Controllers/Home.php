<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function publicView()
    {
        return view('dashboard_public');
    }
}
