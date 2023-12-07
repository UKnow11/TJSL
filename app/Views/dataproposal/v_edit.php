<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('dataproposal/update/' . $dataproposal['no_proposal']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No proposal</label>
                    <input name="no_proposal" value="<?= $dataproposal['no_proposal'] ?>" class="form-control" placeholder="Enter No Proposal">
                </div>


                <div class="form-group">
                    <label>Tanggal masuk proposal</label>
                    <input name="tanggal_masuk_proposal" value="<?= $dataproposal['tanggal_masuk_proposal'] ?>" class="form-control" placeholder="Tanggal Masuk Proposal">
                </div>


                <div class="form-group">
                    <label>Status Proposal</label>
                    <input name="status_proposal" value="<?= $dataproposal['status_proposal'] ?>" class="form-control" placeholder="status proposal">
                </div>


                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $dataproposal['nama'] ?>" class="form-control" placeholder="Nama">
                </div>


                <div class="form-group">
                    <label>Perusahaan</label>
                    <input name="perusahaan" value="<?= $dataproposal['perusahaan'] ?>" class="form-control" placeholder="perusahaan">
                </div>


                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input name="alamat_rumah" value="<?= $dataproposal['alamat_rumah'] ?>" class="form-control" placeholder="Alamat Rumah">
                </div>


                <div class="form-group">
                    <label>Alamat Usaha</label>
                    <input name="alamat_usaha" value="<?= $dataproposal['alamat_usaha'] ?>" class="form-control" placeholder="Alamat Usaha">
                </div>


                <div class="form-group">
                    <label>Kota</label>
                    <input name="kota" value="<?= $dataproposal['kota'] ?>" class="form-control" placeholder="Kota">
                </div>


                <div class="form-group">
                    <label>Sektor Usaha</label>
                    <input name="sektor_usaha" value="<?= $dataproposal['sektor_usaha'] ?>" class="form-control" placeholder="Sektor Usaha">
                </div>


                <div class="form-group">
                    <label>No Telepon</label>
                    <input name="no_telepon" value="<?= $dataproposal['no_telepon'] ?>" class="form-control" placeholder="No telepon">
                </div>


                <div class="form-group">
                    <label>Mulai Usaha</label>
                    <input name="mulai_usaha" value="<?= $dataproposal['mulai_usaha'] ?>" class="form-control" placeholder="Mulai Usaha">
                </div>


                <div class="form-group">
                    <label>No Identitas</label>
                    <input name="no_identitas" value="<?= $dataproposal['no_identitas'] ?>" class="form-control" placeholder="No Identitas">
                </div>


                <div class="form-group">
                    <label>Jumlah Pengajuan</label>
                    <input name="jumlah_pengajuan" value="<?= $dataproposal['jumlah_pengajuan'] ?>" class="form-control" placeholder="jumlah pengajuan">
                </div>




            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>