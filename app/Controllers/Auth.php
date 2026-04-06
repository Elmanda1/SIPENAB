<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('dashboard');
        }
        return view('auth/login');
    }

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

            return redirect()->to('dashboard')->with('success', 'Berhasil login sebagai ' . $role);
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
