<div id="cart">
	<div class="heading">
		<a>
			<span id="cart-total">
				
			</span>
		</a>
	</div>
	<div class="content">
		<b class="cart-arrow"></b>
		<?php if ($products || $vouchers) { ?>
		<div class="mini-cart-info">
			<table>
				<?php foreach ($products as $product) { ?>
				<tr>
					<td class="image">
						<?php if ($product['thumb']) { ?>
							<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
						<?php } ?>
					</td>
					<td class="name">
						<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
						<?php foreach ($product['option'] as $option) { ?>
						<span><strong><?php echo $option['name']; ?></strong> <?php echo $option['value']; ?></span><br />
						<?php } ?>
						<?php if ($product['recurring']): ?>
						<span><strong><?php echo $text_payment_profile ?></strong> <?php echo $product['profile']; ?></span><br />
						<?php endif; ?>
					</td>
					<td class="total">
						<strong><?php echo $product['quantity']; ?> x <?php echo $product['price']; //echo $product['total']; ?></strong>
						<a onclick="(getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') ? location = 'index.php?route=checkout/cart&remove=<?php echo $product['key']; ?>' : $('#cart').load('index.php?route=module/cart&remove=<?php echo $product['key']; ?>' + ' #cart > *', function(){cartChk();});" class="remove-link" title="<?php echo $button_remove; ?>"><?php echo $button_remove; ?></a>
					</td>
				</tr>
				<?php } ?>
				<?php foreach ($vouchers as $voucher) { ?>
				<tr>
					<td class="image"><span><img src="catalog/view/theme/rgen-opencart/image/rgen/giftcard.png" alt="<?php echo $voucher['description']; ?>" title="<?php echo $voucher['description']; ?>" /></span></td>
					<td class="name"><?php echo $voucher['description']; ?></td>
					<td class="total">
						<strong>1 x <?php echo $voucher['amount']; ?></strong>
						<a onclick="(getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') ? location = 'index.php?route=checkout/cart&remove=<?php echo $voucher['key']; ?>' : $('#cart').load('index.php?route=module/cart&remove=<?php echo $voucher['key']; ?>' + ' #cart > *', function(){cartChk();});" class="remove-link" title="<?php echo $button_remove; ?>"><?php echo $button_remove; ?></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="mini-cart-total">
			<div class="checkout">
				<a href="<?php echo $cart; ?>" class="sml-button"><?php echo $text_cart; ?></a><br />
				<a href="<?php echo $checkout; ?>" class="sml-button dark-bt"><?php echo $text_checkout; ?></a><br />
				<a class="sml-button cart-close"><?php echo $this->language->get('text_cartclose'); ?></a><br />
			</div>
			<table>
				<?php foreach ($totals as $total) { ?>
				<tr>
					<td align="right"><b><?php echo $total['title']; ?>:</b></td>
					<td align="right"><?php echo $total['text']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		
		<?php } else { ?>
		<div class="empty">
			<?php echo $text_empty; ?>
			
			<span class="empty-cart">
			<?php foreach ($totals as $total) { ?>
				<span><?php echo $total['text']; ?></span>
			<?php } ?>
			</span>
			
		</div>
		
		
		<?php } ?>
	</div>
</div>

<script type="text/javascript">

function cartChk(){
		
	var getTotal = $('.mini-cart-total').find('tr:last').find('td:last').html();
	var emptyTotal = $('.empty-cart').find('span:last').text();

	if(getTotal != null){
		$('#cart').find('#cart-total').html(getTotal);
	}else{
		$('#cart-total').text(emptyTotal);
		$('.empty-cart').empty();
	}
	if ($(window).width() < 767) {
		$("#header #cart .content").css({width:$("#container").outerWidth()+'px'});
		
	}
}

cartChk();

$(window).on('click', '#cart > .heading a', function() {
	
	$('#cart').addClass('active');
	
	$('#cart').load('index.php?route=module/cart #cart > *', function(){
		cartChk();
		//removePrd();

	});

});
$(window).on('mouseleave', '#cart', function() {
	$(this).removeClass('active');
});
$(window).on('click', '#cart .cart-close', function() {
	$("#cart").removeClass('active');
});

</script>