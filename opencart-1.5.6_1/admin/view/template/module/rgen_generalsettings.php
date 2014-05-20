<h4>General options</h4>
<div class="form-horizontal">

	<div class="control-group">
		<label class="control-label">Responsive theme</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_reaponsive_status;
			$name	= 'RGen_reaponsive_status';
			$id		= 'RGen_reaponsive_status';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			Wide layout support
		</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<span class="lbl">Status</span>
						<?php 
							$dbKey 	= $RGen_wide_layout;
							$name	= 'RGen_wide_layout';
							$id		= 'RGen_wide_layout';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<span class="lbl">Minimum screen size</span>
						<?php 
						$ar = array( '1200' => 1200, '1400' => 1400); 
						$dbKey = isset($RGen_wide_screensize) ? $RGen_wide_screensize : 1200;
						$name	= 'RGen_wide_screensize';
						$id		= 'RGen_wide_screensize';
						?>
						<div class="btn-group" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-small btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
				</tr>
			</table>
			<div class="help-block">
				Wide layout support require responsive status active. 
				Minimum screen size is break point to display wide layout support 
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Scroll to top button</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_scrollTop_status;
			$name	= 'RGen_scrollTop_status';
			$id		= 'RGen_scrollTop_status';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Theme <a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/theme-box-wide.png">?</a></label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Boxed' => 'bx', 'Full width' => 'fw'); 
			if($RGen_layout == ''){
				$dbKey 	= 'bx';
			}else{
				$dbKey 	= $RGen_layout;	
			}
			$name	= 'RGen_layout';
			$id		= 'RGen_layout';
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
		<label class="control-label">Theme icons</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Use image icons' => 'img', 'Use vector icons' => 'vector' );
			if($RGen_Icons == ''){
				$dbKey 	= 'img';
			}else{
				$dbKey 	= $RGen_Icons;	
			}
			$name	= 'RGen_Icons';
			$id		= 'RGen_Icons';
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
				<strong>Vector icons</strong><br>
				Only vector icon support color changes from theme color options<br><br>
				
				<strong>Image icons</strong><br>
				You can change image icons from this folder => <strong>\catalog\view\theme\rgen-cupid\image\rgen\</strong>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			Product image type
			<span class="help-block">
				Click on "<strong>Update sizes</strong>" button to set<br>recommended image sizes in database, 
				After updating image sizes don't forgot click on module "Save" button to apply design changes

			</span>
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/image-sizes.png">?</a>
		</label>
		<div class="controls imgtype imgbtn">
			<table class="subfields">
				<tr>
					<td class="tc">
						<span class="radio">
							<input id="verimg" name="RGen_imgType" type="radio" <?php if ($RGen_imgType == '' || $RGen_imgType == 'verimg') { ?>checked="checked"<?php }?> value="verimg" />
							<label class="rgen-button" for="verimg">
								<span></span>Vertical
							</label>
						</span>
						<a class="btn btn-success btn-mini ver-img"<?php if ($RGen_imgType == '' || $RGen_imgType == 'verimg') { ?>style="display:block;"<?php }?>>Update sizes</a>
						<script>
						$(window).on("click", ".ver-img", function(){
							if($("body").find("#permission").length>0){
								permissionCheck();
							}else{
								var updateBtn = $(this);
								updateBtn.text('Updating...').css({cursor: 'inherit', opacity:0.3});
								$.post( "index.php?route=module/rgen_theme/verImageSizes&token=<?php echo $token; ?>&imgType=verimg", function(data) {
									updateBtn.text('Update sizes').css({cursor: '', opacity:1});
									console.log(data);
								});	
							}
						});
						</script>
					</td>
					<td class="tc">
						<span class="radio">
							<input id="horimg" name="RGen_imgType" type="radio" <?php if ($RGen_imgType == 'horimg') { ?>checked="checked"<?php }?> value="horimg" />
							<label class="rgen-button" for="horimg">
								<span></span>Horizontal
							</label>
						</span>
						<a class="btn btn-success btn-mini hor-img"<?php if ($RGen_imgType == 'horimg') { ?>style="display:block;"<?php }?>>Update sizes</a>
						<script>
						$(window).on("click", ".hor-img", function(){
							if($("body").find("#permission").length>0){
								permissionCheck();
							}else{
								var updateBtn = $(this);
								updateBtn.text('Updating...').css({cursor: 'inherit', opacity:0.3});
								$.post( "index.php?route=module/rgen_theme/verImageSizes&token=<?php echo $token; ?>&imgType=horimg", function(data) {
									updateBtn.text('Update sizes').css({cursor: '', opacity:1});
									console.log(data);
								});	
							}
						});
						</script>
					</td>
					<td class="tc">
						<span class="radio">
							<input id="squareimg" name="RGen_imgType" type="radio" <?php if ($RGen_imgType == 'squareimg') { ?>checked="checked"<?php }?> value="squareimg" />
							<label class="rgen-button" for="squareimg">
								<span></span>Square
							</label>
						</span>
						<a class="btn btn-success btn-mini square-img"<?php if ($RGen_imgType == 'squareimg') { ?>style="display:block;"<?php }?>>Update sizes</a>
						<script>
						$(window).on("click", ".square-img", function(){
							if($("body").find("#permission").length>0){
								permissionCheck();
							}else{
								var updateBtn = $(this);
								updateBtn.text('Updating...').css({cursor: 'inherit', opacity:0.3});
								$.post( "index.php?route=module/rgen_theme/verImageSizes&token=<?php echo $token; ?>&imgType=squareimg", function(data) {
									updateBtn.text('Update sizes').css({cursor: '', opacity:1});
									console.log(data);
								});	
							}
						});
						</script>
					</td>
				</tr>
			</table>
			<script>
			$(window).on("click", ".imgtype .radio", function(){
				$('.imgtype .btn').css({display:''});
				$(this).next('.btn').css({display:'block'});
			});
			</script>
		</div>
	</div>
</div>

<h4>Offer tag options</h4>
<div class="form-horizontal offer-tag">
	<div class="control-group">
		<label class="control-label">Offer tag type</label>
		<div class="controls">
			<?php 
				$ar 	= array('Default' => 'default', 'Text' => 'txt', 'Custom image' => 'img', 'Discount value' => 'dis');
				$dbKey 	= isset($RGenTagData['type']) ? $RGenTagData['type'] : 'default';
				$name	= 'RGenTagData[type]';
				$id		= 'tag_type';
			?>
			<div class="btn-group tag-typ" data-toggle="buttons-radio">
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
	<div class="control-group tag-txt">
		<label class="control-label">Offer tag text</label>
		<div class="controls">
			<?php foreach ($languages as $language) { ?>
			<?php 
				$dbKey 			= isset($RGenTagData['text'][$language['language_id']]) ? $RGenTagData['text'][$language['language_id']] : null;
				$name			= 'RGenTagData[text]['.$language['language_id'].']';
				$placeholder	= 'Enter text';
			?><input data-clone="name" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>"><br>
			<?php } ?>
		</div>
	</div>
	<div class="control-group tag-img">
		<label class="control-label">Upload offer tag image</label>
		<div class="controls">
			<div class="img-preview" style="display:block;">
				<?php
					$dbKey 	= isset($RGenTagData['image']) ? $RGenTagData['image'] : null;
					$name	= 'RGenTagData[image]';
					$id		= 'offertag_img';
				?>
				<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
				<!-- <img src="<?php echo $no_img; ?>" id="<?php echo $id; ?>-preview"> -->
				<div class="btn-group btn-group-vertical">
					<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
					<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
				</div>
				<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
			</div>
		</div>
	</div>
	<div class="control-group tag-style">
		<label class="control-label">Offer tag style</label>
		<div class="controls tagtype imgbtn">
			<?php
				$dbKey 	= isset($RGenTagData['style']) ? $RGenTagData['style'] : null;
				$name	= 'RGenTagData[style]';
				$id		= 'offertag_img';
			?>
			<span class="radio">
				<input id="tag0" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '' || $dbKey == '0') { ?>checked="checked"<?php }?> value="0" />
				<label class="rgen-button" for="tag0">
					<span></span>
				</label>
			</span>
			<span class="radio">
				<input id="tag1" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '1') { ?>checked="checked"<?php }?> value="1" />
				<label class="rgen-button" for="tag1">
					<span></span>
				</label>
			</span>
			<span class="radio">
				<input id="tag2" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '2') { ?>checked="checked"<?php }?> value="2" />
				<label class="rgen-button" for="tag2">
					<span></span>
				</label>
			</span>
			<span class="radio">
				<input id="tag3" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '3') { ?>checked="checked"<?php }?> value="3" />
				<label class="rgen-button" for="tag3">
					<span></span>
				</label>
			</span>
			<span class="radio">
				<input id="tag4" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '4') { ?>checked="checked"<?php }?> value="4" />
				<label class="rgen-button" for="tag4">
					<span></span>
				</label>
			</span>
			<span class="radio">
				<input id="tag5" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '5') { ?>checked="checked"<?php }?> value="5" />
				<label class="rgen-button" for="tag5">
					<span></span>
				</label>
			</span>
		</div>
	</div>
	<div class="control-group tag-css">
		<label class="control-label">Offer tag color opitons</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php
							$dbKey  = isset($RGenTagData['bg']) ? $RGenTagData['bg'] : null;
							$name	= 'RGenTagData[bg]';
						?>
						<span class="lbl">Background</span>
						<input type="text" class="hex" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					</td>
					<td>
						<?php
							$dbKey  = isset($RGenTagData['txtcolor']) ? $RGenTagData['txtcolor'] : null;
							$name	= 'RGenTagData[txtcolor]';
						?>
						<span class="lbl">Text color</span>
						<input type="text" class="hex" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
					</td>
				</tr>
			</table>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		function tagImg(){
			$('.offer-tag .tag-typ input[type="radio"]:checked').val() == 'img' ? $(".offer-tag .tag-img").show() : $(".offer-tag .tag-img").hide();
			$('.offer-tag .tag-typ input[type="radio"]:checked').val() == 'img' ? $(".offer-tag .tag-style").hide() : $(".offer-tag .tag-style").show();
			$('.offer-tag .tag-typ input[type="radio"]:checked').val() == 'img' ? $(".offer-tag .tag-css").hide() : $(".offer-tag .tag-css").show();
		}
		tagImg();

		function tagTxt(){
			$('.offer-tag .tag-typ input[type="radio"]:checked').val() == 'txt' ? $(".offer-tag .tag-txt").show() : $(".offer-tag .tag-txt").hide();
		}
		tagTxt();
		
		function tagDefalut(){
			if ($('.offer-tag .tag-typ input[type="radio"]:checked').val() == 'default') {
				$(".offer-tag .tag-img, .offer-tag .tag-style, .offer-tag .tag-css, .offer-tag .tag-txt").hide();
				$(".offer-tag .tag-style").hide();
			};
		}
		tagDefalut();

		$(window).on("click", ".offer-tag .tag-typ label", function(){
			tagTxt();
			tagImg();
			tagDefalut();
		});
	});
	

	
	</script>
</div>

<h4>Header options</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Header styles
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/header-help1.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Default' => 'hd1', 'Style 1' => 'hd2');
			$dbKey 	= isset($RGen_header_design) ? $RGen_header_design : 'hd1';
			$name	= 'RGen_header_design';
			$id		= 'logoPosition';
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
		<label class="control-label">Header links
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/header-help2.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Default' => 'nr', 'As drop down' => 'dd'); 
			$dbKey 	= isset($RGen_header_links) ? $RGen_header_links : 'nr';
			$name	= 'RGen_header_links';
			$id		= 'RGen_header_links';
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
		<label class="control-label">Logo placement
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/header-help3.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Inside menu' => 0, 'Outside menu' => 1); 
			$dbKey 	= $RGen_logoPosition_status;
			$name	= 'RGen_logoPosition_status';
			$id		= 'logoPosition';
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
			<?php 
			$ar 	= array( 'Align left' => 'lg-l', 'Align center' => 'lg-c');
			$dbKey 	= isset($RGen_logoAlign) ? $RGen_logoAlign : 'lg-l';
			$name	= 'RGen_logoAlign';
			$id		= 'logoAlign';
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
				Logo position <strong>"inside menu"</strong> only work with boxed menu layout. <br>
				Logo alignment options only work with logo position <strong>"Outside menu"</strong>.
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Logo position</label>
		<div class="controls">
			<?php 
			$dbKey 			= $RGen_logoLeft;
			$name			= 'RGen_logoLeft';
			$id				= 'RGen_logoLeft';
			$placeholder	= 'Left';
			?>
			<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

			<?php 
			$dbKey 			= $RGen_logoTop;
			$name			= 'RGen_logoTop';
			$id				= 'RGen_logoTop';
			$placeholder	= 'Top';
			?>
			<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Space around logo
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/header-help4.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$dbKey 			= $RGen_logoSpaceAround_TB;
			$name			= 'RGen_logoSpaceAround_TB';
			$id				= 'RGen_logoSpaceAround_TB';
			$placeholder	= 'Top - Bottom';
			?>
			<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

			<?php 
			$dbKey 			= $RGen_logoSpaceAround_LR;
			$name			= 'RGen_logoSpaceAround_LR';
			$id				= 'RGen_logoSpaceAround_LR';
			$placeholder	= 'Left - Right';
			?>
			<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Logo background color</label>
		<div class="controls">
			<?php 
			$dbKey 			= $RGen_logoBG_color;
			$name			= 'RGen_logoBG_color';
			$id				= 'RGen_logoBG_color';
			$placeholder	= 'Select color(rgb)';
			?>
			<input type="text" class="input-medium rgb" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Menu</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Boxed' => 'bx', 'Wide' => 'fw'); 
			if($RGen_menulayout == ''){
				$dbKey 	= 'bx';
			}else{
				$dbKey 	= $RGen_menulayout;	
			}
			$name	= 'RGen_menulayout';
			$id		= 'RGen_menulayout';
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
			<?php 
			$ar 	= array( 'Normal' => 'normal', 'Sticky' => 'sticky'); 
			$dbKey 	= isset($RGen_menusticky) ? $RGen_menusticky : "normal";	
			$name	= 'RGen_menusticky';
			$id		= 'RGen_menusticky';
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
				Wide menu will place logo outside menu
			</span>	
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Menu home link</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Icon button' => 'ico', 'Text' => 'tx', 'Off' => 'off'); 
			if($RGen_menuhome == ''){
				$dbKey 	= 'ico';
			}else{
				$dbKey 	= $RGen_menuhome;
			}
			$name	= 'RGen_menuhome';
			$id		= 'RGen_menuhome';
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
</div>

<h4>Category page</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Products default view</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Grid view' => 'grid', 'List view' => 'list'); 
			if($RGen_prdList_defaultView == ''){
				$dbKey 	= 'list';
			}else{
				$dbKey 	= $RGen_prdList_defaultView;	
			}
			$name	= 'RGen_prdList_defaultView';
			$id		= 'defaultView';
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
		<label class="control-label">Product box layout
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/cate-help2.png">?</a>
		</label>
		<div class="controls prdbox">
			<span class="radio">
				<input id="prd1" name="RGen_prdBlock_view" type="radio" <?php if ($RGen_prdBlock_view == '' || $RGen_prdBlock_view == 'prd1') { ?>checked="checked"<?php }?> value="prd1" />
				<label class="rgen-button" for="prd1">
					<span></span>Default product block
				</label>
			</span>
			<span class="radio">
				<input id="prd2" name="RGen_prdBlock_view" type="radio" <?php if ($RGen_prdBlock_view == 'prd2') { ?>checked="checked"<?php }?> value="prd2" />
				<label class="rgen-button" for="prd2">
					<span></span>Product block 1
				</label>
			</span>
			<span class="radio">
				<input id="prd3" name="RGen_prdBlock_view" type="radio" <?php if ($RGen_prdBlock_view == 'prd3') { ?>checked="checked"<?php }?> value="prd3" />
				<label class="rgen-button" for="prd3">
					<span></span>Product block 2
				</label>
			</span>
			<span class="radio">
				<input id="prd4" name="RGen_prdBlock_view" type="radio" <?php if ($RGen_prdBlock_view == 'prd4') { ?>checked="checked"<?php }?> value="prd4" />
				<label class="rgen-button" for="prd4">
					<span></span>Product block 3
				</label>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Refine category layout style
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/cate-help1.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'R.Gen' => 'rgen', 'OpenCart' => 'oc', 'Links' => 'btn'); 
			$dbKey	= isset($RGen_refineCate_layout) ? $RGen_refineCate_layout : 'rgen';
			$name	= 'RGen_refineCate_layout';
			$id		= 'RGen_refineCate_layout';
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
		<label class="control-label">Refine category view</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Scroll' => 'scroll', 'Grid' => 'grid' ); 
			if($RGen_refineCate_View == ''){
				$dbKey 	= 'scroll';
			}else{
				$dbKey 	= $RGen_refineCate_View;	
			}
			$name	= 'RGen_refineCate_View';
			$id		= 'refineCate';
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
				Only work with R.Gen style layout
			</span>
		</div>
	</div>

	<label class="control-label">
		Category description
	</label>
	<div class="controls">
		<?php 
		$dbKey 	=  isset($RGen_catinfo_status) ? $RGen_catinfo_status : null;
		$name	= 'RGen_catinfo_status';
		$id		= 'RGen_catinfo_status';
		?>
		<span class="switch">
			<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
			<label for="<?php echo $id; ?>" class="switch-img"></label>
			<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
		</span>
	</div>
</div>

<h4>Product modules</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Product carousel arrow positions</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Both side' => 'bs', 'Top Right' => 'tr' ); 
			if($RGen_carouselArrow == ''){
				$dbKey 	= 'bs';
			}else{
				$dbKey 	= $RGen_carouselArrow;	
			}
			$name	= 'RGen_carouselArrow';
			$id		= 'RGen_carouselArrow';
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
				Arrow position <strong>"Both side"</strong> only work with <strong>Default product block</strong>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Featured product block layout</label>
		<div class="controls modprdbox">
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_featured;
					$value 	= 'prd1';	
					$name	= 'RGen_modPrdBlock_featured';
					$id		= 'featured_prd1';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '' || $dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Default product block
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_featured;
					$value 	= 'prd2';
					$name	= 'RGen_modPrdBlock_featured';
					$id		= 'featured_prd2';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 1
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_featured;
					$value 	= 'prd3';
					$name	= 'RGen_modPrdBlock_featured';
					$id		= 'featured_prd3';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 2
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_featured;
					$value 	= 'prd4';
					$name	= 'RGen_modPrdBlock_featured';
					$id		= 'featured_prd4';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 3
				</label>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Latest product block layout</label>
		<div class="controls modprdbox">
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_latest;
					$value 	= 'prd1';	
					$name	= 'RGen_modPrdBlock_latest';
					$id		= 'latest_prd1';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '' || $dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Default product block
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_latest;
					$value 	= 'prd2';	
					$name	= 'RGen_modPrdBlock_latest';
					$id		= 'latest_prd2';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 1
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_latest;
					$value 	= 'prd3';	
					$name	= 'RGen_modPrdBlock_latest';
					$id		= 'latest_prd3';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 2
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_latest;
					$value 	= 'prd4';	
					$name	= 'RGen_modPrdBlock_latest';
					$id		= 'latest_prd4';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 3
				</label>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Bestseller product block layout</label>
		<div class="controls modprdbox">
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_best;
					$value 	= 'prd1';	
					$name	= 'RGen_modPrdBlock_best';
					$id		= 'best_prd1';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '' || $dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Default product block
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_best;
					$value 	= 'prd2';	
					$name	= 'RGen_modPrdBlock_best';
					$id		= 'best_prd2';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 1
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_best;
					$value 	= 'prd3';	
					$name	= 'RGen_modPrdBlock_best';
					$id		= 'best_prd3';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 2
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_best;
					$value 	= 'prd4';	
					$name	= 'RGen_modPrdBlock_best';
					$id		= 'best_prd4';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 3
				</label>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Special offer product block layout</label>
		<div class="controls modprdbox">
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_special;
					$value 	= 'prd1';	
					$name	= 'RGen_modPrdBlock_special';
					$id		= 'special_prd1';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == '' || $dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Default product block
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_special;
					$value 	= 'prd2';	
					$name	= 'RGen_modPrdBlock_special';
					$id		= 'special_prd2';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 1
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_special;
					$value 	= 'prd3';	
					$name	= 'RGen_modPrdBlock_special';
					$id		= 'special_prd3';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 2
				</label>
			</span>
			<span class="radio">
				<?php 
					$dbKey 	= $RGen_modPrdBlock_special;
					$value 	= 'prd4';	
					$name	= 'RGen_modPrdBlock_special';
					$id		= 'special_prd4';
				?>
				<input id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="radio" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?> value="<?php echo $value; ?>" />
				<label class="rgen-button" for="<?php echo $id; ?>">
					<span></span>Product block 3
				</label>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Product modules display<br>in side column
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/colmod-help1.png">?</a>
		</label>
		<div class="controls">
			<?php $colPrdStyles = array( 'List' => 'list', 'Small list' => 'list1', 'Scroll' => 'scroll' );  ?>
			<table class='subfields'>
				<tr>
					<td>
						<span class='lbl'>Special</span>
						<?php 
						$ar 	= $colPrdStyles; 
						if($RGen_colprdView_special == ''){
							$dbKey 	= 'list';
						}else{
							$dbKey 	= $RGen_colprdView_special;	
						}
						$name	= 'RGen_colprdView_special';
						$id		= 'RGen_colprdView_special';
						?>
						<div class="btn-group mb10" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
					<td>
						<span class='lbl'>Featured</span>
						<?php 
						$ar 	= $colPrdStyles; 
						if($RGen_colprdView_featured == ''){
							$dbKey 	= 'list';
						}else{
							$dbKey 	= $RGen_colprdView_featured;	
						}
						$name	= 'RGen_colprdView_featured';
						$id		= 'RGen_colprdView_featured';
						?>
						<div class="btn-group mb10" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<span class='lbl'>Bestseller</span>
						<?php 
						$ar 	= $colPrdStyles; 
						if($RGen_colprdView_best == ''){
							$dbKey 	= 'list';
						}else{
							$dbKey 	= $RGen_colprdView_best;	
						}
						$name	= 'RGen_colprdView_best';
						$id		= 'RGen_colprdView_best';
						?>
						<div class="btn-group mb10" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
					<td>
						<span class='lbl'>Latest</span>
						<?php 
						$ar 	= $colPrdStyles; 
						if($RGen_colprdView_latest == ''){
							$dbKey 	= 'list';
						}else{
							$dbKey 	= $RGen_colprdView_latest;	
						}
						$name	= 'RGen_colprdView_latest';
						$id		= 'RGen_colprdView_latest';
						?>
						<div class="btn-group mb10" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Product modules display<br>in content area
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/colmod-help2.png">?</a>
		</label>
		<div class="controls modprdview">
			<?php $modprdview 	= array( 'Grid' => 'grid', 'Scroll' => 'scroll' ); ?>
			<table class='subfields'>
				<tr>
					<td>
						<span class='lbl'>Special</span>
						<?php 
						$ar 	= $modprdview; 
						$id		= 'RGen_prdspecial';
						?>
						<div class="btn-group <?php echo $id; ?>" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  'scroll') ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'scroll') { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
					<td>
						<span class='lbl'>Featured</span>
						<?php 
						$ar 	= $modprdview; 
						$id		= 'RGen_prdfeatured';
						?>
						<div class="btn-group <?php echo $id; ?>" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  'scroll') ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'scroll') { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
					<td>
						<span class='lbl'>Bestseller</span>
						<?php 
						$ar 	= $modprdview; 
						$id		= 'RGen_prdbest';
						?>
						<div class="btn-group <?php echo $id; ?>" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  'scroll') ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'scroll') { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
					<td>
						<span class='lbl'>Latest</span>
						<?php 
						$ar 	= $modprdview; 
						$id		= 'RGen_prdlatest';
						?>
						<div class="btn-group <?php echo $id; ?>" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  'scroll') ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'scroll') { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</td>
				</tr>
			</table>
			<?php 
				$dbKey 			= isset($RGen_modprdView) ? $RGen_modprdView : 'special-scroll,featured-scroll,best-scroll,latest-scroll';
				$name			= 'RGen_modprdView';
			?>
			<input type="hidden" class="RGen_modprdView" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			$(window).on("click", '.btn-group label', function(){
				var newVal = 'special-'+$('.RGen_prdspecial .active input').val()+','+
							 'featured-'+$('.RGen_prdfeatured .active input').val()+','+
							 'best-'+$('.RGen_prdbest .active input').val()+','+
							 'latest-'+$('.RGen_prdlatest .active input').val();
				$('.modprdview .RGen_modprdView').val(newVal);
			});
			var RGen_modprdView = $('.modprdview .RGen_modprdView').val();
			if(RGen_modprdView){
				var RGen_modprdView_ar = RGen_modprdView.split(',');
				$('.modprdview .btn-group input[type="radio"]').attr('checked', '').parent().removeClass('active');
				var special = RGen_modprdView_ar[0].replace('special-','');
				var featured = RGen_modprdView_ar[1].replace('featured-','');
				var best = RGen_modprdView_ar[2].replace('best-','');
				var latest = RGen_modprdView_ar[3].replace('latest-','');
				$('.RGen_prdspecial input[value="'+special+'"]').attr('checked', 'checked').parent().addClass('active');
				$('.RGen_prdfeatured input[value="'+featured+'"]').attr('checked', 'checked').parent().addClass('active');
				$('.RGen_prdbest input[value="'+best+'"]').attr('checked', 'checked').parent().addClass('active');
				$('.RGen_prdlatest input[value="'+latest+'"]').attr('checked', 'checked').parent().addClass('active');
			}
		});
		</script>
	</div>
</div>

<h4>Product page options</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Product page opencart <br>default layout
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/prdpage-help1.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_productLayout;
			$name	= 'RGen_productLayout';
			$id		= 'RGen_productLayout';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="oc">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

		</div>
	</div>
	<div class="control-group ocLayout">
		<label class="control-label">Display review in tabs
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/prdpage-help2.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_reviewTab;
			$name	= 'RGen_reviewTab';
			$id		= 'RGen_reviewTab';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

		</div>
	</div>
	<div class="control-group ocLayout">
		<label class="control-label">Additional images display<br>below main image
			<a class="helpbtn" data-type="img" data-info="view/image/rgen_theme/prdpage-help3.png">?</a>
		</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_thumbOptions;
			$name	= 'RGen_thumbOptions';
			$id		= 'RGen_thumbOptions';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Product image zoom options</label>
		<div class="controls">
			<?php 
			$ar 	= array( 'Magnify zoom' => 0, 'Normal popup' => 1, 'Both' => 2); 
			$dbKey 	= $RGen_productZoom;
			$name	= 'RGen_productZoom';
			$id		= 'productZoom';
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

</div>									