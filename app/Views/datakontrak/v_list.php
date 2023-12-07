<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi satu baris penuh pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('datakontrak/tambah') ?>" class="href class btn btn-primary">Tambah Data</a>
    <!-- Ini adalah tautan (link) "Tambah Data" yang mengarah ke URL "datakontrak/tambah" dengan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

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
                <th>NO Kontrak</th>
                <th>Tahun KOntrak</th>
                <th>Nominal Pendanaan</th>
                <th>Jasa Admin</th>
                <th>Cicilan Per Bulan</th>
                <th>Lama Angsuran</th>
                <th>Mulai Cicilan</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Kolektibilitas</th>
                <th>Tanggal Realisasi</th>
                <th>Kondisi</th>
                <th>Action</th>
                <!-- Ini adalah baris header tabel yang menunjukkan judul kolom. -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datakontrak as $key => $value) { ?>
                <!-- PHP digunakan untuk mengulang data kontrak dan menampilkannya dalam tabel. -->
                <tr>
                    <td><?= $value['no_kontrak']; ?></td>
                    <td><?= $value['tahun_kontrak']; ?></td>
                    <td><?= $value['nominal_pendanaan']; ?></td>
                    <td><?= $value['jasa_admin']; ?></td>
                    <td><?= $value['cicilan_per_bulan']; ?></td>
                    <td><?= $value['lama_angsuran']; ?></td>
                    <td><?= $value['mulai_cicilan']; ?></td>
                    <td><?= $value['tgl_jatuh_tempo']; ?></td>
                    <td><?= $value['kolektibilitas']; ?></td>
                    <td><?= $value['tgl_realisasi']; ?></td>
                    <td><?= $value['kondisi']; ?></td>
                    <!-- Menampilkan data kontrak dalam sel-sel tabel. -->

                    <td>
                        <a href="<?= base_url('datakontrak/edit/' . $value['no_kontrak']) ?>" class="href btn btn-warning">Edit</a>
                        <!-- Tombol "Edit" yang mengarah ke URL edit data kontrak. -->
                        <br><br>
                        <a href="<?= base_url('datakontrak/delete/' . $value['no_kontrak']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                        <!-- Tombol "Delete" yang mengarah ke URL hapus data kontrak dan meminta konfirmasi pengguna sebelum menghapus data. -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>