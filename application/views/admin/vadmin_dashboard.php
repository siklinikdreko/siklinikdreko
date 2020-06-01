<style>
  .font {font-size: 12px;}
</style>

      <div id="content">
          <div class="table-responsive"></div> 
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 style="float: left;" class="m-0 font-weight-bold text-primary">HELLO ADMIN <?php echo strtoupper($_SESSION['nama']); ?></h4>
              <h6 style="float: right;"><?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s');?></h6> 
            </div>
            <div class="card-body">
              <h6>Total Pasien Hari Ini : <?php foreach($admin1 as $d1){echo $d1['pasien'];} ?></h6>
              <h6>Total Pasien Poli Umum Hari Ini : <?php foreach($admin2 as $d2){echo $d2['pasien_umum'];} ?></h6>
              <h6>Total Pasien Poli Gigi Hari Ini : <?php foreach($admin3 as $d3){echo $d3['pasien_gigi'];} ?></h6>
              <h6>Total Pasien Sudah Diperiksa Hari Ini : <?php foreach($admin6 as $d6){echo $d6['pasien_diperiksa'];} ?></h6>
              <h6>Total Pasien Belum Diperiksa Hari Ini : <?php foreach($admin7 as $d7){echo $d7['pasien_blm'];} ?></h6>
              <h6>Dokter Masuk Hari Ini : <?php foreach($admin4 as $d4){echo $d4['dokter_masuk'];} ?></h6>
              <h6>Dokter Tidak Masuk Hari Ini : <?php foreach($admin5 as $d5){echo $d5['dokter_tidak_masuk'];} ?></h6>
            </div>
          </div>
        </div>