
$(document).ready(function(){

    tinymce.init({
		selector: 'textarea#content',
		height: 350,
		width:"",
		plugins: [
			"codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
		],
		toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
		toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
		image_advtab: true,
		image_advtab: true,
		menubar: false,
		toolbar_items_size: 'small',

        relative_urls: false, 
        remove_script_host : false,
		external_filemanager_path: "http://localhost/learnyii/file/",
		external_plugins: { 
			"filemanager" : "http://localhost/learnyii/file/plugin.min.js",
			"codemirror": "http://localhost/learnyii/backend/web/tinymce/plugins/codemirror/plugin.js"
		},
  //   	filemanager_access_key:csrf(),
  		content_css: '//www.tinymce.com/css/codepen.min.css'
    });

	tinymce.init({
		 selector: 'textarea#desc',
		 toolbar_items_size: 'small',
		 height: 250,
		 width:"",
		 menubar: false,
		 plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
		],
		toolbar1: "undo redo bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote link unlink anchor image media | preview | forecolor backcolor fullscreen code",
		image_advtab: true,
		menubar: false,
		toolbar_items_size: 'small',

        relative_urls: false,
        remove_script_host : false,
		external_filemanager_path: rootUrl()+"/file/",
		external_plugins: { 
			"filemanager" : rootUrl()+"/file/plugin.min.js",
			"codemirror": rootUrl()+"/backend/web/tinymce/plugins/codemirror/plugin.js"
		},
  //   	filemanager_access_key:csrf(),
  		content_css: '//www.tinymce.com/css/codepen.min.css'

	});

  	$("a#select-img").click(function(event){
  		
  		event.preventDefault();

        $("#modal-image-book").modal("show");
        $("#modal-image-book").on('hide.bs.modal', function () {
	   		 var imgUrl = $('input#image').val();
	   		 $('img#show-image').attr('src', imgUrl);
	   		 $("img#show-image").addClass("show-image");
			//$("img#show-image").attr('src', imgUrl);
    	});
    });

    $("a#remove-img").click(function(event){
  		
  		event.preventDefault();

        $('input#image').val('');
	   	$('img#show-image').attr('src', '');
	   	$('img#show-image').removeClass("show-image");
    });

  	$("img.lazy-loaded").click(function (argument) {
  		alert(15);
  	});

  	/*$('input#image').click(function () {
		// body...
		$('#modal-image-book').modal();

	});
	$('#modal-image-book').on('hide.bs.modal', function () {
			// body...
			var imgUrl = $('input#image').val();
			$('img$show-image').attr('src', imgUrl);
	
		});*/
});﻿

    

	

/*
	jQuery(document).ready(function($) {
		$('#show-media').click(function() {
			$('#media-modal').modal('show');
			// $('input#image').attr('value','sá');;
			$('#media-modal').on('hide.bs.modal',function(){
				var imgUrrl = $('#image').val();
				$('img#show-img').attr('src',imgUrrl);
				$('input#image').attr('value',imgUrrl);;
				// alert(imgUrrl);
			});
		});
	});
	*/