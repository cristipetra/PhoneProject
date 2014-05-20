<?php echo $header; ?>
<script src="view/javascript/jquery/jquery.colorpicker.js"></script>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script src="view/javascript/rgen/revoslider.js"></script>
<script src="view/javascript/rgen/webfonts.js"></script>
<script src="view/javascript/rgen/jQAllRangeSliders-min.js"></script>
<script src="view/javascript/rgen/jquery.blockUI.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<link rel="stylesheet" type="text/css" href="view/stylesheet/jquery.colorpicker.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/iThing.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/rgen-opencart/revo/rs-plugin/css/settings.css" />

<style type="text/css">
.tp-caption { position: static !important; margin: 0 !important; }
<?php foreach ($cpstyles as $cpstyle) { ?>
<?php if (isset($cpstyle['css'])) { echo $cpstyle['css']; } ?>
<?php } ?>
.blockMsg { top: 15% !important; background: url(view/image/rgen_theme/ajax-loader.gif) no-repeat center 25px;  }
</style>

<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<div id="content" class="rgen-revo">
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
				<h2 class="pull-left mod-title">MANAGE SLIDER</h2>
				<div class="buttons pull-right">
					<a id="saveBtn" class="btn btn-success btn-large"><?php echo $button_save; ?></a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-large">Back</a>
					<a onclick="location = '<?php echo $stylemanager; ?>';" class="btn btn-large">Caption style manager</a>
				</div>
			</div>
		</div>

		<form id="form" enctype="multipart/form-data">
		<div class="mod-content">
			<div class="slider-title">
				<?php
					$dbKey = isset($revoslider['mod_id']) && $revoslider['mod_id'] != '' ? $revoslider['mod_id'] : $mod_id;
					$name = 'mod_id';
				?>
				<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<?php 
					$dbKey = isset($revoslider['slider_id']) && $revoslider['slider_id'] != '' ? $revoslider['slider_id'] : $module_row;
					$name	= 'slider_id';
				?>
				<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<?php
					$dbKey = isset($revoslider['sliderName']) ? $revoslider['sliderName'] : "Slider " . $count;
					$name	= 'sliderName';
				?>
				<input type="text" placeholder="Enter slider name" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
			</div>
			<div class="content-tab revo-main-tabs" id="setting-tabs">
				<ul class="nav nav-tabs nav-tabs-2x">
					<li class="active"><a href="#revo_general">General settings</a></li>
					<li><a href="#revo_slides">Manage slides</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane revo_general" id="revo_general">
						<div class="form-horizontal">
							<div class="control-group main-delay">
								<label class="control-label">Delay</label>
								<div class="controls">
									<?php 
										$dbKey = isset($revoslider['delay']) ? $revoslider['delay'] : '5000';
										$name	= 'delay';
									?>
									<input type="text" class="input-mini" placeholder="5000" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Pause slider on hover:</label>
								<div class="controls">
									<?php 
										$dbKey = isset($revoslider['onHoverStop']) ? $revoslider['onHoverStop'] : 'off';
										$ar 	= array( 'Yes' => 'on', 'No' => 'off');
										$name	= 'onHoverStop';
										$id		= 'onHoverStop' . $module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Timer display position:</label>
								<div class="controls">
									<?php 
										$dbKey = isset($revoslider['timerPos']) ? $revoslider['timerPos'] : 't';
										$ar 	= array( 'Top' => 't', 'Bottom' => 'b');
										$name	= 'timerPos';
										$id		= 'timerPos' . $module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Hide caption options</label>
								<div class="controls">
									<table class="subfields">
										<tr>
											<td>
												<?php 
													$dbKey = isset($revoslider['hideCaptionAtLimit']) ? $revoslider['hideCaptionAtLimit'] : '';
													$name	= 'hideCaptionAtLimit';
												?>
												<span class="lbl">Hide caption at limit</span>
												<input type="text" class="input-small" placeholder="0" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</td>
											<td>
												<?php 
													$dbKey = isset($revoslider['hideAllCaptionAtLilmit']) ? $revoslider['hideAllCaptionAtLilmit'] : '';
													$name	= 'hideAllCaptionAtLilmit';
												?>
												<span class="lbl">Hide all caption at limit</span>
												<input type="text" class="input-small" placeholder="0" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</td>
											<td>
												<?php 
													$dbKey = isset($revoslider['hideSliderAtLimit']) ? $revoslider['hideSliderAtLimit'] : '';
													$name	= 'hideSliderAtLimit';
												?>
												<span class="lbl">Hide slider at limit</span>
												<input type="text" class="input-small" placeholder="0" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</td>
										</tr>
									</table>
									<div class="help-block">
										<ul>
											<li><strong>Hide caption at limit</strong> : It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)</li>
											<li><strong>Hide all caption at limit</strong> : Hide all The Captions if Width of Browser is less then this value</li>
											<li><strong>Hide caption at limit</strong> : Hide the whole slider, and stop also functions if Width of Browser is less than this value</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="tab-pane revo_slides" id="revo_slides">

						<div class="tabs-left tabbable" data-theme="tab2">
							<!-- <a class="btn btn-success new-slide" onclick="addSlide();"><i class="icon-plus icon-white"></i> Add new slide</a> -->
							<a class="btn btn-success new-slide"><i class="icon-plus icon-white"></i> Add new slide</a>
							<ul class="nav nav-tabs slide-tabs">
								<?php if(isset($revoslider['slides'])){ ?>
								<?php $sld = 0; ?>
								<?php foreach ($revoslider['slides'] as $r => $module) { ?>
								<li class="slide-tab">
									<a data-slide="<?php echo $module['slide_id']; ?>">
										<b><?php if($module['slidename'] == ""){echo "Slide " . ($sld+1);}else{echo $module['slidename'];}  ?></b>
									</a>
									<span class="btn btn-mini btn-link" data-modid="<?php echo $revoslider['mod_id']; ?>" data-slideid="<?php echo $r; ?>" data-placement="left" data-toggle="tooltip" title="Delete slide"><i class="icon-remove"></i></span>
								</li>
								<?php $sld++; } } ?>
							</ul>
							<div class="tab-content">
								<div id="slide-container"></div>
							</div>
						</div>
						
					</div>
				</div>		
			</div>
			<div id="slider"></div>
		</div>	
		</form>

	</div>
	<!-- Caption style selector -->
	<div class="cp-style-popup" style="display:none">
		<div class="cp-style-list-wrp">
			<ul class="cp-style-list">
				<?php foreach ($cpstyles as $cpstyle) { 
					if (isset($cpstyle['classname'])) {
				?><li><span style="display:inline-block" data-class="<?php echo $cpstyle['classname']; ?>" class="<?php echo $cpstyle['classname']; ?>">Caption style preview</span></li>
				<?php } } ?>
				<li><span style="display:inline-block" data-class="medium_grey" class="tp-caption medium_grey">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="small_text" class="tp-caption small_text">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_text" class="tp-caption medium_text">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_text" class="tp-caption large_text">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="very_large_text" class="tp-caption very_large_text">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="very_big_white" class="tp-caption very_big_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="very_big_black" class="tp-caption very_big_black">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_medium_fat" class="tp-caption modern_medium_fat">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_medium_fat_white" class="tp-caption modern_medium_fat_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_medium_light" class="tp-caption modern_medium_light">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_big_bluebg" class="tp-caption modern_big_bluebg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_big_redbg" class="tp-caption modern_big_redbg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="modern_small_text_dark" class="tp-caption modern_small_text_dark">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="boxshadow" class="tp-caption boxshadow">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="thinheadline_dark" class="tp-caption thinheadline_dark">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="thintext_dark" class="tp-caption thintext_dark">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="largeblackbg" class="tp-caption largeblackbg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="largepinkbg" class="tp-caption largepinkbg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="largewhitebg" class="tp-caption largewhitebg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="largegreenbg" class="tp-caption largegreenbg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="excerpt" class="tp-caption excerpt">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_bold_grey" class="tp-caption large_bold_grey">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_thin_grey" class="tp-caption medium_thin_grey">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="small_thin_grey" class="tp-caption small_thin_grey">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="lightgrey_divider" class="tp-caption lightgrey_divider">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_bold_darkblue" class="tp-caption large_bold_darkblue">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bg_darkblue" class="tp-caption medium_bg_darkblue">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bold_red" class="tp-caption medium_bold_red">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_light_red" class="tp-caption medium_light_red">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bg_red" class="tp-caption medium_bg_red">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bold_orange" class="tp-caption medium_bold_orange">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bg_orange" class="tp-caption medium_bg_orange">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_bold_white" class="tp-caption large_bold_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_light_white" class="tp-caption medium_light_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="mediumlarge_light_white" class="tp-caption mediumlarge_light_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="mediumlarge_light_white_center" class="tp-caption mediumlarge_light_white_center">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bg_asbestos" class="tp-caption medium_bg_asbestos">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_light_black" class="tp-caption medium_light_black">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_bold_black" class="tp-caption large_bold_black">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="mediumlarge_light_darkblue" class="tp-caption mediumlarge_light_darkblue">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="small_light_white" class="tp-caption small_light_white">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="large_bg_black" class="tp-caption large_bg_black">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="mediumwhitebg" class="tp-caption mediumwhitebg">Caption style preview</span></li>
				<li><span style="display:inline-block" data-class="medium_bg_orange_new1" class="tp-caption medium_bg_orange_new1">Caption style preview</span></li>
			</ul>
		</div>
		<a class="btn remove-selection btn-danger" style="color:#fff;">Clear selection</a>
	</div>
	<!-- Caption style selector -->
</div>


<script type="text/javascript"><!--

/***************************************************************/

// Adding new slide
$(window).on('click', '.new-slide', function() {

	if ($(".slide-tabs li").length > 0) {
		$(".slide-tabs li:last").clone().appendTo(".slide-tabs");
		var dataSlide = $(".slide-tabs li:last a").attr("data-slide");
		dataSlide = dataSlide.split('slide');
		dataSlideAttr = "slide"+ (parseInt(dataSlide[1])+1);
		console.log(dataSlide);
		$(".slide-tabs li:last a").attr("data-slide",dataSlideAttr).find("b").text("Slide "+(parseInt(dataSlide[1])+2));
	}else{
		$(".slide-tabs").prepend('<li class="slide-tab"><a data-slide="slide0"><b>Slide 1</b></a><span class="btn btn-mini btn-link" data-placement="left" data-toggle="tooltip" title="Delete slide"><i class="icon-remove"></i></span></li>');
	};
	$(".slide-tabs li:last a").trigger("click");
});

$(window).on('click', '.slide-tabs li a', function() {

	if($("body").find("#permission").length>0){
		//permissionCheck();
	}else{
		// Save data 
		$("#saveBtn").click();
		$(".saving").hide();
	}
	
	
	$(".slide-tabs li").removeClass("active");
	$(this).parent().addClass("active");

	var box = "#revo_slides"
	blockSection(box);

	<?php if (isset($this->request->get["mod_id"])) { ?>
		var pageURL = location.search;
		var modId = pageURL.split('mod_id=');
		var modId = modId[1];
	<?php }else{ ?>
		var modId = 'revoslider_module<?php echo $module_row ?>';
	<?php } ?> 

	$.post("index.php?route=module/rgen_revoslider/edit_slide&token=<?php echo $token; ?>&sld_name="+$(this).attr("data-slide")+"&mod_id="+modId, function(data) {
		//console.log(data);
		$("#slide-container").html(data);
		colorSelector();
		$(box).unblock();
	});
});

$(window).on("click", "#setting-tabs > .nav-tabs li:last-child a", function(){
	$(".slide-tabs li:first a").trigger("click");
});

function blockSection(box){
	$(box).block({
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

//$(window).on("click", "#editslide-saveBtn", function(){
$(window).on("click", "#saveBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		<?php if (isset($this->request->get["mod_id"])) { ?>
			var pageURL = location.search;
			var modId = pageURL.split('mod_id=');
			var modId = modId[1];
		<?php }else{ ?>
			var modId = 'revoslider_module<?php echo $module_row ?>';
		<?php } ?> 
		
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		
		$(':input[value=""]').not(".so").attr('disabled', true);
		$.ajax({
			type: "POST",
			url: "index.php?route=module/rgen_revoslider/save&token=<?php echo $token; ?>&sld_name="+$(".slide-tabs li.active a").attr("data-slide")+"&mod_id="+modId,
			data: $('.slider-title input[type=\'text\'], .slider-title input[type=\'hidden\'], #revo_general input[type=\'text\'], #revo_general input[type=\'radio\']:checked, #slide-container input[type=\'text\'], #slide-container input[type=\'checkbox\']:checked, #slide-container input[type=\'radio\']:checked, #slide-container input[type=\'hidden\'], #slide-container select, #slide-container textarea').serializeArray(),
			success: function(data){
				$(':input[value=""]').not(".so").attr('disabled', false);

				var msg = "<?php echo $this->language->get('text_success'); ?>";
				successMsg(msg);

				<?php if (!isset($this->request->get["mod_id"])) { ?>
				//window.location="index.php?route=module/rgen_revoslider/sliderlist&token=<?php echo $token; ?>";
				<?php } ?>
			}
		});
	}
	
});

function clearCache(){
	$.post('index.php?route=module/rgen_revoslider/clearCache&token=<?php echo $token; ?>&name=/rgen_revoslider', function(data) { });
}


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
	clearCache();
	// Loading screen
	$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 500, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}
// Remove slide function
$(window).on("click", '.slide-tabs li .btn', function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		var box = "#revo_slides"
		blockSection(box);

		$(this).parent().remove();
		$.post("index.php?route=module/rgen_revoslider/revmove_slide&token=<?php echo $token; ?>&slideid="+$(this).attr("data-slideid")+'&mod_id='+$(this).attr("data-modid"), function(data) {
			if ($(".slide-tabs li").length > 0) {
				$(".slide-tabs li:first").find("a").click();
			}else{
				location.reload();
			};
			//$(box).unblock();
		});
	}
});


/***************************************************************/


$(window).on('click', '.cp-styles', function() {
	var seletbtn = this;
	$('.cp-style-popup').dialog({
		dialogClass: "widgetid-popup",
		open: function(event, ui) {
			$('.cp-style-list li').removeClass('active');
			if ($(seletbtn).parent().find('input').val() != '') {
				var getStyle = '.' + $(seletbtn).parent().find('input').val();	
				$(getStyle).parent().addClass('active');
				console.log(getStyle);
			};
			
		},
		title: 'Click on caption style to select',
		bgiframe: false,
		width: 700,
		height: 450,
		resizable: false,
		modal: false,
		closeOnEscape: true
	});	
});


$('.cp-style-list li').click(function(){
	$('.cp-style-list li').removeClass('active');
	$(this).addClass('active');
	$(this).children('span').attr('data-class');
	//console.log($(this).children('span').attr('class'));
	$('#slide-container .caption-pane.active .css-class input').val($(this).children('span').attr('data-class'));
});
$('.remove-selection').click(function(){
	$('.cp-style-list li').removeClass('active');
	$('#slide-container .caption-pane.active .css-class input').val('');
});


function sliderName(){
	$(".slider-title input[type='text']").on('input', function() {
		$(".slider-tabs li").find("a[href='#"+ $(this).parent().parent().attr("id") + "'] b").text($(this).val());
	});
}
sliderName();

function sliderType(){
	$(".sliderType input[type='radio']").on('click', function() {
		//console.log($(this).val());
		if ($(this).val() == "fs") {
			$(".fullScreenOffsetContainer").show();
		}else{
			$('.fullScreenOffsetContainer').hide();
		};
	});
}
sliderType();

$('#setting-tabs > .nav-tabs a').click(function (e) { 
	e.preventDefault();
	$(this).tab('show');
	/*sliderObj = $('.slide-pane.active').find('.timeline');
	cpTimeLine(sliderObj);*/
});
$('#setting-tabs > .nav-tabs li:first a').trigger('click');
$('#setting-tabs > .tab-content > .tab-pane:first').addClass('active');


//var module_row = <?php echo $module_row; ?>;


function colorSelector() {
	$('.rgb').each(function(index, element) {

		$(this).colorpicker({
			hsv:false,
			alpha:true,
			colorFormat: ['RGBA'],
			showNoneButton:true,
			select: function(event, color) {
						$(this).val(color.formatted);
					}
		});
		
		$(window).on("click", ".rgb",function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
	});	
} colorSelector();

// IMAGE UPLOAD
function image_upload(field, previewImg) {
	$('#dialog').remove();
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	$('#dialog').dialog({
		title: 'Image manager',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(data) {
						$('#' + previewImg).css({backgroundImage: 'url(../image/' + $('#' + field).attr('value') + ')'});
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


//--></script>

<?php echo $footer; ?>