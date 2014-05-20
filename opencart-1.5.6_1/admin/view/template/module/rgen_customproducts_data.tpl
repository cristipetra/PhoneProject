<?php
	$prdTypes = array(
			"Special products" 			=> 'special',
			"Latest products" 			=> 'latest',
			"Best seller products" 		=> 'best',
			"Category products" 		=> 'catPrd',
			"Manufacturer products"		=> 'brandPrd',
			"Custom product group" 		=> 'custPrd'
		);
	$cat_brdTypes = array(
			"Category with sub-categories"	=> 'catSection',
			"Selected categories"			=> 'selcatSection',
			"Manufacturer"					=> 'brandSection'
		);

	$prdboxStyle = array(
		"Product block 1"		=> 'prd1',
		"Product block 2"		=> 'prd2',
		"Product block 3"		=> 'prd3',
		"Product block 4"		=> 'prd4'
	);

	$prdStyle = array(
			"carousel"	=> 'scroll',
			"Grid" 		=> 'grid'
		);
	$modStyle = array(
			"Tabs"		=> 'tab',
			"Normal"	=> 'normal'
		);
	if (isset($mod_name) && $mod_name != '') {
		$module_arr = $mod_name;
		$mod_title = null;
	}else{
		$module_arr = 'rgen_customprd'.$mod_id;
		$mod_title = "<span style='margin-right:10px;'>Add new module</span>";
	}

	$i = 0;
	$module = array();
	$sectiondata = array();
	if (isset($get_module)) {
		foreach($get_module as $value){ $module = $value; $sectiondata = $value['section_data']; }
	}else{
		$sectiondata = array(0);
	}
	
	//echo "<pre style='color:;'>" . print_r($module, TRUE) . "</pre>";
?>

<div class="rgen-customprd-wrp">
	<?php if ($sectiondata) { ?>
	<input type="hidden" class="mod-arr" value="<?php echo $module_arr; ?>">
	<input type="hidden" class="save-url" value="index.php?route=module/rgen_customproducts/save&token=<?php echo $token; ?><?php echo isset($mod_name) ? '&mod_name='.$mod_name : null; ?>">
	<div class="section-title clearfix">
		
		<?php 
			// Module title
			echo $mod_title;

			$dbKey 	= isset($module['section_name']) && $module['section_name'] != '' ? $module['section_name'] : 'Custom module '.$mod_count;
			$name	= $module_arr.'[section_name]';
		?>
		<input type="text" data-clone="sort_order" placeholder="Enter module name" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
		<?php 
			$dbKey 	= isset($module['mod_id']) && $module['mod_id'] != '' ? $module['mod_id'] : $module_arr;
			$name	= $module_arr.'[mod_id]';
		?>
		<input type="hidden" data-clone="mod_id" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
		<!-- Add new module -->
		<div class="buttons pull-right" style="margin: -9px -10px 0 0;">
			<a id="saveBtn" class="btn btn-success btn-large">Save</a>
			<a class='btn btn-large btn-success add-new'><i class="icon-plus icon-white"></i></a>
		</div>
	</div>
	<?php } ?>

	<div class="get-clone">
		<?php 
		foreach ($sectiondata as $section_key => $section) {
		$module_row = $module_arr.'[section_data]['.$i.']'; ?>
		<div class="form-group" id="section-<?php echo $i; ?>">
			<div class="group-options">
				<?php 
					$dbKey 	= isset($section['status']) ? $section['status'] : '0';
					$name	= $module_row.'[status]';
					$id		= 'status'.$i;
				?>
				<span class="switch">
					<input type="checkbox" id="<?php echo $id; ?>" data-clone="status" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
					<label for="<?php echo $id; ?>" class="switch-img"></label>
					<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" data-clone="status" value="0"><?php }?>
				</span>
				<?php 
					$dbKey 	= isset($section['sort_order']) ? $section['sort_order'] : '';
					$name	= $module_row.'[sort_order]';
				?>
				<div class="input-prepend">
					<span class="add-on" title="">Sort order</span>
					<input type="text" class="input-mini" data-clone="sort_order" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
				</div>
				<a class='btn btn-danger section-del'><i class="icon-remove icon-white"></i></a>
			</div>
			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<?php foreach ($languages as $language) { ?>
						<?php 
							$dbKey 	= isset($section['title'][$language['language_id']]) ? $section['title'][$language['language_id']] : '';
							$name	= $module_row.'[title]['.$language['language_id'].']';
						?>
						<div class="input-prepend" style="display:block;">
							<span class="add-on" title="<?php echo $language['name']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>"></span>
							<input type="text" class="input-large" data-clone="title-<?php echo $language['language_id']; ?>" placeholder="" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Apply CSS class</label>
					<div class="controls">
						<?php 
							$dbKey 	= isset($section['css_class']) ? $section['css_class'] : '';
							$name	= $module_row.'[css_class]';
						?>
						<input type="text" placeholder="Enter CSS class name" data-clone="css_class" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Settings</label>
					<div class="controls">
						<table class="subfields mb10">
							<tr>
								<td>
									<span class="lbl">Module type</span>
									<?php 
										$ar 	= $prdTypes;
										$ar1 	= $cat_brdTypes;
										$dbKey 	= isset($section['prdTypes']) ? $section['prdTypes'] : '';
										$name	= $module_row.'[prdTypes]';
									?>
									<span class='select prdTypes'>
										<select name="<?php echo $name; ?>" data-clone="prdTypes">
											<optgroup label="Product display sections">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
											</optgroup>
											<optgroup label="Category or brands display sections">
											<?php foreach ($ar1 as $key1 => $value1) { ?>
												<?php ($value1 ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value1; ?>" <?php echo $selected; ?>><?php echo $key1; ?></option>
											<?php } ?>
											</optgroup>
										</select>
									</span>
								</td>
								<td>
									<span class="lbl">Display</span>
									<?php 
										$ar 	= $prdStyle;
										$dbKey 	= isset($section['prdStyle']) ? $section['prdStyle'] : '';
										$name	= $module_row.'[prdStyle]';
									?>
									<span class='select'>
										<select name="<?php echo $name; ?>" data-clone="prdStyle" class="input-small">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</td>
								<td class="prd-boxstyle"<?php echo isset($section['prdTypes']) && $section['prdTypes'] == 'catSection' || $section['prdTypes'] == 'selcatSection' || $section['prdTypes'] == 'brandSection' ? " style='display:none;'" : null; ?>>
									<span class="lbl">Product box style</span>
									<?php 
										$ar 	= $prdboxStyle;
										$dbKey 	= isset($section['prdboxStyle']) ? $section['prdboxStyle'] : '';
										$name	= $module_row.'[prdboxStyle]';
									?>
									<span class='select'>
										<select name="<?php echo $name; ?>" data-clone="prdboxStyle" style="width:164px;">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</td>
								<td class="display-prd"<?php echo isset($section['prdTypes']) && $section['prdTypes'] == 'custPrd' || $section['prdTypes'] == 'catSection' || $section['prdTypes'] == 'selcatSection' || $section['prdTypes'] == 'brandSection' ? " style='display:none;'" : null; ?>>
									<span class="lbl">Limit</span>
									<?php 
										$dbKey 	= isset($section['prdlimit']) ? $section['prdlimit'] : '8';
										$name	= $module_row.'[prdlimit]';
									?>
									<input type="text" class="input-small" data-clone="prdlimit" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</td>
							</tr>
						</table>
						<div class="prdTypes-options">

							<!-- Category selection -->
							<div class="cat-selection catPrd-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'catPrd' ? 'display:block' : 'display:none'; ?>">
								<div class="selected-cat" id="cat-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type category name to insert</span>
									<?php 
										$dbKey 	= isset($section['category_name']) ? $section['category_name'] : '';
										$name	= $module_row.'[category_name]';
									?>
									<input type="text" placeholder="Type category name to insert" data-clone="cat_name" name="<?php echo $name; ?>" class="find-cat" value="<?php echo $dbKey; ?>" />
									<?php 
										$dbKey 	= isset($section['category_id']) ? $section['category_id'] : '';
										$name	= $module_row.'[category_id]';
									?>
									<input type="hidden" data-clone="cat_id" name="<?php echo $name; ?>" class="cat-values" value="<?php echo $dbKey; ?>" />
								</div>
							</div>

							<!-- Product selection -->
							<div class="prd-selection custPrd-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'custPrd' ? 'display:block' : 'display:none'; ?>">
								<div class="selected-prd" id="prd-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type product name to insert</span>
									<input type="text" placeholder="Type product name to insert" data-name="<?php echo $module_row.'[products][]'; ?>" class="find-prd" value="" /><br>
									<div class="select_scrollbox scrollbox prd-sel">
										<?php 
										if ($section['prdTypes'] == "custPrd" && isset($rgen_prdlist[$section_key])) {
										foreach ($rgen_prdlist[$section_key] as $prd) { ?>
										<div><?php echo $prd['name']; ?>
											<img src="view/image/delete.png" alt="" />
											<input type="hidden" name="<?php echo $module_row.'[products][]'; ?>" value="<?php echo $prd['product_id']; ?>" />
										</div>
										<?php } } ?>
									</div>
								</div>
							</div>

							<!-- Brand selection -->
							<div class="brand-selection brandPrd-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'brandPrd' ? 'display:block' : 'display:none'; ?>">
								<div class="selected-brand" id="brand-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type manufacturer name to insert</span>
									<?php 
										$dbKey 	= isset($section['brand_name']) ? $section['brand_name'] : '';
										$name	= $module_row.'[brand_name]';
									?>
									<input type="text" placeholder="Type manufacturer name to insert" data-clone="brand_name" name="<?php echo $name; ?>" class="find-brand" value="<?php echo $dbKey; ?>" />
									<?php 
										$dbKey 	= isset($section['brand_id']) ? $section['brand_id'] : '';
										$name	= $module_row.'[brand_id]';
									?>
									<input type="hidden" data-clone="brand_id" name="<?php echo $name; ?>" class="brand-values" value="<?php echo $dbKey; ?>" />
								</div>
							</div>

							<!-- Category section -->
							<div class="cat-selection catSection-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'catSection' ? 'display:block' : 'display:none'; ?>">
								<div class="mb10 selected-cat-section" id="cat-section-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type category name to insert</span>
									<?php 
										$dbKey 	= isset($section['category_sec_name']) ? $section['category_sec_name'] : '';
										$name	= $module_row.'[category_sec_name]';
									?>
									<input type="text" placeholder="Type category name to insert" data-clone="cat_sec_name" name="<?php echo $name; ?>" class="find-cat cat-section" value="<?php echo $dbKey; ?>" />
									<?php 
										$dbKey 	= isset($section['category_sec_id']) ? $section['category_sec_id'] : '';
										$name	= $module_row.'[category_sec_id]';
									?>
									<input type="hidden" data-clone="cat_sec_id" name="<?php echo $name; ?>" class="cat-values" value="<?php echo $dbKey; ?>" />
								</div>
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">Sub category limit</span>
											<?php 
												$dbKey 	= isset($section['category_sec_limit']) ? $section['category_sec_limit'] : '';
												$name	= $module_row.'[category_sec_limit]';
											?>
											<input type="text" class="input-small" data-clone="category_sec_limit" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											<a class="helpbtn" style="margin-left: 10px;" data-type="info" data-info="Leave blank to disable limit">?</a>
										</td>
									</tr>
								</table>
							</div>

							<!-- Selected Category selection -->
							<div class="cat-selection selcatSection-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'selcatSection' ? 'display:block' : 'display:none'; ?>">
								<div class="mb10 selected-selcat-section" id="selcat-section-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type category name to insert</span>
									<input type="text" placeholder="Type category name to insert" data-name="<?php echo $module_row.'[selcat_section][]'; ?>" class="find-cat selcat-section" value="" /><br>
									<div class="select_scrollbox scrollbox cat-sel">
										<?php 
										if ($section['prdTypes'] == "selcatSection" && isset($rgen_catlist[$section_key])) {
										foreach ($rgen_catlist[$section_key] as $cat) { ?>
										<div><?php echo $cat['name']; ?>
											<img src="view/image/delete.png" alt="" />
											<input type="hidden" name="<?php echo $module_row.'[selcat_section][]'; ?>" value="<?php echo $cat['category_id']; ?>" />
										</div>
										<?php } } ?>
									</div>
								</div>
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">Display category products</span>
											<?php 
												$ar 	= array('No' => 'n', 'Yes' => 'y');
												$dbKey 	= isset($section['selcat_prd_status']) ? $section['selcat_prd_status'] : '';
												$name	= $module_row.'[selcat_prd_status]';
											?>
											<span class='select'>
												<select name="<?php echo $name; ?>" data-clone="selcat_prd_status" style="width:164px;">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
														<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
													<?php } ?>
												</select>
											</span>
										</td>
										<td>
											<span class="lbl">Display style <a class="helpbtn helpbtn-small" style="margin-left: 5px;" data-type="img" data-info="view/image/rgen_theme/customproducts-cat-help1.png">?</a></span>
											<?php 
												$ar 	= array('Style 1' => '1', 'Style 2' => '2');
												$dbKey 	= isset($section['selcat_prd_style']) ? $section['selcat_prd_style'] : '';
												$name	= $module_row.'[selcat_prd_style]';
											?>
											<span class='select'>
												<select name="<?php echo $name; ?>" data-clone="selcat_prd_style" style="width:164px;">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
														<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
													<?php } ?>
												</select>
											</span>
										</td>
										<td>
											<span class="lbl">Limit <a class="helpbtn helpbtn-small" style="margin-left: 5px;" data-type="info" data-info="Default value is 5 if leave blank limit">?</a></span>
											<?php 
												$dbKey 	= isset($section['selcat_prd_limit']) ? $section['selcat_prd_limit'] : '';
												$name	= $module_row.'[selcat_prd_limit]';
											?>
											<input type="text" class="input-small" data-clone="selcat_prd_limit" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
										</td>
									</tr>
								</table>
							</div>


							<!-- Selected Brands selection -->
							<div class="brand-selection brandSection-auto autocomplete-block" style="<?php echo $section['prdTypes'] == 'brandSection' ? 'display:block' : 'display:none'; ?>">
								<div class="mb10 selected-brand-sec" id="brand-section-auto-<?php echo $i; ?>" style="display:block;">
									<span class="lbl-1">Type manufacturer name to insert</span>
									<input type="text" placeholder="Type manufacturer name to insert" data-name="<?php echo $module_row.'[selbrand_section][]'; ?>" class="find-brand selbrand-section" value="" /><br>
									<div class="select_scrollbox scrollbox brand-sel">
										<?php 
										if ($section['prdTypes'] == "brandSection" && isset($rgen_brandlist[$section_key])) {
										foreach ($rgen_brandlist[$section_key] as $brand) { ?>
										<div><?php echo $brand['name']; ?>
											<img src="view/image/delete.png" alt="" />
											<input type="hidden" name="<?php echo $module_row.'[selbrand_section][]'; ?>" value="<?php echo $brand['manufacturer_id']; ?>" />
										</div>
										<?php } } ?>
									</div>
								</div>
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">Display brand products</span>
											<?php 
												$ar 	= array('No' => 'n', 'Yes' => 'y');
												$dbKey 	= isset($section['selbrand_prd_status']) ? $section['selbrand_prd_status'] : '';
												$name	= $module_row.'[selbrand_prd_status]';
											?>
											<span class='select'>
												<select name="<?php echo $name; ?>" data-clone="selbrand_prd_status" style="width:164px;">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
														<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
													<?php } ?>
												</select>
											</span>
										</td>
										<td>
											<span class="lbl">Display style <a class="helpbtn helpbtn-small" style="margin-left: 5px;" data-type="img" data-info="view/image/rgen_theme/customproducts-brand-help1.png">?</a></span>
											<?php 
												$ar 	= array('Style 1' => '1', 'Style 2' => '2');
												$dbKey 	= isset($section['selbrand_prd_style']) ? $section['selbrand_prd_style'] : '';
												$name	= $module_row.'[selbrand_prd_style]';
											?>
											<span class='select'>
												<select name="<?php echo $name; ?>" data-clone="selbrand_prd_style" style="width:164px;">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
														<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
													<?php } ?>
												</select>
											</span>
										</td>
										<td>
											<span class="lbl">Limit <a class="helpbtn helpbtn-small" style="margin-left: 5px;" data-type="info" data-info="Default value is 5 if leave blank limit">?</a></span>
											<?php 
												$dbKey 	= isset($section['selbrand_prd_limit']) ? $section['selbrand_prd_limit'] : '';
												$name	= $module_row.'[selbrand_prd_limit]';
											?>
											<input type="text" class="input-small" data-clone="selbrand_prd_limit" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											
										</td>
									</tr>
								</table>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		<?php $i++; } ?>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {

	$(window).off( "click", ".add-new");
	$(window).on("click", ".add-new", function(){
		var i = $('.get-clone .form-group:last-child').attr("id");
			i = parseInt(i.replace("section-",""));
			i++;
			console.log(i);

		var modarr = $('.mod-arr').val();

		var getClone = $(".get-clone > .form-group:first").html();
		//$(getClone).find('input[data-clone="title"]').attr("name","test");
		$(".get-clone").append('<div class="form-group" id="section-'+i+'">'+getClone+'</div>');
		
		// Reset data
		$('#section-'+i+' input[type=\'text\'], #section-'+i+' input[type=\'hidden\'], #section-'+i+' select').val('');
		$('#section-'+i+' .prd-boxstyle, #section-'+i+' .display-prd').show();
		//$('#section-'+i+' select').val('');

		<?php foreach ($languages as $language) { ?>
		$('#section-'+i+' input[data-clone="title-<?php echo $language['language_id'] ?>"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][title][<?php echo $language['language_id'] ?>]');
		<?php } ?>
		$('#section-'+i+' [data-clone="prdTypes"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][prdTypes]');
		$('#section-'+i+' [data-clone="prdStyle"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][prdStyle]');
		$('#section-'+i+' [data-clone="prdboxStyle"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][prdboxStyle]');
		$('#section-'+i+' [data-clone="prdlimit"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][prdlimit]').val(8);
		$('#section-'+i+' [data-clone="status"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][status]');
		$('#section-'+i+' [data-clone="status"]').attr("id",'status'+i);
		$('#section-'+i+' [data-clone="status"]').next().attr("for",'status'+i);
		$('#section-'+i+' [data-clone="sort_order"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][sort_order]');
		$('#section-'+i+' [data-clone="cat_prdlimit"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][cat_prdlimit]');
		$('#section-'+i+' [data-clone="css_class"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][css_class]');
		
		// Category selection
		$('#section-'+i+' [data-clone="cat_name"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][category_name]');
		$('#section-'+i+' [data-clone="cat_id"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][category_id]');
		//$('#section-'+i+' .cat-values').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][categories][]');
		$('#section-'+i+' .selected-cat').attr("id",'cat-auto-'+i);

		// Brand selection
		$('#section-'+i+' [data-clone="brand_name"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][brand_name]');
		$('#section-'+i+' [data-clone="brand_id"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][brand_id]');
		$('#section-'+i+' .selected-brand').attr("id",'brand-auto-'+i);

		// Product selection
		$('#section-'+i+' .find-prd').attr("data-name",'<?php echo $module_arr; ?>[section_data]['+i+'][products][]');
		$('#section-'+i+' .selected-prd').attr("id",'prd-auto-'+i);

		// Category section
		$('#section-'+i+' [data-clone="cat_sec_name"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][category_sec_name]');
		$('#section-'+i+' [data-clone="cat_sec_id"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][category_sec_id]');
		$('#section-'+i+' .selected-cat-section').attr("id",'cat-section-auto-'+i);
		$('#section-'+i+' [data-clone="category_sec_limit"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][category_sec_limit]');

		// Selected Category section
		$('#section-'+i+' .selcat-section').attr("data-name",'<?php echo $module_arr; ?>[section_data]['+i+'][selcat_section][]');
		$('#section-'+i+' .selected-selcat-section').attr("id",'selcat-section-auto-'+i);
		$('#section-'+i+' [data-clone="selcat_prd_status"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selcat_prd_status]');
		$('#section-'+i+' [data-clone="selcat_prd_style"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selcat_prd_style]');
		$('#section-'+i+' [data-clone="selcat_prd_limit"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selcat_prd_limit]');
		
		// Selected Brands section
		$('#section-'+i+' .selbrand-section').attr("data-name",'<?php echo $module_arr; ?>[section_data]['+i+'][selbrand_section][]');
		$('#section-'+i+' .selected-brand-sec').attr("id",'brand-section-auto-'+i);
		$('#section-'+i+' [data-clone="selbrand_prd_status"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selbrand_prd_status]');
		$('#section-'+i+' [data-clone="selbrand_prd_style"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selbrand_prd_style]');
		$('#section-'+i+' [data-clone="selbrand_prd_limit"]').attr("name",'<?php echo $module_arr; ?>[section_data]['+i+'][selbrand_prd_limit]');

		// Clear selection box
		$('#section-'+i+' .autocomplete-block .scrollbox').html(null);
		$('#section-'+i+' .autocomplete-block').hide();

		var section = "#section-"+i;
		catAutocomplete(section);
		prdAutocomplete(section);
		brandAutocomplete(section);
		//i++;
	});

	$(window).off( "change", ".prdTypes select");
	$(window).on("change", ".prdTypes select", function(){
		$(this).closest(".controls").find('.autocomplete-block .scrollbox').html(null);
		$(this).closest(".controls").find('.autocomplete-block input').val('');
		$(this).closest(".controls").find(".prdTypes-options").children('div').hide();
		$(this).closest(".controls").find('.'+$(this).val()+'-auto').show();
		if ($(this).val() == 'catSection' || $(this).val() == 'selcatSection' || $(this).val() == 'brandSection'){
			$(this).closest(".subfields").find('.prd-boxstyle').hide();
		}else{
			$(this).closest(".subfields").find('.prd-boxstyle').show();
		};
		if ($(this).val() == 'custPrd' || $(this).val() == 'catSection' || $(this).val() == 'selcatSection' || $(this).val() == 'brandSection'){
			$(this).closest(".subfields").find('.display-prd').hide();
		}else{
			$(this).closest(".subfields").find('.display-prd').show();
		};
	});

	$(window).off( "click", ".section-del");
	$(window).on("click", ".section-del", function(){
		if ($(".get-clone .form-group").length > 1) {
			$(this).closest(".form-group").remove();
		}else{
			new Messi('Last module cannot be deleted.', {
				title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});	
		};
	});

	$('.form-group').each(function(){
		var section = "#" + $(this).attr("id");
		catAutocomplete(section);
		prdAutocomplete(section);
		brandAutocomplete(section);
	});
	function catAutocomplete(section) {
		$(section+" .find-cat").autocomplete({
		//$('.find-cat').autocomplete({
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
				
				if ($(this).hasClass('selcat-section')) {
					var catBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
					var nameVal = $(this).attr('data-name');
					$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="'+nameVal+'" value="' + ui.item.value + '" /></div>');
				}else{
					var catBox = '#' + $(this).parent().attr('id') + ' .cat-values';
					$(this).val(ui.item.label);
					$(catBox).val(ui.item.value);	
				};
				
				return false;
			},
			focus: function(event, ui) {
			  return false;
		   }
		});
		$(window).off( "click", ".cat-sel div img");
		$(window).on('click', '.cat-sel div img', function() {
			$(this).parent().remove();
		});
	}
	
	function prdAutocomplete(section) {
		$(section+' .find-prd').autocomplete({
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
				var nameVal = $(this).attr('data-name');
				$(prdBox + ui.item.value).remove();
				$(prdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="'+nameVal+'" value="' + ui.item.value + '" /></div>');
				
				return false;
			},
			focus: function(event, ui) {
				return false;
			}
		});
		$(window).off( "click", ".prd-sel div img");
		$(window).on('click', '.prd-sel div img', function() {
			$(this).parent().remove();
		});
	}

	
	function brandAutocomplete(section) {
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

				if ($(this).hasClass('selbrand-section')) {
					var catBox = '#' + $(this).parent().attr('id') + ' .scrollbox';
					var nameVal = $(this).attr('data-name');
					$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="'+nameVal+'" value="' + ui.item.value + '" /></div>');
				}else{
					var catBox = '#' + $(this).parent().attr('id') + ' .brand-values';
					var nameVal = $(this).attr('data-name');
					$(this).val(ui.item.label);
					$(catBox).val(ui.item.value);
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
	
	
});
</script>
