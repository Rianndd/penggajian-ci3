<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <style type="text/css">
    body {
      font-family: Arial;
      color: black;
    }
  </style>
</head>

<body>
  <center>
    <h1>PANCAKE</h1>
    <h2>Daftar Gaji Pegawai</h2>
  </center>

  <?php
  if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulantahun = $bulan . $tahun;
  } else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulantahun = $bulan . $tahun;
  }
  ?>


  <table class="table table-hover">
    <thead>
      <tr>
        <th>NO</th>
        <th>NIK</th>
        <th>Nama Pegawai</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>
        <th>Gaji Pokok</th>
        <th>Tj. Transport</th>
        <th>Uang Makan</th>
        <th>Potongan</th>
        <th>Total Gaji</th>
      </tr>
    </thead>
    <?php foreach ($potongan as $p) {
      $alpha = $p->jml_potongan;
    } ?>
    <?php $no = 1;
    foreach ($cetakGaji as $g) : ?>
      <?php $potongan = $g->alpha * $alpha ?>
      <tbody>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $g->nik ?></td>
          <td><?php echo $g->nama_pegawai ?></td>
          <td><?php echo $g->jenis_kelamin ?></td>
          <td><?php echo $g->nama_jabatan ?></td>
          <td>Rp.<?php echo number_format($g->gaji_pokok, 0, ',', '.') ?></td>
          <td>Rp.<?php echo number_format($g->tj_transport, 0, ',', '.') ?></td>
          <td>Rp.<?php echo number_format($g->uang_makan, 0, ',', '.') ?></td>
          <td>Rp.<?php echo number_format($potongan, 0, ',', '.') ?></td>
          <td>Rp.<?php echo number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan, 0, ',', '.') ?></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
    </tbody>
  </table>

  <table width="100%">
    <tr>
      <td></td>
      <td width="200px">
        <p>Karanganyar, <?php echo date("d M Y") ?></p>
      </td>
    </tr>
  </table>

</body>

</html>

<script>
  window.print();
</script>