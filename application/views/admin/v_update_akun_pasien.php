<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Akun Pasien</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Akun Pasien</h2>
  <form action="<?php echo base_url('admin/proses_update_akun_pasien')?>" method="post">
    <?php foreach ($akun as $data): ?>
    <div class="form-group">
       <input type="text" name="id_user" value="<?php echo $data['id_user']; ?>" hidden>
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" max="10" class="form-control" value="<?php echo $data['username']; ?>" name="username" required>
    </div>
    <div class="form-group">
      <label for="password0">Password:</label>
      <input type="password" max="30" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <label for="password">Nama:</label>
      <input type="text" max="30" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" required>
    </div>
    <div class="form-group">
      <?php endforeach;?>
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </div>
  </form>
</div>

</body>
</html>