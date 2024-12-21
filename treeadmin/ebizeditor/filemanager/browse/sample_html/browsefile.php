<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" > <!--
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
<HTML>
	<HEAD>
		<TITLE>FCKeditor - Image Browser</TITLE>
		<META name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<STYLE type="text/css"> BODY, TD, INPUT { FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif }
		</STYLE>
		<SCRIPT language="javascript">
var sImagesPath  = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1) + 'docs/' ;
function getDoc(fileName)
{
	window.setImage( sImagesPath + fileName ) ;
	window.close() ;
}
		</SCRIPT>
	</HEAD>
<?php
function getFileSize($src)
{
$size=filesize($src);
$units = array(' B', ' KB', ' MB', ' GB', ' TB');
for ($i = 0; $size > 1024; $i++) { $size /= 1024; } 
return round($size, 2).$units[$i];
} 
?>	
	<BODY>
		<TABLE height="100%" cellspacing="5" cellpadding="0" width="100%" border="0">
			<TR>
				<TD align="middle" width="50%">
					Select a file to link<BR>
					<BR>
					<BR>
					<TABLE cellSpacing="1" cellPadding="1" width="80%" align="center" border="0">
					<?php
					$dir=dir("docs/");  
					$file=$dir->read();
					$file=$dir->read();
					while($file=$dir->read())
					{
					?>
							<TR><TD><A href="javascript:getDoc('<?php echo $file;?>');"><?php echo $file;?></A></TD><TD align="right"><?php echo getFileSize("docs/$file");?></TD></TR>
					<?php }?>	
					</TABLE>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HTML>
