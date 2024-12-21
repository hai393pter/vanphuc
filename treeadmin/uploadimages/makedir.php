<?php
  $tm=$_GET["tm"];
  $tentm=$_GET["tentm"];
  mkdir("images/$tentm",0777);
  echo "<script language='javascript'>
  window.location='frmupload.php?tm=$tm';
  </script>";
?>