<?php
function get_array_tag($info,$begin_tag,$end_tag)
{
  $arr=array();
  $i=0;
  while($info!="")
  {
    $dau=strpos($info,"$begin_tag");
    $info=strstr($info,"$begin_tag");
    $arr[$i++]=substr($info,0,strpos($info,"$end_tag")+strlen($end_tag));
	$info=substr($info,strpos($info,"$end_tag")+strlen($end_tag),strlen($info)-strpos($info,"$end_tag")-strlen($end_tag));
  }
  return $arr;
}

function cut_string($str_begin,$str_end,$str)
{
  $str_temp=strstr($str,$str_begin);
  $str_temp=str_replace(strstr($str_temp,$str_end),"",$str_temp).$str_end;
  return $str_temp;
}

function cut_table($number,$str)
{
  $temp=$str;
  for($i=1;$i<=$number;$i++)
  {
    $temp=substr($temp,1,strlen($temp));
    $temp=strstr($temp,"<table");
  }
  $d=1;
  for($i=5;$i<strlen($temp)&&$d!=0;$i++)
  {
    if(substr($temp,$i,6)=="<table")
	{
	  $d++;
	}
	if(substr($temp,$i,6)=="/table")
	{
	  $d--;	
	  $vt=$i;
	}
  }
  $temp=substr($temp,0,$vt);
  return $temp."/table>";
}

function end_str($str_search,$str)
{
  $vt=-1;
  for($i=0;$i<strlen($str);$i++)
    if(substr($str,$i,strlen($str_search))==$str_search) $vt=$i;
  return $vt;
}

function change_code($str)
{
  $temp=str_replace("/","w3s",$str);
  $temp=str_replace("2","nctd",$temp);
  $temp=str_replace("0","ws3",$temp);
  $temp=str_replace("cntt","ez",$temp);
  return $temp;
}

function change_back_code($str)
{
  $temp=str_replace("ez","cntt",$str);
  $temp=str_replace("ws3","0",$temp);
  $temp=str_replace("nctd","2",$temp);
  $temp=str_replace("w3s","/",$temp);    
  return $temp;
}
$src="http://vtv.vn/news/WeatherInfoP.aspx";
$content=file_get_contents("$src");
$content=cut_table(1,$content);
$content=str_replace("src=\"","src=\"http://vtv.vn/",$content);
echo $content;
?>
