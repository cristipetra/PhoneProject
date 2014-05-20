$(document).ready(function(){

	$('#main-tabs .nav a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	/*CUSTOM CODE TABS*/
	$('#tabs1 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('#tabs1 > li:first').addClass('active');
	/*$('#customHtm .tab-content .tab-pane:first').addClass('active');*/
	$('#RevoMain .tab-content .tab-pane:first').addClass('active');

	$('#customMenu .nav-tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#RGen-ddMenu-tab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#customMenuItems a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#customHtmlMenu a:first').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('#customHtmlMenu li:first').addClass('active');
	$('#RGen-htmlMenu .tab-content .tab-pane:first').addClass('active');
	
	$('#custom-ft a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#theme_tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#customCode a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#slideshowCaption a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('#slideshowCaption li:first, #RGen-cap1 li:first, #RGen-cap2 li:first').addClass('active');
	$('#slideshowCaption .tab-content .tab-pane:first, #RGen-cap1 .tab-content .tab-pane:first, #RGen-cap2 .tab-content .tab-pane:first').addClass('active');
	

	$('#widgetID').live('click', function() {
		$('.widget-popup').dialog({
			dialogClass: "widgetid-popup",
			open: function(event, ui) {},
			title: 'widget ID',
			bgiframe: false,
			width: 900,
			height: 750,
			resizable: false,
			modal: false,
			closeOnEscape: true
		});	
	});
	
	$('.capcss').live('click', function() {
		$('.CSS-structure').dialog({
			dialogClass: "CSS-structure-popup",
			open: function(event, ui) {},
			title: 'Caption style CSS structure',
			bgiframe: false,
			width: 500,
			height: 300,
			resizable: false,
			modal: false,
			closeOnEscape: true
		});	
	});

	// RADIO BUTTONS
	$('body').on('click', '.btn-group .btn', function (e) {
		if (!this) return e.preventDefault(); // stops modal from being shown
		$(this).button();
	})


	// HELP BUTTONS
	$(window).on("click", ".helpbtn, .sethelp", function(){
		if($(this).attr("data-type") == "img"){
			Messi.img($(this).attr("data-info"), {modal: true, modalOpacity: 0.5});	
		}
		if($(this).attr("data-type") == "info"){
			new Messi($(this).attr("data-info"), {
				title: $(this).attr('data-title')?$(this).attr('data-title'):'Help', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		}
		if($(this).attr("data-type") == "page"){
			console.log($(this).attr("data-info"));
			Messi.load($(this).attr("data-info"), {
				title: $(this).attr('data-title')?$(this).attr('data-title'):'Help', titleClass: 'msg-title', modal: true, modalOpacity: 0.5, width:'800px',
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		}
	});

	/* AUTO TAB SETUP */
	/*var T = 0;
	var CT = 0;
	var CP = 0;
	$('.content-tab').each(function(){
		T++
		var createCls = 'cTab'+T;
		$(this).addClass(createCls);
		
		var newCls = '.cTab'+ T + ' > .nav-tabs a';
		//var newClsPane = '.cTab'+T + ' .tab-content';
		$(newCls).click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
	});*/
});

function colorPicker(obj, format){
	$(obj).each(function() {
		$(this).spectrum({
			appendTo: $(this).parent(),
			preferredFormat: format,
			showAlpha: true,
			showInput: true,
			showPalette: true,
			palette: [["rgba(0, 0, 0, 0.5)", "rgb(255, 255, 255, 0.5)"]]
		});
	});
}