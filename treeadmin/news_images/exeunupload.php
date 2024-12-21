<?php 
  $file=$_POST["pathanhxoa"]; 
  unlink($file);
?>
<script language="javascript">
window.location="listimage.php";
</script>