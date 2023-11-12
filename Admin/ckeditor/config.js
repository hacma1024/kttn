/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config )
{
	
	config.toolbar = [
   ['Source',/*'Preview',*/'Templates'],
   ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'/*, 'SpellChecker', 'Scayt'*/],
   ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
   '/',
   ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
   ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
   ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   /*['BidiLtr', 'BidiRtl' ],*/
   ['Link','Unlink','Anchor'],
   ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
   '/',
   ['Styles','Format','Font','FontSize'],
   ['TextColor','BGColor'],
   ['Maximize'/*,'ShowBlocks','Syntaxhighlight'*/]
                      ]
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	var ddan='ckeditor/';
    config.filebrowserBrowseUrl= ddan+'ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl= ddan+'ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl= ddan+'ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl= ddan+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl= ddan+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl= ddan+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
