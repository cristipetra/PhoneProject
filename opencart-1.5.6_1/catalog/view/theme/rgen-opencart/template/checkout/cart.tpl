<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body shopping-cart">
		
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?><?php if ($weight) { ?>&nbsp;(<?php echo $weight; ?>)<?php } ?></strong></h1>
		
		<?php if ($attention) { ?>
		<div class="attention"><?php echo $attention; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
		<?php } ?>
		<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
		<?php } ?>
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="cart-form">
			<div class="cart-info">
				<table border="">
					<thead>
						<tr id="thead">
							<td class="image"><?php echo $column_name; ?><?php //echo $column_image; ?></td>
							<td class="name"></td>
							<td class="quantity"><?php echo $column_quantity; ?></td>
							<td class="price"><?php echo $column_price; ?></td>
							<td class="total"><?php echo $column_total; ?></td>
						</tr>
					</thead>
					<tbody>
						<?php $update = 0; ?>
						<?php foreach ($products as $product) { ?>
						<?php if($product['recurring']): ?>
						<tr>
							<td colspan="5">
								<strong><?php echo $text_recurring_item ?></strong>
								<?php echo $product['profile_description'] ?>
							</td>
						</tr>
						<?php endif; ?>
						<tr>
							<td class="image"><?php if ($product['thumb']) { ?>
								<a href="<?php echo $product['href']; ?>" class="img-frame"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
								<?php } ?></td>
							<td class="name">
								<a href="<?php echo $product['href']; ?>" class="header-4"><?php echo $product['name']; ?> <?php if (!$product['stock']) { ?><span class="stock">***</span><?php } ?></a>
								<ul>
									<?php foreach ($product['option'] as $option) { ?>
									<li><strong><?php echo $option['name']; ?></strong>: <?php echo $option['value']; ?></li>
									<?php } ?>
									<?php if($product['recurring']): ?>
					                <li><strong><?php echo $text_payment_profile ?></strong>: <?php echo $product['profile_name'] ?></li>
					                <?php endif; ?>
									<li><strong><?php echo $column_model; ?></strong>: <?php echo $product['model']; ?></li>
									<?php if ($product['reward']) { ?>
									<li class="reward"><?php echo $product['reward']; ?></li>
									<?php } ?>
								</ul>
							</td>
							<td class="quantity">
								<input type="text" name="quantity[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>" size="1" />
								<input type="button" id="update-<?php echo $update; ?>" class="sml-button" alt="<?php echo $button_update; ?>" value="<?php echo $button_update; ?>" title="<?php echo $button_update; ?>" />
								<a href="<?php echo $product['remove']; ?>"><?php echo $button_remove; ?></a>
							</td>
							<td class="price"><?php echo $product['price']; ?></td>
							<td class="total"><?php echo $product['total']; ?></td>
						</tr>
						<?php $update++; ?>
						<?php } ?>
						<?php foreach ($vouchers as $vouchers) { ?>
						<tr>
							<td class="image"><span class="img-frame"><img src="catalog/view/theme/rgen-opencart/image/rgen/giftcard.png" alt="<?php echo $vouchers['description']; ?>" title="<?php echo $vouchers['description']; ?>" /></span></td>
							<td class="name"><?php echo $vouchers['description']; ?></td>
							<td class="quantity">
								<input type="text" name="" value="1" size="1" disabled="disabled" />
								<a href="<?php echo $vouchers['remove']; ?>"><?php echo $button_remove; ?></a>
							</td>
							<td class="price"><?php echo $vouchers['amount']; ?></td>
							<td class="total"><?php echo $vouchers['amount']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</form>
		
		<?php if ($coupon_status || $voucher_status || $reward_status || $shipping_status) { ?>
		<div class="cart-options">
			<!--<h2><?php echo $text_next; ?></h2> -->
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td class="tabs">
						<ul class="radio">
							<?php if ($shipping_status) { ?>
							<li class="highlight">
								<?php if ($next == 'shipping') { ?>
								<input type="radio" name="next" value="shipping" id="shipping_estimate" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="next" value="shipping" id="shipping_estimate" />
								<?php } ?>
								<label for="shipping_estimate"><?php echo $text_shipping_estimate; ?></label>
							</li>
							<?php } ?>
							<?php if ($coupon_status) { ?>
							<li class="highlight">
								<?php if ($next == 'coupon') { ?>
								<input type="radio" name="next" value="coupon" id="use_coupon" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="next" value="coupon" id="use_coupon" />
								<?php } ?>
								<label for="use_coupon"><?php echo $text_use_coupon; ?></label>
							</li>
							<?php } ?>
							<?php if ($voucher_status) { ?>
							<li class="highlight">
								<?php if ($next == 'voucher') { ?>
								<input type="radio" name="next" value="voucher" id="use_voucher" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="next" value="voucher" id="use_voucher" />
								<?php } ?>
								<label for="use_voucher"><?php echo $text_use_voucher; ?></label>
							</li>
							<?php } ?>
							<?php if ($reward_status) { ?>
							<li class="highlight">
								<?php if ($next == 'reward') { ?>
								<input type="radio" name="next" value="reward" id="use_reward" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="next" value="reward" id="use_reward" />
								<?php } ?>
								<label for="use_reward"><?php echo $text_use_reward; ?></label>
							</li>
							<?php } ?>
							
						</ul>
					</td>
					<td class="panes">
						<div id="coupon" class="pane" style="display: <?php echo ($next == 'coupon' ? 'block' : 'none'); ?>;">
							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
								<p><?php echo $entry_coupon; ?><p>
								<input type="text" name="coupon" value="<?php echo $coupon; ?>" />
								<input type="hidden" name="next" value="coupon" />
								<input type="submit" value="<?php echo $button_coupon; ?>" class="button dark-bt" />
							</form>
						</div>
						<div id="voucher" class="pane" style="display: <?php echo ($next == 'voucher' ? 'block' : 'none'); ?>;">
							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
								<p><?php echo $entry_voucher; ?></p>
								<input type="text" name="voucher" value="<?php echo $voucher; ?>" />
								<input type="hidden" name="next" value="voucher" />
								<input type="submit" value="<?php echo $button_voucher; ?>" class="button dark-bt" />
							</form>
						</div>
						<div id="reward" class="pane" style="display: <?php echo ($next == 'reward' ? 'block' : 'none'); ?>;">
							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
								<p><?php echo $entry_reward; ?></p>
								<input type="text" name="reward" value="<?php echo $reward; ?>" />
								<input type="hidden" name="next" value="reward" />
								<input type="submit" value="<?php echo $button_reward; ?>" class="button dark-bt" />
							</form>
						</div>
						<div id="shipping" class="pane" style="display: <?php echo ($next == 'shipping' ? 'block' : 'none'); ?>;">
							<p><?php echo $text_shipping_detail; ?></p>
							<label for="country_id"><?php echo $entry_country; ?> <span class="required">*</span></label>
							<select name="country_id">
								<option value=""><?php echo $text_select; ?></option>
								<?php foreach ($countries as $country) { ?>
								<?php if ($country['country_id'] == $country_id) { ?>
								<option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
								<?php } ?>
								<?php } ?>
							</select>
							
							<label class="zone_id"><?php echo $entry_zone; ?> <span class="required">*</span></label>
							<select name="zone_id">
							</select>
							<label for="postcode"><?php echo $entry_postcode; ?> <span class="required" id="postcode-required">*</span></label>
							<input type="text" name="postcode" value="<?php echo $postcode; ?>" />

							<input type="button" value="<?php echo $button_quote; ?>" id="button-quote" class="button dark-bt" />
						</div>
						
					</td>
				</tr>
			</table>
		</div>
		<?php } ?>
		
		<div class="cart-total">
			<table id="total">
				
				<?php foreach ($totals as $total) { ?>
				<tr class="other-amount">
					<td><b><?php echo $total['title']; ?>:</b></td>
					<td><strong><?php echo $total['text']; ?></strong></td>
				</tr>
				<?php } ?>
			</table>
			<div class="checkout-buttons">
				<a href="<?php echo $checkout; ?>" class="right button dark-bt"><?php echo $button_checkout; ?></a>
				<a href="<?php echo $continue; ?>" class="left button"><?php echo $button_shopping; ?></a>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<script type="text/javascript"><!--

$('input[name=\'next\']').bind('change', function() {
	$('.panes .pane').hide();
	$('#' + this.value).show();
	$('input[name=\'next\']').parent().removeClass('active');
	$(this).parent().addClass('active');
});

$('.quantity .sml-button').click(function(){
	$('#cart-form').submit();
});

$('#shipping_estimate').trigger('click');

//--></script>
<?php if ($shipping_status) { ?>
<script type="text/javascript"><!--
$('#total').find('tr:last').removeClass('other-amount');
$('#total').find('tr:last').addClass('total-amount');

$('.other-amount:last').addClass('last');
$('.other-amount:first').addClass('first');



$('#button-quote').live('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/quote',
		type: 'post',
		data: 'country_id=' + $('select[name=\'country_id\']').val() + '&zone_id=' + $('select[name=\'zone_id\']').val() + '&postcode=' + encodeURIComponent($('input[name=\'postcode\']').val()),
		dataType: 'json',		
		beforeSend: function() {
			$('#button-quote').attr('disabled', true);
			$('#button-quote').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('#button-quote').attr('disabled', false);
			$('.wait').remove();
		},		
		success: function(json) {
			$('.success, .warning, .attention, .error').remove();			
						
			if (json['error']) {
				if (json['error']['warning']) {
					$('#notification').show();
					$('#notification').html('<div class="warning" style="display: none;">' + json['error']['warning'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
					$('.warning').fadeIn('slow');
					
					$('html, body').animate({ scrollTop: 0 }, 'slow');
				}
							
				if (json['error']['country']) {
					$('select[name=\'country_id\']').after('<span class="error">' + json['error']['country'] + '</span>');
				}
				
				if (json['error']['zone']) {
					$('select[name=\'zone_id\']').after('<span class="error">' + json['error']['zone'] + '</span>');
				}
				
				if (json['error']['postcode']) {
					$('input[name=\'postcode\']').after('<span class="error">' + json['error']['postcode'] + '</span>');
				}					
			}
			
			if (json['shipping_method']) {
				html =  '<div class="box-content1 shipping-method">'
				html += '<h2 class="header-2"><?php echo $text_shipping_method; ?></h2>';
				html += '<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">';
				html += '  <table class="radio">';
				
				for (i in json['shipping_method']) {
					html += '<tr>';
					html += '  <td colspan="3" class="shipping-name">' + json['shipping_method'][i]['title'] + '</td>';
					html += '</tr>';
				
					if (!json['shipping_method'][i]['error']) {
						for (j in json['shipping_method'][i]['quote']) {
							html += '<tr>';
							
							if (json['shipping_method'][i]['quote'][j]['code'] == '<?php echo $shipping_method; ?>') {
								html += '<td><input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" id="' + json['shipping_method'][i]['quote'][j]['code'] + '" checked="checked" /></td>';
							} else {
								html += '<td><input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" id="' + json['shipping_method'][i]['quote'][j]['code'] + '" /></td>';
							}
								
							html += '  <td><label for="' + json['shipping_method'][i]['quote'][j]['code'] + '">' + json['shipping_method'][i]['quote'][j]['title'] + '</label></td>';
							html += '  <td style="text-align: right;" class="price"><label for="' + json['shipping_method'][i]['quote'][j]['code'] + '">' + json['shipping_method'][i]['quote'][j]['text'] + '</label></td>';
							html += '</tr>';
						}		
					} else {
						html += '<tr>';
						html += '  <td colspan="3"><div class="error">' + json['shipping_method'][i]['error'] + '</div></td>';
						html += '</tr>';						
					}
				}
				
				html += '  </table>';
				html += '  <input type="hidden" name="next" value="shipping" />';
				<?php if ($shipping_method) { ?>
				html += '  <div class="buttons"><input type="submit" value="<?php echo $button_shipping; ?>" id="button-shipping" class="button" /></div>';	
				<?php } else { ?>
				html += '  <div class="buttons"><input type="submit" value="<?php echo $button_shipping; ?>" id="button-shipping" class="button" disabled="disabled" /></div>';	
				<?php } ?>
				
				html += '</form>';
				html += '</div>';
				
				$.colorbox({
					overlayClose: true,
					opacity: 0.5,
					width: '750px',
					href: false,
					html: html
				});
				
				$('input[name=\'shipping_method\']').bind('change', function() {
					$('#button-shipping').attr('disabled', false);
				});
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--

$('select[name=\'country_id\']').bind('change', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('.wait').remove();
		},
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#postcode-required').show();
			} else {
				$('#postcode-required').hide();
			}
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('select[name=\'country_id\']').trigger('change');

//--></script>
<?php } ?>

<?php echo $footer; ?>