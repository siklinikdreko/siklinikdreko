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
        <div id="content">
          <div class="table-responsive"></div> 
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">RIWAYAT PENYAKIT PASIEN</h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <div style="padding-left: 1%; padding-right: 1%">
        <table id="example" class="table table-striped table-bordered"><!-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
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
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({"dom":"lfrti"});
    } );
</script>