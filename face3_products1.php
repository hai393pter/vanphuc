<table width="97%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td><img src="images/logo.jpg" align="right" alt="" border="0"></td></tr>
<tr>
<td><table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td>
<?php
if(isset($_GET["id"])){
  $id_sp=$_GET["id"];
  $sql="select * from sanpham where id_sp=$id_sp order by capnhat desc";
  $result=mysql_query($sql);
  		  $href="page=".$_GET["page"];
		  $href.="&p=".$_GET["p"];
		//  $href.="&p_child=".$_GET["p_child"];
		  $href_main=$href;
  if(mysql_num_rows($result))
  {
    $row=mysql_fetch_array($result);
	$id_parent=$row["id_parent"];
	$capnhat=$row["capnhat"];
?>
    <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
    <tr>
      <td  bgcolor="#C3D2DB" height="25"><div class="tree">
	  <?php echo "&nbsp;SẢN PHẨM >> <a href='?page=sanpham&p=$p' 'class=tree'>".getid($p,$link,"ten")."</a> >> "."<a href='?page=sanpham&p=$p&p_child=$p_child' 'class=tree'>".getid($p_child,$link,"ten")."</a>";?></div></td>
    </tr>
    <tr><td height="10"></td></tr>
	<tr><td height="10"></td></tr>
	<tr><td><div class="title_head"><?php echo $row["tensp"];?></div></td></tr>
	<tr><td height="10"></td></tr>
	<tr><td valign="top"><?php if($row["anhsp"]!=""){?><img src="<?php echo "treeadmin/news_images/images/".$row["anhsp"];?>" align="left"><?php }?>
		<div class="texto"><?php echo $row["gioithieu"];?></div><p>
		<div class="gia">Gi&aacute;: <font color="#CC0000"><?php echo $row["gia"];?> USD</font></div>
		<div class="kho">Kho: <font color="#009900"><?php if($row["kho"]==1) echo "Còn hàng";else echo "H?t hàng";?></font><br>
		B&#7843;o h&agrave;nh: <font color="#CC0000"><?php echo $row["baohanh"];?> th&aacute;ng</font></div>
		<div class="gia">Số lượng: <font color="#009900"><input name="sl" type="text" class="TextBox" value="1" size="5"></font></div>
	</td>
	</tr>
		<tr>
		<td align="right" class="kho">Bấm vào đây để lựa chọn hàng ->> <input type="image" onClick="window.location='mua.php?id=<?php echo $row["id_sp"];?>&sl='+sl.value;" src="images/cart.gif" border="0"></td>
		</tr>
	<tr>
	  <td valign="top">&nbsp;</td>
	  </tr>
	<tr>
	  <td valign="top"><hr size="1"></td>
	  </tr>

</table>
<?php }
}elseif(isset($_GET["p_child"])){
  $sql="select * from sanpham where id_parent=".getid($p_child,$link,"id")." order by capnhat desc";
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=9;
  $resultcount=mysql_query($sql);	
  $sl=$vt+$sodong; 
  $sql.=" limit $sl";
  $result=mysql_query($sql);	 	 
?>
	<table width="100%"  border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td>
		<table align="center" width="98%"  border="0" cellspacing="0" cellpadding="0">
	  <tr><td height="10"></td></tr>
	  <tr><td style="padding-bottom:5" bgcolor="#C3D2DB" height="25"><div class="tree">
	  <?php echo "&nbsp;SẢN PHẨM >> <a href='?page=sanpham&p=$p' 'class=tree'>".getid($p,$link,"ten")."</a> >> "."<a href='?page=sanpham&p=$p&p_child=$p_child' 'class=tree'>".getid($p_child,$link,"ten")."</a>";?></div></td></tr>
	  <tr><td height="5"></td></tr>	  
      <tr>
        <td>
		<?php
		  $href="page=".$_GET["page"];
		  $href.="&p=".$_GET["p"];
		  $href.="&p_child=".$_GET["p_child"];
		  $href_main=$href;
		  if(mysql_num_rows($result)){
		    for($bg=1;$bg<$vt;$bg++) $row=mysql_fetch_array($result);
		    while($row=mysql_fetch_array($result)){			  
			  $href=$href_main."&id=".$row["id_sp"];
		?>
		  <table border="0" width="100%" cellpadding="0" cellspacing="0">
		  <tr>
		    <td><table border="0" width="100%" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="70%" style="padding-right:5px"><div class="tensp">
				<a href="?<?php echo $href;?>"><?php echo $row["tensp"];?></a></div>
				</td>
				<td style="padding-left:5px"><div class="gia">Giá: <font color="#CC0000"><?php echo $row["gia"];?> USD</font></div></td>
			  </tr>
              <tr>
			    <td valign="top" style="padding-right:5px"><div class="texto"><?php echo str_replace("<P","<SPAN",$row["gioithieu"]);?></div>
				</td>
				<td valign="top" style="padding-left:5px"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Kho: <font color="#009900"><?php if($row["kho"]==1) echo "Còn hàng";else echo "Hết hàng";?></font><br>Bảo hành: <font color="#CC0000"><?php echo $row["baohanh"];?> tháng</font></font></td>
              </tr>
            </table></td>
		  </tr>
		  <tr><td colspan="2"><hr color="#C0C0C0" size="1"></td></tr>
		  </table>
          <?php }}?>
</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
		</td>
	  </tr>
</table>
    <table width="100%" border="0" bgcolor="#F8F8F8" style="display:none">
      <tr>
        <td align="center"><?php
			$sotrang=intval(mysql_num_rows($resultcount)/($sodong+1));
			if($sotrang<mysql_num_rows($resultcount)/($sodong+1)) $sotrang=$sotrang+1;
		    $hienthi=0;if($hienthi==1){?>
            <?php if($vt!=1){?>
            <a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>';">Trang &#273;&#7847;u</a>&nbsp;&nbsp; <a href="javascript:history.go(-1);">Trang tr&#432;&#7899;c</a>
            <?php }?>
      [<?php echo intval($vt/$sodong,0)+1;?>/<?php echo $sotrang;?>]
      <?php if(mysql_num_rows($resultcount)>$sl){?>
      <a href="javascript:frmSubmit.submit();">Trang sau</a>&nbsp;&nbsp; <a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php echo ($sodong+1)*($sotrang-1);?>';">Trang cu&#7889;i</a>
      <?php }?>
      <?php }?>
      Trang:
      <select name="pagenum" class="TextBox" onChange="window.location='?<?php echo $href_main;?>&vt='+this.value;">
        <?php for($i=1;$i<=$sotrang;$i++){?>
        <option value="<?php echo ($i-1)*($sodong+1);?>" <?php $tg=$_GET["vt"];if($tg==($i-1)*($sodong+1)) echo "selected";?>>
        <?php if($i<10) echo "0".$i;else echo $i;?>
        </option>
        <?php }?>
      </select>
      trong t&#7893;ng s&#7889; <span class="markred"><?php echo $sotrang;?></span> trang </td>
      </tr>
    </table>
    <?php }elseif(isset($_GET["p"])){?>
<!--///////////////////////////////-->
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
		<tr><td height="10"></td></tr>
		<tr><td><?php
		  $p=$_GET["p"];
		  $ds_ten=danhsachcon($p,$link,"ten");
   	      $ds_tukhoa=danhsachcon($p,$link,"tukhoa");		  
		  for($i=0;$i<sizeof($ds_ten);$i++){	  		
	  		$show=$ds_ten[$i];
	  		if($p==$ds_tukhoa[$i]) $show="<b>$show</b>";
			$href="?page=$page&p=$p&p_child=".$ds_tukhoa[$i];
		?>
		  <table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
		    <tr><td height="25" bgcolor="#DCDDE1"><div class="tensp">&nbsp; :: <a href="<?php echo $href;?>" class="tensp"><?php echo $ds_ten[$i];?></a></div></td></tr>
			<?php
			  $sql="select * from sanpham where id_parent=".getid($ds_tukhoa[$i],$link,"id")." order by capnhat desc limit 3";
			  $result=mysql_query($sql);
			  if(mysql_num_rows($result)!=0){?>
				<?php if($row=mysql_fetch_array($result)){
				  $href_m=$href."&id=".$row["id_sp"];
				?>				
				<tr><td height="5"></td></tr>
				<tr>
				  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				    <tr>
					  <?php if($row["anhsp"]!=""){?>
					  <td valign="top" style="padding:5 10 10 0"><a href="<?php echo $href_m;?>"><img src="treeadmin/news_images/images/<?php echo $row["anhsp"];?>" width="150" border="0"></a></td>
					  <?php }?>
					  <td valign="top">
					  <div class="tensp"><a href="<?php echo $href_m;?>"><?php echo $row["tensp"];?></a></div>
					  <div class="texto"><?php echo str_replace("<P","</SPAN",$row["gioithieu"]);?></div></td>
					</tr>
				  </table></td>			  
				</tr>
				<?php }?>
				<tr><td><table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td width="90%" valign="baseline"><table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td>&nbsp;</td>
					  </tr>
					</table></td>
					<td valign="baseline">&nbsp;<a href="<?php echo $href;?>" class="xemtiep"><img src="images/xemtiep.gif" alt="" width="43" height="9" border="0"></a></td>
				  </tr>
				</table></td></tr>				
			<?php }?>
		  </table>
		<?php }?></td></tr>
		<tr><td height="30"></td></tr>
	</table>
	</td>
  </tr>
</table>
<!--///////////////////////////////-->


<?php }else{?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<table width="96%"  border="0" align="center" cellpadding="0" cellspacing="0">
		<tr><td height="10"></td></tr>
		<tr><td><?php
		  for($i=0;$i<sizeof($ds_ten);$i++){
	  		$href="?page=$page&p=".$ds_tukhoa[$i];
	  		$show=$ds_ten[$i];
	  		if(isset($_GET["p"])) $p=$_GET["p"];else $p=null;
	  		if($p==$ds_tukhoa[$i]) $show="<b>$show</b>";
			$ds_ten_child=danhsachcon($ds_tukhoa[$i],$link,"ten");
   	  		$ds_tukhoa_child=danhsachcon($ds_tukhoa[$i],$link,"tukhoa");
			$href.="&p_child=".$ds_tukhoa_child[0];
		?>
		  <table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
		    <tr><td bgcolor="#DCDDE1" height="25">
		      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="5%"><div align="center"><img src="images/INDEX_35.GIF" width="15" height="14"></div></td>
                  <td width="95%" class="tensp"><a href="<?php echo $href;?>"><?php echo $ds_ten[$i];?></a></td>
                </tr>
              </table>
		    </td>
		    </tr>
			<?php
			  $sql="select * from sanpham where id_parent=".getid($ds_tukhoa_child[0],$link,"id")." order by capnhat desc limit 2";
			  $result=mysql_query($sql);
			  if(mysql_num_rows($result)!=0){?>
				<?php if($row=mysql_fetch_array($result)){
				  $href_m=$href."&id=".$row["id_sp"];
				?>				
				<tr><td height="5"></td></tr>
				<tr>
				  <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
				    <tr>
					  <td width="30%"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
						<tr>
					  <?php if($row["anhsp"]!=""){?><td valign="top" style="padding:5 10 10 0"><?php echo show_images(120,120,$row["anhsp"],"$href_m","border:1px ",2);?></td><?php }?>
					  <td valign="top" width="70%">
					  <div class="tensp"><a href="<?php echo $href_m;?>"><b><?php echo $row["tensp"];?></b></a></div>
					  <div class="kho"><?php echo substr($row["gioithieu"],0,200)." ...";?></div><br>
					  <div class="kho">Thời gian bảo hành: <?php echo $row["baohanh"];?> tháng</div>
					  <div class="kho">Giá bán hiện tại: <?php echo $row["gia"];?> USD<p><font color="#0083C1"><a href="<?php echo $href_m;?>">Chi tiết sản phẩm</font></div></td> 
	   			      </tr>
					</table></td></tr><tr>
					  <td></td>
					 </tr>  
				  </table></td>			  
				</tr>
				<?php }?>
			<?php }?>
		  </table>
		<?php }?></td></tr>
		<tr><td height="30"></td></tr>
	</table>
	</td>
  </tr>
</table>
<?php }?>
</td></tr></table>
</td></tr></table>