<table width="97%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td><img src="images/dv.jpg" align="right" alt="" border="0"></td></tr>
<tr>
<td><table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td>
<?php

if(isset($_GET["id"]))
{
  $src="http://www.vnn.vn".change_back_code($_GET["id"]);
}else $src="http://vietnamnet.vn/vanhoa/";
  $content=file_get_contents("$src");
  $content=str_replace("<IMG","<img",$content);
  $content=str_replace("SRC","src",$content);
  $content=str_replace("<A","<a",$content);
  $content=str_replace("HREF","href",$content);
  $content=str_replace("HEIGHT","height",$content);
  $content=str_replace("WIDTH","width",$content);
  $content=str_replace("SCRIPT","script",$content);
  $content=str_replace("BODY","body",$content);
  $content=str_replace("HEAD","head",$content);
  $content=str_replace("HTML","html",$content);
  $content=str_replace("SPAN","span",$content);
  $content=str_replace("<P","<p",$content);
  $content=str_replace("</P","</p",$content);
  $content=str_replace("<FONT","<font",$content);
  $content=str_replace("</FONT","</font",$content);
  $content=str_replace("<TABLE","<table",$content);
  $content=str_replace("</TABLE","</table",$content);
  $content=str_replace("<FORM","<form",$content);
  $content=str_replace("</FORM","</form",$content);
  $content=str_replace("<IFRAME","<iframe",$content);
  $content=str_replace("</IFRAME","</iframe",$content);
  
  $content=cut_table(5,$content);
    $arr_cut=array();
    $arr_cut=get_array_tag($content,"<head","</head>");
	for($j=0;$j<=sizeof($arr_cut);$j++)
	$content=str_replace(@$arr_cut[$j],"",$content);
    $arr_cut=get_array_tag($content,"<body",">");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"",$content);
	$content=str_replace("</body>","",$content);
    $arr_cut=get_array_tag($content,"<script","</script>");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"",$content);
    $arr_cut=get_array_tag($content,"<font",">");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"",$content);
	$content=str_replace("</font>","",$content);
    $arr_cut=get_array_tag($content,"<span",">");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"",$content);
	$content=str_replace("</span>","",$content);
    $arr_cut=get_array_tag($content,"<p",">");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"<p class=\"trichdan_2\" align=\"justify\">",$content);
    $arr_cut=get_array_tag($content,"<iframe","</iframe>");
	for($j=0;$j<=sizeof($arr_cut);$j++) $content=str_replace(@$arr_cut[$j],"",$content);
	$arr_cut=get_array_tag($content,"<a",">");
	for($j=0;$j<=sizeof($arr_cut);$j++)	  
	  if(strpos(@$arr_cut[$j],"http")||strpos(@$arr_cut[$j],".")) $content=str_replace(@$arr_cut[$j],"<a href onClick=\"\">",$content);
	$content=str_replace("src=\"/","src=\"http://www.vnn.vn/",$content);
	$content=str_replace(cut_string("<table",">",$content),"<table width=\"100%\">",$content);
	$content=str_replace("href=\"http://www.vnn.vn","href=\"",$content);
	$content=str_replace("href=\"","href=\"?page=tintuc&id=",$content);
	$content=str_replace("href=\"","href=\"",$content);
	$content=str_replace("in_cache_title","tieude_2",$content);
	$content=str_replace("tintop_title","tieude_2",$content);
	$content=str_replace("tintop-lead","trichdan_2",$content);
	$content=str_replace("in_cache_lead","trichdan_2",$content);
	$content=str_replace("Image","chuthich_tin",$content);
	$content=str_replace("news_list","tin_dadua",$content);
	$content=str_replace("right_boxtitle","tin_dadua_tieude",$content);
	$content=str_replace("list_title","capnhat",$content);
	$content=str_replace("news_date","capnhat",$content);
	$content=str_replace("list_nut","title_congnghe",$content);
	$arr_cut=get_array_tag($content,"<a","</a>");
	for($j=0;$j<=sizeof(@$arr_cut);$j++)
	  if(strpos(@$arr_cut[$j],"xemtiep")||strpos(@$arr_cut[$j],"backtotop")) $content=str_replace(@$arr_cut[$j],"",$content);	
	$arr_cut=get_array_tag($content,"<td","</td>");
	for($j=0;$j<=sizeof(@$arr_cut);$j++)
	  if(strpos(@$arr_cut[$j],"icon_m")) $content=str_replace(@$arr_cut[$j],"",$content);
	$arr_cut=get_array_tag($content,"&id=","\"");
	for($j=0;$j<=sizeof(@$arr_cut);$j++)
	  $content=str_replace(@$arr_cut[$j],change_code(@$arr_cut[$j]),$content);
	echo $content;
?>
</td></tr></table>
</td></tr></table>