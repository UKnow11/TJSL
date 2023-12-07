<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSurveyModel extends Model
{

    public function get_datasurvey()
    {
        // Method get_datasurvey: Mengambil data survei dari tabel 'data_proposal' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_proposal')->get()->getResultArray();
    }

    public function insert_datasurvey($data)
    {
        // Method insert_datasurvey: Memasukkan data survei baru ke dalam tabel 'data_proposal'.
        return $this->db->table('data_proposal')->insert($data);
    }

    public function edit_datasurvey($no_proposal)
    {
        // Method edit_datasurvey: Mengambil data survei berdasarkan 'no_proposal' dari tabel 'data_proposal' dan mengembalikan hasilnya dalam bentuk array.
        return $this->db->table('data_proposal')->where('no_proposal', $no_proposal)->get()->getRowArray();
    }

    public function update_datasurvey($data, $no_proposal)
    {
        // Method update_datasurvey: Memperbarui data survei berdasarkan 'no_proposal' ke dalam tabel 'data_proposal'.
        return $this->db->table('data_proposal')->update($data, array('no_proposal' => $no_proposal));
    }

    public function delete_datasurvey($no_proposal)
    {
        // Method delete_datasurvey: Menghapus data survei berdasarkan 'no_proposal' dari tabel 'data_proposal'.
        return $this->db->table('data_proposal')->delete(array('no_proposal' => $no_proposal));
    }
}
