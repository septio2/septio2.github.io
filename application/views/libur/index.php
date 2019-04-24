<div class="container">

<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Hari Libur <strong>Berhasil</strong> <?= $this->session->flashdata('flash');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
        </div>
    </div>
<?php endif;?>

    <div class="row col-md-6 mt-3">
    <a href="<?=base_url();?>libur/tambah" class="btn btn-primary">Tambah hari Libur</a>
    </div>

        <table class="table mt-3">
    <thead>
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Aksi</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach($libur as $libur): ?>
        <tr>
        <td><?=$libur['tanggal']?></td>
        <td><?=$libur['keterangan']?></td>
        <td>
            <a href="" class="badge badge-success">ubah</a>
            <a href="" class="badge badge-danger">hapus</a>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
    </table>

</div>