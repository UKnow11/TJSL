<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('sektor/save'); ?> " method="post">
            <div class="card-body">

                <div class="form-group">
                    <label>Kode Jenis Usaha</label>
                    <input name="kode_jenis_usaha" class="form-control" placeholder="Enter Kode Jenis Usaha">
                </div>


                <div class="form-group">
                    <label>Nama Jenis Usaha</label>
                    <input name="nama_jenis_usaha" class="form-control" placeholder="Nama Jenis Usaha">
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>