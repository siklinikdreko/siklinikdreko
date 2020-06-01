<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/tbbootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/content.css">
  <script src="<?php echo base_url()?>assets/js/script.js"></script>
  <script src="<?php echo base_url()?>assets/js/datatable1.js"></script>
  <script src="<?php echo base_url()?>assets/js/datatable2.js"></script>
</head>
<body>
      <div class="header">
        <h2 align="center">Riwayat Periksa</h2>
        <h5 style="float: right;"><a href="<?php echo base_url('pasien')?>"> < Kembali </a></h5>
      </div>

        <div style="padding-left:1%; padding-right: 1%">
        <table id="example" class="table table-striped table-bordered"><!-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Nama Dokter</th>
              <th>Tanggal Periksa</th>
              <th>TTL</th>
              <th>Umur</th>
              <th>Alamat</th>
              <th>Keluhan</th>
              <th>Alergi Obat</th>
              <th>Resep Obat</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pasien as $data):?>
            <tr>
              <td><?php echo $no++;?></td>
              <td><?php echo $data['nama'];?></td>
              <td><?php echo $data['nama_dokter'];?></td>
              <td><?php echo $data['tgl_periksa'];?></td>
              <td><?php echo $data['tgl_lahir'];?></td>
              <td><?php echo $data['umur'];?></td>
              <td><?php echo $data['alamat'];?></td>
              <td><?php echo $data['keluhan'];?></td>
              <td><?php echo $data['alergi_obat'];?></td>
              <td><?php echo $data['resep_obat'];?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</html>