<?php if ($this->config->get('RGen_prdmenu_status') == 1) {
$l_id = $this->config->get('config_language_id');
$menuname = $this->config->get('RGen_prdmenu_name')[$l_id];
?>
<li class="prd-mega">
	<a title="" class="top-lvl"><?php echo isset($menuname) && $menuname != '' ? $menuname : 'Products'; ?></a>
	<div class="sub-menu menu-html-wrp">
		<div class="menu-html">
		<?php 
		if(isset($this->document->RGen_prdmenu_data)) {
		$i = 1;
		$col = $this->config->get('RGen_prdmenu_col');
		$col = isset($col) && $col != '' ? $col : 6;
		foreach ($this->document->RGen_prdmenu_data as $prd_info) { 
			if(isset($prd_info['product_id'])){ ?>
			<?php if ($i > $col) { $i = 1; } ?>
			<?php if ($i == 1) { echo '<div class="prd-mg-data">'; } ?>
			<div class="prd-grid">
				<div class="menu-prd">
					<a href="<?php echo $prd_info['href']; ?>" class="img"><img src="<?php echo $prd_info['image']; ?>" title="<?php echo $prd_info['name']; ?>"></a>
					<a href="<?php echo $prd_info['href']; ?>" class="name"><?php echo $prd_info['name']; ?></a>
					<?php if ($prd_info['price']) { ?>
					<div class="price-wrp">
						<?php if (!$prd_info['special']) { ?>
						<span class="price-new"><?php echo $prd_info['price']; ?></span>
						<?php } else { ?>
						<span class="price-old"><?php echo $prd_info['price']; ?></span>
						<span class="price-new"><?php echo $prd_info['special']; ?></span>
						<?php } ?>
					</div>
					<?php } ?>
					<a class="addcart-bt" title="<?php echo $this->language->get('button_cart'); ?>" onclick="addToCart('<?php echo $prd_info['product_id']; ?>');"><?php echo $this->language->get('button_cart'); ?></a>
				</div>
			</div>
			<?php if ($i == $col) { echo '</div><b class="hr"></b>'; } ?>
		<?php } $i++; } ?>
		<?php } ?>
		</div>
	</div>
</li>

<?php } ?>