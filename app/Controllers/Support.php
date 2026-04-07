<?php

namespace App\Controllers;

class Support extends BaseController
{
    public function panduan()
    {
        return view('support/panduan', ['title' => 'Panduan Penggunaan']);
    }

    public function metode()
    {
        return view('support/metode', ['title' => 'Metode Penilaian']);
    }

    public function faq()
    {
        return view('support/faq', ['title' => 'Tanya Jawab (FAQ)']);
    }

    public function kontak()
    {
        return view('support/kontak', ['title' => 'Hubungi Kami']);
    }
}
