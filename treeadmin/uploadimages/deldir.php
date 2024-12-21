<?php
  $tm=$_GET["tm"];
  if(isset($_GET["del"])) rmdir("images/$tm");
  else{    
    $dir=dir("images/$tm/"); 
    $file=$dir->read();
    $file=$dir->read();
    while($file=$dir->read()) unlink("images/$tm/$file");    
	echo "<script language='javascript'>
    window.location='deldir.php?tm=$tm&del=ok';
    </script>";  
  }  
  echo "<script language='javascript'>
  window.location='frmupload.php';
  parent.list.location='listimage.php';
  </script>";  
?>