<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        return view('auth/login');
    }

    public function doLogin() {
        $userModel = new UserModel();
        $user = $userModel->where('username', $this->request->getVar('username'))->first();

        if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Login gagal!');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
