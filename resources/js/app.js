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
	plugins: 'image code',
	height: 400,
	skin: false,
	content_css: false,
	image_title: true,
	
  	/* we override default upload handler to simulate successful upload*/
  	images_upload_handler: function (blobInfo, success, failure) {
	    
	    // setTimeout(function () {
	    //	 /* no matter what you upload, we will turn it into TinyMCE logo :)*/
	    // 		success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
	    // }, 2000);
		let formData = new FormData();
		formData.append('file', blobInfo.blob());
	    axios.post('/admin/upload', formData)
	    	.then(function(res) {
	    		success(res.data.location);
	    	}
	    );
  	}
})