<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('dataproposal/save'); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No proposal</label>
                    <input name="no_proposal" class="form-control" placeholder="Enter No Proposal">
                </div>


                <div class="form-group">
                    <label>Tanggal masuk proposal</label>
                    <input name="tanggal_masuk_proposal" class="form-control" placeholder="Tanggal Masuk Proposal">
                </div>


                <div class="form-group">
                    <label>Status Proposal</label>
                    <input name="status_proposal" class="form-control" placeholder="status proposal">
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control" placeholder="Nama">
                </div>


                <div class="form-group">
                    <label>Perusahaan</label>
                    <input name="perusahaan" class="form-control" placeholder="perusahaan">
                </div>
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input name="alamat_rumah" class="form-control" placeholder="Alamat Rumah">
                </div>


                <div class="form-group">
                    <label>Alamat Usaha</label>
                    <input name="alamat_usaha" class="form-control" placeholder="Alamat Usaha">
                </div>


                <div class="form-group">
                    <label>Kota</label>
                    <input name="kota" class="form-control" placeholder="Kota">
                </div>


                <div class="form-group">
                    <label>Sektor Usaha</label>
                    <input name="sektor_usaha" class="form-control" placeholder="Sektor Usaha">
                </div>


                <div class="form-group">
                    <label>No Telepon</label>
                    <input name="no_telepon" class="form-control" placeholder="No telepon">
                </div>


                <div class="form-group">
                    <label>Mulai Usaha</label>
                    <input name="mulai_usaha" class="form-control" placeholder="Mulai Usaha">
                </div>


                <div class="form-group">
                    <label>No Identitas</label>
                    <input name="no_identitas" class="form-control" placeholder="No Identitas">
                </div>


                <div class="form-group">
                    <label>Jumlah Pengajuan</label>
                    <input name="jumlah_pengajuan" class="form-control" placeholder="jumlah pengajuan">
                </div>



            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>