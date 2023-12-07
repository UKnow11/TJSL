<?php

namespace App\Controllers;

use App\Models\DataSurveyModel;

class DataSurvey extends BaseController
{
    protected $DataSurveyModel;

    public function __construct()
    {
        // Konstruktor: Inisialisasi DataSurveyModel untuk berinteraksi dengan database.
        $this->DataSurveyModel = new DataSurveyModel();
    }

    public function index()
    {
        // Method Index: Menampilkan daftar data survey.

        $data = [
            'title' => 'Data Survey',                              // Mengatur judul untuk tampilan.
            'datasurvey' => $this->DataSurveyModel->get_datasurvey(), // Mendapatkan data survey dari DataSurveyModel.
            'isi' => 'datasurvey/v_list',                         // Memuat tampilan 'v_list' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        // Method Tambah: Menampilkan formulir untuk menambahkan data survey.

        $data = [
            'title' => 'Tambah Data',                // Mengatur judul untuk tampilan.
            'isi' => 'datasurvey/v_tambah',          // Memuat tampilan 'v_tambah' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        // Method Save: Menangani pengiriman formulir untuk menambahkan data survey.

        $data = [
            'no_proposal' => $this->request->getPost('no_proposal'),               // Mendapatkan data survey dari permintaan POST.
            'tanggal_survey' => $this->request->getPost('tanggal_survey'),
            'petugas_survey_1' => $this->request->getPost('petugas_survey_1'),
            'petugas_survey_2' => $this->request->getPost('petugas_survey_2'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        // Memasukkan data survey ke dalam database menggunakan DataSurveyModel.
        $this->DataSurveyModel->insert_datasurvey($data);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');

        // Mengalihkan ke halaman 'datasurvey' setelah penyisipan data berhasil.
        return redirect()->to(base_url('datasurvey'));
    }

    public function edit($no_proposal)
    {
        // Method Edit: Menampilkan formulir untuk mengedit data survey yang ada.

        $data = [
            'title' => 'Edit User',                               // Mengatur judul untuk tampilan.
            'datasurvey' => $this->DataSurveyModel->edit_datasurvey($no_proposal), // Mendapatkan data survey berdasarkan nomor proposal.
            'isi' => 'datasurvey/v_edit',                         // Memuat tampilan 'v_edit' sebagai konten.
        ];

        // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
        echo view('layout/v_wrapper', $data);
    }

    public function update($no_proposal)
    {
        // Method Update: Menangani pengiriman formulir untuk memperbarui data survey yang ada.

        $data = [
            'no_proposal' => $this->request->getPost('no_proposal'),               // Mendapatkan data survey yang diperbarui dari permintaan POST.
            'tanggal_survey' => $this->request->getPost('tanggal_survey'),
            'petugas_survey_1' => $this->request->getPost('petugas_survey_1'),
            'petugas_survey_2' => $this->request->getPost('petugas_survey_2'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        // Memperbarui data survey dalam database menggunakan DataSurveyModel.
        $this->DataSurveyModel->update_datasurvey($data, $no_proposal);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Update');

        // Mengalihkan ke halaman 'datasurvey' setelah pembaruan data berhasil.
        return redirect()->to(base_url('datasurvey'));
    }

    public function delete($no_proposal)
    {
        // Method Delete: Menangani penghapusan data survey yang ada.

        // Menghapus data survey dari database menggunakan DataSurveyModel berdasarkan nomor proposal yang diberikan.
        $this->DataSurveyModel->delete_datasurvey($no_proposal);

        // Menetapkan pesan sukses yang akan ditampilkan setelah pengalihan.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');

        // Mengalihkan ke halaman 'datasurvey' setelah penghapusan data berhasil.
        return redirect()->to(base_url('datasurvey'));
    }
}
