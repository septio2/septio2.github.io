<div class="container">
  <!-- coba tanggal -->
  <!-- akhir coba tanggal -->

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <h5 class="card-header">Pengajuan Cuti</h5>
        <div class="card-body">
          <form action="<?= base_url('pengajuan/form') ?>" method="post">
            <div class="form-group">
              <label for="nipnrp">Nama</label>
              <select name="nipnrp" id="nipnrp" class="form-control mb-3">
                <option value="">Pilih ASN</option>
                <?php foreach ($asn as $asn) : ?>
                  <option value="<?= $asn['nipnrp'] ?>"><?= $asn['nama'] ?></option>
                <?php endforeach ?>
              </select>
              <label for="atasan">Atasan Langsung</label>
              <select name="atasan" id="atasan" class="form-control mb-3">
                <option value="">Pilih Atasan</option>
                <?php foreach ($atasan as $ats) : ?>
                  <option value="<?= $ats['nipnrp'] ?>"><?= $ats['nama'] ?></option>
                <?php endforeach ?>
              </select>

              <label for="alasan">Alasan Cuti</label>
              <input type="text" class="form-control mb-3" id="alasan" name="alasan">

              <label for="alamat">Alamat Selama Menjalankan Cuti</label>
              <input type="text" class="form-control mb-3" id="alamat" name="alamat">

              <label for="tel">Telepon</label>
              <input type="text" class="form-control mb-3" id="tel" name="tel">

              <label for="mulaiCuti">Cuti Mulai Tanggal</label>
              <input type="date" class="form-control mb-3" id="mulaiCuti" name="mulaiCuti">

              <label for="lamaCuti">Lama Cuti</label>
              <input type="text" class="form-control mb-3" style="width:100px" id="lamaCuti" name="lamaCuti" placeholder="Jlh Hari">

              <!-- <label for="jenisCuti">Jenis Cuti</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiTahunan" value="1" checked>
                <label class="form-check-label" for="cutiTahunan">
                  Cuti Tahunan
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiSakit" value="2">
                <label class="form-check-label" for="cutiSakit">
                  Cuti Sakit
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiBesar" value="3">
                <label class="form-check-label" for="cutiBesar">
                  Cuti Besar
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiMelahirkan" value="4">
                <label class="form-check-label" for="cutiMelahirkan">
                  Cuti Melahirkan
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiPenting" value="5">
                <label class="form-check-label" for="cutiPenting">
                  Cuti Karena Alasan Penting
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisCuti" id="cutiLuar" value="6">
                <label class="form-check-label mb-3" for="cutiLuar">
                  Cuti di Luar Tanggungan Negara
                </label>
              </div> -->

            </div>
            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary float-right"> Ajukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>