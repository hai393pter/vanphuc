<?php
  echo $HTTP_POST_FILES['userfile']['name'];  
  $dest_file = "images/".$HTTP_POST_FILES['userfile']['name'];  
  if(is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'])){
    copy($HTTP_POST_FILES['userfile']['tmp_name'], $dest_file);
	//echo "Upload file successfull! Filename:".$HTTP_POST_FILES['userfile']['name'];;
  }else{
    //echo "Possible file upload attack. Filename: ".$HTTP_POST_FILES['userfile']['name'];
  }
?>
<script language="javascript">
window.location="frmupload.php";
parent.list.location="listimage.php";
</script>