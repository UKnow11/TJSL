<div class="col-sm-12">
    <!-- Ini adalah elemen div dengan kelas "col-sm-12", yang mengatur lebar elemen menjadi seluruh lebar tata letak pada tampilan kecil (small) menggunakan Bootstrap. -->

    <a href="<?= base_url('datacicilan/tambah') ?>" class="href class btn btn-primary">Entry Data Cicilan</a>
    <!-- Ini adalah tautan (link) yang mengarah ke URL "datacicilan/tambah" dan menggunakan kelas "btn btn-primary" untuk memberikan tampilan tombol berwarna biru (warna primer). -->

    <br><br>
    <!-- Ini adalah elemen <br> yang digunakan untuk memberikan dua baris pemisah. -->

    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <!-- PHP digunakan untuk mengecek apakah ada pesan "success" dalam session. -->
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
            <!-- Ini adalah pesan sukses yang akan ditampilkan jika ada. -->
        </div>
    <?php } ?>

    <table id="mydatatable" class=" table table-bordered table-responsive table-striped">
        <!-- Ini adalah tabel HTML yang menggunakan berbagai kelas Bootstrap untuk tampilan dan interaksi yang lebih baik. -->
        <thead class="thead thead-dark">
            <!-- Bagian kepala (header) dari tabel dengan latar belakang gelap. -->
            <tr>
                <th>NO Kontrak</th>
                <th>Tanggal Cicilan</th>
                <th>Angsuran_Pokok</th>
                <th>Angsuran_Jasa</th>
                <th>Keterangan Cicilan</th>
                <th>No Cicilan</th>
                <th>PB</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datacicilan as $key => $value) { ?>
                <!-- PHP digunakan untuk melakukan iterasi (loop) melalui datacicilan yang mungkin merupakan array atau koleksi data. -->

                <tr>
                    <td><?= $value['no_kontrak']; ?></td>
                    <td><?= $value['tanggal_cicilan']; ?></td>
                    <td><?= $value['angsuran_pokok']; ?></td>
                    <td><?= $value['angsuran_jasa']; ?></td>
                    <td><?= $value['keterangan_cicilan']; ?></td>
                    <td><?= $value['no_cicilan']; ?></td>
                    <td><?= $value['pb']; ?></td>

                    <td>
                        <a href="<?= base_url('datacicilan/edit/' . $value['no_kontrak']) ?>" class="href btn btn-warning">Edit</a>
                        <!-- Tautan "Edit" yang mengarah ke URL "datacicilan/edit" dan menggunakan kelas "btn btn-warning" untuk memberikan tampilan tombol berwarna kuning (warning). -->
                        <br><br>
                        <a href="<?= base_url('datacicilan/delete/' . $value['no_kontrak']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a>
                        <!-- Tautan "Delete" yang mengarah ke URL "datacicilan/delete" dan menggunakan kelas "btn btn-danger" untuk memberikan tampilan tombol berwarna merah (danger). Juga terdapat konfirmasi penghapusan saat tombol ini ditekan. -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?= $pager->links(); ?>
<!-- Ini adalah elemen untuk menampilkan tautan halaman (pagination) yang digunakan untuk navigasi antara halaman-halaman data yang mungkin panjang. Ini terkait dengan objek pager yang mungkin digunakan dalam framework PHP. -->