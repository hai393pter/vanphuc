<?php
  require("../logincheck.php");
  require_once("connect.php");
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id!=0) $sql="select id,capnhat from danhmuc where id_parent=$id_parent order by capnhat desc";
	  else $sql="select id,capnhat from danhmuc order by capnhat desc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update danhmuc set capnhat='$capnhatdau' where id=$id_cuoi";
		mysql_query($sql);
		$sql="update danhmuc set capnhat='$capnhatcuoi' where id=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("css/admin.css");
-->
</style>
</head>
<script language="javascript">
function doRemove(ob)
{
  if(confirm(thongdiepdau.value+ob.value+thongdiepcuoi.value))
  {
    frmSubmit.action="?id="+ob.name;
	frmSubmit.submit();
  }
}
</script>
<body>
<br>
<?php if($quantri==0){?>
<center>
<a href="formnhaplieu.php?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>">Th&#234;m m&#7909;c m&#7899;i</a>
</center>
<?php }?>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Danh S&#225;ch Con Trong: <?php echo $chuoihienthi;?></div>
<p>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	  <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="1" class="titleHead" id="head">
	    <tr>
			<td width="30" align="center" height="20">STT</td>
			<td>&nbsp;&nbsp;T&#234;n danh m&#7909;c con</td>
			<td width="80" align="center">&#272;&#7893;i v&#7883; tr&#237;</td>
			<?php if($quantri==0){?>
			<td width="10%" align="center">X&#243;a</td>
			<?php }?>
		</tr>
	  </table>
	</td>
  </tr>
  <tr><td height="1"></td></tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="outTable" id="dssanpham">
      <tr>
        <td>
		  <table width="100%"  border="0" cellspacing="1" cellpadding="0">
		       <?php			    
				$sql="select * from danhmuc where id_parent=$id_parent order by capnhat desc";
				$resultcount=mysql_query($sql);	
				$sl=$vt+$sodong; 
				$sql.=" limit $sl";
				$result=mysql_query($sql);
				for($bg=1;$bg<$vt;$bg++) $row=mysql_fetch_array($result);
				$i=$vt;
				if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
				  <tr height="20" bgcolor="<?php if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id"])) echo "#FFCCFF";elseif($vector=="len"&&intval($id_cuoi)==intval($row["id"])) echo "#FFCCFF";else echo "#FFFFFF";}else echo "#FFFFFF";?>" onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='<?php if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id"])) echo "#FFCCFF";elseif($vector=="len"&&intval($id_cuoi)==intval($row["id"])) echo "#FFCCFF";else echo "#FFFFFF";}else echo "#FFFFFF";?>'">
					<td align="center" width="30"><?php echo $i++;?></td>
					<td>&nbsp;&nbsp;<span style="cursor:default " title="T&#7915; kh&#243;a: [<?php echo $row["tukhoa"];?>]"><?php echo $row["ten"];?></span></td>
					<td width="80" align="center"><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id"];?>';">V</a></td>
					<?php if($quantri==0){?>
					<td width="10%" align="center">
					  <a href="formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php echo $vt;?>&id=<? echo $row["id"];?>">S&#7917;a</a>
				      <a href="javascript:if(confirm('B&#7841;n th&#7921;c s&#7921; mu&#7889;n x&#243;a [<? echo $row["ten"];?>]?')) window.location='exeAdmin.php?id=<? echo $row["id"];?>'">X&#243;a</a>
					</td>
					<?php }?>
				  </tr>  
				  <?php $idluu=$row["id"];}else{?>
				  <tr bgcolor="#FFFFFF">
					<td colspan="<?php if($quantri=="1") echo "4";else echo "2";?>" height="30">&nbsp;Ch&#432;a c&#243;!</td>
				  </tr>
			    <?php }?>
          </table>
		</td>
      </tr>
    </table></td>
  </tr>
  <tr><td height="10"></td></tr>
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
		  <select name="pagenum" class="TextBox" onChange="frmSubmit.action='?vt='+this.value;frmSubmit.submit();">
			<?php for($i=1;$i<=$sotrang;$i++){?>
			<option value="<?php echo ($i-1)*($sodong+1);?>" <?php $tg=@$_GET["vt"];if($tg==($i-1)*($sodong+1)) echo "selected";?>>
			<?php if($i<10) echo "0".$i;else echo $i;?>
			</option>
			<?php }?>
	  </select> 
		  - T&#7893;ng s&#7889; trang: <span class="markred"><?php echo $sotrang;?></span>
	</td>
  </tr>
</table>
</body>
</html>
