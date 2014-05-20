<?php
$menuTypes = array(
			"Normal Menu Items"	=> 	"menu_items",
			"Custom Drop Down"	=> 	"dropdown",
			"Category OpenCart"	=> 	"cat_normal",
			"Category Mega"		=> 	"cat_mega",
			"Brands"			=> 	"brands",
			"Products"			=> 	"products",
			"Custom Html"		=> 	"custom_html"
		);
$htmlPos = array('Top' => 'htmlData_top', 'Right' => 'htmlData_right', 'Bottom' => 'htmlData_bottom', 'Left' => 'htmlData_left');

$mainNode = "rgen_menu".$mod_id;
$mod_title = "<span style='margin-right:10px;'>Add new menu item</span>";
?>
<div class="mod-data-wrp" data-node="<?php echo $mainNode; ?>" data-menu="menu_items">
	<div class="common-data">
		<input type="hidden" class="save-url" value="index.php?route=module/rgen_megamenu/save&token=<?php echo $token; ?><?php echo isset($mod_name) ? '&mod_name='.$mod_name : null; ?>">
		<div class="section-title">
			<?php 
				// Module title
				echo $mod_title;
				$name	= $mainNode.'[menu_name]';
			?>
			<input type="text" style="margin-bottom: 0px;" placeholder="Enter module name" name="<?php echo $name; ?>" value="Menu item <?php echo $mod_count; ?>" />
			<?php 
				$dbKey 	= $mainNode;
				$name	= $mainNode.'[mod_id]';
			?>
			<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>" />
			<!-- Add new module -->
			<div class="buttons pull-right" style="margin: -9px -10px 0 0;">
				<a id="saveBtn" class="btn btn-success btn-large">Save</a>
			</div>
		</div>
	</div>
	<h4 class="menu-title">Module settings</h4>
	<div class="form-horizontal">
		<div class="common-data">
			<div class="control-group">
				<label class="control-label">Select menu type</label>
				<div class="controls mod-name">
					<?php 
						$ar 	= $menuTypes;
						$name	= $mainNode.'[menu_type]';
					?>
					<span class='select menuTypes'>
						<select name="<?php echo $name; ?>" data-clone="menuTypes">
							<?php foreach ($ar as $key => $value) { ?>
								<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
					</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status and Sort order</label>
				<div class="controls mod-name">
					<?php 
						$dbKey 	= '0';
						$name	= $mainNode.'[status]';
						$id		= 'menu_status';
					?>
					<span class="switch" style="margin-right:15px;">
						<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
						<label for="<?php echo $id; ?>" class="switch-img"></label>
						<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
					</span>
					<?php 
						$name			= $mainNode.'[sort_order]';
						$placeholder	= 'Sort order';
					?>
					<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Apply CSS class</label>
				<div class="controls mod-name">
					<?php 
						$name		 = $mainNode.'[class]';
						$placeholder = 'Enter CSS class name';
					?>
					<input type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
		</div>


		<!-- Menu items -->
		<div id="menu_items" class="menu-container" style="display:block">
			<div class="control-group">
				<label class="control-label">Menu items</label>
				<div class="controls">
					<table class="table table-bordered tbl-now tbl-vm">
						<thead>
							<tr>
								<th>Menu item name</th>
								<th>URL</th>
								<th class="tc">Open in new window</th>
								<th class="tc"><a class="btn btn-success menuitem-add btn-mini"><i class="icon-plus icon-white"></i></a></th>
							</tr>
						</thead>
						<?php $menuitems = 0; ?>
						<tbody>
							<tr id="menuitem-<?php echo $menuitems; ?>" class="menuitem-data">
								<td>
									<?php foreach ($languages as $language) { ?>
									<?php 
										$name			= $mainNode.'[menuitems]['.$menuitems.'][name]['.$language['language_id'].']';
										$placeholder	= $language['name'] . ' - Enter name';
									?><input data-clone="name<?php echo $language['language_id']; ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
									<?php } ?>
								</td>
								<td>
									<?php 
										$name			= $mainNode.'[menuitems]['.$menuitems.'][url]';
										$placeholder	= 'URL';
									?>
									<input data-clone="url" type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value="">
								</td>
								<td class="tc">
									<?php 
										$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
										$dbKey 	= 'n';
										$name	= $mainNode.'[menuitems]['.$menuitems.'][open]';
										$id		= 'menuitem_open';
									?>
									<div class="btn-group mr10" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-small btn<?php echo $selected; ?>">
												<input data-clone="open" type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>
								</td>
								<td class="tc">
									<a class="btn btn-danger menuitem-remove btn-mini"><i class="icon-remove icon-white"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Custom drop down -->
		<div id="dropdown" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[dropdown][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input data-clone="name<?php echo $language['language_id']; ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[dropdown][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[dropdown][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[dropdown][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Display Options</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Menu type</span>
								<?php 
									$ar 	= array('Standard' => 'normal', 'Mega menu' => 'mega');
									$dbKey 	= 'normal';
									$name	= $mainNode.'[dropdown][type]';
									$id		= 'mega_cat_type';
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
							<td>
								<span class="lbl">Max sub links</span>
								<?php 
									$name			= $mainNode.'[dropdown][maxsub]';
									$placeholder	= '5';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Columns</span>
								<?php 
									$name			= $mainNode.'[dropdown][columns]';
									$placeholder	= '4';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Drop down</label>
				<div class="controls">
					<table class="table table-bordered tbl-now tbl-vm">
						<thead>
							<tr>
								<th>Name</th>
								<th>URL</th>
								<th class="tc">Open in new window</th>
								<th class="tc" style="width:30px;"></th>
								<th class="tc" style="width:30px;"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php foreach ($languages as $language) { ?>
									<?php 
										$name			= $mainNode.'[dropdown][name]['.$language['language_id'].']';
										$placeholder	= $language['name'] . ' - Enter name';
									?><input data-clone="name<?php echo $language['language_id']; ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
									<?php } ?>
								</td>
								<td>
									<?php 
										$name			= $mainNode.'[dropdown][url]';
										$placeholder	= 'URL';
									?>
									<input data-clone="url" type="text" class="mr10" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
								</td>
								<td class="tc">
									<?php 
										$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
										$dbKey 	= 'n';
										$name	= $mainNode.'[dropdown][open]';
										$id		= 'dd_main_open';
									?>
									<div class="btn-group mr10" data-toggle="buttons-radio">
										<?php foreach ($ar as $key => $value) { ?>
											<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
											<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-small btn<?php echo $selected; ?>">
												<input data-clone="open" type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
												<?php echo $key; ?>
											</label>
										<?php } ?>
									</div>
								</td>
								<td class="tc"><a class="btn btn-inverse submenu-add btn-mini"><i class="icon-plus icon-white"></i></a></td>
								<td class="tc"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Left and Right custom HTML content width
				</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Left width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[dropdown][l_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
							<td>
								<span class="lbl">Right width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[dropdown][r_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
						<ul class="nav nav-tabs" id="dropdown-tab">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#dropdown-<?php echo $language['language_id']; ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane customhtml-tb" id="dropdown-<?php echo $language['language_id']; ?>">
								<div class="btn-group mb10">
									<?php foreach ($htmlPos as $key => $value) { ?>
									<a data-tb="dropdown-tab-<?php echo $value.$language['language_id']; ?>" class="btn"><?php echo $key; ?></a>
									<?php } ?>
								</div>
								<?php foreach ($htmlPos as $key => $value) { ?>
								<div id="dropdown-tab-<?php echo $value.$language['language_id'] ?>" class="html-pane" style="display:none;">
									<textarea name="<?php echo $mainNode; ?>[dropdown][<?php echo $value; ?>][<?php echo $language['language_id']; ?>]" id="<?php echo 'dropdown-'.$value.$language['language_id']; ?>-data"></textarea>
									<script type="text/javascript">
									CKEDITOR.replace("<?php echo 'dropdown-'.$value.$language['language_id']; ?>-data", {
										filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										height: '400px'
									});
									</script>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$(window).off( "click", "#dropdown-tab a");
							$(window).on("click","#dropdown-tab a",function(e){
								e.preventDefault();
								$(this).tab('show');
								$("#dropdown .customhtml-tb.active .btn-group a:first-child").click();
							});
							$('#dropdown #dropdown-tab li:first').addClass('active');
							$('#dropdown .tab-content .tab-pane:first').addClass('active');

							$(window).off( "click", "#dropdown .customhtml-tb .btn-group a");
							$(window).on("click","#dropdown .customhtml-tb .btn-group a",function(e){
								$("#dropdown .html-pane").hide();
								$("#dropdown .btn-group a").removeClass('active');
								$(this).addClass('active');
								$('#'+$(this).attr('data-tb')).show();
							});
							$("#dropdown .customhtml-tb.active .btn-group a:first-child").click();
						});
						</script>
					</div>
				</div>
			</div>

		</div>

		<!-- Category normal menu -->
		<div id="cat_normal" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[cat_normal][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[cat_normal][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[cat_normal][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[cat_normal][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Display sub category images</label>
				<div class="controls mod-name">
					<?php 
						$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
						$dbKey 	= 'n';
						$name	= $mainNode.'[cat_normal][cat_img]';
						$id		= 'normal_cat_img';
					?>
					<div class="btn-group mr10" data-toggle="buttons-radio">
						<?php foreach ($ar as $key => $value) { ?>
							<?php ($value ==  $dbKey) ? $selected = ' active' : $selected=''; ?>
							<label for="<?php echo $id . '-' . $value; ?>"  type="button" class="btn-small btn<?php echo $selected; ?>">
								<input data-clone="open" type="radio" id="<?php echo $id . '-' . $value; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php if ($dbKey == $value) { ?>checked="checked"<?php }?>>
								<?php echo $key; ?>
							</label>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu type</label>
				<div class="controls">
					<?php 
						$ar 	= array('Standard' => 'normal', 'Mega menu' => 'mega');
						$dbKey 	= 'mega';
						$name	= $mainNode.'[cat_normal][type]';
						$id		= 'catnormal_menu_type';
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
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Select categories</label>
				<div class="controls">
					<!-- Category selection -->
					<div class="cat-selection">
						<div class="selected-cat" id="cat_normal-auto" style="display:block; margin: 0px;">
							<input type="text" placeholder="Type category name to insert" class="find-cat" value="" /><br>
							<div class="select_scrollbox scrollbox cat-sel"></div>
						</div>
					</div>
					<script type="text/javascript">
					// Category
					function catNormalAuto() {
						$('#cat_normal-auto .find-cat').autocomplete({
							delay: 400,
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
								$(catBox + ui.item.value).remove();
								$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="<?php echo $mainNode; ?>[cat_normal][cat_id][]" value="' + ui.item.value + '" /></div>');
								return false;
							},
							focus: function(event, ui) {
							  return false;
						   }
						});
						$(window).on('click', '#cat_normal-auto .cat-sel div img', function() {
							$(this).parent().remove();
						});
					}
					catNormalAuto();
					</script>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Left and Right custom HTML content width
				</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Left width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[cat_normal][l_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
							<td>
								<span class="lbl">Right width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[cat_normal][r_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
						<ul class="nav nav-tabs" id="cat_normal-tab">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#cat_normal-<?php echo $language['language_id']; ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane customhtml-tb" id="cat_normal-<?php echo $language['language_id']; ?>">
								<div class="btn-group mb10">
									<?php foreach ($htmlPos as $key => $value) { ?>
									<a data-tb="cat_normal-tab-<?php echo $value.$language['language_id']; ?>" class="btn"><?php echo $key; ?></a>
									<?php } ?>
								</div>
								<?php foreach ($htmlPos as $key => $value) { ?>
								<div id="cat_normal-tab-<?php echo $value.$language['language_id'] ?>" class="html-pane" style="display:none;">
									<textarea name="<?php echo $mainNode; ?>[cat_normal][<?php echo $value; ?>][<?php echo $language['language_id']; ?>]" id="<?php echo 'cat_normal-'.$value.$language['language_id']; ?>-data"></textarea>
									<script type="text/javascript">
									CKEDITOR.replace("<?php echo 'cat_normal-'.$value.$language['language_id']; ?>-data", {
										filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										height: '400px'
									});
									</script>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$(window).off( "click", "#cat_normal-tab a");
							$(window).on("click","#cat_normal-tab a",function(e){
								e.preventDefault();
								$(this).tab('show');
								$("#cat_normal .customhtml-tb.active .btn-group a:first-child").click();
							});
							$('#cat_normal #cat_normal-tab li:first').addClass('active');
							$('#cat_normal .tab-content .tab-pane:first').addClass('active');

							$(window).off( "click", "#cat_normal .customhtml-tb .btn-group a");
							$(window).on("click","#cat_normal .customhtml-tb .btn-group a",function(e){
								$("#cat_normal .html-pane").hide();
								$("#cat_normal .btn-group a").removeClass('active');
								$(this).addClass('active');
								$('#'+$(this).attr('data-tb')).show();
							});
							$("#cat_normal .customhtml-tb.active .btn-group a:first-child").click();
						});

						</script>
					</div>
				</div>
			</div>
		</div>

		<!-- Category mega menu -->
		<div id="cat_mega" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu name</label>
				<div class="controls mod-name">
					<?php foreach ($languages as $language) { ?>
					<?php 
						$name			= $mainNode.'[cat_mega][name]['.$language['language_id'].']';
						$placeholder	= $language['name'] . ' - Enter name';
					?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
					<?php } ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu URL</label>
				<div class="controls mod-name">
					<?php 
						$name			= $mainNode.'[cat_mega][url]';
						$placeholder	= 'URL';
					?>
					<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[cat_mega][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[cat_mega][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[cat_mega][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[cat_mega][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Display Options</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Category images</span>
								<?php 
									$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
									$dbKey 	= 'n';
									$name	= $mainNode.'[cat_mega][cat_img]';
									$id		= 'mega_cat_img';
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
							<td>
								<span class="lbl">Menu type</span>
								<?php 
									$ar 	= array('Standard' => 'normal', 'Mega menu' => 'mega');
									$dbKey 	= 'mega';
									$name	= $mainNode.'[cat_mega][type]';
									$id		= 'mega_cat_type';
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
							<td>
								<span class="lbl">Max sub links</span>
								<?php 
									$name			= $mainNode.'[cat_mega][maxsub]';
									$placeholder	= '5';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Columns</span>
								<?php 
									$name			= $mainNode.'[cat_mega][columns]';
									$placeholder	= '4';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Select categories</label>
				<div class="controls">
					<!-- Category selection -->
					<div class="cat-selection">
						<div class="selected-cat" id="cat_mega-auto" style="display:block; margin: 0px;">
							<input type="text" placeholder="Type category name to insert" class="find-cat" value="" /><br>
							<div class="select_scrollbox scrollbox cat-sel"></div>
						</div>
					</div>
					<script type="text/javascript">
					// Category
					function catMegaAuto() {
						$('#cat_mega-auto .find-cat').autocomplete({
							delay: 400,
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
								$(catBox + ui.item.value).remove();
								$(catBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="<?php echo $mainNode; ?>[cat_mega][cat_id][]" value="' + ui.item.value + '" /></div>');
								return false;
							},
							focus: function(event, ui) {
							  return false;
						   }
						});
						$(window).on('click', '#cat_mega-auto .cat-sel div img', function() {
							$(this).parent().remove();
						});
					}
					catMegaAuto();
					</script>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Left and Right custom HTML content width
				</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Left width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[cat_mega][l_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
							<td>
								<span class="lbl">Right width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[cat_mega][r_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
						<ul class="nav nav-tabs" id="cat_mega-tab">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#cat_mega-<?php echo $language['language_id']; ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane customhtml-tb" id="cat_mega-<?php echo $language['language_id']; ?>">
								<div class="btn-group mb10">
									<?php foreach ($htmlPos as $key => $value) { ?>
									<a data-tb="cat_mega-tab-<?php echo $value.$language['language_id']; ?>" class="btn"><?php echo $key; ?></a>
									<?php } ?>
								</div>
								<?php foreach ($htmlPos as $key => $value) { ?>
								<div id="cat_mega-tab-<?php echo $value.$language['language_id'] ?>" class="html-pane" style="display:none;">
									<textarea name="<?php echo $mainNode; ?>[cat_mega][<?php echo $value; ?>][<?php echo $language['language_id']; ?>]" id="<?php echo 'cat_mega-'.$value.$language['language_id']; ?>-data"></textarea>
									<script type="text/javascript">
									CKEDITOR.replace("<?php echo 'cat_mega-'.$value.$language['language_id']; ?>-data", {
										filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										height: '400px'
									});
									</script>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$(window).off( "click", "#cat_mega-tab a");
							$(window).on("click","#cat_mega-tab a",function(e){
								e.preventDefault();
								$(this).tab('show');
								$("#cat_mega .customhtml-tb.active .btn-group a:first-child").click();
							});
							$('#cat_mega #cat_mega-tab li:first').addClass('active');
							$('#cat_mega .tab-content .tab-pane:first').addClass('active');

							$(window).off( "click", "#cat_mega .customhtml-tb .btn-group a");
							$(window).on("click","#cat_mega .customhtml-tb .btn-group a",function(e){
								$("#cat_mega .html-pane").hide();
								$("#cat_mega .btn-group a").removeClass('active');
								$(this).addClass('active');
								$('#'+$(this).attr('data-tb')).show();
							});
							$("#cat_mega .customhtml-tb.active .btn-group a:first-child").click();
						});
						</script>
					</div>
				</div>
			</div>
		</div>

		<!-- Brands -->
		<div id="brands" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu name</label>
				<div class="controls mod-name">
					<?php foreach ($languages as $language) { ?>
					<?php 
						$name			= $mainNode.'[brands][name]['.$language['language_id'].']';
						$placeholder	= $language['name'] . ' - Enter name';
					?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
					<?php } ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu URL</label>
				<div class="controls mod-name">
					<?php 
						$name			= $mainNode.'[brands][url]';
						$placeholder	= 'URL';
					?>
					<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[brands][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input data-clone="name" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[brands][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[brands][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[brands][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Display Options</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Brand images</span>
								<?php 
									$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
									$dbKey 	= 'n';
									$name	= $mainNode.'[brands][brand_img]';
									$id		= 'brand_img';
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
							<td>
								<span class="lbl">Menu type</span>
								<?php 
									$ar 	= array('Standard' => 'normal', 'Mega menu' => 'mega');
									$dbKey 	= 'mega';
									$name	= $mainNode.'[brands][type]';
									$id		= 'brand_type';
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
							<td>
								<span class="lbl">Columns</span>
								<?php 
									$name			= $mainNode.'[brands][columns]';
									$placeholder	= '4';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Select Brands</label>
				<div class="controls">
					<!-- Manufacturer selection -->
					<div class="brand-selection">
						<div class="selected-brand" id="brands-auto" style="display:block; margin: 0px;">
							<input type="text" placeholder="Type manufacturer name to insert" class="find-brand" value="" /><br>
							<div class="select_scrollbox scrollbox brand-sel"></div>
						</div>
					</div>

					<script type="text/javascript">
					// Manufacturer
					function brandAutocomplete() {
						$('#brands-auto .find-brand').autocomplete({
							delay: 400,
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
								$(brdBox + ui.item.value).remove();
								$(brdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="<?php echo $mainNode; ?>[brands][brand_id][]" value="' + ui.item.value + '" /></div>');
								return false;
							},
							focus: function(event, ui) {
							  return false;
						   }
						});
						$(window).on('click', '#brands-auto .brand-sel div img', function() {
							$(this).parent().remove();
						});
					}
					brandAutocomplete();
					</script>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Left and Right custom HTML content width
				</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Left width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[brands][l_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
							<td>
								<span class="lbl">Right width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[brands][r_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
						<ul class="nav nav-tabs" id="brands-tab">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#brands-<?php echo $language['language_id']; ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane customhtml-tb" id="brands-<?php echo $language['language_id']; ?>">
								<div class="btn-group mb10">
									<?php foreach ($htmlPos as $key => $value) { ?>
									<a data-tb="brands-tab-<?php echo $value.$language['language_id']; ?>" class="btn"><?php echo $key; ?></a>
									<?php } ?>
								</div>
								<?php foreach ($htmlPos as $key => $value) { ?>
								<div id="brands-tab-<?php echo $value.$language['language_id'] ?>" class="html-pane" style="display:none;">
									<textarea name="<?php echo $mainNode; ?>[brands][<?php echo $value; ?>][<?php echo $language['language_id']; ?>]" id="<?php echo 'brands-'.$value.$language['language_id']; ?>-data"></textarea>
									<script type="text/javascript">
									CKEDITOR.replace("<?php echo 'brands-'.$value.$language['language_id']; ?>-data", {
										filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
										height: '400px'
									});
									</script>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$(window).off( "click", "#brands-tab a");
							$(window).on("click","#brands-tab a",function(e){
								e.preventDefault();
								$(this).tab('show');
								$("#brands .customhtml-tb.active .btn-group a:first-child").click();
							});
							$('#brands #brands-tab li:first').addClass('active');
							$('#brands .tab-content .tab-pane:first').addClass('active');

							$(window).off( "click", "#brands .customhtml-tb .btn-group a");
							$(window).on("click","#brands .customhtml-tb .btn-group a",function(e){
								$("#brands .html-pane").hide();
								$("#brands .btn-group a").removeClass('active');
								$(this).addClass('active');
								$('#'+$(this).attr('data-tb')).show();
							});
							$("#brands .customhtml-tb.active .btn-group a:first-child").click();
						});
						</script>
					</div>
				</div>
			</div>
		</div>

		<!-- Products -->
		<div id="products" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu name</label>
				<div class="controls mod-name">
					<?php foreach ($languages as $language) { ?>
					<?php 
						$name			= $mainNode.'[products][name]['.$language['language_id'].']';
						$placeholder	= $language['name'] . ' - Enter name';
					?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
					<?php } ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu URL</label>
				<div class="controls mod-name">
					<?php 
						$name			= $mainNode.'[products][url]';
						$placeholder	= 'URL';
					?>
					<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[products][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input data-clone="name" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[products][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[products][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[products][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Display Options</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Product images</span>
								<?php 
									$ar 	= array( 'Yes' => 'y', 'No' => 'n'); 
									$dbKey 	= 'n';
									$name	= $mainNode.'[products][prd_img]';
									$id		= 'prd_img';
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
							<td>
								<span class="lbl">Menu type</span>
								<?php 
									$ar 	= array('Standard' => 'normal', 'Mega menu' => 'mega');
									$dbKey 	= 'mega';
									$name	= $mainNode.'[products][type]';
									$id		= 'products_type';
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
							<td>
								<span class="lbl">Columns</span>
								<?php 
									$name			= $mainNode.'[products][columns]';
									$placeholder	= '4';
								?>
								<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Select products</label>
				<div class="controls">
					<!-- Product selection -->
					<div class="prd-selection">
						<div class="selected-prd" id="products-auto" style="display:block; margin: 0px;">
							<input type="text" placeholder="Type product name to insert" class="find-prd" value="" /><br>
							<div class="select_scrollbox scrollbox prd-sel"></div>
						</div>
					</div>

					<script type="text/javascript">
					// Product
					function prdAutocomplete() {
						$('#products-auto .find-prd').autocomplete({
							delay: 400,
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
								$(prdBox + ui.item.value).remove();
								$(prdBox).append('<div>' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="<?php echo $mainNode; ?>[products][prd_id][]" value="' + ui.item.value + '" /></div>');
								
								return false;
							},
							focus: function(event, ui) {
								return false;
							}
						});
						$(window).on('click', '#products-auto .prd-sel div img', function() {
							$(this).parent().remove();
						});
					}
					prdAutocomplete();
					</script>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Left and Right custom HTML content width
				</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Left width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[products][l_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
							<td>
								<span class="lbl">Right width</span>
								<?php 
									$dbKey 	= '160';
									$name	= $mainNode.'[products][r_width]';
								?>
								<input class="input-small" type="text" placeholder="160" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
					<ul class="nav nav-tabs" id="products-tab">
						<?php foreach ($languages as $language) { ?>
						<li>
							<a href="#products-<?php echo $language['language_id']; ?>">
							<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
							</a>
						</li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php foreach ($languages as $language) { ?>
						<div class="tab-pane customhtml-tb" id="products-<?php echo $language['language_id']; ?>">
							<div class="btn-group mb10">
								<?php foreach ($htmlPos as $key => $value) { ?>
								<a data-tb="products-tab-<?php echo $value.$language['language_id']; ?>" class="btn"><?php echo $key; ?></a>
								<?php } ?>
							</div>
							<?php foreach ($htmlPos as $key => $value) { ?>
							<div id="products-tab-<?php echo $value.$language['language_id'] ?>" class="html-pane" style="display:none;">
								<textarea name="<?php echo $mainNode; ?>[products][<?php echo $value; ?>][<?php echo $language['language_id']; ?>]" id="<?php echo 'products-'.$value.$language['language_id']; ?>-data"></textarea>
								<script type="text/javascript">
								CKEDITOR.replace("<?php echo 'products-'.$value.$language['language_id']; ?>-data", {
									filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
									height: '400px'
								});
								</script>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
					<script type="text/javascript">
					$(document).ready(function(){
						$(window).off( "click", "#products-tab a");
						$(window).on("click","#products-tab a",function(e){
							e.preventDefault();
							$(this).tab('show');
							$("#products .customhtml-tb.active .btn-group a:first-child").click();
						});
						$('#products #products-tab li:first').addClass('active');
						$('#products .tab-content .tab-pane:first').addClass('active');

						$(window).off( "click", "#products .customhtml-tb .btn-group a");
						$(window).on("click","#products .customhtml-tb .btn-group a",function(e){
							$("#products .html-pane").hide();
							$("#products .btn-group a").removeClass('active');
							$(this).addClass('active');
							$('#'+$(this).attr('data-tb')).show();
						});
						$("#products .customhtml-tb.active .btn-group a:first-child").click();
					});
					</script>
					</div>
				</div>
			</div>

		</div>

		<!-- Custom html -->
		<div id="custom_html" class="menu-container">
			<div class="control-group">
				<label class="control-label">Menu name</label>
				<div class="controls mod-name">
					<?php foreach ($languages as $language) { ?>
					<?php 
						$name			= $mainNode.'[custom_html][name]['.$language['language_id'].']';
						$placeholder	= $language['name'] . ' - Enter name';
					?><input type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
					<?php } ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu URL</label>
				<div class="controls mod-name">
					<?php 
						$name			= $mainNode.'[custom_html][url]';
						$placeholder	= 'URL';
					?>
					<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu label</label>
				<div class="controls mod-name">
					<table class="subfields withbdr">
						<tr>
							<td>
								<span class="lbl">Label text</span>
								<?php foreach ($languages as $language) { ?>
								<?php 
									$name			= $mainNode.'[custom_html][lbl_text]['.$language['language_id'].']';
									$placeholder	= $language['name'] . ' - Enter text';
								?><input data-clone="name" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" value=""><br>
								<?php } ?>
							</td>
							<td>
								<span class="lbl">Label top position</span>
								<?php 
									$name			= $mainNode.'[custom_html][lbl_top]';
									$placeholder	= 'Top position';
								?>
								<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Background color</span>
								<?php 
									$name			= $mainNode.'[custom_html][lbl_bg]';
									$placeholder	= '#000000';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
							<td>
								<span class="lbl">Text color</span>
								<?php 
									$name			= $mainNode.'[custom_html][lbl_txtcolor]';
									$placeholder	= '#ffffff';
								?>
								<input type="text" class="hex" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Custom HTML menu width
				</label>
				<div class="controls mod-name">
					<?php 
						$dbKey 	= '600';
						$name	= $mainNode.'[custom_html][width]';
					?>
					<input class="input-small" type="text" placeholder="600" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Custom HTML</label>
				<div class="controls mod-name">
					<div style="float:left; width:100%;">
						<ul class="nav nav-tabs" id="custom_html-tab">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#custom_html-<?php echo $language['language_id']; ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane" id="custom_html-<?php echo $language['language_id']; ?>">
								<textarea name="<?php echo $mainNode; ?>[custom_html][htmlData][<?php echo $language['language_id']; ?>]" id="custom_htmlData-<?php echo $language['language_id']; ?>"></textarea>
								<script type="text/javascript">
								CKEDITOR.replace('custom_htmlData-<?php echo $language['language_id']; ?>', {
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
						<script type="text/javascript">
						$(document).ready(function(){
							$(window).off( "click", "#custom_html-tab a");
							$(window).on("click","#custom_html-tab a",function(e){
								e.preventDefault();
								$(this).tab('show');
							});
							$('#custom_html #custom_html-tab li:first').addClass('active');
							$('#custom_html .tab-content .tab-pane:first').addClass('active');
						});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



