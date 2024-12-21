<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>GIO HANG</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_displayStatusMsg(msgStr) { //v1.0
  status=msgStr;
  document.MM_returnValue = true;
}
//-->
</script>
</head>
<style>
<!--
@import url("../css/style.css");
@import url("../css/frontend.css");
-->
</style>
<body>
<?php
    $sess=$_GET["sess"];
	require("../connect.php");
	require_once("../modulesupport/process.php");  
    $sql="select * from thongtinkhachhang where sess='$sess'";
	$resultthongtin=mysql_query($sql);
	$rowthongtin=mysql_fetch_array($resultthongtin);
?>
<center><span class="markred">TH&#212;NG TIN LI&#202;N H&#7878; C&#7910;A KH&#193;CH H&#192;NG</span></center>
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" align="center" width="420">
<tr bgcolor="#FFFFFF"><td width="60">&nbsp;H&#7885; t&#234;n:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["hoten"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;&#272;&#7883;a ch&#7881;:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["diachi"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;&#272;&#7845;t n&#432;&#7899;c:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["datnuoc"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;&#272;i&#7879;n tho&#7841;i:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["dienthoai"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;Fax:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["fax"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;Email:</td><td class="checkLabel">&nbsp;<a href="mailto:<?php  echo $rowthongtin["email"]?>"><?php  echo $rowthongtin["email"]?></a></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;Ti&#234;u &#273;&#7873;:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["tieude"]?></td>
</tr>
<tr bgcolor="#FFFFFF"><td>&nbsp;N&#7897;i dung:</td><td class="checkLabel">&nbsp;<?php  echo $rowthongtin["noidung"]?></td>
</tr>
</table>
<br>
<?php   
	$sql="select * from giohang where sess='$sess'";
	$idresult=mysql_query($sql);
	if(mysql_num_rows($idresult)!=0){ 
	?>
	<center class="markred">CHI TI&#7870;T GI&#7886; H&#192;NG</center>
	<table border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" align="center">	
	  <tr bgcolor="#CCCCFF" class="header"><td align="center">&#7842;nh</td>
	  <td width="150">&nbsp;T&#234;n s&#7843;n ph&#7849;m</td>	
	  <td width="50" align="center">&#272;&#417;n gi&#225;</td>
	  <td width="70" align="center">S&#7889; l&#432;&#7907;ng</td>	    	  
	  <td width="80" align="center">Th&#224;nh ti&#7873;n</td>
	  </tr>
	<?php $tong=0;while($row=mysql_fetch_array($idresult)){
	  $sql="select * from sanpham where id_sp=".$row["id_sanpham"];
	  $resultkq=mysql_query($sql);
	  $rowkq=mysql_fetch_array($resultkq);
	  $tong=$tong+intval($rowkq["gia"])*intval($row["soluong"]);
	 ?>	
	  <tr bgcolor="#FFFFFF"><td height="70" width="70" align="center"><?php fitimage("../news_images/images/".$rowkq["anhsp"],60);?></td>
	  <td>&nbsp;<?php echo $rowkq["tensp"];?></td>	  
	  <td align="center"><?php echo $rowkq["gia"];?></td>
	  <td align="center"><?php echo $row["soluong"];?></td>
	  <td align="center"><?php echo intval($rowkq["gia"])*intval($row["soluong"]);?></td>
	  </tr>
	<?php }?>
	  <tr bgcolor="#FFFFCC"><td colspan="4" align="right"><b>T&#7893;ng c&#7897;ng:</b>&nbsp;</td>
	  <td align="center" height="25"><?php echo $tong;?></td></tr>
</table>	
	<?php }?><br>
<?php
  if(isset($_GET["test"]))
  {
    $test=$_GET["test"];
    if($test=="admin"){?>
	<center><a href="sendlink.php?sess=<?php echo $sess;?>">G&#7917;i li&#234;n k&#7871;t cho kh&#225;ch h&#224;ng x&#225;c nh&#7853;n</a></center>	
	<?php
	  }
  }else{?>
	<center><a href="xacthuc.php?sess=<?php echo $sess;?>" onMouseOver="MM_displayStatusMsg('X&#225;c nh&#7853;n th&#244;ng tin!!!');return document.MM_returnValue">X&#225;c nh&#7853;n th&#244;ng tin</a>
	</center>
  <?php }?>	
</body>
</html>
