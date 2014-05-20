<div class="section-title">
	Add new module
	<div class="buttons pull-right" style="margin: -9px -10px 0 0;">
		<a id="create-saveBtn" class="btn btn-success btn-large">Save Module</a>
	</div>
</div>
<?php
//echo "<pre style='color:;'>" . print_r($module_row, TRUE) . "</pre>";
$positions = array(
			$text_content_top				=> 'content_top',
			$text_content_bottom			=> 'content_bottom',
			$text_column_left				=> 'column_left',
			$text_column_right				=> 'column_right',
			'Stick to right'				=> 's_right',
			'Stick to left'					=> 's_left',
			'Footer - Payment cards'		=> 'footer_cards',
			'Footer - Above social icons'	=> 'ft_social',
			'Footer - Below copyright'		=> 'ft_below',
			'Header - Top'					=> 'tp_above',
			'Product page - Above images'	=> 'pd_above_img',
			'Product page - Below images'	=> 'pd_below_img',
			'Product page - Above options'	=> 'pd_above_options',
			'Product page - Below options'	=> 'pd_below_options',
			'Product page - Above tabs'		=> 'pd_above_tb',
			'Product page - Above related'	=> 'pd_above_rel',
			'Product page - Extra tab'		=> 'pd_tb'
			);
$status = array('Disabled' => 0, 'Enabled' => 1);

$yn = array(
		"No" => 'n',
		"Yes" => 'y'
	);
	$ImgRepeat = array( 
		'no-repeat',
		'repeat',
		'repeat-x',
		'repeat-y',
		'inherit'
	); 
	$ImgPosition = array( 
		'left top',
		'left bottom',
		'right top',
		'right bottom',
		'center top',
		'center bottom',
		'center center',
		'other'
	);
	$bodyBgAttachment = array( 'inherit', 'fixed'); 
?>
<h4>Module settings</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Module name</label>
		<div class="controls mod-name">
			<?php $name	= 'rgen_custom_module' . $module_row . '[modName]'; ?>
			<input type="text" placeholder="Module name" name="<?php echo $name; ?>" value="" />
			<input type="hidden" name="rgen_custom_module<?php echo $module_row; ?>[mod_id]" value="<?php echo 'rgen_custom_module' . $module_row; ?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"><?php echo $entry_status; ?></label>
		<div class="controls">
			<?php 
				$ar 	= $status;
				$dbKey 	= '0';
				$name	= 'rgen_custom_module' . $module_row . '[status]';
			?>
			<span class='select status-select'>
				<select name="<?php echo $name; ?>">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
						<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>
			<input placeholder='Sort order' type="text" class='input-small' name="rgen_custom_module<?php echo $module_row; ?>[sort_order]" value="" size="3" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"><?php echo $entry_layout; ?></label>
		<div class="controls">
			<span class='select layout-select'>
				<select name="rgen_custom_module<?php echo $module_row; ?>[layout_id]">
					<?php foreach ($layouts as $layout) { ?>
					<?php 
						if (isset($layout['route'][0])) {
							$routeInfo = $layout['route'][0]['route'];
						}else{
							$routeInfo = '';
						}
					?>
					<option value="<?php echo $layout['layout_id']; ?>" data-route="<?php echo $routeInfo; ?>"><?php echo $layout['name']; ?></option>
					<?php } ?>
				</select>
			</span>
		</div>
	</div>
	
	<!-- Category selection -->
	<div class="control-group cat-select-wrp" style="display:none;">
		<label class="control-label">Display content</label>
		<div class="controls cat-selection" id="rgen_custom_module<?php echo $module_row; ?>-cat-sel" data-array="rgen_custom_module<?php echo $module_row; ?>">
			
			<?php 
			$ar 	= array( 'On all categories' => 'allc', 'On selected category' => 'selc');
			$dbKey 	= '';
			$name	= 'rgen_custom_module' . $module_row . '[cat_status]';
			$id		= 'rgen_custom_module[' . $module_row . '][cat_status]';
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

			<div class="selected-cat" id="rgen_custom_module<?php echo $module_row; ?>-cat" data-array="rgen_custom_module<?php echo $module_row; ?>" style="display:;">
				<input type="text" placeholder="Type category name to insert" class="find-cat" value="" /><br>
				<div class="select_scrollbox scrollbox cat-sel"></div>
			</div>
		</div>
	</div>

	<!-- Product selection -->
	<div class="control-group prd-select-wrp" style="display:none;">
		<label class="control-label">Display content</label>
		<div class="controls prd-selection" id="rgen_custom_module<?php echo $module_row; ?>-prd-sel" data-array="rgen_custom_module<?php echo $module_row; ?>">
			
			<?php 
			$ar 	= array( 'On all products' => 'allp', 'On selected product' => 'selp');
			$dbKey 	= '';
			$name	= 'rgen_custom_module' . $module_row . '[prd_status]';
			$id		= 'rgen_custom_module[' . $module_row . '][prd_status]';
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

			<div class="selected-prd" id="rgen_custom_module<?php echo $module_row; ?>-prd" data-array="rgen_custom_module<?php echo $module_row; ?>" style="display:;">
				<input type="text" placeholder="Type product name to insert" class="find-prd" value="" /><br>
				<div class="select_scrollbox scrollbox prd-sel"></div>
			</div>
		</div>
	</div>

	<!-- Brand selection -->
	<div class="control-group brand-select-wrp" style="display:none;">
		<label class="control-label">Display content</label>
		<div class="controls brand-selection" id="rgen_custom_module<?php echo $module_row; ?>-brand-sel" data-array="rgen_custom_module<?php echo $module_row; ?>">
			
			<?php 
			$ar 	= array( 'On all brands' => 'allb', 'On selected brand' => 'selb');
			$dbKey 	= '';
			$name	= 'rgen_custom_module' . $module_row . '[brand_status]';
			$id		= 'rgen_custom_module[' . $module_row . '][brand_status]';
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

			<div class="selected-brand" id="rgen_custom_module<?php echo $module_row; ?>-brand" data-array="rgen_custom_module<?php echo $module_row; ?>" style="display:;">
				<input type="text" placeholder="Type manufacturer name to insert" class="find-brand" value="" /><br>
				<div class="select_scrollbox scrollbox brand-sel"></div>
			</div>
		</div>
	</div>

	<!-- Information selection -->
	<div class="control-group info-select-wrp" style="display:<?php if(isset($module['info_status'])){ echo "block;"; }else{echo "none;";} ?>">
	<!-- <div class="control-group info-select-wrp"> -->
		<label class="control-label">Display content</label>
		<div class="controls info-selection" id="rgen_custom_module<?php echo $module_row; ?>-info-sel" data-array="rgen_custom_module<?php echo $module_row; ?>">
			
			<?php 
			$ar 	= array( 'On all information pages' => 'alli', 'On selected information page' => 'seli');
			$dbKey 	= '';
			$name	= 'rgen_custom_module' . $module_row . '[info_status]';
			$id		= 'rgen_custom_module[' . $module_row . '][info_status]';
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

			<div class="selected-info" id="rgen_custom_module<?php echo $module_row; ?>-info" data-array="rgen_custom_module<?php echo $module_row; ?>" style="display:;">
				<input type="text" placeholder="Type information page name to insert" class="find-info" value="" /><br>
				<div class="select_scrollbox scrollbox info-sel"></div>
			</div>
		</div>
	</div>

	<div class="control-group pos-select-wrp">
		<label class="control-label"><?php echo $entry_position; ?></label>
		<div class="controls">
			<?php 
				$ar 	= $positions;
				$dbKey 	= 'content_top';
				$name	= 'rgen_custom_module' . $module_row . '[position]';
			?>
			<span class='select pos-select'>
				<select name="<?php echo $name; ?>">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
						<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>
		</div>
	</div>
	<div class="control-group cust-options" id="<?php echo 'rgen_custom_module-' . $module_row . '-cusOptions'; ?>" style="display:none;">
		<label class="control-label">Custom content options</label>
		<div class="controls">
			<?php $name	= 'rgen_custom_module' . $module_row . '[custWidth]'; ?>
			<input type="text" placeholder="Width" class="input-small" name="<?php echo $name; ?>" value="" />
			<?php $name	= 'rgen_custom_module' . $module_row . '[custTop]'; ?>
			<input type="text" placeholder="Top position" class="input-small" name="<?php echo $name; ?>" value="" />
			<?php $name	= 'rgen_custom_module' . $module_row . '[custColor]'; ?>
			<input type="text" placeholder="Color" class="rgb input-small" name="<?php echo $name; ?>" value="" />
			<?php $name	= 'rgen_custom_module' . $module_row . '[custImg]'; ?>
			<span class="custImg-icon" id="<?php echo 'rgen_custom_module-' . $module_row . '-custImg-preview'; ?>"></span>
			<input type="hidden" id="<?php echo 'rgen_custom_module-' . $module_row . '-custImg'; ?>" name="<?php echo $name; ?>" value="" />
			<a onclick="image_upload('<?php echo 'rgen_custom_module-' . $module_row . '-custImg'; ?>', '<?php echo 'rgen_custom_module-' . $module_row . '-custImg-preview'; ?>');" class="btn btn-small">Set image</a>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Content styles</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Boxed' => 'cust1', 'With out box' => 'cust2', 'Free style' => 'cust3');
			$dbKey 	= 'cust2';
			$name	= 'rgen_custom_module' . $module_row . '[style]';
			$id		= 'rgen_custom_module[' . $module_row . '][style]';
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
			<span class="help-block">
				Style options only work with "<strong>Content top</strong>", "<strong>Content bottom</strong>", "<strong>Column left</strong>" and "<strong>Column right</strong>" positions
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label"><?php echo $entry_class; ?></label>
		<div class="controls">
			<?php $name	= 'rgen_custom_module' . $module_row . '[class]'; ?>
			<input type="text" name="<?php echo $name; ?>" value="" />
			<span class="help-block">
				<strong>Tips:</strong><br>
				1) Use multiple class name with space example: " <strong>class1 class2</strong> "<br>
				2) Use class name "<strong>d-close</strong>" to display content default close for below footer section custom block and above header section custom block<br>
			</span>
		</div>
	</div>
</div>


<h4>Display in full block</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Display in full block</label>
		<div class="controls">
			<?php 
				$ar 	= $yn;
				$name	= 'rgen_custom_module' . $module_row . '[fullB]';
			?>
			<span class='select'>
				<select name="<?php echo $name; ?>" class="fullb-status">
					<?php foreach ($ar as $key => $value) { ?>
						<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>	
		</div>
	</div>
	<div class="block-settings" style="<?php echo isset($module['fullB']) && $module['fullB'] == 'y' ? 'display:block;' : 'display:none;'; ?>">
		<div class="alert alert-info">
			Display in full block section does not support in page with side column layout. <br>
			Full block section only support with following positions
			<ul>
				<li>Content top</li>
				<li>Content bottom</li>
				<li>Product page - Above tabs</li>
				<li>Product page - Above related</li>
			</ul>
		</div>
		<div class="control-group">
			<label class="control-label">Apply CSS class</label>
			<div class="controls">
				<?php $name	= 'rgen_custom_module' . $module_row . '[fullB_class]'; ?>
				<input type="text" name="<?php echo $name; ?>" value="" />
				<a class="btn btn-mini" data-val="dark-thm">On dark</a>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Background color</label>
			<div class="controls">
				<?php $name	= 'rgen_custom_module' . $module_row . '[fullB_bgcolor]'; ?>
				<input type="text" class="rgba" name="<?php echo $name; ?>" value="" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Background image</label>
			<div class="controls">
				<table class="subfields withbdr">
					<tr>
						<td>
							<div class="img-preview" style="vertical-align: top;">
								<?php
									$name	= 'rgen_custom_module' . $module_row . '[fullB_bgimg]';
									$id		= 'fullB'.$module_row.'-bgimg';
								?>
								<div class="img-holder" style="background-image:url(<?php echo $no_img; ?>);" id="<?php echo $id; ?>-preview"></div>
								<div class="btn-group btn-group-vertical">
									<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
									<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
								</div>
								<input type="hidden" id="<?php echo $id; ?>" data-clone="fullB_bgimg" name="<?php echo $name; ?>" value="" />
							</div>
						</td>
						<td>
							<?php 
								$ar 	= $bodyBgAttachment;
								$name	= 'rgen_custom_module'.$module_row.'[fullB_bgAttachment]';
							?>
							<span class='select mb10'>
								<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgAttachment">
									<option value="">Background attachment</option>
									<?php foreach ($ar as $key) { ?>
										<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
										<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
									<?php } ?>
								</select>
							</span><br>
							<?php 
								$ar 	= $ImgRepeat;
								$name	= 'rgen_custom_module' . $module_row . '[fullB_bgrepeat]';
							?>
							<span class='select mb10'>
								<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgrepeat">
									<option value="">Background repeat</option>
									<?php foreach ($ar as $key) { ?>
										<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
									<?php } ?>
								</select>
							</span><br>
							<?php 
								$ar 	= $ImgPosition;
								$name	= 'rgen_custom_module' . $module_row . '[fullB_bgposition]';
							?>
							<span class='select'>
								<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgposition">
									<option value="">Background position</option>
									<?php foreach ($ar as $key) { ?>
										<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
									<?php } ?>
								</select>
							</span>

							<div class="otherpos" style="display: none;">
								<?php $name	= 'rgen_custom_module'.$module_row.'[fullB_bgps1]'; ?>
								<input type="text" class="input-mini" data-clone="fullB_bgps1" name="<?php echo $name; ?>" value="">
								<?php $name	= 'rgen_custom_module'.$module_row.'[fullB_bgps2]'; ?>
								<input type="text" class="input-mini" data-clone="fullB_bgps2" name="<?php echo $name; ?>" value="">
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$(window).on("change", ".fullb-status", function(){
	if ($(this).val() == "y"){
		$('.block-settings').show();
	}else{
		$('.block-settings').hide();
	};
});
$(window).on("click", "[data-clone='fullB_bgposition']", function(){
	if ($(this).val() == "other"){
		$(this).parent().next('.otherpos').show();
	}else{
		$(this).parent().next('.otherpos').hide();
	};
});
$(window).on("click", "[data-val='dark-thm']", function(){
	$(this).prev('input').val($(this).attr('data-val'));
});
colorPicker('.controls .rgba', 'rgb');
</script>

<h4>Module content</h4>
<div class="form-horizontal" id="language-<?php echo $module_row; ?>">
	<ul class="nav nav-tabs">
		<?php foreach ($languages as $language) { ?>
		<li>
			<a href="#tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>">
			<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
			</a>
		</li>
		<?php } ?>
	</ul>
	<div class="tab-content">
		<?php foreach ($languages as $language) { ?>
		<div class="tab-pane" id="tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>">
			<div class="control-group">
				<label class="control-label"><?php echo $entry_title; ?></label>
				<div class="controls menu-sort">
					<?php $name	= 'rgen_custom_module' . $module_row . '[title][' . $language['language_id'] . ']'; ?>
					<input type="text" name="<?php echo $name; ?>" value="" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo $entry_description; ?></label>
				<div class="controls">
					<textarea name="rgen_custom_module<?php echo $module_row; ?>[description][<?php echo $language['language_id']; ?>]" id="description-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>"></textarea>
				</div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				CKEDITOR.replace('description-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>', {
					filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					height: '600px'
				});
				
				$("#language-<?php echo $module_row; ?> .nav-tabs a").click(function (e) {
					e.preventDefault(); $(this).tab("show");
				});
				$("#language-<?php echo $module_row; ?> .nav-tabs > li:first").addClass("active");
				
				$("#language-<?php echo $module_row; ?> .tab-content .tab-pane:first").addClass("active");
				
			});
			
			</script>
		</div>
		<?php } ?>
	</div>
</div>