<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('dashboard');
        }
        return view('home/index');
    }

    public function about()
    {
        $data['title'] = 'METHODOLOGY_SAW';
        return view('home/about', $data);
    }
}
