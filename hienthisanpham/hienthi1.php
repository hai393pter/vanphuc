<?php  
  $sql="select * from mucsanpham";
  $resultmuc=mysql_query($sql);
  if(mysql_num_rows($resultmuc)!=0){?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td><br>
	<?php while($rowmuc=mysql_fetch_array($resultmuc)){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr bgcolor="#CED2D9" height="18">
        <td colspan="2" align="left" class="ver10"><b>&nbsp;<?php echo $rowmuc["ten"];?></b></td>
		<td align="right"><a href="index_sub.php?page=products&level=2&id=<?php echo $rowmuc["id_mucsanpham"];?>">Xem ti&#7871;p&nbsp;</a></td>
      </tr>
	<?php
      $sql="select * from sanpham where id_mucsanpham=".$rowmuc["id_mucsanpham"]." order by capnhat desc limit 3";
      $resultsanpham=mysql_query($sql);  
	  if(mysql_num_rows($resultsanpham)!=0){	    
    ?>	  	     	     
	  <tr>
	    <td width="30%"><?php if($rowsanpham=mysql_fetch_array($resultsanpham)){?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
		  <tr><td height="100"><div align="center"><?php fitimage("quantrisanpham/upload/images/".$rowsanpham["anhsanpham"],80);?></div></td></tr>
		  <tr><td height="20" class="markred"><div align="center"><a href="?page=products&level=3&id=<?php echo $rowsanpham["id_sanpham"];?>"><?php echo $rowsanpham["tensanpham"];?></a></div></td></tr>
		</table>
		<?php }?></td>
		<td width="30%"><?php if($rowsanpham=mysql_fetch_array($resultsanpham)){?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
		  <tr><td height="100"><div align="center"><?php fitimage("quantrisanpham/upload/images/".$rowsanpham["anhsanpham"],80);?></div></td></tr>
		  <tr><td height="25" class="markred"><div align="center"><a href="?page=products&level=3&id=<?php echo $rowsanpham["id_sanpham"];?>"><?php echo $rowsanpham["tensanpham"];?></a></div></td></tr>
		</table>
		<?php }?></td>
		<td width="30%"><?php if($rowsanpham=mysql_fetch_array($resultsanpham)){?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
		  <tr><td height="100"><div align="center"><?php fitimage("quantrisanpham/upload/images/".$rowsanpham["anhsanpham"],80);?></div></td></tr>
		  <tr><td height="25" class="markred"><div align="center"><a href="?page=products&level=3&id=<?php echo $rowsanpham["id_sanpham"];?>"><?php echo $rowsanpham["tensanpham"];?></a></div></td></tr>
		</table>
		<?php }?></td>
      </tr>	  	 		    	  		
	  <?php }?>
    </table><br>
	<?php }?>	</td>
    <td width="10">&nbsp;</td>
  </tr>  
</table>
<?php }?>
