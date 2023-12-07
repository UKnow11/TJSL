<?php

namespace App\Controllers;

use App\Models\DataCicilanModel;

class DataCicilan extends BaseController
{
    protected $DataCicilanModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi DataCicilanModel untuk berinteraksi dengan database.
        $this->DataCicilanModel = new DataCicilanModel();
        $pager = \Config\Services::pager(); // Menginisialisasi pager untuk pengaturan halaman.
    }

    public function index()
    {
        // Method Index: Menampilkan daftar data cicilan.

        $data = [
            'title' => 'Data Cicilan',                       // Mengatur judul untuk tampilan.
            'datacicilan' => $this->DataCicilanModel->paginate(12528), // Mendapatkan data cicilan dari DataCicilanModel dengan paginasi.
            'pager' => $this->DataCicilanModel->pager,        // Mendapatkan data pager untuk tampilan halaman.
            'isi' => 'datacicilan/v_list',                    // Memuat tampilan 'v_list' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data cicilan.

        $data = [
            'title' => 'Tambah Data',                   // Mengatur judul untuk tampilan.
            'isi' => 'datacicilan/v_tambah',           // Memuat tampilan 'v_tambah' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data cicilan.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),                       // Mendapatkan data cicilan dari permintaan POST.
            'tanggal_cicilan' => $this->request->getPost('tanggal_cicilan'),
            'angsuran_pokok' => $this->request->getPost('angsuran_pokok'),
            'angsuran_jasa' => $this->request->getPost('angsuran_jasa'),
            'keterangan_cicilan' => $this->request->getPost('keterangan_cicilan'),
            'no_cicilan' => $this->request->getPost('no_cicilan'),
            'pb' => $this->request->getPost('pb'),
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
        ];

        // Memasukkan data cicilan ke dalam database menggunakan DataCicilanModel.
        $this->DataCicilanModel->insert_datacicilan($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'datacicilan' setelah penyisipan data berhasil.
        return redirect()->to(base_url('datacicilan'));
    }

    public function edit($no_kontrak)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data cicilan yang ada.

        $data = [
            'title' => 'Edit User',                                   // Mengatur judul untuk tampilan.
            'datacicilan' => $this->DataCicilanModel->edit_datacicilan($no_kontrak), // Mendapatkan data cicilan berdasarkan nomor kontrak.
            'isi' => 'datacicilan/v_edit',                          // Memuat tampilan 'v_edit' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_kontrak)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data cicilan yang ada.

        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),                       // Mendapatkan data cicilan yang diperbarui dari permintaan POST.
            'tanggal_cicilan' => $this->request->getPost('tanggal_cicilan'),
            'angsuran_pokok' => $this->request->getPost('angsuran_pokok'),
            'angsuran_jasa' => $this->request->getPost('angsuran_jasa'),
            'keterangan_cicilan' => $this->request->getPost('keterangan_cicilan'),
            'no_cicilan' => $this->request->getPost('no_cicilan'),
            'pb' => $this->request->getPost('pb'),
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
        ];

        // Memperbarui data cicilan dalam database menggunakan DataCicilanModel.
        $this->DataCicilanModel->update_datacicilan($data, $no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'datacicilan' setelah pembaruan data berhasil.
        return redirect()->to(base_url('datacicilan'));
    }

    public function delete($no_kontrak)
    {
        // Method Delete: Menangani penghapusan data cicilan yang ada.

        // Menghapus data cicilan dari database menggunakan DataCicilanModel berdasarkan nomor kontrak yang diberikan.
        $this->DataCicilanModel->delete_datacicilan($no_kontrak);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'datacicilan' setelah penghapusan data berhasil.
        return redirect()->to(base_url('datacicilan'));
    }
}
