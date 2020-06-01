<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buat Akun Pasien</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Akun Pasien</h2>
  <form action="<?php echo base_url('admin/proses_registrasi_akun_pasien')?>" method="post">
    <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" max="50" class="form-control" name="nama" required>
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" max="50" class="form-control" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" max="30" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </div>
  </form>
</div>

</body>
</html>