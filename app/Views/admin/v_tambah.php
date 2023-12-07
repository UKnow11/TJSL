<!-- Container dengan lebar setengah (6 kolom) -->
<div class="col-md-6">
    <!-- Kartu dengan latar belakang biru (card-primary) -->
    <div class="card card-primary">
        <!-- Header kartu -->
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3> <!-- Judul "Tambah Data" -->
        </div>

        <!-- Form untuk menambahkan data admin -->
        <form role="form" action="<?= base_url('admin/save'); ?>" method="post">
            <div class="card-body">
                <!-- Grup Form: NIP -->
                <div class="form-group">
                    <label>nip</label>
                    <input name="nip" class="form-control" placeholder="Enter nip">
                </div>

                <!-- Grup Form: Full Name -->
                <div class="form-group">
                    <label>fullname</label>
                    <input name="fullname" class="form-control" placeholder="fullname">
                </div>

                <!-- Grup Form: Username -->
                <div class="form-group">
                    <label>username</label>
                    <input name="username" class="form-control" placeholder="username">
                </div>

                <!-- Grup Form: Password -->
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password">
                </div>

                <!-- Grup Form: Level / Hak Akses -->
                <div class="form-group">
                    <label>level</label>
                    <input name="level" class="form-control" placeholder="level">
                </div>
            </div>

            <!-- Footer kartu dengan tombol 'Submit' untuk mengirimkan formulir -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>