/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'wordcount';
	config.wordcount = {

		// Whether or not you want to show the Word Count
		showCharCount: true,
	};

	config.language = 'th';
	//config.uiColor = '#AADC6E';

	config.extraPlugins = 'image';
	config.filebrowserUploadUrl = '/backoffice/ckupload.php';
	config.image_removeLinkByEmptyURL = true;
	config.image_previewText = CKEDITOR.tools.repeat('ตัวอย่างรูปภาพ ', 100);
};
