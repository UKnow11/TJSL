<?php

namespace App\Models;

use CodeIgniter\Model;

class DataJaminanModel extends Model
{

    public function get_datajaminan()
    {
        // Method get_datajaminan: Mengambil data jaminan dari tabel 'data_jaminan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_jaminan')->get()->getResultArray();
    }

    public function insert_datajaminan($data)
    {
        // Method insert_datajaminan: Memasukkan data jaminan baru ke dalam tabel 'data_jaminan'.
        return $this->db->table('data_jaminan')->insert($data);
    }

    public function edit_datajaminan($no_kontrak)
    {
        // Method edit_datajaminan: Mengambil data jaminan berdasarkan 'no_kontrak' dari tabel 'data_jaminan' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_jaminan')->where('no_kontrak', $no_kontrak)->get()->getRowArray();
    }

    public function update_datajaminan($data, $no_kontrak)
    {
        // Method update_datajaminan: Memperbarui data jaminan berdasarkan 'no_kontrak' ke dalam tabel 'data_jaminan'.
        return $this->db->table('data_jaminan')->update($data, array('no_kontrak' => $no_kontrak));
    }

    public function delete_datajaminan($no_kontrak)
    {
        // Method delete_datajaminan: Menghapus data jaminan berdasarkan 'no_kontrak' dari tabel 'data_jaminan'.
        return $this->db->table('data_jaminan')->delete(array('no_kontrak' => $no_kontrak));
    }
}
