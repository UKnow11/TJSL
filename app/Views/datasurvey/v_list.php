<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi satu baris penuh pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('datasurvey/tambah') ?>" class="href class btn btn-primary">Tambah Data</a>
    <!-- Ini adalah tautan (link) "Tambah Data" yang mengarah ke URL "datasurvey/tambah" dengan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

    <br><br>
    <!-- Garis putus-putus untuk memberikan jarak di antara elemen. -->

    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <!-- PHP digunakan untuk memeriksa apakah ada pesan sukses yang tersedia dalam sesi. -->
        <div class="alert alert-success">
            <!-- Ini adalah elemen div dengan kelas "alert alert-success" untuk menampilkan pesan sukses. -->
            <?= session()->getFlashdata('success'); ?>
            <!-- Menampilkan pesan sukses yang ada dalam sesi. -->
        </div>
    <?php }  ?>

    <table id="example1" class=" table table-bordered table-responsive table-striped">
        <!-- Ini adalah tabel dengan ID "example1" dan beberapa kelas yang digunakan untuk memberikan tampilan tabel. -->

        <thead class="thead thead-dark">
            <tr>
                <th>NO Proposal</th>
                <th>Tanggal Survey</th>
                <th>Petugas Survey 1</th>
                <th>Petugas Survey 2</th>
                <th>Keterangan</th>
                <th>Action</th>
                <!-- Ini adalah baris header tabel yang menunjukkan judul kolom. -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datasurvey as $key => $value) { ?>
                <!-- PHP digunakan untuk mengulang data survey dan menampilkannya dalam tabel. -->
                <tr>
                    <td><?= $value['no_proposal']; ?></td>
                    <td><?= $value['tanggal_survey']; ?></td>
                    <td><?= $value['petugas_survey_1']; ?></td>
                    <td><?= $value['petugas_survey_2']; ?></td>
                    <td><?= $value['keterangan']; ?></td>

                    <td>
                        <p><a href="<?= base_url('datasurvey/edit/' . $value['no_proposal']) ?>" class="href btn btn-warning">Edit</a>
                            <!-- Tombol "Edit" yang mengarah ke URL edit data survey. -->
                            <a href="<?= base_url('datasurvey/delete/' . $value['no_proposal']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                            <!-- Tombol "Delete" yang mengarah ke URL hapus data survey dan meminta konfirmasi pengguna sebelum menghapus data. -->
                        </p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>