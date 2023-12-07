<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('datasurvey/update/' . $datasurvey['no_proposal']); ?> " method="post">
            <div class="card-body">


                <div class="form-group">
                    <label>No proposal</label>
                    <input name="no_proposal" value="<?= $datasurvey['no_proposal'] ?>" class="form-control" placeholder="Enter No Proposal">
                </div>


                <div class="form-group">
                    <label>Tanggal Survey</label>
                    <input name="tanggal_survey" value="<?= $datasurvey['tanggal_survey'] ?>" class="form-control" placeholder="Tanggal Survey">
                </div>


                <div class="form-group">
                    <label>Petugas Survey 1</label>
                    <input name="petugas_survey_1" value="<?= $datasurvey['petugas_survey_1'] ?>" class="form-control" placeholder="Petugas Survey 1">
                </div>


                <div class="form-group">
                    <label>Petugas Survey 2</label>
                    <input name="petugas_survey_2" value="<?= $datasurvey['petugas_survey_2'] ?>" class="form-control" placeholder="Petugas Survey 2">
                </div>


                <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan" value="<?= $datasurvey['keterangan'] ?>" class="form-control" placeholder="Keterangan">
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>