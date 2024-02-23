<?php

namespace App\Controllers;
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');
setlocale(LC_TIME, 'ind');
use App\Models\KolektibilitasModel;
use CodeIgniter\Database\BaseResult;
use CodeIgniter\I18n\Time;

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
            'title' => 'Kolektibilitas Per ' . strftime('%d %B', strtotime("last day of last month")),  // Mengatur judul tampilan.
            // 'kolektibilitas' => $this->KolektibilitasModel->from('(SELECT * , ROW_NUMBER() OVER(PARTITION BY no_kontrak ORDER BY tanggal_cicilan ASC) AS rownum FROM cicilan) AS a')->where('cicilan.angsuran_pokok >', 0)->where('a.rownum', 1)->paginate(6000), // Bisa melakukan view tabel cicilan untuk hasil pertama tapi ngelag dan ngedobel
            'kolektibilitas' => $this->KolektibilitasModel->select('no_kontrak, MIN(tanggal_cicilan) AS tanggal_cicilan' , false)->groupBy('no_kontrak')->paginate(6000), // Mengambil data cicilan kolektibilitas dan melakukan penomoran halaman.
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

    public function display($no_kontrak)
    {
        $data = [
            'title' => 'Kolektibilitas Per ' . strftime('%d %B', strtotime("last day of last month")),  // Mengatur judul tampilan.
            'kolektibilitas' => $this->KolektibilitasModel->display_kolektibilitas($no_kontrak),  // Mendapatkan data cicilan kolektibilitas yang akan diedit.
            'isi' => 'kolektibilitas/v_display',  // Memuat tampilan 'v_edit' sebagai konten halaman.
            'no_kontrak' => $no_kontrak,
        ];
        echo view('layout/v_wrapper', $data);
    }

    public function hitung_kolektibilitas($no_kontrak)
    {
        // Method untuk menghitung kolektibilitas berdasarkan nomor kontrak

        $model = model(KolektibilitasModel::class);
        
        // Pokok dan jasa masih diasumsikan berada pada bayaran pertama dalam tabel cicilan
        $query = $model->select('angsuran_pokok')->where('no_kontrak', $no_kontrak)->orderBy('tanggal_cicilan', 'ASC')->limit(1)->get()->getRowArray();
        $pokoktetap = (int)implode("", $query);
        $query = $model->select('angsuran_jasa')->where('no_kontrak', $no_kontrak)->orderBy('tanggal_cicilan', 'ASC')->limit(1)->get()->getRowArray();
        $jasatetap = (int)implode("", $query);
        $pokok = 0;
        $jasa = 0;
        $selisih = 0;
        $selisihSebelumnya = 0;
        $kolek = 0;
        $kolekSebelumnya = 0;
        $cicilan = 0;
        $cicilanSebelumnya = 0;
        $totalkolek = array();
        $tanggalSebelumnya = 0;
        $tanggalLunas = 0;

        $total = $model->distinct()->where('no_kontrak', $no_kontrak)->orderBy('tanggal_cicilan', 'ASC')->get()->getNumRows();

        if($total > 5)
        {
            $offset = $total - 5;
        } else {
            $offset = 0;
        }
        
        // Variabel query disini, kalo bisa jangan dipakai kembali karena akan digunakan kembali pada loop for
        $query = $model->distinct()->where('no_kontrak', $no_kontrak)->orderBy('tanggal_cicilan', 'ASC')->limit($offset, 5)->get();
        $row = $query->getRowArray();

        for($j = 0; $j < $total - $offset; $j++)
        {
            if(isset($row))
            {
                $tanggal = strtotime($row['tanggal_cicilan']);
                $pokok = $row['angsuran_pokok'];
                $jasa = $row['angsuran_jasa'];
            }
            
            $cicilan = $pokok + $jasa;
            
            if($j == $total - $offset - 1)
            {
                $tanggal = strtotime("last day of last month");
            }

            if($tanggalLunas == 0)
            {
                $selisihHari = ($tanggalSebelumnya == 0 ? 0 : round(abs($tanggalSebelumnya - $tanggal) / 86400));
            } else {
                $selisihHari = ($tanggalLunas == 0 ? 0 : round(abs($tanggalLunas - $tanggal / 86400)));
            }
            

            $cicilan = $cicilan - $jasatetap - $selisih;
    
            if($cicilan == $pokoktetap || $cicilan > $pokoktetap)
            {
                $selisih = 0;
            } else if($cicilan < $pokoktetap) {
                $selisih = $pokoktetap - $cicilan;
            }
            
            if($selisih != 0)
            {
                if($cicilanSebelumnya + $selisihSebelumnya == $pokoktetap && $cicilan > 0)
                {
                    $tanggalLunas = $tanggalSebelumnya;
                } else if($cicilan < 0) {
                    if($tanggalLunas == 0)
                    {
                        $tanggalLunas = $tanggalSebelumnya;
                    }
                    $selisihHari = ($tanggalLunas == 0 ? 0 : round(abs($tanggalLunas - $tanggal) / 86400));
                } else {
                    if($selisihSebelumnya != 0)
                    {
                        $tanggalLunas = $tanggalSebelumnya;
                        $selisihHari = ($tanggalLunas == 0 ? 0 : round(abs($tanggalLunas - $tanggal) / 86400)); 
                    }
                    $tanggalLunas = $tanggal;
                }
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
            if($selisihSebelumnya == 0 && $selisih != 0 && $kolekSebelumnya < 4 && $kolek != 4)
            {
                $kolek+=1;
            }

            $kolekSebelumnya = $kolek;
            $cicilanSebelumnya = $cicilan;
            $tanggalSebelumnya = $tanggal;
            $selisihSebelumnya = $selisih;
            $row = $query->getNextRow('array');
        }
        $query = $model->select('tanggal_cicilan')->distinct()->where('no_kontrak', $no_kontrak)->orderBy('tanggal_cicilan', 'DESC')->limit(1)->get()->getRowArray();
        $model->set('kode_kolektibilitas', $kolek, false)->where('tanggal_cicilan', $query)->update();
        return redirect()->to(base_url('kolektibilitas/display/' . $no_kontrak));
    }

    public function cek_kolektibilitas()
    {
        $model = model(KolektibilitasModel::class);
        $total = $model->select('no_kontrak')->distinct()->getNumRows();

        $query = $model->select('no_kontrak')->distinct()->orderBy('no_kontrak',  'ASC');
        $row = $query->getRowArray();
        
        for($i = 0; $i < $total; $i++)
        {
            if(isset($row))
            {
                $no_kontrak = $row['no_kontrak'];
            }
            $this->hitung_kolektibilitas($no_kontrak);
            $row = $query->getNextRow('array');
        }
        
        return redirect()->to(base_url('kolektibilitas'));
    }
}