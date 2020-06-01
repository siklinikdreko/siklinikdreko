<!DOCTYPE html>
<html lang="en">
<head>
  <title>Setting Dokter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Setting Dokter</h2>
  <form action="<?php echo base_url('dokter/proses_setting_dokter')?>" method="post">
    <div class="form-group">
      <label for="username0">Username Lama:</label>
      <input type="text" max="10" class="form-control" name="username0" required>
    </div>
    <div class="form-group">
      <label for="username">Username Baru:</label>
      <input type="text" max="10" class="form-control" name="username" required>
    </div>
    <div class="form-group">
      <label for="password0">Password Lama:</label>
      <input type="password" max="30" class="form-control" name="password0" required>
    </div>
    <div class="form-group">
      <label for="password">Password Baru:</label>
      <input type="password" max="30" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </div>
  </form>
</div>

</body>
</html>