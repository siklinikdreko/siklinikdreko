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
            </div>
          </div>

        <div class="table-responsive">
          <div style="padding-left: 1%; padding-right: 1%">
        <table id="example" class="table table-striped table-bordered"><!-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>ID Pasien</th>
              <th>Nomor Antrian</th>
              <th>Nama Lengkap</th>
              <th>Tgl Periksa</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
              <th>Keluhan</th>
              <th>Alergi Obat</th>
              <th>Status Pasien</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pasien as $data):?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_pasien']; ?></td>
              <td><?php echo $data['no_antrian']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['tgl_periksa']; ?></td>
              <td><?php echo $data['tgl_lahir']; ?></td>
              <td><?php echo $data['alamat']; ?></td>
              <td><?php echo $data['umur']; ?></td>
              <td><?php echo $data['jenis_kelamin']; ?></td>
              <td><?php echo $data['keluhan']; ?></td>
              <td><?php echo $data['alergi_obat']; ?></td>
              <td><?php echo $data['status_pasien']; ?></td>
              <td><a href="<?php echo base_url('dokter/periksa_pasien');?>/<?php echo $data['id_pasien'];?>"><button class="btn btn-outline-warning">Periksa</button></a></td>
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