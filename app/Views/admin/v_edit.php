<!-- Container untuk tampilan setengah lebar (dalam Bootstrap) -->
<div class="col-md-6">

    <!-- Kartu dengan latar belakang gelap -->
    <div class="card card-dark">
        <!-- Header kartu -->
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3> <!-- Judul Form Edit -->
        </div>

        <!-- Form untuk mengedit data admin -->
        <form role="form" action="<?= base_url('admin/update/' . $admin['id_user']); ?> " method="post">
            <div class="card-body">
                <!-- Grup Form: NIP -->
                <div class="form-group">
                    <label>nip</label>
                    <input name="nip" value="<?= $admin['nip'] ?>" class="form-control" placeholder="Enter nip">
                </div>

                <!-- Grup Form: Full Name -->
                <div class="form-group">
                    <label>fullname</label>
                    <input name="fullname" value="<?= $admin['fullname'] ?>" class="form-control" placeholder="fullname">
                </div>

                <!-- Grup Form: Username -->
                <div class="form-group">
                    <label>username</label>
                    <input name="username" value="<?= $admin['username'] ?>" class="form-control" placeholder="username">
                </div>

                <!-- Grup Form: Password -->
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $admin['password'] ?>" class="form-control" placeholder="Password">
                </div>

                <!-- Grup Form: Level / Hak Akses -->
                <div class="form-group">
                    <label>level</label>
                    <input name="level" value="<?= $admin['level'] ?>" class="form-control" placeholder="level">
                </div>
            </div>

            <!-- Footer kartu dengan tombol 'Update' untuk mengirimkan formulir -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>