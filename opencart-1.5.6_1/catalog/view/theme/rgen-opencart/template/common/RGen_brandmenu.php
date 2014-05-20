<?php if ($this->config->get('RGen_brand_status') == 1) { 
$l_id = $this->config->get('config_language_id');
$menuname = $this->config->get('RGen_brand_name')[$l_id];
?>
<li class="brand-mega">
	<a title="" class="top-lvl"><?php echo isset($menuname) && $menuname != '' ? $menuname : 'Brands'; ?></a>
	<div class="sub-menu menu-html-wrp">
		<div class="menu-html">
		<?php 
		if(isset($this->document->RGen_branddata)) {
		$i = 1;
		$col = $this->config->get('RGen_brand_col');
		$col = isset($col) && $col != '' ? $col : 6;
		foreach ($this->document->RGen_branddata as $brand_info) { 
			if(isset($brand_info['manufacturer_id'])){ ?>
			<?php if ($i > $col) { $i = 1; } ?>
			<?php if ($i == 1) { echo '<div class="brand-mg-data">'; } ?>
			<div class="brand-grid">
				<a href="<?php echo $brand_info['href']; ?>" class="cat-main">
					<img src="<?php echo $brand_info['image']; ?>" title="<?php echo $brand_info['name']; ?>">
					<strong><?php echo $brand_info['name']; ?></strong>
				</a>
			</div>
			<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
		<?php } $i++; } ?>
		<?php } ?>
		</div>
	</div>
</li>

<?php } ?>