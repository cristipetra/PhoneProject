<?php
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
	$FontWeight = array( 'normal', 'bold' );
	
?>

<h4>Fonts settings</h4>
<div class="form-horizontal">
	<table class='table table-hover font-settings'>
		<thead>
			<tr>
				<th width='150'>
					<?php 
						$dbKey 	= $RGen_fontSettings_status;
						$name	= 'RGen_fontSettings_status';
						$id		= 'RGen_fontSettings_status';
					?>
					<!-- <span class="switch">
						<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
						<label for="<?php echo $id; ?>" class="switch-img"></span>
					</span> -->
					<span class="switch">
						<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
						<label for="<?php echo $id; ?>" class="switch-img"></label>
						<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
					</span>
				</th>
				<th width='230'>Fonts</th>
				<th width='100'>Font weight</th>
				<th width='100'>Size</th>
				<th>Text transform</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					Body fonts
					<span class="help">Select " -- " to reset</span>
				</td>
				<td>
					<span class="select">
						<select name="RGen_Body_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Body_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ($webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_Body_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_Body_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Body_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $BodyFontsSizes = array( '--', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px' ); ?>
						<select name="RGen_Body_font_size">
							<?php foreach ($BodyFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Body_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					Page title fonts<br />
					<span class="help">Select " -- " to reset</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_PageTitle_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_PageTitle_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_PageTitle_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_PageTitle_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_PageTitle_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<?php $PageTitleFontsSizes = array( 
						'--', '18px', '19px', '20px', '21px', '22px', '23px', '24px', '25px', 
						'26px', '27px', '28px', '29px', '30px', '31px', '32px', '33px',
						'34px', '35px', '36px', '37px', '38px', '39px', '40px', '41px',
						'42px', '43px', '44px', '45px', '46px', '47px', '48px', '49px', '50px'
					); ?>
					<span class='select'>
						<select name="RGen_PageTitle_font_size">
							<?php foreach ($PageTitleFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_PageTitle_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<?php $PageTitleFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
					<span class='select'>
						<select name="RGen_PageTitle_transform">
							<?php foreach ($PageTitleFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_PageTitle_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>	
					</span>
				</td>
			</tr>
			<tr>
				<td>
					Other heading fonts<br />
					<span class="help">Select " -- " to reset</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_otherHeading_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_otherHeading_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_otherHeading_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_otherHeading_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_otherHeading_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td></td>
				<td>
					<span class='select'>
						<?php $otherHeadingTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_otherHeading_transform">
							<?php foreach ($PageTitleFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_otherHeading_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					Navigation fonts<br />
					<span class="help">Select " -- " to reset</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_Navigation_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Navigation_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_Navigation_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_Navigation_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Navigation_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $NavigationFontsSizes = array( 
							'--', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px'
						); ?>
						<select name="RGen_Navigation_font_size">
							<?php foreach ($NavigationFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Navigation_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $NavigationFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_Navigation_transform">
							<?php foreach ($NavigationFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Navigation_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>
			<tr>
				<td>Price fonts<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_Price_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Price_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_Price_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_Price_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Price_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Button fonts<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_Button_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Button_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_Button_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_Button_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Button_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td></td>
				<td>
					<span class='select'>
						<?php $ButtonFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_Button_font_transform">
							<?php foreach ($ButtonFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_Button_font_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>
			<tr>
				<td>Other component fonts<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_other_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_other_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_other_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<select name="RGen_other_font_weight">
							<option>--</option>
							<?php foreach ($FontWeight as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_other_font_weight')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td></td>
				<td>
					<span class='select'>
						<?php $OtherFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_other_font_transform">
							<?php foreach ($OtherFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_other_font_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>
			<tr>
				<td>Caption heading font<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_capHeading_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capHeading_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_capHeading_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
					<select name="RGen_capHeading_font_weight">
						<option>--</option>
						<?php foreach ($FontWeight as $key) { ?>
							<?php ($key ==  $this->config->get('RGen_capHeading_font_weight')) ? $selected = 'selected' : $selected=''; ?>
							<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
						<?php } ?>
					</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapFontsSizes = array( 
							'--', '12px', '13px', '14px', '15px', '16px', '17px', '18px',
							'19px', '20px', '21px', '22px', '23px', '24px', '25px', 
							'26px', '27px', '28px', '29px', '30px', '31px', '32px', '33px',
							'34px', '35px', '36px', '37px', '38px', '39px', '40px', '41px',
							'42px', '43px', '44px', '45px', '46px', '47px', '48px', '49px', '50px',
							'51px', '52px', '53px', '54px', '55px', '56px', '57px', '58px', '59px', '60px',
							'61px', '62px', '63px', '64px', '65px', '66px', '67px', '68px', '69px', '70px'
						); ?>
						<select name="RGen_capHeading_font_size">
							<?php foreach ($CapFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capHeading_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_capHeading_font_transform">
							<?php foreach ($CapFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capHeading_font_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>


			<tr>
				<td>Caption content font<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_capContent_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capContent_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_capContent_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
					<select name="RGen_capContent_font_weight">
						<option>--</option>
						<?php foreach ($FontWeight as $key) { ?>
							<?php ($key ==  $this->config->get('RGen_capContent_font_weight')) ? $selected = 'selected' : $selected=''; ?>
							<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
						<?php } ?>
					</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapContentFontsSizes = array( 
							'--', '12px', '13px', '14px', '15px', '16px', '17px', '18px',
							'19px', '20px', '21px', '22px', '23px', '24px', '25px', 
							'26px', '27px', '28px', '29px', '30px', '31px', '32px', '33px',
							'34px', '35px', '36px', '37px', '38px', '39px', '40px', '41px',
							'42px', '43px', '44px', '45px', '46px', '47px', '48px', '49px', '50px'
						); ?>
						<select name="RGen_capContent_font_size">
							<?php foreach ($CapContentFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capContent_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapContentFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_capContent_font_transform">
							<?php foreach ($CapContentFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capHeading_font_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>

			<tr>
				<td>Caption link button font<br /><span class="help">Select " -- " to reset</span></td>
				<td>
					<span class='select'>
						<select name="RGen_capLink_font">
							<option>--</option>
							<optgroup label="HTML default fonts">
							<?php foreach ($defaultFont as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capLink_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
							</optgroup>
							<optgroup label="Google fonts">
							<?php foreach ( $webfonts as $key => $face ) { ?>
								<?php ($key ==  $this->config->get('RGen_capLink_font')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
							<?php } ?>
							</optgroup>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
					<select name="RGen_capLink_font_weight">
						<option>--</option>
						<?php foreach ($FontWeight as $key) { ?>
							<?php ($key ==  $this->config->get('RGen_capLink_font_weight')) ? $selected = 'selected' : $selected=''; ?>
							<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
						<?php } ?>
					</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapLinkFontsSizes = array( 
							'--', '12px', '13px', '14px', '15px', '16px', '17px', '18px',
							'19px', '20px', '21px', '22px', '23px', '24px', '25px', 
							'26px', '27px', '28px', '29px', '30px'
						); ?>
						<select name="RGen_capLink_font_size">
							<?php foreach ($CapLinkFontsSizes as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capLink_font_size')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
				<td>
					<span class='select'>
						<?php $CapLinkFontsTransform = array( '--', 'capitalize', 'lowercase', 'uppercase' ); ?>
						<select name="RGen_capLink_font_transform">
							<?php foreach ($CapLinkFontsTransform as $key) { ?>
								<?php ($key ==  $this->config->get('RGen_capLink_font_transform')) ? $selected = 'selected' : $selected=''; ?>
								<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- BODY FONTS -->
	<div id="bodyFontPreview_block" class="font-preview">
		<h5>Body fonts</h5>
		<link href='' id='bodyFontPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#bodyFontPreview_block');
		var fontUrl = $('#bodyFontPreview');
		var selectFont = $('select[name="RGen_Body_font"]');
		var selectSize = $('select[name="RGen_Body_font_size"]');
		var selectWeight = $('select[name="RGen_Body_font_weight"]')
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
	});
	</script>

	<!-- Page title fonts -->
	<div id="PageTitlePreview_block" class="font-preview">
		<h5>Page title fonts</h5>
		<link href='' id='PageTitlePreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#PageTitlePreview_block');
		var fontUrl = $('#PageTitlePreview');
		var selectFont = $('select[name="RGen_PageTitle_font"]');
		var selectSize = $('select[name="RGen_PageTitle_font_size"]');
		var selectWeight = $('select[name="RGen_PageTitle_font_weight"]');
		var transform = $('select[name="RGen_PageTitle_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');

				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<!-- Other fonts -->
	<div id="otherHeading_block" class="font-preview">
		<h5>Other heading fonts</h5>
		<link href='' id='otherHeadingPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#otherHeading_block');
		var fontUrl = $('#otherHeadingPreview');
		var selectFont = $('select[name="RGen_otherHeading_font"]');
		var selectWeight = $('select[name="RGen_otherHeading_font_weight"]');
		var transform = $('select[name="RGen_otherHeading_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<!-- Navigation fonts -->
	<div id="NavigationPreview_block" class="font-preview">
		<h5>Navigation fonts</h5>
		<link href='' id='NavigationPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#NavigationPreview_block');
		var fontUrl = $('#NavigationPreview');
		var selectFont = $('select[name="RGen_Navigation_font"]');
		var selectSize = $('select[name="RGen_Navigation_font_size"]');
		var selectWeight = $('select[name="RGen_Navigation_font_weight"]');
		var transform = $('select[name="RGen_Navigation_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');	
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<!-- Price fonts -->
	<div id="PricePreview_block" class="font-preview" style="font-size:16px;">
		<h5>Price fonts</h5>
		<link href='' id='PricePreview' rel='stylesheet' type='text/css'>
		Price : 1234567890
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#PricePreview_block');
		var fontUrl = $('#PricePreview');
		var selectFont = $('select[name="RGen_Price_font"]');
		var selectWeight = $('select[name="RGen_Price_font_weight"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
	});
	
	</script>

	<!-- Button fonts -->
	<div class="font-preview" style="font-size:16px;">
		<h5>Button fonts</h5>
		<link href='' id='ButtonPreview' rel='stylesheet' type='text/css'>
		<span id="ButtonPreview_block" class="site-button">Sample Button</span>
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#ButtonPreview_block');
		var fontUrl = $('#ButtonPreview');
		var selectFont = $('select[name="RGen_Button_font"]');
		var selectWeight = $('select[name="RGen_Button_font_weight"]');
		var transform = $('select[name="RGen_Button_font_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
				previewBox.parent().css("display",'none');
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
				previewBox.parent().css("display",'');
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
				previewBox.parent().css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
				previewBox.parent().css("display",'');
			}
		});
		
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<!-- Other components -->
	<div id="OtherFontsPreview_block" class="font-preview">
		<h5>Other component fonts</h5>
		<link href='' id='OtherFontsPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#OtherFontsPreview_block');
		var fontUrl = $('#OtherFontsPreview');
		var selectFont = $('select[name="RGen_other_font"]');
		var selectWeight = $('select[name="RGen_other_font_weight"]');
		var transform = $('select[name="RGen_other_font_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<div id="capHeadingPreview_block" class="font-preview">
		<h5>Caption heading fonts</h5>
		<link href='' id='capHeadingFontPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#capHeadingPreview_block');
		var fontUrl = $('#capHeadingFontPreview');
		var selectFont = $('select[name="RGen_capHeading_font"]');
		var selectSize = $('select[name="RGen_capHeading_font_size"]');
		var selectWeight = $('select[name="RGen_capHeading_font_weight"]');
		var transform = $('select[name="RGen_capHeading_font_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');

				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>


	<div id="capContentPreview_block" class="font-preview">
		<h5>Caption heading fonts</h5>
		<link href='' id='capContentFontPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#capContentPreview_block');
		var fontUrl = $('#capContentFontPreview');
		var selectFont = $('select[name="RGen_capContent_font"]');
		var selectSize = $('select[name="RGen_capContent_font_size"]');
		var selectWeight = $('select[name="RGen_capContent_font_weight"]');
		var transform = $('select[name="RGen_capContent_font_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');

				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>

	<div id="capLinkPreview_block" class="font-preview">
		<h5>Caption heading fonts</h5>
		<link href='' id='capLinkFontPreview' rel='stylesheet' type='text/css'>
		Grumpy wizards make toxic brew for the evil Queen and Jack.
	</div>
	<script>
	$(document).ready(function(e) {
		var previewBox = $('#capLinkPreview_block');
		var fontUrl = $('#capLinkFontPreview');
		var selectFont = $('select[name="RGen_capLink_font"]');
		var selectSize = $('select[name="RGen_capLink_font_size"]');
		var selectWeight = $('select[name="RGen_capLink_font_weight"]');
		var transform = $('select[name="RGen_capLink_font_transform"]');
		
		function selectedFont(){
			if(selectFont.val() == '--'){
				previewBox.css("font-family",'');

				previewBox.css("display",'none');	
			}else {
				var font = 	selectFont.val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+selectFont.val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
			if(selectSize.val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",selectSize.val());
			}
			if(selectWeight.val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",selectWeight.val());
			}
			if(transform.val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",transform.val());
			}
		}
		selectedFont();
		
		selectFont.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-family",'');
				previewBox.css("display",'none');
			}else {
				var font = 	$(this).val().replace(/\+/g," ");
				var link = "http://fonts.googleapis.com/css?family="+$(this).val();
				fontUrl.attr('href', link);
				previewBox.css("font-family",'"'+font+'"');
				previewBox.css("display",'');
			}
		});
		selectSize.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-size",'');	
			}else {
				previewBox.css("font-size",$(this).val());
			}
		});
		selectWeight.change(function(){
			if($(this).val() == '--'){
				previewBox.css("font-weight",'');	
			}else {
				previewBox.css("font-weight",$(this).val());
			}
		});
		transform.change(function(){
			if($(this).val() == '--'){
				previewBox.css("text-transform",'');	
			}else {
				previewBox.css("text-transform",$(this).val());
			}
		});
	});
	
	</script>
</div>