<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<link rel='stylesheet' type='text/css' href='../catalog/view/theme/rgen-opencart/stylesheet/owl.carousel.css' />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/stylesheet/snippets.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/stylesheet/grids.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/stylesheet/nivo-slider.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/messi.min.css" />

<style type="text/css">
@font-face {
font-family: 'rgenregular';
src: url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.eot');
src: url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.eot?#iefix') format('embedded-opentype'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.woff') format('woff'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.ttf') format('truetype'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.svg#rgenregular') format('svg');
font-weight: normal;
font-style: normal;
}
.blockMsg { top: 15% !important; background: url(view/image/rgen_theme/ajax-loader.gif) no-repeat center 25px;  }
</style>
<script type="text/javascript" src="../catalog/view/theme/rgen-opencart/js/plugins.js"></script>
<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<div id="content" class="rgen-custom-html" style="opacity:0">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box" id="main-wrapper">
		<!-- MAIN TABS START -->
		<div class="navbar" id='main-tabs'>
			<div class="navbar-inner">
				<span class="brand">R.Gen Theme<b><?php if (isset($version)) { echo $version; }else{ echo $ver; } ?></b></span>
				<ul class="nav">
					<li class="active"><a href="#customHtm">CUSTOM HTML</a></li>
					<li><a href="#snippet">CODE GENERATOR</a></li>
				</ul>
				<div class="buttons pull-right" style="margin-top: 7px; margin-right: -5px;">
					<a onclick="image_upload('RGen_custom', 'RGen_custom');" class="btn">Upload image</a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn">Back</a>
				</div>
			</div>
		</div>

		<!-- <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" > -->
		<form id="form" enctype="multipart/form-data">
			<div class='tab-content main-panes'>
				<div id="customHtm" class="tab-pane active">
					<div class="tabs-left tabbable" data-theme="tab1">
						<a class='btn btn-success btn-large create-btn' id="module-add"><i class="icon-plus icon-white"></i> <?php echo $button_add_module; ?></a>
						<ul id="custom-mods" class="nav nav-tabs">
							<?php $i = 0; foreach ($modules as $module) { ?>
							<li class="tab-module-<?php echo $i; ?>">
								<a data-tab="#tab-module-<?php echo $i; ?>" data-id="<?php echo $module['mod_id']; ?>" data-url="index.php?route=module/rgen_custom/getmodule&token=<?php echo $token; ?>&mod_name=<?php echo $module['mod_id']; ?>" id="module-<?php echo $i; ?>">
									<?php if(isset($module['modName']) && $module['modName'] != "") { ?>
									<b><?php echo $module['modName']; ?></b>
									<?php } else { ?>
									<b><?php echo $tab_module . ' ' . $i; ?></b>
									<?php } ?>
									<span class='btn btn-danger btn-mini custom-mod-remove'>&times;</span>
								</a>
							</li>
							<?php $i++; } ?>
						</ul>
						<div class="tab-content customContentPanes custom-mod-wrp" style="min-height:1200px;">
							<div id="custom-mod-data" class="lng-tab"></div>
							<div id="custom-mod-create"></div>
						</div>
					</div>
				</div>
				<div id="snippet" class="tab-pane">
					<div class="tabs-left tabbable" data-theme="tab1">
						<ul id="tabs2" class="nav nav-tabs">
							<li class="active"><a href="#snippet-1">Masonry grid</a></li>
							<li><a href="#snippet-2">Slider</a></li>
							<li><a href="#snippet-3">Nivo slider</a></li>
							<li><a href="#snippet-4">Collage plus banners</a></li>
							<li><a href="#snippet-5">Tabs</a></li>
							<li><a href="#snippet-6">Banner grids</a></li>
							<li><a href="#snippet-7">Content boxes</a></li>
						</ul>
						<div class="tab-content">
							<div class="alert alert-info">
								Copy generated code from code pane below and use that code anyware.
							</div>
							<div id="snippet-1" class="tab-pane active masonry">
								<?php include "rgen_custom_masonry.php" ?>
							</div>
							<div id="snippet-2" class="tab-pane slidejs">
								<?php include "rgen_custom_slidejs.php" ?>
							</div>
							<div id="snippet-3" class="tab-pane nivojs">
								<?php include "rgen_custom_nivo.php" ?>
							</div>
							<div id="snippet-4" class="tab-pane collageplusjs">
								<?php include "rgen_custom_collageplus.php" ?>
							</div>
							<div id="snippet-5" class="tab-pane tabjs">
								<?php include "rgen_custom_tabs.php" ?>
							</div>
							<div id="snippet-6" class="tab-pane bannergrid">
								<?php include "rgen_custom_banners.php" ?>
							</div>
							<div id="snippet-7" class="tab-pane contentboxcode">
								<?php include "rgen_custom_contentbox.php" ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>
<link rel='stylesheet' href='view/stylesheet/spectrum.css' />
<script src='view/javascript/rgen/spectrum.js'></script>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script src="view/javascript/rgen/jquery.blockUI.js"></script>
<script src="view/javascript/rgen/messi.min.js"></script>

<script type="text/javascript"><!--

$('body').prepend('<div class="loading">Loading...</div>');

$(document).ready(function(){
	$('#content').css({display:'block'});
	$('#content').animate({opacity: 1}, 500, function(){ $('.loading').css({display:"none"}); });
});

// Custom sticky content option display
function custOptions(custOption){
	$(window).on("change", ".pos-select select", function(){
		var pos = $(this).find('option:selected').val();
		if(pos == 's_right' || pos == 's_left' ){
			$(custOption).find(".cust-options").css({display:'block'});
		}else{
			$(custOption).find(".cust-options").css({display:'none'});
		}
	});

	/*$('.rgb').each(function(index, element) {
		$(this).colorpicker({
			hsv:false,
			alpha:true,
			colorFormat: ['RGBA'],
			showNoneButton:true,
			select: function(event, color) {
						$(this).val(color.formatted);
						$(this).next().css({backgroundColor: color.formatted});
					}
		});
		
		$(this).click(function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
	});*/
}



// Page specific content display
function layoutSelect(){
	$(window).on("change", ".layout-select select", function(){
		var vl = $(this).val();
		var nxtObj = $(this).parent().parent().parent().parent().find(".pos-select");
		var custOptions = $(this).parent().parent().parent().parent().find(".cust-options");
		if(vl == 99999){
			nxtObj.find("option::nth-child(-n+4)").css({display:"none"});
			nxtObj.find("option::nth-child(5)").attr("selected", "selected");
			if(nxtObj.find("select").val() == 's_right' || nxtObj.find("select").val() == 's_left') {
				custOptions.css({display:'block'});
			}else{
				custOptions.css({display:'none'});
			}
		} else {
			nxtObj.find("option::nth-child(-n+4)").css({display:"block"});
			nxtObj.find("option::nth-child(1)").attr("selected", "selected");
			custOptions.css({display:'none'});
		}
		
		// Category
		var route = $(this).find(this + "[selected='selected']").attr('data-route');
		if (route == 'product/category') {
			$(this).parent().parent().parent().parent().find(".cat-select-wrp").css({display:'block'});
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .btn-group input:radio").first().attr("checked", true);
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .btn-group label").first().addClass("active");
		}else{
			$(this).parent().parent().parent().parent().find(".cat-select-wrp").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .btn-group input:radio").attr("checked", false);
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .selected-cat > input:text").val('');
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .btn-group label").removeClass("active");
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .selected-cat").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".cat-select-wrp .selected-cat .scrollbox div").remove();
		}

		// Product
		var route = $(this).find(this + "[selected='selected']").attr('data-route');
		if (route == 'product/product') {
			$(this).parent().parent().parent().parent().find(".prd-select-wrp").css({display:'block'});
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .btn-group input:radio").first().attr("checked", true);
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .btn-group label").first().addClass("active");
		}else{
			$(this).parent().parent().parent().parent().find(".prd-select-wrp").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .btn-group input:radio").attr("checked", false);
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .selected-prd > input:text").val('');
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .btn-group label").removeClass("active");
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .selected-prd").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".prd-select-wrp .selected-prd .scrollbox div").remove();
		}

		// Brands
		var route = $(this).find(this + "[selected='selected']").attr('data-route');
		if (route == 'product/manufacturer') {
			$(this).parent().parent().parent().parent().find(".brand-select-wrp").css({display:'block'});
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .btn-group input:radio").first().attr("checked", true);
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .btn-group label").first().addClass("active");
		}else{
			$(this).parent().parent().parent().parent().find(".brand-select-wrp").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .btn-group input:radio").attr("checked", false);
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .selected-brand > input:text").val('');
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .btn-group label").removeClass("active");
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .selected-brand").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".brand-select-wrp .selected-brand .scrollbox div").remove();
		}

		// Information
		var route = $(this).find(this + "[selected='selected']").attr('data-route');
		if (route == 'information/information') {
			$(this).parent().parent().parent().parent().find(".info-select-wrp").css({display:'block'});
			$(this).parent().parent().parent().parent().find(".info-select-wrp .btn-group input:radio").first().attr("checked", true);
			$(this).parent().parent().parent().parent().find(".info-select-wrp .btn-group label").first().addClass("active");
		}else{
			$(this).parent().parent().parent().parent().find(".info-select-wrp").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".info-select-wrp .btn-group input:radio").attr("checked", false);
			$(this).parent().parent().parent().parent().find(".info-select-wrp .selected-info > input:text").val('');
			$(this).parent().parent().parent().parent().find(".info-select-wrp .btn-group label").removeClass("active");
			$(this).parent().parent().parent().parent().find(".info-select-wrp .selected-info").css({display:'none'});
			$(this).parent().parent().parent().parent().find(".info-select-wrp .selected-info .scrollbox div").remove();
		}
		

	});

	// Category
	$(window).on("click", ".cat-selection .btn-group input", function(){
		if($(this).val() == 'selc'){
			$(this).parent().parent().parent().find('.selected-cat').css({display:'block'});
		}else{
			$(this).parent().parent().parent().find('.selected-cat').css({display:''});
			$(this).parent().parent().parent().find('.selected-cat .scrollbox div').remove();
		}
	});

	// Product
	$(window).on("click", ".prd-selection .btn-group input", function(){
		if($(this).val() == 'selp'){
			$(this).parent().parent().parent().find('.selected-prd').css({display:'block'});
		}else{
			$(this).parent().parent().parent().find('.selected-prd').css({display:''});
			$(this).parent().parent().parent().find('.selected-prd .scrollbox div').remove();
		}
	});

	// Brands
	$(window).on("click", ".brand-selection .btn-group input", function(){
		if($(this).val() == 'selb'){
			$(this).parent().parent().parent().find('.selected-brand').css({display:'block'});
		}else{
			$(this).parent().parent().parent().find('.selected-brand').css({display:''});
			$(this).parent().parent().parent().find('.selected-brand .scrollbox div').remove();
		}
	});

	// Information
	$(window).on("click", ".info-selection .btn-group input", function(){
		if($(this).val() == 'seli'){
			$(this).parent().parent().parent().find('.selected-info').css({display:'block'});
		}else{
			$(this).parent().parent().parent().find('.selected-info').css({display:''});
			$(this).parent().parent().parent().find('.selected-info .scrollbox div').remove();
		}
	});
}

function image_upload(field, previewImg) {
	$('#dialog').remove();
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	$('#dialog').dialog({
		title: 'Image manager<br><div class="path">Uploaded image path to use in content => image/data/ Folder name if created / image name without space </div>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(data) {
						//$('#' + previewImg).replaceWith('<img src="' + data + '" alt="" class="PreviewImage" id="' + previewImg + '" />');
						$('#' + previewImg).css({backgroundImage: 'url(' + data + ')'});
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};


// Category
function catAutocomplete() {
	$('.find-cat').autocomplete({
		delay: 100,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {		
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.category_id
						}
					}));
				}
			});
		}, 
		select: function(event, ui) {
			var catBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
			var arrName = $(this).parent().attr('data-array');
			$(catBox + ui.item.value).remove();
			//console.log($(this).parent().attr('class'));
			if ($(this).parent().hasClass('edit-mod')) {
				$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="category[]" value="' + ui.item.value + '" /></div>');
			}else{
				$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '[category][]" value="' + ui.item.value + '" /></div>');
			};
			return false;
		},
		focus: function(event, ui) {
		  return false;
	   }
	});
	$(window).on('click', '.cat-sel div img', function() {
		$(this).parent().remove();
	});
}

function prdAutocomplete() {
	$('.find-prd').autocomplete({
		delay: 100,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {		
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.product_id
						}
					}));
				}
			});
		}, 
		select: function(event, ui) {
			var prdBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
			var arrName = $(this).parent().attr('data-array');
			$(prdBox + ui.item.value).remove();
			if ($(this).parent().hasClass('edit-mod')) {
				$(prdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="prd[]" value="' + ui.item.value + '" /></div>');
			}else{
				$(prdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '[prd][]" value="' + ui.item.value + '" /></div>');	
			};
			
			return false;
		},
		focus: function(event, ui) {
			return false;
		}
	});
	$(window).on('click', '.prd-sel div img', function() {
		$(this).parent().remove();
	});
}


// Manufacturer
function brandAutocomplete() {
	$('.find-brand').autocomplete({
		delay: 100,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/manufacturer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {		
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.manufacturer_id
						}
					}));
				}
			});
		}, 
		select: function(event, ui) {

			var brdBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
			var arrName = $(this).parent().attr('data-array');
			$(brdBox + ui.item.value).remove();
			if ($(this).parent().hasClass('edit-mod')) {
				$(brdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="brand[]" value="' + ui.item.value + '" /></div>');
			}else{
				$(brdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '[brand][]" value="' + ui.item.value + '" /></div>');
			};
			return false;
		},
		focus: function(event, ui) {
		  return false;
	   }
	});
	$(window).on('click', '.brand-sel div img', function() {
		$(this).parent().remove();
	});
}


// Information
function infoAutocomplete() {
	$('.find-info').autocomplete({
		delay: 100,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/information/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {	
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.information_id
						}
					}));
				}   
			});
		}, 
		select: function(event, ui) {
			var infoBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
			var arrName = $(this).parent().attr('data-array');
			$(infoBox + ui.item.value).remove();
			if ($(this).parent().hasClass('edit-mod')) {
				$(infoBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="info[]" value="' + ui.item.value + '" /></div>');
			}else{
				$(infoBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '[info][]" value="' + ui.item.value + '" /></div>');
			};
			return false;
		},
		focus: function(event, ui) {
		  return false;
	   }
	});
	$(window).on('click', '.info-sel div img', function() {
		$(this).parent().remove();
	});
}

/*	Get module case
*******************************/
$(document).ready(function(){
	$("#custom-mods li:first a").click();
});
$(window).on("click", "#custom-mods a", function(){

	var url = $(this).attr("data-url");
	var mod_id = $(this).attr("data-id");

	$("#custom-mod-create").hide();
	$("#custom-mod-data").show();
	
	//var tabpane = $(this).attr("href");
	//console.log($(this).attr("data-url"));
	$("#custom-mods li").removeClass("active");
	$(this).parent().addClass("active");
	blockSection();
	
	$.post(url, function(data) {
		//console.log(data);
		$("#custom-mod-data").html(data);
		$('.main-panes').unblock();

		// Sticky content options
		var custOption = "#custom-mod-data";
		custOptions(custOption);

		// Custom content for specific pages
		layoutSelect();

		catAutocomplete();
		prdAutocomplete();
		brandAutocomplete();
		infoAutocomplete();
		
		
	});
});

$(window).on("click","#edit-saveBtn",function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		//console.log($("#tabs1 .active a").attr("data-id"));
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
		
		$.ajax({
			type: "POST",
			url: "index.php?route=module/rgen_custom/edit&token=<?php echo $token; ?>&mod_name="+$("#custom-mods .active a").attr("data-id"),
			data: $('#custom-mod-data input[type=\'text\'], #custom-mod-data input[type=\'checkbox\']:checked, #custom-mod-data input[type=\'radio\']:checked, #custom-mod-data input[type=\'hidden\'], #custom-mod-data select, #custom-mod-data textarea').serializeArray(),
			//dataType: "html",
			success: function(data) {
				//console.log(data);
				clearCache();
				// Display success message
				var msg = "<?php echo $this->language->get('text_success'); ?>";
				successMsg(msg);
				//location.reload();
			}
		});
	}
});


/*	Add new module case
*******************************/
$(window).on("click", ".create-btn", function(){
	$("#custom-mods li").removeClass("active");
	$("#custom-mod-create").show();
	$("#custom-mod-data").hide();
	blockSection();

	$.post("index.php?route=module/rgen_custom/add&token=<?php echo $token; ?>&mod_name=rgen_custom_module<?php echo $module_row; ?>", function(data) {
		//console.log(data);
		//console.log(data);
		$("#custom-mod-create").html(data);
		// Sticky content options
		var custOption = "#custom-mod-create";
		custOptions(custOption);

		// Custom content for specific pages
		layoutSelect();

		catAutocomplete();
		prdAutocomplete();
		brandAutocomplete();
		infoAutocomplete();
		$('.main-panes').unblock();
	});

	

});

$(window).on("click","#create-saveBtn",function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
		
		$.ajax({
			type: "POST",
			url: "index.php?route=module/rgen_custom/create&token=<?php echo $token; ?>&mod_name=rgen_custom_module<?php echo $module_row; ?>",
			data: $('#custom-mod-create input[type=\'text\'], #custom-mod-create input[type=\'checkbox\']:checked, #custom-mod-create input[type=\'radio\']:checked, #custom-mod-create input[type=\'hidden\'], #custom-mod-create select, #custom-mod-create textarea').serializeArray(),
			dataType: "html",
			success: function(data) {
				//console.log(data);
				clearCache();
				// Display success message
				var msg = "<?php echo $this->language->get('text_success'); ?> Page will refresh after module data saved.";
				//successMsg(msg);
				$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
				location.reload();
			}
		});
	}
});

/*	Delete module case
*******************************/
$(window).on("click", ".custom-mod-remove", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		var mod_id = $(this).parent().attr("data-id");
		var mod = this;
		$(mod).parent().parent().remove();
		$.post("index.php?route=module/rgen_custom/delete&token=<?php echo $token; ?>&mod_name="+mod_id, function(data) {
			clearCache();
			//console.log(data);
			if ($("#custom-mods li").length > 0) {
				$("#custom-mods li:last a").click();
			}else{
				location.reload();
			};
			
		});	
	}
});

function clearCache(){
	$.post('index.php?route=module/rgen_custom/clearCache&token=<?php echo $token; ?>&name=/rgen_customhtml', function(data) { console.log(data); });
}

// Snippet tabs
$('#tabs2 a').click(function (e) {
	e.preventDefault();
	$(this).tab('show');
});

function permissionCheck(){
	// Loading screen
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 2000, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

function successMsg(msg){
	// Loading screen
	$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 500, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

function blockSection(){
	$('.main-panes').block({
		css: { 
			top: '10%',
			border: 'none', 
			padding: '50px 20px 20px 20px', 
			backgroundColor: '#333', 
			'-webkit-border-radius': '10px', 
			'-moz-border-radius': '10px', 
			opacity: 0.7, 
			color: '#fff',
			fontSize: '16px',
			fontWeight: "bold"
		},
		overlayCSS:{ backgroundColor: '#fff', opacity: 0.8 },
		message: 'Just a moment...' 
	});
}



//--></script> 
<?php echo $footer; ?>
