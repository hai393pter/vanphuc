 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
 <tr><td align="top"><img src="images/st1.jpg" align="right" alt="" border="0"></td></tr>
 <tr><td height="20"></td></tr>
 <tr><td align="center" height="10" class="kho3">Downloat Catalo(pdf file)</td></tr>
 <tr><td align="center" height="10"></td></tr>
<?php
  $sql="select * from sanpham where tailieu!=''";
  $result=mysql_query($sql);
  if(mysql_num_rows($result)!=0)
  while($row=mysql_fetch_array($result)){?>
<tr><td class="kho1"><img src="images/Exp.gif" width="15" height="15">&nbsp;sản phẩm&nbsp;
<?php echo $row["tensp"];?>&nbsp;&nbsp;<a href="treeadmin/news_images/images/<?php echo $row["tailieu"];?>"><span class="kho2"><?php echo $row["tailieu"];?></span></a>
</td></tr>
<tr><td height="5">
</td></tr>
<?php }?>
<tr><td align="center" height="10" class="kho3">Hỗ trợ của nhà sản xuất</td></tr>
 <tr><td align="center" height="10"></td></tr>
<?php
  $sql="select * from sanpham where lienket!=''";
  $result=mysql_query($sql);
  if(mysql_num_rows($result)!=0)
  while($row=mysql_fetch_array($result)){?>
<tr><td class="kho1"><img src="images/Exp.gif" width="15" height="15">&nbsp;sản phẩm&nbsp;
<?php echo $row["tensp"];?><a href=<?php echo $row["lienket"];?>><span class="kho2"><?php echo "support";?></span></a>
</td></tr>
<tr><td height="5">
</td></tr>
<?php }?>
</table>
