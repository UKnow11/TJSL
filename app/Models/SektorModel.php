<?php

namespace App\Models;

use CodeIgniter\Model;

class SektorModel extends Model
{
    public function get_sektor()
    {
        // Method get_sektor: Digunakan untuk mengambil data sektor usaha dari tabel 'sektor'.
        return $this->db->table('sektor')->get()->getResultArray();
    }

    public function insert_sektor($data)
    {
        // Method insert_sektor: Digunakan untuk menyisipkan (insert) data sektor usaha ke dalam tabel 'sektor'.
        return $this->db->table('sektor')->insert($data);
    }

    public function edit_sektor($kode_jenis_usaha)
    {
        // Method edit_sektor: Digunakan untuk mengambil data sektor usaha berdasarkan 'kode_jenis_usaha'.
        return $this->db->table('sektor')->where('kode_jenis_usaha', $kode_jenis_usaha)->get()->getRowArray();
    }

    public function update_sektor($data, $kode_jenis_usaha)
    {
        // Method update_sektor: Digunakan untuk memperbarui (update) data sektor usaha berdasarkan 'kode_jenis_usaha'.
        return $this->db->table('sektor')->update($data, array('kode_jenis_usaha' => $kode_jenis_usaha));
    }

    public function delete_sektor($kode_jenis_usaha)
    {
        // Method delete_sektor: Digunakan untuk menghapus data sektor usaha berdasarkan 'kode_jenis_usaha'.
        return $this->db->table('sektor')->delete(array('kode_jenis_usaha' => $kode_jenis_usaha));
    }
}
