<?php require("../logincheck.php");?>
<?php
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
  else $kieunhap=1;
  
  require('connect.php');
  function cap($idchimuc)
  {
    $d=0;
    while($idchimuc!=0)
    {
       $sql="select id_parent from danhmuc where id=$idchimuc";
	   $resultcap=mysql_query($sql);
	   $row=mysql_fetch_array($resultcap);
	   $idchimuc=$row["id_parent"];	  
	   $d++;
    }  
	return $d;
  }  
  if(intval($kieunhap)==1)
  {
    if($quantri!=0)  
		echo "<script language='javascript'>
		parent.treeframe.location='treeuser.php?id=$id_parent';
		</script>";
	else
		echo "<script language='javascript'>
		parent.treeframe.location='treeadmin.php?id=$id_parent';
		</script>";
  }
?>
<?php   
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
    case "1":require("danhsachmuc.php");break;
	case "2":require("danhsachtin.php");break;
	case "3":require("danhsachanh.php");break;
	case "4":require("danhsachsanpham.php");break;
	default:require("danhsachmuc.php");break;
  }
?>
