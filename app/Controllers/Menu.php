<?php

namespace App\Controllers;

class Menu extends BaseController
{

    public function menu_admin()
    {
        // Method menu_admin: Menampilkan menu admin.
        if (session()->get('level') <> 1) {
            // Jika level pengguna bukan 1 (level admin), maka pengguna akan dialihkan kembali ke halaman 'home'.
            return redirect()->to(base_url(('home')));
        }
        $data = array(
            'title' => 'Menu Admin',  // Mengatur judul halaman menu admin.
            'isi'   => 'admin/v_list',  // Menampilkan tampilan menu admin ('admin/v_list').
        );
        echo view('layout/v_wrapper', $data);  // Menampilkan tampilan dengan tata letak umum ('v_wrapper') dengan data yang diteruskan.
    }

    public function menu_user()
    {
        // Method menu_user: Menampilkan menu pengguna.
        if (session()->get('level') <> 2) {
            // Jika level pengguna bukan 2 (level pengguna biasa), maka pengguna akan dialihkan kembali ke halaman 'home'.
            return redirect()->to(base_url(('home')));
        }
        $data = array(
            'title' => 'Menu User',  // Mengatur judul halaman menu pengguna.
            'isi'   => 'v_menu',  // Menampilkan tampilan menu pengguna ('v_menu').
        );
        echo view('layout/v_wrapper', $data);  // Menampilkan tampilan dengan tata letak umum ('v_wrapper') dengan data yang diteruskan.
    }
}
