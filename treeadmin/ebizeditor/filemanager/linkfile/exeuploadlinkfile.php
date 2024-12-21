<?php
  //echo $HTTP_POST_FILES['userfile']['name'];  
  $dest_file = "../browse/sample_html/docs/".$HTTP_POST_FILES['FCKeditor_File']['name'];  
  if(move_uploaded_file($HTTP_POST_FILES['FCKeditor_File']['tmp_name'],$dest_file)){
    //copy($HTTP_POST_FILES['userfile']['tmp_name'], $dest_file);
	//echo "Upload file successfull! Filename:".$HTTP_POST_FILES['userfile']['name'];;
  }else{
    //echo "Possible file upload attack. Filename: ".$HTTP_POST_FILES['userfile']['name'];
  }
?>
<br>
<center>T&#7853;p tin [<?php echo $HTTP_POST_FILES['FCKeditor_File']['name'];?>] &#273;&#227; &#273;&#432;&#7907;c t&#7843;i!<br><br>
<a href="javascript:window.close();">[&#272;&#243;ng]</a></center>