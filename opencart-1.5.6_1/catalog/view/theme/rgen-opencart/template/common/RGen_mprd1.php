<div class="m-prd">
	<div class="image">
		<?php if ($product['special']) { ?>
		<span class="offer-tag"></span>
		<?php } ?>
		<a href="<?php echo $product['href']; ?>">
			<?php if ($product['thumb']) { ?>
			<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
			<?php } ?>
		</a>
	</div>
	<div class="info">
		<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
		<?php if ($product['price']) { ?>
		<div class="price-wrp">
			<?php if (!$product['special']) { ?>
			<?php echo $product['price']; ?>
			<?php } else { ?>
			<span class="price-old"><?php echo $product['price']; ?></span>
			<?php echo $product['special']; ?>
			<?php } ?>
			<?php if ($product['tax']) { ?>
			<span class="price-tax"><?php echo $text_tax; ?><?php echo $product['tax']; ?></span>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="description"><?php echo $product['description']; ?></div>
		<ul>
			<li><a class="addcart-bt" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a></li>
			<li>
				<a class="wish-bt" onclick="addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $this->language->get('button_wishlist'); ?> <span>&#8250;</span></a>
				<a class="compare-bt" onclick="addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $this->language->get('button_compare'); ?> <span>&#8250;</span></a>
				<a class="more-bt" href="<?php echo $product['href']; ?>"><?php echo $this->language->get('button_moreinfo'); ?> <span>&#8250;</span></a>
			</li>
		</ul>
	</div>
</div>