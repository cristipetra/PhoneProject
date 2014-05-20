<div class="prd-block2">
	<div class="image">
		<?php if ($product['special']) { 
			
			$l_id 		= $this->config->get('config_language_id'); 
			$offerTag 	= $this->config->get('RGenTagData');
			if (isset($offerTag)) {
				$bg 		= isset($offerTag['bg']) && $offerTag['bg'] != '' ? 'background-color: #'.$offerTag['bg'].';' : null;
				$txtcolor	= isset($offerTag['txtcolor']) && $offerTag['txtcolor'] != '' ? 'color: #'.$offerTag['txtcolor'].';' : null;
				$cls 		= isset($offerTag['style']) && $offerTag['style'] == '0' ? 'discount-tag' : 'discount-tag'.$offerTag['style'];
				$tgstyle 	= ' style="'. $bg . $txtcolor . '"';

				if ($offerTag['style'] == 0) {
					$bdr = isset($offerTag['bg']) ? ' style="border-color: #'.$offerTag['bg'].' transparent;"' : null;	
				}elseif ($offerTag['style'] == 1) {
					$bdr = isset($offerTag['bg']) ? ' style="border-color: transparent transparent transparent #'.$offerTag['bg'].';"' : null;	
				}elseif ($offerTag['style'] == 4) {
					$bdr = isset($offerTag['bg']) ? ' style="border-color: transparent #'.$offerTag['bg'].';"' : null;	
				}elseif ($offerTag['style'] == 5) {
					$bdr = isset($offerTag['bg']) ? ' style="border-color: #'.$offerTag['bg'].' transparent transparent transparent;"' : null;
				}else{
					$bdr = null;
				}
			}

			if (!isset($offerTag) || $offerTag['type'] == "default" || $offerTag['type'] == "") { ?>
			<span class="offer-tag"></span>
			<?php } ?>

			<?php if (isset($offerTag) && $offerTag['type'] == "img") { ?>
			<span class="offer-tag"<?php echo isset($offerTag['image']) ? ' style="background: url(image/'. $offerTag['image']. ') no-repeat center center;"' : null; ?>></span>
			<?php } ?>

			<?php if (isset($offerTag) && $offerTag['type'] == "txt") { ?>
			<span class="<?php echo $cls; ?>"<?php echo $tgstyle; ?>>
				<span><?php echo isset($offerTag['text'][$l_id]) ? $offerTag['text'][$l_id] : null; ?></span><i<?php echo $bdr; ?>></i>
			</span>
			<?php } ?>

			<?php if (isset($offerTag) && $offerTag['type'] == "dis") { ?>
			<span class="<?php echo $cls; ?>"<?php echo $tgstyle; ?>>
				<?php 
					$price1 = $product['price'];
					$price2 = $product['special'];
			
					$oldPrice = preg_replace( '#\D*?(\d+(\.\d+)?)\D*#', '$1', $price1);
					$newPrice = preg_replace( '#\D*?(\d+(\.\d+)?)\D*#', '$1', $price2);
			
					$diff = $oldPrice - $newPrice;
					
					$discuountCal = 100 * $diff / $oldPrice;
					$discuount = round($discuountCal, 2) . '%';
				?>
				<span><?php echo $discuount; ?></span><i<?php echo $bdr; ?>></i>
			</span>
			<?php } ?>
		<?php } ?>
        <a href="<?php echo $product['href']; ?>">
			<?php if ($product['thumb']) { ?>
			<img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" />
			<?php } ?>
		</a>
	</div>
	<div class="info-wrp">
		<div class="info">
			<strong class="nameText"><a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a></strong>
			<?php if ($review_status) { ?>
			<div class="rating"><span class="sml-stars stars-<?php echo $product['rating']; ?>" title="<?php echo $product['reviews']; ?>"></span></div>
			<?php } ?>
			<?php if ($product['price']) { ?>
			<div class="price">
				<?php if (!$product['special']) { ?>
				<span class="price-new"><?php echo $product['price']; ?></span>
				<?php } else { ?>
				<span class="price-old"><?php echo $product['price']; ?></span>
				<span class="price-new"><?php echo $product['special']; ?></span>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="buy-option">
				<a class="addtocart" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a>
				<span class="otherbtn">
					<a class="prdbt wish" onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $button_wishlist; ?>"><?php echo $button_wishlist; ?></a>
					<a class="prdbt compare" onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $button_compare; ?>"><?php echo $button_compare; ?></a>
				</span>
			</div>
		</div>
	</div>
</div>