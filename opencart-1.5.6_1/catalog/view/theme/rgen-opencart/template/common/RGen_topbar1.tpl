<?php if($this->rgen->device == 'm' && $this->config->get('RGen_reaponsive_status') == 1){ ?>
<?php if($this->config->get('RGen_logoPosition_status') == 1 || $this->config->get('RGen_menulayout') == 'fw') { ?>
<div class="store-logo1"><?php if ($logo) { ?><a href="<?php echo $home; ?>" id="logo"><?php echo "<img src=\"$logo\" title=\"$name\" alt=\"$name\" />"; ?></a><?php } ?></div>
<?php } ?>
<?php } ?>
<header id="header"<?php if ($this->config->get('RGen_logoPosition_status') == 1 || $this->config->get('RGen_menulayout') == 'fw') { ?> class="logo-in-header"<?php } ?>>
	
	<?php if($this->rgen->device == 'd' || $this->rgen->device == 't'){ ?>
	<?php if ($this->config->get('RGen_logoPosition_status') == 1 || $this->config->get('RGen_menulayout') == 'fw') { ?>
	<div class="store-logo1"><?php if ($logo) { ?><a href="<?php echo $home; ?>" id="logo"><?php echo "<img src=\"$logo\" title=\"$name\" alt=\"$name\" />"; ?></a><?php } ?></div>
	<?php } } ?>
	
	<div id="welcome">
		<?php if (!$logged) { ?>
		<?php echo $text_welcome; ?>
		<?php } else { ?>
		<?php echo $text_logged; ?>
		<?php } ?>
	</div>
	
	<div id="search">
		<div class="button-search"></div>
		<span class="search-box"><input type="text" name="search" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>" /></span>
	</div>

	<?php if($this->rgen->device == 'm' && $this->config->get('RGen_reaponsive_status') == 1){ ?>
	<div class="top-options">
		<?php echo $cart; ?>
		<?php echo $currency; ?>
		<?php echo $language; ?>
		<div class="dd">
			<span class="dd-hdl"></span>
			<ul class="dd-data">
				<li><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a></li>
				<li><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a></li>
				<li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
				<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
			</ul>
		</div>
	</div>
	<?php } else { ?>
	<div class="top-options">
		<?php echo $cart; ?>
		<?php echo $currency; ?>
		<?php echo $language; ?>
		<?php if($this->config->get('RGen_header_links') == 'dd' || $this->rgen->device == 'm'){ ?>
		<div class="dd">
			<span class="dd-hdl"></span>
			<ul class="dd-data">
				<li><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a></li>
				<li><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a></li>
				<li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
				<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
			</ul>
		</div>
		<?php } else { ?>
		<div class="links">
			<a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a>
			<a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a>
			<a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a>
			<a href="<?php echo $account; ?>"><?php echo $text_account; ?></a>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	
</header>