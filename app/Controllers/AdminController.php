<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        $model = new AdminModel();
        // Cek jika tabel kosong
        if ($model->countAll() == 0) {
            // Insert admin secara otomatis
            $model->save([
                'username' => 'admin',
                'password' => password_hash('adminpassword', PASSWORD_DEFAULT), // Ubah password dengan aman
                'role' => 'admin'
            ]);
        }
    }

    // ... login, authenticate, logout methods
}
