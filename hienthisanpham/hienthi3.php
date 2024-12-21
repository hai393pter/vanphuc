<?php
  $id_sanpham=$_GET["id"];   
  $sql="select * from sanpham where id_sanpham=".$id_sanpham;
  $resultsanpham=mysql_query($sql); 
  $rowsanpham=mysql_fetch_array($resultsanpham);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
<!--
@import url("css/style.css");
@import url("css/frontend.css");
-->
</style>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">  
	  <tr>
	    <td class="articleHead" height="150"><div align="center"><?php fitimage("quantrisanpham/upload/images/".$rowsanpham["anhsanpham"],300);?></div></td>
	  </tr>	
	  <tr><td height="10"></td></tr>
      <tr>
        <td class="articleHead"><table border="0" bgcolor="#999999" cellpadding="0" cellspacing="1" align="center">
          <tr bgcolor="#FFFFFF">
            <td width="80" class="articleHead">&nbsp;T&#234;n:</td>
            <td width="350" class="markred">&nbsp;<?php echo $rowsanpham["tensanpham"];?></td>			
          </tr>
		  <tr bgcolor="#FFFFFF">
            <td width="80" class="articleHead">&nbsp;&#272;&#417;n gi&#225;:</td>
            <td width="350" class="markred">&nbsp;<?php echo $rowsanpham["gia"];?>(VN&#272;)</td>			
          </tr>
		  <tr bgcolor="#FFFFFF">
            <td width="80" class="articleHead">&nbsp;S&#7889; l&#432;&#7907;ng:</td>
            <td width="350" class="markred">&nbsp;<?php echo $rowsanpham["soluong"];?></td>			
          </tr>
          <tr bgcolor="#FFFFFF">
            <td class="articleHead">&nbsp;M&#244; t&#7843;:</td>
            <td class="markred">&nbsp;<?php echo substr($rowsanpham["noidung"],3,strlen($rowsanpham["noidung"])-4);?></td>			
          </tr>
		  <tr bgcolor="#FFFFFF">
		    <td colspan="2" align="center">
			  <table border="0" cellpadding="0" cellspacing="2"><tr>
			  <td><input name="sl" type="text" class="TextBox" value="1" size="5"></td>
			  <td><input type="image" onClick="window.location='hienthisanpham/mua.php?id=<?php echo $rowsanpham["id_sanpham"];?>&sl='+sl.value;" src="images/btn_buy.gif" border="0"></td>
			  </tr></table>						  			  			
			</td>
		  </tr>
        </table></td>
      </tr>
    </table>
	</td>
    <td width="10">&nbsp;</td>
  </tr>
</table>
</body>
</html>
