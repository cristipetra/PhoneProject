<div class="mod-data-wrp">
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

	$module_row = 1; ?>
	<?php 
	//echo "<pre style='color:;'>" . print_r($modules, TRUE) . "</pre>";
	foreach ($get_module as $module) { 
		if(isset($module['status'])){ 
			$module['status'];
		} else { 
			$module['status'] = 0; 
		}
		//echo "<pre style='color:;'>" . print_r($module, TRUE) . "</pre>";
	?>
	<div class="section-title">
		Edit module
		<div class="buttons pull-right" style="margin: -9px -10px 0 0;">
			<a id="edit-saveBtn" class="btn btn-success btn-large">Save Changes</a>
		</div>
	</div>
	<h4>Module settings</h4>
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label">Module name</label>
			<div class="controls mod-name">
				<?php 
					$dbKey 	= isset($module['modName']) ? $module['modName'] : '';
					$name	= 'modName';
				?>
				<input type="text" placeholder="Module name" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<input type="hidden" name="mod_id" value="<?php echo $module['mod_id']; ?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><?php echo $entry_status; ?></label>
			<div class="controls">
				<?php 
					$ar 	= $status;
					$dbKey 	= isset($module['status']) ? $module['status'] : '0';
					$name	= 'status';
				?>
				<span class='select status-select'>
					<select name="<?php echo $name; ?>">
						<?php foreach ($ar as $key => $value) { ?>
							<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
							<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
						<?php } ?>
					</select>
				</span>
				<input placeholder='Sort order' type="text" class='input-small' name="sort_order" value="<?php echo isset($module['sort_order']) ? $module['sort_order'] : null; ?>" size="3" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><?php echo $entry_layout; ?></label>
			<div class="controls">
				<span class='select layout-select'>
					<select name="layout_id">
						<?php foreach ($layouts as $layout) { ?>
						<?php 
							if (isset($layout['route'][0])) {
								$routeInfo = $layout['route'][0]['route'];
							}else{
								$routeInfo = '';
							}
							$modLayoutID = isset($module['layout_id']) ? $module['layout_id'] : null;
						?>
						<?php if ($layout['layout_id'] == $modLayoutID) { ?>
						<option value="<?php echo $layout['layout_id']; ?>" selected="selected" data-route="<?php echo $routeInfo; ?>"><?php echo $layout['name']; ?></option>
						<?php } else { ?>
						<option value="<?php echo $layout['layout_id']; ?>" data-route="<?php echo $routeInfo; ?>"><?php echo $layout['name']; ?></option>
						<?php } ?>
						<?php } ?>
					</select>
				</span>
			</div>
		</div>
		
		<!-- Category selection -->
		<div class="control-group cat-select-wrp" style="display:<?php if(isset($module['cat_status'])){ echo "block;"; }else{echo "none;";} ?>">
			<label class="control-label">Display content</label>
			<div class="controls cat-selection" id="<?php echo $module['mod_id']; ?>-cat-sel">
				
				<?php 
				$ar 	= array( 'On all categories' => 'allc', 'On selected category' => 'selc');
				$dbKey 	= isset($module['cat_status']) ? $module['cat_status'] : '';
				$name	= 'cat_status';
				$id		= 'cat_status';
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

				<div class="selected-cat edit-mod" id="<?php echo $module['mod_id']; ?>-cat" data-array="<?php echo $module['mod_id']; ?>" style="display:<?php if(isset($module['cat_status']) && $module['cat_status'] == "selc"){ echo "block"; }else{ echo ""; } ?>;">
					<input type="text" placeholder="Type category name to insert" class="find-cat" value="" /><br>
		            <div class="select_scrollbox scrollbox cat-sel">
						<?php 
						if (isset($rgen_catlist[$module['mod_id']])) {
						foreach ($rgen_catlist[$module['mod_id']] as $category) { ?>
						<div><?php echo $category['name']; ?>
							<img src="view/image/delete.png" alt="" />
							<input type="hidden" name="category[]" value="<?php echo $category['category_id']; ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Product selection -->
		<div class="control-group prd-select-wrp" style="display:<?php if(isset($module['prd_status'])){ echo "block;"; }else{echo "none;";} ?>">
			<label class="control-label">Display content</label>
			<div class="controls prd-selection edit-mod" id="<?php echo $module['mod_id']; ?>-prd-sel">
				
				<?php 
				$ar 	= array( 'On all products' => 'allp', 'On selected product' => 'selp');
				$dbKey 	= isset($module['prd_status']) ? $module['prd_status'] : '';
				$name	= 'prd_status';
				$id		= 'prd_status';
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

				<div class="selected-prd edit-mod" id="<?php echo $module['mod_id']; ?>-prd" data-array="<?php echo $module['mod_id']; ?>" style="display:<?php if(isset($module['prd_status']) && $module['prd_status'] == "selp"){ echo "block"; }else{ echo ""; } ?>;">
					<input type="text" placeholder="Type product name to insert" class="find-prd" value="" /><br>
		            <div class="select_scrollbox scrollbox prd-sel">
						<?php 
						if (isset($rgen_prdlist[$module['mod_id']])) {
						foreach ($rgen_prdlist[$module['mod_id']] as $product) { ?>
						<div><?php echo $product['name']; ?>
							<img src="view/image/delete.png" alt="" />
							<input type="hidden" name="prd[]" value="<?php echo $product['product_id']; ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Brand selection -->
		<div class="control-group brand-select-wrp" style="display:<?php if(isset($module['brand_status'])){ echo "block;"; }else{echo "none;";} ?>">
			<label class="control-label">Display content</label>
			<div class="controls brand-selection" id="<?php echo $module['mod_id']; ?>-brand-sel">
				
				<?php 
				$ar 	= array( 'On all brands' => 'allb', 'On selected brand' => 'selb');
				$dbKey 	= isset($module['brand_status']) ? $module['brand_status'] : '';
				$name	= 'brand_status';
				$id		= 'brand_status';
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

				<div class="selected-brand edit-mod" id="<?php echo $module['mod_id']; ?>-brand" data-array="<?php echo $module['mod_id']; ?>" style="display:<?php if(isset($module['brand_status']) && $module['brand_status'] == "selb"){ echo "block"; }else{ echo ""; } ?>;">
					<input type="text" placeholder="Type manufacturer name to insert" class="find-brand" value="" /><br>
		            <div class="select_scrollbox scrollbox brand-sel">
						<?php 
						if (isset($rgen_brandlist[$module['mod_id']])) {
						foreach ($rgen_brandlist[$module['mod_id']] as $brand) { ?>
						<div><?php echo $brand['name']; ?>
							<img src="view/image/delete.png" alt="" />
							<input type="hidden" name="brand[]" value="<?php echo $brand['manufacturer_id']; ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Information selection -->
		<div class="control-group info-select-wrp" style="display:<?php if(isset($module['info_status'])){ echo "block;"; }else{echo "none;";} ?>">
		<!-- <div class="control-group info-select-wrp"> -->
			<label class="control-label">Display content</label>
			<div class="controls info-selection" id="<?php echo $module['mod_id']; ?>-info-sel">
				
				<?php 
				$ar 	= array( 'On all information pages' => 'alli', 'On selected information page' => 'seli');
				$dbKey 	= isset($module['info_status']) ? $module['info_status'] : '';
				$name	= 'info_status';
				$id		= 'info_status';
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

				<div class="selected-info edit-mod" id="<?php echo $module['mod_id']; ?>-info" data-array="<?php echo $module['mod_id']; ?>" style="display:<?php if(isset($module['info_status']) && $module['info_status'] == "seli"){ echo "block"; }else{ echo ""; } ?>;">
					<input type="text" placeholder="Type information page name to insert" class="find-info" value="" /><br>
		            <div class="select_scrollbox scrollbox info-sel">
						<?php 
						if (isset($rgen_infolist[$module['mod_id']])) {
						foreach ($rgen_infolist[$module['mod_id']] as $info) { ?>
						<div><?php echo $info['name']; ?>
							<img src="view/image/delete.png" alt="" />
							<input type="hidden" name="info[]" value="<?php echo $info['information_id']; ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="control-group pos-select-wrp">
			<label class="control-label"><?php echo $entry_position; ?></label>
			<div class="controls">
				<?php 
					$ar 	= $positions;
					$dbKey 	= isset($module['position']) ? $module['position'] : 'content_top';
					$name	= 'position';
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
		<div class="control-group cust-options" id="<?php echo $module['mod_id'] . '-cusOptions'; ?>"<?php 
			$modPos = isset($module['position']) ? $module['position'] : '';
			if($modPos == "s_right" || $modPos == "s_left"){ ?> style="display:block;"<?php } else { ?> style="display:none;"<?php } ?>>
			<label class="control-label">Custom content options</label>
			<div class="controls">
				<?php 
					$dbKey 	= isset($module['custWidth']) ? $module['custWidth'] : '';
					$name	= 'custWidth';
				?>
				<input type="text" placeholder="Width" class="input-small" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<?php 
					$dbKey 	= isset($module['custTop']) ? $module['custTop'] : '';
					$name	= 'custTop';
				?>
				<input type="text" placeholder="Top position" class="input-small" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<?php 
					$dbKey 	= isset($module['custColor']) ? $module['custColor'] : '';
					$name	= 'custColor';
				?>
				<input type="text" placeholder="Color" class="rgb input-small" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<?php 
					$dbKey 	= isset($module['custImg']) ? $module['custImg'] : '';
					$name	= 'custImg';
				?>
				<span class="custImg-icon" id="<?php echo $module['mod_id'] . '-custImg-preview'; ?>" style="background-image: url(../image/<?php echo isset($module['custImg']) ? $module['custImg'] : '' ?>); background-color:<?php echo isset($module['custColor']) ? $module['custColor'] : '' ?>;"></span>
				<input type="hidden" id="<?php echo $module['mod_id'] . '-custImg'; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				<a onclick="image_upload('<?php echo $module['mod_id'] . '-custImg'; ?>', '<?php echo $module['mod_id'] . '-custImg-preview'; ?>');" class="btn btn-small">Set image</a>
			</div>
			<script>
			$(".cust-options .rgb").spectrum({
				appendTo: ".cust-options .controls",
				preferredFormat: 'rgb',
				showAlpha: true,
				showInput: true,
				showPalette: true,
				palette: [["rgba(0, 0, 0, 0.5)", "rgb(255, 255, 255, 0.5)"]],
				change: function(color) {
					color.toRgbString();
					console.log(color.toRgbString());
					$('.cust-options .controls .custImg-icon').css({backgroundColor: color.toRgbString()});
				}
			});
			</script>
		</div>
		<div class="control-group">
			<label class="control-label">Content styles</label>
			<div class="controls">
				<?php 
				$ar 	= array( 'Boxed' => 'cust1', 'With out box' => 'cust2', 'Free style' => 'cust3');
				$dbKey 	= isset($module['style']) ? $module['style'] : 'cust2';
				$name	= 'style';
				$id		= 'style';
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
				<?php 
					$dbKey 	= isset($module['class']) ? $module['class'] : '';
					$name	= 'class';
					$id  	= 'class';
				?>
				<input type="text" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
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
					$dbKey 	= isset($module['fullB']) ? $module['fullB'] : '';
					$name	= 'fullB';
				?>
				<span class='select'>
					<select name="<?php echo $name; ?>" class="fullb-status">
						<?php foreach ($ar as $key => $value) { ?>
							<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
							<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
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
					<?php 
						$dbKey 	= isset($module['fullB_class']) ? $module['fullB_class'] : '';
						$name	= 'fullB_class';
					?>
					<input type="text" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					<a class="btn btn-mini" data-val="dark-thm">On dark</a>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Background color</label>
				<div class="controls">
					<?php 
						$dbKey 	= isset($module['fullB_bgcolor']) ? $module['fullB_bgcolor'] : '';
						$name	= 'fullB_bgcolor';
					?>
					<input type="text" class="rgba" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
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
										$dbKey  = isset($module['fullB_bgimg']) ? $module['fullB_bgimg'] : '';
										$name	= 'fullB_bgimg';
										$id		= 'fullB'.$module_row.'-bgimg';
									?>
									<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
									<div class="btn-group btn-group-vertical">
										<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
										<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
									</div>
									<input type="hidden" id="<?php echo $id; ?>" data-clone="fullB_bgimg" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</td>
							<td>
								<?php 
									$ar 	= $bodyBgAttachment;
									$dbKey 	= isset($module['fullB_bgAttachment']) ? $module['fullB_bgAttachment'] : '';
									$name	= 'fullB_bgAttachment';
								?>
								<span class='select mb10'>
									<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgAttachment">
										<option value="">Background attachment</option>
										<?php foreach ($ar as $key) { ?>
											<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span><br>
								<?php 
									$ar 	= $ImgRepeat;
									$dbKey 	= isset($module['fullB_bgrepeat']) ? $module['fullB_bgrepeat'] : '';
									$name	= 'fullB_bgrepeat';
								?>
								<span class='select mb10'>
									<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgrepeat">
										<option value="">Background repeat</option>
										<?php foreach ($ar as $key) { ?>
											<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span><br>
								<?php 
									$ar 	= $ImgPosition;
									$dbKey 	= isset($module['fullB_bgposition']) ? $module['fullB_bgposition'] : '';
									$name	= 'fullB_bgposition';
								?>
								<span class='select mb10'>
									<select name="<?php echo $name; ?>" style="width:150px" data-clone="fullB_bgposition">
										<option value="">Background position</option>
										<?php foreach ($ar as $key) { ?>
											<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
								<div class="otherpos" style="display: <?php echo isset($module['fullB_bgposition']) && $module['fullB_bgposition'] == 'other' ? 'block' : 'none'; ?>;">
									<?php 
										$dbKey 	= isset($module['fullB_bgps1']) ? $module['fullB_bgps1'] : '';
										$name	= 'fullB_bgps1';
									?>
									<input type="text" class="input-mini" data-clone="fullB_bgps1" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									<?php 
										$dbKey 	= isset($module['fullB_bgps2']) ? $module['fullB_bgps2'] : '';
										$name	= 'fullB_bgps2';
									?>
									<input type="text" class="input-mini" data-clone="fullB_bgps2" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
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
	<div class="form-horizontal" id="language-<?php echo $module['mod_id']; ?>">
	    <ul class="nav nav-tabs">
			<?php foreach ($languages as $language) { ?>
			<li>
				<a href="#tab-language-<?php echo $language['language_id']; ?>">
				<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
				</a>
			</li>
			<?php } ?>
		</ul>
		<div class="tab-content">
			<?php foreach ($languages as $language) { ?>
			<div class="tab-pane" id="tab-language-<?php echo $language['language_id']; ?>">
				<div class="control-group">
					<label class="control-label"><?php echo $entry_title; ?></label>
					<div class="controls menu-sort">
						<?php 
							$dbKey 	= isset($module['title'][$language['language_id']]) ? $module['title'][$language['language_id']] : '';
							$name	= 'title[' . $language['language_id'] . ']';
							$id  	= 'title[' . $language['language_id'] . ']';
						?>
						<input type="text" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo $entry_description; ?></label>
					<div class="controls">
						<textarea name="description[<?php echo $language['language_id']; ?>]" id="description-<?php echo $language['language_id']; ?>"><?php echo isset($module['description'][$language['language_id']]) ? $module['description'][$language['language_id']] : ''; ?></textarea>
					</div>
				</div>
				<script type="text/javascript">
				CKEDITOR.replace('description-<?php echo $language['language_id']; ?>', {
					filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					height: '600px'
				});
				</script>
			</div>
			<?php } ?>
		</div>
	</div>

	<script type="text/javascript">
		$(window).on("click", "#language-<?php echo $module['mod_id']; ?> .nav-tabs a", function(e){
			e.preventDefault();
			$(this).tab("show");
		});
		/*$("#language-<?php echo $module_row; ?> .nav-tabs a").click(function (e) {
			e.preventDefault();
			$(this).tab("show");
		});*/
		$("#language-<?php echo $module['mod_id']; ?> .nav-tabs > li:first").addClass("active");
		$("#language-<?php echo $module['mod_id']; ?> .tab-content .tab-pane:first").addClass("active");
	</script>
	<?php $module_row++; ?>
	<?php } ?>

</div>

