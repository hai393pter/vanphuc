<?php
  //echo $HTTP_POST_FILES['userfile']['name'];  
  $dest_file = "listfile/".$HTTP_POST_FILES['userfile']['name'];  
  if(move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],$dest_file)){
    //copy($HTTP_POST_FILES['userfile']['tmp_name'], $dest_file);
	//echo "Upload file successfull! Filename:".$HTTP_POST_FILES['userfile']['name'];;
  }else{
    //echo "Possible file upload attack. Filename: ".$HTTP_POST_FILES['userfile']['name'];
  }
  echo "<script language='javascript'>
  alert('Bạn đã tải xong file: [".$HTTP_POST_FILES['userfile']['name']."]');
  window.location='frmupload.php';
  </script>";
?>