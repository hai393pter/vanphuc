<?php
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id_parent!=0) $sql="select id_anh,capnhat from suutap where id_parent=$id_parent order by capnhat desc";
	  else $sql="select id_anh,capnhat from suutap order by capnhat desc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_anh"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_anh"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_anh"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update suutap set capnhat='$capnhatdau' where id_anh=$id_cuoi";
		mysql_query($sql);
		$sql="update suutap set capnhat='$capnhatcuoi' where id_anh=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;  
  if(isset($_GET["id_anh"]))
  {
    $id_anh=$_GET["id_anh"];    
	$sql="delete from suutap where id_anh=$id_anh";
	mysql_query($sql);
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Danh Sach Tin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("css/admin.css");
-->
</style>
</head>
<script language="javascript">
function doKiemduyet(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="kiemduyet.php?id="+ck.name+"&trangthai="+tt;
}
function doTieudiem(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="tieudiem.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<br>
<center>
<a href="formNhaplieu.php?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>">Th&#234;m &#7843;nh m&#7899;i</a>
</center>
<br>
<iframe name="ifKiemduyet" height="0" width="0"></iframe>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Danh S&#225;ch Tin Trong M&#7909;c: <?php echo $chuoihienthi;?></div>
<p>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="1" class="titleHead" id="head">
      <tr>  
		<td width="5%" height="16" align="center">STT</td>
		<td>&nbsp;&nbsp;Ti&#234;u &#273;&#7873; tin</td>
		<td width="8%">Duy&#7879;t</td>
		<td width="10%">Ti&#234;u &#273;i&#7875;m</td>
		<td width="10%">&#272;&#7893;i v&#7883; tr&#237;</td>
		<td width="5%">X&#243;a</td>
      </tr>
    </table></td>
  </tr>
  <tr><td height="1"></td></tr>
  <tr>
    <td>
	  <table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable" id="dstin">
        <tr>
          <td>
		    <table width="100%"  border="0" cellspacing="1" cellpadding="0">
		 	  <?php
				$sql="select * from suutap where id_parent=$id_parent order by capnhat desc";
				$resultcount=mysql_query($sql);	
				$sl=$vt+$sodong; 
				$sql.=" limit $sl";
				$result=mysql_query($sql);
				for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_anh"];}
			  ?>
			  <?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
			  <tr bgcolor="<?php if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_anh"])) echo "#FFCCFF";elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_anh"])) echo "#FFCCFF";else echo "#FFFFFF";}else echo "#FFFFFF";?>" onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='<?php if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_anh"])) echo "#FFCCFF";elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_anh"])) echo "#FFCCFF";else echo "#FFFFFF";}else echo "#FFFFFF";?>'">
				<td width="5%" align="center"><?php echo $i;?></td>
				<td>&nbsp;&nbsp;<a href="uploadimages/images/<?php echo $row["anh"];?>" target="_blank"><?php 
				  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_anh"])) echo "<span class='doiVitri'>".$row["anh"]."</span>";
				  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_anh"])) echo "<span class='doiVitri'>".$row["anh"]."</span>";
				  else echo $row["anh"];}else echo $row["anh"];?></a>
				</td>
				<td width="8%" align="center"><input type="checkbox" name="<?php echo $row["id_anh"];?>" <?php if($row["kiemduyet"]==1) echo "checked";?> onClick="doKiemduyet(this)"></td>
				<td width="10%" align="center"><input type="checkbox" name="<?php echo $row["id_anh"];?>" <?php if($row["tieudiem"]==1) echo "checked";?> onClick="doTieudiem(this)"></td>
				<td width="10%" align="center"><?php if($i>$vt){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a><?php }else echo "&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id_anh"];?>';">V</a></td>
				<td width="5%" align="center">
				<a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_anh=<?php echo $row["id_anh"];?>';">S&#7917;a</a>
				<a href="javascript:if(confirm('B&#7841;n th&#7921;c s&#7921; mu&#7889;n x&#243;a tin [<?php echo $row["anh"];?>] ch&#7913;?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_anh=<?php echo $row["id_anh"];?>';">X&#243;a</a>
			  </tr>
			  <?php $i++;$idluu=$row["id_anh"];}else{?>		  
			  <tr>
			    <td colspan="6" height="30" bgcolor="#FFFFFF">&nbsp;Ch&#432;a c&#243; b&#224;i vi&#7871;t!</td>
			  </tr>
			  <?php }?>
			</table>
		  </td>
        </tr>
      </table>
	</td>
  </tr>
  <tr>
    <td><div align="center"><br>
  		  <?php
			$sotrang=intval(mysql_num_rows($resultcount)/($sodong+1));
			if($sotrang<mysql_num_rows($resultcount)/($sodong+1)) $sotrang=$sotrang+1;
			$hienthi=0;if($hienthi==1){?>
		  <?php if($vt!=1){?>
		  <a href="javascript:frmSubmit.action='danhsachtin.php';frmSubmit.submit();">Trang &#273;&#7847;u</a>&nbsp;&nbsp; <a href="javascript:history.go(-1);">Trang tr&#432;&#7899;c</a>
		  <?php }?> 
		  [<?php echo intval($vt/$sodong,0)+1;?>/<?php echo $sotrang;?>] 
		  <?php if(mysql_num_rows($resultcount)>$sl){?>
		  <a href="javascript:frmSubmit.submit();">Trang sau</a>&nbsp;&nbsp; <a href="javascript:frmSubmit.action='?vt=<?php echo ($sodong+1)*($sotrang-1);?>';frmSubmit.submit();">Trang cu&#7889;i</a>
		  <?php }?>
		  <?php }?>
		  
		  Trang: 
		  <select name="pagenum" class="TextBox" onChange="frmSubmit.action='?vt='+this.value;frmSubmit.submit();">
            <?php for($i=1;$i<=$sotrang;$i++){?>
            <option value="<?php echo ($i-1)*($sodong+1);?>" <?php $tg=$_GET["vt"];if($tg==($i-1)*($sodong+1)) echo "selected";?>>
            <?php if($i<10) echo "0".$i;else echo $i;?>
            </option>
            <?php }?>
          </select>
		  trong t&#7893;ng s&#7889; <span class="markred"><?php echo $sotrang;?></span> trang
	</div></td>
  </tr>
</table>
</body>
</html>