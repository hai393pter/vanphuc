<?php
  $id_mucsanpham=$_GET["id"];
  $sql="select * from mucsanpham where id_mucsanpham=$id_mucsanpham";
  $resultmuc=mysql_query($sql);   
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td><br>
	<?php $rowmuc=mysql_fetch_array($resultmuc)?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="ver10" bgcolor="#CED2D9" height="18" colspan="2"><b>&nbsp;<?php echo $rowmuc["ten"];?></b></td>
      </tr>
	<?php
	  $sodong=9;
	  if(isset($_GET["vt"])) $vt=$_GET["vt"]+1;	  
	  else $vt=1;
	  $sl=intval($vt)+$sodong;
      $sql="select * from sanpham where id_mucsanpham=".$id_mucsanpham." order by capnhat desc limit $sl";
      $resultsanpham=mysql_query($sql);  
	  if(mysql_num_rows($resultsanpham)!=0){for($i=1;$i<=$vt-1;$i++) $rowsanpham=mysql_fetch_array($resultsanpham);
	    while($rowsanpham=mysql_fetch_array($resultsanpham)){
    ?>	  	  
      <tr>
	    <td width="40%" align="center" height="120"><?php fitimage("quantrisanpham/upload/images/".$rowsanpham["anhsanpham"],120);?></td>
		<td><table border="0" bgcolor="#999999" cellpadding="0" cellspacing="1">
          <tr bgcolor="#FFFFFF">
            <td width="60">&nbsp;T&#234;n:</td>
            <td width="150">&nbsp;<?php echo $rowsanpham["tensanpham"];?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td>&nbsp;&#272;&#417;n gi&#225;:</td>
            <td>&nbsp;<font color="#CC9900"><?php $gia=$rowsanpham["gia"];echo chenphay("$gia")." (VND)";?></font></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td>&nbsp;S&#7889; l&#432;&#7907;ng:</td>
            <td>&nbsp;<?php echo $rowsanpham["soluong"];?></td>
          </tr>
        </table>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr><td width="210" height="25" align="right"><a href="?page=products&level=3&id=<?php echo $rowsanpham["id_sanpham"];?>"><img src="images/chitiet.gif" border="0"></a></td></tr>		
		</table></td>
      </tr>
	  <?php }}?>	
	  <tr><td height="10"></td></tr>  
	  <tr>
	  <?php
	    $sql="select * from sanpham where id_mucsanpham =".$id_mucsanpham ." order by capnhat desc";
        $resultcount=mysql_query($sql);
		$sodong++;
		$sotrang=intval(mysql_num_rows($resultcount)/$sodong);
		if($sotrang<mysql_num_rows($resultcount)/$sodong) $sotrang=$sotrang+1;
	  ?>
	  <form action="?page=products&level=2&id=<?php echo $id_mucsanpham;?>" name="frmChuyentrang" method="post">
	  <td align="center" colspan="2" bgcolor="#CED2D9">Trang: <select class="selectList" onChange="frmChuyentrang.action+='&vt='+this.value;frmChuyentrang.submit();" name="page">
	  <?php for($i=1;$i<=$sotrang;$i++){?>
	  <option value="<?php echo ($i-1)*$sodong;?>" <?php if(isset($_POST["page"])) if(intval($_POST["page"])==($i-1)*$sodong) echo "selected";?>><?php echo $i;?></option>
	  <?php }?>
	  </select> 
	    - T&#7893;ng s&#7889; trang: <span class="markred"><?php echo $sotrang;?></span></td>
		</form>
	  </tr>
	  <tr>
	  <td align="center"></td>
	  </tr>
    </table>
	</td>
    <td width="10">&nbsp;</td>
  </tr>
</table>
<br>
