<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('datasurvey/save'); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No proposal</label>
                    <input name="no_proposal" class="form-control" placeholder="Enter No Proposal">
                </div>


                <div class="form-group">
                    <label>Tanggal Survey</label>
                    <input name="tanggal_survey" class="form-control" placeholder="Tanggal Masuk Proposal">
                </div>


                <div class="form-group">
                    <label>Petugas Survey 1</label>
                    <input name="petugas_survey_1" class="form-control" placeholder="status proposal">
                </div>

                <div class="form-group">
                    <label>Petugas Survey 2</label>
                    <input name="petugas_survey_2" class="form-control" placeholder="Nama">
                </div>


                <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan" class="form-control" placeholder="keterangan">
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>