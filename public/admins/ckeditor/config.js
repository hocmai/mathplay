/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/** config.plugins = '
dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,notification,button,toolbar,clipboard,
panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,copyformatting,div,resize,elementspath,
enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,
horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,
link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,
showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,undo,wsc,backgrounds,lineutils,
widgetselection,widget,autoplaceholder,balloonpanel,a11ychecker,ccmsacdc,xml,ajax,allmedias,allowsave,base64image,bgimage,bbcode,
btbutton,bt_table,btquicktable,collapsibleItem,accordionList,glyphicons,btgrid,bootstrapVisibility,bootstrapTable,bootstrapTabs,
ckawesome,ckeditor_fa,cleanuploader,pbckcode,codesnippet,cssanim,filetools,gg,imagerotate,imageresizerowandcolumn,imageresize,
imagepaste,imagebrowser,imgbrowse,simage,imageuploader,imageCustomUploader,internallink,mediaembed,notificationaggregator,embedbase,
embed,tliyoutube2,tliyoutube,pasteFromGoogleDoc,pastebase64,slideshow,tableresize,tableresizerowandcolumn,uicolor,uploadwidget,
uploadfile,uploadimage,videoembed,youtube,htmlbuttons,autolink,autosave';


**/
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// config.skin = 'moono';
	config.toolbarCanCollapse = true;
	// config.extraPlugins = 'toolbar,accordionList';
	config.filebrowserBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html";
	config.filebrowserImageBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html?type=Images";
	config.filebrowserFlashBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html?type=Flash";
	config.filebrowserUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
	config.filebrowserImageUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
	config.filebrowserFlashUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'paragraph', groups: [ 'list', 'blocks', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'document', groups: [ 'bootstrapTable', 'document', 'mode' ] }
	];

	config.removeButtons = 'Anchor,CreateDiv,Blockquote,Save,NewPage,Print,Preview,Font,Flash,Smiley';
};
