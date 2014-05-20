<?php if ($this->config->get('RGen_allcat_status') == 1) { 
$l_id = $this->config->get('config_language_id');
$menuname = $this->config->get('RGen_allcat_name')[$l_id];
?>

<?php if ($this->config->get('RGen_allcat_style') == 'nr' || $this->config->get('RGen_allcat_style') == '') { ?>
<li><a title="" class="top-lvl"><?php echo isset($menuname) && $menuname != '' ? $menuname : 'Categories'; ?></a>
	<div class="sub-menu">
		<ul>
			<?php 
			/* TOP LEVEL */
			foreach ($this->document->RGen_allcatdata as $category) { ?>
			<li>
				<a href="<?php echo $category['maincat']['href']; ?>" class="sub-lvl"><?php echo $category['maincat']['name']; ?></a>
				<?php if ($category['level_1']) { ?>
				<div class="sub-menu">
					<ul>
						<?php 
						/* SUB LEVEL - 1 */
						foreach ($category['level_1'] as $l1_value) { ?>
						<li>
							<a href="<?php echo $l1_value['href']; ?>" class="sub-lvl"><?php echo $l1_value['name']; ?></a>

							<?php if (isset($category['level_2'][$l1_value['category_id']])) { 
								//echo "<pre style='color:#;'>" . print_r($l1_value, TRUE) . "</pre>";
							?>
							<div class="sub-menu">
								<ul>
									<?php 
									/* SUB LEVEL - 2 */
									foreach ($category['level_2'][$l1_value['category_id']] as $l2_value) { ?>
									<li>
									<a href="<?php echo $l2_value['href']; ?>" class="sub-lvl"><?php echo $l2_value['name']; ?></a>

										<?php if (isset($category['level_3'][$l2_value['category_id']])) { 
											//echo "<pre style='color:#;'>" . print_r($l1_value, TRUE) . "</pre>";
										?>
										<div class="sub-menu">
											<ul>
												<?php 
												/* SUB LEVEL - 2 */
												foreach ($category['level_3'][$l2_value['category_id']] as $l3_value) { ?>
												<li><a href="<?php echo $l3_value['href']; ?>" class="sub-lvl"><?php echo $l3_value['name']; ?></a></li>
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
				<?php } 
				/* SUB LEVEL - 1 */
				?>
			</li>
			<?php } ?>

		</ul>
	</div>
</li>
<?php } else { ?>

<li class="cat-mega">
	<a title="" class="top-lvl"><?php echo isset($menuname) && $menuname != '' ? $menuname : 'Categories'; ?></a>
	<div class="sub-menu menu-html-wrp">
		<div class="menu-html">
		<?php 
		//echo "<pre style='color:#;'>" . print_r($this->config->get('RGen_allcat_name'), TRUE) . "</pre>";
		if(isset($this->document->RGen_allcatdata)) {
		$i = 1;
		$col = $this->config->get('RGen_allcat_column');
		$col = isset($col) && $col != '' ? $col : 4;
		foreach ($this->document->RGen_allcatdata as $category) { 
			if(isset($category['maincat']['href'])){ ?>
			<?php 
			if ($i > $col) { $i = 1; } ?>
			<?php if ($i == 1) { echo '<div class="cat-mg-data">'; } ?>
			<div class="cat-grid">
				<a href="<?php echo $category['maincat']['href']; ?>" class="cat-main"><?php echo $category['maincat']['name']; ?></a>
				<?php if ($category['level_1']) { ?>
				<ul class="cat-sub">
					<?php 
					$j = 1;
					foreach ($category['level_1'] as $l1_value) { 
					if($j <= $this->config->get('RGen_allcat_maxsub') || $this->config->get('RGen_allcat_maxsub') == ''){
					?>
					<li class="cat-sub-list">
						<a href="<?php echo $l1_value['href']; ?>"><?php echo $l1_value['name']; ?></a>

						<?php if (isset($category['level_2'][$l1_value['category_id']])) { ?>
						<div class="sub-menu">
							<ul>
								<?php 
								/* SUB LEVEL - 2 */
								foreach ($category['level_2'][$l1_value['category_id']] as $l2_value) { ?>
								<li>
								<a href="<?php echo $l2_value['href']; ?>" class="sub-lvl"><?php echo $l2_value['name']; ?></a>

									<?php if (isset($category['level_3'][$l2_value['category_id']])) { 
										//echo "<pre style='color:#;'>" . print_r($l1_value, TRUE) . "</pre>";
									?>
									<div class="sub-menu">
										<ul>
											<?php 
											/* SUB LEVEL - 2 */
											foreach ($category['level_3'][$l2_value['category_id']] as $l3_value) { ?>
											<li><a href="<?php echo $l3_value['href']; ?>" class="sub-lvl"><?php echo $l3_value['name']; ?></a></li>
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
					<?php } $j++; }?>
				</ul>
				<?php } ?>
			</div>
			<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
		<?php } $i++; } ?>
		<?php } ?>
		</div>
	</div>
</li>
<?php } ?>

<?php } ?>