<?php
  if(isset($_GET["chimuc"])){
    $chimuc=$_GET["chimuc"];
	$sql="delete from sukien where id=$chimuc";
	mysql_query($sql);
	$sql="delete from tin_sukien where id_sukien=$chimuc";
	mysql_query($sql);
	echo "<script language='javascript'>window.location='treeuser.php';parent.basefrm.location='quantrisukien/null.php';</script>";
  }
?>
<script language="javascript">
var chimuc=-1;
function doClick(ds)
{
  chimuc=ds.id;
  parent.basefrm.location="quantrisukien/dongsukien.php?idsukien="+ds.id;
}
</script>
<input type="hidden" name="msg1" value="T&#234;n d&#242;ng s&#7921; ki&#7879;n:">
<input type="hidden" name="msg2" value="Ch&#432;a ch&#7885;n s&#7921; ki&#7879;n!">
<input type="hidden" name="msg3" value="B&#7841;n ch&#7855;c ch&#7855;n x&#243;a s&#7921; ki&#7879;n n&#224;y ch&#7913;?">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="moutTable">
  <tr>
   <td>
	<table border="0" cellpadding="0" cellspacing="1" width="100%" class="minTable">
	<?php  
	  $sql="select * from sukien order by capnhat desc";
	  $result=mysql_query($sql);
	  if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){
	    $sql="select count(*) from tin_sukien where id_sukien=".$row["id"];
		$resultcount=mysql_query($sql);
		$rowcount=mysql_fetch_array($resultcount);
	?>
	<tr id="<?php echo $row["id"];?>" onClick="doClick(this);">
	<td height="15">&nbsp;<b>.</b> <?php echo substr($row["ten"],0,20);?></td>
	<td align="center" width="25%"><?php echo $rowcount[0];?> b&#224;i</td>
	</tr>
	<?php }?>
	</table>
</td></tr></table>