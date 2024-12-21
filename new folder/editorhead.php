<script type="text/javascript">
<!-- 
	if(typeof top.frames["wmailmain"] != "undefined") window.open("http://mail.yahoo.com", "_top");
// -->
</script><noscript>
<META HTTP-EQUIV=Refresh CONTENT="0; URL=/ym/login?nojs=1">
</noscript>



<link rel="stylesheet" href="editor_files/mail_plum_all.css" type="text/css" media="all">

<script type="text/javascript" src="editor_files/mailcommonlib.js"></script>

<link rel="stylesheet" type="text/css" href="editor_files/pim_compose.css">

<script>
    function RTEUtilBeginScript()
    {
	return String.fromCharCode(60, 115, 99, 114, 105, 112, 116, 62);
    }

    function RTEUtilEndScript()
    {
	return String.fromCharCode(60, 47, 115, 99, 114, 105, 112, 116, 62);
    }

    function RTEUtilScript()
    {
	return String.fromCharCode(115, 99, 114, 105, 112, 116);
    }
</script>
<script>
	function RTEIDGenerator(nextID)
	{
		this.nextID = nextID;
		this.GenerateID = RTEIDGeneratorGenerateID;
	}

	function RTEIDGeneratorGenerateID()
	{
		return this.nextID++;
	}
</script>

<script>
	var RTE_BUTTON_IMAGE_PREFIX = "rteButtonImage";
	var RTE_BUTTON_DIV_PREFIX = "rteButtonDiv";
	var RTE_BUTTON_PAD1_PREFIX = "rteButtonPad1";
	var RTE_BUTTON_PAD2_PREFIX = "rteButtonPad2";
	var rteButtonMap = new Object();

	function RTEButton
	(
		idGenerator,
		caption,
		action,
		text,
		image
	)
	{
		this.idGenerator = idGenerator;
		this.caption = caption;
		this.action = action;
		this.text = text;
		this.image = image;
		this.enabled = true;
		this.Instantiate = RTEButtonInstantiate;
		this.Enable = RTEButtonEnable;
	}

	function RTEButtonInstantiate()
	{
		this.id = this.idGenerator.GenerateID();
		rteButtonMap[this.id] = this;
		var html = "";
		html += '<div id="';
		html += RTE_BUTTON_DIV_PREFIX;
		html += this.id;
		html += '" class="RTEButtonNormal"';
		html += ' onselectstart="RTEButtonOnSelectStart()"';
		html += ' ondragstart="RTEButtonOnDragStart()"';
		html += ' onmousedown="RTEButtonOnMouseDown(this)"';
		html += ' onmouseup="RTEButtonOnMouseUp(this)"';
		html += ' onmouseout="RTEButtonOnMouseOut(this)"';
		html += ' onmouseover="RTEButtonOnMouseOver(this)"';
		html += ' onclick="RTEButtonOnClick(this)"';
		html += ' ondblclick="RTEButtonOnDblClick(this)"';
		html += ' onfocus="alert()"';
		html += '>';
		html += '<a href="#" style="cursor:hand" onmouseover="window.status=\'' + this.caption + '\';return true;" onmouseout="window.status=window.defaultStatus;return true;">';
		html += '<table cellpadding=0 cellspacing=0 border=0><tr><td><img id="';
		html += RTE_BUTTON_PAD1_PREFIX;
		html += this.id;
		html += '" width=2 height=2></td><td></td><td></td></tr><tr><td></td><td><table cellpadding=0 cellspacing=0 border=0><tr>';
		html += '<td>';
		html += '<img id="';
		html += RTE_BUTTON_IMAGE_PREFIX;
		html += this.id;
		html += '" src="';
		html += this.image;
		html += '" title="';
		html += this.caption;
		html += '">';
		html += '</td>';
		if (this.text != "") {
		    html += '<td>&nbsp;</td>';
		    html += '<td class=RTEButtonText>';
		    html += this.text;
		    html += '</td>';
		}
		html += '</tr></table></td><td></td></tr><tr><td></td><td></td><td><img id="';
		html += RTE_BUTTON_PAD2_PREFIX;
		html += this.id;
		html += '" width=2 height=2></td></tr></table>';
		html += '</a>';
		html += '</div>';
		document.write(html);
	}

	function RTEButtonEnable(enabled)
	{
		this.enabled = enabled;
		if (this.enabled)
		{
			document.all[RTE_BUTTON_DIV_PREFIX + this.id].className = "RTEButtonNormal";
		}
		else
		{
			document.all[RTE_BUTTON_DIV_PREFIX + this.id].className = "RTEButtonDisabled";
		}
	}

	function RTEButtonOnSelectStart()
	{
		window.event.returnValue = false;
	}

	function RTEButtonOnDragStart()
	{
		window.event.returnValue = false;
	}

	function RTEButtonOnMouseDown(element)
	{
		if (event.button == 1)
		{
			var id = element.id.substring(RTE_BUTTON_DIV_PREFIX.length, element.id.length);
			var button = rteButtonMap[id];
			if (button.enabled)
			{
				RTEButtonPushButton(id);
			}
		}
	}

	function RTEButtonOnMouseUp(element)
	{
		if (event.button == 1)
		{
			var id = element.id.substring(RTE_BUTTON_DIV_PREFIX.length, element.id.length);
			var button = rteButtonMap[id];
			if (button.enabled)
			{
				RTEButtonReleaseButton(id);
			}
		}
	}

	function RTEButtonOnMouseOut(element)
	{
		var id = element.id.substring(RTE_BUTTON_DIV_PREFIX.length, element.id.length);
		var button = rteButtonMap[id];
		if (button.enabled)
		{
			RTEButtonReleaseButton(id);
		}
	}

	function RTEButtonOnMouseOver(element)
	{
		var id = element.id.substring(RTE_BUTTON_DIV_PREFIX.length, element.id.length);
		var button = rteButtonMap[id];
		if (button.enabled)
		{
			RTEButtonReleaseButton(id);
			document.all[RTE_BUTTON_DIV_PREFIX + id].className = "RTEButtonMouseOver";
		}
	}

	function RTEButtonOnClick(element)
	{
		var id = element.id.substring(RTE_BUTTON_DIV_PREFIX.length, element.id.length);
		var button = rteButtonMap[id];
		if (button.enabled)
		{
			eval(button.action);
		}
	}

	function RTEButtonOnDblClick(element)
	{
		RTEButtonOnClick(element);
	}

	function RTEButtonPushButton(id)
	{
		document.all[RTE_BUTTON_PAD1_PREFIX + id].width = 3;
		document.all[RTE_BUTTON_PAD1_PREFIX + id].height = 3;
		document.all[RTE_BUTTON_PAD2_PREFIX + id].width = 1;
		document.all[RTE_BUTTON_PAD2_PREFIX + id].height = 1;
		document.all[RTE_BUTTON_DIV_PREFIX + id].className = "RTEButtonPressed";
	}

	function RTEButtonReleaseButton(id)
	{
		document.all[RTE_BUTTON_PAD1_PREFIX + id].width = 2;
		document.all[RTE_BUTTON_PAD1_PREFIX + id].height = 2;
		document.all[RTE_BUTTON_PAD2_PREFIX + id].width = 2;
		document.all[RTE_BUTTON_PAD2_PREFIX + id].height = 2;
		document.all[RTE_BUTTON_DIV_PREFIX + id].className = "RTEButtonNormal";
	}
</script>




<script>
    var RTE_IMAGE_CHOOSER_FRAME_PREFIX = "rteImageChooserFrame";
    var RTE_IMAGE_CHOOSER_CONTENT_PREFIX = "rteImageChooserContent";
    var RTE_IMAGE_CHOOSER_IMG_PREFIX = "rteImageChooserImg";
    var RTE_IMAGE_CHOOSER_ICON_PREFIX = "rteImageChooserIcon";
    var rteImageChooserMap = new Object();

    function RTEImageChooser
    (
	    idGenerator,
	    numRows,
	    numCols,
	    imageWidth,
	    imageHeight,
	    images,
	    callback
    )
    {
	    this.idGenerator = idGenerator;
	    this.numRows = numRows;
	    this.numCols = numCols;
	    this.imageWidth = imageWidth;
	    this.imageHeight = imageHeight;
	    this.images = images;
	    this.callback = callback;
	    this.Instantiate = RTEImageChooserInstantiate;
	    this.Show = RTEImageChooserShow;
	    this.Hide = RTEImageChooserHide;
	    this.IsShowing = RTEImageChooserIsShowing;
	    this.SetUserData = RTEImageChooserSetUserData;
    }

    function RTEImageChooserInstantiate()
    {
	    this.id = this.idGenerator.GenerateID();
	    rteImageChooserMap[this.id] = this;
	    var width = (this.imageWidth + 4) * this.numCols + 2;
	    var height = (this.imageHeight + 4) * this.numRows + 2;
	    document.write(
		'<iframe id="' + RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id + '" class="RTESelector" marginwidth=0 marginheight=0 frameborder=0 scrolling=no width=' + width + ' height=' + height + ' style="display:none"></iframe>'
	    );
	    RTEImageChooserInitContent(this.id);
    }

    function RTEImageChooserShow(x, y)
    {
	    var f = eval(RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id);
	    if (
		f.document.body.innerHTML == ""
	    ) {
		f.document.body.innerHTML = this.content;
	    }
	    f.document.body.style.border = "#737373 solid 1px";
	    d.all[RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id].style.left = x;
	    d.all[RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id].style.top = y;
	    d.all[RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id].style.display = "block";
    }

    function RTEImageChooserHide()
    {
	    d.all[RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id].style.display = "none";
    }

    function RTEImageChooserIsShowing()
    {
	    return d.all[RTE_IMAGE_CHOOSER_FRAME_PREFIX + this.id].style.display == "block";
    }

    function RTEImageChooserSetUserData(userData)
    {
	this.userData = userData;
    }

    function RTEImageChooserOnMouseOver(id)
    {
	    var f = eval(RTE_IMAGE_CHOOSER_FRAME_PREFIX + id);
	    if (f.event.srcElement.tagName == "IMG") {
		    var underscore = f.event.srcElement.id.indexOf("_");
		    if (underscore != -1) {
			    var id = f.event.srcElement.id.substring(RTE_IMAGE_CHOOSER_IMG_PREFIX.length, underscore);
			    var index = f.event.srcElement.id.substring(underscore + 1);
			    f[RTE_IMAGE_CHOOSER_ICON_PREFIX + id + "_" + index].style.borderColor = "black";
		    }
	    }
    }

    function RTEImageChooserOnMouseOut(id)
    {
	    var f = eval(RTE_IMAGE_CHOOSER_FRAME_PREFIX + id);
	    if (f.event.srcElement.tagName == "IMG") {
		    var underscore = f.event.srcElement.id.indexOf("_");
		    if (underscore != -1) {
			    var id = f.event.srcElement.id.substring(RTE_IMAGE_CHOOSER_IMG_PREFIX.length, underscore);
			    var index = f.event.srcElement.id.substring(underscore + 1);
			    f[RTE_IMAGE_CHOOSER_ICON_PREFIX + id + "_" + index].style.borderColor = "white";
		    }
	    }
    }

    function RTEImageChooserOnClick(id)
    {
	    var f = eval(RTE_IMAGE_CHOOSER_FRAME_PREFIX + id);
	    if (f.event.srcElement.tagName == "IMG") {
		    var underscore = f.event.srcElement.id.indexOf("_");
		    if (underscore != -1) {
			    var id = f.event.srcElement.id.substring(RTE_IMAGE_CHOOSER_IMG_PREFIX.length, underscore);
			    var imageChooser = rteImageChooserMap[id];
			    imageChooser.Hide();
			    var index = f.event.srcElement.id.substring(underscore + 1);
			    if (imageChooser.callback) {
				    imageChooser.callback(imageChooser.images[index], imageChooser.userData);
			    }
		    }
	    }
    }

    function RTEImageChooserInitContent(id)
    {
	imageChooser = rteImageChooserMap[id];
	imageChooser.content = "";
	imageChooser.content += '<table id="' + RTE_IMAGE_CHOOSER_CONTENT_PREFIX + imageChooser.id + '" cellpadding=1 cellspacing=0 border=0>';
	for (var i = 0; i < imageChooser.numRows; i++) {
		imageChooser.content += '<tr>';
		for (var j = 0; j < imageChooser.numCols; j++) {
			imageChooser.content += '<td>';
			var k = i * imageChooser.numCols + j;
			imageChooser.content += '<div id="' + RTE_IMAGE_CHOOSER_ICON_PREFIX + imageChooser.id + '_' + k + '" style="border:white solid 1px;cursor:hand">';
			imageChooser.content += '<img src="' + imageChooser.images[k] + '" id="' + RTE_IMAGE_CHOOSER_IMG_PREFIX + imageChooser.id + '_' + k + '" width=' + imageChooser.imageWidth + ' height=' + imageChooser.imageHeight + ' onmouseover="parent.RTEImageChooserOnMouseOver(' + imageChooser.id + ')" onmouseout="parent.RTEImageChooserOnMouseOut(' + imageChooser.id + ')" onclick="parent.RTEImageChooserOnClick(' + imageChooser.id + ')">';
			imageChooser.content += '</div>';
			imageChooser.content += '</td>';
		}
		imageChooser.content += '</tr>';
	}
	imageChooser.content += '</table>';
    }
</script>
<script>
	var RTE_EDITOR_COMPOSITION_PREFIX = "rteEditorComposition";
	var RTE_EDITOR_TOOLBAR_PREFIX = "rteEditorToolbar";
	var RTE_EDITOR_SMILEY_BUTTON_PREFIX = "rteEditorSmileyButton";
	var RTE_EDITOR_IMAGE_CHOOSER_PREFIX = "rteEditorImageChooser";
	var RTE_EDITOR_DEFAULT_FONT_FAMILY = "arial";
	var RTE_EDITOR_DEFAULT_FONT_SIZE = "10pt";
	var RTE_EDITOR_FONT_PREFIX = "rteEditorFont";
	var RTE_EDITOR_SIZE_PREFIX = "rteEditorSize";
	var RTE_EDITOR_FORE_PREFIX = "rteEditorFore";
	var RTE_EDITOR_BACK_PREFIX = "rteEditorBack";
	var RTE_EDITOR_ALIGN_PREFIX = "rteEditorAlign";
	var RTE_EDITOR_LIST_PREFIX = "rteEditorList";
	var rteEditorMap = new Object();
	var rteEditorIDGenerator = null;
	var rteEditorActive = 0;

	function RTEEditor(idGenerator)
	{
		this.idGenerator = idGenerator;
		this.textMode = false;
		this.backgroundColor = "";
		this.backgroundImage = "";
		this.foregroundColor = "";
		this.fontFamily = "";
		this.fontSize = "";
		this.stationery = false;
		this.stationeryWindow = null;
		this.haveAX = false;
		this.instantiated = false;
		this.Instantiate = RTEEditorInstantiate;
		this.GetText = RTEEditorGetText;
		this.SetText = RTEEditorSetText;
		this.GetHTML = RTEEditorGetHTML;
		this.SetHTML = RTEEditorSetHTML;
		this.Focus = RTEEditorFocus;
		this.SetDomain = SetDomain;
		this.SetBackgroundColor = RTEEditorSetBackgroundColor;
		this.GetBackgroundColor = RTEEditorGetBackgroundColor;
		this.RemoveBackgroundColor = RTEEditorRemoveBackgroundColor;
		this.SetBackgroundImage = RTEEditorSetBackgroundImage;
		this.GetBackgroundImage = RTEEditorGetBackgroundImage;
		this.RemoveBackgroundImage = RTEEditorRemoveBackgroundImage;
		this.SetForegroundColor = RTEEditorSetForegroundColor;
		this.GetForegroundColor = RTEEditorGetForegroundColor;
		this.RemoveForegroundColor = RTEEditorRemoveForegroundColor;
		this.SetFontFamily = RTEEditorSetFontFamily;
		this.GetFontFamily = RTEEditorGetFontFamily;
		this.RemoveFontFamily = RTEEditorRemoveFontFamily;
		this.SetFontSize = RTEEditorSetFontSize;
		this.GetFontSize = RTEEditorGetFontSize;
		this.RemoveFontSize = RTEEditorRemoveFontSize;
		this.SetStationery = RTEEditorSetStationery;
		this.GetStationery = RTEEditorGetStationery;
		this.InsertImage = RTEEditorInsertImage;
		this.ViewHTMLSource = RTEEditorViewHTMLSource;
		this.Unload = RTEEditorUnload;
		this.GetComposition = RTEEditorGetComposition;
		this.GetDocument = RTEEditorGetDocument;
		this.Exec = RTEEditorExec;
	}

	function RTEEditorInstantiate()
	{
		if (this.instantiated) {
			return;
		}
		this.id = this.idGenerator.GenerateID();
		rteEditorMap[this.id] = this;
		rteEditorIDGenerator = this.idGenerator;
		var html = "";
		html += "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">";
		html += "<tr>";
		html += "<td id=\"" + RTE_EDITOR_TOOLBAR_PREFIX + this.id + "\" class=\"RTEToolbar\">";
		html += "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
		html += "<tr>";
<!-- cut, paste, copy -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var cutButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Cut\",";
		html += "\"RTEEditorOnCut(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_cut_1.gif\"";
		html += ");";
		html += "cutButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var copyButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Copy\",";
		html += "\"RTEEditorOnCopy(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_copy_1.gif\"";
		html += ");";
		html += "copyButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var pasteButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Paste\",";
		html += "\"RTEEditorOnPaste(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_paste_1.gif\"";
		html += ");";
		html += "pasteButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";
<!-- font -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var fontButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Font Face\",";
		html += "\"RTEEditorOnFontDropDown(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_fontface_1.gif\"";
		html += ");";
		html += "fontButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
<!-- size -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var sizeButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Font Size\",";
		html += "\"RTEEditorOnSizeDropDown(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_fontsize_1.gif\"";
		html += ");";
		html += "sizeButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
<!-- bold, italic, underline-->
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var boldButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Bold\",";
		html += "\"RTEEditorOnBold(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_bold_1.gif\"";
		html += ");";
		html += "boldButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var italicButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Italic\",";
		html += "\"RTEEditorOnItalic(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_italic_1.gif\"";
		html += ");";
		html += "italicButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var underlineButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Underline\",";
		html += "\"RTEEditorOnUnderline(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_uline_1.gif\"";
		html += ");";
		html += "underlineButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";
<!-- foreground text color -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var foregroundTextColorButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Text Color\",";
		html += "\"RTEEditorOnForegroundTextColor(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_coltext_1.gif\"";
		html += ");";
		html += "foregroundTextColorButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
<!-- background text color -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var backgroundTextColorButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Highlight Color\",";
		html += "\"RTEEditorOnBackgroundTextColor(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_colhilite_1.gif\"";
		html += ");";
		html += "backgroundTextColorButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
<!-- smiley button -->
		html += "<td id=\"" + RTE_EDITOR_SMILEY_BUTTON_PREFIX + this.id + "\">";
		html += RTEUtilBeginScript();
		html += "var insertSmileyButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Insert Emoticon\",";
		html += "\"RTEEditorOnStartInsertSmiley(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_smiley_1.gif\"";
		html += ");";
		html += "insertSmileyButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";

<!-- insert weblink -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var createHyperlinkButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Create Hyperlink\",";
		html += "\"RTEEditorOnCreateHyperlink(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_link_1.gif\"";
		html += ");";
		html += "createHyperlinkButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";

<!-- insert image -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var insertImageButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Insert Image\",";
		html += "\"RTEEditorOnInsertImage(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_chenanh.gif\"";
		html += ");";
		html += "insertImageButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";

<!-- alignment -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var alignmentButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Align Text\",";
		html += "\"RTEEditorOnAlignment(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_justpd_1.gif\"";
		html += ");";
		html += "alignmentButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
<!-- bulleted list -->
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var bulletedListButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"List\",";
		html += "\"RTEEditorOnList(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_listpd_1.gif\"";
		html += ");";
		html += "bulletedListButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += "<div class=\"RTEDivider\"></div>";
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var decreaseIndentButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Decrease Indent\",";
		html += "\"RTEEditorOnDecreaseIndent(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_ileft_1.gif\"";
		html += ");";
		html += "decreaseIndentButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
		html += "<td>";
		html += RTEUtilBeginScript();
		html += "var increaseIndentButton = new RTEButton(";
		html += "rteEditorIDGenerator,";
		html += "\"Increase Indent\",";
		html += "\"RTEEditorOnIncreaseIndent(" + this.id + ")\",";
		html += "\"\",";
		html += "\"editor_files/tb_iright_1.gif\"";
		html += ");";
		html += "increaseIndentButton.Instantiate();";
		html += RTEUtilEndScript();
		html += "</td>";
/*<!-- stationery -->
		if (this.stationery) {
		    html += "<td>";
		    html += "<div class=\"RTEDivider\"></div>";
		    html += "</td>";
		    html += "<td>";
		    html += RTEUtilBeginScript();
		    html += "var stationeryButton = new RTEButton(";
		    html += "rteEditorIDGenerator,";
		    html += "\"Apply Stationery\",";
		    html += "\"RTEEditorOnStationery(" + this.id + ")\",";
		    html += "\"<span style='font-size: 8pt; vertical-align: middle'>Stationery</span>\",";
		    html += "\"editor_files/tb_station_2.gif\"";
		    html += ");";
		    html += "stationeryButton.Instantiate();";
		    html += RTEUtilEndScript();
		    html += "</td>";
		}*/
		html += "</tr>";
		html += "</table>";
		html += "</td>";
		html += "</tr>";
		html += "<tr>";
		html += "<td>";
		if (RTEEditorHaveAX()) {
		    this.haveAX = true;
		    html += "<object id=\"" + RTE_EDITOR_COMPOSITION_PREFIX + this.id + "\" width=\"100%\" height=\"220\" classid=\"CLSID:E9277B43-B5F6-4801-B4C2-0F1B61496715\">";
		    html += "</object>";
		    html += "<";
		    html += RTEUtilScript();
		    html += " for=\"" + RTE_EDITOR_COMPOSITION_PREFIX + this.id + "\" event=\"DesignEvents(method, dispid, event, handled)\">";
		    html += "RTEEditorEvents(" + this.id + ", method, dispid, event, handled);";
		    html += RTEUtilEndScript();
		}
		else {
		    html += "<iframe id=\"" + RTE_EDITOR_COMPOSITION_PREFIX + this.id + "\" width=\"100%\" height=\"220\">";
		    html += "</iframe>";
		}
		html += "</td>";
		html += "</tr>";
		html += "</table>";
		html += RTEUtilBeginScript();
		html += "var " + RTE_EDITOR_IMAGE_CHOOSER_PREFIX + this.id + " = new RTEImageChooser(";
		html += "rteEditorIDGenerator,";
		html += "8, 5,";
		html += "18, 18,";
		html += "[";
		html += "\"icon_files/01.gif\",";
		html += "\"icon_files/02.gif\",";
		html += "\"icon_files/03.gif\",";
		html += "\"icon_files/04.gif\",";
		html += "\"icon_files/05.gif\",";
		html += "\"icon_files/06.gif\",";
		html += "\"icon_files/07.gif\",";
		html += "\"icon_files/08.gif\",";
		html += "\"icon_files/09.gif\",";
		html += "\"icon_files/10.gif\",";
		html += "\"icon_files/11.gif\",";
		html += "\"icon_files/12.gif\",";
		html += "\"icon_files/13.gif\",";
		html += "\"icon_files/14.gif\",";
		html += "\"icon_files/15.gif\",";
		html += "\"icon_files/16.gif\",";
		html += "\"icon_files/17.gif\",";
		html += "\"icon_files/18.gif\",";
		html += "\"icon_files/19.gif\",";
		html += "\"icon_files/20.gif\",";
		html += "\"icon_files/21.gif\",";
		html += "\"icon_files/22.gif\",";
		html += "\"icon_files/23.gif\",";
		html += "\"icon_files/24.gif\",";
		html += "\"icon_files/25.gif\",";
		html += "\"icon_files/26.gif\",";
		html += "\"icon_files/27.gif\",";
		html += "\"icon_files/28.gif\",";
		html += "\"icon_files/29.gif\",";
		html += "\"icon_files/30.gif\",";
		html += "\"icon_files/31.gif\",";
		html += "\"icon_files/32.gif\",";
		html += "\"icon_files/33.gif\",";
		html += "\"icon_files/34.gif\",";
		html += "\"icon_files/35.gif\",";
		html += "\"icon_files/37.gif\",";
		html += "\"icon_files/39.gif\",";
		html += "\"icon_files/40.gif\",";
		html += "\"icon_files/47.gif\",";
		html += "\"icon_files/50.gif\"";
		html += "],";
		html += "RTEEditorOnEndInsertSmiley";
		html += ");";
		html += RTE_EDITOR_IMAGE_CHOOSER_PREFIX + this.id + ".SetUserData(" + this.id + ");";
		html += RTE_EDITOR_IMAGE_CHOOSER_PREFIX + this.id + ".Instantiate();";
		html += RTEUtilEndScript();
		html +="<iframe id='" + RTE_EDITOR_FONT_PREFIX + this.id + "' class=RTESelector width=125 height=235 marginwidth=0 marginheight=0 frameborder=0 scrolling=no style='top:30px;left:86px;display:none'></iframe>";
		html += "<iframe id='" + RTE_EDITOR_SIZE_PREFIX + this.id + "' class=RTESelector width=145 height=256 marginwidth=0 marginheight=0 frameborder=0 scrolling=no style='top:30px;left:114px;display:none'></iframe>";
		html += "<iframe id='" + RTE_EDITOR_ALIGN_PREFIX + this.id + "' class=RTESelector width=112 height=88 marginwidth=0 marginheight=0 frameborder=0 scrolling=no style='top:30px;left:344px;display:none'></iframe>";
		html += "<iframe id='" + RTE_EDITOR_LIST_PREFIX + this.id + "' class=RTESelector width=121 height=60 marginwidth=0 marginheight=0 frameborder=0 scrolling=no style='top:30px;left:372px;display:none'></iframe>";
		html += "<iframe id='" + RTE_EDITOR_FORE_PREFIX + this.id + "' class=RTESelector src='' width=168 height=186 frameborder=0 scrolling=no style='top:30px;left:230px;display:none;'></iframe>";
		html += "<iframe id='" + RTE_EDITOR_BACK_PREFIX + this.id + "' class=RTESelector src='' width=168 height=186 frameborder=0 scrolling=no style='top:30px;left:258px;display:none;'></iframe>";
		document.write(html);
		html = '';
		html += '<body style="font-family:' + RTE_EDITOR_DEFAULT_FONT_FAMILY + ';font-size:' + RTE_EDITOR_DEFAULT_FONT_SIZE + '">';
		html += '<div></div>';
		html += '</body>';
		if (!RTEEditorHaveAX()) {
		    eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.designMode = "on";
		    eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.open();
		    eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.write(html);
		    eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.close();
		    eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.onclick = new Function("RTEEditorOnClick(" + this.id + ")");
		}
		RTEEditorInitDropDowns(this.id);
		rteEditorIDGenerator = null;
		this.instantiated = true;
	}

	function RTEEditorGetText()
	{
		return this.GetDocument().body.innerText;
	}

	function RTEEditorSetText(text)
	{
		text = text.replace(/\n/g, "<br>");
		text = "<div>" + text + "</div>";
		this.GetDocument().body.innerHTML = text;
	}

	function RTEEditorGetHTML()
	{
		if (this.textMode) {
			return this.GetDocument().body.innerText;
		}
		var html =  this.GetDocument().body.innerHTML;
		return html.toLowerCase() == "<div></div>" ? "" : html;
	}

	function RTEEditorSetHTML(html)
	{
		if (this.textMode) {
			this.GetDocument().body.innerText = html;
		}
		else {
			html = "<div>" + html + "</div>";
			this.GetDocument().body.innerHTML = html;
		}
	}

	function RTEEditorFocus()
	{
	    this.GetComposition().focus();
	}

	function SetDomain(d)
	{
	    this.GetDocument().domain = d;
	}

	function RTEEditorOnCut(id)
	{
		RTEEditorFormat(id, "cut");
	}

	function RTEEditorOnCopy(id)
	{
		RTEEditorFormat(id, "copy");
	}

	function RTEEditorOnPaste(id)
	{
		RTEEditorFormat(id, "paste");
	}

	function RTEEditorOnBold(id)
	{
		RTEEditorFormat(id, "bold");
	}

	function RTEEditorOnItalic(id)
	{
		RTEEditorFormat(id, "italic");
	}

	function RTEEditorOnUnderline(id)
	{
		RTEEditorFormat(id, "underline");
	}

	function RTEEditorOnAlignLeft(id)
	{
		RTEEditorFormat(id, "justifyleft");
	}

	function RTEEditorOnCenter(id)
	{
		RTEEditorFormat(id, "justifycenter");
	}

	function RTEEditorOnAlignRight(id)
	{
		RTEEditorFormat(id, "justifyright");
	}

	function RTEEditorOnNumberedList(id)
	{
		RTEEditorFormat(id, "insertOrderedList");
	}

	function RTEEditorOnBulletedList(id)
	{
		RTEEditorFormat(id, "insertUnorderedList");
	}

	function RTEEditorOnDecreaseIndent(id)
	{
		RTEEditorFormat(id, "outdent");
	}

	function RTEEditorOnIncreaseIndent(id)
	{
		RTEEditorFormat(id, "indent");
	}

	function RTEEditorOnStationery(id)
	{
	    if (!RTEEditorValidateMode(id)) {
		    return;
	    }

              
	    RTEEditorHideAllDropDowns(id);
	    var editor = rteEditorMap[id];
	    var width = 392;
	    var height = 348;
	    var left = (screen.availWidth - width) / 2;
	    var top = (screen.availHeight - height) / 2;

               editor.stationeryWindow = window.open(
                   "http://us.rd.yahoo.com/mail_us/plus/order/evt=8728/*http://mailplus.yahoo.com/mp_stationery_splash.php",
                   "LearnMore",
                   "width=400,height=500,scrollbars=yes,dependent=yes");

	    editor.stationeryWindow.focus();
	}

	function RTEEditorOnCreateHyperlink(id)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		RTEEditorHideAllDropDowns(id);
		var editor = rteEditorMap[id];
		var anchor = RTEEditorGetElement("A", editor.GetDocument().selection.createRange().parentElement());
		var link = prompt("enter link location (eg. http://www.yahoo.com):", anchor ? anchor.href : "http://");
		if (link && link != "http://") {
			if (editor.GetDocument().selection.type == "None") {
				var range = editor.GetDocument().selection.createRange();
				range.pasteHTML('<A HREF="' + link + '"></A>');
				range.select();
			}
			else {
				RTEEditorFormat(id, "CreateLink", link);
			}
		}
	}

	function RTEEditorOnInsertImage(id)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		RTEEditorHideAllDropDowns(id);
		showDialog("formupload.php",600,300);
	}

	function RTEEditorOnStartInsertSmiley(id)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		if (eval(RTE_EDITOR_IMAGE_CHOOSER_PREFIX + id).IsShowing()) {
			eval(RTE_EDITOR_IMAGE_CHOOSER_PREFIX + id).Hide();
		}
		else {
			RTEEditorHideAllDropDowns(id);
			var editor = rteEditorMap[id];
			editor.selectionRange = editor.GetDocument().selection.createRange();
			eval(RTE_EDITOR_IMAGE_CHOOSER_PREFIX + id).Show(eval(RTE_EDITOR_SMILEY_BUTTON_PREFIX + id).offsetLeft+2, eval(RTE_EDITOR_TOOLBAR_PREFIX + id).offsetTop+30);

		}
	}

	function RTEEditorOnEndInsertSmiley(image, id)
	{
	    if (!RTEEditorValidateMode(id)) {
		return;
	    }
	    var imgTag = '<img src="' + image + '">';
	    var editor = rteEditorMap[id];
	    var bodyRange = editor.GetDocument().body.createTextRange();
	    if (bodyRange.inRange(editor.selectionRange)) {
		editor.selectionRange.pasteHTML(imgTag);
		editor.Focus();
	    }
	    else {
		editor.GetDocument().body.innerHTML += imgTag;
		editor.selectionRange.collapse(false);
		editor.selectionRange.select();
	    }
	}

	function RTEEditorOnFont(id, select)
	{
		RTEEditorFormat(id, "fontname", select);
	}

	function RTEEditorOnSize(id, select)
	{
		RTEEditorFormat(id, "fontsize", select);
	}

	function RTEEditorOnFontDropDown(id)
	{
	    if (!RTEEditorValidateMode(id)) {
		    return;
	    }
	    RTEEditorToggleDropDown(id, RTE_EDITOR_FONT_PREFIX);
	}

	function RTEEditorOnSizeDropDown(id)
	{
	    if (!RTEEditorValidateMode(id)) {
		    return;
	    }
	    RTEEditorToggleDropDown(id, RTE_EDITOR_SIZE_PREFIX);
	}

	function RTEEditorOnForegroundTextColor(id)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		RTEEditorToggleDropDown(id, RTE_EDITOR_FORE_PREFIX);
	}

	function RTEEditorOnBackgroundTextColor(id)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		RTEEditorToggleDropDown(id, RTE_EDITOR_BACK_PREFIX);
	}

	function RTEEditorOnAlignment(id)
	{
	    if (!RTEEditorValidateMode(id)) {
		    return;
	    }
	    RTEEditorToggleDropDown(id, RTE_EDITOR_ALIGN_PREFIX);
	}

	function RTEEditorOnList(id)
	{
	    if (!RTEEditorValidateMode(id)) {
		    return;
	    }
	    RTEEditorToggleDropDown(id, RTE_EDITOR_LIST_PREFIX);
	}

	function RTEEditorOnViewHTMLSource(id, textMode)
	{
		var editor = rteEditorMap[id];
		editor.ViewHTMLSource(textMode);
	}

	function RTEEditorOnClick(id)
	{
		RTEEditorHideAllDropDowns(id);
	}

	function RTEEditorValidateMode(id)
	{
		var editor = rteEditorMap[id];
		if (!editor.textMode) {
			return true;
		}
		alert("Please uncheck the \"View HTML Source\" checkbox to use the toolbars.");
		editor.Focus();
		return false;
	}

	function RTEEditorFormat(id, what, opt)
	{
		if (!RTEEditorValidateMode(id)) {
			return;
		}
		if (opt == "removeFormat") {
			what = opt;
			opt = null;
		}
		RTEEditorHideAllDropDowns(id);
		var editor = rteEditorMap[id];
		editor.Focus();
		editor.Exec(what, opt);
	}

	function RTEEditorCleanHTML(id)
	{
		var editor = rteEditorMap[id];
		var fonts = editor.GetDocument().body.all.tags("FONT");
		for (var i = fonts.length - 1; i >= 0; i--) {
			var font = fonts[i];
			if (font.style.backgroundColor == "#ffffff") {
				font.outerHTML = font.innerHTML;
			}
		}
	}

	function RTEEditorGetElement(tagName, start)
	{
		while (start && start.tagName != tagName) {
			start = start.parentElement;
		}
		return start;
	}

	function RTEEditorSetBackgroundColor(color)
	{
	    this.GetDocument().body.style.backgroundColor = color;
	    this.backgroundColor = color;
	}

	function RTEEditorGetBackgroundColor()
	{
	    return this.backgroundColor;
	}

	function RTEEditorRemoveBackgroundColor(color)
	{
	    this.GetDocument().body.style.backgroundColor = "";
	    this.backgroundColor = "";
	}

	function RTEEditorSetBackgroundImage(url)
	{
	    this.GetDocument().body.style.backgroundImage = 'url(' + url + ')';
	    this.backgroundImage = url;
	}

	function RTEEditorGetBackgroundImage()
	{
	    return this.backgroundImage;
	}

	function RTEEditorRemoveBackgroundImage(url)
	{
	    this.GetDocument().body.style.backgroundImage = "none";
	    this.backgroundImage = "";
	}

	function RTEEditorSetForegroundColor(color)
	{
	    this.GetDocument().body.style.color = color;
	    this.foregroundColor = color;
	}

	function RTEEditorGetForegroundColor()
	{
	    return this.foregroundColor;
	}

	function RTEEditorRemoveForegroundColor(color)
	{
	    this.GetDocument().body.style.color = "";
	    this.foregroundColor = "";
	}

	function RTEEditorSetFontFamily(fontFamily)
	{
	    if (fontFamily == "") {
		fontFamily = RTE_EDITOR_DEFAULT_FONT_FAMILY;
	    }
	    this.GetDocument().body.style.fontFamily = fontFamily;
	    this.fontFamily = fontFamily;
	}

	function RTEEditorGetFontFamily()
	{
	    return this.fontFamily;
	}

	function RTEEditorRemoveFontFamily(font)
	{
	    this.GetDocument().body.style.fontFamily = RTE_EDITOR_DEFAULT_FONT_FAMILY;
	    this.fontFamily = RTE_EDITOR_DEFAULT_FONT_FAMILY;
	}

	function RTEEditorSetFontSize(fontSize)
	{
	    if (fontSize == "") {
		fontSize = RTE_EDITOR_DEFAULT_FONT_SIZE;
	    }
	    this.GetDocument().body.style.fontSize = fontSize;
	    this.fontSize = fontSize;
	}

	function RTEEditorGetFontSize()
	{
	    return this.fontSize;
	}

	function RTEEditorRemoveFontSize(font)
	{
	    this.GetDocument().body.style.fontSize = RTE_EDITOR_DEFAULT_FONT_SIZE;
	    this.fontSize = RTE_EDITOR_DEFAULT_FONT_SIZE;
	}

	function RTEEditorSetStationery(on)
	{
	    this.stationery = on;
	}

	function RTEEditorGetStationery()
	{
	    return this.stationery;
	}

	function RTEEditorInsertImage(image)
	{
	    var imgTag = '<img src="/ym/UploadImage?Data=' + image + '">';
	    this.GetDocument().body.innerHTML += imgTag;
	}

	function RTEEditorViewHTMLSource(textMode)
	{
	    this.textMode = textMode;
	    if (this.textMode) {
		    this.GetDocument().body.innerText = this.GetDocument().body.innerHTML;
	    }
	    else {
		    this.GetDocument().body.innerHTML = this.GetDocument().body.innerText;
	    }
	    this.Focus();
	}

	function RTEEditorUnload()
	{
	    if (this.stationeryWindow != null) {
		this.stationeryWindow.close();
	    }
	}

	function RTEEditorShowDropDown(id, prefix)
	{
	    rteEditorActive = id;
	    RTEEditorHideAllDropDowns(id);
	    RTEEditorPrepareDropDownContents(id, prefix);
	    eval(prefix + id).document.body.style.border = "#737373 solid 1px";
	    d.all[prefix + id].style.display = "inline";
	}

	function RTEEditorHideDropDown(id, prefix)
	{
	    d.all[prefix + id].style.display = "none";
	}

	function RTEEditorToggleDropDown(id, prefix)
	{
	    if (d.all[prefix + id].style.display == "none") {
		RTEEditorShowDropDown(id, prefix);
	    }
	    else {
		RTEEditorHideDropDown(id, prefix);
	    }
	}

	function RTEEditorHideAllDropDowns(id)
	{
	    var editor = rteEditorMap[id];
	    for (var i in editor.dropDownMap) {
		RTEEditorHideDropDown(id, i);
	    }
	    eval(RTE_EDITOR_IMAGE_CHOOSER_PREFIX + id).Hide();
	}

	function RTEEditorPrepareDropDownContents(id, prefix)
	{
	    var editor = rteEditorMap[id];
	    var dropDown = editor.dropDownMap[prefix];
	    if (dropDown.external) {
		if (d.all[prefix + id].src == "") {
		    d.all[prefix + id].src = dropDown.content;
		}
	    }
	    else {
		if (eval(prefix + id).document.body.innerHTML == "") {
		    eval(prefix + id).document.body.innerHTML = dropDown.content;
		}
	    }
	}

	function RTEEditorInitDropDowns(id)
	{
	    var editor = rteEditorMap[id];
	    editor.dropDownMap = new Object();
	    editor.dropDownMap[RTE_EDITOR_FONT_PREFIX] = {
		external: false,
		content: (
		    "<div onclick=\"parent.RTEEditorHideDropDown(" + id + ", '" + RTE_EDITOR_FONT_PREFIX + "')\">"
		    +
		    "<table width=100% cellpadding=5 cellspacing=0 border=0>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'arial');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Arial</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial narrow' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'arial narrow');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Arial Narrow</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial black' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'arial black');void(0);\" style=\"text-decoration:none;color:black;width:100%;width:100%;\">Arial Black</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='comic sans ms' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'comic sans ms');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Comic Sans MS</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='courier' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'courier');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Courier</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='system' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'system');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">System</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='times new roman' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'times new roman');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Times New Roman</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='verdana' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'verdana');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Verdana</a></font></td></tr>" 
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='wingdings' size=-1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnFont(" + id + ",'wingdings');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Wingdings</a></font></td></tr>" 
		    +
		    "</table>"
		    +
		    "</div>"
		)
	    };
	    editor.dropDownMap[RTE_EDITOR_SIZE_PREFIX] = {
		external: false,
		content: (
		    "<div onclick=\"parent.RTEEditorHideDropDown(" + id + ", '" + RTE_EDITOR_SIZE_PREFIX + "')\">"
		    +
		    "<table width=100% cellpadding=5 cellspacing=0 border=0>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=1><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'1');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 1</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=2><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'2');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 2</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=3><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'3');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 3</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=4><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'4');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 4</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=5><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'5');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 5</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=6><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'6');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 6</a></font></td></tr>"
		    +
		    "<tr><td onmouseover=\"this.style.backgroundColor='#dddddd';window.status='';return true;\" onMouseOut=\"this.style.backgroundColor='white';\"><font face='arial' size=7><a class=RTESelectItem href=\"javascript:parent.RTEEditorOnSize(" + id + ",'7');void(0);\" style=\"text-decoration:none;color:black;width:100%;\">Size 7</a></font></td></tr>"
		    +
		    "</table>"
		    +
		    "</div>"
		)
	    };
	    editor.dropDownMap[RTE_EDITOR_ALIGN_PREFIX] = {
		external: false,
		content: (
		    "<div onclick=\"parent.RTEEditorHideDropDown(" + id + ", '" + RTE_EDITOR_ALIGN_PREFIX + "')\">"
		    +
		    "<table width=100% border=0 cellspacing=0 cellpadding=2>"
		    +
		    "<tr><td><a href=javascript:parent.RTEEditorOnAlignLeft(0);void(0); style=\"text-decoration:none;color:black;\"><img src=editor_files/tb_justleft_1.gif style=\"border:1px solid white;\" onmouseover='this.style.border=\"1px solid black\";window.status=\"\";return true;' onmouseout='this.style.border=\"1px solid white\";\'></a></td><td style='font-family:Verdana;font-size:11px;'>Flush Left</td></tr>"
		    +
		    "<tr><td><a href=javascript:parent.RTEEditorOnCenter(0);void(0); style=\"text-decoration:none;color:black;\"><img src=editor_files/tb_justctr_1.gif style=\"border:1px solid white;\" onmouseover='this.style.border=\"1px solid  black\";window.status=\"\";return true;' onmouseout='this.style.border=\"1px solid white\";\'></td><td style='font-family:Verdana;font-size:11px;'>Centered</td></tr>"
		    +
		    "<tr><td><a href=javascript:parent.RTEEditorOnAlignRight(0);void(0); style=\"text-decoration:none;color:black;\"><img src=editor_files/tb_justright_1.gif style=\"border:1px solid white;\" onmouseover='this.style.border=\"1px solid black\";window.status=\"\";return true;' onmouseout='this.style.border=\"1px solid white\";\'></td><td style='font-family:Verdana;font-size:11px;'>Flush Right</td></tr>"
		    +
		    "</table>"
		    +
		    "</div>"
		)
	    };
	    editor.dropDownMap[RTE_EDITOR_LIST_PREFIX] = {
		external: false,
		content: (
		    "<div onclick=\"parent.RTEEditorHideDropDown(" + id + ", '" + RTE_EDITOR_LIST_PREFIX + "')\">"
		    +
		    "<table width=100% border=0 cellspacing=0 cellpadding=2>"
		    +
		    "<tr><td><a href=javascript:parent.RTEEditorOnNumberedList(0);void(0); style=\"text-decoration:none;color:black;\"><img src=editor_files/tb_listnum_1.gif style=\"border:1px solid white;\" onmouseover='this.style.border=\"1px solid black\";window.status=\"\";return true;' onmouseout='this.style.border=\"1px solid white\";\'></a></td><td style='font-family:Verdana;font-size:11px;'>Numbered List</td></tr>"
		    +
		    "<tr><td><a href=javascript:parent.RTEEditorOnBulletedList(0);void(0); style=\"text-decoration:none;color:black;\"><img src=editor_files/tb_listblt_1.gif style=\"border:1px solid white;\" onmouseover='this.style.border=\"1px solid  black\";window.status=\"\";return true;' onmouseout='this.style.border=\"1px solid white\";\'></td><td style='font-family:Verdana;font-size:11px;'>Bulleted List</td></tr>"
		    +
		    "</table>"
		    +
		    "</div>"
		)
	    };
	    editor.dropDownMap[RTE_EDITOR_FORE_PREFIX] = {
		external: true,
		content: "color2.php"
	    };
	    editor.dropDownMap[RTE_EDITOR_BACK_PREFIX] = {
		external: true,
		content: "color1.php"
	    };
	}

	function RTEEditorHaveAX()
	{
	    return false;
	    var o = null;
	    try {
		o = new ActiveXObject("YMailCompose.Compose");
	    }
	    catch (e) {
	    }
	    if (!o) {
		return false;
	    }
	    var version = o.getVersionNbr();
	    var required = "2004062402";
	    return version >= required;
	}

	function RTEEditorGetComposition()
	{
	    return this.haveAX ?
		document.all[RTE_EDITOR_COMPOSITION_PREFIX + this.id]
		: 
		eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id)
	}

	function RTEEditorGetDocument()
	{
	    return this.haveAX ?
		document.all[RTE_EDITOR_COMPOSITION_PREFIX + this.id].GetDocument()
		: 
		eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document
	}

	function RTEEditorExec(what, opt)
	{
	    if (this.haveAX) {
		document.all[RTE_EDITOR_COMPOSITION_PREFIX + this.id].Exec(
		    what, false, opt
		);
	    }
	    else {
		eval(RTE_EDITOR_COMPOSITION_PREFIX + this.id).document.execCommand(
		    what, false, opt
		);
	    }
	}

	function RTEEditorEvents(id, method, dispid, event, handled)
	{
	    if (event.type == "click") {
		RTEEditorOnClick(id);
	    }
	}
</script>


<script src="editor_files/zs1JPI51pk58iZKKGnH_ig--"></script>
<script src="editor_files/ac.js"></script>

<script type="text/javascript">

			var remote=null;
			var sigAttMap = [true];

			function OnFromAddrChange()
			{
				var i = document.Compose.FromAddr.selectedIndex;
				if (i >= 0 && i < sigAttMap.length) document.all.SA.checked = sigAttMap[i];
			}

			function rs(n,u,w,h,x)
			{
				args="width="+w+",height="+h+",resizable=yes,scrollbars=yes,status=0";
				remote=window.open(u,n,args);
				if(remote != null && remote.opener == null) remote.opener = self;
				if(x == 1) return remote;
			}

			function setFormat()
			{
			   if(document.Compose.Format.checked) document.Compose.Format.value="html";
			   else document.Compose.Format.value="plain";
			}

			function AttachFiles()
			{
					SetVals();
				document.Compose.ATT.value = "1";
				document.Compose.submit();
			}

			function RemoveAttachment(index)
			{
					SetVals();
				document.Compose.action += "&UNATTACH=File" + index;
				document.Compose.submit();
			}
	
			
				function Switch()
				{
						if(editor.GetText() != "" && editor.GetText() != editor.GetHTML()) 
						{
							var conf = confirm("This will convert your message into plain text.  All formatting will be lost.  Continue?");
							if(!conf) return; 
						}
				
						document.Compose.Body.value = editor.GetHTML();
					document.Compose.action = document.Compose.action + "&SWITCH=1";
					document.Compose.submit();
				}

				function KeyPress()
				{
				    if (event.keyCode == 13) {
					Send_Click();
				    }
				}
			

	
				function SetHtml()
				{
					//editor.SetHTML(document.Compose.PlainMsg.value);
				}
	
				function RestoreBackground()
				{
						editor.SetBackgroundImage(
							""
						);
					
	
	
				}
	
				function SetVals()
				{
					document.Compose.Body.value = editor.GetHTML();
				}
	
				function SetBGM()
				{
					editor.SetDomain("yahoo.com");
					document.domain = "yahoo.com";
					var BGM = BGMPlayer.formbgm;
					document.Compose.BGMid.value = BGM.bgmid.value;
					document.Compose.BGMtitle.value = BGM.bgmtitle.value;
					document.Compose.BGMinfo.value = BGM.bgminfo.value;
				}
	
				function SaveMsg()
				{
					//document.Compose.PlainMsg.value = editor.GetHTML();
				}
	
				function SetBackground(ref, desc, def, fg, ff, fs, solid, custom)
				{
					document.Compose.BGRef.value = ref;
					document.Compose.BGDesc.value = desc;
					document.Compose.BGDef.value = def;
					document.Compose.BGFg.value = fg;
					document.Compose.BGFF.value = ff;
					document.Compose.BGFS.value = fs;
					document.Compose.BGSolid.value = solid ? "1" : "0";
					document.Compose.BGCustom.value = custom ? "1" : "0";
				
					if(solid) editor.SetBackgroundColor(ref);
					else editor.SetBackgroundImage(custom ? ("/ym/Stationery?Data=" + ref + "&UrlExtras") : ref);
				
					editor.SetForegroundColor(fg);
					editor.SetFontFamily(ff);
					editor.SetFontSize(fs);
				}
			
				function RemoveBackground()
				{
					document.Compose.BGRef.value = "";
					document.Compose.BGSolid.value = "";
					document.Compose.BGCustom.value = "";
					editor.RemoveBackgroundColor();
					editor.RemoveBackgroundImage();
					editor.RemoveForegroundColor();
					editor.RemoveFontFamily();
					editor.RemoveFontSize();
				}
			
				function GetBackground()
				{
					return{
						ref: document.Compose.BGRef.value,
						desc: document.Compose.BGDesc.value,
						def: document.Compose.BGDef.value,
						fg: document.Compose.BGFg.value,
						ff: document.Compose.BGFF.value,
						fs: document.Compose.BGFS.value,
						solid: document.Compose.BGSolid.value == "1",
						custom: document.Compose.BGCustom.value == "1"
					};
				}
			
			    var oldBackground = null;
			
				function SaveOldBackground()
				{
					oldBackground = GetBackground();
				}
			
				function RestoreOldBackground()
				{
					if(oldBackground)
					{
						RemoveBackground();
						SetBackground(oldBackground.ref,oldBackground.desc,oldBackground.def,oldBackground.fg,oldBackground.ff,oldBackground.fs,oldBackground.solid,oldBackground.custom);
					}
				}
			
				function InsertImage(image)
				{
					editor.InsertImage(image);
					document.Compose.UplImg.value = "1";
				}
				

			function Send_Click()
			{
				//PostProcess ();

				var oForm = document.Compose;
			
				SetVals();

				//if ( typeof AC_PostProcess == "function" )
					//AC_PostProcess();
			
				oForm.submit();
			}

			function SaveDraft_Click(p_oSender)
			{
				PostProcess ();

				var oForm = p_oSender.form;
			
				SetVals();
	
				
				oForm.SD.value = p_oSender.value;
				oForm.submit();
			}

			function SpellCheck_Click(p_oSender)
			{
				PostProcess ();

				var oForm = p_oSender.form;
				SetVals();
	
				oForm.SC.value = p_oSender.value;
				oForm.submit();
			}

			function Cancel_Click(p_oSender)
			{
				PostProcess ();

				var oForm = p_oSender.form;
				oForm.CAN.value = p_oSender.value;
				oForm.submit();
			}			
			
			function PostProcess () {
				CleanRecipientValue ( "tofield" );
				CleanRecipientValue ( "ccfield" );
				CleanRecipientValue ( "bccfield" );
			}

			function CleanRecipientValue ( fieldID ) {
				var field = document.getElementById( fieldID );
				if ( field == null || field.value == null || field.value.length == 0 )
					return;

				// works whether we're using INPUTs or TEXTAREAs:
				field.value = field.value.replace ( /(\n\r|\r\n|\s)/g, " " ).replace ( /;/g, "," );
					// this will slam semi-colons inside names
			}

			

			function OnLoad()
			{
			    setTimeout("Initialize()", 100);
			}

			function Initialize()
			{

				InstallFieldUpdater ( "tofield" );
				InstallFieldUpdater ( "ccfield" );
				InstallFieldUpdater ( "bccfield" );

				if ( typeof AC_OnLoad == "function" )
					AC_OnLoad();
				
					document.getElementById('tofield').focus();
				
					SetHtml();
					RestoreBackground();
			
				document.Compose.ATT.value = "";
			}
		
	function InstallFieldUpdater ( field ) {

		if ( typeof field == "string" ) field = document.getElementById ( field );
		if ( field == null || field.tagName != "TEXTAREA" )
			return;

		if ( field.attachEvent ) { // IE
			field.attachEvent ( "onfocus", DoUpdateFieldHeight );
			field.attachEvent ( "onkeyup", DoUpdateFieldHeight );
			field.attachEvent ( "onmouseup", DoUpdateFieldHeight );
			field.attachEvent ( "onselect", DoUpdateFieldHeight );

			field.attachEvent ( "oncut", DoUpdateFieldHeight );
			field.attachEvent ( "onpaste", DoUpdateFieldHeight );

		} else if ( field.addEventListener ) { // Moz/W3
			field.addEventListener ( "focus", DoUpdateFieldHeight, true );
			field.addEventListener ( "keyup", DoUpdateFieldHeight, true );
			field.addEventListener ( "mouseup", DoUpdateFieldHeight, true );
			field.addEventListener ( "select", DoUpdateFieldHeight, true );
		}
	}

	function DoUpdateFieldHeight ( evt ) {
		if ( evt == null ) evt = window.event;
		if ( evt == null ) return;
		var target = ( evt.srcElement ? evt.srcElement : evt.target );
		if ( target == null ) return;

		// allow layout changes to settle:
		setTimeout ( "UpdateFieldHeight('" + target.id + "')", 10 );
	}

	function UpdateFieldHeight( field, maxHeight ) {

		if ( typeof field == "string" ) field = document.getElementById ( field );
		if ( field == null || field.tagName != "TEXTAREA" )
			return;


		if ( maxHeight == null ) maxHeight = 200;

		var clientHeight = parseInt( field.clientHeight );
		var scrollHeight = parseInt( field.scrollHeight );

		if (( Math.abs( clientHeight - scrollHeight ) > 4 ) ||
				( clientHeight < scrollHeight )) { // second case added to clear up problems where the text area
												   // initializes to slightly smaller than the appropriate height

			scrollHeight += 4; // TEXTAREA frame

			if ( ( maxHeight != null ) && ( scrollHeight > maxHeight ) )
				scrollHeight = maxHeight;

			if ( scrollHeight != field.offsetHeight )
				field.style.height = scrollHeight + "px";
		}
	}

	function DisplayElement ( elt, displayValue ) {
		if ( typeof elt == "string" )
			elt = document.getElementById( elt );
		if ( elt == null ) return;

		if ( oBw && oBw.ns6 ) {
			// OTW table formatting will be lost:
			if ( displayValue == "block" && elt.tagName == "TR" )
				displayValue = "table-row";
			else if ( displayValue == "inline" && elt.tagName == "TR" )
				displayValue = "table-cell";
		}

		elt.style.display = displayValue;
	}

	function AddCC ( doFocus ) {
		DisplayElement ( "ccrow", "block" );
		DisplayElement ( "cclink", "none" );
		DisplayElement ( "cclink2", "inline" );
		
		if ( doFocus )
		{
			var field = window.document.getElementById( "ccfield" );
			if ( field != null )
				field.focus();
		}
	}

	function RemoveCC () {
		if ( document.Compose.ccfield.value != "" )
			if ( !confirm ( "Remove all CC addresses you've entered?" ) )
				return;

		document.Compose.ccfield.value = "";
		UpdateFieldHeight ( document.Compose.ccfield );

		DisplayElement ( "ccrow", "none" );
		DisplayElement ( "cclink2", "none" );
		DisplayElement ( "cclink", "inline" );

		document.Compose.tofield.focus();
	}

	function AddBCC ( doFocus ) {
		DisplayElement ( "bccrow", "block" );
		DisplayElement ( "bcclink", "none" );
		DisplayElement ( "bcclink2", "inline" );

		if ( doFocus )
		{
			var field = window.document.getElementById( "bccfield" );
			if ( field != null )
				field.focus();
		}
	}

	function RemoveBCC () {
		if ( document.Compose.bccfield.value != "" )
			if ( !confirm ( "Remove all BCC addresses you've entered?" ) )
				return;

		document.Compose.bccfield.value = "";
		UpdateFieldHeight ( document.Compose.bccfield );

		DisplayElement ( "bccrow", "none" );
		DisplayElement ( "bcclink2", "none" );
		DisplayElement ( "bcclink", "inline" );

		document.Compose.tofield.focus();
	}
function showDialog(vLink, vWidth, vHeight)
{
return showWindow(vLink, false, false,false, false, false, false, true, false, vWidth, vHeight, 0, 0);
}

function showWindow(vLink, vStatus, vResizeable, vScrollbars, vToolbar, vLocation, vFullscreen, vTitlebar, vCentered, vWidth, vHeight, vTop, vLeft)
{
var sLink = (typeof(vLink.href) == 'undefined') ? vLink : vLink.href;

winDef = '';
winDef = winDef.concat('status=').concat((vStatus) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('resizable=').concat((vResizeable) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('scrollbars=').concat((vScrollbars) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('toolbar=').concat((vToolbar) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('location=').concat((vLocation) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('fullscreen=').concat((vFullscreen) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('titlebar=').concat((vTitlebar) ? 'yes' : 'no').concat(',');
winDef = winDef.concat('height=').concat(vHeight).concat(',');
winDef = winDef.concat('width=').concat(vWidth).concat(',');

if (vCentered)
{
	winDef = winDef.concat('top=').concat((screen.height - vHeight)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - vWidth)/2);
}
else
{
	winDef = winDef.concat('top=').concat(vTop).concat(',');
	winDef = winDef.concat('left=').concat(vLeft);
}

open(sLink, '_blank', winDef);

if (typeof(vLink.href) != 'undefined')
{
	return false;
}
}	
</script>
<script for="window" event="onunload" language="javascript">
				editor.Unload();
</script>		