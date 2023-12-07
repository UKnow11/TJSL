<?php

namespace App\Controllers;

use App\Models\DataKontrakModel;

class DataKontrak extends BaseController
{
    protected $DataKontrakModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi DataKontrakModel untuk berinteraksi dengan database.
        $this->DataKontrakModel = new DataKontrakModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar data kontrak.

        $data = [
            'title' => 'Data Kontrak',                       // Mengatur judul untuk tampilan.
            'datakontrak' => $this->DataKontrakModel->get_datakontrak(), // Mendapatkan data kontrak dari DataKontrakModel.
            'isi' => 'datakontrak/v_list',                   // Memuat tampilan 'v_list' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data kontrak.

        $data = [
            'title' => 'Tambah Data',               // Mengatur judul untuk tampilan.
            'isi' => 'datakontrak/v_tambah',       // Memuat tampilan 'v_tambah' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data kontrak.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),                       // Mendapatkan data kontrak dari permintaan POST.
            'tahun_kontrak' => $this->request->getPost('tahun_kontrak'),
            'nominal_pendanaan' => $this->request->getPost('nominal_pendanaan'),
            'jasa_admin' => $this->request->getPost('jasa_admin'),
            'cicilan_per_bulan' => $this->request->getPost('cicilan_per_bulan'),
            'lama_angsuran' => $this->request->getPost('lama_angsuran'),
            'mulai_cicilan' => $this->request->getPost('mulai_cicilan'),
            'tgl_jatuh_tempo' => $this->request->getPost('tgl_jatuh_tempo'),
            'kolektibilitas' => $this->request->getPost('kolektibilitas'),
            'tgl_realisasi' => $this->request->getPost('tgl_realisasi'),
            'kondisi' => $this->request->getPost('kondisi'),
        ];

        // Memasukkan data kontrak ke dalam database menggunakan DataKontrakModel.
        $this->DataKontrakModel->insert_datakontrak($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'datakontrak' setelah penyisipan data berhasil.
        return redirect()->to(base_url('datakontrak'));
    }

    public function edit($no_kontrak)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data kontrak yang ada.

        $data = [
            'title' => 'Edit User',                               // Mengatur judul untuk tampilan.
            'datakontrak' => $this->DataKontrakModel->edit_datakontrak($no_kontrak), // Mendapatkan data kontrak berdasarkan nomor kontrak.
            'isi' => 'datakontrak/v_edit',                         // Memuat tampilan 'v_edit' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_kontrak)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data kontrak yang ada.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),                       // Mendapatkan data kontrak yang diperbarui dari permintaan POST.
            'tahun_kontrak' => $this->request->getPost('tahun_kontrak'),
            'nominal_pendanaan' => $this->request->getPost('nominal_pendanaan'),
            'jasa_admin' => $this->request->getPost('jasa_admin'),
            'cicilan_per_bulan' => $this->request->getPost('cicilan_per_bulan'),
            'lama_angsuran' => $this->request->getPost('lama_angsuran'),
            'mulai_cicilan' => $this->request->getPost('mulai_cicilan'),
            'tgl_jatuh_tempo' => $this->request->getPost('tgl_jatuh_tempo'),
            'kolektibilitas' => $this->request->getPost('kolektibilitas'),
            'tgl_realisasi' => $this->request->getPost('tgl_realisasi'),
            'kondisi' => $this->request->getPost('kondisi'),
        ];

        // Memperbarui data kontrak dalam database menggunakan DataKontrakModel.
        $this->DataKontrakModel->update_datakontrak($data, $no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'datakontrak' setelah pembaruan data berhasil.
        return redirect()->to(base_url('datakontrak'));
    }

    public function delete($no_kontrak)
    {
        // Method Delete: Menangani penghapusan data kontrak yang ada.

        // Menghapus data kontrak dari database menggunakan DataKontrakModel berdasarkan nomor kontrak yang diberikan.
        $this->DataKontrakModel->delete_datakontrak($no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'datakontrak' setelah penghapusan data berhasil.
        return redirect()->to(base_url('datakontrak'));
    }
}
