<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKontrakModel extends Model
{

    public function get_datakontrak()
    {
        // Method get_datakontrak: Mengambil data kontrak dari tabel 'data_kontrak' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_kontrak')->get()->getResultArray();
    }

    public function insert_datakontrak($data)
    {
        // Method insert_datakontrak: Memasukkan data kontrak baru ke dalam tabel 'data_kontrak'.
        return $this->db->table('data_kontrak')->insert($data);
    }

    public function edit_datakontrak($no_kontrak)
    {
        // Method edit_datakontrak: Mengambil data kontrak berdasarkan 'no_kontrak' dari tabel 'data_kontrak' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_kontrak')->where('no_kontrak', $no_kontrak)->get()->getRowArray();
    }

    public function update_datakontrak($data, $no_kontrak)
    {
        // Method update_datakontrak: Memperbarui data kontrak berdasarkan 'no_kontrak' ke dalam tabel 'data_kontrak'.
        return $this->db->table('data_kontrak')->update($data, array('no_kontrak' => $no_kontrak));
    }

    public function delete_datakontrak($no_kontrak)
    {
        // Method delete_datakontrak: Menghapus data kontrak berdasarkan 'no_kontrak' dari tabel 'data_kontrak'.
        return $this->db->table('data_kontrak')->delete(array('no_kontrak' => $no_kontrak));
    }
}
