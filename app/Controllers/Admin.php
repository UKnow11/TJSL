<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $AdminModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi AdminModel untuk interaksi dengan database.
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar pengguna.

        $data = [
            'title' => 'Daftar Pengguna',        // Mengatur judul untuk tampilan.
            'admin' => $this->AdminModel->get_admin(), // Mendapatkan data pengguna dari AdminModel.
            'isi'   => 'admin/v_list',           // Memuat tampilan 'v_list' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan pengguna baru.

        $data = [
            'title' => 'Tambah Pengguna',         // Mengatur judul untuk tampilan.
            'isi'   => 'admin/v_tambah',          // Memuat tampilan 'v_tambah' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan pengguna baru.

        $data = [
            'nip' => $this->request->getPost('nip'),             // Mendapatkan data pengguna dari permintaan POST.
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        // Memasukkan data pengguna ke dalam database menggunakan AdminModel.
        $this->AdminModel->insert_admin($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'admin' setelah penyisipan data berhasil.
        return redirect()->to(base_url('admin'));
    }

    public function edit($id_user)
    {
        // Method Edit: Menampilkan formulir untuk mengedit pengguna yang ada.

        $data = [
            'title' => 'Edit Pengguna',                     // Mengatur judul untuk tampilan.
            'admin' => $this->AdminModel->edit_admin($id_user), // Mendapatkan data pengguna berdasarkan ID.
            'isi'   => 'admin/v_edit',                      // Memuat tampilan 'v_edit' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui pengguna yang ada.

        $data = [
            'nip' => $this->request->getPost('nip'),             // Mendapatkan data pengguna yang diperbarui dari permintaan POST.
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        // Memperbarui data pengguna dalam database menggunakan AdminModel.
        $this->AdminModel->update_admin($data, $id_user);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'admin' setelah pembaruan data berhasil.
        return redirect()->to(base_url('admin'));
    }

    public function delete($id_user)
    {
        // Method Delete: Menangani penghapusan pengguna yang ada.

        // Menghapus pengguna dari database menggunakan AdminModel berdasarkan ID yang diberikan.
        $this->AdminModel->delete_admin($id_user);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'admin' setelah penghapusan data berhasil.
        return redirect()->to(base_url('admin'));
    }
}
