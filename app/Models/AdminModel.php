<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function get_admin()
    {
        // Method get_admin: Mengambil data admin dari tabel 'tbl_user' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function insert_admin($data)
    {
        // Method insert_admin: Memasukkan data admin baru ke dalam tabel 'tbl_user'.
        return $this->db->table('tbl_user')->insert($data);
    }

    public function edit_admin($id_user)
    {
        // Method edit_admin: Mengambil data admin berdasarkan 'id_user' dari tabel 'tbl_user' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();
    }

    public function update_admin($data, $id_user)
    {
        // Method update_admin: Memperbarui data admin berdasarkan 'id_user' ke dalam tabel 'tbl_user'.
        return $this->db->table('tbl_user')->update($data, array('id_user' => $id_user));
    }

    public function delete_admin($id_user)
    {
        // Method delete_admin: Menghapus data admin berdasarkan 'id_user' dari tabel 'tbl_user'.
        return $this->db->table('tbl_user')->delete(array('id_user' => $id_user));
    }
}
