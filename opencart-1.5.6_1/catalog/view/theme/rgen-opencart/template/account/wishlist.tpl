<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body">
		
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		
		<?php if ($products) { ?>
		<div class="wishlist-info m0">
			<table>
				<thead>
					<tr>
						<td class="image"><?php echo $column_name; ?></td>
						<td><?php //echo $column_image; ?></td>
						<td class="stock"><?php echo $column_stock; ?></td>
						<td class="price"><?php echo $column_price; ?></td>
						<td class="action"><?php echo $column_action; ?></td>
					</tr>
				</thead>
				<?php foreach ($products as $product) { ?>
				<tbody id="wishlist-row<?php echo $product['product_id']; ?>">
					<tr>
						<td class="image">
							<?php if ($product['thumb']) { ?>
							<a href="<?php echo $product['href']; ?>" class="img-frame"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
							<?php } ?>
						</td>
						<td class="name">
							<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a><br />
							<strong><?php echo $column_model; ?></strong> <?php echo $product['model']; ?>
						</td>
						<td class="stock"><?php echo $product['stock']; ?></td>
						<td class="price">
							<?php if ($product['price']) { ?>
								<?php if (!$product['special']) { ?>
									<b><?php echo $product['price']; ?></b>
								<?php } else { ?>
									<s><?php echo $product['price']; ?></s><br />
									<b><?php echo $product['special']; ?></b>
								<?php } ?>
							<?php } ?>
						</td>
						<td class="action">
							<a class="cart-bt" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a><br />
							<a href="<?php echo $product['remove']; ?>"><?php echo $button_remove; ?></a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } ?>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>