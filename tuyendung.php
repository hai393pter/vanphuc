<?php
if(isset($_GET["id"]))
{
  $id_tin=$_GET["id"];
  $sql="SELECT * FROM tinbai WHERE id_tin=$id_tin order by capnhat desc limit 1";
  $result=mysql_query($sql); 
  $count=mysql_num_rows($result); 
  if($count!=0)
  {
    $row=mysql_fetch_array($result);?>
	<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="96%" height="25" ><div class="title_head"><?php echo $row["tieude"];?></div></td>
	  </tr>
    <tr>
	  <td class="texto" valign="top"><?php echo $row["noidung"];?></td>
	  </tr>
    <tr>
      <td class="texto" valign="top">&nbsp;</td>
      </tr>
	</table>
	<?php 
  }	
}else{
	  $sql="SELECT * FROM tinbai WHERE id_parent=153 order by capnhat desc limit 1";
	  $result=mysql_query($sql);
	  $count=mysql_num_rows($result);?>		
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php 
				if($count!=0){
					while($row=mysql_fetch_array($result))
					{?>
				  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <td valign="top"><table width="100%" height="161"  border="0" cellpadding="0" cellspacing="0" class="tuyendung">
						<tr>
						  <td width="21%" valign="top">&nbsp;</td>
						  <td colspan="2" valign="bottom"><a class="tin-list" href="?<?php echo lay_duongdan($row["id_parent"]);?>&id=<?php echo $row["id_tin"];?>"><?php echo $row["tieude"];?></a></td>
						</tr>
						<tr>
						  <td valign="top">&nbsp;</td>
						  <td width="10%" valign="top">&nbsp;</td>
						  <td width="66%" valign="top"><?php echo $row["trichdan"];?>&nbsp;<p><a class="text" href="?<?php echo lay_duongdan($row["id_parent"]);?>&id=<?php echo $row["id_tin"];?>"><img src="images/xemtiep.gif" alt="" width="43" height="9" border="0"></a></td>
					    </tr>
						<tr>
						  <td height="10" colspan="3"></td>
					    </tr>
					  </table> </td>
					</tr>
				  </table>
					<?php }
				}?>
                </td>
              </tr>
            </table>
<?php }?>