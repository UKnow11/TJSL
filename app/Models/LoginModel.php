<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function cek_login($username, $password)
    {
        // Method cek_login: Digunakan untuk memeriksa informasi login pengguna berdasarkan 'username' dan 'password'. 
        // Model ini mencocokkan data pengguna yang sesuai dari tabel 'tbl_user' dan mengembalikan hasilnya dalam bentuk array jika ditemukan.
        return $this->db->table('tbl_user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
