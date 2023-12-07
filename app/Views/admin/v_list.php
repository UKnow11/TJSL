<!-- Container dengan lebar penuh (12 kolom) -->
<div class="col-sm-12">
    <!-- Tombol untuk menambahkan pengguna dengan tautan ke halaman "tambah" -->
    <a href="<?= base_url('admin/tambah') ?>" class="href class btn btn-primary">Tambah User</a>
    <br><br>

    <!-- Menampilkan pesan sukses jika ada -->
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php }  ?>

    <!-- Tabel untuk menampilkan data admin -->
    <table class=" table table-bordered table-responsive table-striped">
        <!-- Judul tabel dengan latar belakang gelap -->
        <thead class="thead thead-dark">
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($admin as $key => $value) { ?>
                <!-- Baris data admin dalam tabel -->
                <tr>
                    <td><?= $value['nip']; ?></td>
                    <td><?= $value['fullname']; ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['password']; ?></td>
                    <td><?= $value['level']; ?></td>

                    <td>
                        <p></p>
                        <!-- Tombol Edit dengan tautan ke halaman "edit" -->
                        <a href="<?= base_url('admin/edit/' . $value['id_user']) ?>" class="href btn btn-info">Edit</a>
                        <!-- Tombol Hapus dengan konfirmasi penghapusan -->
                        <a href="<?= base_url('admin/delete/' . $value['id_user']) ?> " class="btn btn-danger" onclick="return confirm('hapus data')">Delete</a></p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>