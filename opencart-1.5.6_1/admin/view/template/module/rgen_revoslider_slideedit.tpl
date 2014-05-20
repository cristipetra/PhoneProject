<?php 
$request = isset($this->request->get['mod_id']);

$cpvideo_common = 'htmlData_cpvideo_common';
$cpvideo_lng    = 'htmlData_cpvideo';
$cptext_common  = 'htmlData_cptext_common';
$cptext         = 'htmlData_cptext';

if ($request) {
	$this->data['mod_id'] = $this->request->get['mod_id'];
	//echo "<pre style='color:;'>" . print_r($easing[0], TRUE) . "</pre>";
	$slides = "slides";
}
//echo "<pre style='color:;'>slide name => " . print_r($sld_name, TRUE) . "</pre>";
//if($request && isset($slide)){ ?>
<?php 
	if(isset($slide['slide_id'])){
		$sld = str_replace('slide', '', $slide['slide_id']);
	}else{
		$sld = $sld_name;
	}
?>
<div id="slide<?php echo $sld; ?>" class="tab-pane slide-pane" data-slide-id="buildslides<?php echo $sld; ?>">
	<?php $name	= $slides . '[' . $sld . '][slide_id]'; ?>
	<input type='hidden' name="<?php echo $name; ?>" value="slide<?php echo $sld; ?>">
	<!-- Side container wrapper -->
	<div class="slide-container">

		<!-- Slide title -->
		<div class="slide-title">
			<!-- <a id="editslide-saveBtn" class="btn btn-success">Save slide</a> -->
			<?php 
				$dbKey = isset($slide['slidename']) ? $slide['slidename'] : '';
				$name	= $slides . '[' . $sld . '][slidename]';
			?>
			<input data-toggle="tooltip" data-placement="right" title="Enter slide name" type="text" placeholder="Enter slide name" name="<?php echo $name; ?>" value="<?php if($dbKey == ""){echo "Main slide " . ($sld+1);}else{echo $dbKey;}  ?>" />
			<div class="pull-right">
				<?php
					$dbKey = isset($slide['status']) ? $slide['status'] : '0';
					$name	= $slides . '[' . $sld . '][status]';
					$id		= 'slide-' . $sld . '-status';
				?>
				<span class="switch">
					<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
					<label for="<?php echo $id; ?>" class="switch-img"></label>
					<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php } ?>
				</span>
				<?php 
					$dbKey = isset($slide['sort_order']) ? $slide['sort_order'] : $sld;
					$name	= $slides . '[' . $sld . '][sort_order]';
				?>
				<input type="text" placeholder="Sort order" class="input-small so" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
			</div>
		</div>
		<!-- Slide title end -->

		<div class="row-fluid slide-config">
			<div class="span6">
				<div class="bx1 main-slide-settings caption-pane" id="slide<?php echo $sld; ?>-setting">
					<?php $dbKey = isset($slide['slidename']) ? $slide['slidename'] : ''; ?>
					<h4><?php if($dbKey == ""){ echo "Main slide " . ($sld+1); }else{ echo $dbKey; } ?></h4>
					<div class="form-horizontal form-1">
						<div class="control-group">
							<label class="control-label">Image</label>
							<div class="controls slide-img-type-tab">

								<div class="slide-img">
									<div class="btn-group mb10 in-tab">
										<a data-tb="common" class="active btn btn-small">Common</a>
										<?php foreach ($languages as $language) { ?>
										<a data-tb="<?php echo $language['language_id']; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language['image']; ?>"></a>
										<?php } ?>
									</div>
									<div class="in-tab-panes">
										<div data-tbpn="common" class="img-preview" style="display:;">
											<?php
												$dbKey  = isset($slide['slideimage_common']) ? $slide['slideimage_common'] : '';
												$name	= $slides . '[' . $sld . '][slideimage_common]';
												$id		= 'slide' . $sld . '-image-common';
											?>
											<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
											<!-- <img src="<?php echo $no_img; ?>" id="<?php echo $id; ?>-preview"> -->
											<div class="btn-group btn-group-vertical">
												<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
												<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
											</div>
											<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
										</div>
										<?php foreach ($languages as $language) { ?>
										<div data-tbpn="<?php echo $language['language_id']; ?>" class="img-preview" style="display:none;">
											<?php
												$dbKey = isset($slide['slideimage'][$language['language_id']]) ? $slide['slideimage'][$language['language_id']] : '';
												$name	= $slides . '[' . $sld . '][slideimage][' . $language['language_id'] . ']';
												$id		= 'slide' . $sld . '-image-' . $language['language_id'];
											?>
											<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
											<!-- <img src="<?php echo $no_img; ?>" id="<?php echo $id; ?>-preview" class="prview"> -->
											<div class="btn-group btn-group-vertical">
												<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
												<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');" title="Common slide image for all languages">Clear</a>
											</div>
											<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
										</div>
										<?php } ?>
									</div>
								</div>

							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Slide background</label>
							<div class="controls">
								<?php 
									$dbKey = isset($slide['slidebg']) ? $slide['slidebg'] : '';
									$name	= $slides . '[' . $sld . '][slidebg]';
								?>
								<input type="text" class="input-small rgb" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								<div class="help-block">Background color only display when slide image not uploaded</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Slide image options</label>
							<div class="controls bg-option-wrp">
								<span class="lbl-1">Image repeat</span>
								<span class='select mb10'>
									<select class="bgr">
										<?php foreach ($bgrepeat as $key) { ?>
											<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
								<span class="lbl-1">Image fit</span>
								<span class='select mb10'>
									<select class="bgf">
										<?php foreach ($bgfit as $key) { ?>
											<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
								<span class="lbl-1">Image position</span>
								<span class='select'>
									<select class="bgp">
										<?php foreach ($bgposition as $key) { ?>
											<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
								<?php 
									$dbKey = isset($slide['bg_options']) ? $slide['bg_options'] : '' ;
									$name	= $slides . '[' . $sld . '][bg_options]';
								?>
								<input type="hidden" class="bg-options" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Transition</label>
							<div class="controls">
								<?php 
									$dbKey  = isset($slide['transition']) ? $slide['transition'] : '';
									$ar 	= $transition;
									$name	= $slides . '[' . $sld . '][transition]';
								?>
								<span class='select'>
									<select name="<?php echo $name; ?>">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
											<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
										<?php } ?>
									</select>
								</span>
							</div>
						</div>
						<div class="cp-smd">
							<div class="control-group">
								<label class="control-label">Slot amount</label>
								<div class="controls">
									<input type="text" class="input-mini slot" name="" value="" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Master speed</label>
								<div class="controls">
									<input type="text" class="input-mini speed" name="" value="" />
								</div>
							</div>
							<div class="control-group slide-delay">
								<label class="control-label">Delay</label>
								<div class="controls">
									<input type="text" class="input-mini delay" name="" value="" />
								</div>
							</div>
							<?php 
								$dbKey = isset($slide['slot_speed_delay']) ? $slide['slot_speed_delay'] : '' ;
								$name	= $slides . '[' . $sld . '][slot_speed_delay]';
							?>
							<input type="hidden" class="cp-slot-speed-delay" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
						</div>
						<div class="control-group">
							<label class="control-label">Slide URL</label>
							<div class="controls sld-link">
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">URL</span>
											<?php 
												/*$dbKey = isset($slide['link']) ? $slide['link'] : '';
												$name	= $slides . '[' . $sld . '][link]';*/
											?>
											<input type="text" class="sld-link-input" placeholder="Enter URL" value="" />
										</td>
										<td>
											<span class="lbl">Open in new tab</span>
											<?php 
												//$dbKey = isset($slide['linkopen']) ? $slide['linkopen'] : 'no';
												$ar 	= $yesNo;
												//$name	= $slides . '[' . $sld . '][linkopen]';
												$id		= 'slide-linkopen';
											?>
											<div class="btn-group sld-link-open" data-toggle="buttons-radio">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  'no') ? $selected = ' active' : $selected=''; ?>
													<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
														<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value == 'no') { ?>checked="checked"<?php }?>>
														<?php echo $key; ?>
													</label>
												<?php } ?>
											</div>
										</td>
									</tr>
								</table>
								<?php 
									$dbKey = isset($slide['sld_link']) ? $slide['sld_link'] : '' ;
									$name	= $slides . '[' . $sld . '][sld_link]';
								?>
								<input type="hidden" class="sld-link-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</div>
						</div>
					</div>
				</div>

				<?php $cp = 0; ?>
				<?php if(isset($slide['captions'])) { ?>
				<?php foreach($slide['captions'] as $cpmodule) { 
					$setCPID = 's' . $sld . '-c' . $cp;
				?>
				<div class="bx1 slide-cp-settings caption-pane" id="slide<?php echo $sld; ?>-cp<?php echo $cp; ?>" data-cpid="<?php echo $setCPID; ?>">
					<?php $name	= $slides . '[' . $sld . '][captions][' . $cp . '][slide_id]'; ?>
					<input type='hidden' name="<?php echo $name; ?>" value="slide<?php echo $sld; ?>">
					<?php $name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_id]'; ?>
					<input type='hidden' name="<?php echo $name; ?>" value="<?php echo $setCPID; ?>">
					<div class="caption-type">
						<?php 
							$dbKey = isset($cpmodule['cptype']) ? $cpmodule['cptype'] : 'text';
							$ar 	= $captionType;
							$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cptype]';
							$id		= 'slide' . $sld . '-caption' . $cp . '-cptype';
						?>
						<div class="btn-group" data-toggle="buttons-radio">
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
								<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-danger btn<?php echo $selected; ?>">
									<input type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
									<?php echo $key; ?>
								</label>
							<?php } ?>
						</div>
					</div>
					<div class="form-horizontal form-1">
						<div class="control-group cp-nameinput">
							<label class="control-label">Name</label>
							<div class="controls">
								<?php 
									$dbKey = isset($cpmodule['name']) ? $cpmodule['name'] : '';
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][name]';
								?>
								<input type="text" placeholder="Enter name" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
							</div>
						</div>
						
						<!-- Caption text -->
						<div data-cptype="text" id="<?php echo $setCPID; ?>-text" class="cp-type<?php if($cpmodule['cptype'] == 'text'){ echo ' active'; }else{ echo ''; } ?>" style="display:<?php if($cpmodule['cptype'] == 'text'){ echo 'block'; }else{ echo 'none'; } ?>;">
							<div class="control-group">
								<label class="control-label">Text</label>
								<div class="controls text-type-tab">
									<div class="cp-text-type">
										<div class="btn-group mb10 in-tab">
											<a data-tb="common" class="btn btn-small active">Common</a>
											<?php foreach ($languages as $language) { ?>
											<a data-tb="<?php echo $language['language_id']; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language['image']; ?>"></a>
											<?php } ?>
										</div>
										<div class="in-tab-panes">
											<div data-tbpn="common" style="display:;">
												<?php
													$dbKey = isset($cpmodule[$cptext_common]) ? $cpmodule[$cptext_common] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . ']['.$cptext_common.']';
												?>
												<textarea class="cptext-input" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
											</div>
											<?php foreach ($languages as $language) { ?>
											<div data-tbpn="<?php echo $language['language_id']; ?>" style="display:none;">
												<?php
													$dbKey = isset($cpmodule[$cptext][$language['language_id']]) ? $cpmodule[$cptext][$language['language_id']] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . ']['.$cptext.'][' . $language['language_id'] . ']';
												?>
												<textarea class="cptext-input" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
											</div>
											<?php } ?>
										</div>
									</div>

								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Apply CSS class</label>
								<div class="controls css-class">
									<?php 
										$dbKey = isset($cpmodule['cptext_cssclass']) ? $cpmodule['cptext_cssclass'] : '';
										$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cptext_cssclass]';
									?>
									<input type="text" class="input-medium" placeholder="Enter CSS class" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" /> &nbsp; or &nbsp; 
									<a class="btn cp-styles">Select style</a>
								</div>
							</div>
							
						</div>
						<!-- Caption text end -->

						<!-- Caption image -->
						<div data-cptype="image" id="<?php echo $setCPID; ?>-image" class="cp-type<?php if($cpmodule['cptype'] == 'image'){ echo ' active'; }else{ echo ''; } ?>" style="display:<?php if($cpmodule['cptype'] == 'image'){ echo 'block'; }else{ echo 'none'; } ?>">
							<div class="control-group">
								<label class="control-label">Image</label>
								<div class="controls img-type-tab">
									<div class="cp-img-type">
										<div class="btn-group mb10 in-tab">
											<a data-tb="common" class="btn btn-small active">Common</a>
											<?php foreach ($languages as $language) { ?>
											<a data-tb="<?php echo $language['language_id']; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language['image']; ?>"></a>
											<?php } ?>
										</div>
										<div class="in-tab-panes">
											<div data-tbpn="common" class="img-preview" style="display:;">
												<?php
													$dbKey = isset($cpmodule['cpimage_common']) ? $cpmodule['cpimage_common'] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cpimage_common]';
													$id		= 'slide' . $sld . '-cpimg' . $cp . '-image-common';
												?>
												<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
												<div class="btn-group btn-group-vertical">
													<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
													<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
												</div>
												<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</div>
											<?php foreach ($languages as $language) { ?>
											<div data-tbpn="<?php echo $language['language_id']; ?>" class="img-preview" style="display:none;">
												<?php
													$dbKey = isset($cpmodule['cpimage'][$language['language_id']]) ? $cpmodule['cpimage'][$language['language_id']] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cpimage][' . $language['language_id'] . ']';
													$id		= 'slide' . $sld . '-cpimg' . $cp . '-image' . $language['language_id'];
												?>
												<div class="img-holder" style="background-image:url(<?php if (!$dbKey) {echo $no_img;}else{echo '../image/' . $dbKey;} ?>);" id="<?php echo $id; ?>-preview"></div>
												<!-- <img src="<?php echo $no_img; ?>" id="<?php echo $id; ?>-preview" class="prview"> -->
												<div class="btn-group btn-group-vertical">
													<a class="btn btn-small" onclick="image_upload('<?php echo $id; ?>', '<?php echo $id; ?>-preview');">Browse</a>
													<a class="btn btn-small" onclick="$('#<?php echo $id; ?>-preview').css({backgroundImage: 'url(<?php echo $no_img; ?>)'});$('#<?php echo $id; ?>').attr('value', '');">Clear</a>
												</div>
												<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Caption image end -->

						<!-- Caption video -->
						<div data-cptype="video" id="<?php echo $setCPID; ?>-video" class="cp-type<?php if($cpmodule['cptype'] == 'video'){ echo ' active'; }else{ echo ''; } ?>" style="display:<?php if($cpmodule['cptype'] == 'video'){ echo 'block'; }else{ echo 'none'; } ?>">
							<div class="control-group">
								<label class="control-label">Video code</label>
								<div class="controls video-type-tab">
									<div class="cp-video-type">
										<div class="btn-group mb10 in-tab">
											<a data-tb="common" class="btn btn-small active">Common</a>
											<?php foreach ($languages as $language) { ?>
											<a data-tb="<?php echo $language['language_id']; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language['image']; ?>"></a>
											<?php } ?>
										</div>
										<div class="in-tab-panes">
											<div data-tbpn="common" style="display:;">
												<?php
													$dbKey = isset($cpmodule[$cpvideo_common]) ? $cpmodule[$cpvideo_common] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . ']['.$cpvideo_common.']';
												?>
												<textarea class="cptext-input" placeholder="Insert video embed code" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
											</div>
											<?php foreach ($languages as $language) { ?>
											<div data-tbpn="<?php echo $language['language_id']; ?>" style="display:none;">
												<?php
													$dbKey = isset($cpmodule[$cpvideo_lng][$language['language_id']]) ? $cpmodule[$cpvideo_lng][$language['language_id']] : '';
													$name	= $slides . '[' . $sld . '][captions][' . $cp . ']['.$cpvideo_lng.'][' . $language['language_id'] . ']';
												?>
												<textarea class="cptext-input" placeholder="Insert video embed code" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
											</div>
											<?php } ?>
										</div>
									</div>

								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Video options</label>
								<div class="controls video-options">
									<table class="subfields">
										<tr>
											<td>
												<span class="lbl">Full screen</span>
												<?php 
													$ar 	= $yesNo;
													$id		= 'slide' . $sld . '-cpvideo' . $cp . '-size';
												?>
												<div class="btn-group mb10 v-fl" data-toggle="buttons-radio">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  'no') ? $selected = ' active' : $selected=''; ?>
														<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
															<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'no') { ?>checked="checked"<?php }?>>
															<?php echo $key; ?>
														</label>
													<?php } ?>
												</div>
											</td>
											<td>
												<span class="lbl">Auto play</span>
												<?php 
													$ar 	= $yesNo;
													$id		= 'slide' . $sld . '-cpvideo' . $cp . '-autoplay';
												?>
												<div class="btn-group mb10 v-auto" data-toggle="buttons-radio">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  'no') ? $selected = ' active' : $selected=''; ?>
														<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
															<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'no') { ?>checked="checked"<?php }?>>
															<?php echo $key; ?>
														</label>
													<?php } ?>
												</div>
											</td>
											<td>
												<span class="lbl">Next slide at end</span>
												<?php 
													$ar 	= $yesNo;
													$id		= 'slide' . $sld . '-cpvideo' . $cp . '-nextslide';
												?>
												<div class="btn-group mb10 v-next" data-toggle="buttons-radio">
													<?php foreach ($ar as $key => $value) { ?>
														<?php ($value ==  'no') ? $selected = ' active' : $selected=''; ?>
														<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
															<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'no') { ?>checked="checked"<?php }?>>
															<?php echo $key; ?>
														</label>
													<?php } ?>
												</div>
											</td>
										</tr>
									</table>
									<?php 
										$dbKey = isset($cpmodule['cp_video_options']) ? $cpmodule['cp_video_options'] : '';
										$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_video_options]';
									?>
									<input type="hidden" class="cp-video-options" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
								</div>
							</div>
						</div>
						<!-- Caption video end -->
						
						
						<div class="control-group cp-url" style="display:<?php if($cpmodule['cptype'] == 'video'){ echo 'none'; }else{ echo 'block'; } ?>">
							<label class="control-label">Caption URL</label>
							<div class="controls cp-link">
								<table class="subfields">
									<tr>
										<td>
											<?php 
												//$dbKey = isset($cpmodule['link']) ? $cpmodule['link'] : '';
												//$name	= $slides . '[' . $sld . '][captions][' . $cp . '][link]';
											?>
											<span class="lbl">URL</span>
											<input type="text" class="cp-link-input" placeholder="Enter URL" value="" />
										</td>
										<td>
											<span class="lbl">Open in new tab</span>
											<?php 
												//$dbKey = isset($cpmodule['linkopen']) ? $cpmodule['linkopen'] : 'no';
												$ar 	= $yesNo;
												//$name	= $slides . '[' . $sld . '][captions][' . $cp . '][linkopen]';
												$id		= 'slide' . $sld . '-cp' . $cp . '-linkopen';
											?>
											<div class="btn-group cp-link-open" data-toggle="buttons-radio">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  'no') ? $selected = ' active' : $selected=''; ?>
													<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
														<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'no') { ?>checked="checked"<?php }?>>
														<?php echo $key; ?>
													</label>
												<?php } ?>
											</div>
										</td>
									</tr>
								</table>
								<?php 
									$dbKey = isset($cpmodule['cp_link']) ? $cpmodule['cp_link'] : '' ;
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_link]';
								?>
								<input type="hidden" class="cp-link-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Position</label>
							<div class="controls position-type">
								<?php 
									$dbKey = isset($cpmodule['positiontype']) ? $cpmodule['positiontype'] : 'absolute';
									$ar 	= $posType;
									$id		= 'slide' . $sld . '-position' . $cp . '-types';
								?>
								<div class="btn-group mb10" data-toggle="buttons-radio">
									<?php foreach ($ar as $key => $value) { ?>
										<?php ($value ==  'absolute') ? $selected = ' active' : $selected=''; ?>
										<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn<?php echo $selected; ?>">
											<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value ==  'absolute') { ?>checked="checked"<?php }?>>
											<?php echo $key; ?>
										</label>
									<?php } ?>
								</div>
								<table class="subfields drag-pos-abs active" data-position="absolute" style="display:block;">
									<tr>
										<td>
											<span class="lbl">Data-x</span>
											<input type="text" class="input-mini d-x" placeholder="0" value="" />
										</td>
										<td>
											<span class="lbl">Data-y</span>
											<input type="text" class="input-mini d-y" placeholder="0" value="" />
										</td>
									</tr>
								</table>
								<table class="subfields drag-pos-off" data-position="offset" style="display:none;">
									<tr>
										<td>
											<span class="lbl">Data-x</span>
											<?php 
												$ar 	= $offsetX;
												$id		= 'slide' . $sld . '-position' . $cp . '-offsetx';
											?>
											<div class="btn-group mb10" data-posfor="<?php echo $setCPID; ?>" data-toggle="buttons-radio">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value ==  'center') ? $selected = ' active' : $selected=''; ?>
													<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
														<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value == 'center') { ?>checked="checked"<?php }?>>
														<?php echo $key; ?>
													</label>
												<?php } ?>
											</div>
											<span class="lbl">Horizontal offset</span>
											<input type="text" class="input-small d-x" placeholder="0" value="" />
										</td>
										<td>
											<span class="lbl">Data-y</span>
											<?php 
												$ar 	= $offsetY;
												$id		= 'slide' . $sld . '-position' . $cp . '-offsety';
											?>
											<div class="btn-group mb10" data-posfor="<?php echo $setCPID; ?>" data-toggle="buttons-radio">
												<?php foreach ($ar as $key => $value) { ?>
													<?php ($value == 'center') ? $selected = ' active' : $selected=''; ?>
													<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">
														<input type="radio" id="<?php echo $id . '-' . $value; ?>" value="<?php echo $value; ?>" <?php if ($value == 'center') { ?>checked="checked"<?php }?>>
														<?php echo $key; ?>
													</label>
												<?php } ?>
											</div>
											<span class="lbl">Vertical offset</span>
											<input type="text" class="input-small d-y" placeholder="0" value="" />
										</td>
									</tr>
								</table>
								<?php 
									$dbKey = isset($cpmodule['cp_position']) ? $cpmodule['cp_position'] : '';
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_position]';
								?>
								<input type="hidden" class="cp-ps-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Speed</label>
							<div class="controls cp-speed">
								<table class="subfields">
									<tr>
										<td>
											<span class="lbl">Start</span>
											<input type="text" class="input-small start-speed" placeholder="" value="" />
										</td>
										<td>
											<span class="lbl">End</span>
											<input type="text" class="input-small end-speed" placeholder="" value="" />
										</td>
									</tr>
								</table>
								<?php 
									$dbKey = isset($cpmodule['cp_speed']) ? $cpmodule['cp_speed'] : '';
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_speed]';
								?>
								<input type="hidden" class="cp-speed-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
							</div>
						</div>

						<!-- Caption animation -->
						<div class="cp-animation">
							<div class="control-group">
								<label class="control-label">In - Animation</label>
								<div class="controls">
									<?php $ar 	= $IncomingAnimation; ?>
									<span class='select'>
										<select class="in-ani">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">In - Easing</label>
								<div class="controls">
									<?php $ar 	= $easing; ?>
									<span class='select'>
										<select class="in-es">
											<?php foreach ($ar as $key) { ?>
												<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Out - Animation</label>
								<div class="controls">
									<?php $ar 	= $OutgoingAnimation; ?>
									<span class='select'>
										<select class="out-ani">
											<?php foreach ($ar as $key => $value) { ?>
												<?php ($value ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Out - Easing</label>
								<div class="controls">
									<?php $ar 	= $easing; ?>
									<span class='select'>
										<select class="out-es">
											<?php foreach ($ar as $key) { ?>
												<?php ($key ==  $dbKey) ? $selected = 'selected' : $selected=''; ?>
												<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
											<?php } ?>
										</select>
									</span>
								</div>
							</div>
							<?php 
								$dbKey = isset($cpmodule['cp_animation']) ? $cpmodule['cp_animation'] : $IncomingAnimation["Short from Top"] . "," . $easing[0] . "," . $OutgoingAnimation["Short to Top"] . "," . $easing[0];
								$name	= $slides . '[' . $sld . '][captions][' . $cp . '][cp_animation]';
							?>
							<input type="hidden" class="cp-animation-data" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
						</div>
						<!-- Caption animation end -->

					</div>	
				</div>
				<?php $cp++; } } ?>
			</div>
			<div class="span6">
				<div class="">
					<ul class="caption-list">
						<li data-id="#slide<?php echo $sld; ?>-setting" class="main-slide caption-tab">
							<a class="btn btn-small status disabled" title="On / Off"><i class="icon-eye-open"></i></a>
							<strong class="cp-name">Main slide</strong>
							<a class="btn btn-small add-caption btn-inverse pull-right"><i class="icon-plus icon-white"></i> Add caption</a>
						</li>
						<?php $cp = 0; ?>
						<?php if(isset($slide['captions'])) { ?>
						<?php foreach ($slide['captions'] as $cpmodule) { 
							$setCPID = 's' . $sld . '-c' . $cp;
						?>
						<li class="caption-tab" data-id="#slide<?php echo $sld; ?>-cp<?php echo $cp; ?>" id="<?php echo $cp+1; ?>" data-cplistid="<?php echo $setCPID; ?>">
							<div title="Caption display time line on slide" class='timeline' id="s<?php echo $sld; ?>-cp<?php echo $cp; ?>-timeline"></div>
							<a class="btn btn-small cp-delete" title="Remove"><i class="icon-remove"></i></a>
							<?php 
								$dbKey = isset($cpmodule['status']) ? $cpmodule['status'] : '1';
								$name	= $slides . '[' . $sld . '][captions][' . $cp . '][status]';
							?>
							<a class="btn btn-small cp-status<?php if($dbKey == 0){ echo " disabled"; } ?>">
								<i class="icon-eye-open<?php if($dbKey == 0){ echo " icon-eye-close"; } ?>"></i>
								<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</a>
							<?php 
								$dbKey = isset($cpmodule['name']) ? $cpmodule['name'] : 'Caption item '+$cp+1;
							?>
							<strong class="cp-name"><?php echo $dbKey; ?></strong>
							<div class="pull-right">
								<?php 
									$dbKey = isset($cpmodule['sort_order']) ? $cpmodule['sort_order'] : '';
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][sort_order]';
								?>
								<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" class="cp-sort so">
								<input type="text" title="Caption display start time" class="input-mini cp-start" placeholder="Start time" value="">
								<input type="text" title="Caption display end time" class="input-mini cp-end" placeholder="End time" value="">
								<?php 
									$dbKey = isset($cpmodule['displaytime']) ? $cpmodule['displaytime'] : '';
									$name	= $slides . '[' . $sld . '][captions][' . $cp . '][displaytime]';
								?>
								<input type="hidden" class="cp-display" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								<a class="btn btn-small btn-sort" title="Move top or bottom to set sort order"><i class="icon-resize-vertical"></i></a>
							</div>
						</li>
						<?php $cp++; } } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Side container wrapper end -->
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tab-pane[data-slide-id='buildslides<?php echo $sld; ?>']").slidebuilder();
	});
	function addCaption(sl_id, builder) {
		var ar_cptype 	= {'Text':'text', 'Image':'image', 'Video':'video'};
		var ar_cplng 	= {'Common':'common', 'Multi language':'multi-l'};

		if (parseInt($('.slide-pane.active .caption-list .timeline').attr('data-delay')) >= $('.main-delay input').val()) {
			var setEndTime = parseInt($('.slide-pane.active .caption-list .timeline').attr('data-delay'));
		}else{
			var setEndTime = $('.main-delay input').val();
		};

		var sld = parseInt(sl_id.attr("id").replace("slide",""));
		if (sl_id.find('.slide-config > div:first > .slide-cp-settings').length == 0){
			var cp = parseInt(sl_id.find('.slide-config > div:first > .slide-cp-settings').length);
		}else{
			var cps = sl_id.find('.caption-list > .caption-tab').last().attr('id');
			if (cps) {
				var cp = parseInt(cps-1);
				cp++;
			};
			console.log(cp);
		};
		
		// Caption configure form
		cpform  = '<div class="bx1 slide-cp-settings caption-pane" id="slide' + sld + '-cp' + cp + '" data-cpid="s' + sld + '-c' + cp + '">';
		cpform += '		<input type="hidden" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][slide_id]" value="slide' + sld + '" />';
		cpform += '		<input type="hidden" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_id]" value="s' + sld + '-c'+ cp +'" />';
		
		// Caption type
		cpform += '		<div class="caption-type">';
							<?php $ar 	= $captionType; ?>
							var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cptype]';
							var id 		= 'slide' + sld + '-caption' + cp + '-cptype';
		cpform += '			<div class="btn-group" data-toggle="buttons-radio">';
							<?php foreach ($ar as $key => $value) { ?>
								<?php ($value ==  "text") ? $selected = ' active' : $selected=''; ?>
		cpform += '				<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn-danger btn<?php echo $selected; ?>">';
		cpform += '				<input type="radio" id="' + id + '-<?php echo $value; ?>" name="' + name + '" value="<?php echo $value; ?>" <?php if ($value == "text") { ?>checked="checked"<?php }?>>';
		cpform += '				<?php echo $key; ?></label>';
							<?php } ?>
		cpform += '			</div>';
		cpform += '		</div>';

		// Caption form
		cpform += '		<div class="form-horizontal form-1">';
		
		cpform += '			<div class="control-group cp-nameinput">';
		cpform += '				<label class="control-label">Name</label>';
		cpform += '				<div class="controls">';
		cpform += '				<input type="text" placeholder="Enter name" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][name]" value="Caption item ' + (cp+1) + '" />';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Text options
		cpform += '			<div data-cptype="text" id="s' + sld + '-c' + cp + '-text" class="cp-type active" style="display:block;">';
		cpform += '				<div class="control-group">';
		cpform += '					<label class="control-label">Text</label>';
		cpform += '					<div class="controls text-type-tab">';
		cpform += '						<div class="cp-text-type">';
		cpform += '							<div class="btn-group mb10 in-tab">';
		cpform += '								<a data-tb="common" class="btn btn-small active">Common</a>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<a data-tb="<?php echo $language["language_id"]; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language["image"]; ?>"></a>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '							<div class="in-tab-panes">';
		cpform += '								<div data-tbpn="common" style="display:;">';
													var name = '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][<?php echo $cptext_common; ?>]';
		cpform += '									<textarea class="cptext-input" name="' + name + '"></textarea>';
		cpform += '								</div>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<div data-tbpn="<?php echo $language['language_id']; ?>" style="display:none;">';
													var name = '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][<?php echo $cptext; ?>][<?php echo $language["language_id"]; ?>]';
		cpform += '									<textarea class="cptext-input" name="' + name + '"></textarea>';
		cpform += '								</div>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '						</div>';
		cpform += '					</div>';
		cpform += '				</div>';

		cpform += '				<div class="control-group">';
		cpform += '					<label class="control-label">Apply CSS class</label>';
		cpform += '					<div class="controls css-class">';
									var name = '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cptext_cssclass]';
		cpform += '					<input type="text" class="input-medium" placeholder="Enter CSS class" name="' + name + '" value="" /> &nbsp; or &nbsp; <a class="btn cp-styles">Select style</a>';
		cpform += '					</div>';
		cpform += '				</div>';

		cpform += '			</div>';
							// Caption : Text options end

							// Caption : Image options
		cpform += '			<div data-cptype="image" id="s' + sld + '-c' + cp + '-image" class="cp-type" style="display:none;">';
		cpform += '				<div class="control-group">';
		cpform += '					<label class="control-label">Image</label>';
		cpform += '					<div class="controls img-type-tab">';
		cpform += '						<div class="cp-img-type">';
		cpform += '							<div class="btn-group mb10 in-tab">';
		cpform += '								<a data-tb="common" class="btn btn-small active">Common</a>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<a data-tb="<?php echo $language["language_id"]; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language["image"]; ?>"></a>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '							<div class="in-tab-panes">';
		cpform += '								<div data-tbpn="common" class="img-preview" style="display:;">';
													var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cpimage_common]';
													var id 		= 'slide' + sld + '-cpimg' + cp + '-image-common';
		cpform += '									<div class="img-holder" style="background-image:url(<?php echo $no_img; ?>);" id="' + id + '-preview"></div>';
		cpform += '									<div class="btn-group btn-group-vertical">';
		cpform += '										<a class="btn btn-small" onclick="image_upload(\'' + id + '\', \'' + id +'-preview\');">Browse</a>'
		cpform += '										<a class="btn btn-small" onclick="$(\'#' + id + '-preview\').css({backgroundImage: \'url(<?php echo $no_img; ?>)\'});$(\'#' + id + '\').attr(\'value\', \'\');">Clear</a>';
		cpform += '									</div>';
		cpform += '									<input type="hidden" id="' + id + '" name="' + name + '" value="" />';
		cpform += '								</div>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<div data-tbpn="<?php echo $language["language_id"]; ?>" class="img-preview" style="display:none;">';
													var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cpimage][<?php echo $language["language_id"]; ?>]';
													var id 		= 'slide' + sld + '-cpimg' + cp + '-image<?php echo $language["language_id"]; ?>';
		cpform += '									<div class="img-holder" style="background-image:url(<?php echo $no_img; ?>);" id="' + id + '-preview"></div>';
		cpform += '									<div class="btn-group btn-group-vertical">';
		cpform += '										<a class="btn btn-small" onclick="image_upload(\'' + id + '\', \'' + id +'-preview\');">Browse</a>'
		cpform += '										<a class="btn btn-small" onclick="$(\'#' + id + '-preview\').css({backgroundImage: \'url(<?php echo $no_img; ?>)\'});$(\'#' + id + '\').attr(\'value\', \'\');">Clear</a>';
		cpform += '									</div>';
		cpform += '									<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />';
		cpform += '								</div>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '						</div>';
		cpform += '					</div>';
		cpform += '				</div>';
		cpform += '			</div>';
							// Caption : Image options end

							// Caption : Video options
		cpform += '			<div data-cptype="video" id="s' + sld + '-c' + cp + '-video" class="cp-type" style="display:none;">';
		cpform += '				<div class="control-group">';
		cpform += '					<label class="control-label">Video code</label>';
		cpform += '					<div class="controls video-type-tab">';
		cpform += '						<div class="cp-video-type">';
		cpform += '							<div class="btn-group mb10 in-tab">';
		cpform += '								<a data-tb="common" class="btn btn-small active">Common</a>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<a data-tb="<?php echo $language["language_id"]; ?>" class="btn btn-small"><img src="view/image/flags/<?php echo $language["image"]; ?>"></a>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '							<div class="in-tab-panes">';
		cpform += '								<div data-tbpn="common" style="display:;">';
													var name = '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][<?php echo $cpvideo_common; ?>]';
		cpform += '									<textarea class="cptext-input" placeholder="Insert video embed code" name="' + name + '"></textarea>';
		cpform += '								</div>';
												<?php foreach ($languages as $language) { ?>
		cpform += '								<div data-tbpn="<?php echo $language['language_id']; ?>" style="display:none;">';
													var name = '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][<?php echo $cpvideo_lng; ?>][<?php echo $language["language_id"]; ?>]';
		cpform += '									<textarea class="cptext-input" placeholder="Insert video embed code" name="' + name + '"></textarea>';
		cpform += '								</div>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '						</div>';
		cpform += '					</div>';
		cpform += '				</div>';

		cpform += '				<div class="control-group">';
		cpform += '					<label class="control-label">Video options</label>';
		cpform += '					<div class="controls video-options">';
		cpform += '						<table class="subfields">';
		cpform += '							<tr><td>';
		cpform += '								<span class="lbl">Full screen</span>';
												<?php $ar 	= $yesNo; ?>
												//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cpvideo_size]';
												var id 		= 'slide' + sld + '-cp' + cp + '-size';
		cpform += '								<div class="btn-group v-fl" data-toggle="buttons-radio">';
													<?php foreach ($ar as $key => $value) { ?>
													<?php ($value == 'no') ? $selected = ' active' : $selected=''; ?>
		cpform += '									<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn<?php echo $selected; ?>">';
		cpform += '									<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "no") { ?>checked="checked"<?php }?>>';
		cpform += '									<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '								</div>';
		cpform += '							</td><td>';
		cpform += '								<span class="lbl">Auto play</span>';
												<?php $ar 	= $yesNo; ?>
												//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cpvideo_autoplay]';
												var id 		= 'slide' + sld + '-cp' + cp + '-autoplay';
		cpform += '								<div class="btn-group v-auto" data-toggle="buttons-radio">';
													<?php foreach ($ar as $key => $value) { ?>
													<?php ($value == 'no') ? $selected = ' active' : $selected=''; ?>
		cpform += '									<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn<?php echo $selected; ?>">';
		cpform += '									<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "no") { ?>checked="checked"<?php }?>>';
		cpform += '									<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '								</div>';
		cpform += '							</td><td>';
		cpform += '								<span class="lbl">Next slide at end</span>';
												<?php $ar 	= $yesNo; ?>
												//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cpvideo_nextslide]';
												var id 		= 'slide' + sld + '-cp' + cp + '-nextslide';
		cpform += '								<div class="btn-group v-next" data-toggle="buttons-radio">';
													<?php foreach ($ar as $key => $value) { ?>
													<?php ($value == 'no') ? $selected = ' active' : $selected=''; ?>
		cpform += '									<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn<?php echo $selected; ?>">';
		cpform += '									<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "no") { ?>checked="checked"<?php }?>>';
		cpform += '									<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '								</div>';
		cpform += '							</td></tr>';
		cpform += '						</table>';
										var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_video_options]';
		cpform += '						<input type="hidden" class="cp-video-options" name="' + name + '" value="no,no,no" />';
		cpform += '					</div>';
		cpform += '				</div>';
		cpform += '			</div>';
							// Caption : Video options end

							// Caption : URL
		cpform += '			<div class="control-group cp-url" style="display:block;">';
		cpform += '				<label class="control-label">Caption URL</label>';
		cpform += '				<div class="controls cp-link">';
		cpform += '					<table class="subfields">';
		cpform += '						<tr><td>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][link]';
		cpform += '							<span class="lbl">URL</span>';
		cpform += '							<input type="text" class="cp-link-input" placeholder="Enter URL" value="" />';
		cpform += '						</td><td>';
		cpform += '							<span class="lbl">Open in new tab</span>';
											<?php $ar 	= $yesNo; ?>
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][linkopen]';
											var id 		= 'slide' + sld + '-cp' + cp + '-linkopen';
		cpform += '							<div class="btn-group cp-link-open" data-toggle="buttons-radio">';
												<?php foreach ($ar as $key => $value) { ?>
												<?php ($value == 'no') ? $selected = ' active' : $selected=''; ?>
		cpform += '								<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn<?php echo $selected; ?>">';
		cpform += '								<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "no") { ?>checked="checked"<?php }?>>';
		cpform += '								<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '							</div>';
		cpform += '						</td></tr>';
		cpform += '					</table>';
									var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_link]';
		cpform += '					<input type="hidden" class="cp-link-data" name="' + name + '" value=",no" />';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Position
		cpform += '			<div class="control-group">';
		cpform += '				<label class="control-label">Position</label>';
		cpform += '				<div class="controls position-type">';
									<?php $ar 	= $posType; ?>
									//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][positiontype]';
									var id 		= 'slide' + sld + '-position' + cp + '-types';
		cpform += '					<div class="btn-group mb10" data-toggle="buttons-radio">';
										<?php foreach ($ar as $key => $value) { ?>
										<?php ($value == 'absolute') ? $selected = ' active' : $selected=''; ?>
		cpform += '						<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn<?php echo $selected; ?>">';
		cpform += '						<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "absolute") { ?>checked="checked"<?php }?>>';
		cpform += '						<?php echo $key; ?></label>';
										<?php } ?>
		cpform += '					</div>';
		cpform += '					<table class="subfields drag-pos-abs active" data-position="absolute" style="display:block;">';
		cpform += '						<tr><td>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][absolute][x]';
		cpform += '							<span class="lbl">Data-x</span>';
		cpform += '							<input type="text" class="input-mini d-x" placeholder="0" value="" />';
		cpform += '						</td><td>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][absolute][y]';
		cpform += '							<span class="lbl">Data-y</span>';
		cpform += '							<input type="text" class="input-mini d-y" placeholder="0" value="" />';
		cpform += '						</td></tr>';
		cpform += '					</table>';
		cpform += '					<table class="subfields drag-pos-off" data-position="offset" style="display:none;">';
		cpform += '						<tr><td>';
		cpform += '							<span class="lbl">Data-x</span>';
											<?php $ar 	= $offsetX; ?>
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][offset][x]';
											var id 		= 'slide' + sld + '-position' + cp + '-offsetx';
		cpform += '							<div class="btn-group mb10" data-toggle="buttons-radio">';
												<?php foreach ($ar as $key => $value) { ?>
												<?php ($value == 'center') ? $selected = ' active' : $selected=''; ?>
		cpform += '								<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">';
		cpform += '								<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "center") { ?>checked="checked"<?php }?>>';
		cpform += '								<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '							</div>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][offset][hoffset]';
		cpform += '							<span class="lbl">Horizontal offset</span>';
		cpform += '							<input type="text" class="input-small d-x" placeholder="0" value="0" />';
		cpform += '						</td><td>';
		cpform += '							<span class="lbl">Data-y</span>';
											<?php $ar 	= $offsetY; ?>
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][offset][y]';
											var id 		= 'slide' + sld + '-position' + cp + '-offsety';
		cpform += '							<div class="btn-group mb10" data-toggle="buttons-radio">';
												<?php foreach ($ar as $key => $value) { ?>
												<?php ($value == 'center') ? $selected = ' active' : $selected=''; ?>
		cpform += '								<label for="' + id + '-<?php echo $value; ?>"  type="button" class="btn-mini btn<?php echo $selected; ?>">';
		cpform += '								<input type="radio" id="' + id + '-<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ($value == "center") { ?>checked="checked"<?php }?>>';
		cpform += '								<?php echo $key; ?></label>';
												<?php } ?>
		cpform += '							</div>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][position][offset][voffset]';
		cpform += '							<span class="lbl">Vertical offset</span>';
		cpform += '							<input type="text" class="input-small d-y" placeholder="0" value="0" />';
		cpform += '						</td></tr>';
		cpform += '					</table>';
									var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_position]';
		cpform += '					<input type="hidden" class="cp-ps-data" name="' + name + '" value="absolute,0,0" />';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Speed
		cpform += '			<div class="control-group">';
		cpform += '				<label class="control-label">Speed</label>';
		cpform += '				<div class="controls cp-speed">';
		cpform += '					<table class="subfields">';
		cpform += '						<tr><td>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][speed]';
		cpform += '							<span class="lbl">Start</span>';
		cpform += '							<input type="text" class="input-small start-speed" placeholder="" value="" />';
		cpform += '						</td><td>';
											//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][endspeed]';
		cpform += '							<span class="lbl">End</span>';
		cpform += '							<input type="text" class="input-small end-speed" placeholder="" value="" />';
		cpform += '						</td></tr>';
		cpform += '					</table>';
									var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_speed]';
		cpform += '					<input type="hidden" class="cp-speed-data" name="' + name + '" value="" />';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Animations
		cpform += '			<div class="cp-animation">'
							// Caption : In - Animation 
		cpform += '			<div class="control-group">';
								//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][inanimation]';
		cpform += '				<label class="control-label">In - Animation</label>';
		cpform += '				<div class="controls">';
		cpform += '					<span class="select">';
		cpform += '						<select class="in-ani">';
											<?php foreach ($IncomingAnimation as $key => $value) { ?>
		cpform += '							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>';							
											<?php } ?>
		cpform += '						</select>';
		cpform += '					</span>';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : In - Easing 
		cpform += '			<div class="control-group">';
								//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][ineasing]';
		cpform += '				<label class="control-label">In - Easing</label>';
		cpform += '				<div class="controls">';
		cpform += '					<span class="select">';
		cpform += '						<select class="in-es">';
											<?php foreach ($easing as $key) { ?>
		cpform += '							<option value="<?php echo $key; ?>"><?php echo $key; ?></option>';							
											<?php } ?>
		cpform += '						</select>';
		cpform += '					</span>';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Out - Animation 
		cpform += '			<div class="control-group">';
								//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][outanimation]';
		cpform += '				<label class="control-label">Out - Animation</label>';
		cpform += '				<div class="controls">';
		cpform += '					<span class="select">';
		cpform += '						<select class="out-ani">';
											<?php foreach ($OutgoingAnimation as $key => $value) { ?>
		cpform += '							<option value="<?php echo $value; ?>"><?php echo $key; ?></option>';							
											<?php } ?>
		cpform += '						</select>';
		cpform += '					</span>';
		cpform += '				</div>';
		cpform += '			</div>';

							// Caption : Out - Easing 
		cpform += '			<div class="control-group">';
								//var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][outeasing]';
		cpform += '				<label class="control-label">Out - Easing</label>';
		cpform += '				<div class="controls">';
		cpform += '					<span class="select">';
		cpform += '						<select class="out-es">';
											<?php foreach ($easing as $key) { ?>
		cpform += '							<option value="<?php echo $key; ?>"><?php echo $key; ?></option>';							
											<?php } ?>
		cpform += '						</select>';
		cpform += '					</span>';
		cpform += '				</div>';
		cpform += '			</div>';
							var name 	= '<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][cp_animation]';
		cpform += '			<input type="hidden" class="cp-animation-data" name="' + name + '" value="<?php echo $IncomingAnimation["Short from Top"] . "," . $easing[0] . "," . $OutgoingAnimation["Short to Top"] . "," . $easing[0]; ?>" />';
		cpform += '			</div>';
							// Caption : Animations ends

		cpform += '		</div>';
		// Caption form end
		cpform += '</div>';

		builder.find('.slide-config > div:first').append(cpform);
		//console.log(cpform);
		
		// Caption list tab
		cplist  = '<li class="caption-tab" data-id="#slide' + sld + '-cp' + cp + '" id="' + (cp+1) + '" data-cplistid="s' + sld + '-c' + cp + '">';
		cplist += '		<div data-toggle="tooltip" title="Caption display time line on slide" data-delay="" class="timeline" id="s' + sld + '-cp' + cp + '-timeline"></div>';
		cplist += '		<a class="btn btn-small cp-delete" title="Remove"><i class="icon-remove"></i></a>';
		cplist += '		<a class="btn btn-small cp-status" title="On / Off"><i class="icon-eye-open"></i>';
		cplist += '			<input type="hidden" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][status]" value="' + 1 + '">';
		cplist += '		</a>';
		cplist += '		<strong class="cp-name">Caption item ' + (cp+1) + '</strong>';
		cplist += '		<div class="pull-right">';
		cplist += '			<input type="hidden" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][sort_order]" value="' + (cp+1) + '" class="cp-sort so">';
		cplist += '			<input type="text" title="Caption display start time" class="input-mini cp-start" placeholder="Start time" value="">';
		cplist += '			<input type="text" title="Caption display end time" class="input-mini cp-end" placeholder="End time" value="">';
		cplist += '			<input type="hidden" class="cp-display" placeholder="End time" name="<?php echo $slides; ?>[' + sld + '][captions][' + cp + '][displaytime]" value="#slide' + sld + '-cp' + cp + ',,">';
		cplist += '			<a class="btn btn-small btn-sort" title="Move top or bottom to set sort order"><i class="icon-resize-vertical"></i></a>';
		cplist += '		</div>';
		cplist += '</li>';

		builder.find('.slide-config .caption-list').append(cplist);
		colorSelector();
		//cp++;
	}
	</script>
</div>
<?php //$sld++; } ?>