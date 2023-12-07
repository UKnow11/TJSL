<div class="col-md-6">

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>


        <form role="form" action="<?= base_url('ketkolektibilitas/update/' . $ketkolektibilitas['kode_kolektibilitas']); ?> " method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Kolektibilitas</label>
                    <input name="kode_kolektibilitas" value="<?= $ketkolektibilitas['kode_kolektibilitas'] ?>" class="form-control" placeholder="Enter Kode Kolektibilitas">
                </div>


                <div class="form-group">
                    <label>Kolektibilitas</label>
                    <input name="kolektibilitas" value="<?= $ketkolektibilitas['kolektibilitas'] ?>" class="form-control" placeholder="Kolektibilitas">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>