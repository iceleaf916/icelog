tinyMCE.init({
    mode : "textareas",
    theme : "advanced",
	plugins : "pagebreak,advhr,advimage,advlink,inlinepopups,media,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,syntaxhl",

	// Theme options
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor,|,pagebreak,|,syntaxhl",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	relative_urls : false,
	remove_script_host: false,
    height: 300,
    remove_linebreaks : false, 
    extended_valid_elements : "textarea[cols|rows|disabled|name|readonly|class]"
});
