<?php
namespace App\Controllers;

class Home extends BaseController {
    public function publicView() {
        return view('public/dashboard');
    }
}
