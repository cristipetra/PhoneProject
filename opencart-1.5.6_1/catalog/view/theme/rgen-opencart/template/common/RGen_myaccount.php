<?php if ($this->config->get('RGen_myac_status') == 1 && $this->config->get('RGen_myac_status') != '') { ?>
<li>
	<a title="<?php echo $text_account; ?>" class="top-lvl"><?php echo $this->language->get('text_account'); ?></a>
	<div class="sub-menu">
		<ul>
			<li><a href="<?php echo $account; ?>" class="sub-lvl"><?php echo $text_account; ?></a></li>
			<li><a href="<?php echo $order; ?>" class="sub-lvl"><?php echo $text_order; ?></a></li>
			<li><a href="<?php echo $wishlist; ?>" class="sub-lvl"><?php echo $text_wishlist; ?></a></li>
			<li><a href="<?php echo $newsletter; ?>" class="sub-lvl"><?php echo $text_newsletter; ?></a></li>
		</ul>
	</div>
</li>
<?php } ?>