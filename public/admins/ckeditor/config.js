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
// console.log(window.location);
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// config.skin = 'moono';
	config.toolbarCanCollapse = true;
	config.extraPlugins = 'mathjax';
	// config.mathJaxLib = window.location.origin+'/admins/ckeditor/mathjax.js?config=TeX-AMS_HTML';
	config.mathJaxLib = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML';
	config.mathJaxClass = 'equation';
	// config.extraPlugins = 'mathjax,toolbar,accordionList';
	config.filebrowserBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html";
	config.filebrowserImageBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html?type=Images";
	// config.filebrowserFlashBrowseUrl = "/admins/ckeditor/ckfinder/ckfinder.html?type=Flash";
	// config.filebrowserUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
	// config.filebrowserImageUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
	// config.filebrowserFlashUploadUrl = "/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";
	config.toolbarGroups = [

		// { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		// { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		// { name: 'forms', groups: [ 'forms' ] },
		// '/',
		{ name: 'basicstyles', groups: [ 'basicstyles' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		// '/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		// { name: 'tools', groups: [ 'tools' ] },
		// { name: 'others', groups: [ 'others' ] },
		// { name: 'about', groups: [ 'about' ] }
		{ name: 'document', groups: [ 'bootstrapTable', 'mode', 'document' ] },

	];

	config.removeButtons = 'Anchor,CreateDiv,Blockquote,Save,NewPage,Print,Preview,Font,Flash,Smiley,Styles,PageBreak,HorizontalRule,Iframe,Tab,UploadWidget,UploadFile,UploadImage';
};
