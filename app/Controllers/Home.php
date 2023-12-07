<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Method Index: Menampilkan halaman utama (Home) jika pengguna sudah login.
        if (session()->get('username') == '') {
            // Jika pengguna belum login, alihkan mereka ke halaman login dan tampilkan pesan gagal.
            session()->setFlashdata('gagal', '');
            return redirect()->to(base_url('login'));
        }

        $data = array(
            'title' => 'Home',  // Mengatur judul untuk tampilan.
            'isi' => 'v_home',  // Memuat tampilan 'v_home' sebagai konten halaman.
        );

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function menu2()
    {
        // Method Menu2: Menampilkan halaman "Menu 2".

        $data = [
            'title' => 'Menu 2',  // Mengatur judul untuk tampilan.
            'isi' => 'v_menu2',  // Memuat tampilan 'v_menu2' sebagai konten halaman.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function menu3()
    {
        // Method Menu3: Menampilkan halaman "Menu 3".

        $data = [
            'title' => 'Menu 3',  // Mengatur judul untuk tampilan.
            'isi' => 'v_menu3',  // Memuat tampilan 'v_menu3' sebagai konten halaman.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }
}
