<?php

namespace App\Controllers;

use App\Models\KolektibilitasModel;

class Kolektibilitas extends BaseController
{
    protected $KolektibilitasModel;
    public function __construct()
    {
        $this->KolektibilitasModel = new KolektibilitasModel();
        $pager = \Config\Services::pager();
    }

    public function index()
    {
        // Method Index: Menampilkan halaman Kolektibilitas dengan daftar data cicilan kolektibilitas.
        $data = [
            'title' => 'Kolektibilitas',  // Mengatur judul tampilan.
            'kolektibilitas' => $this->KolektibilitasModel->paginate(12528),  // Mengambil data cicilan kolektibilitas dan melakukan penomoran halaman.
            'pager' => $this->KolektibilitasModel->pager,  // Mengatur pengaturan halaman.
            'isi' => 'kolektibilitas/v_list',  // Memuat tampilan 'v_list' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function tambah()
    {
        // Method tambah: Menampilkan halaman tambah data cicilan kolektibilitas.
        $data = [
            'title' => 'Tambah Data',  // Mengatur judul tampilan.
            'isi' => 'kolektibilitas/v_tambah',  // Memuat tampilan 'v_tambah' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function save()
    {
        // Method save: Menyimpan data cicilan kolektibilitas yang baru ditambahkan ke database.
        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),
            'tanggal_cicilan' => $this->request->getPost('tanggal_cicilan'),
            'angsuran_pokok' => $this->request->getPost('angsuran_pokok'),
            'angsuran_jasa' => $this->request->getPost('angsuran_jasa'),
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
        ];
        $this->KolektibilitasModel->insert_kolektibilitas($data);  // Memanggil model untuk menyimpan data cicilan kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Tambahkan');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('kolektibilitas'));  // Mengalihkan ke halaman Kolektibilitas.
    }

    public function edit($no_kontrak)
    {
        // Method edit: Menampilkan halaman edit data cicilan kolektibilitas berdasarkan nomor kontrak.
        $data = [
            'title' => 'Edit',  // Mengatur judul tampilan.
            'kolektibilitas' => $this->KolektibilitasModel->edit_kolektibilitas($no_kontrak),  // Mendapatkan data cicilan kolektibilitas yang akan diedit.
            'isi' => 'kolektibilitas/v_edit',  // Memuat tampilan 'v_edit' sebagai konten halaman.
        ];
        echo view('layout/v_wrapper', $data);  // Memuat tampilan 'v_wrapper' dan meneruskan data untuk merender halaman lengkap.
    }

    public function update($no_kontrak)
    {
        // Method update: Menyimpan perubahan data cicilan kolektibilitas ke database.
        $data = [
            'no_kontrak' => $this->request->getPost('no_kontrak'),
            'tanggal_cicilan' => $this->request->getPost('tanggal_cicilan'),
            'angsuran_pokok' => $this->request->getPost('angsuran_pokok'),
            'angsuran_jasa' => $this->request->getPost('angsuran_jasa'),
            'kode_kolektibilitas' => $this->request->getPost('kode_kolektibilitas'),
        ];
        $this->KolektibilitasModel->update_kolektibilitas($data, $no_kontrak);  // Memanggil model untuk menyimpan perubahan data cicilan kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Update');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('kolektibilitas'));  // Mengalihkan ke halaman Kolektibilitas.
    }

    public function delete($no_kontrak)
    {
        // Method delete: Menghapus data cicilan kolektibilitas berdasarkan nomor kontrak.
        $this->KolektibilitasModel->delete_datacicilan($no_kontrak);  // Memanggil model untuk menghapus data cicilan kolektibilitas.
        session()->setFlashdata('success', 'Data Berhasil di Hapus');  // Menampilkan pesan sukses.
        return redirect()->to(base_url('kolektibilitas'));  // Mengalihkan ke halaman Kolektibilitas.
    }

    public function hitung_kolektibilitas($no_kontrak)
    {
        // Method untuk menghitung kolektibilitas berdasarkan nomor kontrak
        
        $model = model(KolektibilitasModel::class);
        
        // Pokok dan jasa masih belum ada tabelnya
        $pokok = 0;
        $jasa = 0;

        for($i = 1; $i = $model->where('angsuran_pokok !=', 0)->countAllResults(); $i++)
        {
            $tanggal = new DateTime($model->select('tanggal_cicilan')->where('no_kontrak', $no_kontrak)->where('no_cicilan', $i));
            $cicilan = $model->where('angsuran_pokok !=', 0)->where('no_kontrak', $no_kontrak)->where('no_cicilan', $i)->get();

            if(empty($tanggalLunas))
            {
                $selisihHari = (empty($tanggalSebelumnya) ? 0 : $tanggal->diff($tanggalSebelumnya)->days);
            } else {
                $selisihHari = (empty($tanggalLunas) ? 0 : $tanggal->diff($tanggalLunas)->days);
            }
            $cicilan = $cicilan - $jasa - $selisih;

            if($cicilan == $pokok || $cicilan > $pokok)
            {
                $selisih = 0;
            } else if($cicilan < $pokok) {
                $selisih = $pokok - $cicilan;
            }
        
            if($selisih != 0)
            {
                if($cicilanSebelumnya + $selisihSebelumnya == pokok && $cicilan > 0)
                {
                    $tanggalLunas = $tanggalSebelumnya;
                } else if($cicilan < 0)
                {
                    if(empty($tanggalLunas))
                    {
                        $tanggalLunas = $tanggalSebelumnya;
                    }
                    $selisihHari = (empty($tanggalLunas) ? 0 : $tanggal->diff($tanggalLunas)->days);
                }
            } else {
                if($selisihSebelumnya != 0)
                {
                    $tanggalLunas = $tanggalSebelumnya;
                    $selisihHari = (empty($tanggalLunas) ? 0 : $tanggal->diff($tanggalLunas)->days); 
                }
                $tanggalLunas = $tanggal;
            }
        
            if($selisihHari <= 30)
            {
                $kolek = 1;
            } else if($selisihHari > 30 && $selisihHari <= 90) {
                $kolek = 2;
            } else if($selisihHari > 90 && $selisihHari <= 180) {
                $kolek = 3;
            } else if($selisihHari > 180) {
                $kolek = 4;
            }
    
            // If untuk mengecek situasi dimana kolektibilitas hanya dapat naik perlahan
            if($kolek < $kolekSebelumnya)
            {
                $kolek = $kolekSebelumnya - 1;
        
                // If untuk mengecek cicilan parsial sehingga kolektabilitas tidak dapat naik
                if($selisihSebelumnya != 0 && $selisih != 0 && $kolek < 4)
                {
        	        $kolek = $kolekSebelumnya;
		        }
            }
                // If untuk mengecek perubahan cicilan full menjadi cicilan parsial sehingga kolektibilitas naik satu
            if($selisihSebelumnya == 0 && $selisih != 0 && $kolekSebelumnya < 4)
            {
                $kolek+=1;
            }

            $kolekSebelumnya = $kolek;
            $cicilanSebelumnya = $cicilan;
            $tanggalSebelumnya = $tanggal;
            $selisihSebelumnya = $selisih;
        }
        session()->setFlashdata('success', 'Kolektibilitas Berhasil Di Hitung');

        return $kolek;
    }
}
