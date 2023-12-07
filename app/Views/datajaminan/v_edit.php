<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('datajaminan/update/' . $datajaminan['no_kontrak']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Kontrak</label>
                    <input name="no_kontrak" value="<?= $datajaminan['no_kontrak'] ?>" class="form-control" placeholder="Enter No Kontrak">
                </div>


                <div class="form-group">
                    <label>Jaminan</label>
                    <input name="jaminan" value="<?= $datajaminan['jaminan'] ?>" class="form-control" placeholder="jaminan">
                </div>


                <div class="form-group">
                    <label>noxx</label>
                    <input name="noxx" value="<?= $datajaminan['noxx'] ?>" class="form-control" placeholder="noxx">
                </div>


                <div class="form-group">
                    <label>Keterangan Jaminan</label>
                    <input name="keterangan_jaminan" value="<?= $datajaminan['keterangan_jaminan'] ?>" class="form-control" placeholder="keterangan_jaminan">
                </div>


                <div class="form-group">
                    <label>tanggal jaminan</label>
                    <input name="tanggal_jaminan" value="<?= $datajaminan['tanggal_jaminan'] ?>" class="form-control datepicker" id="date" name="date" placeholder="tanggal_jaminan">
                </div>

                <div class="form-group">
                    <label>tempat</label>
                    <input name="tempat" value="<?= $datajaminan['tempat'] ?>" class="form-control" placeholder="tempat">
                </div>


                <div class="form-group">
                    <label>Jenis Jaminan</label>
                    <input name="jenis_jaminan" value="<?= $datajaminan['jenis_jaminan'] ?>" class="form-control" placeholder="jenis_jaminan">
                </div>


                <div class="form-group">
                    <label>Alamat Jaminan</label>
                    <input name="alamat_jaminan" value="<?= $datajaminan['alamat_jaminan'] ?>" class="form-control" placeholder="alamat_jaminan">
                </div>


                <div class="form-group">
                    <label>no</label>
                    <input name="no" value="<?= $datajaminan['no'] ?>" class="form-control" placeholder="no">
                </div>



            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>