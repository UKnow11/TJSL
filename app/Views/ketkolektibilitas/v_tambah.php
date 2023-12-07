<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>


        <form role="form" action="<?= base_url('ketkolektibilitas/save'); ?> " method="post">
            <div class="card-body">

                <div class="form-group">
                    <label>Kode Kolektibilitas</label>
                    <input name="kode_kolektibilitas" class="form-control" placeholder="Enter Kode Kolektibilitas">
                </div>


                <div class="form-group">
                    <label>Kolektibilitas</label>
                    <input name="kolektibilitas" class="form-control" placeholder="Kolektibilitas">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>