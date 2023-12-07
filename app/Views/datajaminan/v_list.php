<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi satu baris penuh pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('datajaminan/tambah') ?>" class="href class btn btn-primary">Entry Data Jaminan</a>
    <!-- Ini adalah tautan (link) "Entry Data Jaminan" yang mengarah ke URL "datajaminan/tambah" dengan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

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
                <th>Jaminan</th>
                <th>No xx</th>
                <th>Keterangan Jaminan</th>
                <th>Tanggal Jaminan</th>
                <th>Tempat</th>
                <th>Jenis Jaminan</th>
                <th>Alamat Jaminan</th>
                <th>No</th>
                <th>Action</th>
                <!-- Ini adalah baris header tabel yang menunjukkan judul kolom. -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datajaminan as $key => $value) { ?>
                <!-- PHP digunakan untuk mengulang data jaminan dan menampilkannya dalam tabel. -->
                <tr>
                    <td><?= $value['no_kontrak']; ?></td>
                    <td><?= $value['jaminan']; ?></td>
                    <td><?= $value['noxx']; ?></td>
                    <td><?= $value['keterangan_jaminan']; ?></td>
                    <td><?= $value['tanggal_jaminan']; ?></td>
                    <td><?= $value['tempat']; ?></td>
                    <td><?= $value['jenis_jaminan']; ?></td>
                    <td><?= $value['alamat_jaminan']; ?></td>
                    <td><?= $value['no']; ?></td>
                    <!-- Menampilkan data jaminan dalam sel-sel tabel. -->

                    <td>
                        <a href="<?= base_url('datajaminan/edit/' . $value['no_kontrak']) ?>" class="href btn btn-warning">Edit</a>
                        <!-- Tombol "Edit" yang mengarah ke URL edit data jaminan. -->
                        <br><br>
                        <a href="<?= base_url('datajaminan/delete/' . $value['no_kontrak']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                        <!-- Tombol "Delete" yang mengarah ke URL hapus data jaminan dan meminta konfirmasi pengguna sebelum menghapus data. -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>