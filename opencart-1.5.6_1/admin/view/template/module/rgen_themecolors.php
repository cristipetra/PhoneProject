<div class='theme-bar'>
	R.Gen theme color settings
	<div class='pull-right'>
		<?php 
		$dbKey 	= $RGen_theme;
		$name	= 'RGen_theme';
		$id		= 'RGen_theme';
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
		<a class="resetBt btn btn-small" onclick="$('.hex, .rgb').attr('value', '');$('.hex, .rgb').attr('style', '');$('#RGen_bodyBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_bodyBgImg').attr('value', '');$('#RGen_headerBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_headerBgImg').attr('value', '');">Reset theme</a>

	</div>
</div>
<div class="tabs-left tabbable" data-theme="tab1">
	<ul id="theme_tabs" class="nav nav-tabs">
		<li class="active"><a href="#tab_general_theme">General theme colors</a></li>
		<li><a href="#tab_slideshow_theme">Slide show</a></li>
		<li><a href="#tab_topheader_theme">Header</a></li>
		<li><a href="#tab_slideshowprd_theme">Home page slideshow product scroller</a></li>
		<li><a href="#tab_productbox_theme">Product box</a></li>
		<li><a href="#tab_prdpage_theme">Product page</a></li>
		<li><a href="#tab_footer_theme">Footer</a></li>
	</ul>
	<?php 
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
		'center center'
	); ?>
	<div class="tab-content">
		<div id="tab_general_theme" class="tab-pane active">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Body and page colors  
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.global .hex, .global .rgb').attr('value', '');$('.global .hex, .global .rgb').attr('style', '');$('#RGen_bodyBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_bodyBgImg').attr('value', '');">Reset</a>
				</h4>
				<div class="style-box-content global">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Body background</strong></td>
							<td class="field">
								<input type="text" class="rgb" name="RGen_bodyBg" id="RGen_bodyBg" value="<?php echo $RGen_bodyBg; ?>">
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Body background image</strong></td>
							<td class="field">
								<table class="sub-from img-upload">
									<tr>
										<td width="90" align="center">
											<input type="hidden" name="RGen_bodyBgImg" value="<?php echo $RGen_bodyBgImg; ?>" id="RGen_bodyBgImg" />
											<img src="<?php echo $RGen_bodyBgImg_preview; ?>" alt="" id="RGen_bodyBgImg_preview" class="PreviewImage" />
										</td>
										<td valign="top" style='padding-left:15px;'>
											<div class='upload-btn'>
												<a onclick="image_upload('RGen_bodyBgImg', 'RGen_bodyBgImg_preview');" class="bt btn btn-mini">Upload image</a>
												<a onclick="$('#RGen_bodyBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_bodyBgImg').attr('value', '');" class="bt btn btn-mini">Remove image</a>
											</div>
											<table class="sub-from">
												<tr>
													<td>
														Background repeat<br />
														<span class='select'>
															<select style="width:150px" name="RGen_bodyBgImgRepeat">
																<?php foreach ($ImgRepeat as $key) { ?>
																	<?php ($key ==  $this->config->get('RGen_bodyBgImgRepeat')) ? $selected = 'selected' : $selected=''; ?>
																	<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
																<?php } ?>
															</select>
														</span>
													</td>
													<td>
														Background position<br />
														<span class='select'>
															<select style="width:150px" name="RGen_bodyBgImgPosition">
																<?php foreach ($ImgPosition as $key) { ?>
																	<?php ($key ==  $this->config->get('RGen_bodyBgImgPosition')) ? $selected = 'selected' : $selected=''; ?>
																	<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
																<?php } ?>
															</select>
														</span>
													</td>
													<td>
														<?php $bodyBgAttachment = array( 
															'inherit',
															'fixed'
														); ?>
														Background Attachment<br />
														<span class='select'>
															<select style="width:150px" name="RGen_bodyBgAttachment">
																<?php foreach ($bodyBgAttachment as $key) { ?>
																	<?php ($key ==  $this->config->get('RGen_bodyBgAttachment')) ? $selected = 'selected' : $selected=''; ?>
																	<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
																<?php } ?>
															</select>
														</span>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Page background</strong></td>
							<td class="field"><input type="text" class="rgb" name="RGen_pageBg" id="RGen_pageBg" value="<?php echo $RGen_pageBg; ?>"></td>
						</tr>
						<tr>
							<td class="lbl"><strong>Page shadow</strong></td>
							<td class="field">
								<input type="text" class="rgb" name="RGen_pageShadow" id="RGen_pageShadow" value="<?php echo $RGen_pageShadow; ?>"> 
							</td>
						</tr>
					</table>
				</div><br /><br />
				<h4 class="header-1">
					Other common colors
				</h4>
				<div class="style-box-content global">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Global color</strong></td>
							<td class="field"><input type="text" class="hex" name="RGen_globalColour" id="RGen_globalColour" value="<?php echo $RGen_globalColour; ?>"></td>
						</tr>
						<tr>
							<td class="lbl"><strong>Common color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Image box<br /><input type="text" class="rgb" name="RGen_ImageBox" id="RGen_ImageBox" value="<?php echo $RGen_ImageBox; ?>"></td>
										<td>Global lines<br /><input type="text" class="rgb" name="RGen_globalLines" id="RGen_globalLines" value="<?php echo $RGen_globalLines; ?>"></td>
										<td>Heading text<br /><input type="text" class="hex" name="RGen_Header" id="RGen_Header" value="<?php echo $RGen_Header; ?>"></td>
										<td>Content text<br /><input type="text" class="hex" name="RGen_fontColor" id="RGen_fontColor" value="<?php echo $RGen_fontColor; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Scroll to top</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_scrollTop" id="RGen_scrollTop" value="<?php echo $RGen_scrollTop; ?>"></td>
										<td>Arrow<br /><input type="text" class="hex" name="RGen_scrollTop_arrow" id="RGen_scrollTop_arrow" value="<?php echo $RGen_scrollTop_arrow; ?>"></td>
									</tr>
								</table>
								
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Scroller arrows</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Normal<br /><input type="text" class="hex" name="RGen_arrowBg" id="RGen_arrowBg" value="<?php echo $RGen_arrowBg; ?>"></td>
										<td>Hover<br /><input type="text" class="hex" name="RGen_arrowBg_hover" id="RGen_arrowBg_hover" value="<?php echo $RGen_arrowBg_hover; ?>"></td>
										<td>Arrow<br /><input type="text" class="hex" name="RGen_arrow" id="RGen_arrow" value="<?php echo $RGen_arrow; ?>"></td>
										<td>Arrow hover<br /><input type="text" class="hex" name="RGen_arrow_hover" id="RGen_arrow_hover" value="<?php echo $RGen_arrow_hover; ?>"></td>
										<td>Ring<br /><input type="text" class="rgb" name="RGen_arrowBgRing" id="RGen_arrowBgRing" value="<?php echo $RGen_arrowBgRing; ?>"></td>
										<td>Ring hover<br /><input type="text" class="rgb" name="RGen_arrowBgRing_hover" id="RGen_arrowBgRing_hover" value="<?php echo $RGen_arrowBgRing_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>General table list</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Header<br /><input type="text" class="rgb" name="RGen_tableListHeader" id="RGen_tableListHeader" value="<?php echo $RGen_tableListHeader; ?>"></td>
										<td>Header text<br /><input type="text" class="hex" name="RGen_tableListHeaderFont" id="RGen_tableListHeaderFont" value="<?php echo $RGen_tableListHeaderFont; ?>"></td>
										<td>Content text<br /><input type="text" class="hex" name="RGen_tableListFont" id="RGen_tableListFont" value="<?php echo $RGen_tableListFont; ?>"></td>
										<td>Border right<br /><input type="text" class="rgb" name="RGen_tableListBorder_right" id="RGen_tableListBorder_right" value="<?php echo $RGen_tableListBorder_right; ?>"></td>
										<td>Border bottom<br /><input type="text" class="rgb" name="RGen_tableListBorder_bottom" id="RGen_tableListBorder_bottom" value="<?php echo $RGen_tableListBorder_bottom; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br /><br />
				<h4 class="header-1">
					Button, forms and links
				</h4>
				<div class="style-box-content global">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Button1 color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Normal<br /><input type="text" class="hex" name="RGen_btColor" id="RGen_btColor" value="<?php echo $RGen_btColor; ?>"></td>
										<td>Normal text<br /><input type="text" class="hex" name="RGen_btFontColor" id="RGen_btFontColor" value="<?php echo $RGen_btFontColor; ?>"></td>
										<td>Hover<br /><input type="text" class="hex" name="RGen_btColor_hover" id="RGen_btColor_hover" value="<?php echo $RGen_btColor_hover; ?>"></td>
										<td>Hover text<br /><input type="text" class="hex" name="RGen_btFontColor_hover" id="RGen_btFontColor_hover" value="<?php echo $RGen_btFontColor_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Button2 color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Normal<br /><input type="text" class="hex" name="RGen_btColor1" id="RGen_btColor1" value="<?php echo $RGen_btColor1; ?>"></td>
										<td>Normal text<br /><input type="text" class="hex" name="RGen_btFontColor1" id="RGen_btFontColor1" value="<?php echo $RGen_btFontColor1; ?>"></td>
										<td>Hover<br /><input type="text" class="hex" name="RGen_btColor1_hover" id="RGen_btColor1_hover" value="<?php echo $RGen_btColor1_hover; ?>"></td>
										<td>Hover text<br /><input type="text" class="hex" name="RGen_btFontColor1_hover" id="RGen_btFontColor1_hover" value="<?php echo $RGen_btFontColor1_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Forms</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Text box<br /><input type="text" class="rgb" name="RGen_TextBox" id="RGen_TextBox" value="<?php echo $RGen_TextBox; ?>"></td>
										<td>Text box border<br /><input type="text" class="rgb" name="RGen_TextBoxBorder" id="RGen_TextBoxBorder" value="<?php echo $RGen_TextBoxBorder; ?>"></td>
										<td>Text box text<br /><input type="text" class="hex" name="RGen_TextBoxText" id="RGen_TextBoxText" value="<?php echo $RGen_TextBoxText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Form content</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Headers<br /><input type="text" class="hex" name="RGen_FormHeaders" id="RGen_FormHeaders" value="<?php echo $RGen_FormHeaders; ?>"></td>
										<td>Labels<br /><input type="text" class="hex" name="RGen_FormLabel" id="RGen_FormLabel" value="<?php echo $RGen_FormLabel; ?>"></td>
										<td>Border<br /><input type="text" class="rgb" name="RGen_FormBorders" id="RGen_FormBorders" value="<?php echo $RGen_FormBorders; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr>
							<td class="lbl"><strong>General link button color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Normal<br /><input type="text" class="hex" name="RGen_LinkBtColor" id="RGen_LinkBtColor" value="<?php echo $RGen_LinkBtColor; ?>"></td>
										<td>Normal Text<br /><input type="text" class="hex" name="RGen_LinkBtFontColor" id="RGen_LinkBtFontColor" value="<?php echo $RGen_LinkBtFontColor; ?>"></td>
										<td>Hover<br /><input type="text" class="hex" name="RGen_LinkBtColor_hover" id="RGen_LinkBtColor_hover" value="<?php echo $RGen_LinkBtColor_hover; ?>"></td>
										<td>Hover text<br /><input type="text" class="hex" name="RGen_LinkBtFontColor_hover" id="RGen_LinkBtFontColor_hover" value="<?php echo $RGen_LinkBtFontColor_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
																	
						<tr>
							<td class="lbl"><strong>General link color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Normal<br /><input type="text" class="hex" name="RGen_LinkColor" id="RGen_LinkColor" value="<?php echo $RGen_LinkColor; ?>"></td>
										<td>Hover<br /><input type="text" class="hex" name="RGen_LinkColor_hover" id="RGen_LinkColor_hover" value="<?php echo $RGen_LinkColor_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br /><br />
				<h4 class="header-1">
					Custom block top and bottom
				</h4>
				<div class="style-box-content global">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Custom block above header</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_custTP_bg" id="RGen_custTP_bg" value="<?php echo $RGen_custTP_bg; ?>"></td>
										<td>Heading<br /><input type="text" class="hex" name="RGen_custTP_hd" id="RGen_custTP_hd" value="<?php echo $RGen_custTP_hd; ?>"></td>
										<td>Bottom border<br /><input type="text" class="rgb" name="RGen_custTP_border" id="RGen_custTP_border" value="<?php echo $RGen_custTP_border; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_custTP_content" id="RGen_custTP_content" value="<?php echo $RGen_custTP_content; ?>"></td>
										<td>Arrow BG<br /><input type="text" class="rgb" name="RGen_custTP_arrowBg" id="RGen_custTP_arrowBg" value="<?php echo $RGen_custTP_arrowBg; ?>"></td>
										<td>Arrow<br /><input type="text" class="rgb" name="RGen_custTP_arrow" id="RGen_custTP_arrow" value="<?php echo $RGen_custTP_arrow; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Custom block footer</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_custFT_bg" id="RGen_custFT_bg" value="<?php echo $RGen_custFT_bg; ?>"></td>
										<td>Heading<br /><input type="text" class="hex" name="RGen_custFT_hd" id="RGen_custFT_hd" value="<?php echo $RGen_custFT_hd; ?>"></td>
										<td>Bottom border<br /><input type="text" class="rgb" name="RGen_custFT_border" id="RGen_custFT_border" value="<?php echo $RGen_custFT_border; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_custFT_content" id="RGen_custFT_content" value="<?php echo $RGen_custFT_content; ?>"></td>
										<td>Arrow BG<br /><input type="text" class="rgb" name="RGen_custFT_arrowBg" id="RGen_custFT_arrowBg" value="<?php echo $RGen_custFT_arrowBg; ?>"></td>
										<td>Arrow<br /><input type="text" class="rgb" name="RGen_custFT_arrow" id="RGen_custFT_arrow" value="<?php echo $RGen_custFT_arrow; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br /><br />

				<h4 class="header-1">
					Mobile product block
				</h4>
				<div class="style-box-content mob-product">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Product box</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" id="RGen_m_bg" class="rgb" value=""></td>
										<td>Name<br /><input type="text" id="RGen_m_name" class="hex" value=""></td>
										<td>Price<br /><input type="text" id="RGen_m_price" class="hex" value=""></td>
										<td>Price old<br /><input type="text" id="RGen_m_priceOld" class="hex" value=""></td>
										<td>Description<br /><input type="text" id="RGen_m_description" class="hex" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Product box buttons</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Cart background<br /><input type="text" id="RGen_m_addcartBg" class="rgb" value=""></td>
										<td>Cart text<br /><input type="text" id="RGen_m_addcartTxt" class="rgb" value=""></td>
										<td>Icon color<br /><input type="text" id="RGen_m_iconColor" class="rgb" value=""></td>
										<td>Icon border<br /><input type="text" id="RGen_m_iconBdr" class="rgb" value=""></td>
										<td>Icon background<br /><input type="text" id="RGen_m_iconBg" class="rgb" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<?php 
						$dbKey 			= isset($RGen_mobPrd) ? $RGen_mobPrd : null;
						$name			= 'RGen_mobPrd';
					?>
					<input type="hidden" class="RGen_mobPrd" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
					<script type="text/javascript">
					$(document).ready(function(){
						$(window).on("click blur", '.mob-product input', function(){
							var newVal = $('#RGen_m_bg').val()+'|'+
										 $('#RGen_m_name').val()+'|'+
										 $('#RGen_m_price').val()+'|'+
										 $('#RGen_m_priceOld').val()+'|'+
										 $('#RGen_m_description').val()+'|'+
										 $('#RGen_m_addcartBg').val()+'|'+
										 $('#RGen_m_addcartTxt').val()+'|'+
										 $('#RGen_m_iconColor').val()+'|'+
										 $('#RGen_m_iconBdr').val()+'|'+
										 $('#RGen_m_iconBg').val();

							$('.mob-product .RGen_mobPrd').val(newVal);
							console.log(newVal);
						});
						var RGen_mobPrd = $('.mob-product .RGen_mobPrd').val();
						if(RGen_mobPrd){
							var RGen_mobPrd_ar = RGen_mobPrd.split('|');
										$('#RGen_m_bg').val(RGen_mobPrd_ar[0]);
										$('#RGen_m_name').val(RGen_mobPrd_ar[1]);
										$('#RGen_m_price').val(RGen_mobPrd_ar[2]);
										$('#RGen_m_priceOld').val(RGen_mobPrd_ar[3]);
										$('#RGen_m_description').val(RGen_mobPrd_ar[4]);
										$('#RGen_m_addcartBg').val(RGen_mobPrd_ar[5]);
										$('#RGen_m_addcartTxt').val(RGen_mobPrd_ar[6]);
										$('#RGen_m_iconColor').val(RGen_mobPrd_ar[7]);
										$('#RGen_m_iconBdr').val(RGen_mobPrd_ar[8]);
										$('#RGen_m_iconBg').val(RGen_mobPrd_ar[9]);
						}
					});
					</script>
				</div>

			</div>
		</div>
		<div id="tab_slideshow_theme" class="tab-pane">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Slide show
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.slideshow-section .hex, .slideshow-section .rgb').attr('value', '');$('.slideshow-section .hex, .slideshow-section .rgb').attr('style', '');">Reset</a>
				</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field"><input type="text" class="rgb" name="RGen_ssBg" id="RGen_ssBg" value="<?php echo $RGen_ssBg; ?>"></td>
						</tr>
						<tr>
							<td class="lbl"><strong>Slide show dot color</strong></td>
							<td class="field"><input type="text" class="rgb" name="RGen_globalColourRing" id="RGen_globalColourRing" value="<?php echo $RGen_globalColourRing; ?>"></td>
						</tr>
					</table>
				</div>
				<h4 class="header-1">Caption style 1</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c1_hdBg" id="RGen_c1_hdBg" value="<?php echo $RGen_c1_hdBg; ?>"></td>
										<td>Content<br /><input type="text" class="rgb" name="RGen_c1_dataBg" id="RGen_c1_dataBg" value="<?php echo $RGen_c1_dataBg; ?>"></td>
										<td>Link button<br /><input type="text" class="rgb" name="RGen_c1_linkBg" id="RGen_c1_linkBg" value="<?php echo $RGen_c1_linkBg; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c1_hdText" id="RGen_c1_hdText" value="<?php echo $RGen_c1_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c1_dataText" id="RGen_c1_dataText" value="<?php echo $RGen_c1_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c1_linkText" id="RGen_c1_linkText" value="<?php echo $RGen_c1_linkText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 2</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background and Shadow</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c2_hdTextshd" id="RGen_c2_hdTextshd" value="<?php echo $RGen_c2_hdTextshd; ?>"></td>
										<td>Content<br /><input type="text" class="rgb" name="RGen_c2_dataTextshd" id="RGen_c2_dataTextshd" value="<?php echo $RGen_c2_dataTextshd; ?>"></td>
										<td>Link bg<br /><input type="text" class="rgb" name="RGen_c2_linkBg" id="RGen_c2_linkBg" value="<?php echo $RGen_c2_linkBg; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c2_linkBg_hover" id="RGen_c2_linkBg_hover" value="<?php echo $RGen_c2_linkBg_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Border</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Content<br /><input type="text" class="rgb" name="RGen_c2_dataBdr" id="RGen_c2_dataBdr" value="<?php echo $RGen_c2_dataBdr; ?>"></td>
										<td>Link<br /><input type="text" class="rgb" name="RGen_c2_linkBdr" id="RGen_c2_linkBdr" value="<?php echo $RGen_c2_linkBdr; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c2_linkBdr_hover" id="RGen_c2_linkBdr_hover" value="<?php echo $RGen_c2_linkBdr_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c2_hdText" id="RGen_c2_hdText" value="<?php echo $RGen_c2_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c2_dataText" id="RGen_c2_dataText" value="<?php echo $RGen_c2_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c2_linkText" id="RGen_c2_linkText" value="<?php echo $RGen_c2_linkText; ?>"></td>
										<td>Link hover<br /><input type="text" class="hex" name="RGen_c2_linkText_hover" id="RGen_c2_linkText_hover" value="<?php echo $RGen_c2_linkText_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 3</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c3_Bg" id="RGen_c3_Bg" value="<?php echo $RGen_c3_Bg; ?>"></td>
										<td>Link button<br /><input type="text" class="rgb" name="RGen_c3_linkBg" id="RGen_c3_linkBg" value="<?php echo $RGen_c3_linkBg; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c3_linkBg_hover" id="RGen_c3_linkBg_hover" value="<?php echo $RGen_c3_linkBg_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Border</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Content<br /><input type="text" class="rgb" name="RGen_c3_dataBdr" id="RGen_c3_dataBdr" value="<?php echo $RGen_c3_dataBdr; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c3_linkBdr_hover" id="RGen_c3_linkBdr_hover" value="<?php echo $RGen_c3_linkBdr_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c3_hdText" id="RGen_c3_hdText" value="<?php echo $RGen_c3_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c3_dataText" id="RGen_c3_dataText" value="<?php echo $RGen_c3_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c3_linkText" id="RGen_c3_linkText" value="<?php echo $RGen_c3_linkText; ?>"></td>
										<td>Link hover<br /><input type="text" class="hex" name="RGen_c3_linkText_hover" id="RGen_c3_linkText_hover" value="<?php echo $RGen_c3_linkText_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 4</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c4_hdBg" id="RGen_c4_hdBg" value="<?php echo $RGen_c4_hdBg; ?>"></td>
										<td>Link button<br /><input type="text" class="rgb" name="RGen_c4_linkBg" id="RGen_c4_linkBg" value="<?php echo $RGen_c4_linkBg; ?>"></td>
										<td>Link hover border<br /><input type="text" class="rgb" name="RGen_c4_link_hover" id="RGen_c4_link_hover" value="<?php echo $RGen_c4_link_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c4_hdText" id="RGen_c4_hdText" value="<?php echo $RGen_c4_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c4_dataText" id="RGen_c4_dataText" value="<?php echo $RGen_c4_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c4_linkText" id="RGen_c4_linkText" value="<?php echo $RGen_c4_linkText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 4</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c4_hdBg" id="RGen_c4_hdBg" value="<?php echo $RGen_c4_hdBg; ?>"></td>
										<td>Link button<br /><input type="text" class="rgb" name="RGen_c4_linkBg" id="RGen_c4_linkBg" value="<?php echo $RGen_c4_linkBg; ?>"></td>
										<td>Link hover border<br /><input type="text" class="rgb" name="RGen_c4_link_hover" id="RGen_c4_link_hover" value="<?php echo $RGen_c4_link_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c4_hdText" id="RGen_c4_hdText" value="<?php echo $RGen_c4_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c4_dataText" id="RGen_c4_dataText" value="<?php echo $RGen_c4_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c4_linkText" id="RGen_c4_linkText" value="<?php echo $RGen_c4_linkText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 5</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="rgb" name="RGen_c5_Bg" id="RGen_c5_Bg" value="<?php echo $RGen_c5_Bg; ?>"></td>
										<td>Link button<br /><input type="text" class="rgb" name="RGen_c5_linkBg" id="RGen_c5_linkBg" value="<?php echo $RGen_c5_linkBg; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c5_linkBg_hover" id="RGen_c5_linkBg_hover" value="<?php echo $RGen_c5_linkBg_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Border</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Content<br /><input type="text" class="rgb" name="RGen_c5_dataBdr" id="RGen_c5_dataBdr" value="<?php echo $RGen_c5_dataBdr; ?>"></td>
										<td>Link hover<br /><input type="text" class="rgb" name="RGen_c5_linkBdr_hover" id="RGen_c5_linkBdr_hover" value="<?php echo $RGen_c5_linkBdr_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c5_hdText" id="RGen_c5_hdText" value="<?php echo $RGen_c5_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c5_dataText" id="RGen_c5_dataText" value="<?php echo $RGen_c5_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c5_linkText" id="RGen_c5_linkText" value="<?php echo $RGen_c5_linkText; ?>"></td>
										<td>Link hover<br /><input type="text" class="hex" name="RGen_c5_linkText_hover" id="RGen_c5_linkText_hover" value="<?php echo $RGen_c5_linkText_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

				<h4 class="header-1">Caption style 6</h4>
				<div class="style-box-content slideshow-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Background and Border</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Link bg<br /><input type="text" class="rgb" name="RGen_c6_linkBg" id="RGen_c6_linkBg" value="<?php echo $RGen_c6_linkBg; ?>"></td>
										<td>Link bg hover<br /><input type="text" class="rgb" name="RGen_c6_linkBg_hover" id="RGen_c6_linkBg_hover" value="<?php echo $RGen_c6_linkBg_hover; ?>"></td>
										<td>Link hover border<br /><input type="text" class="rgb" name="RGen_c6_linkBdr_hover" id="RGen_c6_linkBdr_hover" value="<?php echo $RGen_c6_linkBdr_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Text color</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Title<br /><input type="text" class="hex" name="RGen_c6_hdText" id="RGen_c6_hdText" value="<?php echo $RGen_c6_hdText; ?>"></td>
										<td>Content<br /><input type="text" class="hex" name="RGen_c6_dataText" id="RGen_c6_dataText" value="<?php echo $RGen_c6_dataText; ?>"></td>
										<td>Link<br /><input type="text" class="hex" name="RGen_c6_linkText" id="RGen_c6_linkText" value="<?php echo $RGen_c6_linkText; ?>"></td>
										<td>Link hover<br /><input type="text" class="hex" name="RGen_c6_link_hover" id="RGen_c6_link_hover" value="<?php echo $RGen_c6_link_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br><br>

			</div>
		</div>
		<div id="tab_topheader_theme" class="tab-pane">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Header section 
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.header-section .hex, .header-section .rgb').attr('value', '');$('.header-section .hex, .header-section .rgb').attr('style', '');$('#RGen_headerBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_headerBgImg').attr('value', '');">Reset</a>
				</h4>
				<div class="style-box-content header-section">
				<table class="table">
					<tr>
						<td class="lbl"><strong>Header background</strong></td>
						<td class="field"><input type="text" class="rgb" name="RGen_headerBg" id="RGen_headerBg" value="<?php echo $RGen_headerBg; ?>"></td>
					</tr>
					<tr>
						<td class="lbl"><strong>Header background image</strong></td>
						<td class="field">
							<table class="sub-from img-upload">
								<tr>
									<td width="90" align="center">
										<input type="hidden" name="RGen_headerBgImg" value="<?php echo $RGen_headerBgImg; ?>" id="RGen_headerBgImg" />
										<img src="<?php echo $RGen_headerBgImg_preview; ?>" alt="" id="RGen_headerBgImg_preview" class="PreviewImage" />
										
									</td>
									<td valign="top" style='padding-left:15px;'>
										<div class='upload-btn'>
											<a onclick="image_upload('RGen_headerBgImg', 'RGen_headerBgImg_preview');" class="bt btn btn-mini">Upload image</a> 
											<a onclick="$('#RGen_headerBgImg_preview').attr('src', '<?php echo $no_image; ?>'); $('#RGen_headerBgImg').attr('value', '');" class="bt btn btn-mini">Remove image</a>
										</div>
										<span class='select'>
											<select style="width:150px" name="RGen_headerBgImgRepeat">
												<?php foreach ($ImgRepeat as $key) { ?>
													<?php ($key ==  $this->config->get('RGen_headerBgImgRepeat')) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
												<?php } ?>
											</select>
										</span>
										<span class='select'>
											<select style="width:150px" name="RGen_headerBgImgPosition">
												<?php foreach ($ImgPosition as $key) { ?>
													<?php ($key ==  $this->config->get('RGen_headerBgImgPosition')) ? $selected = 'selected' : $selected=''; ?>
													<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
												<?php } ?>
											</select>
										</span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Breadcrumb</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Text<br /><input type="text" class="hex" name="RGen_Breadcrumb_Link" id="RGen_Breadcrumb_Link" value="<?php echo $RGen_Breadcrumb_Link; ?>"></td>
									<td>Text hover<br /><input type="text" class="hex" name="RGen_Breadcrumb_Link_hover" id="RGen_Breadcrumb_Link_hover" value="<?php echo $RGen_Breadcrumb_Link_hover; ?>"></td>
									<td>Arrow<br /><input type="text" class="hex" name="RGen_Breadcrumb_Arrow" id="RGen_Breadcrumb_Arrow" value="<?php echo $RGen_Breadcrumb_Arrow; ?>"></td>
								</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Logo background</strong></td>
						<td class="field"><input type="text" class="rgb" name="RGen_Logo" id="RGen_Logo" value="<?php echo $RGen_Logo; ?>"></td>
					</tr>
					<tr>
						<td class="lbl"><strong>Other text &amp; links</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Text<br /><input type="text" class="hex" name="RGen_Header_text" id="RGen_Header_text" value="<?php echo $RGen_Header_text; ?>"></td>
									<td>Links Normal<br /><input type="text" class="hex" name="RGen_Header_Link" id="RGen_Header_Link" value="<?php echo $RGen_Header_Link; ?>"></td>
									<td>Links Hover<br /><input type="text" class="hex" name="RGen_Header_Link_hover" id="RGen_Header_Link_hover" value="<?php echo $RGen_Header_Link_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Search text box</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_searchBg" id="RGen_searchBg" value="<?php echo $RGen_searchBg; ?>"></td>
									<td>Outer background<br /><input type="text" class="rgb" name="RGen_searchOuterBg" id="RGen_searchOuterBg" value="<?php echo $RGen_searchOuterBg; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_searchText" id="RGen_searchText" value="<?php echo $RGen_searchText; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_searchBtIcon" id="RGen_searchBtIcon" value="<?php echo $RGen_searchBtIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_searchBtIcon_hover" id="RGen_searchBtIcon_hover" value="<?php echo $RGen_searchBtIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Search</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Normal<br /><input type="text" class="rgb" name="RGen_searchBt" id="RGen_searchBt" value="<?php echo $RGen_searchBt; ?>"></td>
									<td>Normal ring<br /><input type="text" class="rgb" name="RGen_searchBtRing" id="RGen_searchBtRing" value="<?php echo $RGen_searchBtRing; ?>"></td>
									<td>Hover<br /><input type="text" class="rgb" name="RGen_searchBt_hover" id="RGen_searchBt_hover" value="<?php echo $RGen_searchBt_hover; ?>"></td>
									<td>Hover ring<br /><input type="text" class="rgb" name="RGen_searchBtRing_hover" id="RGen_searchBtRing_hover" value="<?php echo $RGen_searchBtRing_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div><br /><br />
				<h4 class="header-1">Menu</h4>
				<div class="style-box-content header-section">
				<table class="table">
					<tr>
						<td class="lbl"><strong>Menu</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Menu wrapper bg<br /><input type="text" class="rgb" name="RGen_Navbar" id="RGen_Navbar" value="<?php echo $RGen_Navbar; ?>"></td>
									<td>Menu bar bg<br /><input type="text" class="rgb" name="RGen_NavMenubar" id="RGen_NavMenubar" value="<?php echo $RGen_NavMenubar; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Menu links</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Normal<br /><input type="text" class="rgb" name="RGen_Nav" id="RGen_Nav" value="<?php echo $RGen_Nav; ?>"></td>
									<td>Normal text<br /><input type="text" class="hex" name="RGen_NavFont" id="RGen_NavFont" value="<?php echo $RGen_NavFont; ?>"></td>
									<td>Hover<br /><input type="text" class="rgb" name="RGen_Nav_hover" id="RGen_Nav_hover" value="<?php echo $RGen_Nav_hover; ?>"></td>
									<td>Hover text<br /><input type="text" class="hex" name="RGen_NavFont_hover" id="RGen_NavFont_hover" value="<?php echo $RGen_NavFont_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Menu dropdown</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Outer background<br /><input type="text" class="rgb" name="RGen_NavSub_bg" id="RGen_NavSub_bg" value="<?php echo $RGen_NavSub_bg; ?>"></td>
									<td>Inner background<br /><input type="text" class="rgb" name="RGen_NavSub" id="RGen_NavSub" value="<?php echo $RGen_NavSub; ?>"></td>
									<td>Normal text<br /><input type="text" class="hex" name="RGen_NavSubFont" id="RGen_NavSubFont" value="<?php echo $RGen_NavSubFont; ?>"></td>
									<td>Hover bg<br /><input type="text" class="rgb" name="RGen_NavSub_hover" id="RGen_NavSub_hover" value="<?php echo $RGen_NavSub_hover; ?>"></td>
									<td>Hover text<br /><input type="text" class="hex" name="RGen_NavSubFont_hover" id="RGen_NavSubFont_hover" value="<?php echo $RGen_NavSubFont_hover; ?>"></td>
									<td>Border<br /><input type="text" class="rgb" name="RGen_NavSubBorder" id="RGen_NavSubBorder" value="<?php echo $RGen_NavSubBorder; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Home button</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Normal<br /><input type="text" class="rgb" name="RGen_homeBt" id="RGen_homeBt" value="<?php echo $RGen_homeBt; ?>"></td>
									<td>Hover<br /><input type="text" class="rgb" name="RGen_homeBt_hover" id="RGen_homeBt_hover" value="<?php echo $RGen_homeBt_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_homeBtIcon" id="RGen_homeBtIcon" value="<?php echo $RGen_homeBtIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_homeBtIcon_hover" id="RGen_homeBtIcon_hover" value="<?php echo $RGen_homeBtIcon_hover; ?>"></td>
									<td>Button ring<br /><input type="text" class="rgb" name="RGen_homeBtRing" id="RGen_homeBtRing" value="<?php echo $RGen_homeBtRing; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="mega-menu">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Brand, Product and Category menu</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Outer bg<br /><input type="text" class="rgb" id="RGen_menuOuter_bg" value=""></td>
										<td>Inner bg<br /><input type="text" class="rgb" id="RGen_menuInner_bg" value=""></td>
										<td>All link color<br /><input type="text" class="hex" id="RGen_mg_menuLinks" value=""></td>
										<td>Sub link color<br /><input type="text" class="hex" id="RGen_mg_subLinks" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Brand, Product, Category menu borders and separators</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Separators<br /><input type="text" class="rgb" id="RGen_mg_menuSeparators" value=""></td>
										<td>Sub link borders<br /><input type="text" class="rgb" id="RGen_mg_sublinkBorder" value=""></td>
										<td>Main link and other borders<br /><input type="text" class="rgb" id="RGen_mg_mainlinkBorder" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Brand and Product blocks</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Border<br /><input type="text" class="rgb" id="RGen_mg_menuItemBorder" value=""></td>
										<td>Border hover<br /><input type="text" class="rgb" id="RGen_mg_menuItemBorder_hover" value=""></td>
										<td>Button bg<br /><input type="text" class="rgb" id="RGen_mg_btnBg" value=""></td>
										<td>Button text<br /><input type="text" class="hex" id="RGen_mg_btnTxt" value=""></td>
										<td>Price<br /><input type="text" class="hex" id="RGen_mg_priceNew" value=""></td>
										<td>Price old<br /><input type="text" class="hex" id="RGen_mg_priceOld" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				
					<?php 
						$dbKey 			= isset($RGen_megaMenu_colors) ? $RGen_megaMenu_colors : null;
						$name			= 'RGen_megaMenu_colors';
					?>
					<input type="hidden" class="RGen_megaMenu_colors" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
					<script type="text/javascript">
					$(document).ready(function(){
						$(window).on("click blur", '.mega-menu input', function(){
							var newVal = $('#RGen_menuOuter_bg').val()+'|'+
										 $('#RGen_menuInner_bg').val()+'|'+
										 $('#RGen_mg_menuSeparators').val()+'|'+
										 $('#RGen_mg_sublinkBorder').val()+'|'+
										 $('#RGen_mg_menuLinks').val()+'|'+
										 $('#RGen_mg_subLinks').val()+'|'+
										 $('#RGen_mg_menuItemBorder').val()+'|'+
										 $('#RGen_mg_menuItemBorder_hover').val()+'|'+
										 $('#RGen_mg_btnBg').val()+'|'+
										 $('#RGen_mg_btnTxt').val()+'|'+
										 $('#RGen_mg_priceNew').val()+'|'+
										 $('#RGen_mg_priceOld').val()+'|'+
										 $('#RGen_mg_mainlinkBorder').val();
							$('.mega-menu .RGen_megaMenu_colors').val(newVal);
							console.log(newVal);
						});
						var RGen_megaMenu_colors = $('.mega-menu .RGen_megaMenu_colors').val();
						if(RGen_megaMenu_colors){
							var RGen_megaMenu_colors_ar = RGen_megaMenu_colors.split('|');
										$('#RGen_menuOuter_bg').val(RGen_megaMenu_colors_ar[0]);
										$('#RGen_menuInner_bg').val(RGen_megaMenu_colors_ar[1]);
										$('#RGen_mg_menuSeparators').val(RGen_megaMenu_colors_ar[2]);
										$('#RGen_mg_sublinkBorder').val(RGen_megaMenu_colors_ar[3]);
										$('#RGen_mg_menuLinks').val(RGen_megaMenu_colors_ar[4]);
										$('#RGen_mg_subLinks').val(RGen_megaMenu_colors_ar[5]);
										$('#RGen_mg_menuItemBorder').val(RGen_megaMenu_colors_ar[6]);
										$('#RGen_mg_menuItemBorder_hover').val(RGen_megaMenu_colors_ar[7]);
										$('#RGen_mg_btnBg').val(RGen_megaMenu_colors_ar[8]);
										$('#RGen_mg_btnTxt').val(RGen_megaMenu_colors_ar[9]);
										$('#RGen_mg_priceNew').val(RGen_megaMenu_colors_ar[10]);
										$('#RGen_mg_priceOld').val(RGen_megaMenu_colors_ar[11]);
										$('#RGen_mg_mainlinkBorder').val(RGen_megaMenu_colors_ar[12]);
						}
					});
					</script>
				</div>

				</div><br /><br />
				
				<h4 class="header-1">Mobile menu</h4>
				<div class="style-box-content header-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Menu bar</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_mob_Menubar" id="RGen_mob_Menubar" value="<?php echo isset($RGen_mob_Menubar) ? $RGen_mob_Menubar : ''; ?>"></td>
										<td>Menu icon<br /><input type="text" class="rgb" name="RGen_mob_Menuicon" id="RGen_mob_Menuicon" value="<?php echo isset($RGen_mob_Menuicon) ? $RGen_mob_Menuicon : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Main menu links</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Separators<br /><input type="text" class="rgb" name="RGen_mob_separator" id="RGen_mob_separator" value="<?php echo isset($RGen_mob_separator) ? $RGen_mob_separator : ''; ?>"></td>
										<td>Background<br /><input type="text" class="rgb" name="RGen_mob_menulink" id="RGen_mob_menulink" value="<?php echo isset($RGen_mob_menulink) ? $RGen_mob_menulink : ''; ?>"></td>
										<td>Text<br /><input type="text" class="hex" name="RGen_mob_menutext" id="RGen_mob_menutext" value="<?php echo isset($RGen_mob_menutext) ? $RGen_mob_menutext : ''; ?>"></td>
										<td>Background hover<br /><input type="text" class="rgb" name="RGen_mob_menulink_hover" id="RGen_mob_menulink_hover" value="<?php echo isset($RGen_mob_menulink_hover) ? $RGen_mob_menulink_hover : ''; ?>"></td>
										<td>Text hover<br /><input type="text" class="hex" name="RGen_mob_menutext_hover" id="RGen_mob_menutext_hover" value="<?php echo isset($RGen_mob_menutext_hover) ? $RGen_mob_menutext_hover : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Sub menu</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Separators<br /><input type="text" class="rgb" name="RGen_mob_submenu_separator" id="RGen_mob_submenu_separator" value="<?php echo isset($RGen_mob_submenu_separator) ? $RGen_mob_submenu_separator : ''; ?>"></td>
										<td>Background<br /><input type="text" class="rgb" name="RGen_mob_submenu" id="RGen_mob_submenu" value="<?php echo isset($RGen_mob_submenu) ? $RGen_mob_submenu : ''; ?>"></td>
										<td>Text<br /><input type="text" class="hex" name="RGen_mob_submenutext" id="RGen_mob_submenutext" value="<?php echo isset($RGen_mob_submenutext) ? $RGen_mob_submenutext : ''; ?>"></td>
										<td>Background hover<br /><input type="text" class="rgb" name="RGen_mob_submenu_hover" id="RGen_mob_submenu_hover" value="<?php echo isset($RGen_mob_submenu_hover) ? $RGen_mob_submenu_hover : ''; ?>"></td>
										<td>Text hover<br /><input type="text" class="hex" name="RGen_mob_submenutext_hover" id="RGen_mob_submenutext_hover" value="<?php echo isset($RGen_mob_submenutext_hover) ? $RGen_mob_submenutext_hover : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Menu arrow</strong></td>
							<td class="field">
								<table class="sub-from" cellpadding="0" cellspacing="0">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_mob_menuarrow_bg" id="RGen_mob_menuarrow_bg" value="<?php echo isset($RGen_mob_menuarrow_bg) ? $RGen_mob_menuarrow_bg : ''; ?>"></td>
										<td>Icon<br /><input type="text" class="hex" name="RGen_mob_menuarrow" id="RGen_mob_menuarrow" value="<?php echo isset($RGen_mob_menuarrow) ? $RGen_mob_menuarrow : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><br /><br />

				<h4 class="header-1">Currency, language and info link drop down</h4>
				<div class="style-box-content header-section">
				<table class="table">
					<tr>
						<td class="lbl"><strong>Selected</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_CurLanBg" id="RGen_CurLanBg" value="<?php echo $RGen_CurLanBg; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_CurLanSelected" id="RGen_CurLanSelected" value="<?php echo $RGen_CurLanSelected; ?>"></td>
									<td>Arrow<br /><input type="text" class="hex" name="RGen_CurLanArrow" id="RGen_CurLanArrow" value="<?php echo $RGen_CurLanArrow; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Dropdown</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Normal<br /><input type="text" class="rgb" name="RGen_CurLanDropdown" id="RGen_CurLanDropdown" value="<?php echo $RGen_CurLanDropdown; ?>"></td>
									<td>Hover<br /><input type="text" class="rgb" name="RGen_CurLanDropdown_hover" id="RGen_CurLanDropdown_hover" value="<?php echo $RGen_CurLanDropdown_hover; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_CurLanText" id="RGen_CurLanText" value="<?php echo $RGen_CurLanText; ?>"></td>
									<td>Text hover<br /><input type="text" class="hex" name="RGen_CurLanText_hover" id="RGen_CurLanText_hover" value="<?php echo $RGen_CurLanText_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div><br /><br />
				<h4 class="header-1">Header cart</h4>
				<div class="style-box-content header-section">
				<table class="table">
					<tr>
						<td class="lbl"><strong>Cart</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_MiniCart" id="RGen_MiniCart" value="<?php echo $RGen_MiniCart; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_MiniCartText" id="RGen_MiniCartText" value="<?php echo $RGen_MiniCartText; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_MiniCartIcon" id="RGen_MiniCartIcon" value="<?php echo $RGen_MiniCartIcon; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Content background and image</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_MiniCartContent" id="RGen_MiniCartContent" value="<?php echo $RGen_MiniCartContent; ?>"></td>
									<td>Image<br /><input type="text" class="rgb" name="RGen_MiniCartContent_image" id="RGen_MiniCartContent_image" value="<?php echo $RGen_MiniCartContent_image; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Total background and border</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Border<br /><input type="text" class="rgb" name="RGen_MiniCartContent_border" id="RGen_MiniCartContent_border" value="<?php echo $RGen_MiniCartContent_border; ?>"></td>
									<td>Background<br /><input type="text" class="rgb" name="RGen_MiniCartContent_total" id="RGen_MiniCartContent_total" value="<?php echo $RGen_MiniCartContent_total; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Content</strong></td>
						<td class="field">
							<table class="sub-from" cellpadding="0" cellspacing="0">
								<tr>
									<td>Text<br /><input type="text" class="hex" name="RGen_MiniCartContent_text" id="RGen_MiniCartContent_text" value="<?php echo $RGen_MiniCartContent_text; ?>"></td>
									<td>Links<br /><input type="text" class="hex" name="RGen_MiniCartContent_links" id="RGen_MiniCartContent_links" value="<?php echo $RGen_MiniCartContent_links; ?>"></td>
									<td>Total labels<br /><input type="text" class="hex" name="RGen_MiniCartContent_label" id="RGen_MiniCartContent_label" value="<?php echo $RGen_MiniCartContent_label; ?>"></td>
									<td>Total values<br /><input type="text" class="hex" name="RGen_MiniCartContent_value" id="RGen_MiniCartContent_value" value="<?php echo $RGen_MiniCartContent_value; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
		<div id="tab_slideshowprd_theme" class="tab-pane">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Home page slideshow product scroller 
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.scroller .hex, .scroller .rgb').attr('value', '');$('.scroller .hex, .scroller .rgb').attr('style', '');">Reset</a>
				</h4>
				<div class="style-box-content scroller">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Slideshow navigator</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Normal<br /><input type="text" class="rgb" name="RGen_Slideshow_pager" id="RGen_Slideshow_pager" value="<?php echo $RGen_Slideshow_pager; ?>"></td>
									<td>Active<br /><input type="text" class="rgb" name="RGen_Slideshow_pagerActive" id="RGen_Slideshow_pagerActive" value="<?php echo $RGen_Slideshow_pagerActive; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Header</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_featuredTitleBg" id="RGen_featuredTitleBg" value="<?php echo $RGen_featuredTitleBg; ?>"></td>
									<td>Text color<br /><input type="text" class="hex" name="RGen_featuredTitleFont" id="RGen_featuredTitleFont" value="<?php echo $RGen_featuredTitleFont; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Arrows</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Arrow<br /><input type="text" class="rgb" name="RGen_featuredArrow" id="RGen_featuredArrow" value="<?php echo $RGen_featuredArrow; ?>"></td>
									<td>Arrow hover<br /><input type="text" class="rgb" name="RGen_featuredArrow_hover" id="RGen_featuredArrow_hover" value="<?php echo $RGen_featuredArrow_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_featuredArrowIcon" id="RGen_featuredArrowIcon" value="<?php echo $RGen_featuredArrowIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_featuredArrowIcon_hover" id="RGen_featuredArrowIcon_hover" value="<?php echo $RGen_featuredArrowIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Product box</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_featuredBg" id="RGen_featuredBg" value="<?php echo $RGen_featuredBg; ?>"></td>
									<td>Hover Backgroud<br /><input type="text" class="rgb" name="RGen_featuredHover_Bg" id="RGen_featuredHover_Bg" value="<?php echo $RGen_featuredHover_Bg; ?>"></td>
									<td>Lines<br /><input type="text" class="rgb" name="RGen_featuredPrdLines" id="RGen_featuredPrdLines" value="<?php echo $RGen_featuredPrdLines; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Links and price</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Link<br /><input type="text" class="hex" name="RGen_featuredPrdText" id="RGen_featuredPrdText" value="<?php echo $RGen_featuredPrdText; ?>"></td>
									<td>Price tag<br /><input type="text" class="hex" name="RGen_featuredPriceBg" id="RGen_featuredPriceBg" value="<?php echo $RGen_featuredPriceBg; ?>"></td>
									<td>Price txt<br /><input type="text" class="hex" name="RGen_featuredPrice" id="RGen_featuredPrice" value="<?php echo $RGen_featuredPrice; ?>"></td>
									<td>Old Price<br /><input type="text" class="hex" name="RGen_featuredPriceOld" id="RGen_featuredPriceOld" value="<?php echo $RGen_featuredPriceOld; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Cart button</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Normal<br /><input type="text" class="hex" name="RGen_featuredCrtBt" id="RGen_featuredCrtBt" value="<?php echo $RGen_featuredCrtBt; ?>"></td>
									<td>Hover<br /><input type="text" class="hex" name="RGen_featuredCrtBt_hover" id="RGen_featuredCrtBt_hover" value="<?php echo $RGen_featuredCrtBt_hover; ?>"></td>
									<td>Ring<br /><input type="text" class="rgb" name="RGen_featuredCrtBtRing" id="RGen_featuredCrtBtRing" value="<?php echo $RGen_featuredCrtBtRing; ?>"></td>
									<td>Ring hover<br /><input type="text" class="rgb" name="RGen_featuredCrtBtRing_hover" id="RGen_featuredCrtBtRing_hover" value="<?php echo $RGen_featuredCrtBtRing_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_featuredCrtBtIcon" id="RGen_featuredCrtBtIcon" value="<?php echo $RGen_featuredCrtBtIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_featuredCrtBtIcon_hover" id="RGen_featuredCrtBtIcon_hover" value="<?php echo $RGen_featuredCrtBtIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
		<div id="tab_productbox_theme" class="tab-pane">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Refine category
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.product-box .hex, .product-box .rgb').attr('value', '');$('.product-box .hex, .product-box .rgb').attr('style', '');">Reset</a>
				</h4>
				<div class="style-box-content product-box">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Header</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_RefinCateHdBg" id="RGen_RefinCateHdBg" value="<?php echo $RGen_RefinCateHdBg; ?>"></td>
									<td>Text color<br /><input type="text" class="hex" name="RGen_RefinCateHdFontColor" id="RGen_RefinCateHdFontColor" value="<?php echo $RGen_RefinCateHdFontColor; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Category box</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_RefinCateBg" id="RGen_RefinCateBg" value="<?php echo $RGen_RefinCateBg; ?>"></td>
									<td>Text color<br /><input type="text" class="hex" name="RGen_RefinCateFontColour" id="RGen_RefinCateFontColour" value="<?php echo $RGen_RefinCateFontColour; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					</table>
				</div><br /><br />
				
				<h4 class="header-1">Default product block</h4>
				<div class="style-box-content product-box">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Product box</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_prdBack" id="RGen_prdBack" value="<?php echo $RGen_prdBack; ?>"></td>
									<td>Hover block<br /><input type="text" class="rgb" name="RGen_prdHover_Bg" id="RGen_prdHover_Bg" value="<?php echo $RGen_prdHover_Bg; ?>"></td>
									<td>Border<br /><input type="text" class="rgb" name="RGen_prdBorder" id="RGen_prdBorder" value="<?php echo $RGen_prdBorder; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Content</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Name<br /><input type="text" class="hex" name="RGen_prdName" id="RGen_prdName" value="<?php echo $RGen_prdName; ?>"></td>
									<td>Links<br /><input type="text" class="hex" name="RGen_prdLinks" id="RGen_prdLinks" value="<?php echo $RGen_prdLinks; ?>"></td>
									<td>Link hover<br /><input type="text" class="hex" name="RGen_prdLinks_hover" id="RGen_prdLinks_hover" value="<?php echo $RGen_prdLinks_hover; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_prdText" id="RGen_prdText" value="<?php echo $RGen_prdText; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Price tag</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Price tag<br /><input type="text" class="hex" name="RGen_PriceBg" id="RGen_PriceBg" value="<?php echo $RGen_PriceBg; ?>"></td>
									<td>Old Price<br /><input type="text" class="hex" name="RGen_OldPrice" id="RGen_OldPrice" value="<?php echo $RGen_OldPrice; ?>"></td>
									<td>Price txt<br /><input type="text" class="hex" name="RGen_Price" id="RGen_Price" value="<?php echo $RGen_Price; ?>"></td>
									<td>Price tag ring<br /><input type="text" class="rgb" name="RGen_PriceRing" id="RGen_PriceRing" value="<?php echo $RGen_PriceRing; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td class="lbl"><strong>Cart button</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Normal<br /><input type="text" class="hex" name="RGen_cartBt" id="RGen_cartBt" value="<?php echo $RGen_cartBt; ?>"></td>
									<td>Hover<br /><input type="text" class="hex" name="RGen_cartBt_hover" id="RGen_cartBt_hover" value="<?php echo $RGen_cartBt_hover; ?>"></td>
									<td>Ring<br /><input type="text" class="rgb" name="RGen_cartBtRing" id="RGen_cartBtRing" value="<?php echo $RGen_cartBtRing; ?>"></td>
									<td>Ring hover<br /><input type="text" class="rgb" name="RGen_cartBtRing_hover" id="RGen_cartBtRing_hover" value="<?php echo $RGen_cartBtRing_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_cartBtIcon" id="RGen_cartBtIcon" value="<?php echo $RGen_cartBtIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_cartBtIcon_hover" id="RGen_cartBtIcon_hover" value="<?php echo $RGen_cartBtIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					
				</table>
				</div><br /><br />

				<h4 class="header-1">Product block 1</h4>
				<div class="style-box-content product-box">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Product box</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Image border<br /><input type="text" class="rgb" name="RGen_prd2_image" id="RGen_prd2_image" value="<?php echo $RGen_prd2_image; ?>"></td>
									<td>Name<br /><input type="text" class="hex" name="RGen_prd2_name" id="RGen_prd2_name" value="<?php echo $RGen_prd2_name; ?>"></td>
									<td>Links<br /><input type="text" class="hex" name="RGen_prd2_link" id="RGen_prd2_link" value="<?php echo $RGen_prd2_link; ?>"></td>
									<td>Links hover<br /><input type="text" class="hex" name="RGen_prd2_link_hover" id="RGen_prd2_link_hover" value="<?php echo $RGen_prd2_link_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Price</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Old price<br /><input type="text" class="hex" name="RGen_prd2_priceOld" id="RGen_prd2_priceOld" value="<?php echo $RGen_prd2_priceOld; ?>"></td>
									<td>New price<br /><input type="text" class="hex" name="RGen_prd2_priceNew" id="RGen_prd2_priceNew" value="<?php echo $RGen_prd2_priceNew; ?>"></td>
									<td>TAX<br /><input type="text" class="hex" name="RGen_prd2_priceTax" id="RGen_prd2_priceTax" value="<?php echo $RGen_prd2_priceTax; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Cart button</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_prd2_cartbt_bg" id="RGen_prd2_cartbt_bg" value="<?php echo $RGen_prd2_cartbt_bg; ?>"></td>
									<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd2_cartbt_bg_hover" id="RGen_prd2_cartbt_bg_hover" value="<?php echo $RGen_prd2_cartbt_bg_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="rgb" name="RGen_prd2_cartbt" id="RGen_prd2_cartbt" value="<?php echo $RGen_prd2_cartbt; ?>"></td>
									<td>Icon hover<br /><input type="text" class="rgb" name="RGen_prd2_cartbt_hover" id="RGen_prd2_cartbt_hover" value="<?php echo $RGen_prd2_cartbt_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Cart button border</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Border<br /><input type="text" class="rgb" name="RGen_prd2_cartbt_bdr" id="RGen_prd2_cartbt_bdr" value="<?php echo $RGen_prd2_cartbt_bdr; ?>"></td>
									<td>Border hover<br /><input type="text" class="rgb" name="RGen_prd2_cartbt_bdr_hover" id="RGen_prd2_cartbt_bdr_hover" value="<?php echo $RGen_prd2_cartbt_bdr_hover; ?>"></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
					</table>
				</div><br /><br />

				<h4 class="header-1">Product block 2</h4>
				<div class="style-box-content product-box">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Product box</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_prd3_bg" id="RGen_prd3_bg" value="<?php echo $RGen_prd3_bg; ?>"></td>
									<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd3_bg_hover" id="RGen_prd3_bg_hover" value="<?php echo $RGen_prd3_bg_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Product box border</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Border color<br /><input type="text" class="rgb" name="RGen_prd3_bdr" id="RGen_prd3_bdr" value="<?php echo $RGen_prd3_bdr; ?>"></td>
									<td>Border hover<br /><input type="text" class="rgb" name="RGen_prd3_bdr_hover" id="RGen_prd3_bdr_hover" value="<?php echo $RGen_prd3_bdr_hover; ?>"></td>
									<td>Width<br /><input type="text" class="input-mini" name="RGen_prd3_bdr_w" id="RGen_prd3_bdr_w" value="<?php echo $RGen_prd3_bdr_w; ?>"></td>
									<td>Hover width<br /><input type="text" class="input-mini" name="RGen_prd3_bdr_w_hover" id="RGen_prd3_bdr_w_hover" value="<?php echo $RGen_prd3_bdr_w_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Name and price</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Name<br /><input type="text" class="hex" name="RGen_prd3_name" id="RGen_prd3_name" value="<?php echo $RGen_prd3_name; ?>"></td>
									<td>Name hover<br /><input type="text" class="hex" name="RGen_prd3_name_hover" id="RGen_prd3_name_hover" value="<?php echo $RGen_prd3_name_hover; ?>"></td>
									<td>Old price &amp; TAX<br /><input type="text" class="hex" name="RGen_prd3_priceOld" id="RGen_prd3_priceOld" value="<?php echo $RGen_prd3_priceOld; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>New price<br /><input type="text" class="hex" name="RGen_prd3_priceNew" id="RGen_prd3_priceNew" value="<?php echo $RGen_prd3_priceNew; ?>"></td>
									<td>Rating bg<br /><input type="text" class="rgb" name="RGen_prd3_rating" id="RGen_prd3_rating" value="<?php echo $RGen_prd3_rating; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Add to cart button</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_prd3_cartBg" id="RGen_prd3_cartBg" value="<?php echo $RGen_prd3_cartBg; ?>"></td>
									<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd3_cartBg_hover" id="RGen_prd3_cartBg_hover" value="<?php echo $RGen_prd3_cartBg_hover; ?>"></td>
									<td>Text<br /><input type="text" class="hex" name="RGen_prd3_cartText" id="RGen_prd3_cartText" value="<?php echo $RGen_prd3_cartText; ?>"></td>
									<td>Text hover<br /><input type="text" class="hex" name="RGen_prd3_cartText_hover" id="RGen_prd3_cartText_hover" value="<?php echo $RGen_prd3_cartText_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Other buttons</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_prd3_prdbtBg" id="RGen_prd3_prdbtBg" value="<?php echo $RGen_prd3_prdbtBg; ?>"></td>
									<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd3_prdbtBg_hover" id="RGen_prd3_prdbtBg_hover" value="<?php echo $RGen_prd3_prdbtBg_hover; ?>"></td>
									<td>Border<br /><input type="text" class="rgb" name="RGen_prd3_prdbtBdr" id="RGen_prd3_prdbtBdr" value="<?php echo $RGen_prd3_prdbtBdr; ?>"></td>
									<td>Border hover<br /><input type="text" class="rgb" name="RGen_prd3_prdbtBdr_hover" id="RGen_prd3_prdbtBdr_hover" value="<?php echo $RGen_prd3_prdbtBdr_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_prd3_prdbtIcon" id="RGen_prd3_prdbtIcon" value="<?php echo $RGen_prd3_prdbtIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_prd3_prdbtIcon_hover" id="RGen_prd3_prdbtIcon_hover" value="<?php echo $RGen_prd3_prdbtIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					</table>
				</div><br /><br />

				<h4 class="header-1">Product block 3</h4>
				<div class="style-box-content product-box">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Product box</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_prd4_bg" id="RGen_prd4_bg" value="<?php echo isset($RGen_prd4_bg) ? $RGen_prd4_bg : ''; ?>"></td>
										<td>Border<br /><input type="text" class="rgb" name="RGen_prd4_bdr" id="RGen_prd4_bdr" value="<?php echo isset($RGen_prd4_bdr) ? $RGen_prd4_bdr : ''; ?>"></td>
										<td>Border hover<br /><input type="text" class="rgb" name="RGen_prd4_bdr_hover" id="RGen_prd4_bdr_hover" value="<?php echo isset($RGen_prd4_bdr_hover) ? $RGen_prd4_bdr_hover : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Name and price</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Name<br /><input type="text" class="hex" name="RGen_prd4_name" id="RGen_prd4_name" value="<?php echo isset($RGen_prd4_name) ? $RGen_prd4_name : ''; ?>"></td>
										<td>Price<br /><input type="text" class="hex" name="RGen_prd4_price" id="RGen_prd4_price" value="<?php echo isset($RGen_prd4_price) ? $RGen_prd4_price : ''; ?>"></td>
										<td>Old price<br /><input type="text" class="hex" name="RGen_prd4_priceold" id="RGen_prd4_priceold" value="<?php echo isset($RGen_prd4_priceold) ? $RGen_prd4_priceold : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Buttons</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Border<br /><input type="text" class="rgb" name="RGen_prd4_btnbdr" id="RGen_prd4_btnbdr" value="<?php echo isset($RGen_prd4_btnbdr) ? $RGen_prd4_btnbdr : ''; ?>"></td>
										<td>Background<br /><input type="text" class="rgb" name="RGen_prd4_btnbg" id="RGen_prd4_btnbg" value="<?php echo isset($RGen_prd4_btnbg) ? $RGen_prd4_btnbg : ''; ?>"></td>
										<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd4_btnbg_hover" id="RGen_prd4_btnbg_hover" value="<?php echo isset($RGen_prd4_btnbg_hover) ? $RGen_prd4_btnbg_hover : ''; ?>"></td>
										<td>Icons<br /><input type="text" class="hex" name="RGen_prd4_btnicons" id="RGen_prd4_btnicons" value="<?php echo isset($RGen_prd4_btnicons) ? $RGen_prd4_btnicons : ''; ?>"></td>
										<td>Icons hover<br /><input type="text" class="hex" name="RGen_prd4_btnicons_hover" id="RGen_prd4_btnicons_hover" value="<?php echo isset($RGen_prd4_btnicons_hover) ? $RGen_prd4_btnicons_hover : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Cart button</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background hover<br /><input type="text" class="rgb" name="RGen_prd4_cartbg_hover" id="RGen_prd4_cartbg_hover" value="<?php echo isset($RGen_prd4_cartbg_hover) ? $RGen_prd4_cartbg_hover : ''; ?>"></td>
										<td>Text<br /><input type="text" class="hex" name="RGen_prd4_carttxt" id="RGen_prd4_carttxt" value="<?php echo isset($RGen_prd4_carttxt) ? $RGen_prd4_carttxt : ''; ?>"></td>
										<td>Text hover<br /><input type="text" class="hex" name="RGen_prd4_carttxt_hover" id="RGen_prd4_carttxt_hover" value="<?php echo isset($RGen_prd4_carttxt_hover) ? $RGen_prd4_carttxt_hover : ''; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>	
				
			</div>
		</div>
		<div id="tab_prdpage_theme" class="tab-pane">
			<div class="style-box">
				<h4 class="header-1">
					Product page
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.prdpage .hex, .prdpage .rgb').attr('value', '');$('.prdpage .hex, .prdpage .rgb').attr('style', '');">Reset</a>
				</h4>
				<div class="style-box-content prdpage">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Product images</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_prdImageBg" id="RGen_prdImageBg" value="<?php echo $RGen_prdImageBg; ?>"></td>
										<td>Active border<br /><input type="text" class="rgb" name="RGen_prdImageActive" id="RGen_prdImageActive" value="<?php echo $RGen_prdImageActive; ?>"></td>
										<td>Discount border<br /><input type="text" class="rgb" name="RGen_prdDiscount_border" id="RGen_prdDiscount_border" value="<?php echo $RGen_prdDiscount_border; ?>"></td>
										<td>Zoom text<br /><input type="text" class="hex" name="RGen_prdZoomText" id="RGen_prdZoomText" value="<?php echo $RGen_prdZoomText; ?>"></td>
										<td>Zoom icon<br /><input type="text" class="hex" name="RGen_prdZoomIcon" id="RGen_prdZoomIcon" value="<?php echo $RGen_prdZoomIcon; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Product price</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_prdPriceBg" id="RGen_prdPriceBg" value="<?php echo $RGen_prdPriceBg; ?>"></td>
										<td>Ring<br /><input type="text" class="rgb" name="RGen_prdPriceRing" id="RGen_prdPriceRing" value="<?php echo $RGen_prdPriceRing; ?>"></td>
										<td>Old price<br /><input type="text" class="hex" name="RGen_prdPriceOld" id="RGen_prdPriceOld" value="<?php echo $RGen_prdPriceOld; ?>"></td>
										<td>New price<br /><input type="text" class="hex" name="RGen_prdPriceNew" id="RGen_prdPriceNew" value="<?php echo $RGen_prdPriceNew; ?>"></td>
										<td>Price tax<br /><input type="text" class="hex" name="RGen_prdPriceTax" id="RGen_prdPriceTax" value="<?php echo $RGen_prdPriceTax; ?>"></td>
										
										<td>Other text<br /><input type="text" class="hex" name="RGen_prdOtherText" id="RGen_prdOtherText" value="<?php echo $RGen_prdOtherText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Quantity box &amp; options</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Qty box<br /><input type="text" class="rgb" name="RGen_prdQty" id="RGen_prdQty" value="<?php echo $RGen_prdQty; ?>"></td>
										<td>Qty border<br /><input type="text" class="rgb" name="RGen_prdQtyBorder" id="RGen_prdQtyBorder" value="<?php echo $RGen_prdQtyBorder; ?>"></td>
										<td>Qty text<br /><input type="text" class="hex" name="RGen_prdQtyText" id="RGen_prdQtyText" value="<?php echo $RGen_prdQtyText; ?>"></td>
										<td>Option text<br /><input type="text" class="hex" name="RGen_prdOptionLabel" id="RGen_prdOptionLabel" value="<?php echo $RGen_prdOptionLabel; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Cart button</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Button<br /><input type="text" class="rgb" name="RGen_prdCartBt" id="RGen_prdCartBt" value="<?php echo $RGen_prdCartBt; ?>"></td>
										<td>Button hover<br /><input type="text" class="rgb" name="RGen_prdCartBt_hover" id="RGen_prdCartBt_hover" value="<?php echo $RGen_prdCartBt_hover; ?>"></td>
										<td>Button ring<br /><input type="text" class="rgb" name="RGen_prdCartRing" id="RGen_prdCartRing" value="<?php echo $RGen_prdCartRing; ?>"></td>
										<td>Ring hover<br /><input type="text" class="rgb" name="RGen_prdCartRing_hover" id="RGen_prdCartRing_hover" value="<?php echo $RGen_prdCartRing_hover; ?>"></td>
										<td>Icon<br /><input type="text" class="hex" name="RGen_prdCartIcon" id="RGen_prdCartIcon" value="<?php echo $RGen_prdCartIcon; ?>"></td>
										<td>Icon hover<br /><input type="text" class="hex" name="RGen_prdCartIcon_hover" id="RGen_prdCartIcon_hover" value="<?php echo $RGen_prdCartIcon_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Tabs</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_TabsBg" id="RGen_TabsBg" value="<?php echo $RGen_TabsBg; ?>"></td>
										<td>Normal tab<br /><input type="text" class="rgb" name="RGen_TabsNormal" id="RGen_TabsNormal" value="<?php echo $RGen_TabsNormal; ?>"></td>
										<td>Tab text<br /><input type="text" class="hex" name="RGen_TabText" id="RGen_TabText" value="<?php echo $RGen_TabText; ?>"></td>
										<td>Active text<br /><input type="text" class="hex" name="RGen_TabActiveText" id="RGen_TabActiveText" value="<?php echo $RGen_TabActiveText; ?>"></td>
										<td>Tab content<br /><input type="text" class="hex" name="RGen_TabContentText" id="RGen_TabContentText" value="<?php echo $RGen_TabContentText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Write review</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_WriteReview" id="RGen_WriteReview" value="<?php echo $RGen_WriteReview; ?>"></td>
										<td>Rating<br /><input type="text" class="rgb" name="RGen_WriteReview_Rating" id="RGen_WriteReview_Rating" value="<?php echo $RGen_WriteReview_Rating; ?>"></td>
										<td>Rating border<br /><input type="text" class="rgb" name="RGen_WriteReview_RatingBdr" id="RGen_WriteReview_RatingBdr" value="<?php echo $RGen_WriteReview_RatingBdr; ?>"></td>
										<td>Label<br /><input type="text" class="hex" name="RGen_WriteReview_label" id="RGen_WriteReview_label" value="<?php echo $RGen_WriteReview_label; ?>"></td>
										<td>Rating label bg<br /><input type="text" class="hex" name="RGen_WriteReviewRating_bg" id="RGen_WriteReviewRating_bg" value="<?php echo $RGen_WriteReviewRating_bg; ?>"></td>
										<td>Rating text<br /><input type="text" class="hex" name="RGen_WriteReviewRating_Text" id="RGen_WriteReviewRating_Text" value="<?php echo $RGen_WriteReviewRating_Text; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div id="tab_footer_theme" class="tab-pane">
			<!--STYLE GROUP -->
			<div class="style-box">
				<h4 class="header-1">
					Footer 
					<a class="bt btn btn-danger btn-small pull-right" onclick="$('.footer-section .hex, .footer-section .rgb').attr('value', '');$('.footer-section .hex, .footer-section .rgb').attr('style', '');">Reset</a>
				</h4>
				<div class="style-box-content footer-section">
					<table class="table">
						<tr>
							<td class="lbl"><strong>Footer section</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_FooterWrpBg" id="RGen_FooterWrpBg" value="<?php echo $RGen_FooterWrpBg; ?>"></td>
										<td>Footer lines<br /><input type="text" class="rgb" name="RGen_FooterLines" id="RGen_FooterLines" value="<?php echo $RGen_FooterLines; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Headers, links and text</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Headers<br /><input type="text" class="hex" name="RGen_FooterHeader" id="RGen_FooterHeader" value="<?php echo $RGen_FooterHeader; ?>"></td>
										<td>Text<br /><input type="text" class="hex" name="RGen_FooterText" id="RGen_FooterText" value="<?php echo $RGen_FooterText; ?>"></td>
										<td>Links<br /><input type="text" class="hex" name="RGen_FooterLinks" id="RGen_FooterLinks" value="<?php echo $RGen_FooterLinks; ?>"></td>
										<td>Links hover<br /><input type="text" class="hex" name="RGen_FooterLinks_hover" id="RGen_FooterLinks_hover" value="<?php echo $RGen_FooterLinks_hover; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="lbl"><strong>Contact details</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Background<br /><input type="text" class="rgb" name="RGen_contactIcons" id="RGen_contactIcons" value="<?php echo $RGen_contactIcons; ?>"></td>
										<td>Icons<br /><input type="text" class="hex" name="RGen_contactIcon_color" id="RGen_contactIcon_color" value="<?php echo $RGen_contactIcon_color; ?>"></td>
										<td>Text<br /><input type="text" class="hex" name="RGen_contactText" id="RGen_contactText" value="<?php echo $RGen_contactText; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<!-- <tr>
							<td class="lbl"><strong>Twitter and Facebook</strong></td>
							<td class="field">
								<table class="sub-from">
									<tr>
										<td>Twitter icon<br /><input type="text" class="hex" name="RGen_twitterIcon_color" id="RGen_twitterIcon_color" value="<?php echo $RGen_twitterIcon_color; ?>"></td>
									</tr>
								</table>
							</td>
						</tr> -->
					</table>
				</div><br /><br />
				
				<h4 class="header-1">Social icons</h4>

				<div class="style-box-content footer-section">
					<table class="table">
					<tr>
						<td class="lbl"><strong>Social icon section</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Background<br /><input type="text" class="rgb" name="RGen_FooterBg" id="RGen_FooterBg" value="<?php echo $RGen_FooterBg; ?>"></td>
									<td>Borders<br /><input type="text" class="rgb" name="RGen_FooterSocial_bdr" id="RGen_FooterSocial_bdr" value="<?php echo $RGen_FooterSocial_bdr; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="lbl"><strong>Social buttons</strong></td>
						<td class="field">
							<table class="sub-from">
								<tr>
									<td>Normal<br /><input type="text" class="hex" name="RGen_FooterSocial" id="RGen_FooterSocial" value="<?php echo $RGen_FooterSocial; ?>"></td>
									<td>Hover<br /><input type="text" class="hex" name="RGen_FooterSocial_hover" id="RGen_FooterSocial_hover" value="<?php echo $RGen_FooterSocial_hover; ?>"></td>
									<td>Ring<br /><input type="text" class="rgb" name="RGen_FooterSocialRing" id="RGen_FooterSocialRing" value="<?php echo $RGen_FooterSocialRing; ?>"></td>
									<td>Ring hover<br /><input type="text" class="rgb" name="RGen_FooterSocialRing_hover" id="RGen_FooterSocialRing_hover" value="<?php echo $RGen_FooterSocialRing_hover; ?>"></td>
									<td>Icon<br /><input type="text" class="hex" name="RGen_FooterSocialIcon" id="RGen_FooterSocialIcon" value="<?php echo $RGen_FooterSocialIcon; ?>"></td>
									<td>Icon hover<br /><input type="text" class="hex" name="RGen_FooterSocialIcon_hover" id="RGen_FooterSocialIcon_hover" value="<?php echo $RGen_FooterSocialIcon_hover; ?>"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div>
				
			</div>
		</div>
	</div>
</div>
