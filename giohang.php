<table width="97%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td><img src="images/logo.jpg" align="right" alt="" border="0"></td></tr>
<tr>
<td><table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td>
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
  if(!isset($_SESSION["sess"])) echo "<center class='kho1'>Gi&#7887; h&#224;ng c&#7911;a b&#7841;n ch&#432;a c&#243; s&#7843;n ph&#7849;m n&#224;o!</center>";
  else{
    $sess=$_SESSION["sess"];
	$sql="select * from giohang where sess='$sess'";
	$idresult=mysql_query($sql);
	if(mysql_num_rows($idresult)!=0){ 
	?>
	<center class="kho1">CHI TI&#7870;T GI&#7886; H&#192;NG</center><br>
	<table border="0" cellpadding="0" cellspacing="1" bgcolor="#B0C6E2" align="center">	
	  <tr bgcolor="#CCCCFF" class="kho"><td align="center">&#7842;nh</td>
	  <td width="100" align="center">&nbsp;T&#234;n s&#7843;n ph&#7849;m</td>	
	  <td width="50" align="center">&#272;&#417;n gi&#225;<br>(vnđ)</td>
	  <td width="50" align="center">S&#7889; l&#432;&#7907;ng</td>	    	  
	  <td width="70" align="center">Th&#224;nh ti&#7873;n<br>(vnđ)</td>
	  <td width="30"></td></tr>
	  <form method="post" action="hienthisanpham/tinhlai.php" name="frm">
	<?php $tong=0;while($row=mysql_fetch_array($idresult)){
	  $sql="select * from sanpham where id_sp=".$row["id_sanpham"];
	  $resultkq=mysql_query($sql);
	  $rowkq=mysql_fetch_array($resultkq);
	  $tong=$tong+intval($rowkq["gia"])*intval($row["soluong"]);	  
	?>	
	  <tr bgcolor="#FFFFFF"><td height="70" width="70" align="center"><?php fitimage("treeadmin/news_images/images/".$rowkq["anhsp"],60);?></td>
	  <td class="kho">&nbsp;<?php echo $rowkq["tensp"];?></td>	  
	  <td align="center"><font color="#CC9900"><?php $gia=$rowkq["gia"];echo chenphay("$gia");?></font></td>
	  <td align="center"><input name="<?php echo $row["id"];?>" type="text" class="TextBox" value="<?php echo $row["soluong"];?>" size="4"></td>
	  <td align="right"><?php echo chenphay(intval($rowkq["gia"])*intval($row["soluong"]));?>&nbsp;&nbsp;</td>
	  <td align="center" class="kho"><a href="hienthisanpham/xoa.php?iddel=<?php echo $row["id"];?>">X&#243;a</a></td></tr>
	<?php }?>
	</form>
	  <tr bgcolor="#FFFFCC" class="kho"><td colspan="4" align="right" ><b>T&#7893;ng c&#7897;ng:</b>&nbsp;</td>
	  <td align="right" height="25"><?php echo chenphay($tong);?>&nbsp;&nbsp;</td><td></td></tr>
</table>
<br><center><a href="javascript:frm.submit();" class="kho">T&#237;nh l&#7841;i ti&#7873;n</a> | <a href="index.php?page=order" class="kho">&#272;&#7863;t h&#224;ng</a> | <a href="hienthisanpham/xoa.php" class="kho">H&#7911;y gi&#7887; h&#224;ng</a></center>
	<?php }else echo "<center class='markred'>Gi&#7887; h&#224;ng c&#7911;a b&#7841;n ch&#432;a c&#243; s&#7843;n ph&#7849;m n&#224;o!</center>";
  }
?>
<br><center><a href="index.php?page=sanpham" class="kho">Xem gian h&#224;ng</a></center>
<br>
<?php
  if(isset($_SESSION["nhapthongtin"]))
  {
    $sql="select * from thongtinkhachhang where sess='$sess'";
	$resultthongtin=mysql_query($sql);
	$rowthongtin=mysql_fetch_array($resultthongtin);
?>
<center><span class="kho1">TH&#212;NG TIN LI&#202;N H&#7878; C&#7910;A B&#7840;N</span></center>
<table border="0" cellpadding="0" cellspacing="1" align="center" width="390">
</tr>
<tr >&nbsp;<td width="100" >&nbsp;H&#7885; t&#234;n:</td>
<td class="checkLabel" >&nbsp;&nbsp;<?php  echo $rowthongtin["hoten"]?></td>
</tr>
<tr ><td width="100" >&nbsp;&#272;&#7883;a ch&#7881;:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["diachi"]?></td>
</tr>
<tr><td  width="100" >&nbsp;&#272;&#7845;t n&#432;&#7899;c:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["datnuoc"]?></td>
</tr>
<tr ><td  width="100" >&nbsp;&#272;i&#7879;n tho&#7841;i:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["dienthoai"]?></td>
</tr>
<tr><td  width="100" >&nbsp;Fax:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["fax"]?></td>
</tr>
<tr><td  width="100" >&nbsp;Email:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["email"]?></td>
</tr>
<tr><td  width="100" >&nbsp;Ti&#234;u &#273;&#7873;:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["tieude"]?></td>
</tr>
<tr><td  width="100" >&nbsp;N&#7897;i dung:</td>
<td class="checkLabel">&nbsp;&nbsp;<?php  echo $rowthongtin["noidung"]?></td>
</tr>
</table><?php }?>
<br>
</td></tr></table>
</td></tr></table>