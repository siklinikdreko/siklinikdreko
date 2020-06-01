<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Keluhan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Keluhan Poli Gigi</h2>
  <form action="<?php echo base_url('pasien/keluhan_poli_Gigi')?>" method="post">
    <div class="form-group">
      <label for="nama">Nama Lengkap:</label>
      <input type="text" max="50" class="form-control" name="nama" required>
    </div>
    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir:</label>
      <input type="date" class="form-control" name="tgl_lahir" required>
    </div>
    <div class="form-group">
      <label for="tgl_periksa">Tanggal Periksa:</label>
      <input type="datetime" class="form-control" name="tgl_periksa" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s'); ?>" readonly>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" max="50" class="form-control" name="alamat" required>
    </div>
    <div class="form-group">
      <label for="umur">Umur:</label><br>
      <input type="number" max="100" class="form-control" name="umur" required>
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin:</label><br>
      <select name="jenis_kelamin">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
        <option value="Lain-Lain">Lain-Lain</option>
      </select>
    </div>
    <div class="form-group">
      <label for="keluhan">Keluhan:</label>
      <!-- <input type="text" max="100" class="form-control" name="keluhan" required> -->
      <textarea name="keluhan" cols="50" rows="5" class="form-control" maxlength="100" required></textarea>
    </div>
    <div class="form-group">
      <label for="alergi_obat">Alergi Obat:</label>
      <!-- <input type="text" max="50" class="form-control" name="alergi_obat" required> -->
      <textarea name="alergi_obat" cols="50" rows="5" class="form-control" maxlength="100" required></textarea>
    </div>
    <div class="form-group">
      <button style="float: left;" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <a href="<?php echo base_url('pasien') ?>"><button style="float: right;" class="btn btn-primary">Kembali</button>
</div>

</body>
</html>