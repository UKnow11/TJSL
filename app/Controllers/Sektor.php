<?php

namespace App\Controllers;

use App\Models\SektorModel;

class Sektor extends BaseController
{
    protected $SektorModel;

    public function __construct()
    {
        $this->SektorModel = new SektorModel();
    }

    public function index()
    {
        // Method index: Menampilkan daftar sektor usaha.
        $data = [
            'title' => 'Sektor',  // Mengatur judul halaman.
            'sektor' => $this->SektorModel->get_sektor(),  // Mengambil data sektor usaha dari model.
            'isi' => 'sektor/v_list',  // Menampilkan tampilan daftar sektor usaha ('sektor/v_list').
        ];
        echo view('layout/v_wrapper', $data);  // Menampilkan tampilan dengan tata letak umum ('v_wrapper') dan data yang diteruskan.
    }

    public function tambah()
    {
        // Method tambah: Menampilkan halaman tambah data sektor usaha.
        $data = [
            'title' => 'Tambah Data',  // Mengatur judul halaman.
            'isi' => 'sektor/v_tambah',  // Menampilkan tampilan tambah data sektor usaha ('sektor/v_tambah').
        ];
        echo view('layout/v_wrapper', $data);  // Menampilkan tampilan dengan tata letak umum ('v_wrapper') dan data yang diteruskan.
    }

    public function save()
    {
        // Method save: Menyimpan data sektor usaha yang baru ditambahkan.
        $data = [
            'kode_jenis_usaha' => $this->request->getPost('kode_jenis_usaha'),  // Mengambil kode jenis usaha dari input form.
            'nama_jenis_usaha' => $this->request->getPost('nama_jenis_usaha'),  // Mengambil nama jenis usaha dari input form.
        ];
        $this->SektorModel->insert_sektor($data);  // Memanggil model untuk menyimpan data sektor usaha yang baru.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('sektor'));  // Mengalihkan pengguna kembali ke halaman daftar sektor usaha.
    }

    public function edit($kode_jenis_usaha)
    {
        // Method edit: Menampilkan halaman edit data sektor usaha berdasarkan kode jenis usaha.
        $data = [
            'title' => 'Edit Sektor',  // Mengatur judul halaman.
            'sektor' => $this->SektorModel->edit_sektor($kode_jenis_usaha),  // Mengambil data sektor usaha berdasarkan kode jenis usaha dari model.
            'isi' => 'sektor/v_edit',  // Menampilkan tampilan edit data sektor usaha ('sektor/v_edit').
        ];
        echo view('layout/v_wrapper', $data);  // Menampilkan tampilan dengan tata letak umum ('v_wrapper') dan data yang diteruskan.
    }

    public function update($kode_jenis_usaha)
    {
        // Method update: Menyimpan perubahan data sektor usaha setelah diedit.
        $data = [
            'kode_jenis_usaha' => $this->request->getPost('kode_jenis_usaha'),  // Mengambil kode jenis usaha dari input form.
            'nama_jenis_usaha' => $this->request->getPost('nama_jenis_usaha'),  // Mengambil nama jenis usaha dari input form.
        ];
        $this->SektorModel->update_sektor($data, $kode_jenis_usaha);  // Memanggil model untuk menyimpan perubahan data sektor usaha.
        session()->setFlashdata('success', 'Data Berhasil di Update');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('sektor'));  // Mengalihkan pengguna kembali ke halaman daftar sektor usaha.
    }

    public function delete($kode_jenis_usaha)
    {
        // Method delete: Menghapus data sektor usaha berdasarkan kode jenis usaha.
        $this->SektorModel->delete_sektor($kode_jenis_usaha);  // Memanggil model untuk menghapus data sektor usaha.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('sektor'));  // Mengalihkan pengguna kembali ke halaman daftar sektor usaha.
    }
}
