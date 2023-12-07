<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi satu baris penuh pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('ketkolektibilitas/tambah') ?>" class="href class btn btn-primary">Tambah Data</a>
    <!-- Ini adalah tautan (link) "Tambah Data" yang mengarah ke URL "ketkolektibilitas/tambah" dengan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

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
                <th>Kode Kolektibilitas</th>
                <th>Kolektibilitas</th>
                <th>Action</th>
                <!-- Ini adalah baris header tabel yang menunjukkan judul kolom. -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($ketkolektibilitas as $key => $value) { ?>
                <!-- PHP digunakan untuk mengulang data tingkat kolektibilitas dan menampilkannya dalam tabel. -->
                <tr>
                    <td><?= $value['kode_kolektibilitas']; ?></td>
                    <td><?= $value['kolektibilitas']; ?></td>

                    <td>
                        <p><a href="<?= base_url('ketkolektibilitas/edit/' . $value['kode_kolektibilitas']) ?>" class="href btn btn-warning">Edit</a>
                            <!-- Tombol "Edit" yang mengarah ke URL edit tingkat kolektibilitas. -->
                            <a href="<?= base_url('ketkolektibilitas/delete/' . $value['kode_kolektibilitas']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                            <!-- Tombol "Delete" yang mengarah ke URL hapus tingkat kolektibilitas dan meminta konfirmasi pengguna sebelum menghapus data. -->
                        </p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>