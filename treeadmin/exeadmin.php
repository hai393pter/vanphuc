<?php    
  function xoa($id,$link)
  {
    $sql="delete from danhmuc where id=$id";
    mysql_query($sql);
	$sql="delete from tinbai where id_parent=$id";
    mysql_query($sql);
	$sql="delete from sanpham where id_parent=$id";
    mysql_query($sql);
	$sql="delete from suutap where id_parent=$id";
    mysql_query($sql);
	$sql="select id from danhmuc where id_parent=$id";
    $result=mysql_query($sql,$link);
	if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)) xoa($row["id"],$link);
  }
  $id=$_GET["id"];  
  $id_parent=$_GET["id_parent"];
  $kieunhap=$_GET["kieunhap"];
  require_once("connect.php");
  xoa($id,$link);
  echo "<script language='javascript'>
  window.location='danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap';
  </script>";
?>