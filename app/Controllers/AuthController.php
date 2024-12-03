<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        $adminModel = new AdminModel();

        // Jika belum ada admin, buat satu secara default
        if ($adminModel->countAllResults() === 0) {
            $adminModel->insert([
                'username' => 'Admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
            ]);
        }

        // Jika sudah login, redirect ke halaman utama
        if (session()->get('isLogin')) {
            return redirect()->to(base_url());
        }

        return view('auth/login');
    }

    public function login()
    {
        $param = $this->request->getPost();

        // Validasi input
        if (empty($param['username']) || empty($param['password'])) {
            session()->setFlashdata('error', 'Username dan Password wajib diisi.');
            return redirect()->to(base_url('auth/login'))->withInput();
        }

        $adminModel = new AdminModel();

        // Cari admin berdasarkan username
        $admin = $adminModel->where('username', $param['username'])->first();

        if ($admin) {
            // Verifikasi password
            if (password_verify($param['password'], $admin['password'])) {
                // Set session
                session()->set([
                    'isLogin' => true,
                    'username' => $admin['username'],
                ]);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('error', 'Password salah. Silakan coba lagi.');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan.');
        }

        return redirect()->to(base_url('auth/login'))->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
