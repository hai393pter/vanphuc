 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
 <tr><td height="20"></td></tr>
 <tr><td align="center" height="10" class="kho3">Downloat báo giá</td></tr>
 <tr><td align="center" height="10"></td></tr>
 <?php
function get_newest_file($folder)
{
  $dir = dir("$folder/");
  $newest_file="";
  $newest_time="";
  while($file=$dir->read())
    if(is_file ("$folder/$file"))
	{
	  $d=date("m/d/y h:i:s",filectime("$folder/$file"));
	  if($newest_time=="")
	  {
	    $newest_time=$d;
		$newest_file=$file;
	  }
	  else if($newest_time<$d)
	  {
	    $newest_time=$d;
		$newest_file=$file;
	  }
	}
  return "$folder/$newest_file";
}
  $file=get_newest_file("treeadmin/download/listfile");
?>
<tr><td align="left"><a href="<?php echo $file;?>"><span class="kho2">&nbsp;&nbsp; bao gia</span></a></td></tr>

</table>
