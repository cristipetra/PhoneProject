<h4>R.Gen custom footer</h4>
<div class="form-horizontal custom-ft">

	<div class="control-group">
		<label class="control-label">Custom Footer status</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_FT_Status;
			$name	= 'RGen_FT_Status';
			$id		= 'RGen_FT_Status';
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
			$ar 	= array( 'Display only on home page' => 'common/home', 'Display on all pages' => 'all'); 
			$dbKey 	= $RGen_FT_Status_home;
			$name	= 'RGen_FT_Status_home';
			$id		= 'RGen_FT_Status_home';
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

	<div class="tabs-left tabbable" data-theme="tab2" id='custom-ft'>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#tab_about">About Us</a>
				<?php 
					$dbKey 	= $RGen_FT_about_Status;
					$name	= 'RGen_FT_about_Status';
					$id		= 'RGen_FT_about_Status';
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
			</li>
			<li>
				<a href="#tab_twitter">Twitter</a>
				<?php 
					$dbKey 	= $RGen_FT_twitter_Status;
					$name	= 'RGen_FT_twitter_Status';
					$id		= 'RGen_FT_twitter_Status';
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
			</li>
			<li>
				<a href="#tab_facebook">Facebook</a>
				<?php 
					$dbKey 	= $RGen_FT_fb_Status;
					$name	= 'RGen_FT_fb_Status';
					$id		= 'RGen_FT_fb_Status';
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
			</li>
		</ul>
		<div class="tab-content">
			<div id="tab_about" class="tab-pane active">
				
				<ul class="nav nav-tabs" id="ftAboutus">
					<li class="active"><a href="#ft-about-static">Static (Not multi language)</a></li>
					<?php foreach ($languages as $language) { ?>
					<li>
						<a href="#ft-about<?php echo $language['language_id']; ?>">
						<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="ft-about-static">
						<div class="control-group">
							<label class="control-label">Title</label>
							<div class="controls">
								<input type="text" name="FT_about_Title" value="<?php echo $FT_about_Title; ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Description</label>
							<div class="controls">
								<textarea name="FT_about_Text" id="FT_about_Text"><?php echo $FT_about_Text; ?></textarea>
							</div>
						</div>
					</div>
					<?php foreach ($languages as $language) { ?>
					<div class="tab-pane" id="ft-about<?php echo $language['language_id']; ?>">
						<div class="control-group">
							<label class="control-label">Title</label>
							<div class="controls">
								<input placeholder="Title" name="RGen_module[<?php echo $language['language_id']; ?>][ftAbout_title]" value="<?php echo isset($RGen[$language['language_id']]['ftAbout_title']) ? $RGen[$language['language_id']]['ftAbout_title'] : ''; ?>" id="RGen_module-<?php echo $language['language_id']; ?>-ftAbout_title" type="text" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Description</label>
							<div class="controls">
								<textarea name="RGen_module[<?php echo $language['language_id']; ?>][ftAbout]" id="RGen_module-<?php echo $language['language_id']; ?>-ftAbout"><?php echo isset($RGen[$language['language_id']]['ftAbout']) ? $RGen[$language['language_id']]['ftAbout'] : ''; ?></textarea>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				
			</div>
			<div id="tab_twitter" class="tab-pane">
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<input type="text" name="FT_twitter_Title" value="<?php echo $FT_twitter_Title; ?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Twitter Username</label>
					<div class="controls">
						<input type="text" name="FT_twitter_User" value="<?php echo $FT_twitter_User; ?>" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Widget ID</label>
					<div class="controls">
						<input type="text" name="FT_twitter_widgetid" value="<?php echo $FT_twitter_widgetid; ?>" />
						<span class="help-block"><a id='widgetID'>How to get widget ID?</a></span>
						<div class='widget-popup'><img src="view/image/rgen_theme/twitter.png" class='widgetID' style=''></div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Twitter theme</label>
					<div class="controls">
						<?php 
							$ar 	= array( 'Dark' => 'dark', 'Light' => 'light' );
							$dbKey 	= $FT_twitter_theme;
							$name	= 'FT_twitter_theme';
							$id		= 'FT_twitter_theme';
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
					<label class="control-label">Link color</label>
					<div class="controls">
						<input type="text" class='hex' name="FT_twitter_linkcolor" value="<?php echo $FT_twitter_linkcolor; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Number of Tweets</label>
					<div class="controls">
						<?php 
							$ar 	= array( 1 => 1, 2 => 2, 3 => 3); 
							$dbKey 	= $FT_twitter_Tweets;
							$name	= 'FT_twitter_Tweets';
							$id		= 'FT_twitter_Tweets';
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
			<div id="tab_facebook" class="tab-pane">
				
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<input type="text" name="FT_fb_Title" value="<?php echo $FT_fb_Title; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Facebook iframe code</label>
					<div class="controls">
						<textarea name="htmlData_FT_fb_code" id="htmlData_FT_fb_code"><?php echo $htmlData_FT_fb_code; ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>