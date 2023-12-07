<?php

namespace App\Controllers;

use App\Models\KetKolektibilitasModel;

class KetKolektibilitas extends BaseController
{
    protected $KetKolektibilitasModel;

    public function __construct()
    {
        $this->KetKolektibilitasModel = new KetKolektibilitasModel();
    }

    public function index()
    {
        // Method Index: Menampilkan halaman Keterangan Kolektibilitas dengan daftar kolektibilitas.
        $data = [
            'title' => 'Keterangan Kolektibilitas',  // Mengatur judul tampilan.
            'ketkolektibilitas' => $this->KetKolektibilitasModel->get_ketkolektibilitas(),  // Mendapatkan daftar kolektibilitas.
            'isi' => 'ketkolektibilitas/v_list',  // Memuat tampilan 'v_list' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function tambah()
    {
        // Method tambah: Menampilkan halaman tambah data kolektibilitas.
        $data = [
            'title' => 'Tambah Data',  // Mengatur judul tampilan.
            'isi' => 'ketkolektibilitas/v_tambah',  // Memuat tampilan 'v_tambah' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function save()
    {
        // Method save: Menyimpan data kolektibilitas yang baru ditambahkan ke database.
        $data = [
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
            'kolektibilitas' => $this->request->getPost('kolektibilitas'),
        ];
        $this->KetKolektibilitasModel->insert_ketkolektibilitas($data);  // Memanggil model untuk menyimpan data kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('ketkolektibilitas'));  // Mengalihkan ke halaman Keterangan Kolektibilitas.
    }

    public function edit($kode_kolektibilitas)
    {
        // Method edit: Menampilkan halaman edit data kolektibilitas berdasarkan kode kolektibilitas.
        $data = [
            'title' => 'Edit Kolektibilitas',  // Mengatur judul tampilan.
            'ketkolektibilitas' => $this->KetKolektibilitasModel->edit_ketkolektibilitas($kode_kolektibilitas),  // Mendapatkan data kolektibilitas yang akan diedit.
            'isi' => 'ketkolektibilitas/v_edit',  // Memuat tampilan 'v_edit' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function update($kode_kolektibilitas)
    {
        // Method update: Menyimpan perubahan data kolektibilitas ke database.
        $data = [
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
            'kolektibilitas' => $this->request->getPost('kolektibilitas'),
        ];
        $this->KetKolektibilitasModel->update_ketkolektibilitas($data, $kode_kolektibilitas);  // Memanggil model untuk menyimpan perubahan data kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Update');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('ketkolektibilitas'));  // Mengalihkan ke halaman Keterangan Kolektibilitas.
    }

    public function delete($kode_kolektibilitas)
    {
        // Method delete: Menghapus data kolektibilitas berdasarkan kode kolektibilitas.
        $this->KetKolektibilitasModel->delete_ketkolektibilitas($kode_kolektibilitas);  // Memanggil model untuk menghapus data kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('ketkolektibilitas'));  // Mengalihkan ke halaman Keterangan Kolektibilitas.
    }
}
