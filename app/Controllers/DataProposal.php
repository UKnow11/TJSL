<?php

namespace App\Controllers;

use App\Models\DataProposalModel;

class DataProposal extends BaseController
{
    protected $DataProposalModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi DataProposalModel untuk berinteraksi dengan database.
        $this->DataProposalModel = new DataProposalModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar data proposal.

        $data = [
            'title' => 'Data Proposal',                            // Mengatur judul untuk tampilan.
            'dataproposal' => $this->DataProposalModel->get_dataproposal(), // Mendapatkan data proposal dari DataProposalModel.
            'isi' => 'dataproposal/v_list',                        // Memuat tampilan 'v_list' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data proposal.

        $data = [
            'title' => 'Tambah Data',               // Mengatur judul untuk tampilan.
            'isi' => 'dataproposal/v_tambah',       // Memuat tampilan 'v_tambah' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data proposal.

        $data = [
            'no_proposal' => $this->request->getPost('no_proposal'),               // Mendapatkan data proposal dari permintaan POST.
            'tanggal_masuk_proposal' => $this->request->getPost('tanggal_masuk_proposal'),
            'status_proposal' => $this->request->getPost('status_proposal'),
            'nama' => $this->request->getPost('nama'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            'alamat_usaha' => $this->request->getPost('alamat_usaha'),
            'kota' => $this->request->getPost('kota'),
            'sektor_usaha' => $this->request->getPost('sektor_usaha'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'mulai_usaha' => $this->request->getPost('mulai_usaha'),
            'no_identitas' => $this->request->getPost('no_identitas'),
            'jumlah_pengajuan' => $this->request->getPost('jumlah_pengajuan'),
        ];

        // Memasukkan data proposal ke dalam database menggunakan DataProposalModel.
        $this->DataProposalModel->insert_dataproposal($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'dataproposal' setelah penyisipan data berhasil.
        return redirect()->to(base_url('dataproposal'));
    }

    public function edit($no_proposal)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data proposal yang ada.

        $data = [
            'title' => 'Edit User',                               // Mengatur judul untuk tampilan.
            'dataproposal' => $this->DataProposalModel->edit_dataproposal($no_proposal), // Mendapatkan data proposal berdasarkan nomor proposal.
            'isi' => 'dataproposal/v_edit',                         // Memuat tampilan 'v_edit' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_proposal)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data proposal yang ada.

        $data = [
            'no_proposal' => $this->request->getPost('no_proposal'),               // Mendapatkan data proposal yang diperbarui dari permintaan POST.
            'tanggal_masuk_proposal' => $this->request->getPost('tanggal_masuk_proposal'),
            'status_proposal' => $this->request->getPost('status_proposal'),
            'nama' => $this->request->getPost('nama'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            'alamat_usaha' => $this->request->getPost('alamat_usaha'),
            'kota' => $this->request->getPost('kota'),
            'sektor_usaha' => $this->request->getPost('sektor_usaha'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'mulai_usaha' => $this->request->getPost('mulai_usaha'),
            'no_identitas' => $this->request->getPost('no_identitas'),
            'jumlah_pengajuan' => $this->request->getPost('jumlah_pengajuan'),
        ];

        // Memperbarui data proposal dalam database menggunakan DataProposalModel.
        $this->DataProposalModel->update_dataproposal($data, $no_proposal);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'dataproposal' setelah pembaruan data berhasil.
        return redirect()->to(base_url('dataproposal'));
    }

    public function delete($no_proposal)
    {
        // Method Delete: Menangani penghapusan data proposal yang ada.

        // Menghapus data proposal dari database menggunakan DataProposalModel berdasarkan nomor proposal yang diberikan.
        $this->DataProposalModel->delete_dataproposal($no_proposal);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'dataproposal' setelah penghapusan data berhasil.
        return redirect()->to(base_url('dataproposal'));
    }
}
