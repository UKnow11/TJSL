<?php

namespace App\Controllers;

use App\Models\DataJaminanModel;

class DataJaminan extends BaseController
{
    protected $DataJaminanModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi DataJaminanModel untuk berinteraksi dengan database.
        $this->DataJaminanModel = new DataJaminanModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar data jaminan.

        $data = [
            'title' => 'Data Jaminan',                         // Mengatur judul untuk tampilan.
            'datajaminan' => $this->DataJaminanModel->get_datajaminan(),  // Mendapatkan data jaminan dari DataJaminanModel.
            'isi' => 'datajaminan/v_list',                     // Memuat tampilan 'v_list' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data jaminan.

        $data = [
            'title' => 'Tambah Data',                   // Mengatur judul untuk tampilan.
            'isi' => 'datajaminan/v_tambah',           // Memuat tampilan 'v_tambah' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data jaminan.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),         // Mendapatkan data jaminan dari permintaan POST.
            'jaminan' => $this->request->getPost('jaminan'),
            'noxx' => $this->request->getPost('noxx'),
            'keterangan_jaminan' => $this->request->getPost('keterangan_jaminan'),
            'tanggal_jaminan' => $this->request->getPost('tanggal_jaminan'),
            'tempat' => $this->request->getPost('tempat'),
            'jenis_jaminan' => $this->request->getPost('jenis_jaminan'),
            'alamat_jaminan' => $this->request->getPost('alamat_jaminan'),
            'no' => $this->request->getPost('no'),
        ];

        // Memasukkan data jaminan ke dalam database menggunakan DataJaminanModel.
        $this->DataJaminanModel->insert_datajaminan($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'datajaminan' setelah penyisipan data berhasil.
        return redirect()->to(base_url('datajaminan'));
    }

    public function edit($no_kontrak)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data jaminan yang ada.

        $data = [
            'title' => 'Edit User',                           // Mengatur judul untuk tampilan.
            'datajaminan' => $this->DataJaminanModel->edit_datajaminan($no_kontrak), // Mendapatkan data jaminan berdasarkan nomor kontrak.
            'isi' => 'datajaminan/v_edit',                    // Memuat tampilan 'v_edit' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_kontrak)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data jaminan yang ada.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),         // Mendapatkan data jaminan yang diperbarui dari permintaan POST.
            'jaminan' => $this->request->getPost('jaminan'),
            'noxx' => $this->request->getPost('noxx'),
            'keterangan_jaminan' => $this->request->getPost('keterangan_jaminan'),
            'tanggal_jaminan' => $this->request->getPost('tanggal_jaminan'),
            'tempat' => $this->request->getPost('tempat'),
            'jenis_jaminan' => $this->request->getPost('jenis_jaminan'),
            'alamat_jaminan' => $this->request->getPost('alamat_jaminan'),
            'no' => $this->request->getPost('no'),
        ];

        // Memperbarui data jaminan dalam database menggunakan DataJaminanModel.
        $this->DataJaminanModel->update_datajaminan($data, $no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'datajaminan' setelah pembaruan data berhasil.
        return redirect()->to(base_url('datajaminan'));
    }

    public function delete($no_kontrak)
    {
        // Method Delete: Menangani penghapusan data jaminan yang ada.

        // Menghapus data jaminan dari database menggunakan DataJaminanModel berdasarkan nomor kontrak yang diberikan.
        $this->DataJaminanModel->delete_datajaminan($no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'datajaminan' setelah penghapusan data berhasil.
        return redirect()->to(base_url('datajaminan'));
    }
}
