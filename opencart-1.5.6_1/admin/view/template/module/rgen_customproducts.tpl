<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/messi.min.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<link rel='stylesheet' href='view/stylesheet/spectrum.css' />
<script src='view/javascript/rgen/spectrum.js'></script>

<style type="text/css">
.table td{ vertical-align: middle; text-align: center; }
input[disabled="disabled"]{ opacity: 0.4; }
.info-selection .selected-info, .brand-selection .selected-brand, .prd-selection .selected-prd, .cat-selection .selected-cat {
margin-top: 10px;
}
</style>
<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } 

$modStyle = array(
	"Normal"	=> 'normal',
	"Tabs"		=> 'tab'
);
$tabStyle = array(
	"Default"		=> '',
	"Style 1"		=> 1,
	"Style 2"		=> 2,
	"Style 3"		=> 3,
	"Style 4"		=> 4,
	"Style 5"		=> 5
);
$tabAlign = array(
	"Left"		=> 'l',
	"Center"	=> 'c'
);
$yn = array(
	"No" => 'n',
	"Yes" => 'y'
);

$positions = array(
			$text_content_top				=> 'content_top',
			$text_content_bottom			=> 'content_bottom',
			$text_column_left				=> 'column_left',
			$text_column_right				=> 'column_right'
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
<div id="content" class="rgen-customprd-mod section-list">
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
				<h2 class="pull-left mod-title">CUSTOM MODULES</h2>
				<div class="buttons pull-right">
					<a id="saveBtn" class="btn btn-success btn-large"><?php echo $button_save; ?></a>
					<a onclick="location = '<?php echo $manage; ?>';" class="btn btn-danger btn-large">Manage custom modules</a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-large">Back</a>
				</div>
			</div>
		</div>
		<form id="form" enctype="multipart/form-data">
		<div class="mod-content section-list">
			<div class="alert alert-info">Tabs dose not support in side column</div>

			<table class="table table-bordered extra-pd">
				<thead>
					<tr class="table-header">
						<th class="section-settings" style="width: 400px;">Section settings</th>
						<th class="img-option">Image size (W x H)</th>
						<th class="layout-option" style="width:450px;">Layout &amp; Position</th>
						<th class="status">Status</th>
						<th class="order">Sort order</th>
						<th class="other"><a class='btn btn-success add-new'><i class="icon-plus icon-white"></i></a></th>
					</tr>
				</thead>
				<?php $module_row = 0; ?>
				<?php if($sectionlist){ ?>
				<tbody class="get-clone">
					<?php foreach ($modules as $module) { ?>
					<tr id="section-<?php echo $module_row; ?>">
						<td class="section-settings">
							<?php 
								$ar 	= $sectionlist;
								$dbKey 	= isset($module['setting_id']) ? $module['setting_id'] : 'rgen_customprd_setting'.$module_row;
								$name	= 'rgen_customproducts_module['.$module_row.'][setting_id]';
							?>
							<input type="hidden" data-clone="setting_id" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
							<div class="form-horizontal frm-small">
								<div class="control-group">
									<label class="control-label">Select custom module</label>
									<div class="controls">
										<?php 
											$ar 	= $sectionlist;
											$dbKey 	= isset($module['mod_id']) ? $module['mod_id'] : '';
											$name	= 'rgen_customproducts_module['.$module_row.'][mod_id]';
										?>
										<span class='select'>
											<select name="<?php echo $name; ?>" data-clone="prdSection">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value['mod_id'] ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $value['mod_id']; ?>" <?php echo $selected; ?>><?php echo $value['name']; ?></option>
												<?php } ?>
											</select>
										</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Section display</label>
									<div class="controls">
										<?php 
											$ar 	= $modStyle;
											$dbKey 	= isset($module['modStyle']) ? $module['modStyle'] : '';
											$name	= 'rgen_customproducts_module['.$module_row.'][modStyle]';
										?>
										<span class='select'>
											<select name="<?php echo $name; ?>" class="input-small" data-clone="modStyle">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
												<?php } ?>
											</select>
										</span>
									</div>
								</div>
								<div class="control-group tab-style"<?php echo isset($module['modStyle']) && $module['modStyle'] == "tab" ? " style='display:;'" : " style='display:none;'" ?>>
									<label class="control-label">Tab settings <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/tab-styles.gif">?</a></label>
									<div class="controls">
										<?php 
											$ar 	= $tabStyle;
											$dbKey 	= isset($module['tabStyle']) ? $module['tabStyle'] : '';
											$name	= 'rgen_customproducts_module['.$module_row.'][tabStyle]';
										?>
										<span class='select'>
											<select name="<?php echo $name; ?>" class="input-small" data-clone="tabStyle">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
												<?php } ?>
											</select>
										</span>
										<?php 
											$ar 	= $tabAlign;
											$dbKey 	= isset($module['tabAlign']) ? $module['tabAlign'] : '';
											$name	= 'rgen_customproducts_module['.$module_row.'][tabAlign]';
										?>
										<span class='select'>
											<select name="<?php echo $name; ?>" class="input-small" data-clone="tabAlign">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
												<?php } ?>
											</select>
										</span>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Display in full block</label>
									<div class="controls">
										<?php 
											$ar 	= $yn;
											$dbKey 	= isset($module['fullB']) ? $module['fullB'] : '';
											$name	= 'rgen_customproducts_module['.$module_row.'][fullB]';
										?>
										<span class='select'>
											<select name="<?php echo $name; ?>" class="input-small" data-clone="fullB">
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
										Display in full block section does not support in page with side column layout and position with "Column Right" and "Column Left" inside side column.
									</div>
									<div class="control-group">
										<label class="control-label">Apply CSS class</label>
										<div class="controls">
											<?php 
												$dbKey 	= isset($module['fullB_class']) ? $module['fullB_class'] : '';
												$name	= 'rgen_customproducts_module['.$module_row.'][fullB_class]';
											?>
											<input type="text" class="input-medium" data-clone="fullB_class" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											<a class="btn btn-mini" data-val="dark-thm">On dark</a>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Background color</label>
										<div class="controls">
											<?php 
												$dbKey 	= isset($module['fullB_bgcolor']) ? $module['fullB_bgcolor'] : '';
												$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgcolor]';
											?>
											<input type="text" class="rgb" data-clone="fullB_bgcolor" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Background image</label>
										<div class="controls">
											<div class="img-preview mb10" style="vertical-align: top;">
												<?php
													$dbKey  = isset($module['fullB_bgimg']) ? $module['fullB_bgimg'] : '';
													$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgimg]';
													$id		= 'fullB'.$module_row.'-bgimg';
												?>
												<div data-clone="fullB_bgimg-preview" class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
												<div class="btn-group btn-group-vertical">
													<a class="btn btn-small browse" data-clone="fullB_bgimg-preview-id" data-idname="<?php echo $id; ?>">Browse</a>
													<a class="btn btn-small clear" data-clone="fullB_bgimg-preview-clear" data-idname="<?php echo $id; ?>">Clear</a>
												</div>
												<input type="hidden" id="<?php echo $id; ?>" data-clone="fullB_bgimg" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Background settings</label>
										<div class="controls">
											<?php 
												$ar 	= $bodyBgAttachment;
												$dbKey 	= isset($module['fullB_bgAttachment']) ? $module['fullB_bgAttachment'] : '';
												$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgAttachment]';
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
												$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgrepeat]';
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
												$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgposition]';
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
													$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgps1]';
												?>
												<input type="text" class="input-mini" data-clone="fullB_bgps1" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
												<?php 
													$dbKey 	= isset($module['fullB_bgps2']) ? $module['fullB_bgps2'] : '';
													$name	= 'rgen_customproducts_module['.$module_row.'][fullB_bgps2]';
												?>
												<input type="text" class="input-mini" data-clone="fullB_bgps2" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td class="img-option">
							<div class="mb10">
								<span class="lbl-1">Width</span>
								<?php 
									$dbKey 	= isset($module['img_w']) ? $module['img_w'] : '100';
									$name	= 'rgen_customproducts_module['.$module_row.'][img_w]';
								?>
								<input type="text" class="input-mini" data-clone="img_w" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
							</div>
							<div class="mb10">
								<span class="lbl-1">Height</span>
								<?php 
									$dbKey 	= isset($module['img_h']) ? $module['img_h'] : '100';
									$name	= 'rgen_customproducts_module['.$module_row.'][img_h]';
								?>
								<input type="text" class="input-mini" data-clone="img_h" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								<a class="helpbtn" style="vertical-align: middle; margin-left: 10px;" data-type="img" data-info="view/image/rgen_theme/customproducts-help1.png">?</a>
							</div>
						</td>
						<td class="layout-option">
							<div class="mb10">
								<span class="lbl-1">Layout</span>
								<?php 
								$ar 	= $layouts;
								$dbKey 	= isset($module['layout_id']) ? $module['layout_id'] : 'home';
								$name	= 'rgen_customproducts_module[' . $module_row . '][layout_id]';
								?>
								<span class='select'>
									<select name="<?php echo $name; ?>" data-clone="layout_id" class="input-medium layout-select">
										<?php foreach ($ar as $key => $value) { 
											isset($value['route'][0]) ? $routeInfo = $value['route'][0]['route'] : $routeInfo = '';
											$modLayoutID = isset($module['layout_id']) ? $module['layout_id'] : null;
										?>
											<?php ($value['layout_id'] ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option data-route="<?php echo $routeInfo; ?>" value="<?php echo $value['layout_id']; ?>" <?php echo $selected; ?>><?php echo $value['name']; ?></option>
										<?php } ?>
									</select>
								</span>
							</div>
							<div class="mb10">
								<span class="lbl-1">Position</span>
								<?php 
									$ar 	= $positions;
									$dbKey 	= isset($module['position']) ? $module['position'] : 'content_top';
									$name	= 'rgen_customproducts_module[' . $module_row . '][position]';
								?>
								<span class='select'>
									<select name="<?php echo $name; ?>" data-clone="position" class="input-medium">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
							</div>
							<!-- Category selection -->
							<div class="control-group cat-select-wrp" style="display:<?php if(isset($module['cat_status'])){ echo "block;"; }else{echo "none;";} ?>;">
								<label class="lbl-1">Display content</label>
								<div class="controls cat-selection" id="rgen_customproducts_module<?php echo $module_row; ?>-cat-sel">
									
									<?php 
									$ar 	= array( 'On all categories' => 'allc', 'On selected category' => 'selc');
									$dbKey 	= isset($module['cat_status']) ? $module['cat_status'] : '';
									$name	= 'rgen_customproducts_module[' . $module_row . '][cat_status]';
									$id		= 'cat_status' . $module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" data-clone="cat_status" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>

									<div class="selected-cat edit-mod" data-clone="categories" id="rgen_customproducts_module<?php echo $module_row; ?>-cat" data-array="rgen_customproducts_module[<?php echo $module_row; ?>][category][]" style="display:<?php if(isset($module['cat_status']) && $module['cat_status'] == "selc"){ echo "block"; }else{ echo ""; } ?>;">
										<input type="text" placeholder="Type category name to insert" class="find-cat auto-textbox" value="" /><br>
							            <div class="select_scrollbox scrollbox cat-sel">
											<?php 
											if (isset($module['cat_status']) && isset($rgen_catlist_layout[$module['setting_id']])) {
											foreach ($rgen_catlist_layout[$module['setting_id']] as $category) { ?>
											<div><?php echo $category['name']; ?>
												<img src="view/image/delete.png" alt="" />
												<input type="hidden" name="rgen_customproducts_module[<?php echo $module_row; ?>][category][]" value="<?php echo $category['category_id']; ?>" />
											</div>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>

							<!-- Product selection -->
							<div class="control-group prd-select-wrp" style="display:<?php if(isset($module['prd_status'])){ echo "block;"; }else{echo "none;";} ?>">
								<label class="lbl-1">Display content</label>
								<div class="controls prd-selection edit-mod" id="rgen_customproducts_module<?php echo $module_row; ?>-prd-sel">
									
									<?php 
									$ar 	= array( 'On all products' => 'allp', 'On selected product' => 'selp');
									$dbKey 	= isset($module['prd_status']) ? $module['prd_status'] : '';
									$name	= 'rgen_customproducts_module[' . $module_row . '][prd_status]';
									$id		= 'prd_status' . $module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" data-clone="prd_status" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>

									<div class="selected-prd edit-mod" data-clone="products" id="rgen_customproducts_module<?php echo $module_row; ?>-prd" data-array="rgen_customproducts_module[<?php echo $module_row; ?>][products][]" style="display:<?php if(isset($module['prd_status']) && $module['prd_status'] == "selp"){ echo "block"; }else{ echo ""; } ?>;">
										<input type="text" placeholder="Type product name to insert" class="find-prd auto-textbox" value="" /><br>
							            <div class="select_scrollbox scrollbox prd-sel">
											<?php 
											if (isset($module['prd_status']) && isset($rgen_prdlist_layout[$module['setting_id']])) {
											foreach ($rgen_prdlist_layout[$module['setting_id']] as $product) { ?>
											<div><?php echo $product['name']; ?>
												<img src="view/image/delete.png" alt="" />
												<input type="hidden" name="rgen_customproducts_module[<?php echo $module_row; ?>][products][]" value="<?php echo $product['product_id']; ?>" />
											</div>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>

							<!-- Brand selection -->
							<div class="control-group brand-select-wrp" style="display:<?php if(isset($module['brand_status'])){ echo "block;"; }else{echo "none;";} ?>">
								<label class="lbl-1">Display content</label>
								<div class="controls brand-selection" id="rgen_customproducts_module<?php echo $module_row; ?>-brand-sel">
									
									<?php 
									$ar 	= array( 'On all brands' => 'allb', 'On selected brand' => 'selb');
									$dbKey 	= isset($module['brand_status']) ? $module['brand_status'] : '';
									$name	= 'rgen_customproducts_module[' . $module_row . '][brand_status]';
									$id		= 'brand_status' . $module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" data-clone="brand_status" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>

									<div class="selected-brand edit-mod" data-clone="brands" id="rgen_customproducts_module<?php echo $module_row; ?>-brand" data-array="rgen_customproducts_module[<?php echo $module_row; ?>][brands][]" style="display:<?php if(isset($module['brand_status']) && $module['brand_status'] == "selb"){ echo "block"; }else{ echo ""; } ?>;">
										<input type="text" placeholder="Type manufacturer name to insert" class="find-brand auto-textbox" value="" /><br>
							            <div class="select_scrollbox scrollbox brand-sel">
											<?php 
											if (isset($module['brand_status']) && isset($rgen_brandlist_layout[$module['setting_id']])) {
											foreach ($rgen_brandlist_layout[$module['setting_id']] as $brand) { ?>
											<div><?php echo $brand['name']; ?>
												<img src="view/image/delete.png" alt="" />
												<input type="hidden" name="rgen_customproducts_module[<?php echo $module_row; ?>][brands][]" value="<?php echo $brand['manufacturer_id']; ?>" />
											</div>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>

							<!-- Information selection -->
							<div class="control-group info-select-wrp" style="display:<?php if(isset($module['info_status'])){ echo "block;"; }else{echo "none;";} ?>">
								<label class="lbl-1">Display content</label>
								<div class="controls info-selection" id="rgen_customproducts_module<?php echo $module_row; ?>-info">
									
									<?php 
									$ar 	= array( 'On all information pages' => 'alli', 'On selected information page' => 'seli');
									$dbKey 	= isset($module['info_status']) ? $module['info_status'] : '';
									$name	= 'rgen_customproducts_module[' . $module_row . '][info_status]';
									$id		= 'info_status'.$module_row;
									?>
									<div class="btn-group" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
												<input type="radio" data-clone="info_status" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>

									<div class="selected-info edit-mod" id="rgen_customproducts_module<?php echo $module_row; ?>-info" data-array="rgen_customproducts_module[<?php echo $module_row; ?>][info][]" style="display:<?php if(isset($module['info_status']) && $module['info_status'] == "seli"){ echo "block"; }else{ echo ""; } ?>;">
										<input type="text" placeholder="Type information page name to insert" class="find-info auto-textbox" value="" /><br>
							            <div class="select_scrollbox scrollbox info-sel">
											<?php 
											if (isset($module['info_status']) && isset($rgen_infolist_layout[$module['setting_id']])) {
											foreach ($rgen_infolist_layout[$module['setting_id']] as $info) { ?>
											<div><?php echo $info['name']; ?>
												<img src="view/image/delete.png" alt="" />
												<input type="hidden" name="rgen_customproducts_module[<?php echo $module_row; ?>][info][]" value="<?php echo $info['information_id']; ?>" />
											</div>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td class="status">
							<?php 
								$dbKey 	= isset($module['status']) ? $module['status'] : '0';
								$name	= 'rgen_customproducts_module[' . $module_row . '][status]';
								$id		= 'status' . $module_row;
							?>
							<span class="switch">
								<input type="checkbox" id="<?php echo $id; ?>" data-clone="status" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
								<label for="<?php echo $id; ?>" class="switch-img"></label>
								<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" data-clone="status" value="0"><?php }?>
							</span>
						</td>
						<td class="order">
							<?php 
								$dbKey 	= isset($module['sort_order']) ? $module['sort_order'] : '';
								$name	= 'rgen_customproducts_module['.$module_row.'][sort_order]';
							?>
							<input type="text" class="input-mini" data-clone="sort_order" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
						</td>
						<td class="other"><a class='btn btn-danger section-del'><i class="icon-remove icon-white"></i></a></td>
					</tr>
					<?php $module_row++; } ?>
				</tbody>
				<?php } ?>
			</table>
		</div>
		</form>
	</div>
</div>
<div class="clone-copy" style="display:none;">
<table>
<tr id="section-<?php echo $module_row; ?>">
	<td class="section-settings">
		<input type="hidden" data-clone="setting_id" name="" value="" />


		<div class="form-horizontal frm-small">
			<div class="control-group">
				<label class="control-label">Select custom module</label>
				<div class="controls">
					<?php $ar 	= $sectionlist; ?>
					<span class='select'>
						<select name="" data-clone="prdSection">
							<?php foreach ($ar as $key => $value) { ?>
							<option value="<?php echo $value['mod_id']; ?>"><?php echo $value['name']; ?></option>
							<?php } ?>
						</select>
					</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Section display</label>
				<div class="controls">
					<?php $ar 	= $modStyle; ?>
					<span class='select'>
						<select name="" class="input-small" data-clone="modStyle">
							<?php foreach ($ar as $key => $value) { ?>
							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</div>
			</div>
			<div class="control-group tab-style" style='display:none;'>
				<label class="control-label">Tab settings <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/tab-styles.gif">?</a></label>
				<div class="controls">
					<?php $ar 	= $tabStyle; ?>
					<span class='select'>
						<select name="" class="input-small" data-clone="tabStyle">
							<?php foreach ($ar as $key => $value) { ?>
							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
					<?php $ar 	= $tabAlign; ?>
					<span class='select'>
						<select name="" class="input-small" data-clone="tabAlign">
							<?php foreach ($ar as $key => $value) { ?>
							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Display in full block</label>
				<div class="controls">
					<?php $ar 	= $yn; ?>
					<span class='select'>
						<select name="" class="input-small" data-clone="fullB">
							<?php foreach ($ar as $key => $value) { ?>
							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>	
				</div>
			</div>
			<div class="block-settings" style="display:none;">
				<div class="control-group">
					<label class="control-label">Apply CSS class</label>
					<div class="controls">
						<input type="text" class="input-medium" data-clone="fullB_class" name="" value="" />
						<a class="btn btn-mini" data-val="dark-thm">Dark theme</a>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Background color</label>
					<div class="controls">
						<input type="text" class="rgb" data-clone="fullB_bgcolor" name="" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Background image</label>
					<div class="controls">
						<div class="img-preview mb10" style="vertical-align: top;">
							<div data-clone="fullB_bgimg-preview" class="img-holder" style="background-image:url(<?php echo $no_img; ?>);" id=""></div>
							<div class="btn-group btn-group-vertical">
								<a class="btn btn-small browse" data-clone="fullB_bgimg-preview-id" data-idname="">Browse</a>
								<a class="btn btn-small clear" data-clone="fullB_bgimg-preview-clear" data-idname="">Clear</a>
							</div>
							<input type="hidden" id="" data-clone="fullB_bgimg" name="" value="" />
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Background settings</label>
					<div class="controls">
						<?php $ar 	= $bodyBgAttachment; ?>
						<span class='select mb10'>
							<select name="" style="width:150px" data-clone="fullB_bgAttachment">
								<option value="">Background attachment</option>
								<?php foreach ($ar as $key) { ?>
								<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
								<?php } ?>
							</select>
						</span><br>
						<?php $ar 	= $ImgRepeat; ?>
						<span class='select mb10'>
							<select name="" style="width:150px" data-clone="fullB_bgrepeat">
								<option value="">Background repeat</option>
								<?php foreach ($ar as $key) { ?>
									<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
								<?php } ?>
							</select>
						</span><br>
						<?php $ar 	= $ImgPosition; ?>
						<span class='select'>
							<select name="" style="width:150px" data-clone="fullB_bgposition">
								<option value="">Background position</option>
								<?php foreach ($ar as $key) { ?>
									<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
								<?php } ?>
							</select>
						</span>
						<div class="otherpos" style="display: none;">
							<input type="text" class="input-mini" data-clone="fullB_bgps1" name="" value="">
							<input type="text" class="input-mini" data-clone="fullB_bgps2" name="" value="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td class="img-option">
		<div class="mb10">
			<span class="lbl-1">Width</span>
			<?php $dbKey 	= '100'; ?>
			<input type="text" class="input-mini" data-clone="img_w" name="" value="<?php echo $dbKey; ?>" />
		</div>
		<div class="mb10">
			<span class="lbl-1">Height</span>
			<?php $dbKey 	= '100'; ?>
			<input type="text" class="input-mini" data-clone="img_h" name="" value="<?php echo $dbKey; ?>" />
			<a class="helpbtn" style="vertical-align: middle; margin-left: 10px;" data-type="img" data-info="view/image/rgen_theme/customproducts-help1.png">?</a>
		</div>
	</td>
	<td class="layout-option">
		<div class="mb10">
			<span class="lbl-1">Layout</span>
			<?php $ar 	= $layouts; ?>
			<span class='select'>
				<select name="" data-clone="layout_id" class="input-medium layout-select">
					<?php foreach ($ar as $key => $value) { 
						isset($value['route'][0]) ? $routeInfo = $value['route'][0]['route'] : $routeInfo = '';
						?>
						<option data-route="<?php echo $routeInfo; ?>" value="<?php echo $value['layout_id']; ?>"><?php echo $value['name']; ?></option>
					<?php } ?>
				</select>
			</span>
		</div>
		<div class="mb10">
			<span class="lbl-1">Position</span>
			<?php $ar 	= $positions; ?>
			<span class='select'>
				<select name="" data-clone="position" class="input-medium">
					<?php foreach ($ar as $key => $value) { ?>
						<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>
		</div>
		<div class="control-group cat-select-wrp" style="display:none;">
			<label class="lbl-1">Display content</label>
			<div class="controls cat-selection">
				
				<?php $ar 	= array( 'On all categories' => 'allc', 'On selected category' => 'selc'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  "allc") ? $selected = ' active' : $selected=''; ?>
						<label for=""  type="button" class="btn<?php echo $selected; ?>">
							<input type="radio" data-clone="cat_status" id="" name="" value="<?php echo $value; ?>" <?php if ($value == "allc") { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>

				<div class="selected-cat edit-mod" data-clone="categories" data-array="" style="display:none;">
					<input type="text" placeholder="Type category name to insert" class="find-cat auto-textbox" value="" /><br>
		            <div class="select_scrollbox scrollbox cat-sel"></div>
				</div>
			</div>
		</div>

		<!-- Product selection -->
		<div class="control-group prd-select-wrp" style="display:none">
			<label class="lbl-1">Display content</label>
			<div class="controls prd-selection edit-mod">
				
				<?php $ar 	= array( 'On all products' => 'allp', 'On selected product' => 'selp'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'allp') ? $selected = ' active' : $selected=''; ?>
						<label for=""  type="button" class="btn<?php echo $selected; ?>">
							<input type="radio" data-clone="prd_status" id="" name="" value="<?php echo $value; ?>" <?php if ($value == 'allp') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>

				<div class="selected-prd edit-mod" data-clone="products" id="" data-array="" style="display:none;">
					<input type="text" placeholder="Type product name to insert" class="find-prd auto-textbox" value="" /><br>
		            <div class="select_scrollbox scrollbox prd-sel"></div>
				</div>
			</div>
		</div>

		<!-- Brand selection -->
		<div class="control-group brand-select-wrp" style="display:none;">
			<label class="lbl-1">Display content</label>
			<div class="controls brand-selection" id="">
				
				<?php $ar 	= array( 'On all brands' => 'allb', 'On selected brand' => 'selb'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'allb') ? $selected = ' active' : $selected=''; ?>
						<label for=""  type="button" class="btn<?php echo $selected; ?>">
							<input type="radio" data-clone="brand_status" id="" name="" value="<?php echo $value; ?>" <?php if ($value == 'allb') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>

				<div class="selected-brand edit-mod" data-clone="brands" data-array="" style="display:none;">
					<input type="text" placeholder="Type manufacturer name to insert" class="find-brand auto-textbox" value="" /><br>
		            <div class="select_scrollbox scrollbox brand-sel"></div>
				</div>
			</div>
		</div>

		<!-- Information selection -->
		<div class="control-group info-select-wrp" style="display:none;">
			<label class="lbl-1">Display content</label>
			<div class="controls info-selection">
				
				<?php $ar 	= array( 'On all information pages' => 'alli', 'On selected information page' => 'seli'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'alli') ? $selected = ' active' : $selected=''; ?>
						<label for="" type="button" class="btn<?php echo $selected; ?>">
							<input type="radio" data-clone="info_status" id="" name="" value="<?php echo $value; ?>" <?php if ($value == 'alli') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>

				<div class="selected-info edit-mod" data-array="" style="display:none;">
					<input type="text" placeholder="Type information page name to insert" class="find-info auto-textbox" value="" /><br>
		            <div class="select_scrollbox scrollbox info-sel"></div>
				</div>
			</div>
		</div>
	</td>
	<td class="status">
		<?php $dbKey 	= '0'; $id		= 'status'; ?>
		<span class="switch">
			<input type="checkbox" id="<?php echo $id; ?>" data-clone="status" name="" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
			<label for="<?php echo $id; ?>" class="switch-img"></label>
			<?php if (!$dbKey) { ?><input type="hidden" name="" data-clone="status" value="0"><?php }?>
		</span>
	</td>
	<td class="order">
		<input type="text" class="input-mini" data-clone="sort_order" name="" value="" />
	</td>
	<td class="other"><a class='btn btn-danger section-del'><i class="icon-remove icon-white"></i></a></td>
</tr>
</table>
</div>

<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script src="view/javascript/rgen/messi.min.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 

<script type="text/javascript">

function clone(cloneData, cloneAdd){
	if ($(cloneData+' tr').length > 0) {
		var i = $(cloneData+' tr:last-child').attr("id");
			i = parseInt(i.replace("section-",""));
			i++;	
	}else{
		var i = 0;
	};
	
	var getClone = $(cloneData+" tr:first").html();
	//$(getClone).find('input[data-clone="title"]').attr("name","test");
	$(cloneAdd).append('<tr id="section-'+i+'">'+getClone+'</tr>');

	// Reseting data
	$('#section-'+i+' [data-clone="status"]').attr("checked", false);
	$('#section-'+i+' .tab-style').hide();
	$('#section-'+i+' [data-clone="status"]').parent().find('input[type="hidden"]').remove();
	$('#section-'+i+' .layout-option .control-group').hide();
	$('#section-'+i+' .layout-option .auto-textbox').val('');
	$('#section-'+i+' .layout-option .scrollbox').html('');
	$('#section-'+i+' select option').attr("selected", false);
	$('#section-'+i+' input[type="text"]').val("");
	$('#section-'+i+' .layout-option .control-group .btn-group input[type="radio"]').attr("checked", false);
	$('#section-'+i+' .layout-option .control-group .btn-group label:first input[type="radio"]').attr("checked", true);
	$('#section-'+i+' .layout-option .control-group .btn-group label').removeClass("active");
	$('#section-'+i+' .layout-option .control-group .btn-group label:first').addClass("active");
	$('#section-'+i+' .block-settings').hide();
	$('#section-'+i+' .layout-option .control-group .btn-group label:first').addClass("active");
	$('#section-'+i+' .img-holder').css({backgroundImage: "<?php echo $no_img; ?>"});
	
	$('#section-'+i+' [data-clone="setting_id"]').attr("name",'rgen_customproducts_module['+i+'][setting_id]');
	$('#section-'+i+' [data-clone="setting_id"]').attr("value",'rgen_customprd_setting'+i);
	$('#section-'+i+' [data-clone="prdSection"]').attr("name",'rgen_customproducts_module['+i+'][mod_id]');
	$('#section-'+i+' [data-clone="modStyle"]').attr("name",'rgen_customproducts_module['+i+'][modStyle]');
	$('#section-'+i+' [data-clone="tabStyle"]').attr("name",'rgen_customproducts_module['+i+'][tabStyle]');
	$('#section-'+i+' [data-clone="tabAlign"]').attr("name",'rgen_customproducts_module['+i+'][tabAlign]');
	
	$('#section-'+i+' [data-clone="fullB"]').attr("name",'rgen_customproducts_module['+i+'][fullB]');
	$('#section-'+i+' [data-clone="fullB_class"]').attr("name",'rgen_customproducts_module['+i+'][fullB_class]');
	$('#section-'+i+' [data-clone="fullB_bgcolor"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgcolor]');
	$('#section-'+i+' [data-clone="fullB_bgimg"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgimg]');
	$('#section-'+i+' [data-clone="fullB_bgimg"]').attr("id",'fullB'+i+'-bgimg');
	
	$('#section-'+i+' [data-clone="fullB_bgimg-preview"]').attr("id",'fullB'+i+'-bgimg-preview');
	$('#section-'+i+' [data-clone="fullB_bgimg-preview-id"]').attr("data-idname",'fullB'+i+'-bgimg');
	$('#section-'+i+' [data-clone="fullB_bgimg-preview-clear"]').attr("data-idname",'fullB'+i+'-bgimg');

	$('#section-'+i+' [data-clone="fullB_bgrepeat"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgrepeat]');
	$('#section-'+i+' [data-clone="fullB_bgposition"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgposition]');

	$('#section-'+i+' [data-clone="fullB_bgps1"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgps1]');
	$('#section-'+i+' [data-clone="fullB_bgps2"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgps2]');
	$('#section-'+i+' [data-clone="fullB_bgAttachment"]').attr("name",'rgen_customproducts_module['+i+'][fullB_bgAttachment]');
	

	//$('#section-'+i+' [data-clone="prdStyle"]').attr("name",'rgen_customproducts_module['+i+'][prdStyle]');
	$('#section-'+i+' [data-clone="img_w"]').attr("name",'rgen_customproducts_module['+i+'][img_w]');
	$('#section-'+i+' [data-clone="img_h"]').attr("name",'rgen_customproducts_module['+i+'][img_h]');
	$('#section-'+i+' [data-clone="layout_id"]').attr("name",'rgen_customproducts_module['+i+'][layout_id]');
	$('#section-'+i+' [data-clone="position"]').attr("name",'rgen_customproducts_module['+i+'][position]');
	
	$('#section-'+i+' [data-clone="status"]').attr("name",'rgen_customproducts_module['+i+'][status]');
	$('#section-'+i+' input[type="checkbox"][data-clone="status"]').attr("id",'status'+i);
	$('#section-'+i+' [data-clone="status"]').next().attr("for",'status'+i);
	$('#section-'+i+' [data-clone="status"]').parent().append('<input type="hidden" name="rgen_customproducts_module['+i+'][status]" value="0">');

	$('#section-'+i+' [data-clone="sort_order"]').attr("name",'rgen_customproducts_module['+i+'][sort_order]');
	$('#section-'+i+' [data-clone="sort_order"]').attr("value",'0');
	//console.log(getClone);

	// Category
	$('#section-'+i+' [data-clone="cat_status"]').each(function(){
		$(this).attr("name",'rgen_customproducts_module['+i+'][cat_status]');
		$(this).attr("id",'cat_status'+i+$(this).val());
		$(this).parent().attr("for",'cat_status'+i+$(this).val());
	});
	$('#section-'+i+' [data-clone="categories"]').attr("data-array",'rgen_customproducts_module['+i+'][category][]');
	$('#section-'+i+' [data-clone="categories"]').attr("id",'rgen_customproducts_module'+i+'-cat');

	// Products
	$('#section-'+i+' [data-clone="prd_status"]').each(function(){
		$(this).attr("name",'rgen_customproducts_module['+i+'][prd_status]');
		$(this).attr("id",'prd_status'+i+$(this).val());
		$(this).parent().attr("for",'prd_status'+i+$(this).val());
	});
	$('#section-'+i+' [data-clone="products"]').attr("data-array",'rgen_customproducts_module['+i+'][products][]');
	$('#section-'+i+' [data-clone="products"]').attr("id",'rgen_customproducts_module'+i+'-prd');

	// Brands
	$('#section-'+i+' [data-clone="brand_status"]').each(function(){
		$(this).attr("name",'rgen_customproducts_module['+i+'][brand_status]');
		$(this).attr("id",'brand_status'+i+$(this).val());
		$(this).parent().attr("for",'brand_status'+i+$(this).val());
	});
	$('#section-'+i+' [data-clone="brands"]').attr("data-array",'rgen_customproducts_module['+i+'][brands][]');
	$('#section-'+i+' [data-clone="brands"]').attr("id",'rgen_customproducts_module'+i+'-brand');
	
	colorPic('#section-'+i);

	layoutSelect();
	catAutocomplete();
	prdAutocomplete();
	brandAutocomplete();
	infoAutocomplete();

}
$(window).on("click", ".add-new", function(){
	if ($('[data-clone="prdSection"] option').length > 0) {
		if ($(".get-clone > tr").length > 0) {
			var cloneData = ".get-clone";
			var cloneAdd = ".get-clone";
			clone(cloneData, cloneAdd);
		}else{
			//console.log($(".clone-copy").html());
			var cloneData = ".clone-copy";
			var cloneAdd = ".get-clone";
			clone(cloneData, cloneAdd);
		};
	}else{
		new Messi('No any product section available. <br>Click on <strong>"Manage product sections"</strong> to create new product section.', {
			title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
			buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
		});
	};
	//console.log(getClone);
});
$(window).on("change", "select[data-clone='modStyle']", function(){
	if ($(this).val() == "tab"){
		$(this).parent().parent().parent().next('.tab-style').show();
	}else{
		$(this).parent().parent().parent().next('.tab-style').hide();
	};
});
$(window).on("change", "select[data-clone='fullB']", function(){
	if ($(this).val() == "y"){
		$(this).parent().parent().parent().next('.block-settings').show();
	}else{
		$(this).parent().parent().parent().next('.block-settings').hide();
	};
});
$(window).on("click", ".browse", function(){
	image_upload($(this).attr('data-idname'), $(this).attr('data-idname')+'-preview');
});

$(window).on("click", "[data-val='dark-thm']", function(){
	$(this).prev('input').val($(this).attr('data-val'));
});
$(window).on("click", ".clear", function(){
	//$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');

	$('#'+$(this).attr('data-idname')+'-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});
	$('#'+$(this).attr('data-idname')).attr('value', '');

	//image_upload($(this).attr('data-id'), $(this).attr('data-id')+'-preview');
});

$(window).on("click", "[data-clone='fullB_bgposition']", function(){
	if ($(this).val() == "other"){
		$(this).parent().next('.otherpos').show();
	}else{
		$(this).parent().next('.otherpos').hide();
	};
});




onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');"

$(window).on("click", ".section-del", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if ($(".get-clone tr").length > 0) {
			$(this).closest("tr").remove();
		};
	}
});

function setswitch(){
	$(window).on('click','.switch',function(){
	
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

function save(saveURL){
	$.ajax({
		type: "POST",
		url: saveURL,
		data: $('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray(),
		success: function(data) {
			console.log(data);
			var msg = "<?php echo $this->language->get('text_success'); ?>";
			successMsg(msg);
		}
	});
}
$(window).on("click", "#saveBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		var saveURL = 'index.php?route=module/rgen_customproducts&token=<?php echo $token; ?>';
		save(saveURL);
	}
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

// Page specific content display
function layoutSelect(){
	$(window).on("change", ".layout-option .layout-select", function(){
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
// Custom content for specific pages
layoutSelect();
catAutocomplete();
prdAutocomplete();
brandAutocomplete();
infoAutocomplete();

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
			$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="'+arrName+'" value="' + ui.item.value + '" /></div>');
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
			$(prdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '" value="' + ui.item.value + '" /></div>');
			
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
			$(brdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '" value="' + ui.item.value + '" /></div>');
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
			$(infoBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="' +arrName + '" value="' + ui.item.value + '" /></div>');
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

function colorPic(parent) {
	$(parent+' .rgb').spectrum("destroy");
	$(parent+' .sp-replacer').remove();
	colorPicker(parent+' .rgb', 'rgb');
}

$(document).ready(function(){
	colorPicker('.rgb', 'rgb');
});

</script>
<?php echo $footer; ?>