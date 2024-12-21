<script language="javascript">
function checkEmail(the_email)
{
  var the_at=the_email.indexOf("@");
  var the_dot=the_email.lastIndexOf(".");
  var a_space=the_email.indexOf(" ");
  if((the_at!=-1)&&(the_at!=0)&&(the_dot!=-1)&&(the_dot>the_at+1)&&(the_dot<the_email.length-1)&&(a_space==-1))
  {
    return true;
  }
  else
  {
    if (the_email==" "||the_email=="")
    {
    return true;
    }	
    else return false; 
  }
}
function download()
{
  form_download.mail_for_download.value=mail.value;
  if(form_download.mail_for_download.value=="")
    alert("Bạn phải nhập Email của bạn thì bạn mới download được báo giá!");
  else if(!checkEmail(form_download.mail_for_download.value))
    alert('bạn dã nhập không đúng');    
  else form_download.submit();
}
</script>
      
        <td background="images/bg_top2.gif"height="7" colspan="2" valign="top"></td>
        </tr>
      <tr >
        <td background="images/bg_dot_n.gif"height="1" colspan="2" valign="top"></td>
      </tr>
    </table>      
      <table width="776" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="170" height="20"background="images/menu.jpg" class="white" align="center"><b>SẢN PHẨM</b></td>
          <td width="1" bgcolor="2088CE"></td>
          <td width="424" bgcolor="#0072A8"><table width="100%"  border="0" cellpadding="0" cellspacing="3" class="line">
            <tr>
              <td class="white" align="center"><marquee scrollamount="3" direction="left"><font color="#FFFFFF"><b>Cung cấp máy tính, Máy sách tay, PDA Pocket PC, 02 XDA, Mobilephone MP3, MP4,Hàng DVD-RW Flaxtor,Pionee-IDS/USP 2.0</b></font></marquee></td>
            </tr>
          </table></td>
          <td width="1" bgcolor="2088CE"></td>
          <td background="images/menu.jpg" height="22" class="white" align="center"><b>SẢN PHẨM MỚI</b></td>
        </tr>
       
        <tr>
          <td valign="top" bgcolor="#C3D2DB" width="170" height="100%"><?php require("left.php");?>
<table width="170"  border="0" cellspacing="0" cellpadding="0">
	 <tr><td background="images/menu.jpg" height="22" class="white" align="center"><b>Tải báo giá hàng ngày</b></td></tr>
	 <tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" >
	<tr>
	 <td align="center" height="3"></td>
     </tr>	 
	<tr>
	 <td align="center"><input type="text" class="texbox" name="mail" value="Địa chỉ thư của bạn" onClick="this.value='';"></td>
			  <form name="form_download" method="post" action="?page=baogia">
                 <input type="hidden" name="mail_for_download">
			  </form>
     </tr>
	 <tr> <td><div align="center" height="15">
          <input name="Submit" type="submit" value="Tải về" onClick="download()">
      </div></td></tr>
 	 <tr><td height="30"><img src="images/duoi_trai.gif" width="170"></td></tr>
	 </table></td>
	 </tr>
    <tr>
	 <tr>
    <!--  <td height="20"background="images/Rightbg.jpg" align="center" class="white">tim kiem</td>
  </tr>
 <form name="form1" method="post" action="?page=search">
	<tr>
      <td height="30" align="center"><input name="ten" type="text" id="ten"></td>
    </tr> 
    <tr>
      <td><div align="center" height="15">
          <input name="Submit" type="submit"value="downloat">
      </div></td>
    </tr>-->
</form>
	<tr>
      <tr>
     <td width="160" height="20" background="images/menu.jpg" class="white" align="center"></td>
	 </tr>
	 <tr><td align="center" height="50" background="images/Right3.jpg" class="kho1" >Số lượt truy nhập:&nbsp;<font color="#0083C1"><?php require("dem.php");?></font></td>
		</tr>
    	  <tr>
          <td align="center"><?php require("tygia.php");?></td>	
        </tr>
		<tr>
       <td></td>
          
        </tr>
  
  <tr>
    <td align="center"><table width="90%"  border="0" cellspacing="0" cellpadding="5">
   </table></td>
  </tr>
 </table></td>
  
          <td bgcolor="2088CE"></td>
          <td valign="top" bgcolor="#FFFFFF" width="444">
		    <table width="99%"  border="0" cellspacing="0" cellpadding="0" align="center">
			 
			  <tr>
				<td>
					<?php
					switch($page)
					{
					  case "tintuc":require("trichtin.php");break;	
					  case "sanpham":require("face3_products1.php");break;
					  case "search":require("search.php");break;
					  case "baogia":require("baogia.php");break;
					  case "catalo":require("catalo.php");break;
					  case "gioithieu":require("gioithieu.php");break;
					  case "support":require("catalo.php");break;
					  case "lienhe":require("lienhe.php");break;
					  case "giaitri":require("giaitri.php");break;
					  case "shoppingcart":require("giohang.php");break;
					  case "order":require("thanhtoan.php");break;	
  				      case "tuyendung":require("tuyendung.php");break;	
					  default:require("face3_products1.php");break;
					}
					?>
				</td>
			  </tr>
			</table>
		  </td>
          <td bgcolor="#F2F2F2" ></td>
          <td align="center" valign="top"height="100%" bgcolor="#FFFFFF">
		  <table width="95%"  border="0" cellpadding="2" cellspacing="0">
            <tr>
             <td style="background-color:#FFFFFF;">		
				<MARQUEE direction=up width="170" height="160" scrollAmount="1" scrollDelay="20" class="news" id="mymarquee2" onmouseover="mymarquee2.stop();" onmouseout="mymarquee2.start();" language="jscript">
                 <div class="spmoi_scroll">
				 <?php 
					$sql="select * from sanpham where spmoi='on' order by capnhat desc";
					$rs=mysql_query($sql);
					if(mysql_num_rows($rs)!=0)
					  while($row=mysql_fetch_array($rs)){
				 ?>
				 <a href="?<?php echo lay_duongdan($row["id_parent"])."&id=".$row["id_sp"];?>"><img src="<?php echo "treeadmin/news_images/images/".$row["anhsp"];?>" width="170" border="0"><br>
                	<div class="spmoi"><a href="?<?php echo lay_duongdan($row["id_parent"])."&id=".$row["id_sp"];?>"><?php echo $row["tensp"];?></a></div>
                	<div class="GIATIEN">Chỉ có $<?php echo $row["gia"];?>
                </div><br></a><p></font>
                 <?php }?></div>
				</MARQUEE>
			  </td> 
            </tr>
			<tr><td background="images/menu.jpg" class="white" align="center" height="22"><b>LIÊN KẾT WEBSITE</b></td></tr>
			<tr>
                <td height="54" align="center" background="images/duoi_trai.gif">
				<form name="frm1">        
				  <font face="Verdana, Arial, Helvetica, sans-serif" size="1">         
				  <select name="lists" onChange="window.open(this.options[this.selectedIndex].value,'_blank'); lists.options[0].selected=true" size="1" style="FONT-FAMILY: Verdana; FONT-SIZE: 8pt">        
					<option selected>liên kết nhanh</option>    
					<option value="http://vnexpress.net">Tin nhanh Việt Nam</option>    
					<option value="http://www.fpt.vn">www.fpt.vn</option>    
					<option value="http://www.vnexpress.net/vietnam/cuoi">Giải trí</option>    
					<option value="http://www.vnexpress.net/vietnam/kinh-doanh">Kinh doanh</option>    
					<option value="http://www.vnexpress.net/vietnam/phap-luat">Pháp luật</option>    
					<option value="http://www.vnexpress.net/vietnam/vi_tinh">Tin học</option>    
					<option value="http://www.vnn.vn">vnn</option>    
					<option value="http://home.vnn.vn/">VDC</option>    
					<option value="http://www.vnn.vn">VASC</option>    
					<option value="http://www.cinet.vnn.vn">Cinet</option>    
					</select></font>
				</form>
                </td>                
              </tr>
			<tr><td><a href="http://www.macafee.com" class="poid"><img src="images/MacAfee.gif" width="170"border="0"></a></td></tr>
			<tr><td><a href="http://www.zonelabs.com" class="poid"><img src="images/zonelabs.gif" width="165"></a></td></tr>
			<tr><td><a href="http://www.bkav.com.vn" class="poid"><img src="images/2011416587.gif" width="170"border="0"></a></td></tr>
		</table>
	 </tr>
 <tr><table width="778"  border="0" cellpadding="0" cellspacing="0" id="bottom" background="images/footerbg.jpg">
    <tr>
      <td class="kho4" background="images/footerbg.jpg" align="center" height="60"><BR>
			Công ty cổ phần kinh doanh thiết bị Vạn Phúc</br>
 111 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội.</br>Điện thoại:(04) 6 238 862.  E-mail: 
		<a href="mailto:vp@vanphuc.com.vn" style="color:#FFFFFF">vp@vanphuc.com.vn</a>, <a href="mailto:quangph@vanphuc.com.vn" style="color:#FFFFFF">quangph@vanphuc.com.vn</a>
	  </td>
    </tr>	
  </table>
  </tr>
        
