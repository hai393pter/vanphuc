<?php
  $sess=$_GET["sess"];
  require("../connect.php");
  $sql="update thongtinkhachhang set xacthuc=1 where sess='$sess'";
  mysql_query($sql);
?>
<script language="javascript">window.close();</script>