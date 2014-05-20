<?php 
if ($this->config->get('RGen_occat_status') == 1 || $this->config->get('RGen_occat_status') == "") {
/* TOP LEVEL */
foreach ($categories as $category) { ?>
<li><a href="<?php echo $category['href']; ?>" class="top-lvl"><?php echo $category['name']; ?></a>
	
	<?php /* RGen MULTI LEVEL MENU
	**************************************/
	if ($this->config->get('RGen_multiLevelMenu_status') == 1) { ?>
	
		<?php 
		/* SUB LEVEL - 1 */
		if ($category['children']) { ?>
		<div class="sub-menu">
			<?php for ($i = 0; $i < count($category['children']);) { ?>
				<ul>
					<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
					<?php for (; $i < $j; $i++) { ?>
					
					<?php 
					/* SUB LEVEL - 2 */
					if (isset($category['children'][$i])) { ?>
						<?php if ($category['children'][$i]['level1']) { ?>
						<li class="sub">
							<a href="<?php echo $category['children'][$i]['href']; ?>" class="sub-lvl">
								<?php echo $category['children'][$i]['name']; ?>
							</a>
							<div class="sub-menu">
								<ul>
									
									<?php 
									/* SUB LEVEL - 3 */
									$k = 0;
									foreach ($category['children'][$i]['level1'] as $category_3) { ?>
									<?php if (isset($category['children'][$i]['level1'][$k]['level2'])) { 
									
									?>
									<li class="sub"><a href="<?php echo $category_3['href']; ?>" class="sub-lvl"><span><?php echo $category_3['name']; ?></span></a>
										<div class="sub-menu">
											<ul>
												<?php foreach ($category['children'][$i]['level1'][$k]['level2'] as $category_4) { ?>
												<li><a href="<?php echo $category_4['href']; ?>" class="sub-lvl"><span><?php echo $category_4['name']; ?></span></a></li>
												<?php } ?>
											</ul>
										</div>
									<?php }else { ?>
									<li><a href="<?php echo $category_3['href']; ?>" class="sub-lvl"><span><?php echo $category_3['name']; ?></span></a>
									<?php } ?>
									</li>
									<?php $k++; } 
									/* SUB LEVEL - 3 */
									?>
									
								</ul>
							</div>
						<?php }else { ?>
						<li>
							<a href="<?php echo $category['children'][$i]['href']; ?>" class="sub-lvl">
								<span><?php echo $category['children'][$i]['name']; ?></span>
							</a>
						<?php } ?>
						</li>
					<?php } 
					/* SUB LEVEL - 2 */
					?>
					<?php } ?>
				</ul>
				<?php } ?>
		</div>
		<?php } 
		/* SUB LEVEL - 1 */
		?>
	
	<?php /* OC MENU
	**************************************/
	} else { ?>
							
		<?php if ($category['children']) { ?>
		<div class="sub-menu">
			<?php for ($i = 0; $i < count($category['children']);) { ?>
			<ul>
				<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
				<?php for (; $i < $j; $i++) { ?>
				<?php if (isset($category['children'][$i])) { ?>
				<li><a href="<?php echo $category['children'][$i]['href']; ?>" class="sub-lvl"><?php echo $category['children'][$i]['name']; ?></a></li>
				<?php } ?>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<?php } ?>
	
	<?php } ?>
</li>
<?php } } ?>