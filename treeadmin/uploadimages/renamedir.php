<?php
  $tm=$_GET["tm"];
  $tentm=$_GET["tentm"];
  rename("images/".$tm,"images/".$tentm);
  echo "<script language='javascript'>
  parent.list.location='listimage.php?tm=$tentm';
  window.location='frmupload.php?tm=$tentm';
  </script>";
?>