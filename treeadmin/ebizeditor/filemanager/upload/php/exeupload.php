<?php
  $HTTP_POST_FILES['userfile']['name'];
  echo $dest_file = "../filemanager/browse/sample_html/images/".$HTTP_POST_FILES['userfile']['name'];  
  if (is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'])){
      copy($HTTP_POST_FILES['userfile']['tmp_name'], $dest_file);
  } else {
    echo "Possible file upload attack. Filename: " . $HTTP_POST_FILES['userfile']['name'];
  }
?>