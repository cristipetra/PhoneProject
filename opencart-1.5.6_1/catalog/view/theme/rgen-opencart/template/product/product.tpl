<?php echo $header; ?>
<?php
	/* Mobile optimize view
	******************************/	
	$oc 		=	$this->config->get('RGen_productLayout'); 
	$reviewTab 	=	$this->config->get('RGen_reviewTab');
	$th 		=	$this->config->get('RGen_thumbOptions');
	
	$rgen_optimize = $this->config->get('RGen_optimize');
?>

<div id="content" class="prdinfo-wrapper<?php if ($oc != 'oc') { ?> no-oc<?php } ?>">

	<?php if ($oc == 'oc' || $this->config->get('RGen_wide_layout') == 1 && $this->config->get('RGen_reaponsive_status') == 1) { ?>
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	<?php } ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body">
		
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } ?>
		</div>
		
		<?php if ($oc == 'oc') { ?>
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<div class="product-info<?php if ($oc == 'oc') { ?> prd-layout1<?php } ?>">
			
			<!--PRODUCT IMAGE -->
			<?php if ($thumb || $images) { ?>
			<div class="<?php if ($th == 1 || $oc == 'oc') { ?>th-b <?php } else { ?>th-l <?php } ?><?php if ($this->config->get('RGen_productZoom') == 1) { ?>popup-zoom <?php } ?>left prdimage-wrapper<?php if ($images == array()) { ?> no-th<?php } ?>">

				<?php
				/* ABOVE IMAGES CONTENT
				******************************/
				echo $rgen_pd_above_img;
				/*******************************/
				?>

				<div class="image-wrp">
					<?php if ($thumb) { ?>
					<div class="image">
						<?php if ($images == array()) { ?><div class="no-th-img"><?php } ?>
						<a title="<?php echo $heading_title; ?>" class="cloud-zoom" id='zoom1'><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="main-image" data-zoom-image="<?php echo $popup; ?>" /></a>
						<?php if ($images == array()) { ?></div><?php } ?>

						<?php /* Magnify zoom */ if ($this->config->get('RGen_productZoom') == 0) { ?>
							<span class="zoom-text"><b></b><?php echo $this->language->get('text_zoom'); ?></span>
						<?php } /* Normal popup */ elseif($this->config->get('RGen_productZoom') == 1) { ?>
							<span class="zoom-text"><b></b><?php echo $this->language->get('text_zoom1'); ?></span>
						<?php } /* Both */ else { ?>
							<span class="zoom-text"><b></b><?php echo $this->language->get('text_zoom2'); ?></span>
						<?php } ?>

					</div>
					<?php } ?>
					
					<?php $i=1; if ($images) { ?>
						<?php if ($th == 1 || $oc == 'oc') { //th-b ?>
						<div class="owl-carousel image-additional-b" id="prd-gallery">
							<?php 
							if ($thumb) { ?>
							<div data-index="0" class="item">
								<a title="<?php echo $heading_title; ?>" class="cloud-zoom-gallery" data-image="<?php echo $thumb; ?>" data-zoom-image="<?php echo $popup; ?>"><img src="<?php echo $additional; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
							</div>
							<?php } ?>
							<?php foreach ($images as $image) { ?>
							<div data-index="<?php echo $i; ?>" class="item">
								<a title="<?php echo $heading_title; ?>" class="cloud-zoom-gallery" data-image="<?php echo $image['thumb1']; ?>" data-zoom-image="<?php echo $image['popup']; ?>"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
							</div>
							<?php $i++; } ?>
						</div>
						<?php } else { //th-l ?>
						<div class="thumb-wrapper list-carousel">
							<ul class="image-additional" id="prd-gallery">
								<?php 
								if ($thumb) { ?>
								<li data-index="0">
									<a title="<?php echo $heading_title; ?>" class="cloud-zoom-gallery" data-image="<?php echo $thumb; ?>" data-zoom-image="<?php echo $popup; ?>"><img src="<?php echo $additional; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
								</li>
								<?php } ?>
								<?php foreach ($images as $image) { ?>
								<li data-index="<?php echo $i; ?>">
									<a title="<?php echo $heading_title; ?>" class="cloud-zoom-gallery" data-image="<?php echo $image['thumb1']; ?>" data-zoom-image="<?php echo $image['popup']; ?>"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
								</li>
								<?php $i++; } ?>
							</ul>
							<div class="carousel-controls"><a class="prev"></a><a class="next"></a></div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				
				<?php 
				/* BELOW IMAGES CONTENT
				******************************/
				echo $rgen_pd_below_img;
				/*******************************/
				?>

			</div>
			<?php } ?>
			
			<div class="right prdoptions-wrapper">
				
				<?php if (!$oc) { ?>
				<h1 class="header-1"><strong><?php echo $heading_title; ?></strong></h1>
				<?php } ?>

				<?php 
				/* ABOVE OPTIONS
				******************************/
				echo $rgen_pd_above_options;
				/*******************************/
				?>
				
				<div class="l">
					
					<?php if ($oc == 'oc') { ?>
					<div class="price-info">
					<?php if ($price) { ?>
						<div class="price-wrp">
							<?php //echo $text_price; ?>
							<?php if (!$special) { ?>
							<?php echo $price; ?>
							<?php } else { ?>
							<span class="price-old"><?php echo $price; ?></span>
							<span class="price-new"><?php echo $special; ?></span>
							<?php } ?>
							<?php if ($tax) { ?>
							<span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span>
							<?php } ?>
						</div>
						<?php if ($points) { ?>
						<span class="reward"><?php echo $text_points; ?> <?php echo $points; ?></span>
						<?php } ?>
						<?php if ($discounts) { ?>
						<ul class="discount">
							<?php foreach ($discounts as $discount) { ?>
							<li><?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					<?php } ?>
					</div>
					<?php } ?>
					
					<ul class="description">
						<?php if ($manufacturer) { ?>
						<li><span><?php echo $text_manufacturer; ?></span><a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a></li>
						<?php } ?>
						<li><span><?php echo $text_model; ?></span><?php echo $model; ?></li>
						<?php if ($reward) { ?>
						<li><span><?php echo $text_reward; ?></span><?php echo $reward; ?></li>
						<?php } ?>
						<li><span><?php echo $text_stock; ?></span><?php echo $stock; ?></li>
					</ul>
					
					<?php if ($review_status) { ?>
					<div class="review">
						
						<span class="lrg-stars stars-<?php echo $rating; ?>" title="<?php echo $reviews; ?>"></span>
						<span>
							<a id="readReview" onclick="$('a[href=\'#tab-review\']').trigger('click');">(<?php echo $reviews; ?>)</a><br />
							<a id="writeReview" <?php if ($reviewTab == 1 || $oc == 'oc') { ?>onclick="$('a[href=\'#tab-write-review\']').trigger('click');"<?php }else { ?>onclick="$('.wrt-bt').trigger('click');"<?php } ?>><?php echo $text_write; ?></a>
						</span>
					</div>
					<?php } ?>
					<?php if ($profiles): ?>
					<div class="options">
						<div class="option">
							<b><span class="required">*</span><?php echo $text_payment_profile ?></b>
							<select name="profile_id">
								<option value=""><?php echo $text_select; ?></option>
								<?php foreach ($profiles as $profile): ?>
								<option value="<?php echo $profile['profile_id'] ?>"><?php echo $profile['name'] ?></option>
								<?php endforeach; ?>
							</select>
							<br />
							<span id="profile-description"></span>
						</div>
					</div>
					<?php endif; ?>
					<?php if ($options) { ?>
					<div class="options">
						<!--<h2><?php echo $text_option; ?></h2>
						<br /> -->
						
						<!--SELECT OPTION -->
						<?php foreach ($options as $option) { ?>
						<?php if ($option['type'] == 'select') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?> <?php echo $option['name']; ?>: </b>
							<select name="option[<?php echo $option['product_option_id']; ?>]">
								<option value=""><?php echo $text_select; ?></option>
								<?php foreach ($option['option_value'] as $option_value) { ?>
								<option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
								<?php if ($option_value['price']) { ?>
								(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
								<?php } ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<?php } ?>
						
						<!--RADIO BUTTON -->
						<?php if ($option['type'] == 'radio') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?> <?php echo $option['name']; ?>:</b>
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
							<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
								<?php if ($option_value['price']) { ?>
								(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
								<?php } ?>
							</label><br />
							<?php } ?>
						</div>
						<?php } ?>
						
						<!--CHECK BOX -->
						<?php if ($option['type'] == 'checkbox') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
							<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
								<?php if ($option_value['price']) { ?>
								(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
								<?php } ?>
							</label>
							<br />
							<?php } ?>
						</div>
						<?php } ?>
						
						<?php if ($option['type'] == 'image') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<table class="option-image">
								<?php foreach ($option['option_value'] as $option_value) { ?>
								<tr>
									<td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
									<td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
									<td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
											<?php if ($option_value['price']) { ?>
											(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
											<?php } ?>
										</label></td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<?php } ?>
						
						<!--TEXT BOX -->
						<?php if ($option['type'] == 'text') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<input type="text" class="input-text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
						</div>
						<?php } ?>
						
						<!--TEXTAREA -->
						<?php if ($option['type'] == 'textarea') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<textarea name="option[<?php echo $option['product_option_id']; ?>]" rows="5"><?php echo $option['option_value']; ?></textarea>
						</div>
						<?php } ?>
						
						<!--IMAGE UPLOAD -->
						<?php if ($option['type'] == 'file') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button">
							<input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
						</div>
						<?php } ?>
						
						<!--DATE -->
						<?php if ($option['type'] == 'date') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
						</div>
						<?php } ?>
						
						<!--DATE TIME -->
						<?php if ($option['type'] == 'datetime') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
						</div>
						<?php } ?>
						
						<!--TIME -->
						<?php if ($option['type'] == 'time') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option">
							<b><?php if ($option['required']) { ?><span class="required">*</span><?php } ?><?php echo $option['name']; ?>:</b>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
						</div>
						<?php } ?>
						
						<?php } ?>
					</div>
					<?php } ?>
					
					<?php if ($oc == 'oc') { ?>
					<div class="cart">
						<span class="qty">
							<strong><?php echo $text_qty; ?></strong>
							<input type="text" name="quantity" size="2" class="qty-input" value="<?php echo $minimum; ?>" />
							<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
                            <a title="<?php echo $button_cart; ?>" id="button-cart" class="cart-bt"><?php echo $button_cart; ?></a>
							<span class="cart-option">
								<a onclick="addToWishList('<?php echo $product_id; ?>');"><?php echo $button_wishlist; ?></a>
								<a onclick="addToCompare('<?php echo $product_id; ?>');"><?php echo $button_compare; ?></a>
							</span>
							<?php if ($minimum > 1) { ?>
							<div class="minimum"><?php echo $text_minimum; ?></div>
							<?php } ?>
						</span>
					</div>
					<?php } ?>
					
					
					<div class="share"><!-- AddThis Button BEGIN -->
						<div class="addthis_default_style"><a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_email"></a> <a class="addthis_button_print"></a> <a class="addthis_button_compact"><?php echo $text_share; ?></a> </div>
						<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script> 
						<!-- AddThis Button END --> 
					</div>
					
				</div>
				
				<?php /* RGEN PRICE LAYOUT
				******************************/	?>
				<?php if (!$oc) { ?>
				<div class="r">
					<?php if ($price) { ?>
						<div class="price">
							<?php //echo $text_price; ?>
							<?php if (!$special) { ?>
							<?php echo $price; ?>
							<?php } else { ?>
							<span class="price-old"><?php echo $price; ?></span>
							<span class="price-new"><?php echo $special; ?></span>
							<?php } ?>
							<?php if ($tax) { ?>
							<span class="price-tax"><?php echo $text_tax; ?><br /><?php echo $tax; ?></span>
							<?php } ?>
						</div>
						<?php if ($points) { ?>
						<span class="reward"><?php echo $text_points; ?> <?php echo $points; ?></span>
						<?php } ?>
						<?php if ($discounts) { ?>
						<ul class="discount">
							<?php foreach ($discounts as $discount) { ?>
							<li><?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					<?php } ?>
					
					<div class="cart">
						<div>
							<span class="qty">
								<strong><?php echo $text_qty; ?></strong>
								<input type="text" name="quantity" size="2" class="qty-input" value="<?php echo $minimum; ?>" />
								<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
								<a title="<?php echo $button_cart; ?>" id="button-cart" class="cart-bt"><?php echo $button_cart; ?></a>
							</span>
							<span class="cart-option">
								<a onclick="addToWishList('<?php echo $product_id; ?>');"><?php echo $button_wishlist; ?></a>
								<a onclick="addToCompare('<?php echo $product_id; ?>');"><?php echo $button_compare; ?></a>
							</span>
						</div>
					</div>
					<?php if ($minimum > 1) { ?>
					<div class="minimum"><?php echo $text_minimum; ?></div>
					<?php } ?>
				</div>
				<?php } ?>

				<div class="clearfix"></div>

				<?php 
				/* BELOW OPTIONS
				******************************/	
				echo $rgen_pd_below_options;
				/*******************************/
				?>

			</div>
			
			
			<div class="clearfix hr"></div>

			<?php /* ABOVE TABS
			******************************/	
			echo $rgen_pd_above_tb;
			/*******************************/
			?>

			<div class="<?php if (!$oc && !$reviewTab) { ?>left <?php } ?>tabs-wrapper<?php if ($reviewTab == 1 || $oc == 'oc') { ?> review-in<?php } ?>">
				<!--DESCRIPTION TABS -->
				<div id="tabs" class="htabs">
					<a href="#tab-description"><?php echo $tab_description; ?></a>
					<?php if ($attribute_groups) { ?>
					<a href="#tab-attribute"><?php echo $tab_attribute; ?></a>
					<?php } ?>
					
					<div class="extra-tb"></div>
					
					<?php if ($reviewTab == 1 || $oc == 'oc') { ?>
					<?php if ($review_status) { ?>
					<a href="#tab-review"><?php echo $tab_review; ?></a>
					<a href="#tab-write-review"><?php echo $text_write; ?></a>
					<?php } ?>
					<?php } ?>
				</div>
				<div id="tab-description" class="tab-content">
					<div<?php if (!$oc && !$reviewTab) { ?> class="scrollPane"<?php } ?>><?php echo $description; ?></div>
				</div>
				<?php if ($attribute_groups) { ?>
				<div id="tab-attribute" class="tab-content">
					<div<?php if (!$oc && !$reviewTab) { ?> class="scrollPane"<?php } ?>>
						<table class="list">
							<?php foreach ($attribute_groups as $attribute_group) { ?>
							<thead>
								<tr>
									<td colspan="2"><?php echo $attribute_group['name']; ?></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($attribute_group['attribute'] as $attribute) { ?>
								<tr>
									<td><?php echo $attribute['name']; ?></td>
									<td><?php echo $attribute['text']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
							<?php } ?>
						</table>	
					</div>
				</div>
				<?php } ?>

				<?php 
				/* EXTRA TAB OPTIONS
				******************************/
				echo $rgen_pd_extra_tab;
				/*******************************/
				?>
				
				<?php if ($reviewTab == 1 || $oc == 'oc') { ?>
				<?php if ($review_status) { ?>
				<div id="tab-review" class="tab-content">
					<div class="read-review">
						<div id="review"></div>
					</div>
				</div>
				
				<div id="tab-write-review" class="tab-content">
					<div class="write-review">
						<div class="message"></div>
						<label><?php echo $entry_name; ?></label>
						<input type="text" name="name" value="" />
						
						<label><?php echo $entry_review; ?><span class="note"><?php echo $text_note; ?></span></label>
						<textarea name="text" cols="40" rows="8"></textarea>
						
						<label><?php echo $entry_rating; ?></label>
						<ol>
							<li class="bad"><?php echo $entry_bad; ?></li>
							<li><input type="radio" name="rating" value="1" /></li>
							<li><input type="radio" name="rating" value="2" /></li>
							<li><input type="radio" name="rating" value="3" /></li>
							<li><input type="radio" name="rating" value="4" /></li>
							<li><input type="radio" name="rating" value="5" /></li>
							<li class="good"><?php echo $entry_good; ?></li>
						</ol>
						
						<label><?php echo $entry_captcha; ?></label>
						<ul class="captcha">
							<li class="captcha-input"><input type="text" name="captcha" style="width:142px;" value="" /></li>
							<li><img src="index.php?route=product/product/captcha" alt="" id="captcha" /></li>
						</ul>
						
						<a id="button-review" class="button dark-bt"><?php echo $button_continue; ?></a>
						
					</div>
				</div>
				<?php } ?>
				<?php } ?>
				
			</div>
			
			<?php /* ONLY DISPLAY WHEN RGEN LAYOUT IS ACTIVE 
			******************************/	?>
			<?php if (!$oc && !$reviewTab) { ?>
			<div class="right reviews-wrapper">
				<div class="reviews-block">
					<a name="review"></a>
					<?php if ($review_status) { ?>
					<h2 class="review-title header-3"><?php echo $tab_review; ?></h2>
					<?php } ?>
					<?php if ($review_status) { ?>
					<div class="read-review">
						<div id="review"></div>
						<span class="wrt-bt wrt-on" title="Write review"></span>
					</div>
					<div class="write-review">
						<div class="message"></div>
						<label><?php echo $entry_name; ?></label>
						<input type="text" name="name" value="" />
						
						<label><?php echo $entry_review; ?><span class="note"><?php echo $text_note; ?></span></label>
						<textarea name="text" cols="40" rows="8" style="width: 95%;"></textarea>
						
						<label><?php echo $entry_rating; ?></label>
						<ol>
							<li class="bad"><?php echo $entry_bad; ?></li>
							<li><input type="radio" name="rating" value="1" /></li>
							<li><input type="radio" name="rating" value="2" /></li>
							<li><input type="radio" name="rating" value="3" /></li>
							<li><input type="radio" name="rating" value="4" /></li>
							<li><input type="radio" name="rating" value="5" /></li>
							<li class="good"><?php echo $entry_good; ?></li>
						</ol>
						
						<label><?php echo $entry_captcha; ?></label>
						<ul class="captcha">
							<li class="captcha-input"><input type="text" name="captcha" style="width:142px;" value="" /></li>
							<li><img src="index.php?route=product/product/captcha" alt="" id="captcha" /></li>
						</ul>
						
						<a id="button-review" class="button dark-bt"><?php echo $button_continue; ?></a>
					</div>
					<?php } ?>	
				</div>
			</div>
			<?php } ?>
			
			<div class="clearfix"></div>
			
		</div>
		
		<?php 
		/* ABOVE RELATED
		******************************/
		echo $rgen_pd_above_rel;
		/*******************************/
		?>

		<?php if ($products) { ?>
		<div class="box related-prd" id="related-prd">
			<div class="clearfix hr"></div>
			<div class="box-heading header-1"><?php echo $tab_related; ?> (<?php echo count($products); ?>)</div>
			<?php
			if(
				$this->rgen->device == 'm'
				&& $this->config->get('RGen_optimizemob') == 1 
				&& $this->config->get('RGen_reaponsive_status') == 1
				){
			?>
			<div class="box-content">
				<?php foreach ($products as $product) {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_mprd1.tpl');
				} ?>
			</div>

			<?php }else { ?>
			<div class="box-content">
				<div class="box-product owl-carousel">
					<?php foreach ($products as $product) { ?>
					<div class="item">
						<div class="prd-block">
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
							<div class="info-wrp">
								<div class="info">
									<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
									<?php if ($product['rating']) { ?>
									<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
									<?php } ?>
                                    <a class="cart-bt" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a>
									<ul>
										<li><a href="<?php echo $product['href']; ?>"><?php echo $this->language->get('button_moreinfo'); ?> <span>&#8250;</span></a></li>
										<li><a onclick="addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $button_wishlist; ?> <span>&#8250;</span></a></li>
										<li class="last"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $button_compare; ?> <span>&#8250;</span></a></li>
									</ul>
								</div>
								<?php if ($product['price']) { ?>
								<div class="price" onclick="javascript:location.href='<?php echo $product['href']; ?>'">
									<?php if (!$product['special']) { ?>
									<?php echo $product['price']; ?>
									<?php } else { ?>
									<span class="price-old"><?php echo $product['price']; ?></span>
									<span class="price-new"><?php echo $product['special']; ?></span>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
				<div class="clearfix"></div>
			</div>
			<?php } ?>
		</div>
		
		<?php } ?>
		
		<?php if ($tags) { ?>
		
		<div class="tags">
			<h3 class="header-3"><?php echo $text_tags; ?></h3>
			<?php for ($i = 0; $i < count($tags); $i++) { ?>
				<?php if ($i < (count($tags) - 1)) { ?>
				<a href="<?php echo $tags[$i]['href']; ?>" class="link-bt"><?php echo $tags[$i]['tag']; ?></a>,
				<?php } else { ?>
				<a href="<?php echo $tags[$i]['href']; ?>" class="link-bt"><?php echo $tags[$i]['tag']; ?></a>
				<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
		
	</div>
	
	<div class="clearfix"></div>
	<?php echo $content_bottom; ?>

</div>


<script type="text/javascript"><!--

<?php if ($reviewTab == 1 || $oc == 'oc') { ?>
$('#readReview, #writeReview').bind('click',function(event){
	$('html, body').animate({scrollTop: $('#tabs').offset().top}, 500);
	return false;
});
<?php }else { ?>
$('#readReview, #writeReview').bind('click',function(event){
	$('html, body').animate({scrollTop: $('.reviews-block').offset().top}, 500);
	return false;
});
<?php } ?>
$('select[name="profile_id"], input[name="quantity"]').change(function(){
    $.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
		type: 'post',
		data: $('input[name="product_id"], input[name="quantity"], select[name="profile_id"]'),
		dataType: 'json',
        beforeSend: function() {
            $('#profile-description').html('');
        },
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
            
			if (json['success']) {
                $('#profile-description').html(json['success']);
			}	
		}
	});
});

$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				$('#notification').show();
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');

				$('.success').fadeIn('slow', function() {
					$('#notification').delay(3000).fadeOut('slow', function(){
						$('#notification > div').remove();		
					});
				});
				
				$('#cart').load('index.php?route=module/cart #cart > *', function(){
					var getTotal = $('.mini-cart-total').find('tr:last').find('td:last').html();
					$('#cart').find('#cart-total').html(getTotal);
				});
					
				//$('#cart-total').html(json['total']);
				
				//$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
});

$(document).ready(function(){
	$('.extra-tb-holder a').appendTo('.extra-tb');
	priceTax = $('.product-info .r').find('.price-tax').html();
	if (priceTax != null) {
		$('.product-info .price').addClass('price-tax-y');
	}
	
	$('#tabs a').tabs();

	$('#tabs a').click(function(){
		$($(this).attr('href')).find('.scrollPane').mCustomScrollbar("update");
	});

	<?php if ($this->config->get('RGen_reviewTab') == 0) { ?>
	$('.wrt-bt').toggle(
		function(){
			$('.reviews-block > .write-review').css({display:'block', width:$('.reviews-block').outerWidth()-60});	
			$('.wrt-on').addClass('wrt-off');
			$('.wrt-on').removeClass('wrt-on');
		},
		function(){
			$('.reviews-block > .write-review').css({display:'none'});
			$('.wrt-off').addClass('wrt-on');
			$('.wrt-off').removeClass('wrt-off');
		}
	);
	$(window).resize(function(){
		$('.reviews-block > .write-review').css({width:$('.reviews-block').outerWidth()-60});
	});
	<?php } ?>
	
	/* RELATED PRODUCTS
	****************************************/
	var obj = '#related-prd';
	$(obj+ " .owl-carousel").owlCarousel({
		itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
		navigation : true,
		navigationText : ["",""],
		responsiveBaseWidth: obj
	});
	$(obj+" .owl-prev").addClass('prev');
	$(obj+" .owl-next").addClass('next');
	$(obj+" .owl-controls").addClass('carousel-controls');


	/* PRODUCT IMAGE SCROLL
	****************************************/
	<?php if ($th == 1 || $oc == 'oc') { ?> 
		var obj = '.th-b';
		$(obj+ " .owl-carousel").owlCarousel({
			itemsCustom : [ [0, 3], [420, 3], [600, 4], [768, 4], [980, 5] ],
			navigation : true,
			navigationText : ["",""]
		});
		$(obj+" .owl-prev").addClass('prev');
		$(obj+" .owl-next").addClass('next');
		$(obj+" .owl-controls").addClass('carousel-controls');
	<?php } else { ?>
		$('.th-l .image-additional').carouFredSel({
			prev: '.thumb-wrapper .carousel-controls .prev',
			next: '.thumb-wrapper .carousel-controls .next',
			width: 131,
			auto: false,
			direction: 'up',
			scroll: 1,
			items : 3,
			swipe:{onTouch: true},
			circular:false,
			infinite:false
		});
	<?php } ?>
	
	// ADDITIONAL IMAGE FUNCTIONS
	<?php if ($th == 1 || $oc == 'oc') { //th-b ?>
	var extraImg = ".image-additional-b";
	<?php } else { ?>
	var extraImg = ".image-additional";
	<?php } ?>

	$(extraImg+' a').on("tap",function(){
		if (extraImg == ".image-additional-b") {
			$(extraImg+' .item').removeClass('active');
		}else{
			$(extraImg+' li').removeClass('active');
			$(this).parent().addClass('active');
		};
		$('.product-info .image img').attr('src', $(this).attr('data-image'));
	});
	$('.image-additional li:first, .image-additional-b .item:first a').addClass('active');
	
	/* MAIN IMAGE DISPLAY SETTINGS
	****************************************/
	if($('#content').hasClass('no-oc')){
		$('body').addClass('RGen-prdinfo');
	}
	<?php /* Magnify zoom */ if ($this->config->get('RGen_productZoom') == 0 || $this->config->get('RGen_productZoom') == 2) { ?>
		// WINDOW ZOOM
		function windowzoom(){
			if ($('.zoomContainer').length > 0) { $('.zoomContainer').remove(); };
			var zoonW = $('.product-info .image-wrp .image').width() > $('.product-info .prdoptions-wrapper').width() ? $('.product-info .prdoptions-wrapper').width()+10 : $('.product-info .image-wrp .image').width();
			setTimeout(function(){
				$("#main-image").elevateZoom({
					gallery:'prd-gallery', cursor: 'pointer', galleryActiveClass: 'active',
					lensBorderSize:0,
					zoomWindowWidth:parseInt(zoonW),
					zoomWindowHeight:parseInt($('.product-info .image-wrp .image').height()),
					zoomWindowOffetx: 20,
					zoomWindowOffety:-7
				}); 
			}, 0);
			setTimeout(function(){ $('.image-additional li:first a').click(); }, 200);
		}
		// INNER ZOOM
		function innerzoom(){
			if ($('.zoomContainer').length > 0) { $('.zoomContainer').remove(); };
			setTimeout(function(){
				$("#main-image").elevateZoom({
					gallery:'prd-gallery', cursor: 'pointer', galleryActiveClass: 'active',
					zoomType: "inner",
					cursor: "crosshair"
				});	
			}, 0);
			setTimeout(function(){ $('.image-additional li:first a').click(); }, 200);
		}
	<?php } ?>

	<?php /* Magnify zoom */ if ($this->config->get('RGen_productZoom') == 1 || $this->config->get('RGen_productZoom') == 2) { ?>
	// POPUP ZOOM
	function popzoom(){
		$('.prdimage-wrapper .image').magnificPopup({
			items: [
			<?php if ($images) { ?>
				<?php if ($thumb) { ?>{src: '<?php echo $popup; ?>'},<?php } ?>
				<?php foreach ($images as $image) { ?>{src: '<?php echo $image['popup']; ?>'},<?php } ?>
			<?php }else{ ?>
				<?php if ($thumb) { ?>{src: '<?php echo $popup; ?>'}<?php } ?>
			<?php } ?>
			],
			gallery: { enabled: true, preload: [0,2] },
			type: 'image',
			mainClass: 'mfp-fade',
			callbacks: {
				open: function() {
					<?php if ($images) { ?>

					<?php if ($th == 1 || $oc == 'oc') { //th-b ?>
					var activeIndex = parseInt($('.image-additional-b .active').parent().attr('data-index'));
					//console.log(activeIndexVal);
					<?php } else { ?>
					var activeIndex = parseInt($('.image-additional li.active').attr('data-index'));
					<?php } ?>

					//var activeIndex = activeIndexVal;
					<?php }else{ ?>
					var activeIndex = 0;
					<?php } ?>
					var magnificPopup = $.magnificPopup.instance;
					magnificPopup.goTo(activeIndex);
				}
			}
		});	
	}
	<?php } ?>
	function zoom1(){
		<?php /* Magnify zoom */ if ($this->config->get('RGen_productZoom') == 0) { ?>
			<?php if ($oc != 'oc') { ?> windowzoom(); <?php } else { ?> innerzoom(); <?php } ?>
		<?php } /* Normal popup */ elseif($this->config->get('RGen_productZoom') == 1) { ?>
			popzoom();
		<?php } /* Both */ else { ?>
			<?php if ($oc != 'oc') { ?> windowzoom(); <?php } else { ?> innerzoom(); <?php } ?>
			popzoom();
		<?php } ?>
	}
	function zoom2(){
		<?php /* Magnify zoom */ if ($this->config->get('RGen_productZoom') == 0) { ?>
			innerzoom();
		<?php } /* Normal popup */ elseif($this->config->get('RGen_productZoom') == 1) { ?>
			popzoom();
		<?php } /* Both */ else { ?>
			innerzoom();
			popzoom();
		<?php } ?>
	}
	<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		enquire.register("only screen and (min-width: 980px)", {
			match : function() { zoom1(); }
		}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
			match : function() { zoom2(); }
		}).register("only screen and (min-width: 200px) and (max-width: 419px)", {
			match : function() { zoom2(); }
		}).register("only screen and (min-width: 420px) and (max-width: 599px)", {
			match : function() { zoom2(); }
		}).register("only screen and (min-width: 600px) and (max-width: 767px)", {
			match : function() { zoom2(); }
		}).listen();
	<?php } else { ?>
		zoom1();
	<?php } ?>
});

//--></script> 

<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>

<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--

/* FETCH REVIEW  */
$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>', function() {
	<?php if (!$oc && !$reviewTab) { ?>
	$(this).mCustomScrollbar();
	$(this).find('.mCSB_dragger_bar').prepend('<b class="t"></b><b class="b"></b>');
	<?php } ?>
});

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('.write-review > .message').prepend('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('.write-review > .message').prepend('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('.write-review > .message').prepend('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
			}
		}
	});
});
//--></script> 

<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$(document).ready(function(e) {
	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}
	
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
});
//--></script> 
<?php echo $footer; ?>