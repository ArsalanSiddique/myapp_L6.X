/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');
require('tinymce/themes/silver');
require('tinymce/plugins/image');
require('tinymce/plugins/imagetools');
require('tinymce/plugins/code');
import tinymce from 'tinymce';
tinymce.init({
	selector: 'textarea#inputCategoryContent',
	plugins: 'image imagetools code',
	height: 400,
	skin: false,
	content_css: false,
	
})