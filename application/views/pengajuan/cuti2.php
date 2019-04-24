<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Pengajuan Cuti</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" media="screen">

  <style>
    body {
      width: 21cm;
      height: 29.7cm;
      margin: 0mm 10mm 10mm 10mm;

    }

    p {
      margin: 1px;
    }

    table,
    th,
    td {
      width: 21cm;
      border: 0.5px solid black;
      border-spacing: 0;
      border-collapse: collapse;
      padding: 2px;
    }

    br {
      display: block;
      margin: 15px 0;
      line-height: 22px;
      content: "";
    }

    table.fixed {
      table-layout: fixed;
    }

    table.fixed td {
      overflow: hidden;
    }

    .data {
      width: 21cm;
      border-spacing: 0;
      border-collapse: collapse;
      padding: 10px;
      border: 0.1px solid black;
      background: lightgoldenrodyellow;
    }

    .hijau {
      background-color: palegreen;
    }
  </style>

</head>

<body>
  <div class="hijau sticky-top">
    <center>
      <em>Isi Hanya pada kotak berwarna hijau</em>
    </center>
    <hr>
  </div>

  <form action="<?= base_url('pengajuan/cuti2') ?>" method="post">
    <p style="text-align:right">Jakarta, <?= date('d F Y') ?></p>
    <p>Kepada Yth. :</p>
    <p>Kepala Pusat Data dan Teknologi Informasi</p>
    <p>di</p>
    <p>Jakarta</p>
    <p>
      <center><b>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</b></center>
    </p>
    <table class="fixed">
      <col width="80px">
      <col width="">
      <col width="80px">
      <col width="">
      <tr>
        <td colspan="4"><b>I. DATA PEGAWAI</b></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><select name="asn" style="width:100%" class="hijau">
            <option value="">--Pilih ASN--</option>
            <?php foreach ($asn as $asn) : ?>
              <?php if ($inip == $asn['nipnrp']) : ?>
                <option value="<?= $asn['nipnrp'] ?>" selected><?= $asn['nama'] ?></option>
              <?php else : ?>
                <option value="<?= $asn['nipnrp'] ?>"><?= $asn['nama'] ?></option>
              <?php endif ?>

            <?php endforeach ?>
          </select></td>
        <td>NIP</td>
        <td><?= $inip ?></td>
      </tr>

      <tr>
        <td>Jabatan</td>
        <td><?= $ijabatan ?></td>
        <td>Masa Kerja</td>
        <?php
        if (!$imasakerja == 0) :
          $tanggal = new DateTime($imasakerja);
          $sekarang = new DateTime();
          $perbedaan = $tanggal->diff($sekarang);
          ?>
          <td><?= $perbedaan->y . " Tahun " . $perbedaan->m . " Bulan" ?></td>
        <?php else : ?>
          <td></td>
        <?php endif ?>
      </tr>
      <tr>
        <td>Unit Kerja</td>
        <td colspan="3"><?= $iunker ?></td>
      </tr>
    </table>
    <br>
    <table class="fixed">
      <col width="">
      <col width="20px">
      <col width="">
      <col width="20px">
      <tr>
        <td colspan="4"><b>II. JENIS CUTI YANG DIAMBIL</b></td>
      </tr>
      <tr>
        <td>1. Cuti Tahunan</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
        <td>2. Cuti Sakit</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
      </tr>
      <tr>
        <td>3. Cuti Besar</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
        <td>4. Cuti Melahirkan</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
      </tr>
      <tr>
        <td>5. Cuti Karena ALasan Penting</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
        <td>6. Cuti di Luar Tanggungan Negara</td>
        <td>
          <center>&EmptySmallSquare;</center>
        </td>
      </tr>
    </table>
    <br>
    <table class="fixed">
      <col width="176px">
      <tr>
        <td><b>III. ALASAN CUTI</b></td>
      </tr>
      <tr>
        <td><input type="text" name="alasan" style="width:100%" class="hijau" placeholder="Isi Alasan Mengajukan Cuti" value="<?= $alasan ?>"></td>
      </tr>
    </table>
    <br>
    <!-- Hitung Jatah Cuti -->
    <?php
    if (!$lama == 0) :
      $t = 0;
      foreach ($libur as $l) {
        $liburan[$t] = $l['tanggal'];
        $t++;
      }

      $count = 0;

      $hari = strtotime("$mulai 00:00:00");
      $temp = strtotime("$mulai 00:00:00");

      while ($count < $lama - 1) {
        $next1WD = strtotime('+1 weekday', $temp);
        $next1WDDate = date('Y-m-d', $next1WD);
        if (!in_array($next1WDDate, $liburan)) {
          $count++;
        }
        $temp = $next1WD;
      }
      $skrg = date("d-m-Y", $hari);
      $next5WD = date("d-m-Y", $temp);
    elseif ($lama == 0) :
      $next5WD = "00-00-0000";
    endif
    ?>
    <!-- Akhir Hitung -->

    <table class="fixed">
      <col width="80px">
      <col width="150px">
      <col width="">
      <col width="">
      <col width="30px">
      <col width="">
      <tr>
        <td colspan="6"><b>IV. LAMANYA CUTI</b></td>
      </tr>
      <tr>
        <td>Lama</td>
        <td><input type="text" name="lamaCuti" style="width:15%" class="hijau" value="<?= $lama  ?>"> (hari/bulan/tahun)</td>
        <td>Mulai Tanggal</td>
        <td><input type="date" name="mulaiCuti" style="width:100%" class="hijau" value="<?= $mulai ?>"></td>
        <td>s.d</td>
        <td><?= $next5WD ?></td>
      </tr>
    </table>
    <br>
    <table class="fixed">
      <col width="50px">
      <col width="80px">
      <col width="100px">
      <col width="">
      <col width="50px">
      <tr>
        <td colspan="5"><b>V. CATATAN CUTI</b></td>
      </tr>
      <tr>
        <td colspan="3">1. Cuti Tahunan</td>
        <td>2. Cuti Besar</td>
        <td></td>
      </tr>
      <tr>
        <td style="text-align:center">Tahun</td>
        <td style="text-align:center">Sisa</td>
        <td style="text-align:center">Keterangan</td>
        <td>3. Cuti Sakit</td>
        <td></td>
      </tr>
      <tr>
        <td>N-2</td>
        <td></td>
        <td></td>
        <td>4. Cuti Melahirkan</td>
        <td></td>
      </tr>
      <tr>
        <td>N-1</td>
        <td></td>
        <td></td>
        <td>5. Cuti Karena Alasan Penting</td>
        <td></td>
      </tr>
      <tr>
        <td>N</td>
        <td></td>
        <td></td>
        <td>6. Cuti di Luar Tanggungan Negara</td>
        <td></td>
      </tr>
    </table>
    <br>
    <br>
    <table class="fixed">
      <col width="200px">
      <col width="50px">
      <col width="">
      <tr>
        <td colspan="3"><b>
            VI. ALAMAT SELAMA MENJALANKAN CUTI
          </b></td>
      </tr>
      <tr>
        <td rowspan="2" valign="top"><textarea name="alamat" id="alamat" style="width:100%; height:100%" class="hijau" placeholder="Isi alamat selama menjalankan cuti"><?= $alamat ?></textarea> </td>
        <td>TELP</td>
        <td><input type="text" name="telp" style="width:100%" class="hijau" placeholder="Isi nomor telepon" value="<?= $telepon ?>"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center">Hormat Saya,
          <div style="margin-top:60px"></div>
          <u><?= $inama ?></u><br style="line-height:0px; margin:0px 0;">
          NIP. <?= $inip ?>
        </td>
      </tr>
    </table>
    <br>
    <table class="fixed">
      <col width="307px">
      <col width="25%">
      <col width="25%">
      <col width="25%">
      <tr>
        <td colspan="4"><b>
            VII. PERTIMBANGAN ATASAN LANGSUNG<select style="float:right; width:35%" class="hijau" name="atasan">
              <option value="">--Pilih Atasan--</option>
              <?php foreach ($atasan as $ats) : ?>
                <?php if ($iinip == $ats['nipnrp']) : ?>
                  <option value="<?= $ats['nipnrp'] ?>" selected> <?= $ats['nama'] ?></option>
                <?php else : ?>
                  <option value="<?= $ats['nipnrp'] ?>"> <?= $ats['nama'] ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </b></td>
      </tr>
      <tr>
        <td style="text-align:center">DISETUJUI</td>
        <td style="text-align:center">PERUBAHAN</td>
        <td style="text-align:center">DITANGGUHKAN</td>
        <td style="text-align:center">TIDAK DISETUJUI</td>
      </tr>
      <tr>
        <td>
          <center><?= $iijabatan ?>
            <div style="margin-top:60px"></div><u><?= $iinama ?></u><br style="line-height:0px; margin:0px 0;">NIP. <?= $iinip ?>
          </center>
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
      </tr>
    </table>
    <br>
    <table class="fixed">
      <col width="307px">
      <col width="25%">
      <col width="25%">
      <col width="25%">
      <tr>
        <td colspan="4"><b>
            VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI<select style="float:right; width:35%" class="hijau" name="pejabat">
              <option value="">--Pilih Pejabat Berwenang--</option>
              <?php foreach ($atasan as $ats) : ?>
                <?php if ($iiinip == $ats['nipnrp']) : ?>
                  <option value="<?= $ats['nipnrp'] ?>" selected> <?= $ats['nama'] ?></option>
                <?php else : ?>
                  <option value="<?= $ats['nipnrp'] ?>"> <?= $ats['nama'] ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </b></td>
      </tr>
      <tr>
        <td style="text-align:center">DISETUJUI</td>
        <td style="text-align:center">PERUBAHAN</td>
        <td style="text-align:center">DITANGGUHKAN</td>
        <td style="text-align:center">TIDAK DISETUJUI</td>
      </tr>
      <tr>
        <td>
          <center><?= $iiijabatan ?>
            <div style="margin-top:60px"></div><u><?= $iiinama ?></u><br style="line-height:0px; margin:0px 0;">NIP. <?= $iiinip ?>
          </center>
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
        <td valign="top">
          <br>
          <center>&EmptySmallSquare;</center>
          Alasan :
        </td>
      </tr>
    </table>
    <br>

    <hr>
    <div style="text-align:center"> <button type="submit" class="btn btn-success mb-3 mr-3">AJUKAN</button><button type="submit" class="btn btn-success mb-3">CETAK</button></div>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>


</html>