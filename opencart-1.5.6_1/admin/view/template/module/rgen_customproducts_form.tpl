<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/messi.min.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/stylesheet/snippets.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/stylesheet/nivo-slider.css" />

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
.rgen-sd-td-mod #main-tabs .brand { width: 140px; }
.rgen-sd-td-mod [data-theme="tab1"].tabs-left > .nav-tabs { width: 190px; }
.rgen-sd-td-mod #module-add { width: 130px; }
</style>
<script type="text/javascript" src="../catalog/view/theme/rgen-opencart/js/plugins.js"></script>
<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<div class="content-wrp">
<div id="content" class="rgen-customprd-mod rgen-sd-td-mod" style="opacity:0">
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
					<li class="active"><a href="#main-tb-1">CUSTOM MODULES</a></li>
				</ul>
				<div class="buttons pull-right" style="margin-top: 7px; margin-right: -5px;">
					<a class="btn sethelp" data-type="page" data-title="CSS structure guide for color customization" data-info="view/image/rgen_theme/rgen_customproducts_css.html">CSS Guide</a>
					<a onclick="location = '<?php echo $back; ?>';" class="btn">Back</a>
				</div>
			</div>
		</div>

		<form id="form" enctype="multipart/form-data">
			<div class='tab-content main-panes'>
				<div id="main-tb-1" class="tab-pane active">
					<div class="tabs-left tabbable main-sd-tb-wrp" data-theme="tab1">
						<a class='btn btn-success btn-large create-btn' id="module-add"><i class="icon-plus icon-white"></i> <?php echo $button_add_module; ?></a>
						<ul id="main-sd-tb" class="nav nav-tabs">
							<?php $i=1; foreach($rgen_customprds as $module){ ?>
							<li class="tab-module">
								<a data-tab="#tab-module" data-id="<?php echo $module['mod_id']; ?>" data-url="index.php?route=module/rgen_customproducts/getmodule&token=<?php echo $token; ?>&mod_name=<?php echo $module['mod_id']; ?>">
									<?php if ($module['section_name'] != "") { ?>
									<b><?php echo $module['section_name']; ?></b>
									<?php }else{ ?>
									<b>Custom module <?php echo $i; ?></b>
									<?php } ?>
									<span class='btn btn-danger btn-mini mod-remove'>&times;</span>
								</a>
							</li>
							<?php $i++; } ?>
						</ul>
						<div class="tab-content mod-wrp" style="min-height:800px;">
							<?php //echo "<pre style='color:;'>" . print_r($rgen_customprds, TRUE) . "</pre>"; ?>
							<div id="mod-data"></div>
							<div id="mod-create"></div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>
</div>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script src="view/javascript/rgen/jquery.blockUI.js"></script>
<script src="view/javascript/rgen/messi.min.js"></script>

<script type="text/javascript"><!--

$('.content-wrp').block({
	css: { 
		top: '10%',
		border: 'none', 
		padding: '50px 20px 20px 20px', 
		backgroundColor: '#000', 
		'-webkit-border-radius': '10px', 
		'-moz-border-radius': '10px', 
		opacity: 0.7, 
		color: '#fff',
		fontSize: '16px',
		fontWeight: "bold"
	},
	overlayCSS:{ backgroundColor: '#000', opacity: 1 },
	message: 'Loading...' 
});
//$('body').prepend('<div class="loading">Loading...</div>');
$(document).ready(function(){
	$('#content').css({display:'block'});
	$('#content').animate({opacity: 1}, 2000, function(){ $('.content-wrp').unblock(); });
});

/*	Delete module case
*******************************/
$(window).on("click", ".mod-remove", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		blockSection();
		var mod_id = $(this).parent().attr("data-id");
		var mod = this;
		$(mod).parent().parent().remove();

		$.post("index.php?route=module/rgen_customproducts/delete&token=<?php echo $token; ?>&mod_name="+mod_id, function(data) {
			console.log(data);
			if ($("#main-sd-tb li").length > 0) {
				$("#main-sd-tb li:last a").click();
			} else {
				$('#mod-data').html('');
			};
			$('.main-panes').unblock();
		});
	}
});

/* Create new
*******************************/
$(window).on("click", "#module-add", function(){
	blockSection();
	$.post("index.php?route=module/rgen_customproducts/add&token=<?php echo $token; ?>", function(data) {
		//console.log(data);
		$('#mod-data').html(data);
		$('.main-panes').unblock();
	});
});

/* Edit module
*******************************/
$(window).on("click", "#main-sd-tb a", function(){
	var url = $(this).attr("data-url");
	var mod_id = $(this).attr("data-id");

	$("#mod-create").hide();
	$("#mod-data").show();
	
	//var tabpane = $(this).attr("href");
	//console.log($(this).attr("data-url"));
	$("#main-sd-tb li").removeClass("active");
	$(this).parent().addClass("active");
	blockSection();
	
	if($("body").find("#permission").length>0){
		//permissionCheck();
	}else{
		var saveURL = $('#mod-data .save-url').val();
		save(saveURL);
	}

	$.post(url, function(data) {
		//console.log(data);
		$("#mod-data").html(data);
		$('.main-panes').unblock();
	});
});
$("#main-sd-tb .tab-module:first-child a").click();

function save(saveURL){
	$.ajax({
		type: "POST",
		url: saveURL,
		data: $('#mod-data input[type=\'text\'], #mod-data input[type=\'checkbox\']:checked, #mod-data input[type=\'radio\']:checked, #mod-data input[type=\'hidden\'], #mod-data select, #mod-data textarea').serializeArray(),
		success: function(data) {
			console.log(data);
			if(saveURL){
				var modName = saveURL.split('mod_name=');
				if (modName[1]) {
					var msg = "<?php echo $this->language->get('text_success'); ?>";
					successMsg(msg);
				}else{
					var msg = "<?php echo $this->language->get('text_success'); ?> Page will refresh after module data saved.";
					$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
					location.reload();
				};
			}
			
		}
	});
}
$(window).on("click", "#saveBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		var saveURL = $('#mod-data .save-url').val();
		save(saveURL);
	}
});


function setswitch(){
	$(window).on("click",".switch",function(){
		var id = $(this).find('input[type="checkbox"]').attr('id');
		var name = $(this).find('input[type="checkbox"]').attr('name');

		if ($(this).find('input[type="checkbox"]').is(':checked')) {
			$(this).find('input[type="hidden"]').remove();
		} else {
		    $(this).append('<input type="hidden" name="' + name + '" value="0">');
		} 
	});
}
setswitch();

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