<?php foreach ($products as $product) { ?>
<div class="prd-block">
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
				<span><?php echo isset($offerTag['text'][$l_id])?$offerTag['text'][$l_id]:null; ?></span><i<?php echo $bdr; ?>></i>
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
			<div class="description"><?php echo $product['description']; ?></div>
			<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
			<span class="cart-button"><a class="cart-bt" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a></span>
			<ul>
				<li><a href="<?php echo $product['href']; ?>"><?php echo $this->language->get('button_moreinfo'); ?> <span>&#8250;</span></a></li>
				<li><a onclick="addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $button_wishlist; ?> <span>&#8250;</span></a></li>
				<li class="last"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $button_compare; ?> <span>&#8250;</span></a></li>
			</ul>
		</div>
		<?php if ($product['price']) { ?>
		<div class="price">
			<?php if (!$product['special']) { ?>
			<span class="price-new"><?php echo $product['price']; ?></span>
			<?php } else { ?>
			<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
			<?php } ?>
			<?php if ($product['tax']) { ?>
			<span class="price-tax"><?php echo $text_tax; ?><br />
			<?php echo $product['tax']; ?></span>
			<?php } ?>
		</div>
		<?php } ?>
		
	</div>
</div>
<?php } ?>

<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		
		$('.product-grid').attr('class', 'product-list');
		
		
		$('.product-list > .prd-block').each(function(index, element) {
			
			$('.grid-block').off('hover');
			$('.product-grid > .prd-block').addClass('list-block');
			
			// PRODUCT IMAGE
			var image = $(element).find('.image').html();
			html = '<div class="image">' + image + '</div>';
			
			html += '<div class="info-wrp">'
			html += '	<div class="info">'
			html += '		<strong class="nameText">' + $(element).find('.nameText').html() + '</strong>';
			html += '		<div class="description">'+ $(element).find('.description').html() +'</div>';
			html += '		<div class="buy-option">';
			html += '			<span class="cart-button">' + $(element).find('.cart-button').html() + '</span>';
			html += '			<ul>' + $(element).find('ul').html() + '</ul>';
			html += '		</div>';
			html += '	</div>'
			
			var price = $(element).find('.price').html();
			if (price != null) {
				html += '<div class="price-wrp">';	
				html += '<div class="price">' + price  + '</div>';
				html += '</div>';
			}
			
			html += '</div>';
			$(element).html(html);
			
		});		
		
		$('.display').html('<a onclick="display(\'grid\');" class="grid-bt"><?php echo $text_grid; ?></a><b class="list-bt"><?php echo $text_list; ?></b>');
		
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > .prd-block').each(function(index, element) {
			$('.product-grid > .prd-block').addClass('grid-block');
					
			// PRODUCT IMAGE
			var image = $(element).find('.image').html();
			html = '<div class="image">' + image + '</div>';
			
			html += '<div class="info-wrp">'
			html += '	<div class="info">'
			html += '		<strong class="nameText">' + $(element).find('.nameText').html() + '</strong>';
			html += '		<div class="description" style="display:none;">'+ $(element).find('.description').html() +'</div>';
			html += '		<span class="cart-button">' + $(element).find('.cart-button').html() + '</span>';
			html += '		<ul>' + $(element).find('ul').html() + '</ul>';
			html += '	</div>'
			
			// PRODUCT PRICE
			var price = $(element).find('.price').html();
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			
			html += '</div>';
			
			$(element).html(html);
			
			
		});	
					
		$('.display').html('<b class="grid-bt"><?php echo $text_grid; ?></b><a onclick="display(\'list\');" class="list-bt"><?php echo $text_list; ?></a>');
		
		$.totalStorage('display', 'grid');
		
		$('.grid-block').on('hover');
	}
}

view = $.totalStorage('display');

if (view) { 
	display(view);
} else {
	<?php if ($this->config->get('RGen_prdList_defaultView') == 'grid') { ?>
	display('grid');
	<?php }else { ?>
	display('list');
	<?php } ?>
}
//--></script> 