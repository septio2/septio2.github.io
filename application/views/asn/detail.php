<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Detail data ASN
            </div>
            <div class="card-body">
                <h5 class="card-title"><?=$asn['nama'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?=$asn['nipnrp'];?></h6>
                <p class="card-text"><?=$asn['jabatan'];?></p>
                <p class="card-text"><?=$asn['unitkerja'];?></p>
                <p class="card-text">Masa Kerja :
                <?php
                $tanggal = new DateTime($asn['masakerja']);
                $sekarang = new DateTime();
                $perbedaan = $tanggal->diff($sekarang);
                echo $perbedaan->y." Tahun ".$perbedaan->m." bulan";
                ?>
                </p>
                <a href="<?=base_url();?>asn" class="btn btn-primary">Kembali</a>
            </div>
            </div>
        </div>
    </div>
</div>