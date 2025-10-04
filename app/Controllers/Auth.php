<?php
namespace App\Controllers;
use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $userModel = new PenggunaModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Simpan sesi login
                $session->set([
                    'id_pengguna' => $user['id_pengguna'],
                    'username'    => $user['username'],
                    'nama'        => $user['nama_depan'].' '.$user['nama_belakang'],
                    'role'        => $user['role'],
                    'logged_in'   => true
                ]);
                // Arahkan sesuai role
                if ($user['role'] == 'Admin') {
                    return redirect()->to('/anggota');
                } else {
                    return redirect()->to('/dashboard-public');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
