<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi satu baris penuh pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('dataproposal/tambah') ?>" class="href class btn btn-primary">Tambah Data Proposal</a>
    <!-- Ini adalah tautan (link) "Tambah Data Proposal" yang mengarah ke URL "dataproposal/tambah" dengan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

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
                <th>Tanggal masuk Proposal</th>
                <th>Status Proposal</th>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Alamat Rumah</th>
                <th>Alamat Usaha</th>
                <th>Kota</th>
                <th>Sektor Usaha</th>
                <th>No Telepon</th>
                <th>Mulai Usaha</th>
                <th>No Identitas</th>
                <th>Jumlah Pengajuan</th>
                <th>Action</th>
                <!-- Ini adalah baris header tabel yang menunjukkan judul kolom. -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataproposal as $key => $value) { ?>
                <!-- PHP digunakan untuk mengulang data proposal dan menampilkannya dalam tabel. -->
                <tr>
                    <td><?= $value['no_proposal']; ?></td>
                    <td><?= $value['tanggal_masuk_proposal']; ?></td>
                    <td><?= $value['status_proposal']; ?></td>
                    <td><?= $value['nama']; ?></td>
                    <td><?= $value['perusahaan']; ?></td>
                    <td><?= $value['alamat_rumah']; ?></td>
                    <td><?= $value['alamat_usaha']; ?></td>
                    <td><?= $value['kota']; ?></td>
                    <td><?= $value['sektor_usaha']; ?></td>
                    <td><?= $value['no_telepon']; ?></td>
                    <td><?= $value['mulai_usaha']; ?></td>
                    <td><?= $value['no_identitas']; ?></td>
                    <td><?= $value['jumlah_pengajuan']; ?></td>
                    <!-- Menampilkan data proposal dalam sel-sel tabel. -->

                    <td>
                        <a href="<?= base_url('dataproposal/edit/' . $value['no_proposal']) ?>" class="href btn btn-warning">Edit</a>
                        <!-- Tombol "Edit" yang mengarah ke URL edit data proposal. -->
                        <br><br>
                        <a href="<?= base_url('dataproposal/delete/' . $value['no_proposal']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                        <!-- Tombol "Delete" yang mengarah ke URL hapus data proposal dan meminta konfirmasi pengguna sebelum menghapus data. -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>