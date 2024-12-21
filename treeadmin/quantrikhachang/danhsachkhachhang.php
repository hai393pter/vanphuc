<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Danh Sach Khach Hang</title>
<style>
<!--
@import url("../css/admin.css");
-->
</style>
</head>
<script language="javascript">
</script>
<body>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif"  align="absbottom">&nbsp;Danh S&#225;ch Kh&#225;ch H&#224;ng</div>
<p>
<table width="98%"  border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	  <table width="100%" border="0" align="right" cellpadding="0" cellspacing="1" class="titleHead" id="head">
	    <tr>
		  <td width="30">STT</td>
          <td width="130">&nbsp;H&#7885; t&#234;n</td>
		  <td width="210">Email</td>
		  <td>&nbsp;Ti&#234;u &#273;&#7873;</td>
		  <td width="60">X&#225;c th&#7921;c</td>
		  <td width="80">G&#7917;i x&#225;c nh&#7853;n</td>
		  <td width="50"></td>
        </tr>
	  </table>
    </td>
  </tr>
  <tr><td height="1"></td></tr>
  <tr>
    <td>
	  <table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable" id="dssanpham">
        <tr>
          <td>
		    <table width="100%"  border="0" cellspacing="1" cellpadding="0">
			<?php
			  require("../connect.php");
			  if(isset($_GET["sess"]))
			  {
				$sess=$_GET["sess"];
				$sql="delete from thongtinkhachhang where sess='$sess'";
				mysql_query($sql);
				$sql="delete from giohang where sess='$sess'";
				mysql_query($sql);
			  }
			  $sql="select * from thongtinkhachhang order by capnhat asc";
			  $result=mysql_query($sql);
			  $i=1;
			  if(mysql_num_rows($result)) while($row=mysql_fetch_array($result)){
			?>	
				
					<tr bgcolor="#FFFFFF" onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='#FFFFFF'">
					<td width="30" align="center"><?php echo $i;?></td>
					<td width="130">&nbsp;<?php echo $row["hoten"];?></td>
					<td width="210"><a href="mailto:<?php echo $row["email"];?>">&nbsp;<?php echo $row["email"];?></a></td>
					<td>&nbsp;<?php echo $row["tieude"];?></td>
					<td width="60" align="center"><?php if(intval($row["xacthuc"])!=0) echo "r&#7891;i";else echo "ch&#432;a";?></td>
					<td width="80" align="center"><?php if(intval($row["danhan"])!=0) echo "r&#7891;i";else echo "ch&#432;a";?></td>
					<td width="50" align="center"><a href="viewinfo.php?sess=<?php echo $row["sess"];?>&test=admin" target="_blank">Chi ti&#7871;t</a><br><a href="javascript:xoa<?php echo $row["sess"];?>();">X&#243;a</a></a>
				    <a href="javascript:if(confirm('ban muon xoa khach hang <?php echo $row["hoten"];?> ch&#7913;?')) window.location='?sess=<?php echo $row["sess"];?>';">X&#243;a</a></td></tr>		
					
			<?php }?>
			</table>
		  </td>
		</tr>
	  </table>
    </td>
  </tr>
</table>
</body>
</html>
