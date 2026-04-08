<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;

    # Function yang berfungsi untuk menampilkan halaman login pengguna
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('dashboard');
        }
        return view('auth/login');
    }

    # Function yang berfungsi untuk memproses autentikasi login berdasarkan email dan password
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $db = \Config\Database::connect();
        $user = $db->table('users')->where('username', $username)->get()->getRow();

        if ($user && password_verify($password, $user->password)) {
            session()->set([
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'isLoggedIn' => true
            ]);

            return redirect()->to('dashboard')->with('success', 'Berhasil login sebagai ' . $user->role);
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    # Function yang berfungsi untuk memproses logout dan mengakhiri sesi pengguna
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
