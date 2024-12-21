<!--
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2004 Frederico Caldeira Knabben
 *
 * Licensed under the terms of the GNU Lesser General Public License
 * (http://www.opensource.org/licenses/lgpl-license.php)
 *
 * For further information go to http://www.fredck.com/FCKeditor/ 
 * or contact fckeditor@fredck.com.
 *
 * browse.html: Sample server images browser for the editor.
 *
 * Authors:
 *   Frederico Caldeira Knabben (fckeditor@fredck.com)
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<TITLE>. . : : DANH SACH ANH : : . .</TITLE>
		<META name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<STYLE type="text/css">
			BODY, TD, INPUT { FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif }
		</STYLE>
		<SCRIPT language="javascript">
			var sImagesPath  = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1) + 'images/' ;
			var sActiveImage = "" ;
			
			function ok()
			{	
				window.setImage(upload.thumuc.value+"/"+list.dsanh.value);
				window.close();
			}
			function doUnUpload()
			{
			  if(list.dsanh.value=="") alert("Chua chon anh de xoa!");
			  else if(confirm("Ban thuc su muon xoa file "+list.dsanh.value+"?")) {list.frmXoa.submit();}
			}
		</SCRIPT>
<style>
<!--
@import url("../css/admin.css");
-->
</style>
	</HEAD>
	<BODY>
		<TABLE height="100%" cellspacing="0" cellpadding="0" width="95%" border="0">
		    <TR><TD align="center"><iframe src="frmupload.php" width="100%" height="100" frameborder="0" name="upload"></iframe></TD>
			</TR>
			<TR>
				<TD height="100%">
					<TABLE height="100%" cellspacing="5" cellpadding="0" width="100%" border="0">
						<TR>
							<TD align="middle" width="50%"><iframe src="listimage.php" class="TextBox" width="150" height="200" frameborder="0" name="list"></iframe></TD>
							<TD align="middle" width="50%"><iframe src="viewimage.php" width="200" height="200" frameborder="0" name="view"></iframe></TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
			<TR>
				<TD valign="bottom" align="middle">
				    <input type="button" class="bigButton"  onClick="doUnUpload()" value="X&#243;a &#7843;nh">
				    &nbsp;&nbsp;&nbsp;&nbsp;
					<INPUT type="button" class="bigButton" style="WIDTH: 80px"     onclick="ok();" value="Ch&#7885;n &#7843;nh"> 
					&nbsp;&nbsp;&nbsp;&nbsp;
					<INPUT type="button" class="bigButton" style="WIDTH: 80px" onclick="window.close();" value="&#272;&#243;ng">
					<BR>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HTML>
