<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Dokter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Update Dokter</h2>
  <form action="<?php echo base_url('admin/proses_edit_dokter')?>" method="post">
    <?php foreach ($dokter as $data):?>
    <div class="form-group">
      <input type="text" name="id_user" value="<?php echo $data['id_user']; ?>" hidden>
    </div>
    <div class="form-group">
      <input type="text" name="nip" value="<?php echo $data['nip']; ?>" hidden>
    </div>
    <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" max="50" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
    </div>
    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir:</label>
      <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" max="50" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" required>
    </div>
    <div class="form-group">
      <label for="poli">Poli:</label><br>
      <select name="poli">
        <option value="<?php echo $data['poli'] ?>"> <?php echo $data['poli'] ?> </option>
        <option value="Umum">Umum</option>
        <option value="Gigi">Gigi</option>
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status:</label><br>
      <select name="status">
        <option value="<?php echo $data['status'] ?>"> <?php echo $data['status'] ?> </option>
        <option value="Masuk">Masuk</option>
        <option value="Tidak Masuk">Tidak Masuk</option>
        <option value="Resign">Resign</option>
      </select>
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" max="50" class="form-control" name="username" value="<?php echo $data['username']; ?>" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" max="30" class="form-control" name="password" value="<?php echo $data['password']; ?>" required>
    </div>
    <div class="form-group">
      <?php endforeach;?>
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </div>
  </form>
</div>

</body>
</html>