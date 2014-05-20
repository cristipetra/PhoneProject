<?php 
$l_id = $this->config->get('config_language_id');

// Custom html variables
$t = 'htmlData_top';
$r = 'htmlData_right';
$b = 'htmlData_bottom';
$l = 'htmlData_left';
//echo "<pre>".print_r($rgen_megamenu_mod,true)."</pre>";
if (isset($this->document->rgen_megamenus)) {
foreach ($this->document->rgen_megamenus as $menuId => $menu) {

if ($menu['status'] == 1) {
	
	/* Normal Menu Items
	******************************/
	if ($menu['menu_type'] == 'menu_items') { 
	foreach ($menu['menuitems'] as $menuitem) { 
		$menuitem_class = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$menuitem_href  = isset($menuitem['url']) && $menuitem['url'] != '' ? ' href="'.$menuitem['url'].'"' : null;
		$menuitem_open  = isset($menuitem['open']) && $menuitem['open'] == 'y' ? " target='_blank'" : null;
		$menuitem_name  = isset($menuitem['name'][$l_id]) ? $menuitem['name'][$l_id] : null;
	?>
	<li<?php echo $menuitem_class; ?>>
		<a<?php echo $menuitem_href; ?><?php echo $menuitem_open; ?> title="<?php echo $menuitem_name; ?>" class="top-lvl"><?php echo $menuitem_name; ?></a>
	</li>
	<?php } }
	/*****************************/



	/* Custom Drop Down
	******************************/
	if ($menu['menu_type'] == 'dropdown') { 
		$dropdown_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$dropdown_url          = isset($menu['dropdown']['url']) && $menu['dropdown']['url'] != '' ? ' href="'.$menu['dropdown']['url'].'"' : null;
		$dropdown_open         = isset($menu['dropdown']['open']) && $menu['dropdown']['open'] == 'y' ? " target='_blank'" : null;
		$dropdown_name         = isset($menu['dropdown']['name'][$l_id]) ? $menu['dropdown']['name'][$l_id] : null;
		$dropdown_lbl          = isset($menu['dropdown']['lbl_text'][$l_id]) && $menu['dropdown']['lbl_text'][$l_id] != '' ? $menu['dropdown']['lbl_text'][$l_id] : null;
		$dropdown_lbl_top      = isset($menu['dropdown']['lbl_top']) ? " style='top:".$menu['dropdown']['lbl_top']."px'" : null;
		$dropdown_lbl_bg       = isset($menu['dropdown']['lbl_bg']) ? 'background-color: #'.$menu['dropdown']['lbl_bg'].';' : null;
		$dropdown_lbl_bdrbg    = isset($menu['dropdown']['lbl_bg']) ? ' style="border-top-color: #'.$menu['dropdown']['lbl_bg'].'";' : null;
		$dropdown_lbl_txtcolor = isset($menu['dropdown']['lbl_txtcolor']) ? 'color: #'.$menu['dropdown']['lbl_txtcolor'].';' : null;

	?><li<?php echo $dropdown_class; ?>>
		<a<?php echo $dropdown_url; ?><?php echo $dropdown_open; ?> title="<?php echo $dropdown_name; ?>" class="top-lvl"><?php 

			if ($dropdown_lbl != '') { 
			?><span class="menu-badge"<?php echo $dropdown_lbl_top; ?>><b<?php 
				if (isset($menu['dropdown']['lbl_bg']) || isset($menu['dropdown']['lbl_txtcolor'])) { 
				?> style="<?php echo $dropdown_lbl_bg . $dropdown_lbl_txtcolor; ?>"<?php } ?>>
				<?php echo $dropdown_lbl; ?><i<?php echo $dropdown_lbl_bdrbg; ?>></i></b></span><?php 
			} 
			?><?php echo $dropdown_name; ?></a>
		
		<?php 
		/* Standard Drop Down
		******************************/
		if (isset($menu['dropdown']['submenu']) && $menu['dropdown']['type'] == 'normal' ) { ?>
		<div class="sub-menu">
			<ul>
				<?php foreach ($menu['dropdown']['submenu'] as $dropdown) { 
					$dropdown_sub_url  = isset($dropdown['url']) ? ' href="'.$dropdown['url'].'"' : null;
					$dropdown_sub_open = isset($dropdown['open']) && $dropdown['open'] == 'y' ? " target='_blank'" : null;
					$dropdown_sub_name = isset($dropdown['name'][$l_id]) ? $dropdown['name'][$l_id] : null;
				?><li>
					<a<?php echo $dropdown_sub_url; ?><?php echo $dropdown_sub_open; ?> title="<?php echo $dropdown_sub_name; ?>" class="sub-lvl"><?php echo $dropdown_sub_name; ?></a>
					<?php if (isset($dropdown['level1'])) { ?>
					<div class="sub-menu">
						<ul>
							<?php foreach ($dropdown['level1'] as $level1) { 
								$dropdown_l1_url  = isset($level1['url']) ? $level1['url'] : null;
								$dropdown_l1_open = isset($level1['open']) && $level1['open'] == 'y' ? " target='_blank'" : null;
								$dropdown_l1_name = isset($level1['name'][$l_id]) ? $level1['name'][$l_id] : null;
							?><li>
								<a href="<?php echo $dropdown_l1_url; ?>"<?php echo $dropdown_l1_open; ?> title="<?php echo $dropdown_l1_name; ?>" class="sub-lvl"><?php echo $dropdown_l1_name; ?></a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php }else { 
		/* Custom Drop Down
		******************************/?>
		<div class="sub-menu menu-html-wrp">
			<div class="menu-html menu-mega">
				<?php 
				// Top HTML data
				if (isset($menu['dropdown'][$t][$l_id]) && $menu['dropdown'][$t][$l_id] != '') { ?>
				<div class="htm-data t-data">
				<?php echo htmlspecialchars_decode($menu['dropdown'][$t][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
				
				<div class="menu-mg-data-wrp">
					<?php 
					// Left HTML data
					if (isset($menu['dropdown'][$l][$l_id]) && $menu['dropdown'][$l][$l_id] != '') { ?>
					<div class="htm-data l-data" style="width:<?php echo $menu['dropdown']['l_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['dropdown'][$l][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>

					<div class="c-data">
						<?php 
						$i = 1;
						$j = 1;
						$col = isset($menu['dropdown']['columns']) && $menu['dropdown']['columns'] != '' ? $menu['dropdown']['columns'] : 3;
						if (isset($menu['dropdown']['submenu'])) {
						$count = count($menu['dropdown']['submenu']);
						foreach ($menu['dropdown']['submenu'] as $dropdown) { 
							$dropdown_sub_url  = isset($dropdown['url']) && $dropdown['url'] != '' ? ' href="'.$dropdown['url'].'"' : null;
							$dropdown_sub_open = isset($dropdown['open']) && $dropdown['open'] == 'y' ? " target='_blank'" : null;
							$dropdown_sub_name = isset($dropdown['name'][$l_id]) ? $dropdown['name'][$l_id] : null;
						?>
						<?php if ($i > $col) { $i = 1; } ?>
						<?php if ($i == 1) { echo '<div class="menu-mg-data">'; } ?>
						<div class="menu-grid">
							<a<?php echo $dropdown_sub_url; ?><?php echo $dropdown_open; ?> title="<?php echo $dropdown_sub_open; ?>" class="menu-main"><?php echo $dropdown_sub_name; ?></a>
							<?php if (isset($dropdown['level1'])) { ?>
							<ul class="menu-sub">
								<?php foreach ($dropdown['level1'] as $level1) { 
									$dropdown_l1_url  = isset($level1['url']) ? $level1['url'] : null;
									$dropdown_l1_open = isset($level1['open']) && $level1['open'] == 'y' ? " target='_blank'" : null;
									$dropdown_l1_name = isset($level1['name'][$l_id]) ? $level1['name'][$l_id] : null;
								?><li class="menu-sub-list">
									<a href="<?php echo $dropdown_l1_url; ?>"<?php echo $dropdown_l1_open; ?> title="<?php echo $dropdown_l1_name; ?>"><?php echo $dropdown_l1_name; ?></a>
								</li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div>
						<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
						<?php if ($j == $count && $i != $col) { echo '</div>'; } ?>
						<?php $i++; $j++; }
						} ?>
					</div>

					<?php 
					// Right HTML data
					if (isset($menu['dropdown'][$r][$l_id]) && $menu['dropdown'][$r][$l_id] != '') { ?>
					<div class="htm-data r-data" style="width:<?php echo $menu['dropdown']['r_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['dropdown'][$r][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
				</div>

				<?php 
				// Bottom HTML data
				if (isset($menu['dropdown'][$b][$l_id]) && $menu['dropdown'][$b][$l_id] != '') { ?>
				<div class="htm-data b-data">
				<?php echo htmlspecialchars_decode($menu['dropdown'][$b][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
			</div>

		</div>
			
		<?php } ?>
	</li>
	<?php }
	/*****************************/

	

	/* Category normal - Standard menu
	******************************/
	if ($menu['menu_type'] == 'cat_normal' && $menu['cat_normal']['type'] == 'normal') { 
	foreach ($menu['cat_normal']['cat_data'] as $cat_normal_key => $cat_normal_value) { 
		$catnormal_url          = isset($cat_normal_value['maincat']['href']) && $cat_normal_value['maincat']['href'] != '' ? ' href="'.$cat_normal_value['maincat']['href'].'"' : null;
		$catnormal_name         = isset($cat_normal_value['maincat']['name']) ? $cat_normal_value['maincat']['name'] : null;
		$catnormal_lbl_top      = isset($menu['cat_normal']['lbl_top'])? " style='top:".$menu['cat_normal']['lbl_top']."px'" : null;
		$catnormal_lbl_bg       = isset($menu['cat_normal']['lbl_bg']) ? 'background-color: #'.$menu['cat_normal']['lbl_bg'].';' : null;
		$catnormal_lbl_bdrbg    = isset($menu['cat_normal']['lbl_bg']) ? ' style="border-top-color: #'.$menu['cat_normal']['lbl_bg'].'";' : null;
		$catnormal_lbl_txtcolor = isset($menu['cat_normal']['lbl_txtcolor']) ? 'color: #'.$menu['cat_normal']['lbl_txtcolor'].';' : null;
		$catnormal_lbl_text     = isset($menu['cat_normal']['lbl_text'][$l_id]) ? $menu['cat_normal']['lbl_text'][$l_id] : null;

	if (isset($cat_normal_value['maincat']['status']) && $cat_normal_value['maincat']['status'] == 1) { ?>
	<li<?php echo isset($menu['class']) ? ' class="'.$menu['class'].'"' : null; ?>>
		<a<?php echo $catnormal_url; ?> title="<?php echo $catnormal_name; ?>" class="top-lvl"><?php 

			if (isset($menu['cat_normal']['lbl_text'][$l_id]) && $menu['cat_normal']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $catnormal_lbl_top?>><b<?php 
				if (isset($menu['cat_normal']['lbl_bg']) || isset($menu['cat_normal']['lbl_txtcolor'])) { 
				?> style="<?php echo $catnormal_lbl_bg.$catnormal_lbl_txtcolor; ?>"<?php } ?>><?php echo $catnormal_lbl_text; ?><i<?php echo $catnormal_lbl_bdrbg; ?>></i></b></span><?php 
			} 
			?><?php echo $catnormal_name; ?></a>
		<?php 
		if (isset($cat_normal_value['level_1']) && !empty($cat_normal_value['level_1'])) {

			/* Standard category normal
			******************************/ ?>
			<div class="sub-menu">
				<ul>
					<?php foreach ($cat_normal_value['level_1'] as $level_1) { 
						$catnormal_l1_href = isset($level_1['href']) ? $level_1['href'] : null;
						$catnormal_l1_name = isset($level_1['name']) ? $level_1['name'] : null;
						$catnormal_l1_img  = isset($level_1['image']) ? $level_1['image'] : null;
					?><li>
						<a href="<?php echo $catnormal_l1_href; ?>" title="<?php echo $catnormal_l1_name; ?>" class="sub-lvl">
							<?php if ($menu['cat_normal']['cat_img'] == 'y') { ?>
							<span class="menu_img"><img src="<?php echo $catnormal_l1_img; ?>" alt="<?php echo $catnormal_l1_name; ?>" /></span><span class="menu_name"><?php echo $catnormal_l1_name; ?></span>
							<?php } else { ?>
							<?php echo $catnormal_l1_name; ?>
							<?php } ?>
						</a>
						<?php if (isset($cat_normal_value['level_2'][$level_1['category_id']])) { ?>
						<div class="sub-menu">
							<ul>
								<?php foreach ($cat_normal_value['level_2'][$level_1['category_id']] as $level_2) { 
									$catnormal_l2_href = isset($level_2['href']) ? $level_2['href'] : null;
									$catnormal_l2_name = isset($level_2['name']) ? $level_2['name'] : null;
								?><li>
									<a href="<?php echo $catnormal_l2_href; ?>" title="<?php echo $catnormal_l2_name; ?>" class="sub-lvl"><?php echo $catnormal_l2_name; ?></a>
									<?php if (isset($cat_normal_value['level_3'][$level_2['category_id']])) { ?>
									<div class="sub-menu">
										<ul>
											<?php foreach ($cat_normal_value['level_3'][$level_2['category_id']] as $level_3) { 
												$catnormal_l3_href = isset($level_3['href']) ? $level_3['href'] : null;
												$catnormal_l3_name = isset($level_3['name']) ? $level_3['name'] : null;
											?><li>
												<a href="<?php echo $catnormal_l3_href ?>" title="<?php echo $catnormal_l3_name; ?>" class="sub-lvl"><?php echo $catnormal_l3_name; ?></a>
											</li>
											<?php } ?>
										</ul>
									</div>
									<?php } ?>
								</li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
					</li>
					<?php } ?>
				</ul>
			</div>

		<?php } ?>
	</li>
	<?php } ?>
	<?php } ?>
	<?php }
	/*****************************/



	/* Category normal - Mega menu
	******************************/
	if ($menu['menu_type'] == 'cat_normal' && $menu['cat_normal']['type'] == 'mega') { 
	foreach ($menu['cat_normal']['cat_data'] as $cat_normalmg_key => $cat_normalmg_value) { 
		$cat_normalmg_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$cat_normalmg_name         = isset($cat_normalmg_value['maincat']['name']) ? $cat_normalmg_value['maincat']['name'] : null;
		$cat_normalmg_href         = isset($cat_normalmg_value['maincat']['href']) && $cat_normalmg_value['maincat']['href'] != '' ? ' href="'.$cat_normalmg_value['maincat']['href'].'"' : null;;
		$cat_normalmg_lbl_top      = isset($menu['cat_normal']['lbl_top'])? " style='top:".$menu['cat_normal']['lbl_top']."px'" : null; 
		$cat_normalmg_lbl_bg       = isset($menu['cat_normal']['lbl_bg']) ? 'background-color: #'.$menu['cat_normal']['lbl_bg'].';' : null;
		$cat_normalmg_lbl_bdrbg    = isset($menu['cat_normal']['lbl_bg']) ? " style='border-top-color: #".$menu['cat_normal']['lbl_bg'].";'" : null;
		$cat_normalmg_lbl_txtcolor = isset($menu['cat_normal']['lbl_txtcolor']) ? 'color: #'.$menu['cat_normal']['lbl_txtcolor'].';' : null;
		$cat_normalmg_lbl_text     = isset($menu['cat_normal']['lbl_text'][$l_id]) ? $menu['cat_normal']['lbl_text'][$l_id] : null;

	if (isset($cat_normalmg_value['maincat']['status']) && $cat_normalmg_value['maincat']['status'] == 1) { ?>
	<li<?php echo $cat_normalmg_class; ?>>
		<a<?php echo $cat_normalmg_href; ?> title="<?php echo $cat_normalmg_name; ?>" class="top-lvl"><?php 
			if (isset($menu['cat_normal']['lbl_text'][$l_id]) && $menu['cat_normal']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $cat_normalmg_lbl_top; ?>><b<?php 
				if (isset($menu['cat_normal']['lbl_bg']) || isset($menu['cat_normal']['lbl_txtcolor'])) { 
				?> style="<?php echo $cat_normalmg_lbl_bg.$cat_normalmg_lbl_txtcolor; ?>"<?php 
				} ?>><?php echo $cat_normalmg_lbl_text; ?><i<?php echo $cat_normalmg_lbl_bdrbg; ?>></i></b></span><?php } echo $cat_normalmg_name; ?></a>
		<?php 
		if (isset($cat_normalmg_value['level_1']) && !empty($cat_normalmg_value['level_1'])) {

			/* Mega category normal
			******************************/ ?>
			<div class="sub-menu menu-html-wrp">
				<div class="menu-html menu-mega">
					<?php 
					// Top HTML data
					if (isset($menu['cat_normal'][$t][$l_id]) && $menu['cat_normal'][$t][$l_id] != '') { ?>
					<div class="htm-data t-data">
					<?php echo htmlspecialchars_decode($menu['cat_normal'][$t][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
					
					<div class="menu-mg-data-wrp">
						<?php 
						// Left HTML data
						if (isset($menu['cat_normal'][$l][$l_id]) && $menu['cat_normal'][$l][$l_id] != '') { ?>
						<div class="htm-data l-data" style="width:<?php echo $menu['cat_normal']['l_width']; ?>px;">
						<?php echo htmlspecialchars_decode($menu['cat_normal'][$l][$l_id], ENT_QUOTES ); ?>
						</div>
						<?php } ?>

						<div class="c-data">
							<ul class="menu-link-list">
								<?php foreach ($cat_normalmg_value['level_1'] as $level_1) { 
									$cat_normalmg_l1_href = isset($level_1['href']) ? $level_1['href'] : null;
									$cat_normalmg_l1_name = isset($level_1['name']) ? $level_1['name'] : null;
								?><li>
									<a href="<?php echo $cat_normalmg_l1_href; ?>" title="<?php echo $cat_normalmg_l1_name; ?>">
										<?php if ($menu['cat_normal']['cat_img'] == 'y') { ?>
										<span class="menu_img"><img src="<?php echo $level_1['image']; ?>" alt="<?php echo $cat_normalmg_l1_name; ?>" /></span><span class="menu_name"><?php echo $cat_normalmg_l1_name; ?></span>
										<?php } else { ?>
										<?php echo $cat_normalmg_l1_name; ?>
										<?php } ?>
									</a>
									<?php if (isset($cat_normalmg_value['level_2'][$level_1['category_id']])) { ?>
									<div class="sub-menu">
										<ul>
											<?php foreach ($cat_normalmg_value['level_2'][$level_1['category_id']] as $level_2) { 
												$cat_normalmg_l2_href = isset($level_2['href']) ? $level_2['href'] : null;
												$cat_normalmg_l2_name = isset($level_2['name']) ? $level_2['name'] : null;
											?><li>
												<a href="<?php echo $cat_normalmg_l2_href; ?>" title="<?php echo $cat_normalmg_l2_name; ?>" class="sub-lvl"><?php echo $cat_normalmg_l2_name; ?></a>
												<?php if (isset($cat_normalmg_value['level_3'][$level_2['category_id']])) { ?>
												<div class="sub-menu">
													<ul>
														<?php foreach ($cat_normalmg_value['level_3'][$level_2['category_id']] as $level_3) { 
															$cat_normalmg_l3_href = isset($level_3['href']) ? $level_3['href'] : null;
															$cat_normalmg_l3_name = isset($level_3['name']) ? $level_3['name'] : null;
														?><li>
															<a href="<?php echo $cat_normalmg_l3_href; ?>" title="<?php echo $cat_normalmg_l3_name; ?>" class="sub-lvl"><?php echo $cat_normalmg_l3_name; ?></a>
														</li>
														<?php } ?>
													</ul>
												</div>
												<?php } ?>
											</li>
											<?php } ?>
										</ul>
									</div>
									<?php } ?>
								</li>
								<?php } ?>
							</ul>
						</div>

						<?php 
						// Right HTML data
						if (isset($menu['cat_normal'][$r][$l_id]) && $menu['cat_normal'][$r][$l_id] != '') { ?>
						<div class="htm-data r-data" style="width:<?php echo $menu['cat_normal']['r_width']; ?>px;">
						<?php echo htmlspecialchars_decode($menu['cat_normal'][$r][$l_id], ENT_QUOTES ); ?>
						</div>
						<?php } ?>
					</div>

					<?php 
					// Bottom HTML data
					if (isset($menu['cat_normal'][$b][$l_id]) && $menu['cat_normal'][$b][$l_id] != '') { ?>
					<div class="htm-data b-data">
					<?php echo htmlspecialchars_decode($menu['cat_normal'][$b][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
				</div>
			</div>

		<?php } ?>
	</li>
	<?php } ?>
	<?php } ?>
	<?php }
	/*****************************/



	/* Category mega menu 
	******************************/
	if ($menu['menu_type'] == 'cat_mega') { 
		$cat_mega_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$cat_mega_url          = isset($menu['cat_mega']['url']) && $menu['cat_mega']['url'] != '' ? ' href="'.$menu['cat_mega']['url'].'"' : null;
		$cat_mega_open         = isset($menu['cat_mega']['open']) && $menu['cat_mega']['open'] == 'y' ? " target='_blank'" : null;
		$cat_mega_name         = isset($menu['cat_mega']['name'][$l_id]) ? $menu['cat_mega']['name'][$l_id] : null;
		$cat_mega_lbl_top      = isset($menu['cat_mega']['lbl_top'])? " style='top:".$menu['cat_mega']['lbl_top']."px'" : null;
		$cat_mega_lbl_bg       = isset($menu['cat_mega']['lbl_bg']) ? 'background-color: #'.$menu['cat_mega']['lbl_bg'].';' : null;
		$cat_mega_lbl_bdrbg    = isset($menu['cat_mega']['lbl_bg']) ? " style='border-top-color: #".$menu['cat_mega']['lbl_bg'].";'" : null;
		$cat_mega_lbl_txtcolor = isset($menu['cat_mega']['lbl_txtcolor']) ? 'color: #'.$menu['cat_mega']['lbl_txtcolor'].';' : null;
		$cat_mega_lbl_text     = isset($menu['cat_mega']['lbl_text'][$l_id]) ? $menu['cat_mega']['lbl_text'][$l_id] : null;

	?><li<?php echo $cat_mega_class; ?>>
		<a<?php echo $cat_mega_url; ?><?php echo $cat_mega_open; ?> title="<?php echo $cat_mega_name; ?>" class="top-lvl"><?php 

			if (isset($menu['cat_mega']['lbl_text'][$l_id]) && $menu['cat_mega']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $cat_mega_lbl_top; ?>><b<?php 
				if (isset($menu['cat_mega']['lbl_bg']) || isset($menu['cat_mega']['lbl_txtcolor'])) {
				?> style="<?php echo $cat_mega_lbl_bg.$cat_mega_lbl_txtcolor; ?>"<?php } ?>><?php echo $cat_mega_lbl_text; ?><i<?php echo $cat_mega_lbl_bdrbg; ?>></i></b></span><?php 
			}
			?><?php echo $cat_mega_name; ?></a>
		
		<?php 
		/* Category mega menu - Standard Drop Down
		******************************/
		if (isset($this->document->cat_mega[$menuId]) && $menu['cat_mega']['type'] == 'normal' ) { ?>
		<div class="sub-menu">
			<ul>
				<?php foreach ($this->document->cat_mega[$menuId] as $maincat) { 
					$maincat_name = isset($maincat['maincat']['name']) ? $maincat['maincat']['name'] : null;
					$maincat_href = isset($maincat['maincat']['href']) ? $maincat['maincat']['href'] : null;
				?><li>
					<a href="<?php echo $maincat_href; ?>" title="<?php echo $maincat_name; ?>" class="sub-lvl">
						<?php if ($menu['cat_mega']['cat_img'] == 'y') { ?>
						<span class="menu_img"><img src="<?php echo $maincat['maincat']['image']; ?>" alt="<?php echo $maincat_name; ?>" /></span><span class="menu_name"><?php echo $maincat_name; ?></span>
						<?php } else { ?>
						<?php echo $maincat_name; ?>
						<?php } ?>
					</a>
					<?php if (isset($maincat['level_1']) && !empty($maincat['level_1'])) { ?>
					<div class="sub-menu">
						<ul>
							<?php foreach ($maincat['level_1'] as $level1) { 
								$level1_name = isset($level1['name']) ? $level1['name'] : null;
								$level1_href = isset($level1['href']) ? $level1['href'] : null;
							?><li>
								<a href="<?php echo $level1_href; ?>" title="<?php echo $level1_name; ?>" class="sub-lvl"><?php echo $level1_name; ?></a>
								
								<?php if (isset($maincat['level_2'][$level1['category_id']])) { ?>
								<div class="sub-menu">
									<ul>
										<?php foreach ($maincat['level_2'][$level1['category_id']] as $level2) { 
											$level2_name = isset($level2['name']) ? $level2['name'] : null;
											$level2_href = isset($level2['href']) ? $level2['href'] : null;
										?><li>
											<a href="<?php echo $level2_href; ?>" title="<?php echo $level2_name; ?>" class="sub-lvl"><?php echo $level2_name; ?></a>
											<?php if (isset($maincat['level_3'][$level2['category_id']])) { ?>
											<div class="sub-menu">
												<ul>
													<?php foreach ($maincat['level_3'][$level2['category_id']] as $level3) { 
														$level3_name = isset($level3['name']) ? $level3['name'] : null;
														$level3_href = isset($level3['href']) ? $level3['href'] : null;
													?><li>
														<a href="<?php echo $level3_href; ?>" title="<?php echo $level3_name; ?>" class="sub-lvl"><?php echo $level3_name; ?></a>
													</li>
													<?php } ?>
												</ul>
											</div>
											<?php } ?>
										</li>
										<?php } ?>
									</ul>
								</div>
								<?php } ?>
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php }else { 

		/* Category mega menu - Custom Drop Down
		******************************/?>
		<div class="sub-menu menu-html-wrp">
			<div class="menu-html menu-mega">
				<?php 
				// Top HTML data
				if (isset($menu['cat_mega'][$t][$l_id]) && $menu['cat_mega'][$t][$l_id] != '') { ?>
				<div class="htm-data t-data">
				<?php echo htmlspecialchars_decode($menu['cat_mega'][$t][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
				
				<div class="menu-mg-data-wrp">
					<?php 
					// Left HTML data
					if (isset($menu['cat_mega'][$l][$l_id]) && $menu['cat_mega'][$l][$l_id] != '') { ?>
					<div class="htm-data l-data" style="width:<?php echo $menu['cat_mega']['l_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['cat_mega'][$l][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>

					<div class="c-data">
						<?php 
						$i = 1;
						$j = 1;
						$col = isset($menu['cat_mega']['columns']) && $menu['cat_mega']['columns'] != '' ? $menu['cat_mega']['columns'] : 3;
						if (isset($this->document->cat_mega[$menuId])) {
							$count = count($this->document->cat_mega[$menuId]);
							foreach ($this->document->cat_mega[$menuId] as $maincat) { 
								$maincat_name = isset($maincat['maincat']['name']) ? $maincat['maincat']['name'] : null;
								$maincat_href = isset($maincat['maincat']['href']) ? $maincat['maincat']['href'] : null;
								$maincat_img  = isset($maincat['maincat']['image']) ? $maincat['maincat']['image'] : null;
							if ($i > $col) { $i = 1; }
							if ($i == 1) { echo '<div class="menu-mg-data">'; } ?>
							<div class="menu-grid<?php echo $menu['cat_mega']['cat_img'] =='y' ? ' catimg-y' : null ; ?>">
								<?php if ($menu['cat_mega']['cat_img'] == 'y') { ?>
								<img class="menu-cat-img" src="<?php echo $maincat_img; ?>" alt="<?php echo $maincat_name; ?>" />
								<?php } ?>
								<a href="<?php echo $maincat_href; ?>" data-catimg="<?php echo $maincat_img ?>" title="<?php echo $maincat_name; ?>" class="menu-main"><?php echo $maincat_name; ?></a>
								<?php if (isset($maincat['level_1']) && !empty($maincat['level_1'])) { ?>
								<ul class="menu-sub">
									<?php 
									$maxsub = 1;
									foreach ($maincat['level_1'] as $level1) { 
										$level1_name = isset($level1['name']) ? $level1['name'] : null;
										$level1_href = isset($level1['href']) ? $level1['href'] : null;
										$level1_img  = isset($level1['image']) ? $level1['image'] : null;
									if($maxsub <= $menu['cat_mega']['maxsub'] || $menu['cat_mega']['maxsub'] == ''){ ?>
									<li class="menu-sub-list">
										<a href="<?php echo $level1_href; ?>" data-catimg="<?php echo $level1_img; ?>" title="<?php echo $level1_name; ?>"><?php echo $level1_name; ?></a>
										<?php if (isset($maincat['level_2'][$level1['category_id']])) { ?>
										<div class="sub-menu">
											<ul>
												<?php foreach ($maincat['level_2'][$level1['category_id']] as $level2) { 
													$level2_name = isset($level2['name']) ? $level2['name'] : null;
													$level2_href = isset($level2['href']) ? $level2['href'] : null;
												?><li>
													<a href="<?php echo $level2_href; ?>" title="<?php echo $level2_name; ?>" class="sub-lvl"><?php echo $level2_name; ?></a>
													<?php if (isset($maincat['level_3'][$level2['category_id']])) { ?>
													<div class="sub-menu">
														<ul>
															<?php foreach ($maincat['level_3'][$level2['category_id']] as $level3) { 
																$level3_name = isset($level3['name']) ? $level3['name'] : null;
																$level3_href = isset($level3['href']) ? $level3['href'] : null;
															?><li>
																<a href="<?php echo $level3_href; ?>" title="<?php echo $level3_name; ?>" class="sub-lvl"><?php echo $level3_name; ?></a>
															</li>
															<?php } ?>
														</ul>
													</div>
													<?php } ?>
												</li>
												<?php } ?>
											</ul>
										</div>
										<?php } ?>
									</li>
									<?php } $maxsub++; } ?>
								</ul>
								<?php } ?>
							</div>
							<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
							<?php if ($j == $count && $i != $col) { echo '</div>'; } ?>
							<?php $i++; $j++; } 
						} ?>
					</div>

					<?php 
					// Right HTML data
					if (isset($menu['cat_mega'][$r][$l_id]) && $menu['cat_mega'][$r][$l_id] != '') { ?>
					<div class="htm-data r-data" style="width:<?php echo $menu['cat_mega']['r_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['cat_mega'][$r][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
				</div>

				<?php 
				// Bottom HTML data
				if (isset($menu['cat_mega'][$b][$l_id]) && $menu['cat_mega'][$b][$l_id] != '') { ?>
				<div class="htm-data b-data">
				<?php echo htmlspecialchars_decode($menu['cat_mega'][$b][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
			</div>

		</div>
			
		<?php } ?>
	</li>
	<?php }
	/*****************************/



	/* Brands menu
	******************************/
	if ($menu['menu_type'] == 'brands') { 
		$brand_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$brand_url          = isset($menu['brands']['url']) && $menu['brands']['url'] != '' ? ' href="'.$menu['brands']['url'].'"' : null;
		$brand_open         = isset($menu['brands']['open']) && $menu['brands']['open'] == 'y' ? " target='_blank'" : null;
		$brand_name         = isset($menu['brands']['name'][$l_id]) ? $menu['brands']['name'][$l_id] : null;
		$brand_lbl_top      = isset($menu['brands']['lbl_top'])? " style='top:".$menu['brands']['lbl_top']."px'" : null;
		$brand_lbl_bg       = isset($menu['brands']['lbl_bg']) ? 'background-color: #'.$menu['brands']['lbl_bg'].';' : null;
		$brand_lbl_brdbg    = isset($menu['brands']['lbl_bg']) ? " style='border-top-color: #".$menu['brands']['lbl_bg'].";'" : null;
		$brand_lbl_txtcolor = isset($menu['brands']['lbl_txtcolor']) ? 'color: #'.$menu['brands']['lbl_txtcolor'].';' : null;
		$brand_lbl_text     = isset($menu['brands']['lbl_text'][$l_id]) ? $menu['brands']['lbl_text'][$l_id] : null;

	?><li<?php echo $brand_class; ?>>
		<a<?php echo $brand_url; ?><?php echo $brand_open; ?> title="<?php echo $brand_name; ?>" class="top-lvl"><?php

			if (isset($menu['brands']['lbl_text'][$l_id]) && $menu['brands']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $brand_lbl_top; ?>><b<?php 
				if (isset($menu['brands']['lbl_bg']) || isset($menu['brands']['lbl_txtcolor'])) { 
				?> style="<?php echo $brand_lbl_bg.$brand_lbl_txtcolor; ?>"<?php } ?>><?php echo $brand_lbl_text; ?><i<?php echo $brand_lbl_brdbg; ?>></i></b></span><?php 
			} 
			?><?php echo $brand_name; ?></a>
	
		<?php 
		/* Brands standard menu
		******************************/
		if ($menu['brands']['type'] == 'normal') {
		if (isset($this->document->brand_data[$menuId]) && !empty($this->document->brand_data[$menuId])) { ?>
		<div class="sub-menu">
			<ul>
				<?php foreach ($this->document->brand_data[$menuId] as $brand_data) {
					$brand_data_href = isset($brand_data['href']) ? $brand_data['href'] : null;
					$brand_data_name = isset($brand_data['name']) ? $brand_data['name'] : null;
					$brand_data_img  = isset($brand_data['image']) ? $brand_data['image'] : null;
				?><li>
					<a href="<?php echo $brand_data_href; ?>" title="<?php echo $brand_data_name; ?>" class="sub-lvl">
						<?php if ($menu['brands']['brand_img'] == 'y') { ?>
						<span class="menu_img"><img src="<?php echo $brand_data_img; ?>" alt="<?php echo $brand_data_name; ?>" /></span><span class="menu_name"><?php echo $brand_data_name; ?></span>
						<?php } else { ?>
						<?php echo $brand_data_name; ?>
						<?php } ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } } else { 

		/* Brands mega menu
		******************************/?>
		<div class="sub-menu menu-html-wrp">
			<div class="menu-html menu-mega brand-mega">
				<?php 
				// Top HTML data
				if (isset($menu['brands'][$t][$l_id]) && $menu['brands'][$t][$l_id] != '') { ?>
				<div class="htm-data t-data">
				<?php echo htmlspecialchars_decode($menu['brands'][$t][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
				
				<div class="menu-mg-data-wrp">
					<?php 
					// Left HTML data
					if (isset($menu['brands'][$l][$l_id]) && $menu['brands'][$l][$l_id] != '') { ?>
					<div class="htm-data l-data" style="width:<?php echo $menu['brands']['l_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['brands'][$l][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>

					<div class="c-data">
						<?php 
						$i = 1;
						$j = 1;
						$col = isset($menu['brands']['columns']) && $menu['brands']['columns'] != '' ? $menu['brands']['columns'] : 4;
						if (isset($this->document->brand_data[$menuId])) {
							$count = count($this->document->brand_data[$menuId]);
							foreach ($this->document->brand_data[$menuId] as $brand_data) { 
								$brand_data_href = isset($brand_data['href']) ? $brand_data['href'] : null;
								$brand_data_name = isset($brand_data['name']) ? $brand_data['name'] : null;
								$brand_data_img  = isset($brand_data['image']) ? $brand_data['image'] : null;

							if ($i > $col) { $i = 1; }
							if ($i == 1) { echo '<div class="menu-mg-data">'; } ?>
							<div class="brand-grid">
								<a href="<?php echo $brand_data_href; ?>" title="<?php echo $brand_data_name; ?>">
									<img src="<?php echo $brand_data_img; ?>" alt="<?php echo $brand_data_name; ?>" />
									<strong><?php echo $brand_data_name; ?></strong>
								</a>
							</div>
							<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
							<?php if ($j == $count && $i != $col) { echo '</div>'; } ?>
							<?php $i++; $j++; } 
						} ?>
					</div>

					<?php 
					// Right HTML data
					if (isset($menu['brands'][$r][$l_id]) && $menu['brands'][$r][$l_id] != '') { ?>
					<div class="htm-data r-data" style="width:<?php echo $menu['brands']['r_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['brands'][$r][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
				</div>

				<?php 
				// Bottom HTML data
				if (isset($menu['brands'][$b][$l_id]) && $menu['brands'][$b][$l_id] != '') { ?>
				<div class="htm-data b-data">
				<?php echo htmlspecialchars_decode($menu['brands'][$b][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
			</div>

		</div>
		<?php } ?>
	</li>
	<?php }

	/* Products menu
	******************************/
	if ($menu['menu_type'] == 'products') { 
		$products_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$products_url          = isset($menu['products']['url']) && $menu['products']['url'] != '' ? ' href="'.$menu['products']['url'].'"' : null;
		$products_open         = isset($menu['products']['open']) && $menu['products']['open'] == 'y' ? " target='_blank'" : null;
		$products_name         = isset($menu['products']['name'][$l_id]) ? $menu['products']['name'][$l_id] : null;
		$products_lbl_top      = isset($menu['products']['lbl_top'])? " style='top:".$menu['products']['lbl_top']."px'" : null; 
		$products_lbl_bg       = isset($menu['products']['lbl_bg']) ? 'background-color: #'.$menu['products']['lbl_bg'].';' : null;
		$products_lbl_bdrbg    = isset($menu['products']['lbl_bg']) ? " style='border-top-color: #".$menu['products']['lbl_bg'].";'" : null; 
		$products_lbl_txtcolor = isset($menu['products']['lbl_txtcolor']) ? 'color: #'.$menu['products']['lbl_txtcolor'].';' : null;
		$products_lbl_text     = isset($menu['products']['lbl_text'][$l_id]) ? $menu['products']['lbl_text'][$l_id] : null;

	?><li<?php echo $products_class; ?>>
		<a<?php echo $products_url; ?><?php echo $products_open; ?> title="<?php echo $products_name; ?>" class="top-lvl"><?php 

			if (isset($menu['products']['lbl_text'][$l_id]) && $menu['products']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $products_lbl_top; ?>><b<?php 
				if (isset($menu['products']['lbl_bg']) || isset($menu['products']['lbl_txtcolor'])) { 
				?> style="<?php echo $products_lbl_bg . $products_lbl_txtcolor;	?>"<?php } ?>><?php echo $products_lbl_text; ?><i<?php echo $products_lbl_bdrbg; ?>></i></b></span><?php 
			} 
			?><?php echo $products_name; ?></a>

		<?php 
		/* Product standard menu
		******************************/
		if ($menu['products']['type'] == 'normal') {
		if (isset($this->document->prdmenu_data[$menuId]) && !empty($this->document->prdmenu_data[$menuId])) { ?>
		<div class="sub-menu menu_prd">
			<ul>
				<?php foreach ($this->document->prdmenu_data[$menuId] as $prd_data) { 
					$prd_data_href = isset($prd_data['href']) ? $prd_data['href'] : null;
					$prd_data_name = isset($prd_data['name']) ? $prd_data['name'] : null;
					$prd_data_img  = isset($prd_data['image']) ? $prd_data['image'] : null;
				?><li>
					<a href="<?php echo $prd_data_href; ?>" title="<?php echo $prd_data_name; ?>" class="sub-lvl">
						<?php if ($menu['products']['prd_img'] == 'y') { ?>
						<span class="menu_img"><img src="<?php echo $prd_data_img; ?>" alt="<?php echo $prd_data_name; ?>" /></span>
						<span class="menu_name">
							<?php echo $prd_data['name']; ?>
							<?php if (!$prd_data['special']) { ?>
							<span class="price"><?php echo $prd_data['price']; ?></span>
							<?php } else { ?>
							<span class="price"><?php echo $prd_data['special']; ?><span class="price-old"><?php echo $prd_data['price']; ?></span></span>
							<?php } ?>
						</span>
						<?php } else { ?>
						<?php echo $prd_data['name']; ?>
						<?php } ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } } else { 

		/* Product mega menu
		******************************/?>
		<div class="sub-menu menu-html-wrp">
			<div class="menu-html menu-mega prd-mega">
				<?php 
				// Top HTML data
				if (isset($menu['products'][$t][$l_id]) && $menu['products'][$t][$l_id] != '') { ?>
				<div class="htm-data t-data">
				<?php echo htmlspecialchars_decode($menu['products'][$t][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
				
				<div class="menu-mg-data-wrp">
					<?php 
					// Left HTML data
					if (isset($menu['products'][$l][$l_id]) && $menu['products'][$l][$l_id] != '') { ?>
					<div class="htm-data l-data" style="width:<?php echo $menu['products']['l_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['products'][$l][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>

					<div class="c-data">
						<?php 
						$i = 1;
						$j = 1;
						$col = isset($menu['products']['columns']) && $menu['products']['columns'] != '' ? $menu['products']['columns'] : 4;
						if (isset($this->document->prdmenu_data[$menuId])) {
							$count = count($this->document->prdmenu_data[$menuId]);
							foreach ($this->document->prdmenu_data[$menuId] as $prd_data) { 
								$prd_data_href = isset($prd_data['href']) ? $prd_data['href'] : null;
								$prd_data_name = isset($prd_data['name']) ? $prd_data['name'] : null;
								$prd_data_img = isset($prd_data['image']) ? $prd_data['image'] : null;
								if ($i > $col) { $i = 1; }
								if ($i == 1) { echo '<div class="menu-mg-data">'; } ?>
							<div class="prd-grid">
								<div class="menu-prd">
									<a href="<?php echo $prd_data_href; ?>" class="img"><img src="<?php echo $prd_data_img; ?>" alt="<?php echo $prd_data_name; ?>" /></a>
									<a href="<?php echo $prd_data_href; ?>" class="name"><?php echo $prd_data_name; ?></a>
									<?php if ($prd_data['price']) { ?>
									<div class="price-wrp">
										<?php if (!$prd_data['special']) { ?>
										<span class="price-new"><?php echo $prd_data['price']; ?></span>
										<?php } else { ?>
										<span class="price-old"><?php echo $prd_data['price']; ?></span>
										<span class="price-new"><?php echo $prd_data['special']; ?></span>
										<?php } ?>
									</div>
									<?php } ?>
									<a class="addcart-bt" title="<?php echo $this->language->get('button_cart'); ?>" onclick="addToCart('<?php echo $prd_data['product_id']; ?>');"><?php echo $this->language->get('button_cart'); ?></a>
								</div>
							</div>
							<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
							<?php if ($j == $count && $i != $col) { echo '</div>'; } ?>
							<?php $i++; $j++; } 
						} ?>
					</div>

					<?php 
					// Right HTML data
					if (isset($menu['products'][$r][$l_id]) && $menu['products'][$r][$l_id] != '') { ?>
					<div class="htm-data r-data" style="width:<?php echo $menu['products']['r_width']; ?>px;">
					<?php echo htmlspecialchars_decode($menu['products'][$r][$l_id], ENT_QUOTES ); ?>
					</div>
					<?php } ?>
				</div>

				<?php 
				// Bottom HTML data
				if (isset($menu['products'][$b][$l_id]) && $menu['products'][$b][$l_id] != '') { ?>
				<div class="htm-data b-data">
				<?php echo htmlspecialchars_decode($menu['products'][$b][$l_id], ENT_QUOTES ); ?>
				</div>
				<?php } ?>
			</div>

		</div>
		<?php } ?>
	</li>
	<?php }
	
	/* Custom html mega menu
	******************************/
	if ($menu['menu_type'] == 'custom_html') { 
		$custom_html_class        = isset($menu['class']) ? ' class="'.$menu['class'].'"' : null;
		$custom_html_url          = isset($menu['custom_html']['url']) && $menu['custom_html']['url'] != '' ? ' href="'.$menu['custom_html']['url'].'"' : null;
		$custom_html_open         = isset($menu['custom_html']['open']) && $menu['custom_html']['open'] == 'y' ? " target='_blank'" : null;
		$custom_html_name         = isset($menu['custom_html']['name'][$l_id]) ? $menu['custom_html']['name'][$l_id] : null;
		$custom_html_lbl_top      = isset($menu['custom_html']['lbl_top'])? " style='top:".$menu['custom_html']['lbl_top']."px'" : null;;
		$custom_html_lbl_bg       = isset($menu['custom_html']['lbl_bg']) ? 'background-color: #'.$menu['custom_html']['lbl_bg'].';' : null;
		$custom_html_lbl_bdrbg    = isset($menu['custom_html']['lbl_bg']) ? " style='border-top-color: #".$menu['custom_html']['lbl_bg'].";'" : null;
		$custom_html_lbl_txtcolor = isset($menu['custom_html']['lbl_txtcolor']) ? 'color: #'.$menu['custom_html']['lbl_txtcolor'].';' : null;
		$custom_html_lbl_text     = isset($menu['custom_html']['lbl_text'][$l_id]) ? $menu['custom_html']['lbl_text'][$l_id] : null;

	?><li<?php echo $custom_html_class; ?>>
		<a<?php echo $custom_html_url; ?><?php echo $custom_html_open; ?> title="<?php echo $custom_html_name; ?>" class="top-lvl"><?php 

			if (isset($menu['custom_html']['lbl_text'][$l_id]) && $menu['custom_html']['lbl_text'][$l_id] != '') { 
			?><span class="menu-badge"<?php echo $custom_html_lbl_top; ?>><b<?php 
				if (isset($menu['custom_html']['lbl_bg']) || isset($menu['custom_html']['lbl_txtcolor'])) { 
				?> style="<?php echo $custom_html_lbl_bg.$custom_html_lbl_txtcolor; ?>"<?php } ?>><?php echo $custom_html_lbl_text; ?><i<?php echo $custom_html_lbl_bdrbg; ?>></i></b></span><?php 
			} 
			?><?php echo $custom_html_name; ?></a>

		<?php if (isset($menu['custom_html']['htmlData'][$l_id]) && !empty($menu['custom_html']['htmlData'][$l_id])) { ?>
		<div class="sub-menu menu-html-wrp">
			<div class="menu-html" style="<?php echo 'width:'.$menu['custom_html']['width'].'px;'; ?>">
				<?php echo htmlspecialchars_decode($menu['custom_html']['htmlData'][$l_id], ENT_QUOTES ); ?>
			</div>
		</div>
		<?php } ?>
	</li>
	<?php } ?>
		
<?php } } } ?>



