<div class="container">
<div class="row mt-3">
<div class="col-md-6">


<div class="card">
    <div class="card-header">
        Form Ubah Data ASN
    </div>
    <div class="card-body">
        <form action="" method="post">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?=$asn['nama'];?>">
        <small class="form-text text-danger"><?= form_error('nama');?></small>
    </div>
    <div class="form-group">
        <label for="nip">NIP/NRP</label>
        <input type="text" class="form-control" id="nip" name="nip" value="<?=$asn['nipnrp'];?>">
        <small class="form-text text-danger"><?= form_error('nip');?></small>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?=$asn['jabatan'];?>">
        <small class="form-text text-danger"><?= form_error('jabatan');?></small>
    </div>

        <div class="form-group">
        <label for="unker">Unit Kerja</label>
        <select class="form-control" id="unker" name="unker">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
        <small class="form-text text-danger"><?= form_error('unker');?></small>
    </div>

    <div class="form-group">
        <label for="masakerja">Mulai Kerja</label>
        <input type="month" class="form-control" name="masakerja">
        <small class="form-text text-danger"><?= form_error('masakerja');?></small>
    </div>

<button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>

    </form>
    </div>
</div>

</div>
</div>
</div>