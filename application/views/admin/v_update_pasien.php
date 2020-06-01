<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Update Pasien</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Update Pasien</h2>
  <form action="<?php echo base_url('admin/proses_update_pasien')?>" method="post">
    <?php foreach($pasien as $data):?>
    <div class="form-group">
      <input type="text" max="50" class="form-control" name="id_pasien" value="<?php echo $data['id_pasien'];?>" hidden>
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap:</label>
      <input type="text" max="50" class="form-control" name="nama" value="<?php echo $data['nama'];?>" required>
    </div>
    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir:</label>
      <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir'];?>" required>
    </div>
    <div class="form-group">
      <label for="tgl_periksa">Tanggal Periksa:</label>
      <input type="datetime" class="form-control" name="tgl_periksa" value="<?php echo $data['tgl_periksa'];?>" readonly>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" max="50" class="form-control" name="alamat" value="<?php echo $data['alamat'];?>" required>
    </div>
    <div class="form-group">
      <label for="umur">Umur:</label><br>
      <input type="number" max="50" class="form-control" name="umur" value="<?php echo $data['umur'];?>" required>
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin:</label><br>
      <select name="jenis_kelamin">
        <option value="<?php echo $data['jenis_kelamin'];?>"><?php echo $data['jenis_kelamin'];?></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
        <option value="Lain-Lain">Lain-Lain</option>
      </select>
    </div>
    <div class="form-group">
      <label for="keluhan">Keluhan:</label>
      <!-- <input type="text" max="100" class="form-control" name="keluhan" value="<?php echo $data['keluhan'];?>" required> -->
      <textarea name="keluhan" cols="50" rows="5" class="form-control" maxlength="100" required><?php echo $data['keluhan'];?></textarea>
    </div>
    <div class="form-group">
      <label for="alergi_obat">Alergi Obat:</label>
      <!-- <input type="text" max="50" class="form-control" name="alergi_obat" value="<?php echo $data['alergi_obat'];?>" required> -->
      <textarea name="alergi_obat" cols="50" rows="5" class="form-control" maxlength="100" required><?php echo $data['alergi_obat'];?></textarea>
    </div>
    <div class="form-group">
      <label for="poli">Poli:</label>
      <select name="poli">
        <option value="<?php echo $data['poli'];?>"><?php echo $data['poli'];?></option>
        <option value="Umum">Umum</option>
        <option value="Gigi">Gigi</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php endforeach; ?>
  </form>
</div>

</body>
</html>