<?php

namespace App\Controllers;

class Support extends BaseController
{
    # Function yang berfungsi untuk menampilkan halaman panduan aplikasi
    public function panduan()
    {
        return view('support/panduan', ['title' => 'Panduan Penggunaan']);
    }

    # Function yang berfungsi untuk menampilkan penjelasan mengenai metode penilaian SAW
    public function metode()
    {
        return view('support/metode', ['title' => 'Metode Penilaian']);
    }

    # Function yang berfungsi untuk menampilkan halaman tanya jawab atau FAQ
    public function faq()
    {
        return view('support/faq', ['title' => 'Tanya Jawab (FAQ)']);
    }

    # Function yang berfungsi untuk menampilkan halaman informasi kontak
    public function kontak()
    {
        return view('support/kontak', ['title' => 'Hubungi Kami']);
    }
}
