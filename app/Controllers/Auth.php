<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Basic verification (Hardcoded for demo, normally check against users table)
        // Admin: admin / Boolean1193__
        // Operator: operator / Boolean1193__
        
        $role = null;
        if ($username === 'admin' && $password === 'Boolean1193__') {
            $role = 'admin';
        } elseif ($username === 'operator' && $password === 'Boolean1193__') {
            $role = 'operator';
        }

        if ($role) {
            session()->set([
                'username' => $username,
                'role' => $role,
                'isLoggedIn' => true
            ]);

            return $this->respond([
                'status' => 'success',
                'message' => 'Login successful',
                'role' => $role
            ]);
        }

        return $this->failUnauthorized('Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();
        return $this->respond(['message' => 'Logged out successfully']);
    }
}
