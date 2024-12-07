<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'AdminID';
    protected $allowedFields = ['username', 'password'];

    public function checkLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        
        return false;
    }
}