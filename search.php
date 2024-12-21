  <?php  $input =$_POST["ten"];?>
	<table border="0" cellpadding="0" cellspacing="0">
	<?php
    $sql="select * from sanpham where";
      $sql.="(tensp LIKE '%".$input."%' OR noidung LIKE '%".$input."%'OR gioithieu LIKE '%".$input."%')";
      $resultsanpham=mysql_query($sql);  
	  if(mysql_num_rows($resultsanpham)!=0)
	 {$rowsanpham=mysql_fetch_array($resultsanpham);
    ?>
	<tr><td>
		<?php echo $rowsanpham["tensp"];?>
	</tr></td>
	<?php }?>
    </table>

	