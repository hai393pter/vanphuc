<html>
<head>
<title>Phan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("css/admin.css");
-->
</style>
</head>
<SCRIPT src='treeadmin_files/ua.js'></SCRIPT>
<SCRIPT src='treeadmin_files/ftiens4.js'></SCRIPT>
<SCRIPT language='javascript'>
USETEXTLINKS = 1
STARTALLOPEN = 0
ICONPATH = ''
foldersTree = gFld('<b>< <u>&#272;&#7872; M&#7908;C CH&#205;NH</u> ></b>','danhsach.php?id_parent=0');
  foldersTree.iconSrc = ICONPATH + "treeadmin_files/firstnode.gif"
  foldersTree.iconSrcClosed = ICONPATH + "treeadmin_files/firstnode.gif"
</SCRIPT>
<?php   
  require('connect.php');
  $sql="select * from danhmuc where id_parent='0' order by capnhat desc";  
  $result=mysql_query($sql);
  if(mysql_num_rows($result)!=0)  
    while($row=mysql_fetch_array($result))
	{
	  echo "<script language='javascript'>";
	  $id=$row["id"];
	  $ten=$row["ten"];
	  $kieunhap=$row["kieunhap"];
	  echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'))";
	  echo "</script>";  
	  duyetcay($id);
	}
  function duyetcay($so)
  {     
    $sql="select * from danhmuc where id_parent='$so' order by capnhat desc";    
	$result1=mysql_query($sql);
	if(mysql_num_rows($result1)!=0) while($row=mysql_fetch_array($result1))
	{
	  echo "<script language='javascript'>";
	  $id=$row["id"];
	  $ten=$row["ten"];
	  $kieunhap=$row["kieunhap"];
	  echo "nut$id = insFld(nut$so, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'))";
	  echo "</script>";  
	  duyetcay($id);
	}	
  }  
?>
<body>
&nbsp;
<A href='http://www.treemenu.net/' target=_blank></A>
<SCRIPT>initializeDocument();</SCRIPT>
<?php
  $id=$_GET["id"];   
  if($id!="")
  {  
    $d=1;
	$a=array(100);	
    while($id!=0)
    {
	    $a[$d]=$id;
        $sql="select id_parent from danhmuc where id=$id";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
	    $id=$row["id_parent"];	  
	    $d++;
    }      
    for($i=$d;$i>=1;$i--) 
    {
      $id=intval($a[$i]);
	  if($id!=0) echo "<script>clickOnNodeObj(nut$id);</script>";
    }
  }	
?>
</body>
</html>
