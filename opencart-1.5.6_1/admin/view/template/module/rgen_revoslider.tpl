<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<style type="text/css">
.table td{ vertical-align: middle; text-align: center; }
input[disabled="disabled"]{ opacity: 0.4; }
</style>
<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<?php
$positions = array(
			$text_content_top				=> 'content_top',
			$text_content_bottom			=> 'content_bottom',
			$text_column_left				=> 'column_left',
			$text_column_right				=> 'column_right'
			);
$status = array('Disabled' => 0, 'Enabled' => 1);
$sliderType = array(
		'Normal' 					=> 'normal', 
		'Window full size' 			=> 'rv-wfs', 
		'Boxed full size' 			=> 'rv-pfs', 
		'Window full width size' 	=> 'rv-wfws', 
		'Boxed full width size'		=> 'rv-pfws', 
		'Beside banners' 			=> 'rv-bb'
		//'Full page width' => 'fpw', 'Full window width' => 'fw', 'Full screen' => 'fs'
		);
//echo "<pre style='color:;'>" . print_r($modules, TRUE) . "</pre>";
?>

<div id="content" class="rgen-revo-settings">
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
				<h2 class="pull-left mod-title">REVOLUTION SLIDER</h2>
				<div class="buttons pull-right">
					<a id="saveBtn" class="btn btn-success btn-large"><?php echo $button_save; ?></a>
					<a onclick="location = '<?php echo $manage; ?>';" class="btn btn-danger btn-large">Manage slider</a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-large">Back</a>
				</div>
			</div>
		</div>
		<form id="form" enctype="multipart/form-data">
		<div class="mod-content">
			<table class="table table-bordered">
				<tr class="table-header">
					<th width="220">Slider</th>
					<th width="300">Settings</th>
					<th style="text-align:center;">Layout</th>
					<th style="text-align:center;">Position</th>
					<th style="text-align:center;">Status</th>
					<th style="text-align:center;">Sort order</th>
					<th style="text-align:center;"></th>
				</tr>
				<?php $module_row = 0; ?>
				<?php 
				foreach ($modules as $module) { 
					if(isset($module['status'])){ 
						$module['status'];
					} else { 
						$module['status'] = 0; 
					}
					//echo "<pre style='color:;'>" . print_r($module, TRUE) . "</pre>";
				?>
				<tr>
					<td>
						<?php 
						$ar 	= $sliderlist;
						$dbKey 	= isset($module['mod_id']) ? $module['mod_id'] : '';
						$name	= 'rgen_revoslider_module[' . $module_row . '][mod_id]';
						?>
						<span class='select'>
							<select name="<?php echo $name; ?>">
								<?php foreach ($ar as $key) { ?>
									<?php ($key['mod_id'] ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
									<option value="<?php echo $key['mod_id']; ?>" <?php echo $selected; ?>><?php echo $key['slidername']; ?></option>
								<?php } ?>
							</select>
						</span><br>
					</td>
					<td>
						<div class="form-horizontal frm-small" id="setting<?php echo $module_row; ?>">
							<div class="control-group slider-type">
								<label class="control-label">Display products on slideshow</label>
								<div class="controls">
									<?php 
										$ar 	= array('No' => 0, 'Yes' => 1);
										$dbKey 	= isset($module['prdonrevo']) ? $module['prdonrevo'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][prdonrevo]';
									?>
									<span class='select'>
										<select name="<?php echo $name; ?>" class="input-medium">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<div class="control-group slider-type">
								<label class="control-label">Slider type</label>
								<div class="controls">
									<?php 
										$ar 	= $sliderType;
										$dbKey 	= isset($module['slider_size']) ? $module['slider_size'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_size]';
									?>
									<span class='select'>
										<select name="<?php echo $name; ?>" class="input-medium">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<div class="control-group fs-offset">
								<label class="control-label">Offset container</label>
								<div class="controls">
									<?php 
										$dbKey 	= isset($module['slider_offset']) ? $module['slider_offset'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_offset]';
									?>
									<input type="text" style="width:138px;" placeholder="#header-wrapper" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</div>
							<div class="control-group slider-size">
								<label class="control-label">Slider width x height</label>
								<div class="controls">
									<?php 
										$dbKey 	= isset($module['slider_w']) ? $module['slider_w'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_w]';
									?>
									<input type="text" class="input-mini w" placeholder="960" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
									<?php 
										$dbKey 	= isset($module['slider_h']) ? $module['slider_h'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_h]';
									?>
									<input type="text" class="input-mini h" placeholder="500" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</div>
							<div class="control-group cp-size">
								<label class="control-label">Caption display area</label>
								<div class="controls">
									<?php 
										$dbKey 	= isset($module['slider_cpw']) ? $module['slider_cpw'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_cpw]';
									?>
									<input type="text" class="input-mini" placeholder="1170" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
									<?php 
										$dbKey 	= isset($module['slider_cph']) ? $module['slider_cph'] : '';
										$name	= 'rgen_revoslider_module[' . $module_row . '][slider_cph]';
									?>
									<input type="text" class="input-mini" placeholder="600" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</div>
							<script type="text/javascript">
							function fw<?php echo $module_row; ?>(){
								if ($("#setting<?php echo $module_row; ?> .slider-type select").val() == 'fw') {
									$("#setting<?php echo $module_row; ?> .slider-size .h").attr("disabled", false);
									$("#setting<?php echo $module_row; ?> .slider-size .w").attr('disabled', true);
									$("#setting<?php echo $module_row; ?> .fs-offset input").attr('disabled', true);
								}else if($("#setting<?php echo $module_row; ?> .slider-type select").val() == 'fs'){
									$("#setting<?php echo $module_row; ?> .slider-size input").attr('disabled', true);
									$("#setting<?php echo $module_row; ?> .fs-offset input").attr('disabled', false);
								}else{
									$("#setting<?php echo $module_row; ?> .slider-size input").attr('disabled', false);
									$("#setting<?php echo $module_row; ?> .fs-offset input").attr('disabled', true);
								};
							} fw<?php echo $module_row; ?>();
							$("#setting<?php echo $module_row; ?> .slider-type select").change(function(){ fw<?php echo $module_row; ?>(); });
							</script>
						</div>
					</td>
					<td>
						<?php 
						$ar 	= $layouts;
						$dbKey 	= isset($module['layout_id']) ? $module['layout_id'] : 'home';
						$name	= 'rgen_revoslider_module[' . $module_row . '][layout_id]';
						?>
						<span class='select'>
							<select name="<?php echo $name; ?>" class="input-medium">
								<?php foreach ($ar as $key => $value) { ?>
									<?php ($value['layout_id'] ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
									<option value="<?php echo $value['layout_id']; ?>" <?php echo $selected; ?>><?php echo $value['name']; ?></option>
								<?php } ?>
							</select>
						</span>
					</td>
					<td>
						<?php 
						$ar 	= $positions;
						$dbKey 	= isset($module['position']) ? $module['position'] : 'content_top';
						$name	= 'rgen_revoslider_module[' . $module_row . '][position]';
						?>
						<span class='select'>
							<select name="<?php echo $name; ?>" class="input-medium">
								<?php foreach ($ar as $key => $value) { ?>
									<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
									<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
								<?php } ?>
							</select>
						</span>
					</td>
					<td style="text-align:center;">
						<?php 
							$dbKey 	= isset($module['status']) ? $module['status'] : '0';
							$name	= 'rgen_revoslider_module[' . $module_row . '][status]';
							$id		= 'rgen_revoslider_module-' . $module_row . '-status';
						?>
						<span class="switch mb10">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td style="text-align:center;">
						<?php 
							$dbKey 	= isset($module['sort_order']) ? $module['sort_order'] : '';
							$name	= 'rgen_revoslider_module[' . $module_row . '][sort_order]';
						?>
						<input type="text" style="text-align:center;" class="input-mini" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					</td>
					<td style="text-align:center;">
						<a class='btn btn-danger' onclick="$(this).parent().parent().remove(); return false;"><i class="icon-remove icon-white"></i></a>
					</td>
				</tr>
				<?php $module_row++; ?>
				<?php } ?>
				<tr class="addModBtn">
					<td colspan="6"></td>
					<td style="text-align:center;"><a id="addMod" onclick="addModule();" class="btn btn-success">Add</a></td>
				</tr>
			</table>
			<div class="well well-small help-block" style="background:#fff">
				<ul>
					<li><strong>Slider type : </strong>This is display type of slider in front-end. Normal, Full page width, Full window width and Full screen </li>
					<li><strong>Slider width x height : </strong>This is height and width of slider block. Leave it blank to adjust auto in front end with default values</li>
					<li><strong>Caption display area : </strong>This height and width of the grid where the captions are displayed in pixel. This height and width is the max height and width of slider in fullwidth layout and in responsive layout. In fullscreen layout the gird will be centred vertically in case the slider is higher then this value.</li>
				</ul>
			</div>
		</div>
		</form>
	</div>
</div>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">

function setswitch(){
	$('.switch').click(function(){
	
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


var module_row = <?php echo $module_row; ?>;
function addModule() {	
	
	//var module_row = <?php $module_row = 0; ?>;
	html  = '<tr>';
	html += '	<td>';
	html += '		<span class="select">';
	html += '			<select name="rgen_revoslider_module[' + module_row + '][mod_id]">';
							<?php foreach ($sliderlist as $key) { ?>
	html += '				<option value="<?php echo $key["mod_id"]; ?>"><?php echo $key["slidername"]; ?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</span>';
	html += '	</td>';

	html += '	<td>';
	html += '		<div class="form-horizontal frm-small" id="setting' + module_row + '">';

	html += '			<div class="control-group slider-type">';
	html += '				<label class="control-label">Display products on slideshow</label>';
	html += '				<div class="controls">';
								<?php $ar 	= array('No' => 0, 'Yes' => 1); ?>
								var name 	= 'rgen_revoslider_module[' + module_row + '][prdonrevo]';
	html += '					<span class="select">';
	html += '						<select name="' + name + '" class="input-medium">';
										<?php foreach ($ar as $key => $value) { ?>
	html += '							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>';
										<?php } ?>
	html += '						</select>';
	html += '					</span>';
	html += '				</div>';
	html += '			</div>';

	html += '			<div class="control-group slider-type">';
	html += '				<label class="control-label">Slider type</label>';
	html += '				<div class="controls">';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_size]';
	html += '					<span class="select">';
	html += '						<select name="' + name + '" class="input-medium">';
										<?php foreach ($sliderType as $key => $value) { ?>
	html += '								<option value="<?php echo $value; ?>"><?php echo $key; ?></option>';
										<?php } ?>
	html += '						</select>';
	html += '					</span>';
	html += '				</div>';
	html += '			</div>';
	html += '			<div class="control-group fs-offset">';
	html += '				<label class="control-label">Caption display area</label>';
	html += '				<div class="controls">';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_offset]';
	html += '					<input type="text" style="width:138px;" placeholder="#header-wrapper" name="' + name + '" value="" disabled />';
	html += '				</div>';
	html += '			</div>';
	html += '			<div class="control-group slider-size">';
	html += '				<label class="control-label">Slider width x height</label>';
	html += '				<div class="controls">';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_w]';
	html += '					<input type="text" class="input-mini w" placeholder="960" name="' + name + '" value="" />';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_h]';
	html += '					<input type="text" class="input-mini h" placeholder="500" name="' + name + '" value="" />';
	html += '				</div>';
	html += '			</div>';
	html += '			<div class="control-group cp-size">';
	html += '				<label class="control-label">Caption display area</label>';
	html += '				<div class="controls">';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_cpw]';
	html += '					<input type="text" class="input-mini" placeholder="1170" name="' + name + '" value="" />';
								var name 	= 'rgen_revoslider_module[' + module_row + '][slider_cph]';
	html += '					<input type="text" class="input-mini" placeholder="600" name="' + name + '" value="" />';
	html += '				</div>';
	html += '			</div>';
	html += '			<script type="text\/javascript">';
	html += '			function fw' + module_row + '(){';
	html += '				if ($("#setting' + module_row + ' .slider-type select").val() == "fw") {';
	html += '					$("#setting' + module_row + ' .slider-size .h").attr("disabled", false); $("#setting' + module_row + ' .slider-size .w").attr("disabled", true); $("#setting' + module_row + ' .fs-offset input").attr("disabled", true);';
	html += '				}else if($("#setting' + module_row + ' .slider-type select").val() == "fs"){';
	html += '					$("#setting' + module_row + ' .slider-size input").attr("disabled", true); $("#setting' + module_row + ' .fs-offset input").attr("disabled", false);';
	html += '				}else{';
	html += '					$("#setting' + module_row + ' .slider-size input").attr("disabled", false); $("#setting' + module_row + ' .fs-offset input").attr("disabled", true);';
	html += '				};';
	html += '			} fw' + module_row + '();';
	html += '			$("#setting' + module_row + ' .slider-type select").change(function(){ fw' + module_row + '(); });';
	html += '			<\/script>';
	html += '		</div>';
	html += '	</td>';
	
	html += '	<td>';
	html += '		<span class="select">';
	html += '			<select name="rgen_revoslider_module[' + module_row + '][layout_id]" class="input-medium">';
							<?php foreach ($layouts as $key) { ?>
	html += '				<option value="<?php echo $key["layout_id"]; ?>"><?php echo $key["name"]; ?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</span>';
	html += '	</td>';
	
	html += '	<td>';
	html += '		<span class="select">';
	html += '			<select name="rgen_revoslider_module[' + module_row + '][position]" class="input-medium">';
							<?php foreach ($positions as $key => $value) { ?>
	html += '				<option value="<?php echo $value; ?>"><?php echo $key; ?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</span>';
	html += '	</td>';

	html += '	<td style="text-align:center;">';
	html += '		<span class="switch"><input type="checkbox" id="rgen_revoslider_module-' + module_row + '-status" name="rgen_revoslider_module[' + module_row + '][status]" value="1"><label for="rgen_revoslider_module-' + module_row + '-status" class="switch-img"></label><input type="hidden" name="rgen_revoslider_module[' + module_row + '][status]" value="0"></span>';
	html += '	</td>';

	html += '	<td style="text-align:center;">';
	html += '		<input type="text" style="text-align:center;" class="input-mini" name="rgen_revoslider_module[' + module_row + '][sort_order]" value="" />';
	html += '	</td>';

	html += '	<td style="text-align:center;">';
	html += '		<span class="btn btn-danger" style="font-size:20px;" onclick="$(this).parent().parent().remove(); return false;">&times;</span>';
	html += '	</td>';
	html += '</tr>';

	$('.addModBtn').before(html);
	

	module_row++;
	setswitch();
}

// SAVE BUTTON
$("#saveBtn").click(function(){
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
	$.ajax({
		type: "POST",
		url: "index.php?route=module/rgen_revoslider&token=<?php echo $token; ?>",
		data: $('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray(),
		dataType: "html",
		success: function() {
			//console.log($('#form textarea').val());
			if($("body").find("#permission").length>0){
				$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
				$('.saving').animate({opacity:1}, 2000, function(){
					$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
				});	
			}else{
				$('.saving').addClass('success-msg').find("span").text("<?php echo $this->language->get('text_success'); ?>").css({backgroundImage:""});
				$('.saving').animate({opacity:1}, 1000, function(){
					$('.saving').animate({opacity:0}, 300, function(){
						$('.saving').css({display:"none"}); $(".saving").remove();
					});
				});
			}
		}
	});
});

</script>
<?php echo $footer; ?>