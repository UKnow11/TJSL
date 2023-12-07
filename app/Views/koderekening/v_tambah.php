<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('koderekening/save'); ?> " method="post">
            <div class="card-body">

                <div class="form-group">
                    <label>Kode Akun</label>
                    <input name="kode_akun" class="form-control" placeholder="Enter Kode Akun">
                </div>


                <div class="form-group">
                    <label>Keterangan Akun</label>
                    <input name="keterangan_akun" class="form-control" placeholder="Keterangan Akun">
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>