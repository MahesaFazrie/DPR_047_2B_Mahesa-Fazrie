<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Ambil role user dari session
        $userRole = session()->get('role');

        // 2. Cek apakah user punya role & apakah arguments (roles yang diizinkan) ada
        if (!$userRole || empty($arguments)) {
            return redirect()->to('/dashboard');
        }

        // 3. Ubah semuanya menjadi huruf kecil agar "Admin" == "admin"
        $userRole = strtolower($userRole);
        $allowedRoles = array_map('strtolower', $arguments);

        // 4. Cek apakah role user ada di daftar yang diizinkan
        if (!in_array($userRole, $allowedRoles)) {
            // Jika role tidak cocok, kembalikan ke dashboard
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah request
    }
}