<?php  
    require("TreeAdmin/connect.php");
    @session_start();
	if(isset($_SESSION["back"]))
	{
	  unset($_SESSION["back"]);
	  echo "<script language='javascript'>history.go(-1);</script>";
	}
    if(!isset($_SESSION["sess"]))
    {
      $sql="select max(id) from giohang";    
	  $resultmax=mysql_query($sql);
	  $rowmax=mysql_fetch_array($resultmax);
	  if(intval($rowmax[0])==0) $max=1;else $max=intval($rowmax[0])+1;
	  $_SESSION["sess"]=md5($max);	  
    }
	$sess=$_SESSION["sess"];
    $id_sanpham=$_GET["id"];
	$soluong=$_GET["sl"];
	$sqldem="select * from giohang where sess='$sess' and id_sanpham=$id_sanpham";
	$resulttontai=mysql_query($sqldem);
	if(mysql_num_rows($resulttontai)==0){
	  $choice=1;
	}else{
	  $rowsl=mysql_fetch_array($resulttontai);
	  $soluong=$soluong+$rowsl["soluong"];
	  $choice=2;
	}
	$_SESSION["update"]="ok";
	header("location: ../index.php?page=shoppingcart&sess=$sess&id=$id_sanpham&sl=$soluong&choice=$choice");
	/*
	echo "<script language='javascript'>window.location='../index.php?page=shoppingcart&sess=$sess&id=$id_sanpham&sl=$soluong&choice=$choice';</script>";
	*/
?>
