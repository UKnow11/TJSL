<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('koderekening/update/' . $koderekening['kode_akun']); ?> " method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Akun</label>
                    <input name="kode_akun" value="<?= $koderekening['kode_akun'] ?>" class="form-control" placeholder="Enter Kode Akun">
                </div>


                <div class="form-group">
                    <label>Keterangan Akun</label>
                    <input name="keterangan_akun" value="<?= $koderekening['keterangan_akun'] ?>" class="form-control" placeholder="Keterangan AKun">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>