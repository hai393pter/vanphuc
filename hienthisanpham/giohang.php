<br><?php
  @session_start();  
  if(isset($_GET["sess"]))
  {
    if(isset($_SESSION["update"]))
	{
	  $sess=$_GET["sess"];
	  $id_sanpham=$_GET["id"];
	  $soluong=$_GET["sl"];
	  $choice=$_GET["choice"];
	  if(intval($choice)==1) $sql="insert into giohang(sess,id_sanpham,soluong) values('$sess',$id_sanpham,$soluong)";
	  else $sql="update giohang set soluong=$soluong where sess='$sess' and id_sanpham=$id_sanpham";
	  mysql_query($sql);
	  echo "<script language='javascript'>window.location='?page=shoppingcart';</script>";
	  unset($_SESSION["update"]);
	}else{
	  $_SESSION["back"]="ok";
	  echo "<script language='javascript'>history.go(-1);</script>";
	}  
  }
  require_once("modulesupport/process.php");  
  if(!isset($_SESSION["sess"])) echo "<center class='markred'>Gi&#7887; h&#224;ng c&#7911;a b&#7841;n ch&#432;a c&#243; s&#7843;n ph&#7849;m n&#224;o!</center>";
  else{
    $sess=$_SESSION["sess"];
	$sql="select * from giohang where sess='$sess'";
	$idresult=mysql_query($sql);
	if(mysql_num_rows($idresult)!=0){ 
	?>
	<center class="markred">CHI TI&#7870;T GI&#7886; H&#192;NG</center><br>
	<table border="0" cellpadding="0" cellspacing="1" bgcolor="#B0C6E2" align="center">	
	  <tr bgcolor="#CCCCFF" class="header"><td align="center">&#7842;nh</td>
	  <td width="100" align="center">&nbsp;T&#234;n s&#7843;n ph&#7849;m</td>	
	  <td width="50" align="center">&#272;&#417;n gi&#225;<br>(VNÐ)</td>
	  <td width="50" align="center">S&#7889; l&#432;&#7907;ng</td>	    	  
	  <td width="70" align="center">Th&#224;nh ti&#7873;n<br>(VNÐ)</td>
	  <td width="30"></td></tr>
	  <form method="post" action="hienthisanpham/tinhlai.php" name="frm">
	<?php $tong=0;while($row=mysql_fetch_array($idresult)){
	  $sql="select * from sanpham where id_sp=".$row["id_sanpham"];
	  $resultkq=mysql_query($sql);
	  $rowkq=mysql_fetch_array($resultkq);
	  $tong=$tong+intval($rowkq["gia"])*intval($row["soluong"]);	  
	?>	
	  <tr bgcolor="#FFFFFF"><td height="70" width="70" align="center"><?php fitimage("quantrisanpham/upload/images/".$rowkq["anhsanpham"],60);?></td>
	  <td>&nbsp;<?php echo $rowkq["tensanpham"];?></td>	  
	  <td align="center"><font color="#CC9900"><?php $gia=$rowkq["gia"];echo chenphay("$gia");?></font></td>
	  <td align="center"><input name="<?php echo $row["id"];?>" type="text" class="TextBox" value="<?php echo $row["soluong"];?>" size="4"></td>
	  <td align="right"><?php echo chenphay(intval($rowkq["gia"])*intval($row["soluong"]));?>&nbsp;&nbsp;</td>
	  <td align="center"><a href="hienthisanpham/xoa.php?iddel=<?php echo $row["id"];?>">X&#243;a</a></td></tr>
	<?php }?>
	</form>
	  <tr bgcolor="#FFFFCC"><td colspan="4" align="right"><b>T&#7893;ng c&#7897;ng:</b>&nbsp;</td>
	  <td align="right" height="25"><?php echo chenphay($tong);?>&nbsp;&nbsp;</td><td></td></tr>
</table>
<br><center><a href="javascript:frm.submit();">T&#237;nh l&#7841;i ti&#7873;n</a> | <a href="index?page=order">&#272;&#7863;t h&#224;ng</a> | <a href="hienthisanpham/xoa.php">H&#7911;y gi&#7887; h&#224;ng</a></center>
	<?php }else echo "<center class='markred'>Gi&#7887; h&#224;ng c&#7911;a b&#7841;n ch&#432;a c&#243; s&#7843;n ph&#7849;m n&#224;o!</center>";
  }
?>
<br><center><a href="index.php?page=sanpham">Xem gian h&#224;ng</a></center>
<br>
<?php
  if(isset($_SESSION["nhapthongtin"]))
  {
    $sql="select * from thongtinkhachhang where sess='$sess'";
	$resultthongtin=mysql_query($sql);
	$rowthongtin=mysql_fetch_array($resultthongtin);
?>
<?php }?>
<br>