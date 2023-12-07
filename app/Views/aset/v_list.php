<!-- Container dengan lebar penuh (12 kolom) -->
<div class="col-sm-12">
    <!-- Tombol untuk menambahkan data aset dengan tautan ke halaman "tambah" -->
    <a href="<?= base_url('aset/tambah') ?>" class="href class btn btn-primary">Tambah Data</a>
    <br><br>

    <!-- Menampilkan pesan sukses jika ada -->
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php }  ?>

    <!-- Tabel untuk menampilkan data aset -->
    <table id="example1" class=" table table-bordered table-responsive table-striped">
        <!-- Judul tabel dengan latar belakang gelap (thead-dark) -->
        <thead class="thead thead-dark">
            <tr>
                <th>NO Bukti Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Nominal</th>
                <th>Group</th>
                <th>Keterangan Transaksi</th>
                <th>Kode Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($aset as $key => $value) { ?>
                <!-- Baris data aset dalam tabel -->
                <tr>
                    <td><?= $value['no_bukti_transaksi']; ?></td>
                    <td><?= $value['tanggal_transaksi']; ?></td>
                    <td><?= $value['nominal']; ?></td>
                    <td><?= $value['group']; ?></td>
                    <td><?= $value['keterangan_transaksi']; ?></td>
                    <td><?= $value['kode_akun']; ?></td>
                    <td><?= $value['debet']; ?></td>
                    <td><?= $value['kredit']; ?></td>

                    <td>
                        <!-- Tombol Edit dengan tautan ke halaman "edit" -->
                        <a href="<?= base_url('aset/edit/' . $value['no_bukti_transaksi']) ?>" class="href btn btn-warning">Edit</a>
                        <br><br>
                        <!-- Tombol Hapus dengan konfirmasi penghapusan -->
                        <a href="<?= base_url('aset/delete/' . $value['no_bukti_transaksi']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>