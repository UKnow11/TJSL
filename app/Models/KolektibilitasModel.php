<?php

namespace App\Models;

use CodeIgniter\Model;

class KolektibilitasModel extends Model
{
    protected $table = 'cicilan';

    public function get_kolektibilitas()
    {
        // Method get_kolektibilitas: Mengambil data kolektibilitas dengan menggabungkan tabel 'cicilan' dengan tabel 'data_master' berdasarkan 'nama_mitra_binaan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('cicilan')
            ->join('data_master', 'data_master.nama_mitra_binaan = cicilan.nama_mitra_binaan')
            ->get()->getResultArray();
    }

    public function insert_kolektibilitas($data)
    {
        // Method insert_kolektibilitas: Memasukkan data kolektibilitas baru ke dalam tabel 'cicilan'.
        return $this->db->table('cicilan')->insert($data);
    }

    public function edit_kolektibilitas($no_kontrak)
    {
        // Method edit_kolektibilitas: Mengambil data kolektibilitas berdasarkan 'no_kontrak' dari tabel 'cicilan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('cicilan')->where('no_kontrak', $no_kontrak)->get()->getRowArray();
    }

    public function update_kolektibilitas($data, $no_kontrak)
    {
        // Method update_kolektibilitas: Memperbarui data kolektibilitas berdasarkan 'no_kontrak' ke dalam tabel 'cicilan'.
        return $this->db->table('cicilan')->update($data, array('no_kontrak' => $no_kontrak));
    }

    public function delete_kolektibilitas($no_kontrak)
    {
        // Method delete_kolektibilitas: Menghapus data kolektibilitas berdasarkan 'no_kontrak' dari tabel 'cicilan'.
        return $this->db->table('cicilan')->delete(array('no_kontrak' => $no_kontrak));
    }
}
