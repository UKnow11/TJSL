<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController
{
    protected $LoginModel;
    public function __construct()
    {
        helper('form');
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',  // Mengatur judul halaman login.
        );
        return view('v_login', $data);  // Menampilkan tampilan login ('v_login') dengan data yang diteruskan.
    }

    public function cek_login()
    {
        // Method cek_login: Memeriksa dan mengelola proses login pengguna.
        $username = $this->request->getPost('username');  // Mendapatkan input pengguna untuk username.
        $password = $this->request->getPost('password');  // Mendapatkan input pengguna untuk password.

        $cek = $this->LoginModel->cek_login($username, $password);  // Memanggil model untuk memeriksa data login.

        if ($cek) {
            session()->set('log', true);  // Mengatur sesi log pengguna.
            session()->set('username', $cek['username']);  // Mengatur sesi username pengguna.
            session()->set('fullname', $cek['fullname']);  // Mengatur sesi nama lengkap pengguna.
            session()->set('level', $cek['level']);  // Mengatur sesi level pengguna.
            return redirect()->to(base_url('home'));  // Mengalihkan ke halaman 'home' jika login berhasil.
        } else {
            session()->setFlashdata('gagal', 'Username atau Password salah');  // Menampilkan pesan kesalahan jika login gagal.
            return redirect()->to(base_url('login'));  // Mengalihkan kembali ke halaman login.
        }
    }

    public function logout()
    {
        // Method logout: Mengelola proses logout pengguna.
        session()->set('remove');  // Menghapus sesi log pengguna.
        session()->set('username');  // Menghapus sesi username pengguna.
        session()->set('fullname');  // Menghapus sesi nama lengkap pengguna.
        session()->set('level');  // Menghapus sesi level pengguna.
        session()->setFlashdata('pesan', 'Log Out Sukses');  // Menampilkan pesan logout sukses.
        return redirect()->to(base_url('login'));  // Mengalihkan kembali ke halaman login.
    }
}
