<? // advanced
//elements: "ara0,ara1",
//< ? for($i=1;$i<$ktk;$i++){echo ",ara".$i."";}  ? >
 ?>
<script type="text/javascript" src="tiny_mce_gzip.js"></script>
<script type="text/javascript">
    tinyMCE_GZ.init({
        themes : 'advanced',
        disk_cache : false,
        languages:"ru",
        debug : false
    });
</script>
<script type="text/javascript">
    tinyMCE.init({
        mode:"exact",
        theme:"advanced",
		debug : false,
		disk_cache : false,
		language: "ru",
		elements: "txt1,txt2",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",

			
	 	
	    theme_advanced_buttons1 : "save,|,code,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect",
		theme_advanced_buttons2 : "fontselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist",
		theme_advanced_buttons3 : "|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,help",
		theme_advanced_buttons5 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_buttons6 : "sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,newdocument,|,fullscreen",
		

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		// Style formats
		style_formats : [
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		]


	
		
    });
</script>
