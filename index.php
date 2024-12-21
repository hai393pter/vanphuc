<?php
  require("treeadmin/connect.php");
  if(isset($_GET["page"])) $page=$_GET["page"];
  else $page="home";
?>
<html>
<head>
<title>Van Phuc Computer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="5000">
<meta name="robots" CONTENT="INDEX,FOLLOW">
<meta name="Language" CONTENT="Vietnammes">
<meta name="author" content="A&T COMPUTER">
<script language="JavaScript" type="text/JavaScript">

<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style>
<!--
@import url("hienthi.css");
@import url("thoitiet.css");
/*A:link {color: #000000;}
A:visited {color: #000000;}
A:hover {color: #CC0000; text-decoration:underline} 
A.bb:hover {color: #000000;}
A{text-decoration:none}*/
-->
</style>
<style>
			.GHeader 
			{
				background-Color:darkred;
				font-family:arial, verdana, tahoma;
				font-size: 12; 
				font-weight:bold;
				height:20;
				color:white;
			}
			.GBoard { Border: darkred 1 solid; }
			.GCat { FONT-SIZE: 11px; FONT-FAMILY: arial,verdana,tahoma; width:55px; HEIGHT: 18px; BACKGROUND-COLOR: papayawhip }
			.GCity { FONT-SIZE: 10px; FONT-FAMILY: arial,verdana,tahoma;width:55px; HEIGHT: 18px; BACKGROUND-COLOR: papayawhip}
			.GBuy { FONT-SIZE: 10px; FONT-FAMILY: arial,verdana,tahoma;width:55px; HEIGHT: 18px; BACKGROUND-COLOR: #eaebeb; TEXT-ALIGN: right }
			.GSell { FONT-SIZE: 10px; FONT-FAMILY: arial,verdana,tahoma;width:55px; HEIGHT: 18px; BACKGROUND-COLOR: #eaebeb; TEXT-ALIGN: right }
</style>
</head>
<?php
function show_images($h,$w,$src,$href,$border,$dodo)
{
  $size = @getimagesize("treeadmin/news_images/images/$src");
  $w_size=$size[0];$h_size=$size[1]; 
  if($w_size<$h_size)
    $w_tg=$w+$dodo;
  else
    @$w_tg=$w_size*$h/$h_size+$dodo;
  $w_tg=$w;
  return "<div style='position: relative;width:$w;height:$h; overflow: hidden; $border '>
  <a href='$href'>
  <img src='treeadmin/news_images/images/$src' width='$w_tg' border='0' style='position :relative;top:-5;left:-5;'>
  </a>
  </div>";
}
function getid($tukhoa,$link,$id_ten)
{
  $arr=array();
  $sql="select $id_ten from danhmuc where tukhoa='$tukhoa'";
  $result=mysql_query($sql,$link);
  $row=mysql_fetch_array($result);
  return $row["$id_ten"];
}
function id_dau($tukhoa,$link)
{  
  $sql="select * from tinbai where id_parent=".getid("$tukhoa",$link,"id");
  $sql.=" order by capnhat desc limit 1";
  $rs=mysql_query($sql);
  if(mysql_num_rows($rs)!=0)
  {
    $row=mysql_fetch_array($rs);
    return $row["id_tin"];
  }else return 0;
}
function lay_duongdan($id)
{
  if($id!="")
  {  
    $d=0;
	$arr=array();
    while($id!=0)
    {	    
        $sql="select id_parent,tukhoa from danhmuc where id=$id";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
	    $id=$row["id_parent"];
		$arr[$d]=$row["tukhoa"];
	    $d++;
    }      
  }
  if(sizeof($arr)==1) $href="page=".$arr[0];
  if(sizeof($arr)==2) $href="page=".$arr[1]."&p=".$arr[0];
  if(sizeof($arr)==3) $href="page=".$arr[2]."&p=".$arr[1]."&p_child=".$arr[0];
  return $href;
}
?>
<body  onload=scrollit(100)>
<center>
<SCRIPT>
<!--
function scrollit(seed) 
{
var msg = "Chào mừng bạn đã ghé thăm website trung tâm máy tính vạn phúc";
var out = " ";
var c = 1;
if (seed > 100) {
seed--;
cmd="scrollit("+seed+")";
timerTwo=window.setTimeout(cmd,100);
}
else if (seed <= 100 && seed > 0) {
for (c=0 ; c < seed ; c++) {
out+=" ";
}
out+=msg;
seed--;
window.status=out;
cmd="scrollit("+seed+")";
timerTwo=window.setTimeout(cmd,100);
}
else if (seed <= 0) {
if (-seed < msg.length) {
out+=msg.substring(-seed,msg.length);
seed--;
window.status=out;
cmd="scrollit("+seed+")";
timerTwo=window.setTimeout(cmd,100);
}
else {
window.status=" ";
timerTwo=window.setTimeout("scrollit(100)",75);
}
}
}
//-->
</SCRIPT>
<table width="778"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php require("top.php");?></td>
  </tr>
  <tr>
    <td><?php require("middle.php");?></td>
</table>
</center>
</body>
</html>