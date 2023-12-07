<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('aset/update/' . $aset['no_bukti_transaksi']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Bukti Transaksi</label>
                    <input name="no_bukti_transaksi" value="<?= $aset['no_bukti_transaksi'] ?>" class="form-control" placeholder="Enter No Bukti Transaksi">
                </div>


                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input name="tanggal_transaksi" value="<?= $aset['tanggal_transaksi'] ?>" class="form-control" placeholder="Tanggal Transaksi">
                </div>

                <div class="form-group">
                    <label>Nominal </label>
                    <input name="nominal" value="<?= $aset['nominal'] ?>" class="form-control" placeholder="Nominal">
                </div>


                <div class="form-group">
                    <label>Group</label>
                    <input name="group" value="<?= $aset['group'] ?>" class="form-control" placeholder="Group">
                </div>


                <div class="form-group">
                    <label>Keterangan Transaksi</label>
                    <input name="keterangan_transaksi" value="<?= $aset['keterangan_transaksi'] ?>" class="form-control" placeholder="Keterangan Transaksi">
                </div>


                <div class="form-group">
                    <label>Kode Akun</label>
                    <input name="kode_akun" value="<?= $aset['kode_akun'] ?>" class="form-control" placeholder="Kode Akun">
                </div>


                <div class="form-group">
                    <label>Debet</label>
                    <input name="debet" value="<?= $aset['debet'] ?>" class="form-control" placeholder="Debet">
                </div>


                <div class="form-group">
                    <label>Kredit</label>
                    <input name="kredit" value="<?= $aset['kredit'] ?>" class="form-control" placeholder="Kredit">
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>