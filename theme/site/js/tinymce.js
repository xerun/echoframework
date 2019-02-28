	tinymce.init({
		mode : "specific_textareas",
		editor_selector : "tmce",
		width: '98%',
		height: 500,
		theme: 'modern',
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor responsivefilemanager colorpicker textpattern imagetools codesample toc help'
		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
		image_advtab: true,
		external_filemanager_path:"/echo/theme/site/plugins/filemanager/",
		filemanager_title:"Filemanager" ,
		filemanager_access_key:"echotinymcefiles",
		external_plugins: { "filemanager" : "/echo/theme/site/plugins/filemanager/plugin.min.js"},
		templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		]
	});

