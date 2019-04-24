    <div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
    Data ASN <strong>Berhasil</strong> <?= $this->session->flashdata('flash');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
        </div>
    </div>
<?php endif;?>

<div class="row mt-3">
<div class="col-md-6">
<a href="<?=base_url();?>asn/tambah" class="btn btn-primary">Tambah Data ASN</a>
</div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
    <form action="" method="post">
    <div class="input-group">
  <input type="text" class="form-control" placeholder="Cari Data ASN" name="keyword">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit">Cari</button>
  </div>
</div>
    </form>
    </div>
</div>

    <div class="row mt-3">
    <div class="col-md-6">
    <h3>Daftar ASN</h3>
    <?php if (empty($asn)):?>
    <div class="alert alert-danger" role="alert">
    Data ASN tidak ditemukan
    </div>
    <?php endif?>
    <ul class="list-group">
    <?php foreach($asn as $asn) : ?>
    <li class="list-group-item">
        <?= $asn['nama']?>
        <a href="<?=base_url();?>asn/hapus/<?=$asn['nipnrp']?>" class="badge badge-danger float-right" onclick="return confirm('yakin')">hapus</a>
        <a href="<?=base_url();?>asn/ubah/<?=$asn['nipnrp']?>" class="badge badge-success float-right ">ubah</a>
        <a href="<?=base_url();?>asn/detail/<?=$asn['nipnrp']?>" class="badge badge-primary float-right ">detail</a>
    </li>
<?php endforeach;?>
    </ul>
    </div>
    </div>

    </div>