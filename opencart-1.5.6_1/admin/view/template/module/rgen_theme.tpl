<?php echo $header; ?>

<?php $status = array('Disabled' => 0, 'Enabled' => 1); ?>

<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<link rel="stylesheet" type="text/css" href="view/stylesheet/messi.min.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />

<div id="content" class="rgen-mod" style="opacity:0">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box" id="main-wrapper">
		<!-- <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" > -->
		<form id="form" enctype="multipart/form-data">
		<!-- MAIN TABS START -->
		<div class="navbar">
			<div class="navbar-inner">
				<div class="buttons pull-left">
					<?php //$RGen_themelist = array("R.Gen - Theme 1", "R.Gen - Theme 2", "R.Gen - Theme 3"); ?>
					<div class="form-inline themelist-block">
						<img src="view/image/rgen_theme/ajax-loader-small.gif" style="display:none; margin: 13px 10px 0 0;">
						<span class="themelist-wrp select" style="vertical-align: middle; margin-right:10px; margin-top: 11px;">
							<select class="themelist" name="RGen_selectedTheme">
								<option value="">Select module setting</option>
								<!-- <?php //foreach ($RGen_themelist as $value) { ?>
								<option value="<?php //echo $value; ?>"><?php //echo $value; ?></option>
								<?php //}?> -->

								<?php 
								$RGen_selectedTheme = $this->config->get('RGen_selectedTheme');
								foreach ($themelist as $value) { ?>
								<?php ($value ==  $RGen_selectedTheme) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
								<?php }?>
							</select>
						</span>
						<a id="loadthemeBtn" class="btn btn-small" style="margin-top: 13px;">Load</a>
						<a id="editthemeBtn" class="btn btn-small" style="margin-top: 13px;">Modify</a>
						<a id="deletethemeBtn" class="btn btn-small" style="margin-top: 13px;">Delete</a> 
						<a class="helpbtn" style="margin-top: 13px; vertical-align: middle;" data-type="info" data-title="Information" data-info="Save settings dose not include About us, HTML menu and Facebook widget data">?</a>
					</div>
				</div>
				<div class="buttons pull-right">
					<?php 
						$RGen_selectedTheme = $this->config->get('RGen_selectedTheme');
						$dbkey			= isset($RGen_selectedTheme) ? $RGen_selectedTheme : '';
						$name			= 'RGen_themeSettings';
						$id				= 'RGen_themeSettings';
						$placeholder	= 'Enter name to save settings';
					?>
					<div class="input-append" style="margin:6px 10px 0 0;">
						<input class="settingname_input" style="vertical-align: middle; text-align: center;" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="" type="text">
						<a id="saveSettingBtn" class="btn">Save &amp; Save As</a>
					</div>
					
					<a id="saveBtn" class="btn btn-success btn-large"><?php echo $button_save; ?></a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-large">Back</a>
				</div>
			</div>
		</div>

		<div class="navbar" id='main-tabs'>
			<div class="navbar-inner">
				<span class="brand">R.Gen Theme<b><?php if (isset($version)) { echo $version; }else{ echo $ver; } ?></b></span>
				<ul class="nav">
					<li class="active"><a href="#CustomFt">THEME SETTINGS</a></li>
					<li><a href="#RGen_themes">R.GEN THEMES</a></li>
					<li><a href="#ThemeSetting">THEME COLORS</a></li>
					<li><a href="#CustomCSS">CUSTOM CODE</a></li>
					<?php if(is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1){ ?>
					<li><a href="#SampleData">SAMPLE DATA</a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>

		
		<div class='tab-content main-panes'>
			
			<div id="CustomFt" class="tab-pane active">
				<div class="tabs-left tabbable" data-theme="tab1">
					<ul id="tabs1" class="nav nav-tabs">
						<li class="active"><a href="#tab_general_settings">General</a></li>
						<li><a href="#tab_optimization">Optimization</a></li>
						<li><a href="#tab_menu_settings">Menu</a></li>
						<li><a href="#tab_slideshow_mod">Home slideshow</a></li>
						<li><a href="#tab_fonts_settings">Fonts</a></li>
						<li><a href="#tab_social_links">Footer social</a></li>
						<li><a href="#tab_contactinfo">Footer contact</a></li>
						<li><a href="#tab_custom_footer">Custom footer</a></li>
					</ul>
					<div class="tab-content">
						<div id="tab_general_settings" class="tab-pane active">
						<?php include "rgen_generalsettings.php"; ?>
						</div>

						<div id="tab_optimization" class="tab-pane">
						<?php include "rgen_optimization.php"; ?>
						</div>
						
						<div id="tab_fonts_settings" class="tab-pane">
						<?php include "rgen_fonts.php"; ?>
						</div>
						
						<div id="tab_menu_settings" class="tab-pane">
						<?php include "rgen_menu.php"; ?>
						</div>
						
						<div id="tab_slideshow_mod" class="tab-pane slideshowOptions">
						<?php include "rgen_slideshowsetting.php"; ?>
						</div>
						
						<div id="tab_social_links" class="tab-pane">
						<?php include "rgen_sociallinks.php"; ?>
						</div>
						
						<div id="tab_contactinfo" class="tab-pane">
						<?php include "rgen_contactinfo.php"; ?>
						</div>
						
						<div id="tab_custom_footer" class="tab-pane">
						<?php include "rgen_customfooter.php"; ?>
						</div>
					</div>
				</div>
			</div>
			
			<div id="RGen_themes" class="tab-pane">
				<?php include "rgen_readythemes.php"; ?>
			</div>
			
			<div id="ThemeSetting" class="tab-pane">
				<?php include "rgen_themecolors.php"; ?>
			</div>
			
			<div id="CustomCSS" class="tab-pane">
				<?php include "rgen_customcode.php"; ?>
			</div>
			
			<?php if(is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1){ ?>
			<div id="SampleData" class="tab-pane">
				<?php include "rgen_sampledata.php"; ?>
			</div>
			<?php }; ?>

		</div>
		</form>
		
	</div>
</div>

<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script src="view/javascript/rgen/messi.min.js"></script>

<script type="text/javascript"><!--
function image_upload(field, previewImg) {
	
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(data) {
						$('#' + previewImg).replaceWith('<img src="' + data + '" alt="" class="PreviewImage" id="' + previewImg + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 700,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
//$('#content').css({opacity:0});
$('body').prepend('<div class="loading">Loading...</div>');
$(document).ready(function(){
	$('.loading').css({display:"none"});
	$('#content').animate({opacity: 1}, 300, function(){});
});

// SET FCK EDITOR FOR ABOUT US CONTENT
CKEDITOR.replace('FT_about_Text', {
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('RGen_htmlmenu-<?php echo $language["language_id"]; ?>-htmldata', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
CKEDITOR.replace('RGen_module-<?php echo $language["language_id"]; ?>-ftAbout', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>

function imgPopup (helpImg){
	$('#ThemeOverview').remove();
	$('#content').prepend('<div id="ThemeOverview" style="padding: 15px;"><img src="" /></div>');
	$('#ThemeOverview').dialog({
		dialogClass: "ThemeOverview-popup",
		open: function(event, ui) {
			$(this).find('img').attr('src',$(helpImg).attr('rel'));
			},
		title: 'Theme overview',
		bgiframe: false,
		width: 950,
		height: 600,
		resizable: false,
		modal: false,
		closeOnEscape: true
	});
}


if($('#RGen_productLayout').attr('checked') == 'checked'){
	$('.ocLayout').find('input').removeAttr('checked');
	$('.ocLayout').css({display:'none'});
}
	
$('#RGen_productLayout').click(function(){
	if($(this).attr('checked') == 'checked'){
		$('.ocLayout').find('input').removeAttr('checked');
		$('.ocLayout').css({display:'none'});
	}else {
		$('.ocLayout').css({display:''});
	}
});

$('#ss_full, #ss_medium, #ss_none, #ss_normal, #ss_wf-full, #ss_w-full').click(function(){
	$('#bannerNone').attr('checked', 'checked');
	//$('#bannerBeside').attr('disabled', 'disabled');
	$('#bannerBelow').removeAttr('disabled');
});

$('#ss_beside_bnr').click(function(){
	$('#bannerBelow, #bannerBeside').removeAttr('disabled');
	$('#bannerBeside').attr('checked', 'checked');
	$('#bannerBelow').attr('disabled', 'disabled');
});

$('#RGen_SlideShow_Mod_status').change(function(){
	if($(this).val() == 0){
		$('select[name="RGen_SlideShow_Mod"]').find('option').first().attr('selected', 'selected');
	}
});
$('select[name="RGen_SlideShow_Mod"]').change(function(){
	if($(this).val() != '--'){
		$('#RGen_SlideShow_Mod_status').find('option').first().attr('selected', 'selected');
	}
});



/* THEME SETTINGS */
$("#RGen_Theme3, #RGen_Theme3_boxed, #RGen_Theme4, #RGen_Theme4_boxed, #RGen_Theme5, #RGen_Theme6, #RGen_Theme7, #RGen_Theme8, #RGen_Theme9").click(function(){
	$('#logoPosition-0').attr('checked','');
	$('#logoPosition-1').attr('checked','checked');
	$("#logoPosition-0").parent().removeClass("active");
	$("#logoPosition-1").parent().addClass("active");
});
$("#RGen_Theme8, #RGen_Theme9").click(function(){
	$('#RGen_layout-bx, #RGen_menulayout-bx').attr('checked','');
	$('#RGen_layout-fw, #RGen_menulayout-fw').attr('checked','checked');
	$("#RGen_layout-bx, #RGen_menulayout-bx").parent().removeClass("active");
	$("#RGen_layout-fw, #RGen_menulayout-fw").parent().addClass("active");
});
$("#RGen_Theme7, #RGen_Theme5, #RGen_Theme6, #RGen_Theme4, #RGen_Theme4_boxed").click(function(){
	$('#RGen_layout-fw, #RGen_menulayout-fw').attr('checked','');
	$('#RGen_layout-bx, #RGen_menulayout-bx').attr('checked','checked');
	$("#RGen_layout-fw, #RGen_menulayout-fw").parent().removeClass("active");
	$("#RGen_layout-bx, #RGen_menulayout-bx").parent().addClass("active");
});

$(document).ready(function(){
	$('.hex').each(function(index, element) {
		$(this).colorpicker({
			hsv:false,
			altField:$(this),
			showNoneButton:true,
			altProperties: 'background-color'
		});	
		$(this).click(function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
		
		if($(this).val() == ''){
			$(this).css({backgroundColor:"#fff"});
		}else{
			$(this).css({backgroundColor:"#"+$(this).val()});
		}
	});
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
		
		$(this).click(function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
	});
});

$('select .normal').bind('select', function(){
	$('.normal-size').css({display:'block'});
});

var regdemothemes = $([<?php if(isset($RGen_themelist) && $RGen_themelist != ''){ foreach ($RGen_themelist as $value) { echo "'".$value."',"; } }else{ echo "0"; }; ?>]);

// Save theme settings
$(window).on("click", "#saveSettingBtn",function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if ($("#saveSettingBtn").attr("data-edit")){
			saveThemeSetting();
		}else{
			if ($.inArray($(".settingname_input").val(), regdemothemes) != -1) {
				new Messi('R.Gen demo settings not editable.<br>You can load settings than save it with different name.', {
					title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
					buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
				});
			}else{
				if ($(".settingname_input").val() == ''){
					new Messi('Please enter module setting name.', {
						title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
						buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}],
					});
				}else{
					var checkName = $(".themelist-wrp select").find("option[value='"+$(".settingname_input").val()+"']").val();
					if (checkName == $(".settingname_input").val()){
						new Messi( '<strong>"'+$(".settingname_input").val()+'"</strong> module setting is already exist.<br>Please enter another name.', {
							title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
							buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
						});
					}else{
						saveThemeSetting();
						//location.reload();
					}
				}
			};
			
		};
	}
	
});
$("#saveBtn").click(function(){ saveThemeSetting(); });

// Load module settings
$(window).on("click", "#loadthemeBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if ($(".themelist-wrp select").val() == '') {
			new Messi('No any module setting selected.', {
				title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		}else{
			new Messi(
				'<p>Are you sure you wish to load selected <strong>"'+$(".themelist-wrp select").val()+'"</strong> module setting.</p><p>Selected module settings will replace all your current module settings.</p>', {
				title: '<strong>"'+$(".themelist-wrp select").val()+'"</strong> selected', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'load', label: 'Load selected settings', class: 'btn-small btn-danger'}, {id: 0, val: 'cancel', label: 'Cancel', class: 'btn-small'}],
				callback: function(val) {
					if (val == 'load') {
						if ($(".themelist-wrp select").val() != ""){
							$('body').prepend('<div class="saving"><span style="top:43%;">Please wait until the module settings load.<br>Page will refresh automatically after module settings loaded successfully.<span></div>');
							$(".saving").css({height: $("html").height()});
							$.post("index.php?route=module/rgen_theme/loadtheme&token=<?php echo $token; ?>&load_thm="+ $(".themelist-wrp select").val(), function(data) {
								location.reload();
							});
						}else{
							new Messi('module settings not selected.<br>Please select module settings from dropdown to load it.', {
								title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
								buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
							});
							//alert("module settings not selected.\nPlease select module settings from dropdown to load it.");
						};
					};
				}
			});
		}
		
	}
});

// Delete module settings
$(window).on("click", "#deletethemeBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if ($(".themelist-wrp select").val() == '') {
			new Messi('No any module setting selected.', {
				title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		}else{
			if ($.inArray($(".themelist-wrp select").val(), regdemothemes) != -1) {
				new Messi('R.Gen demo settings not editable.<br>You can load settings than save it with different name.', {
					title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
					buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
				});
			}else{
				new Messi(
					'Are you sure to you want to delete selected <strong>"'+$(".themelist-wrp select").val()+'"</strong> module settings.', {
						title: 'Delete <strong>"'+$(".themelist-wrp select").val()+'"</strong> module setting', modal: true, modalOpacity: 0.5, 
						buttons: [{id: 0, label: 'Yes', val: 'Y', class: 'btn-small btn-success'}, {id: 1, label: 'No', val: 'N', class: 'btn-small btn-danger'}, {id: 2, label: 'Cancel', val: 'C', class: 'btn-small'}], 
						callback: function(val) { 
							if (val == 'Y') {
								// Loading screen
								$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
								$(".saving").css({height: $("html").height()});
								$.post("index.php?route=module/rgen_theme/deletetheme&token=<?php echo $token; ?>&thm_name="+ $(".themelist-wrp select").val(), function(data) {
									$.get("index.php?route=module/rgen_theme&token=<?php echo $token; ?>", function(data) {
										var getdata = data;
										$(".themelist-wrp").html($(getdata).find('.themelist-wrp').html());

										// Display success message
										var msg = "Selected module settings removed successfully";
										successMsg(msg);
										$(".settingname_input").val(null);
									});
								}); 
							}
						}
					}
				);
			};
			
		}
		//new Messi('Are you sure to you want to delete <strong>'+$(".themelist-wrp select").val()+'</strong> module settings.', {title: 'Modal Window', modal: true});
	}
});

// Edit module settings
$(window).on("click", "#editthemeBtn", function(){

	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if($(".themelist-wrp select").val() == '') {
			new Messi('No any module setting selected. Please select module setting to edit.', {
				title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		}else{
			$(".settingname_input").val($(".themelist-wrp select").val());
			if ($.inArray($(".settingname_input").val(), regdemothemes) != -1) {
				new Messi('R.Gen demo settings not editable.<br>You can load settings than save it with different name.', {
					title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
					buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
				});
				$(".settingname_input").val(null);
			}else{
				new Messi(
					'<p><strong>"'+$(".themelist-wrp select").val()+'"</strong> module setting selected.</p><p>Click on <strong>"Save &amp; Save As"</strong> button to save settings and update selected module settings.</p><p>Click on <strong>"Clear selection"</strong> button if you do not wish to modify selected module setting.</p>', {
					title: '<strong>"'+$(".themelist-wrp select").val()+'"</strong> selected', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
					buttons: [{id: 0, val: 'C', label: 'Continue', class: 'btn-small btn-success'}, {id: 0, val: 'clear', label: 'Clear selection', class: 'btn-small btn-danger'}],
					callback: function(val) {
						if (val == 'clear') {
							$(".settingname_input").val(null);
						}else{
							$("#saveSettingBtn").attr("data-edit","editThm");
						};
					}
				});
			};
		}
	}
});

$(window).on("input", ".settingname_input",function(){
	$("#saveSettingBtn").removeAttr("data-edit");
});

function saveThemeSetting(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});

		if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
		$.ajax({
			type: "POST",
			url: "index.php?route=module/rgen_theme&token=<?php echo $token; ?>",
			data: $('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray(),
			dataType: "html",
			success: function(data) {
				if ($(".settingname_input").val() != ''){
					$(".themelist-block > img").show();
					// Save module settings
					$.post( "index.php?route=module/rgen_theme/savetheme&token=<?php echo $token; ?>&thm_name="+ $(".settingname_input").val(), function(data) {
						//console.log(data);
						// Load theme into select menu
						$.get("index.php?route=module/rgen_theme&token=<?php echo $token; ?>", function(data) {
							var getdata = data;
							$(".themelist-wrp").html($(getdata).find('.themelist-wrp').html());
							$(".settingname_input").val(null);
							$(".themelist-block > img").hide();
							if ($("#saveSettingBtn").attr("data-edit")) {
								new Messi('<strong>"'+$(".themelist-wrp select").val()+'"</strong> module settings updated successfully.', {
									title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5, autoclose: 2000,
									buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
								});
								$("#saveSettingBtn").removeAttr("data-edit");
							};
							
						});

					});
				};
				
				
				// Display success message
				var msg = "<?php echo $this->language->get('text_success'); ?>";
				successMsg(msg);
			}
		});
	};
}

// On / Off switch
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
	$('.saving').animate({opacity:1}, 1000, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

//--></script> 


<?php echo $footer; ?>