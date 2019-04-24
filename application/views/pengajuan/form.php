<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    body {
      width: 21cm;
      height: 29.7cm;
      margin: 20mm 20mm 20mm 20mm;
      /* change the margins as you want them to be. */
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
      margin: 10px 0;
      line-height: 22px;
      content: "";
    }
  </style>
</head>

<body>
  <p id="tanggal" style="text-align:right">Jakarta, <?= date('d F Y'); ?></p>
  <p>Kepada Yth. :</p>
  <p>Kepala Pusat Data dan Teknologi Informasi</p>
  <p>di</p>
  <p>Jakarta</p>
  <p style="text-align:center"><b>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</b></p>
  <table>
    <tr>
      <td colspan="4"><b>I. DATA PEGAWAI</b></td>
    </tr>
    <tr>
      <td style="width:200px">Nama</td>
      <td><?= $asn['nama'] ?></td>
      <td style="width:200px">NIP</td>
      <td><?= $asn['nipnrp'] ?></td>
    </tr>
    <tr>
      <td style="width:200px">Jabatan</td>
      <td><?= $asn['jabatan'] ?></td>
      <td style="width:200px">Masa Kerja</td>
      <?php
      $tanggal = new DateTime($asn['masakerja']);
      $sekarang = new DateTime();
      $perbedaan = $tanggal->diff($sekarang);
      ?>
      <td><?= $perbedaan->y . " Tahun " . $perbedaan->m . " Bulan" ?></td>
    </tr>
    <tr>
      <td style="width:200px">Unit Kerja</td>
      <td colspan="3"><?= $asn['unitkerja'] ?></td>
    </tr>
  </table>
  <br style="line-height:10px">

  <table>
    <tr>
      <td colspan="4"><b>II. JENIS CUTI PEGAWAI</b></td>
    </tr>
    <tr>
      <td>1. Cuti Tahunan</td>
      <td style="width:50px; text-align:center">&squ;</td>
      <td>2. Cuti Sakit</td>
      <td style="width:50px; text-align:center">&squ;</td>
    </tr>
    <tr>
      <td>3. Cuti Besar</td>
      <td style="width:50px; text-align:center">&squ;</td>
      <td>4. Cuti Melahirkan</td>
      <td style="width:50px; text-align:center">&squ;</td>
    </tr>
    <tr>
      <td>5. Cuti Karena Alasan Penting</td>
      <td style="width:50px; text-align:center">&squ;</td>
      <td>6. Cuti di Luar Tanggungan Negara</td>
      <td style="width:50px; text-align:center">&squ;</td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td><b>III. ALASAN CUTI</b></td>
    </tr>
    <tr>
      <td><?= $als ?></td>
    </tr>
  </table>
  <br>

  <!-- Hitung Jatah Cuti -->
  <?php

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

  ?>
  <!-- Akhir Hitung -->
  <table>
    <tr>
      <td colspan="6"><b>IV. LAMANYA CUTI</b></td>
    </tr>
    <tr>
      <td style="width:100px">Lama</td>
      <td style="width:500px"><?= $lama ?> (hari/bulan/tahun)</td>
      <td>Mulai Tanggal</td>
      <td><?= $skrg ?></td>
      <td style="width:100px">s/d</td>
      <td><?= $next5WD ?></td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td colspan="5"><b>V. CATATAN CUTI</b></td>
    </tr>
    <tr>
      <td colspan="3"> Cuti Tahunan</td>
      <td style="width:2000px">2. Cuti Besar</td>
      <td style="width:200px"></td>
    </tr>
    <tr>
      <td style="text-align:center">Tahun</td>
      <td style="text-align:center">Sisa</td>
      <td style="text-align:center">Keterangan</td>
      <td style="width:2000px">3. Cuti Sakit</td>
      <td style="width:200px"></td>
    </tr>
    <tr>
      <td>N-2</td>
      <td></td>
      <td></td>
      <td style="width:2000px;">4. Cuti Melahirkan</td>
      <td style="width:200px"></td>
    </tr>
    <tr>
      <td>N-1</td>
      <td></td>
      <td></td>
      <td style="width:2000px">5. Cuti Karena Alasan Penting</td>
      <td style="width:200px"></td>
    </tr>
    <tr>
      <td>N</td>
      <td></td>
      <td></td>
      <td style="width:2000px">6. Cuti di Luar Tanggungan Negara</td>
      <td style="width:200px"></td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td colspan="3">
        <b>VI. ALAMAT SELAMA MENJALANKAN CUTI</b>
      </td>
    </tr>
    <tr>
      <td rowspan="2" valign="top">
        <?= $alm ?>
      </td>
      <td>TELP</td>
      <td><?= $tlp ?></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center; height:2cm">
        <p>Hormat Saya<br style="height:30px"><u><?= $asn['nama'] ?></u>
          <p>NIP. <?= $asn['nipnrp'] ?>
      </td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td colspan="4"><b>VII. PERTIMBANGAN ATASAN LANGSUNG</b></td>
    </tr>
    <tr style="text-align:center">
      <td>DISETUJUI</td>
      <td>PERUBAHAN</td>
      <td>DITANGGUHKAN</td>
      <td>TIDAK DISETUJUI</td>
    </tr>
    <tr style="text-align:center">
      <td><?= $ats['jabatan'] ?><br style="height:30px"><u><?= $ats['nama'] ?></u>
        <p>NIP. <?= $ats['nipnrp'] ?>
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td colspan="4"><b>VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</b></td>
    </tr>
    <tr style="text-align:center">
      <td>DISETUJUI</td>
      <td>PERUBAHAN</td>
      <td>DITANGGUHKAN</td>
      <td>TIDAK DISETUJUI</td>
    </tr>
    <tr style="text-align:center">
      <td>Kepala Pusat Data dan Teknologi Informasi,<br style="height:30px"><u>Ir. Nicodemus Daud, M.Si.</u>
        <p>NIP. 196412301997031002
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
      <td valign="top">
        <center>&squ;</center>
        <br>Alasan
      </td>
    </tr>
  </table>
</body>

</html>