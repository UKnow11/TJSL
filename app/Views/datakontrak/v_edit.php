<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('datakontrak/update/' . $datakontrak['no_kontrak']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No Kontrak</label>
                    <input name="no_kontrak" value="<?= $datakontrak['no_kontrak'] ?>" class="form-control" placeholder="Enter No Kontrak">
                </div>


                <div class="form-group">
                    <label>Tahun Kontrak</label>
                    <input name="tahun_kontrak" value="<?= $datakontrak['tahun_kontrak'] ?>" class="form-control" placeholder="Tahun Kontrak">
                </div>


                <div class="form-group">
                    <label>Nominal Pendanaan</label>
                    <input name="nominal_pendanaan" value="<?= $datakontrak['nominal_pendanaan'] ?>" class="form-control" placeholder="Nominal Pendanaan">
                </div>


                <div class="form-group">
                    <label>Jasa Admin</label>
                    <input name="jasa_admin" value="<?= $datakontrak['jasa_admin'] ?>" class="form-control" placeholder="Jasa Admin">
                </div>


                <div class="form-group">
                    <label>Cicilan Per Bulan</label>
                    <input name="cicilan_per_bulan" value="<?= $datakontrak['cicilan_per_bulan'] ?>" class="form-control" placeholder="Cicilan Per Bulan">
                </div>


                <div class="form-group">
                    <label>Lama Angsuran</label>
                    <input name="lama_angsuran" value="<?= $datakontrak['lama_angsuran'] ?>" class="form-control" placeholder="Lama Angsuran">
                </div>


                <div class="form-group">
                    <label>Mulai Cicilan</label>
                    <input name="mulai_cicilan" value="<?= $datakontrak['mulai_cicilan'] ?>" class="form-control" placeholder="Mulai Cicilan">
                </div>


                <div class="form-group">
                    <label>Tanggal Jatuh Tempo</label>
                    <input name="tgl_jatuh_tempo" value="<?= $datakontrak['tgl_jatuh_tempo'] ?>" class="form-control" placeholder="Tanggal Jatuh Tempo">
                </div>


                <div class="form-group">
                    <label>Kolektibilitas</label>
                    <input name="kolektibilitas" value="<?= $datakontrak['kolektibilitas'] ?>" class="form-control" placeholder="Kolektibilitas">
                </div>


                <div class="form-group">
                    <label>Tanggal Realisasi</label>
                    <input name="tgl_realisasi" value="<?= $datakontrak['tgl_realisasi'] ?>" class="form-control" placeholder="Tanggal Realisasi">
                </div>


                <div class="form-group">
                    <label>Kondisi</label>
                    <input name="kondisi" value="<?= $datakontrak['kondisi'] ?>" class="form-control" placeholder="Kondisi">
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>