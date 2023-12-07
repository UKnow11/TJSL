<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('datajaminan/save'); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Kontrak</label>
                    <input name="no_kontrak" class="form-control" placeholder="Enter No Kontrak">
                </div>


                <div class="form-group">
                    <label>Jaminan</label>
                    <input name="jaminan" class="form-control" placeholder="jaminan">
                </div>


                <div class="form-group">
                    <label>noxx</label>
                    <input name="noxx" class="form-control" placeholder="noxx">
                </div>


                <div class="form-group">
                    <label>Keterangan Jaminan</label>
                    <input name="keterangan_jaminan" class="form-control" placeholder="keterangan_jaminan">
                </div>


                <div class="form-group">
                    <label>tanggal jaminan</label>
                    <input name="tanggal_jaminan" class="form-control" placeholder="tanggal_jaminan">
                </div>
                <div class="form-group">
                    <label>tempat</label>
                    <input name="tempat" class="form-control" placeholder="tempat">
                </div>


                <div class="form-group">
                    <label>Jenis Jaminan</label>
                    <input name="jenis_jaminan" class="form-control" placeholder="jenis_jaminan">
                </div>


                <div class="form-group">
                    <label>Alamat Jaminan</label>
                    <input name="alamat_jaminan" class="form-control" placeholder="alamat_jaminan">
                </div>


                <div class="form-group">
                    <label>no</label>
                    <input name="no" class="form-control" placeholder="no">
                </div>




            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>