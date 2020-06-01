<style>
  .font {font-size: 12px;}
</style>

      <div id="content">
        <?php foreach ($dokter as $data):?>
          <!-- Page Heading -->


          <!-- DataTales Example -->
          <div class="table-responsive"></div> 
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 style="float: left;" class="m-0 font-weight-bold text-primary">Selamat Datang Dr. <?php echo $_SESSION['nama']; ?></h4>
              <h4 style="float: right;" class="m-0 font-weight-bold text-primary">Poli <?php echo $data['poli']; ?></h4>
            </div>
            <div class="card-body">
              <h6>Status Anda : <?php echo $data['status'];?></h6>
              <?php 
              if ($data['status'] == 'Masuk') {?>
                <a href="<?php echo base_url('dokter/check_out');?>/<?php echo $data['nip']; ?>"><h6 style="float: left;">Check Out</h6></a>
              <?php }
              elseif($data['status'] == 'Tidak Masuk'){?>
                <a href="<?php echo base_url('dokter/check_in');?>/<?php echo $data['nip']; ?>"><h6 style="float: left;">Check In</h6></a>
              <?php } ?>
            </div>
          </div>
        <?php endforeach; ?>
        </div>