<?php

namespace App\Models;

use CodeIgniter\Model;

class DataCicilanModel extends Model
{
    protected $table = 'cicilan';

    public function get_datacicilan()
    {
        // Method get_datacicilan: Mengambil data cicilan dari tabel 'cicilan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('cicilan')->get()->getResultArray();
    }

    public function insert_datacicilan($data)
    {
        // Method insert_datacicilan: Memasukkan data cicilan baru ke dalam tabel 'cicilan'.
        return $this->db->table('cicilan')->insert($data);
    }

    public function edit_datacicilan($no_kontrak)
    {
        // Method edit_datacicilan: Mengambil data cicilan berdasarkan 'no_kontrak' dari tabel 'cicilan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('cicilan')->where('no_kontrak', $no_kontrak)->get()->getRowArray();
    }

    public function update_datacicilan($data, $no_kontrak)
    {
        // Method update_datacicilan: Memperbarui data cicilan berdasarkan 'no_kontrak' ke dalam tabel 'cicilan'.
        return $this->db->table('cicilan')->update($data, array('no_kontrak' => $no_kontrak));
    }

    public function delete_datacicilan($no_kontrak)
    {
        // Method delete_datacicilan: Menghapus data cicilan berdasarkan 'no_kontrak' dari tabel 'cicilan'.
        return $this->db->table('cicilan')->delete(array('no_kontrak' => $no_kontrak));
    }
}
