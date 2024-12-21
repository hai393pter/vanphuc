<?php require("../logincheck.php");?>
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
<?php
if(isset($_SESSION["status"]))
echo "<script language='javascript'>
function doExpand()
{
  if(kt==0){kt=1;excol.src='treeadmin_files/arrd.gif';}
  else{kt=0;excol.src='treeadmin_files/arru.gif';}
  showclick('dsk');
  expcol.location='saveexpcol.php';  
}
</script>";
else echo "<script language='javascript'>
function doExpand()
{
  if(kt==0){kt=1;excol.src='treeadmin_files/arru.gif';}
  else{kt=0;excol.src='treeadmin_files/arrd.gif';}
  showclick('dsk');
  expcol.location='saveexpcol.php';  
}
</script>";
?>
<script language="javascript">
var kt=0;
function showclick(obj)
{
  var el = document.getElementById(obj);
  if(el.style.display != "block") el.style.display = "block";
  else el.style.display = "none";
}
function doThem()
{
  var dialog=window.open("quantrisukien/taosk.php","","width=300,height=150");
  dialog.refreshme=refreshme;
}
function refreshme()
{
  window.location='../treeuser.php';
}
function doXoa()
{
  if(chimuc==-1) alert(msg2.value);
  else{
    if(confirm(msg3.value)) window.location="?status=ok&chimuc="+chimuc;
  }
}
function logout()
{
  parent.location='../login.php?logout=ok';
}
</script>
<SCRIPT src='treeadmin_files/ua.js'></SCRIPT>
<SCRIPT src='treeadmin_files/ftiens4.js'></SCRIPT>
<SCRIPT language='javascript'>
USETEXTLINKS = 1
STARTALLOPEN = 0
ICONPATH = ''
foldersTree = gFld("<b>&nbsp;&nbsp;C&#7845;u Tr&#250;c Trang</b>",'');
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
	  if(intval($kieunhap)==1)
	    echo "nut$id = insFld(foldersTree, gFld('$ten', ''));";		
	  else{
	    echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'));";
		echo "nut$id.iconSrc = ICONPATH + 'treeadmin_files/ftv2doc.gif';";
		echo "nut$id.iconSrcClosed = ICONPATH + 'treeadmin_files/ftv2doc.gif';";
	  }
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
	  if(intval($kieunhap)==1)
	    echo "nut$id = insFld(nut$so, gFld('$ten', ''));";
	  else{
	    echo "nut$id = insFld(nut$so, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'));";
		echo "nut$id.iconSrc = ICONPATH + 'treeadmin_files/ftv2doc.gif';";
		echo "nut$id.iconSrcClosed = ICONPATH + 'treeadmin_files/ftv2doc.gif';";
      }
	  echo "</script>";  
	  duyetcay($id);
	}	
  }  
?>
<body>
<iframe name="expcol" height="0" width="0"></iframe>
<p>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td bgcolor="#993399" style="cursor:pointer " onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='#993399'" onClick="logout();">Logout</td>
		<td height="20">Quản trị sản phẩm</td>
		<td><img src="<?php if(isset($_SESSION["status"])){?>treeadmin_files/arru.gif<?php }else{?>treeadmin_files/arrd.gif<?php }?>" onClick="doExpand();" style="cursor:pointer; " name="excol"></td></tr>		
	</table></td>
  </tr>
  <tr><td height="1"></td></tr>
   <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td height="20">Quản trị sản phẩm </td></tr>
	</table></td>
    </tr>
  <tr><td height="1"></td></tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable">
		  <tr>
			<td id="dsk" style="display:<?php if(isset($_SESSION["status"])) echo "none";else echo "block";?>;">
				<table width="100%"  border="0" cellspacing="1" cellpadding="0" class="inTable">				  
				  <tr>
					<td colspan="2">
					<A href='http://www.treemenu.net/' target=_blank></A>
					<SCRIPT>initializeDocument();</SCRIPT>
					</td>
				  </tr>
				</table>
			</td>
		  </tr>
		
		</table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td height="20">quan tri khach hang</td></tr>
	</table></td>
    </tr>
	<tr>
	<td height="20" onClick="parent.basefrm.location='quantrikhachang/danhsachkhachhang.php';">&nbsp;<a href="#">.danh sach khach hang</a></td>
	</tr>
     <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td height="20">Quản trị thư mục sản phẩm </td></tr>
	</table></td>
    </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable">
		  <tr>
			<td>
				<table width="100%"  border="0" cellspacing="1" cellpadding="0" class="inTable" style="cursor:pointer ">				
		       	<tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/taothumuc.php';">&nbsp;<a href="#">. tạo thư mục</a></td>
				  </tr> 
				<tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/xoathumuc.php';">&nbsp;<a href="#">. Xoá thư mục</a></td>
				  </tr>
						<tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/suathumuc.php';">&nbsp;<a href="#">. sửa thư mục</a></td>
				  </tr> 
				</table>
			</td>
		  </tr>
		</table></td>
  </tr>

			 
  <tr><td height="1"></td></tr>
   <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td height="20">quản trị nhóm sản phẩm </td></tr>
	</table></td>
    </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable">
		  <tr>
			<td>
				<table width="100%"  border="0" cellspacing="1" cellpadding="0" class="inTable" style="cursor:pointer ">				
		       	<tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/taosanpham.php';">&nbsp;<a href="#">. tạo nhóm sản phẩm</a></td>
				  </tr> 
					<tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/xoadongsp.php';">&nbsp;<a href="#">. xóa nhóm sản phẩm</a></td>
				  </tr> 
				</table>
			</td>
		  </tr>
		</table></td>
  </tr>

			 
  <tr><td height="1"></td></tr>
  <tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="inTable">
  		<tr><td height="20" style="padding-left:6px" onClick="parent.basefrm.location='download/frmupload.php';"><a href="#">Upload báo giá mới</a></td></tr></table>
  </td></tr>
  <tr><td height="1"></td></tr>  
  <?php if($quantri<=1){?>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="titleHead">
  		<tr><td height="20">Qu&#7843;n Tr&#7883;: [ <b><?php echo $_SESSION["username"];?></b> ]</td></tr>
	</table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable">
		  <tr>
			<td>
				<table width="100%"  border="0" cellspacing="1" cellpadding="0" class="inTable" style="cursor:pointer ">				
				  <tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/dstaikhoan.php';">&nbsp;<a href="#">. Danh s&#225;ch t&#224;i kho&#7843;n</a></td>
				  </tr>
				  <tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/taotaikhoan.php';">&nbsp;<a href="#">. T&#7841;o t&#224;i kho&#7843;n</a></td>
				  </tr>
				  <tr>
					<td height="20" onClick="parent.basefrm.location='quantritaikhoan/doitaikhoan.php';">&nbsp;<a href="#">. Thay &#273;&#7893;i t&#224;i kho&#7843;n</a></td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table></td>
  </tr>
  <?php }?>
</table>

</body>
</html>