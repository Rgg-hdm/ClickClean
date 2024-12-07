<?php
namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        // Tampilkan halaman login
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new AdminModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $user = $model->checkLogin($username, $password);
        
        if ($user) {
            $sessionData = [
                'id'       => $user['adminID'],
                'username' => $user['username'],
                
                'logged_in'=> TRUE
            ];
            
            $session->set($sessionData);
            return redirect()->to('dashboard');
        } else {
            $session->setFlashdata('msg', 'Username atau password salah');
            return redirect()->to('auth/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('auth/login');
    }
}