<?php
if(isset($_GET["id"])){
  $id_tin=$_GET["id"];
  $sql="select * from tinbai where kiemduyet=1 and id_tin=$id_tin order by capnhat desc";				  
  $result=mysql_query($sql);
  		  $href="page=".$_GET["page"];
		  $href.="&p=".$_GET["p"];
		  //$href.="&p_child=".$_GET["p_child"];
		  $href_main=$href;
  if(mysql_num_rows($result))
  {
    $row=mysql_fetch_array($result);
	$id_parent=$row["id_parent"];
	$capnhat=$row["capnhat"];
?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#DCEEFF">
    <tr><td height="10"></td></tr>
	<tr><td><div class="lev3_tieude"><?php echo $row["tieude"];?></div></td></tr>
	<tr><td style="padding-left:10"><div class="capnhat">Cập nhật: <?php echo substr($row["capnhat"],11,5)." ngày ".substr($row["capnhat"],8,2)."/".substr($row["capnhat"],5,2)."/".substr($row["capnhat"],0,4);?></div></td></tr>
	<tr><td height="10"></td></tr>
	<tr><td valign="top"><div class="lev3_noidung"><?php echo str_replace("vff_org_vn/","",$row["noidung"]);?></div></td></tr>
	<tr>
	  <td bgcolor="#F8F8F8" align="right" class="banin">
	  <a href="phanhoi.php?id=<?php echo $id_tin;?>" target="_blank"><img src="images/icon/phanhoi.gif" align="absmiddle" border="0"> [Đóng góp ý kiến]</a>&nbsp;&nbsp;
	  <a href="guibai.php?id=<?php echo $id_tin;?>" target="_blank"><img src="images/icon/sendmail.gif" align="absmiddle" border="0"> [Gửi bài viết cho bạn bè]</a>&nbsp;&nbsp;
	  <a href="banin.php?id=<?php echo $id_tin;?>" target="_blank"><img src="images/icon/print.gif" align="absmiddle" border="0"> [Bản in]</a>&nbsp;&nbsp;
	  <a href="javascript:history.go(-1)"><img src="images/icon/back.gif" align="absmiddle" border="0"> [Trở về]</a>&nbsp;&nbsp;&nbsp;
	  </td>
	</tr>
</table>    	     
<?php }
}elseif(isset($_GET["p"])){
  $sql="select * from tinbai where";
  $sql.=" gio_hienthi<='".date("Y:m:d h:i:s")."'";
  $sql.=" and kiemduyet=1 and id_parent=".getid($p,$link,"id")." order by capnhat desc";
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=9;
  $resultcount=mysql_query($sql);	
  $sl=$vt+$sodong; 
  $sql.=" limit $sl";
  $result=mysql_query($sql);	 	 
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#DCEEFF">
  <tr>
    <td>
	<table width="96%"  border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr><td height="10"></td></tr>
	  <tr><td><div class="tenmuc"><?php echo getid($p,$link,"ten");?></div></td></tr>
	  <tr><td height="5"></td></tr>
      <tr>
        <td>
		<?php
		  $href="page=".$_GET["page"];
		  $href.="&p=".$_GET["p"];
		  //$href.="&p_child=".$_GET["p_child"];
		  $href_main=$href;
		  if(mysql_num_rows($result)){
		    for($bg=1;$bg<$vt;$bg++) $row=mysql_fetch_array($result);
		    while($row=mysql_fetch_array($result)){			  			  
			  $href=$href_main."&id=".$row["id_tin"];
		?>
		  <table border="0" width="100%" cellpadding="0" cellspacing="0">
		  <tr>
		    <td><table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <?php if($row["anhtrichdan"]!=""){?>
                <td valign="top" style="padding:5 10 10 0"><?php echo show_images(78,78,$row["anhtrichdan"]," ?$href","border:1px solid #FFC62F")?></td>
                <?php }?>
                <td valign="top">
                  <div class="lev2_tieude"><a href="?<?php echo $href;?>"><?php echo $row["tieude"];?></a></div>
                  <div class="lev2_trichdan"><?php echo str_replace("<P","<SPAN",$row["trichdan"]);?></div></td>
              </tr>
            </table></td>
		  </tr>
		  <tr><td background="images/lev2_bg.gif" width="100%" height="2"></td></tr>
		  </table>
		<?php }}?>
		</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
	</table>
	</td>
  </tr>
</table>
<table width="100%" border="0" bgcolor="#F8F8F8" id="phantrang" style="display:none">
  <tr>
    <td align="center"><?php
			$sotrang=intval(mysql_num_rows($resultcount)/($sodong+1));
			if($sotrang<mysql_num_rows($resultcount)/($sodong+1)) $sotrang=$sotrang+1;
		    $hienthi=0;if($hienthi==1){?>
		  <?php if($vt!=1){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>';">Trang &#273;&#7847;u</a>&nbsp;&nbsp;
		  <a href="javascript:history.go(-1);">Trang tr&#432;&#7899;c</a>
		  <?php }?> [<?php echo intval($vt/$sodong,0)+1;?>/<?php echo $sotrang;?>] 
		  <?php if(mysql_num_rows($resultcount)>$sl){?><a href="javascript:frmSubmit.submit();">Trang sau</a>&nbsp;&nbsp;
		  <a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php echo ($sodong+1)*($sotrang-1);?>';">Trang cu&#7889;i</a><?php }?>
		  <?php }?>
		  		  		  
		  Trang: 
		  <select name="pagenum" class="TextBox" onChange="window.location='?<?php echo $href_main;?>&vt='+this.value;">
			<?php for($i=1;$i<=$sotrang;$i++){?>
			<option value="<?php echo ($i-1)*($sodong+1);?>" <?php $tg=$_GET["vt"];if($tg==($i-1)*($sodong+1)) echo "selected";?>>
			<?php if($i<10) echo "0".$i;else echo $i;?>
			</option>
			<?php }?>
	  	  </select> 
		  trong t&#7893;ng s&#7889; <span class="markred"><?php echo $sotrang;?></span> trang
	</td>
  </tr>
</table>
<?php }elseif(isset($_GET["page"])){?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#DCEEFF">
		<tr><td height="10"></td></tr>
		<tr><td>Phan gioi thieu muc<?php echo "[$page]";?> ... Phan gioi thieu muc<?php echo "[$page]";?> ... 
		Phan gioi thieu muc<?php echo "[$page]";?> ... Phan gioi thieu muc<?php echo "[$page]";?> ... 
		Phan gioi thieu muc<?php echo "[$page]";?> ... Phan gioi thieu muc<?php echo "[$page]";?> ... 
		Phan gioi thieu muc<?php echo "[$page]";?> ... Phan gioi thieu muc<?php echo "[$page]";?> ... 
		Phan gioi thieu muc<?php echo "[$page]";?> ... Phan gioi thieu muc<?php echo "[$page]";?> ... 
		</td></tr>
		<tr><td height="30"></td></tr>
</table>
<?php }?>