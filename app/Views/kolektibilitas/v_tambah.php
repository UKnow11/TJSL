<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('kolektibilitas/save'); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Kontrak</label>
                    <input name="no_kontrak" class="form-control" placeholder="Enter No Kontrak">
                </div>


                <div class="form-group">
                    <label>Tanggal Cicilan</label>
                    <input name="tanggal_cicilan" class="form-control" placeholder="Tanggal Cicilan">
                </div>


                <div class="form-group">
                    <label>Angsuran Pokok</label>
                    <input name="angsuran_pokok" class="form-control" placeholder="Angsuran Pokok">
                </div>


                <div class="form-group">
                    <label>Angsuran Jasa</label>
                    <input name="angsuran_jasa" class="form-control" placeholder="Angsuran Jasa">
                </div>


                <div class="form-group">
                    <label>kode kolektibilitas</label>
                    <input name="kode_kolektibilitas" class="form-control" placeholder="kode kolektibilitas">
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>