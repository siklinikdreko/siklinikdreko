<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/tbbootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/script.js"></script>
  <script src="<?php echo base_url()?>assets/js/datatable1.js"></script>
  <script src="<?php echo base_url()?>assets/js/datatable2.js"></script>
</head>
<body>
      <div id="content">
          <div class="table-responsive"></div> 
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">DAFTAR DATA PASIEN</h4>
            </div>
            <div class="card-body">
              <a href="<?php echo base_url('admin/registrasi_pasien') ?>"><h6 style="float: left;">+ Buat Akun Pasien</h6></a>
              <a href="<?php echo base_url('admin/list_akun_pasien') ?>"><h6 style="float : right;">List Akun Pasien</h6></a>
            </div>
          </div>

        <div class="table-responsive">
          <div style="padding-left: 1%; padding-right: 1%">
        <table style="padding-right: 1%;" id="example" class="table table-striped table-bordered"><!-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>ID Pasien</th>
              <th>Nama Lengkap</th>
              <th>Tgl Periksa</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
              <th>Keluhan</th>
              <th>Alergi Obat</th>
              <th>Poli</th> 
              <th>Status Pasien</th> 
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($admin as $data):?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_pasien']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['tgl_periksa']; ?></td>
              <td><?php echo $data['tgl_lahir']; ?></td>
              <td><?php echo $data['alamat']; ?></td>
              <td><?php echo $data['umur']; ?></td>
              <td><?php echo $data['jenis_kelamin']; ?></td>
              <td><?php echo $data['keluhan']; ?></td>
              <td><?php echo $data['alergi_obat']; ?></td>
              <td><?php echo $data['poli']; ?></td>
              <td><?php echo $data['status_pasien']; ?></td>
              <td>
                <a href="<?php echo base_url('admin/edit_pasien');?>/<?php echo $data['id_pasien'];?>"><button class="btn btn-outline-warning"> Edit</button></a><a href="<?php echo base_url('admin/hapus_pasien');?>/<?php echo $data['id_pasien'];?>"><button class="btn btn-outline-danger"> Hapus</button></a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({"dom":"lfrti"});
    } );
</script>
</html>