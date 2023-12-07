<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('datacicilan/update/' . $datacicilan['no_kontrak']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Kontrak</label>
                    <input name="no_kontrak" value="<?= $datacicilan['no_kontrak'] ?>" class="form-control" placeholder="Enter No Kontrak">
                </div>


                <div class="form-group">
                    <label>Tanggal Cicilan</label>
                    <input name="tanggal_cicilan" value="<?= $datacicilan['tanggal_cicilan'] ?>" class="form-control" placeholder="Tanggal Cicilan">
                </div>


                <div class="form-group">
                    <label>Angsuran Pokok</label>
                    <input name="angsuran_pokok" value="<?= $datacicilan['angsuran_pokok'] ?>" class="form-control" placeholder="Angsuran Pokok">
                </div>


                <div class="form-group">
                    <label>Angsuran Jasa</label>
                    <input name="angsuran_jasa" value="<?= $datacicilan['angsuran_jasa'] ?>" class="form-control" placeholder="Angsuran Jasa">
                </div>


                <div class="form-group">
                    <label>Keterangan Cicilan</label>
                    <input name="keterangan_cicilan" value="<?= $datacicilan['keterangan_cicilan'] ?>" class="form-control" placeholder="Keterangan Cicilan">
                </div>

                <div class="form-group">
                    <label>No Cicilan</label>
                    <input name="no_cicilan" value="<?= $datacicilan['no_cicilan'] ?>" class="form-control" placeholder="No Cicilan">
                </div>


                <div class="form-group">
                    <label>PB</label>
                    <input name="pb" value="<?= $datacicilan['pb'] ?>" class="form-control" placeholder="PB">
                </div>


                <div class="form-group">
                    <label>Kode Kolektebilitas</label>
                    <input name="kode_kolektibilitas" value="<?= $datacicilan['kode_kolektibilitas'] ?>" class="form-control" placeholder="Kode Kolektibilitas">
                </div>



            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>