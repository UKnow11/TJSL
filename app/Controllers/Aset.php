<?php

namespace App\Controllers;

use App\Models\AsetModel;

class Aset extends BaseController
{
    protected $AsetModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi AsetModel untuk interaksi dengan database.
        $this->AsetModel = new AsetModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar aset.

        $data = [
            'title' => 'Aset',                       // Mengatur judul untuk tampilan.
            'aset' => $this->AsetModel->get_aset(), // Mendapatkan data aset dari AsetModel.
            'isi'   => 'aset/v_list',                // Memuat tampilan 'v_list' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data aset.

        $data = [
            'title' => 'Tambah Data',              // Mengatur judul untuk tampilan.
            'isi'   => 'aset/v_tambah',            // Memuat tampilan 'v_tambah' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data aset.

        $data = [
            'no_bukti_transaksi' => $this->request->getPost('no_bukti_transaksi'),           // Mendapatkan data aset dari permintaan POST.
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'nominal' => $this->request->getPost('nominal'),
            'group' => $this->request->getPost('jasa_admin'),
            'keterangan_transaksi' => $this->request->getPost('keterangan_transaksi'),
            'kode_akun' => $this->request->getPost('kode_akun'),
            'debet' => $this->request->getPost('debet'),
            'kredit' => $this->request->getPost('kredit'),
        ];

        // Memasukkan data aset ke dalam database menggunakan AsetModel.
        $this->AsetModel->insert_aset($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'aset' setelah penyisipan data berhasil.
        return redirect()->to(base_url('aset'));
    }

    public function edit($no_bukti_transaksi)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data aset yang ada.

        $data = [
            'title' => 'Edit User',                              // Mengatur judul untuk tampilan.
            'aset' => $this->AsetModel->edit_aset($no_bukti_transaksi), // Mendapatkan data aset berdasarkan nomor bukti transaksi.
            'isi'   => 'aset/v_edit',                            // Memuat tampilan 'v_edit' untuk konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_bukti_transaksi)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data aset yang ada.

        $data = [
            'no_bukti_transaksi' => $this->request->getPost('no_bukti_transaksi'),           // Mendapatkan data aset yang diperbarui dari permintaan POST.
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'nominal' => $this->request->getPost('nominal'),
            'group' => $this->request->getPost('jasa_admin'),
            'keterangan_transaksi' => $this->request->getPost('keterangan_transaksi'),
            'kode_akun' => $this->request->getPost('kode_akun'),
            'debet' => $this->request->getPost('debet'),
            'kredit' => $this->request->getPost('kredit'),
        ];

        // Memperbarui data aset dalam database menggunakan AsetModel.
        $this->AsetModel->update_aset($data, $no_bukti_transaksi);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'aset' setelah pembaruan data berhasil.
        return redirect()->to(base_url('aset'));
    }

    public function delete($no_bukti_transaksi)
    {
        // Method Delete: Menangani penghapusan data aset yang ada.

        // Menghapus data aset dari database menggunakan AsetModel berdasarkan nomor bukti transaksi yang diberikan.
        $this->AsetModel->delete_aset($no_bukti_transaksi);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'aset' setelah penghapusan data berhasil.
        return redirect()->to(base_url('aset'));
    }
}
