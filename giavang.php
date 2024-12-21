  <?php
$src="http://vtv.vn/news/GoldPriceP.aspx";
$content=file_get_contents("$src");
$content=cut_table(1,$content);
//$content=str_replace(cut_table(1,$content),"",$content);
echo $content;
?>
 