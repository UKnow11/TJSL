<?php

namespace App\Models;

use CodeIgniter\Model;

class KetKolektibilitasModel extends Model
{

    public function get_ketkolektibilitas()
    {
        // Method get_ketkolektibilitas: Mengambil data keterangan kolektibilitas dari tabel 'kel_kolektibilitas' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('kel_kolektibilitas')->get()->getResultArray();
    }

    public function insert_ketkolektibilitas($data)
    {
        // Method insert_ketkolektibilitas: Memasukkan data keterangan kolektibilitas baru ke dalam tabel 'kel_kolektibilitas'.
        return $this->db->table('kel_kolektibilitas')->insert($data);
    }

    public function edit_ketkolektibilitas($kode_kolektibilitas)
    {
        // Method edit_ketkolektibilitas: Mengambil data keterangan kolektibilitas berdasarkan 'kode_kolektibilitas' dari tabel 'kel_kolektibilitas' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('kel_kolektibilitas')->where('kode_kolektibilitas', $kode_kolektibilitas)->get()->getRowArray();
    }

    public function update_ketkolektibilitas($data, $kode_kolektibilitas)
    {
        // Method update_ketkolektibilitas: Memperbarui data keterangan kolektibilitas berdasarkan 'kode_kolektibilitas' ke dalam tabel 'kel_kolektibilitas'.
        return $this->db->table('kel_kolektibilitas')->update($data, array('kode_kolektibilitas' => $kode_kolektibilitas));
    }

    public function delete_ketkolektibilitas($kode_kolektibilitas)
    {
        // Method delete_ketkolektibilitas: Menghapus data keterangan kolektibilitas berdasarkan 'kode_kolektibilitas' dari tabel 'kel_kolektibilitas'.
        return $this->db->table('kel_kolektibilitas')->delete(array('kode_kolektibilitas' => $kode_kolektibilitas));
    }
}
