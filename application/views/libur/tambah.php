<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

                <div class="card">
        <div class="card-header">
            Form Tambah Hari Libur
        </div>
        <div class="card-body">
        <form action="" method="post">
  <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control mb-3" name="tanggal">
    <small class="form-text text-danger"><?= form_error('tanggal');?></small>
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" name="keterangan"></textarea>
    <small class="form-text text-danger"><?= form_error('keterangan');?></small>
  <button type="submit" class="btn btn-primary float-right mt-3">Tambah Data</button>
</form>
        </div>
        </div>

        </div>
    </div>
</div>