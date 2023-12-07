<?php

namespace App\Controllers;

use App\Models\KodeRekeningModel;

class KodeRekening extends BaseController
{
    protected $KodeRekeningModel;

    public function __construct()
    {
        $this->KodeRekeningModel = new KodeRekeningModel();
    }

    public function index()
    {
        // Method Index: Menampilkan halaman Kode Rekening dengan daftar kode akun.
        $data = [
            'title' => 'Kode Rekening',  // Mengatur judul tampilan.
            'koderekening' => $this->KodeRekeningModel->get_koderekening(),  // Mendapatkan daftar kode akun.
            'isi' => 'koderekening/v_list',  // Memuat tampilan 'v_list' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function tambah()
    {
        // Method tambah: Menampilkan halaman tambah data kode akun.
        $data = [
            'title' => 'Tambah Data',  // Mengatur judul tampilan.
            'isi' => 'koderekening/v_tambah',  // Memuat tampilan 'v_tambah' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function save()
    {
        // Method save: Menyimpan data kode akun yang baru ditambahkan ke database.
        $data = [
            'kode_akun' => $this->request->getPost('kode_akun'),
            'keterangan_akun' => $this->request->getPost('keterangan_akun'),
        ];
        $this->KodeRekeningModel->insert_koderekening($data);  // Memanggil model untuk menyimpan data kode akun.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('koderekening'));  // Mengalihkan ke halaman Kode Rekening.
    }

    public function edit($kode_akun)
    {
        // Method edit: Menampilkan halaman edit data kode akun berdasarkan kode akun.
        $data = [
            'title' => 'Edit Kode Rekening',  // Mengatur judul tampilan.
            'koderekening' => $this->KodeRekeningModel->edit_koderekening($kode_akun),  // Mendapatkan data kode akun yang akan diedit.
            'isi' => 'koderekening/v_edit',  // Memuat tampilan 'v_edit' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function update($kode_akun)
    {
        // Method update: Menyimpan perubahan data kode akun ke database.
        $data = [
            'kode_akun' => $this->request->getPost('kode_akun'),
            'keterangan_akun' => $this->request->getPost('keterangan_akun'),
        ];
        $this->KodeRekeningModel->update_koderekening($data, $kode_akun);  // Memanggil model untuk menyimpan perubahan data kode akun.
        session()->setFlashdata('success', 'Data Berhasil di Update');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('koderekening'));  // Mengalihkan ke halaman Kode Rekening.
    }

    public function delete($kode_akun)
    {
        // Method delete: Menghapus data kode akun berdasarkan kode akun.
        $this->KodeRekeningModel->delete_koderekening($kode_akun);  // Memanggil model untuk menghapus data kode akun.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('koderekening'));  // Mengalihkan ke halaman Kode Rekening.
    }
}
