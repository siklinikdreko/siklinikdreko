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
              <h4 class="m-0 font-weight-bold text-primary">DAFTAR DATA AKUN PASIEN</h4>
            </div>
            <div class="card-body">
               <a href="<?php echo base_url('admin/list_pasien') ?>"><h6 style="float: right;">< Kembali</h6></a>
            </div>
          </div>
        <div class="table-responsive">
          <div style="padding-left: 1%; padding-right: 1%">
        <table id="example" class="table table-striped table-bordered"><!-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>ID User</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
             <?php $no=1; foreach($akun as $data){?>
            <tr>
              <td><?php echo $no++;?></td>
              <td><?php echo $data['id_user'];?></td>
              <td><?php echo $data['username'];?></td>
              <td><?php echo $data['password'];?></td>
              <td><?php echo $data['nama'];?></td>
              <td>
                <a href="<?php echo base_url('admin/edit_akun_pasien');?>/<?php echo $data['id_user']; ?>"><button class="btn btn-outline-warning"> Edit</button></a>  <a href="<?php echo base_url('admin/hapus_akun_pasien') ?>/<?php echo $data['id_user']; ?>"><button class="btn btn-outline-danger"> Hapus</button></a>
              </td>
            </tr>
            <?php }?>
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