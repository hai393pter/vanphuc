<?php
$folder=$_GET["tm"];
$uploadDir="images/$folder/";
$uploadFile=$uploadDir . $_FILES['userfile']['name'];
//print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile))
{
    //print "File is valid, and was successfully uploaded. ";
    //print "Here's some more debugging info:\n";
    //print_r($_FILES);
}
else
{
    //print "Possible file upload attack!  Here's some debugging info:\n";
    //print_r($_FILES);
}
//print "</pre>";
echo "<script language='javascript'>
  parent.list.location='listimage.php?tm=$folder';
  window.location='frmupload.php?tm=$folder';  
  </script>";
?>