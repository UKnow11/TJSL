<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('aset/save'); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Bukti Transaksi</label>
                    <input name="no_bukti_transaksi" class="form-control" placeholder="Enter No Bukti Transaksi">
                </div>


                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi">
                </div>


                <div class="form-group">
                    <label>Nominal </label>
                    <input name="nominal" class="form-control" placeholder="Nominal">
                </div>


                <div class="form-group">
                    <label>Group</label>
                    <input name="group" class="form-control" placeholder="Group">
                </div>


                <div class="form-group">
                    <label>Keterangan Transaksi</label>
                    <input name="keterangan_transaksi" class="form-control" placeholder="Keterangan Transaksi">
                </div>


                <div class="form-group">
                    <label>Kode Akun</label>
                    <input name="kode_akun" class="form-control" placeholder="Kode Akun">
                </div>


                <div class="form-group">
                    <label>Debet</label>
                    <input name="debet" class="form-control" placeholder="Debet">
                </div>


                <div class="form-group">
                    <label>Kredit</label>
                    <input name="kredit" class="form-control" placeholder="Kredit">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>