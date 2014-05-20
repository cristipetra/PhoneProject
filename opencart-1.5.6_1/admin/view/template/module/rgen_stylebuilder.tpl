<?php echo $header; ?>
<script src="view/javascript/jquery/jquery.colorpicker.js"></script>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script src="view/javascript/rgen/revoslider.js"></script>
<script src="view/javascript/rgen/webfonts.js"></script>
<script src="view/javascript/rgen/revoslider_stylebuilder.js"></script>
<script src="view/javascript/rgen/jquery.validate.min.js"></script>

<script src="view/javascript/rgen/jQAllRangeSliders-min.js"></script>
<script src="view/javascript/rgen/jquery.blockUI.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<link rel="stylesheet" type="text/css" href="view/stylesheet/jquery.colorpicker.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/iThing.css" />

<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>
<?php
	
	if (isset($_SESSION['backURL'])) {
		$backurl = $_SESSION['backURL'];
	}else{
		$backurl = $sliderlist;
	}
	

	//$module_row;
	$lng_id = $this->config->get('config_language_id');
	$json = file_get_contents("view/image/rgen_theme/webfonts.json", true);
	$decode = json_decode($json, true);
	$webfonts = array();
	foreach ($decode['items'] as $key => $value) {
		// FONT FAMILY
		$item_family = $decode['items'][$key]['family'];
		$item_family_trunc =  str_replace(' ','+',$item_family);
		$webfonts[$item_family_trunc] = $item_family;
	}
	//print_r ($default);
	$defaultFont = array( 
		'Arial', 
		'Verdana', 
		'Helvetica', 
		'Lucida Grande', 
		'Trebuchet MS', 
		'Times New Roman', 
		'Tahoma', 
		'Georgia'
		);
	$FontCase = array(
			'None' 		=> 'none', 
			'Inherit'	=> 'inherit', 
			'Capitalize'=> 'capitalize', 
			'Lowercase' => 'lowercase', 
			'Uppercase' => 'uppercase'
			);
	$borderType = array(
			'None' 		=> 'none', 
			'Inherit'	=> 'inherit', 
			'Dotted'	=> 'dotted', 
			'Dashed' 	=> 'dashed', 
			'Solid'		=> 'solid', 
			'Double' 	=> 'double'
			);
	//echo "<pre style='color:;'>" . print_r($cpstyles, TRUE) . "</pre>";
?>

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
				<span class="brand">R.Gen Theme<b><?php echo $ver; ?></b></span>
				<h2 class="pull-left mod-title">CAPTION STYLE BUILDER</h2>
				<div class="buttons pull-right">
					<a id="saveBtn" class="btn btn-success btn-large"><?php echo $button_save; ?></a>
					<a onclick="location = '<?php echo $backurl; ?>';" class="btn btn-large">Back</a>
				</div>
			</div>
		</div>
		<form id="form" enctype="multipart/form-data">
			<div class="mod-content style-builder">
				<div class="tabs-left tabbable" data-theme="tab1">
					<a class="btn btn-success btn-large new-style" onclick=""><i class="icon-plus icon-white"></i> Add new slide</a>
					<ul class="nav nav-tabs style-tabs">
						<?php 
							$sty = 0; 
							foreach($cpstyles as $cpstyle){
						?>
						<li class="style-tab">
							<a href="#style<?php echo $sty; ?>">
								<?php if(isset($cpstyle['classname'])){ 
									echo "<b>" . $cpstyle['classname'] . "</b>";
								} else { 
								?><b>Style <?php echo $sty; ?></b>
								<?php } ?>
								<span class="btn btn-mini btn-link" data-placement="left" title="Remove">
									<i class="icon-remove"></i>
								</span>
							</a>
						</li>
						<?php $sty++; } ?>
					</ul>
					<div class="tab-content style-pane-wrp">
						<?php 
							$sty = 0; 
							foreach($cpstyles as $cpstyle){
						?>
						<div id="style<?php echo $sty; ?>" class="tab-pane style-pane">
							<div class="cp-preview">
								<h4>Caption style preview</h4>
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">Normal preview</span>
											<div class="cp-normal">
												<span>Sample text</span>
											</div>
										</td>
										<td>
											<span class="lbl">Hover preview</span>
											<div class="cp-hover">
												<span>Sample text</span>
											</div>
										</td>
									</tr>
								</table>
								<?php 
									$dbKey = isset($cpstyle['css']) ? $cpstyle['css'] : '';
									$name	= 'style' . $sty . '[css]';
								?>
								<input type="hidden" class="css-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								<?php 
									$dbKey = isset($cpstyle['fonturl']) ? $cpstyle['fonturl'] : '';
									$name	= 'style' . $sty . '[fonturl]';
								?>
								<input type="hidden" class="fonturl-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</div>
							<div class="form-horizontal form-1">
								<div class="control-group">
									<label class="control-label">CSS class name</label>
									<div class="controls font-selection">
										<?php 
											$dbKey = isset($cpstyle['classname']) ? $cpstyle['classname'] : 'cp-style' . $sty;
											$name	= 'style' . $sty . '[classname]';
										?>
										<input type="text" data-sty="style<?php echo $sty; ?>" class="cls-name" placeholder="Enter class name" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>		
								<div class="control-group">
									<label class="control-label">Font</label>
									<div class="controls font-selection">
										<table class="subfields">
											<tr>
												<td>
													<span class="lbl">Select font</span>
													<span class='select fonts'>
														<select>
															<optgroup label="HTML default fonts">
															<?php foreach ($defaultFont as $key) { ?>
																<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
																<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
															<?php } ?>
															</optgroup>
															<optgroup label="Google fonts">
															<?php foreach ($webfonts as $key => $face ) { ?>
																<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
																<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
															<?php } ?>
															</optgroup>
														</select>
														<input type="hidden">
													</span>
												</td>
												<td>
													<span class="lbl">Select variant</span>
													<span class='select font-var'>
														<select>
														</select>
													</span>
												</td>
												<td>
													<span class="lbl">Select subset</span>
													<span class='select font-sub'>
														<select>
														</select>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="lbl">Size</span>
													<span class='select font-size'>
														<select>
															<?php for ($size=10; $size<=150; $size++) { ?>
															<?php ($size ==  '') ? $selected = 'selected' : $selected=''; ?>
															<option value="<?php echo $size; ?>" <?php echo $selected; ?>><?php echo $size; ?></option>
															<?php } ?>
														</select>
													</span>
												</td>
												<td>
													<span class="lbl">Line height</span>
													<span class='select line-h'>
														<select>
															<?php for ($lh=1; $lh<=6; $lh++) {
																	for ($lh1=0; $lh1<=9; $lh1++) { ?>
															<?php ($lh.'.'.$lh1 ==  '') ? $selected = 'selected' : $selected=''; ?>
															<option value="<?php echo $lh.'.'.$lh1; ?>" <?php echo $selected; ?>><?php echo $lh.'.'.$lh1; ?></option>
															<?php } } ?>
														</select>
													</span>
												</td>
												<td>
													<span class="lbl">Font transform</span>
													<?php $ar 	= $FontCase; ?>
													<span class='select font-case'>
														<select>
															<?php foreach ($ar as $key => $value) { ?>
																<?php ($value ==  '') ? $selected = 'selected' : $selected=''; ?>
																<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
															<?php } ?>
														</select>
													</span>
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['font_data']) ? $cpstyle['font_data'] : '';
											$name	= 'style' . $sty . '[font_data]';
										?>
										<input type="hidden" class="font-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
										<script type="text/javascript">
											<!--
											$(document).ready(function(){
												$("#style<?php echo $sty; ?> .fonts select").webfonts({
													json: 'view/image/rgen_theme/webfonts.json',
													variant_selector: ".font-var",
													subset_selector: ".font-sub"
												});
											});
											//-->
										</script>
									</div>
								</div>		
								<div class="control-group">
									<label class="control-label">Other options</label>
									<div class="controls other-options">
										<table class="subfields">
											<tr>
												<td class="cp-pdding">
													<span class="lbl">Padding</span>
													<input type="text" placeholder="Top" class="input-mini t" title="Top">
													<input type="text" placeholder="Right" class="input-mini r" title="Right">
													<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">
													<input type="text" placeholder="Left" class="input-mini l" title="Left">
												</td>
												<td class="cp-radius">
													<span class="lbl">Border radius</span>
													<input type="text" placeholder="Top" class="input-mini t" title="Top">
													<input type="text" placeholder="Right" class="input-mini r" title="Right">
													<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">
													<input type="text" placeholder="Left" class="input-mini l" title="Left">
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['other_data']) ? $cpstyle['other_data'] : '';
											$name	= 'style' . $sty . '[other_data]';
										?>
										<input type="hidden" class="other-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Colors</label>
									<div class="controls colors">
										<table class="subfields">
											<tr>
												<td class="f-color">
													<span class="lbl">Font color</span>
													<input type="text" placeholder="Normal" class="rgb n" title="Normal"><br>
													<input type="text" placeholder="Hover" class="rgb h" title="Hover">
												</td>
												<td class="b-color">
													<span class="lbl">Background</span>
													<input type="text" placeholder="Normal" class="rgb n" title="Normal"><br>
													<input type="text" placeholder="Hover" class="rgb h" title="Hover">
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['color_data']) ? $cpstyle['color_data'] : '';
											$name	= 'style' . $sty . '[color_data]';
										?>
										<input type="hidden" class="color-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Font shadow</label>
									<div class="controls font-shadow">
										<table class="subfields">
											<tr>
												<td>
													<span class="lbl">Horizontal Length</span>
													<input type="text" class="input-small hl">
												</td>
												<td>
													<span class="lbl">Vertical Length</span>
													<input type="text" class="input-small vl">
												</td>
												<td>
													<span class="lbl">Blur Radius</span>
													<input type="text" class="input-small br">
												</td>
												<td>
													<span class="lbl">Shadow Color</span>
													<input type="text" class="rgb s-color">
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['fshadow_data']) ? $cpstyle['fshadow_data'] : '';
											$name	= 'style' . $sty . '[fshadow_data]';
										?>
										<input type="hidden" class="f-shadow-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Caption shadow</label>
									<div class="controls cp-shadow">
										<table class="subfields">
											<tr>
												<td>
													<span class="lbl">Horizontal Length</span>
													<input type="text" class="input-small hl">
												</td>
												<td>
													<span class="lbl">Vertical Length</span>
													<input type="text" class="input-small vl">
												</td>
												<td>
													<span class="lbl">Blur Radius</span>
													<input type="text" class="input-small br">
												</td>
												<td>
													<span class="lbl">Spread</span>
													<input type="text" class="input-small spr">
												</td>
												<td>
													<span class="lbl">Shadow Color</span>
													<input type="text" class="rgb s-color">
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['cpshadow_data']) ? $cpstyle['cpshadow_data'] : '';
											$name	= 'style' . $sty . '[cpshadow_data]';
										?>
										<input type="hidden" class="cp-shadow-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Border</label>
									<div class="controls cp-bdr">
										<table class="subfields">
											<tr>
												<td class="bdr-w">
													<span class="lbl">Width</span>
													<input type="text" placeholder="Top" class="input-mini t" title="Top">
													<input type="text" placeholder="Right" class="input-mini r" title="Right">
													<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">
													<input type="text" placeholder="Left" class="input-mini l" title="Left">
												</td>
												<td>
													<span class="lbl">Border type</span>
													<span class='select bdr-type' title="Select border type">
														<select class="input-small">
															<?php foreach ($borderType as $key => $vlaue) { ?>
																<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
																<option value="<?php echo $vlaue; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
															<?php } ?>
														</select>
													</span>
												</td>
												<td>
													<span class="lbl">Border color</span>
													<input type="text" class="rgb bdr-color">
												</td>
											</tr>
										</table>
										<?php 
											$dbKey 	= isset($cpstyle['cpbdr_data']) ? $cpstyle['cpbdr_data'] : '';
											$name	= 'style' . $sty . '[cpbdr_data]';
										?>
										<input type="hidden" class="cp-bdr-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									</div>
								</div>
							</div>
							<script type="text/javascript">
							$(document).ready(function(){
							$("#style<?php echo $sty; ?>").stylebuilder();
							});
							</script>
						</div>
						<?php $sty++; } ?>
						
					</div>
				</div>
			</div>	
		</form>

	</div>
</div>
<script type="text/javascript"><!--


function styleName(){
	$(window).on('input','.cls-name',function(){
		$(".style-tabs li").find("a[href='#"+ $(this).attr("data-sty") + "'] b").text($(this).val());
	});
}
styleName();

function sliderTabs(){
	$(window).on('click', '.style-tabs a',function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('.style-tabs li:first a').trigger('click');	
} sliderTabs();

function addCaption() {

	if ($('.style-pane').length == 0) {
		var sty = 0;
	}else{
		var styID = parseInt($('.style-pane:last-child').attr('id').replace("style",""));
		var sty = styID+1;
	};

	// Style pane
	stylepn  = '<div id="style'+sty+'" class="tab-pane style-pane">';

	// Caption preview
	stylepn += '	<div class="cp-preview">';
	stylepn += '		<h4>Caption style preview</h4>';
	stylepn += '		<table class="subfields">';
	stylepn += '			<tr><td>';
	stylepn += '				<span class="lbl">Normal preview</span>';
	stylepn += '				<div class="cp-normal"><span>Sample text</span></div>';
	stylepn += '			</td><td>';
	stylepn += '				<span class="lbl">Hover preview</span>';
	stylepn += '				<div class="cp-hover"><span>Sample text</span></div>';
	stylepn += '			</td></tr>';
	stylepn += '		</table>';
						var name 	= 'style'+sty+'[css]';
	stylepn += '		<input type="hidden" class="css-data" name="'+name+'" value="">';
						var name 	= 'style'+sty+'[fonturl]';
	stylepn += '		<input type="hidden" class="fonturl-data" name="'+name+'" value="">';
	stylepn += '	</div>';
	// Caption preview - End

	stylepn += '	<div class="form-horizontal form-1">';

					// Caption name
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">CSS class name</label>';
	stylepn += '		<div class="controls">';
							var name 	= 'style'+sty+'[classname]';
	stylepn += '			<input type="text" data-sty="style'+sty+'" class="cls-name" placeholder="Enter class name" name="'+name+'" value="cp-style'+sty+'">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption name - End

					// Caption font data
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Font</label>';
	stylepn += '		<div class="controls font-selection">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td>';
	stylepn += '					<span class="lbl">Select font</span>';
	stylepn += '					<span class="select fonts">';
	stylepn += '						<select>';
	stylepn += '							<optgroup label="HTML default fonts">';
											<?php foreach ($defaultFont as $key) { ?>
											<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>';
											<?php } ?>
	stylepn += '							</optgroup>';
	stylepn += '							<optgroup label="Google fonts">';
											<?php foreach ($webfonts as $key => $face ) { ?>
											<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>';
											<?php } ?>
	stylepn += '							</optgroup>';
	stylepn += '						</select>';
	stylepn += '						<input type="hidden">';
	stylepn += '					</span>';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Select variant</span>';
	stylepn += '					<span class="select font-var"><select></select></span>';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Select subset</span>';
	stylepn += '					<span class="select font-sub"><select></select></span>';
	stylepn += '				</td></tr>';
	stylepn += '				<tr><td>';
	stylepn += '					<span class="lbl">Size</span>';
	stylepn += '					<span class="select font-size"><select>';
									<?php for ($size=10; $size<=150; $size++) { ?>
									<?php ($size ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '						<option value="<?php echo $size; ?>" <?php echo $selected; ?>><?php echo $size; ?></option>';
									<?php } ?>
	stylepn += '					</select></span>';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Line height</span>';
	stylepn += '					<span class="select line-h"><select>';
									<?php for ($lh=1; $lh<=6; $lh++) { for ($lh1=0; $lh1<=9; $lh1++) { ?>
									<?php ($lh.'.'.$lh1 ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '						<option value="<?php echo $lh.".".$lh1; ?>" <?php echo $selected; ?>><?php echo $lh.".".$lh1; ?></option>';
									<?php } } ?>
	stylepn += '					</select></span>';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Font transform</span>';
	stylepn += '					<span class="select font-case"><select>';
									<?php foreach ($FontCase as $key => $value) { ?>
									<?php ($value ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '						<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>';
									<?php } ?>
	stylepn += '					</select></span>';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[font_data]';
	stylepn += '			<input type="hidden" class="font-data" name="'+name+'" value="Arial,regular,--,10,1.0,none">';
	stylepn += '			<script type="text/javascript">';
	stylepn += '				$("#style'+sty+' .fonts select").webfonts({ json: "view/image/rgen_theme/webfonts.json", variant_selector: ".font-var", subset_selector: ".font-sub" });';
	stylepn += '			</script>';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption font data - End

					// Caption other data
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Other options</label>';
	stylepn += '		<div class="controls other-options">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td class="cp-pdding">';
	stylepn += '					<span class="lbl">Padding</span>';
	stylepn += '					<input type="text" placeholder="Top" class="input-mini t" title="Top">';
	stylepn += '					<input type="text" placeholder="Right" class="input-mini r" title="Right">';
	stylepn += '					<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">';
	stylepn += '					<input type="text" placeholder="Left" class="input-mini l" title="Left">';
	stylepn += '				</td><td class="cp-radius">';
	stylepn += '					<span class="lbl">Border radius</span>';
	stylepn += '					<input type="text" placeholder="Top" class="input-mini t" title="Top">';
	stylepn += '					<input type="text" placeholder="Right" class="input-mini r" title="Right">';
	stylepn += '					<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">';
	stylepn += '					<input type="text" placeholder="Left" class="input-mini l" title="Left">';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[other_data]';
	stylepn += '			<input type="hidden" class="other-data" name="'+name+'" value="">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption other data - End

					// Caption color data
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Colors</label>';
	stylepn += '		<div class="controls colors">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td class="f-color">';
	stylepn += '					<span class="lbl">Font color</span>';
	stylepn += '					<input type="text" placeholder="Normal" class="rgb n" title="Normal"><br>';
	stylepn += '					<input type="text" placeholder="Hover" class="rgb h" title="Hover">';
	stylepn += '				</td><td class="b-color">';
	stylepn += '					<span class="lbl">Background</span>';
	stylepn += '					<input type="text" placeholder="Normal" class="rgb n" title="Normal"><br>';
	stylepn += '					<input type="text" placeholder="Hover" class="rgb h" title="Hover">';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[color_data]';
	stylepn += '			<input type="hidden" class="color-data" name="'+name+'" value="">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption color data - End

					// Caption font shadow
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Font shadow</label>';
	stylepn += '		<div class="controls font-shadow">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td>';
	stylepn += '					<span class="lbl">Horizontal Length</span>';
	stylepn += '					<input type="text" class="input-small hl">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Vertical Length</span>';
	stylepn += '					<input type="text" class="input-small vl">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Blur Radius</span>';
	stylepn += '					<input type="text" class="input-small br">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Shadow Color</span>';
	stylepn += '					<input type="text" class="rgb s-color">';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[fshadow_data]';
	stylepn += '			<input type="hidden" class="f-shadow-data" name="'+name+'" value="">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption font shadow - End

					// Caption shadow
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Caption shadow</label>';
	stylepn += '		<div class="controls cp-shadow">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td>';
	stylepn += '					<span class="lbl">Horizontal Length</span>';
	stylepn += '					<input type="text" class="input-small hl">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Vertical Length</span>';
	stylepn += '					<input type="text" class="input-small vl">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Blur Radius</span>';
	stylepn += '					<input type="text" class="input-small br">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Spread</span>';
	stylepn += '					<input type="text" class="input-small spr">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Shadow Color</span>';
	stylepn += '					<input type="text" class="rgb s-color">';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[cpshadow_data]';
	stylepn += '			<input type="hidden" class="cp-shadow-data" name="'+name+'" value="">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption shadow - End

					// Caption border
	stylepn += '	<div class="control-group">';
	stylepn += '		<label class="control-label">Border</label>';
	stylepn += '		<div class="controls cp-bdr">';
	stylepn += '			<table class="subfields">';
	stylepn += '				<tr><td class="bdr-w">';
	stylepn += '					<span class="lbl">Width</span>';
	stylepn += '					<input type="text" placeholder="Top" class="input-mini t" title="Top">';
	stylepn += '					<input type="text" placeholder="Right" class="input-mini r" title="Right">';
	stylepn += '					<input type="text" placeholder="Bottom" class="input-mini b" title="Bottom">';
	stylepn += '					<input type="text" placeholder="Left" class="input-mini l" title="Left">';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Border type</span>';
	stylepn += '					<span class="select bdr-type">';
	stylepn += '						<select class="input-small">';
										<?php foreach ($borderType as $key => $vlaue) { ?>
										<?php ($key ==  '') ? $selected = 'selected' : $selected=''; ?>
	stylepn += '							<option value="<?php echo $vlaue; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>';
										<?php } ?>
	stylepn += '						</select>';
	stylepn += '					</span>';
	stylepn += '				</td><td>';
	stylepn += '					<span class="lbl">Border color</span>';
	stylepn += '					<input type="text" class="rgb bdr-color">';
	stylepn += '				</td></tr>';
	stylepn += '			</table>';
							var name 	= 'style'+sty+'[cpbdr_data]';
	stylepn += '			<input type="hidden" class="cp-bdr-data" name="'+name+'" value="">';
	stylepn += '		</div>';
	stylepn += '	</div>';
					// Caption border - End

	stylepn += '	</div>';
	
	stylepn += '<script type="text/javascript">$("#style'+sty+'").stylebuilder();</script>';
	stylepn += '</div>';
	$('.style-pane-wrp').append(stylepn);
	
							
	// Style tabs	
	styletb  = '<li class="style-tab">';
	styletb += '	<a href="#style'+sty+'"><b>cp-style'+sty+'</b>';
	styletb += '	<span class="btn btn-mini btn-link" data-placement="left" title="Remove"><i class="icon-remove"></i></span>';
	styletb += '	</a>';
	styletb += '</li>';
	$('.style-tabs').append(styletb);

	$('.style-tabs').find('li:last-child a').click();
}

$(window).on('click', '.new-style',function (e) {
	e.preventDefault();
	addCaption();
	colorSelector();
});

$(window).on('click', '.style-tab a .btn',function (e) {
	e.preventDefault();
	$($(this).parent().attr('href')).remove();
	$(this).parent().parent().remove();
});



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


// SAVE BUTTON
$("#saveBtn").click(function(){

	if($('.cls-name').val() != ''){
		$(':input[value=""]').not(".so").attr('disabled', true);
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		
		$.ajax({
			type: "POST",
			url: "index.php?route=module/rgen_revoslider/stylebuilder&token=<?php echo $token; ?>",
			data: $('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray(),
			success: function(){
				$(':input[value=""]').not(".so").attr('disabled', false);
				console.log($('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray());
				if($("body").find("#permission").length>0){
					$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
					$('.saving').animate({opacity:1}, 2000, function(){
						$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:'none'}); $(".saving").remove();});
					});	
				}else{
					$('.saving').addClass('success-msg').find("span").text("<?php echo $this->language->get('text_success'); ?>").css({backgroundImage:""});
					$('.saving').animate({opacity:1}, 1000, function(){
						$('.saving').animate({opacity:0}, 300, function(){
							$('.saving').css({display:'none'}); $(".saving").remove();
						});
					});
				}
			}
		});
	}else{
		alert('Please enter caption class name');
	}

	
	
});
//--></script>

<?php echo $footer; ?>