<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    public function get_aset()
    {
        // Method get_aset: Mengambil data aset dari tabel 'aset' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('aset')->get()->getResultArray();
    }

    public function insert_aset($data)
    {
        // Method insert_aset: Memasukkan data aset baru ke dalam tabel 'aset'.
        return $this->db->table('aset')->insert($data);
    }

    public function edit_aset($no_bukti_transaksi)
    {
        // Method edit_aset: Mengambil data aset berdasarkan 'no_bukti_transaksi' dari tabel 'aset' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('aset')->where('no_bukti_transaksi', $no_bukti_transaksi)->get()->getRowArray();
    }

    public function update_aset($data, $no_bukti_transaksi)
    {
        // Method update_aset: Memperbarui data aset berdasarkan 'no_bukti_transaksi' ke dalam tabel 'aset'.
        return $this->db->table('aset')->update($data, array('no_bukti_transaksi' => $no_bukti_transaksi));
    }

    public function delete_aset($no_bukti_transaksi)
    {
        // Method delete_aset: Menghapus data aset berdasarkan 'no_bukti_transaksi' dari tabel 'aset'.
        return $this->db->table('aset')->delete(array('no_bukti_transaksi' => $no_bukti_transaksi));
    }
}
