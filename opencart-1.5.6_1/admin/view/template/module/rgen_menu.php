<h4>Menu options</h4>
<div class="form-horizontal">

	<div class="control-group">
		<label class="control-label">Menu sort order</label>
		<div class="controls menu-sort">
			<div class="input-prepend">
				<span class="add-on">Category</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][0]['sort_order']) ? $RGenData['RGen_menu_sort'][0]['sort_order'] : 0;
					$name			= 'RGenData_mod[RGen_menu_sort][0][sort_order]';
					$id				= 'RGen_menu_sort0';
					$placeholder	= '0';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div>
			<div class="input-prepend">
				<span class="add-on">Information</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][1]['sort_order']) ? $RGenData['RGen_menu_sort'][1]['sort_order'] : 1;
					$name			= 'RGenData_mod[RGen_menu_sort][1][sort_order]';
					$id				= 'RGen_menu_sort1';
					$placeholder	= '1';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div>
			<div class="input-prepend">
				<span class="add-on">My account</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][2]['sort_order']) ? $RGenData['RGen_menu_sort'][2]['sort_order'] : 2;
					$name			= 'RGenData_mod[RGen_menu_sort][2][sort_order]';
					$id				= 'RGen_menu_sort2';
					$placeholder	= '2';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div><br>
			<div class="input-prepend">
				<span class="add-on">Custom dropdown</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][3]['sort_order']) ? $RGenData['RGen_menu_sort'][3]['sort_order'] : 3;
					$name			= 'RGenData_mod[RGen_menu_sort][3][sort_order]';
					$id				= 'RGen_menu_sort3';
					$placeholder	= '3';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div>
			<div class="input-prepend">
				<span class="add-on">Custom links</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][4]['sort_order']) ? $RGenData['RGen_menu_sort'][4]['sort_order'] : 4;
					$name			= 'RGenData_mod[RGen_menu_sort][4][sort_order]';
					$id				= 'RGen_menu_sort4';
					$placeholder	= '4';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div>
			<div class="input-prepend">
				<span class="add-on">Custom html</span>
				<?php 
					$dbKey 			= isset($RGenData['RGen_menu_sort'][5]['sort_order']) ? $RGenData['RGen_menu_sort'][5]['sort_order'] : 5;
					$name			= 'RGenData_mod[RGen_menu_sort][5][sort_order]';
					$id				= 'RGen_menu_sort5';
					$placeholder	= '5';
				?>
				<input type="text" class="span1" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Space between menu items</label>
		<div class="controls">
			<?php 
				$dbKey 			= $RGen_MenuItemSpace;
				$name			= 'RGen_MenuItemSpace';
				$id				= 'RGen_MenuItemSpace';
				$placeholder	= '20';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<span class="help-block">Enter integer value in text box to reduce space between menu items</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">OpenCart default category menu</label>
		<div class="controls">
			<?php 
			$dbKey 	= isset($RGen_occat_status) ? $RGen_occat_status : "1";
			$name	= 'RGen_occat_status';
			$id		= 'RGen_occat';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Information menu</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_informationMenu_status;
			$name	= 'RGen_informationMenu_status';
			$id		= 'RGen_informationMenu';
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
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">My account menu</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_myac_status;
			$name	= 'RGen_myac_status';
			$id		= 'RGen_myac';
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
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Multilevel menu</label>
		<div class="controls">
			<?php 
			$dbKey 	= $RGen_multiLevelMenu_status;
			$name	= 'RGen_multiLevelMenu_status';
			$id		= 'RGen_multiLevelMenu';
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
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">HTML menu display in mobile</label>
		<div class="controls">
			<?php 
			$dbKey 	= isset($RGen_htmlMenuDisplay) ? $RGen_htmlMenuDisplay : "";
			$name	= 'RGen_htmlMenuDisplay';
			$id		= 'RGen_htmlMenuDisplay';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>
</div>

<h4>Custom menu options</h4>
<div class="form-horizontal" id='customMenu'>
	<div class="tabs-left tabbable" data-theme="tab2">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#RGen-ddMenu">Custom dropdown menu</a>
				<?php 
					$dbKey 	= $RGen_customMenu_status;
					$name	= 'RGen_customMenu_status';
					$id		= 'RGen_customMenu_status';
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
				<a href="#RGen-MenuLinks">Custom menu links</a>
				<?php 
					$dbKey 	= $RGen_menu_item_status;
					$name	= 'RGen_menu_item_status';
					$id		= 'RGen_menu_item_status';
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
				<a href="#RGen-htmlMenu">Custom HTML menu</a>
				<?php 
					$dbKey 	= $RGen_menuhtml_status;
					$name	= 'RGen_menuhtml_status';
					$id		= 'RGen_menuhtml_status';
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
			<div id="RGen-ddMenu" class="tab-pane active">
				<ul class="nav nav-tabs" id="RGen-ddMenu-tab">
					<li class="active"><a href="#menu-dd-static">Static (Not multi language)</a></li>
					<?php foreach ($languages as $language) { ?>
					<li>
						<a href="#menu-dd-<?php echo $language['language_id']; ?>">
						<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
						</a>
					</li>
					<?php } ?>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="menu-dd-static">
						<table class="table table-hover">
							<tr class="success">
								<td>
									<?php 
										$dbKey 			= $RGen_menu1_item;
										$name			= 'RGen_menu1_item';
										$id				= 'RGen_menu1_item';
										$placeholder	= 'Menu Name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									<?php 
										$dbKey 			= $RGen_menu1_item_url;
										$name			= 'RGen_menu1_item_url';
										$id				= 'RGen_menu1_item_url';
										$placeholder	= 'Menu URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								</td>
							</tr>
							<?php for($i=1; $i<=10; $i++){ ?>
							<tr>
								<td>
									<?php 
										$dbKey 			= ${'RGen_subMenu1_item'. $i};
										$name			= 'RGen_subMenu1_item' . $i;
										$id				= 'RGen_subMenu1_item' . $i;
										$placeholder	= 'Sub name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
									<?php 
										$dbKey 			= ${'RGen_subMenu1_item_url'. $i};
										$name			= 'RGen_subMenu1_item_url' . $i;
										$id				= 'RGen_subMenu1_item_url' . $i;
										$placeholder	= 'Sub URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php $j=0; foreach ($languages as $language) { ?>
					<div class="tab-pane" id="menu-dd-<?php echo $language['language_id']; ?>">
						<table class="table table-hover">
							<tr class="success">
								<td>
									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['name']) ? $RGen[$language['language_id']]['Menu'][$j]['name'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][name]';
										$id				= 'ddMenu-' . $language['language_id'] . '-name';
										$placeholder	= 'Menu Name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['url']) ? $RGen[$language['language_id']]['Menu'][$j]['url'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][url]';
										$id				= 'ddMenu-' . $language['language_id'] . '-url';
										$placeholder	= 'Menu URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								</td>
							</tr>
							<?php for($i=0; $i<=10; $i++){ ?>
							<tr>
								<td>
									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['ddMenuItems'][$i]['name']) ? $RGen[$language['language_id']]['Menu'][$j]['ddMenuItems'][$i]['name'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][ddMenuItems][' . $i . '][name]';
										$id				= 'ddMenuItems-' . $i . '-name';
										$placeholder	= 'Sub name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['ddMenuItems'][$i]['url']) ? $RGen[$language['language_id']]['Menu'][$j]['ddMenuItems'][$i]['url'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][ddMenuItems][' . $i . '][url]';
										$id				= 'ddMenuItems-' . $i . '-url';
										$placeholder	= 'Sub URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php } ?>
				</div>

			</div>
			<div id="RGen-MenuLinks" class="tab-pane">
				
				<ul class="nav nav-tabs" id="customMenuItems">
					<li class="active"><a href="#menu-item-static">Static (Not multi language)</a></li>
					<?php foreach ($languages as $language) { ?>
					<li>
						<a href="#menu-item-<?php echo $language['language_id']; ?>">
						<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="menu-item-static">
						<table class="table table-hover">
							<?php for($i=1; $i<=5; $i++){ ?>
							<tr>
								<td>
									<?php 
										$dbKey 			= ${'RGen_menu_item'. $i};
										$name			= 'RGen_menu_item' . $i;
										$id				= 'RGen_menu_item' . $i;
										$placeholder	= 'Link-' . $i . ' name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

									<?php 
										$dbKey 			= ${'RGen_menu_item'. $i . '_url'};
										$name			= 'RGen_menu_item' . $i . '_url';
										$id				= 'RGen_menu_item' . $i . '_url';
										$placeholder	= 'Link-' . $i . ' URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

								</td>
							</tr>
							<?php } ?>
						</table>
					</div>

					<?php $j=1; foreach ($languages as $language) { ?>
					<div class="tab-pane" id="menu-item-<?php echo $language['language_id']; ?>">
						<table class="table table-hover">
							<?php for($i=0; $i<=6; $i++){ ?>
							<tr>
								<td>
									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['name']) ? $RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['name'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][RGen_menu_items][' . $i . '][name]';
										$id				= 'RGen_menu_items-' . $language['language_id'] . '-' . $i . '-name';
										$placeholder	= 'Link-' . $i . ' name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['url']) ? $RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['url'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][RGen_menu_items][' . $i . '][url]';
										$id				= 'RGen_menu_items-' . $language['language_id'] . '-' . $i . '-url';
										$placeholder	= 'Link-' . $i . ' URL';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['sort_order']) ? $RGen[$language['language_id']]['Menu'][$j]['RGen_menu_items'][$i]['sort_order'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][RGen_menu_items][' . $i . '][sort_order]';
										$id				= 'RGen_menu_items-' . $language['language_id'] . '-' . $i . '-sort_order';
										$placeholder	= 'Sort order';
									?>
									<input type="text" class='input-small' placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php } ?>
				</div>

			</div>
			<div id="RGen-htmlMenu" class="tab-pane">
				<ul class="nav nav-tabs" id="customHtmlMenu">
					<?php foreach ($languages as $language) { ?>
					<li>
						<a href="#tab-menu-<?php echo $language['language_id']; ?>">
						<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				
				<div class="tab-content">
					<?php $j=2; foreach ($languages as $language) { ?>
					<div class="tab-pane" id="tab-menu-<?php echo $language['language_id']; ?>">
						<table class="table table-hover">
							<tr>
								<td>
									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['name']) ? $RGen[$language['language_id']]['Menu'][$j]['name'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][name]';
										$id				= 'RGen_htmlmenu-' . $language['language_id'] . '-name';
										$placeholder	= 'Menu name';
									?>
									<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<?php 
										$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$j]['htmldata']) ? $RGen[$language['language_id']]['Menu'][$j]['htmldata'] : '';
										$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $j . '][htmldata]';
										$id				= 'RGen_htmlmenu-' . $language['language_id'] . '-htmldata';
									?>
									<textarea name="<?php echo $name; ?>" id="<?php echo $id; ?>"><?php echo $dbKey; ?></textarea>
								</td>
							</tr>
						</table>
					</div>
					<?php } ?>
				</div><?php
				 

				/* UNLIMITED CUSTOM MENU
				***********************************/
				?><div id="customHtmlMenu_wrp">
					<?php 
					$htmMenuMod = 1;
					$i=3;
					if(isset($RGen[$language['language_id']]['Menu'][$i])){ 
					foreach ($RGen[$language['language_id']]['Menu'][$i]['htmMenu'] as $module) { 
					//echo "<pre style='color:;'>" . print_r($module, TRUE) . "</pre>";
					?>
					
					<div class="htmMenuMod" id="customHtmlMenu<?php echo $htmMenuMod ?>">
						<!-- CUSTOM HTML MENU -->
						<ul class="nav nav-tabs">
							<?php foreach ($languages as $language) { ?>
							<li>
								<a href="#tab-menu-<?php echo $language['language_id']; ?>-<?php echo $htmMenuMod ?>">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane" id="tab-menu-<?php echo $language['language_id']; ?>-<?php echo $htmMenuMod ?>">
								<table class="table table-hover">
									<tr>
										<td>
											<?php 
												$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['name']) ? $RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['name'] : '';
												$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $i . '][htmMenu][' . $htmMenuMod . '][name]';
												$id				= 'htmMenuMod-' . $language['language_id'] . '-' . $htmMenuMod . '-name';
												$placeholder	= 'Menu name';
											?>
											<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
											<?php 
												$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['sort_order']) ? $RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['sort_order'] : '';
												$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $i . '][htmMenu][' . $htmMenuMod . '][sort_order]';
												$id				= 'htmMenuMod-' . $language['language_id'] . '-' . $htmMenuMod . '-sort_order';
												$placeholder	= 'Sort order';
											?>
											<input type="text" class="input-small" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
											<span class="pull-right"><a class="btn btn-danger" onclick="$('#customHtmlMenu<?php echo $htmMenuMod; ?>').remove(); return false;">&times;</a></span>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												$dbKey 			= isset($RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['htmldata']) ? $RGen[$language['language_id']]['Menu'][$i]['htmMenu'][$htmMenuMod]['htmldata'] : '';
												$name			= 'RGen_module[' . $language['language_id'] . '][Menu][' . $i . '][htmMenu][' . $htmMenuMod . '][htmldata]';
												$id				= 'htmMenuMod-' . $language['language_id'] . '-' . $htmMenuMod . '-htmldata';
											?>
											<textarea id="<?php echo $id; ?>" name="<?php echo $name; ?>"><?php echo $dbKey; ?></textarea>
										</td>
									</tr>
								</table>
							</div>
							<?php } ?>
						</div>
						<script type="text/javascript">
							$("#customHtmlMenu<?php echo $htmMenuMod; ?> .nav-tabs a").click(function (e) { e.preventDefault();$(this).tab("show"); });
							$("#customHtmlMenu<?php echo $htmMenuMod; ?> .nav-tabs > li:first").addClass("active");
							$("#customHtmlMenu<?php echo $htmMenuMod; ?> .tab-content .tab-pane:first").addClass("active");
						</script>
					</div>
					<?php $htmMenuMod++; } } ?>

					<div class="htmMenuMod-add">
						<a class="btn btn-success">Add new HTML menu</a>
					</div>
				</div>
				<!-- ============================================ -->

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.htmMenuMod-add .btn').live('click', function(){
		addHtmMenu();
	});
	function addHtmMenu(){
		var htmMenuMod = parseInt($('#customHtmlMenu_wrp .htmMenuMod').length + 1);
		var i = 3;

		html =  '<div class="htmMenuMod" id="customHtmlMenu' + htmMenuMod + '">';
		html += '	<ul class="nav nav-tabs">';
		<?php foreach ($languages as $language) { ?>
		html += '		<li><a href="#tab-menu-<?php echo $language["language_id"]; ?>-' + htmMenuMod + '">';
		html += '		<img src="view/image/flags/<?php echo $language["image"]; ?>" title="<?php echo $language["name"]; ?>" /> <?php echo $language["name"]; ?>';
		html += '		</a></li>';
		<?php } ?>
		html += '	</ul>';
		html += '	<div class="tab-content">';
		<?php foreach ($languages as $language) { ?>
		html += '		<div class="tab-pane" id="tab-menu-<?php echo $language["language_id"]; ?>-' + htmMenuMod + '">';
		html += '		<table class="table table-hover">';
		html += '			<tr>';
		html += '				<td>';
		html += '					<input type="text" placeholder="Menu name" id="htmMenuMod-<?php echo $language["language_id"]; ?>-name" name="RGen_module[<?php echo $language["language_id"]; ?>][Menu][' + i + '][htmMenu][' + htmMenuMod + '][name]" value="">';
		html += '					<input class="input-small" type="text" placeholder="Sort order" id="htmMenuMod-<?php echo $language["language_id"]; ?>-sort_order" name="RGen_module[<?php echo $language["language_id"]; ?>][Menu][' + i + '][htmMenu][' + htmMenuMod + '][sort_order]" value="">';
		html += '					<span class="pull-right"><a class="btn btn-danger" onclick="$(\'#customHtmlMenu' + htmMenuMod + '\').remove(); return false;">&times;</a></span>';
		html += '				</td>';
		html += '			</tr>';
		html += '			<tr>';
		html += '				<td>';
		html += '					<textarea id="htmMenuMod-<?php echo $language["language_id"]; ?>-' + htmMenuMod + '-htmldata" name="RGen_module[<?php echo $language["language_id"]; ?>][Menu][' + i + '][htmMenu][' + htmMenuMod + '][htmldata]"></textarea>';
		html += '				</td>';
		html += '			</tr>';
		html += '		</table>';
		html += '		</div>';
		<?php } ?>
		html += '	</div>';
		html += '<script type="text/javascript">';
		html += '$("#customHtmlMenu' + htmMenuMod + ' .nav-tabs a").click(function (e) { e.preventDefault();$(this).tab("show"); });';
		html += '$("#customHtmlMenu' + htmMenuMod + ' .nav-tabs > li:first").addClass("active");';
		html += '$("#customHtmlMenu' + htmMenuMod + ' .tab-content .tab-pane:first").addClass("active");';
		html += '<\/script>';
		html += '</div>';
		

		$('.htmMenuMod-add').before(html);

		<?php foreach ($languages as $language) { ?>
		CKEDITOR.replace('htmMenuMod-<?php echo $language["language_id"]; ?>-' + htmMenuMod + '-htmldata', {
			filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
			filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
			filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
			filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
			filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
			filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
		});  
		<?php } ?>

		htmMenuMod++;
	}

	<?php 
	$module_row = 1; $i=3;
	if(isset($RGen[$language['language_id']]['Menu'][$i])){ 
	foreach ($RGen[$language['language_id']]['Menu'][$i]['htmMenu'] as $module) { 
	foreach ($languages as $language) {
	?>
	CKEDITOR.replace('htmMenuMod-<?php echo $language["language_id"]; ?>-<?php echo $module_row; ?>-htmldata', {
		filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	});
	<?php } $module_row++; } } ?>
});
</script>