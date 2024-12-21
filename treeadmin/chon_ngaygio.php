<SCRIPT LANGUAGE="javascript">
function showclick(obj)
{
  var el = document.getElementById(obj);
  if(el.style.display != "block")
  {
    el.style.display = "block";
	var d=new Date();
    gio.value=d.getHours();
    phut.value=d.getMinutes();
	giay.value=d.getSeconds();
  }
  else el.style.display = "none";
}
</SCRIPT>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"></td>
    <td width="280">&nbsp;Ch&#7885;n &#273;&#259;ng l&#250;c <span id="o_ngaygio">
		&nbsp;<?php echo date("h:i:s");?> ng&#224;y: <?php echo date("d/m/Y");?>&nbsp;</span>		
	</td>
    <td>
	  &nbsp;<input type="button" class="smallButton" value="Thay &#273;&#7893;i" onClick="showclick('lich');">
	</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><div id="lich" style=" position:inherit;display:none;">
		<table border="1" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="center" bgcolor="#FF6600"><select name="gio" class="TextBox">
			<?php for($i=0;$i<=23;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select> gio 
			<select name="phut" class="TextBox">
			<?php for($i=0;$i<=59;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select> phut 
			<select name="giay" class="TextBox">
			<?php for($i=0;$i<=59;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select> giay
			</td>
		  </tr>
		  <tr>
			<td align="right" bgcolor="#FF6600"><OBJECT ID="Calendar1" WIDTH="230" HEIGHT="150"
			 CLASSID="CLSID:8E27C92B-1264-101C-8A2F-040224009C02"
			 DATA="DATA:application/x-oleobject;BASE64,K8knjmQSHBCKLwQCJACcAgAACADEHQAA2BMAANUHBAAJAA8AAIAAAAAAAACg
			ABAAAIAAAKAAAQAHAAEAAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
			AAAAAAAAAAAAAAAAAAAAAAABAAAAvAJEQgEABUFyaWFsAQAAAJABREIBAAVB
			cmlhbAEAAAC8AsDUAQAFQXJpYWw=
			">
			</OBJECT></td>
		  </tr>
		  <tr>
		    <td align="center"><input type="button" class="smallButton" value="Chon" onClick="chonngay();"></td>
		  </tr>		  
		</table><br></div>
    </td>
  </tr>
</table>