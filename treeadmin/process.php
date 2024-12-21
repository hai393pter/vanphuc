<?php
function fitimage($image,$fit) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
  echo "<input type='image' src='$image' height='$h' width='$w' border='0' onClick='viewImage(this)'>";
  echo "<script language='javascript'>
  function viewImage(obj)
  {
    window.open('view.php?path='+obj.src,'','height=450,width=450');
    //showModalDialog('/demo/view.php?path='+obj.src,window,'dialogWidth:450 px;dialogHeight:450 px;help:no;scroll:no;status:no');
  }
  </script>";
} 
function fitimagepopup($image,$fit) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];  
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
  if($h==0||$w==0)  echo "<img src='$image' border='0'>";
  else echo "<img src='$image' height='$h' width='$w' border='0'>";
} 
function fitimageleft($image,$fit) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];  
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
  if($h==0||$w==0)  echo "<img src='$image' border='0'>";
  else echo "<img src='$image' height='$h' width='$w' border='0' align='left'>";
}

function getid($tukhoa,$link,$id_ten)
{
  $arr=array();
  $sql="select $id_ten from danhmuc where tukhoa='$tukhoa'";
  $result=mysql_query($sql,$link);
  $row=mysql_fetch_array($result);
  return $row["$id_ten"];
}
function whimage($image,$fit,$wh) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}  
  if($wh==0) return $w;
  if($wh==1) return $h;
} 
function chenphay($str)
{
  $s="";
  $dem=0;
  for($i=strlen($str)-1;$i>=0;$i--){			    
    $s=substr($str,$i,1).$s;
    $dem++;
    if($dem==3&&$i>=1){$s=",".$s;$dem=0;}				
  }
  return $s;
}
function locanh($mystring)
{ 
  $mystring=strstr($mystring,"src=");
  $pos2=strpos($mystring,"width");
  $str=substr($mystring,0,$pos2);  
  $str=str_replace("src=","",$str);
  $str=substr($str,1,strlen($str)-3);
  $str=str_replace("/demo/","",$str);  
  $str=str_replace("http://".$_SERVER['HTTP_HOST']."/","",$str);  
  fitimageleft($str,60);
}
?>
