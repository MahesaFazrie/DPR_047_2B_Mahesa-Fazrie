<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $userModel = new UserModel();
        $pengguna = $userModel->where('username', $this->request->getPost('username'))->first();

        if ($pengguna && password_verify($this->request->getPost('password'), $pengguna['password'])) {
            session()->set([
                'user_id' => $pengguna['id_pengguna'],
                'role'    => $pengguna['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Login gagal');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
