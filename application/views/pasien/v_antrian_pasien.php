<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="2; url=<?php echo base_url('pasien');?>">
<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
 window.focus();
 window.print();
//}
</script>
</head>
<body>
<div id="print_antrian">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<center>
<table style="width:300px;">
<tr>
<td class="text-center">
<div class="container text-center">
  <div class="row">
    <div class="col-md bg-success" style="padding:10px;text-align:center">
      <div style="border-top:1px solid gray;width: 230px;margin-left: auto;margin-right: auto;"></div>
      <div style="padding:5px;font-weight:bold;font-size:15px;">ANTRIAN KLINIK DR.EKO</div>      
      <div style="font-size:50px;font-weight:bold;padding:5px;">
        <?php echo $pasien; ?>
      </div>
      <div style="padding-top:5px;font-size:13px;">
      <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s'); ?>
      </div>
      <hr/>
      </div>
  </div>
</div>  
</td>
</tr>
</table>
</center>
</div>
</body>
</html>