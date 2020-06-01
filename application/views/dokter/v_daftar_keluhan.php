<!DOCTYPE html>
<html lang="en">
<?php foreach($pasien as $data):?>
<head>
  <title>Form Keluhan Poli Umum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Keluhan Pasien Pasien Poli <?php echo $data['poli']; ?></h2>
  <form action="<?php echo base_url('dokter/buat_resep')?>" method="post">
    <div class="form-group">
      <input type="text" max="50" class="form-control" name="id_pasien" value="<?php echo $data['id_pasien']; ?>" hidden>
    </div>
    <div class="form-group">
      <label for="nama">Nomor Antrian Pasien:</label>
      <input type="text" max="50" class="form-control" name="no_antrian" value="<?php echo $data['no_antrian']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap Pasien:</label>
      <input type="text" max="50" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir:</label>
      <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="tgl_periksa">Tanggal Periksa:</label>
      <input type="datetime" class="form-control" name="tgl_periksa" value="<?php echo $data['tgl_periksa']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Pasien:</label>
      <input type="text" max="50" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="umur">Umur:</label><br>
      <input type="number" max="100" class="form-control" name="umur" value="<?php echo $data['umur']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin:</label><br>
      <input type="text" max="10" class="form-control" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="keluhan">Keluhan:</label>
      <!-- <input type="text" max="100" class="form-control" name="keluhan" value="<?php echo $data['keluhan']; ?>" readonly> -->
      <textarea name="keluhan" cols="50" rows="5" class="form-control" readonly><?php echo $data['keluhan']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="alergi_obat">Alergi Obat:</label>
      <textarea name="alergi_obat" cols="50" rows="5" class="form-control" readonly><?php echo $data['alergi_obat']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="resep_obat">Resep Obat:</label>
      <textarea name="resep_obat" cols="50" rows="5" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Cetak Resep</button>
      
    </div>
  </form>
</div>

</body>
<?php endforeach;?>
</html>