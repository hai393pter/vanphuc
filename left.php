<?php
  function danhsachcon($tukhoa,$link,$field)
  {
    $arr=array();
    $sql="select id from danhmuc where tukhoa='$tukhoa'";
	$result=mysql_query($sql,$link);
	$row=mysql_fetch_array($result);
	$sql_ds="select $field from danhmuc where id_parent=".$row["id"]." order by capnhat desc";	
	$result_ds=mysql_query($sql_ds);
	$i=0;
	if(mysql_num_rows($result_ds)!=0)
	  while($row_ds=mysql_fetch_array($result_ds))
	  {
	    $arr[$i]=$row_ds["$field"];
		$i++;
	  }  
	return $arr;
  }
  $ds_ten=array();
  $ds_tukhoa=array();
  $ds_ten_child=array();#0053A6
  $ds_tukhoa_child=array();  
?>
  <?php
    $ds_ten=danhsachcon("sanpham",$link,"ten");
    $ds_tukhoa=danhsachcon("sanpham",$link,"tukhoa");
    for($i=0;$i<sizeof($ds_ten);$i++){
	  $show=$ds_ten[$i];
	  if(isset($_GET["p"])) $p=$_GET["p"];else $p=null;
	  if($p==$ds_tukhoa[$i]) $show="<div class='menu_active'>$show</div>";
	  $ds_ten_child=danhsachcon($ds_tukhoa[$i],$link,"ten");
   	  $ds_tukhoa_child=danhsachcon($ds_tukhoa[$i],$link,"tukhoa");
  ?>
    <a href="?<?php echo lay_duongdan(getid($ds_tukhoa[$i],$link,"id"));?>" class="<?php if($ds_tukhoa[$i]!=$p) echo "sidelinks";else echo "sidelinks"?>"><?php echo $show;?></a>	
	  <span id="<?php echo $href;?>" style=" display:<?php if($p==$ds_tukhoa[$i]) echo "block";else echo "none";?> ">
	    <?php		  
		  for($j=0;$j<sizeof($ds_ten_child);$j++){
		    $show_child=$ds_ten_child[$j];
		    if(isset($_GET["p_child"])) $p_child=$_GET["p_child"];else $p_child=null;
		    if($p_child==$ds_tukhoa_child[$j]) $show_child="<div class='menu_child_active'>$show_child</div>";
		?>
		<a href="?<?php echo lay_duongdan(getid($ds_tukhoa_child[$j],$link,"id"));?>" class="<?php if($ds_tukhoa_child[$j]!=$p_child) echo "sidelinks1";else echo "sidelinks1"?>"><?php echo $show_child;?></a>
		<?php }?>
    </span>		
  <?php }?>