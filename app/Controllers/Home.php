<?php

namespace App\Controllers;

class Home extends BaseController
{
    # Function yang berfungsi untuk menampilkan halaman beranda (landing page)
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('dashboard');
        }
        $data['title'] = 'Home';
        return view('home/index', $data);
    }
}
