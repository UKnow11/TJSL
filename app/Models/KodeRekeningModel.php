<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeRekeningModel extends Model
{

    public function get_koderekening()
    {
        // Method get_koderekening: Mengambil data kode rekening dari tabel 'kode_rekening' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('kode_rekening')->get()->getResultArray();
    }

    public function insert_koderekening($data)
    {
        // Method insert_koderekening: Memasukkan data kode rekening baru ke dalam tabel 'kode_rekening'.
        return $this->db->table('kode_rekening')->insert($data);
    }

    public function edit_koderekening($kode_akun)
    {
        // Method edit_koderekening: Mengambil data kode rekening berdasarkan 'kode_akun' dari tabel 'kode_rekening' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('kode_rekening')->where('kode_akun', $kode_akun)->get()->getRowArray();
    }

    public function update_koderekening($data, $kode_akun)
    {
        // Method update_koderekening: Memperbarui data kode rekening berdasarkan 'kode_akun' ke dalam tabel 'kode_rekening'.
        return $this->db->table('kode_rekening')->update($data, array('kode_akun' => $kode_akun));
    }

    public function delete_koderekening($kode_akun)
    {
        // Method delete_koderekening: Menghapus data kode rekening berdasarkan 'kode_akun' dari tabel 'kode_rekening'.
        return $this->db->table('kode_rekening')->delete(array('kode_akun' => $kode_akun));
    }
}
