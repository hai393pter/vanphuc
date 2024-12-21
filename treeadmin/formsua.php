<?php
  require("../logincheck.php");
  if(isset($_GET["id_parent"]))
  {
    $id_parent=$_GET["id_parent"];
	if($id_parent=="") $id_parent=0;
  }	
  else $id_parent=0;  
  
  if(isset($_GET["kieunhap"]))
  {
    $kieunhap=$_GET["kieunhap"];
	if($kieunhap=="") $kieunhap=1;
  }  

  require('connect.php');
  if($id_parent=="") $id_parent=0;  
  $chuoihienthi="&#272;&#7872; M&#7908;C CH&#205;NH";
  if($id_parent!=0)
  {
    $sql="select * from danhmuc where id=$id_parent";  
    $result=mysql_query($sql);	
	$row=mysql_fetch_array($result);
	$chuoihienthi=$row["ten"];
  }
  
  switch($kieunhap)
  {
    case "1":require("formsuamuc.php");break;
	case "2":require("formsuatin.php");break;
	case "3":require("formsuaanh.php");break;
	case "4":require("formsuasanpham.php");break;
	default:require("formsuatin.php");break;
  }
?>