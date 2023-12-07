<?php

namespace App\Models;

use CodeIgniter\Model;

class DataProposalModel extends Model
{

    public function get_dataproposal()
    {
        // Method get_dataproposal: Mengambil data proposal dari tabel 'data_proposal' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_proposal')->get()->getResultArray();
    }

    public function insert_dataproposal($data)
    {
        // Method insert_dataproposal: Memasukkan data proposal baru ke dalam tabel 'data_proposal'.
        return $this->db->table('data_proposal')->insert($data);
    }

    public function edit_dataproposal($no_proposal)
    {
        // Method edit_dataproposal: Mengambil data proposal berdasarkan 'no_proposal' dari tabel 'data_proposal' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_proposal')->where('no_proposal', $no_proposal)->get()->getRowArray();
    }

    public function update_dataproposal($data, $no_proposal)
    {
        // Method update_dataproposal: Memperbarui data proposal berdasarkan 'no_proposal' ke dalam tabel 'data_proposal'.
        return $this->db->table('data_proposal')->update($data, array('no_proposal' => $no_proposal));
    }

    public function delete_dataproposal($no_proposal)
    {
        // Method delete_dataproposal: Menghapus data proposal berdasarkan 'no_proposal' dari tabel 'data_proposal'.
        return $this->db->table('data_proposal')->delete(array('no_proposal' => $no_proposal));
    }
}
