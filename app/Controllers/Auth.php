<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel; // Pastikan model PenggunaModel di-load

class Auth extends BaseController
{
    // Pastikan session dan helper dimuat di BaseController atau di sini
    public function login()
    {
        // Jika sudah login, redirect ke halaman utama sesuai role
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        helper(['form']);
        $data = [];

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // 1. Ambil data pengguna dari database
            $model = new PenggunaModel();
            $user  = $model->findUserByUsername($username);

            // 2. Verifikasi pengguna ditemukan
            if ($user) {
                // 3. Verifikasi password dengan password_verify()
                if (password_verify($password, $user['password'])) {
                    
                    // Otentikasi Berhasil, buat sesi
                    $ses_data = [
                        'id_pengguna' => $user['id_pengguna'],
                        'username'    => $user['username'],
                        'nama_lengkap' => $user['nama_depan'] . ' ' . $user['nama_belakang'],
                        'role'        => $user['role'],
                        'isLoggedIn'  => true,
                    ];
                    session()->set($ses_data);

                    // Redirect ke dashboard sesuai role
                    if ($user['role'] === 'Admin') {
                        return redirect()->to(base_url('admin/dashboard'));
                    } else {
                        return redirect()->to(base_url('public/dashboard'));
                    }
                } else {
                    // Password salah
                    session()->setFlashdata('error', 'Username atau **Password salah**.');
                    return redirect()->back()->withInput();
                }
            } else {
                // Username tidak ditemukan
                session()->setFlashdata('error', '**Username** atau Password salah.');
                return redirect()->back()->withInput();
            }
        }

        return view('auth/login', $data); // Tampilkan halaman login
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}