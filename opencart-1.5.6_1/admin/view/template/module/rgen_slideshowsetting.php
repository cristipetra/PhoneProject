<h4>Slide show settings</h4>
<div class="form-horizontal slideshowOptions">
	<div class="control-group">
		<label class="control-label">Display products on slideshow</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_SlideShow_Mod_status;
			$name	= 'RGen_SlideShow_Mod_status';
			$id		= 'RGen_SlideShow_Mod_status';
			?>
			<!-- <span class="switch" style='vertical-align: middle; margin-top: 0px;'>
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
			$ar 	= array( 
						'--' 		=> '--', 
						'featured' 	=> 'Featured', 
						'best' 		=> 'Best Sellers', 
						'special' 	=> 'Special', 
						'latest' 	=> 'Latest'
						);
			if($RGen_prdList_defaultView == ''){
				$dbKey 	= '--';
			}else{
				$dbKey 	= $RGen_SlideShow_Mod;
			}
			$name	= 'RGen_SlideShow_Mod';
			$id		= 'RGen_SlideShow_Mod';
			?>
			<div class="btn-group" data-toggle="buttons-radio" style='verticle-align:middle; margin-left:20px;'>
				<?php foreach ($ar as $key => $value) { ?>
					<?php ($key ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
					<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
						<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $key; ?>" <?php if ($dbKey == $key) { ?>checked="checked"<?php }?>>
						<?php echo $value; ?>
					</label>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">
			Slideshow type
			<div class="help-block" style="font-size:11px; color:#666; margin-top:10px; display:inline-block; line-height: 1.2;">
				Preferred slideshow banner sizes<br />
				<strong>Full</strong> - w:1080 x h:800, <strong>Medium</strong> - w:1080 x h:630, <strong>Normal</strong> - w:940 x h:500<br /><br />
				
				Create banner slide set with multiple slide images from Settings > Design > Banners <br /><br />
				Set slideshow banner size in<br> Extensions > Modules > Slideshow module<br />
			</div>
		</label>
		<div class="controls">
			<span class="radio">
				<input id="ss_none" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == '--' || $RGen_SlideShow_Type == '') { ?>checked="checked"<?php }?> value="--" />
				<label class="rgen-button" for="ss_none">
					<span></span>Default Opencart
				</label>
			</span>
			<span class="radio">
				<input id="ss_wf-full" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'wf-full') { ?>checked="checked"<?php }?> value="wf-full" />
				<label class="rgen-button" for="ss_wf-full">
					<span></span>Window full size
				</label>
			</span>
			<span class="radio">
				<input id="ss_full" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'full') { ?>checked="checked"<?php }?> value="full" />
				<label class="rgen-button" for="ss_full">
					<span></span>Boxed full size
				</label>
			</span>
			<span class="radio">
				<input id="ss_w-full" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'w-full') { ?>checked="checked"<?php }?> value="w-full" />
				<label class="rgen-button" for="ss_w-full">
					<span></span>Window wide size
				</label>
			</span>
			<span class="radio">
				<input id="ss_medium" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'medium') { ?>checked="checked"<?php }?> value="medium" />
				<label class="rgen-button" for="ss_medium">
					<span></span>Medium size
				</label>
			</span>
			<span class="radio">
				<input id="ss_normal" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'normal') { ?>checked="checked"<?php }?> value="normal" />
				<label class="rgen-button" for="ss_normal">
					<span></span>Normal size
				</label>
			</span>
			<span class="radio">
				<input id="ss_beside_bnr" name="RGen_SlideShow_Type" type="radio" <?php if ($RGen_SlideShow_Type == 'beside_bnr') { ?>checked="checked"<?php }?> value="beside_bnr" />
				<label class="rgen-button" for="ss_beside_bnr">
					<span></span>Beside banners
				</label>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Home page small banners</label>
		<div class="controls">
			<span class="radio">
				<input id="bannerNone" name="RGen_bannerPosition" type="radio" <?php if ($RGen_bannerPosition == 'none' || $RGen_bannerPosition == '') { ?>checked="checked"<?php }?> value="none" />
				<label class="rgen-button" for="bannerNone">
					<span></span>Flexible position
				</label>
			</span>
			<span class="radio">
				<input id="bannerBelow" name="RGen_bannerPosition" type="radio" <?php if ($RGen_bannerPosition == 'below') { ?>checked="checked"<?php }?> value="below" />
				<label class="rgen-button" for="bannerBelow">
					<span></span>Stick below slideshow
				</label>
			</span>
			<span class="radio">
				<input id="bannerOnSlide" name="RGen_bannerPosition" type="radio" <?php if ($RGen_bannerPosition == 'onslide') { ?>checked="checked"<?php }?> value="onslide" />
				<label class="rgen-button" for="bannerOnSlide">
					<span></span>Display on slideshow
				</label>
			</span>
			<span class="radio">
				<input id="bannerBeside" name="RGen_bannerPosition" type="radio" <?php if ($RGen_bannerPosition == 'none' || $RGen_bannerPosition == 'below' || $RGen_bannerPosition == 'onslide' || $RGen_bannerPosition == '') { ?>disabled="disabled"<?php }?> <?php if ($RGen_bannerPosition == 'beside') { ?>checked="checked"<?php }?> value="beside" />
				<label class="rgen-button" for="bannerBeside">
					<span></span>Beside slideshow
				</label>
			</span>
		</div>
	</div>
</div>
<?php 
	/*echo "<pre style='color:;'>" . print_r($RGen, TRUE) . "</pre>";
	echo "<pre style='color:;'>" . print_r($RGen_cap, TRUE) . "</pre>";*/
?>
<h4>Slide show captions</h4>
<div class="form-horizontal capOptions" id='slideshowCaption'>
	<div class="control-group">
		<label class="control-label">
			Caption status and style
			<div class="help-block" style="font-size:11px; color:#666; margin-top:10px; display:inline-block; line-height: 1.2;">
				Select caption display style by clicking numbers. <br>
				Use HTML tags in title and description to make it more advanced style.
			</div>
		</label>
		<div class="controls">
			<?php 
				$dbKey 	= $RGen_capStatus;
				$name	= 'RGen_capStatus';
				$id		= 'RGen_capStatus';
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

			<?php 
			$ar 	= array( '1' => 'c1', '2' => 'c2', '3' => 'c3', '4' => 'c4', '5' => 'c5', '6' => 'c6'); 
			if($RGen_cap == ''){
				$dbKey 	= 'c1';
			}else{
				$dbKey 	= $RGen_cap;	
			}
			$name	= 'RGen_cap';
			$id		= 'RGen_cap';
			?>
			<div class="btn-group" data-toggle="buttons-radio">
				<?php foreach ($ar as $key => $value) { ?>
					<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
					<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-success btn<?php echo $selected; ?>">
						<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
						<?php echo $key; ?>
					</label>
				<?php } ?>
			</div>
			<a role="button" class="btn capcss" style="margin-left:10px;">CSS structure info</a>
			<div class="CSS-structure">
				<h3>CSS structure for captions</h3>
				<p>Use class .cap1, .cap2 and .cap3 in below code for style 1, style 2 and style 3</p>
<pre>
.cap1 .nivo-caption .cap-hd { ... }
.cap1 .nivo-caption .cap-data { .. }
.cap1 .nivo-caption .cap-link { .. }
.cap1 .nivo-caption .cap-link:hover { ... }
</pre>
			</div>
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/slideshow-captions.png">?</a>
		</div>
	</div>

	<div class="control-group">
		<div id="RGen-cap1">
			<ul class="nav nav-tabs" id="RGen-cap1-data">
				<?php foreach ($languages as $language) { ?>
				<li>
					<a href="#cap1-<?php echo $language['language_id']; ?>">
					<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
			<div class="tab-content">
				<?php 
				foreach ($languages as $language) { ?>
				<div class="tab-pane" id="cap1-<?php echo $language['language_id']; ?>">
					<?php
					$c = 1;
					$cap = 'cap1_'. $language['language_id'];
					if(isset($RGen[$language['language_id']][$cap])){
					foreach($RGen[$language['language_id']][$cap] as $cap_ar){ 
					?>
					<div id='<?php echo $cap; ?>_<?php echo $c; ?>' class='cap-tbl'>
						<div class="row">
							<div class="span3">
								<?php 
									$ar 	= array(
													'Left Top'		=> 'lt',
													'Left Bottom'	=> 'lb',
													'Right Top'		=> 'rt',
													'Right Bottom'	=> 'rb',
													'Center Bottom'	=> 'cb',
													'Center Top'	=> 'ct',
													'Center Center'	=> 'cc',
													'Middle Right'	=> 'mr',
													'Middle Left'	=> 'ml'
													);
									$dbKey 	= isset($cap_ar['position']) ? $cap_ar['position'] : 'lb';
									$name	= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][position]';
									$id		= 'RGen_capPosition';
								?>
								<span class='select'>
									<select id="<?php echo $id; ?>" name="<?php echo $name; ?>">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
							</div>
							<div class="span6">
								<?php 
									$dbKey 			= isset($cap_ar['sort_order']) ? $cap_ar['sort_order'] : '';
									$name			= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][sort_order]';
									$placeholder	= 'Slide number';
								?>
								<input type="text" class='input-small' placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								<a title="Remove" onclick="$('#<?php echo $cap; ?>_<?php echo $c; ?>').remove();" class="btn btn-danger">&times;</a>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<?php 
									$dbKey 			= isset($cap_ar['title']) ? $cap_ar['title'] : '';
									$name			= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][title]';
									$placeholder	= 'Caption title';
								?>
								<input class="span3" type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								<?php 
									$dbKey 			= isset($cap_ar['linktext']) ? $cap_ar['linktext'] : '';
									$name			= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][linktext]';
									$placeholder	= 'Button text';
								?>
								<input class="span3" type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								<?php 
									$dbKey 			= isset($cap_ar['link']) ? $cap_ar['link'] : '';
									$name			= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][link]';
									$placeholder	= 'Button URL';
								?>
								<input class="span3" type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								
							</div>
							<div class="span6">
								<?php 
									$dbKey 			= isset($cap_ar['data']) ? $cap_ar['data'] : '';
									$name			= 'RGen_module[' . $language['language_id'] . '][' . $cap . '][' . $c . '][data]';
									$placeholder	= 'Caption data';
								?>
								<textarea class="span6" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
							</div>
						</div>
					</div>
					<?php $c++; } } ?>

					<div class='addbtn addCp1-<?php echo $language['language_id']; ?>'>
						<a class="btn btn-success">Add caption</a>
					</div>
					
					<script type="text/javascript">
					$('.addCp1-<?php echo $language['language_id']; ?> .btn').live('click', function(){
						addCp1_<?php echo $cap; ?>_<?php echo $language['language_id']; ?>();
					});
					// var <?php echo $cap; ?> = <?php echo $c; ?>;
					function addCp1_<?php echo $cap; ?>_<?php echo $language['language_id']; ?>(){
						
						var <?php echo $cap; ?> = parseInt($('#cap1-<?php echo $language['language_id']; ?> .cap-tbl').length + 1);
						html  = '<div id="<?php echo $cap; ?>_' + <?php echo $cap; ?> + '" class="cap-tbl">';
						html += '	<div class="row">';
						html += '		<div class="span3"><span class="select">';
						html += '			<select id="RGen_capPosition" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][position]">';
						html += '				<option value="lt">Left Top</option><option value="lb" selected>Left Bottom</option><option value="rt">Right Top</option>';
						html += '				<option value="rb">Right Bottom</option><option value="cb">Center Bottom</option><option value="ct">Center Top</option>';
						html += '				<option value="cc">Center Center</option><option value="mr">Middle Right</option><option value="ml">Middle Left</option>';
						html += '			</select>';
						html += '		</span></div>';
						html += '		<div class="span6"><input type="text" placeholder="Slide number" class="input-small" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][sort_order]" value="">';
						html += '		<a title="Remove" onclick="$(\'#<?php echo $cap; ?>_' + <?php echo $cap; ?> + '\').remove();" class="btn btn-danger">&times;</a></div>';
						html += '	</div>';
						html += '	<div class="row">';
						html += '		<div class="span3">';
						html += '			<input class="span3" type="text" placeholder="Caption title" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][title]" value="">';
						html += '			<input class="span3" type="text" placeholder="Button text" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][linktext]" value="">';
						html += '			<input class="span3" type="text" placeholder="Button URL" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][link]" value="">';
						html += '		</div>';
						html += '		<div class="span6">';
						html += '		<textarea class="span6" placeholder="Caption data" name="RGen_module[<?php echo $language['language_id']; ?>][<?php echo $cap; ?>][' + <?php echo $cap; ?> + '][data]"></textarea>';
						html += '		</div>';
						html += '	</div>';
						html += '</div>';

						$('.addCp1-<?php echo $language['language_id']; ?>').before(html);
						//<?php echo $cap; ?>++;
					}
					</script>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>	

<h4>Slide show options</h4>
<div class="form-horizontal">

	<div class="control-group">
		<label class="control-label">Slide show effect</label>
		<div class="controls">
			<?php 
				$ar 	= array( 
							'--',
							'sliceDown',
							'sliceDownLeft',
							'sliceUp',
							'sliceUpLeft',
							'sliceUpDown',
							'sliceUpDownLeft',
							'fold',
							'fade',
							'random',
							'slideInRight',
							'slideInLeft',
							'boxRandom',
							'boxRain',
							'boxRainReverse',
							'boxRainGrow',
							'boxRainGrowReverse'
							); 
				$dbKey 	= $RGen_slideshow_Effect;
				$name	= 'RGen_slideshow_Effect';
				$id		= 'RGen_slideshow_Effect';
			?>
			<span class='select'>
				<select id="<?php echo $id; ?>" name="<?php echo $name; ?>">
					<?php foreach ($ar as $key) { ?>
						<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
						<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Slide animation speed</label>
		<div class="controls">
			<?php 
				$dbKey 			= $RGen_slideshow_animSpeed;
				$name			= 'RGen_slideshow_animSpeed';
				$id				= 'RGen_slideshow_animSpeed';
				$placeholder	= '';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<span class='help-block'>Slide transition speed</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Slide pause time</label>
		<div class="controls">
			<?php 
				$dbKey 			= $RGen_slideshow_pauseTime;
				$name			= 'RGen_slideshow_pauseTime';
				$id				= 'RGen_slideshow_pauseTime';
				$placeholder	= '';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<span class='help-block'>How long each slide will show</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Start slide</label>
		<div class="controls">
			<?php 
				$dbKey 			= $RGen_slideshow_startSlide;
				$name			= 'RGen_slideshow_startSlide';
				$id				= 'RGen_slideshow_startSlide';
				$placeholder	= '';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<span class='help-block'>Set starting Slide (0 index)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Display left right arrows</label>
		<div class="controls">
			<?php 
				$ar 	= array( 'Yes' => 'true', 'No' => 'false');
				if($RGen_prdList_defaultView == ''){
					$dbKey 	= 'true';
				}else{
					$dbKey 	= $RGen_slideshow_directionNav;
				}
				$name	= 'RGen_slideshow_directionNav';
				$id		= 'directionNav';
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
		<label class="control-label">Display control navigation</label>
		<div class="controls">
			<?php 
				$ar 	= array( 'Yes' => 'true', 'No' => 'false'); 
				if($RGen_prdList_defaultView == ''){
					$dbKey 	= 'true';
				}else{
					$dbKey 	= $RGen_slideshow_controlNav;
				}
				$name	= 'RGen_slideshow_controlNav';
				$id		= 'controlNav';
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
			<span class='help-block'>1,2,3... navigation</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Pause on hover</label>
		<div class="controls">
			<?php 
				$ar 	= array( 'Yes' => 'true', 'No' => 'false'); 
				if($RGen_prdList_defaultView == ''){
					$dbKey 	= 'true';
				}else{
					$dbKey 	= $RGen_slideshow_pauseOnHover;
				}
				$name	= 'RGen_slideshow_pauseOnHover';
				$id		= 'pauseOnHover';
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
			<span class='help-block'>Stop animation while hovering</span>
		</div>
	</div>
</div>