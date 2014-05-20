<?php if (!isset($redirect)) { ?>

<div class="checkout-product">
	<table>
		<thead>
			<tr>
				<td class="name"><?php echo $column_name; ?></td>
				<td class="quantity"><?php echo $column_quantity; ?></td>
				<td class="price"><?php echo $column_price; ?></td>
				<td class="total"><?php echo $column_total; ?></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product) { ?>
			<?php if($product['recurring']): ?>
			<tr>
				<td colspan="4" style="border:none;">
					<image src="catalog/view/theme/default/image/reorder.png" alt="" title="" style="float:left;" /><span style="float:left;line-height:18px; margin-left:10px;"> 
					<strong><?php echo $text_recurring_item ?></strong>
					<?php echo $product['profile_description'] ?>
				</td>
			</tr>
			<?php endif; ?>
			<tr>
				<td class="name">
					<a href="<?php echo $product['href']; ?>" class="header-4"><?php echo $product['name']; ?></a><br />
					<span><strong><?php echo $column_model; ?></strong> <?php echo $product['model']; ?></span>
					<?php foreach ($product['option'] as $option) { ?>
					<span><strong><?php echo $option['name']; ?>:</strong> <?php echo $option['value']; ?></span>
					<?php } ?>
					<?php if($product['recurring']): ?>
          			<span><strong><?php echo $text_payment_profile ?>:</strong> <?php echo $product['profile_name'] ?></span>
          			<?php endif; ?>
					
				</td>
				<td class="quantity"><?php echo $product['quantity']; ?></td>
				<td class="price"><?php echo $product['price']; ?></td>
				<td class="total"><?php echo $product['total']; ?></td>
			</tr>
			<?php } ?>
			<?php foreach ($vouchers as $voucher) { ?>
			<tr>
				<td class="name"><?php echo $voucher['description']; ?></td>
				<td class="quantity">1</td>
				<td class="price"><?php echo $voucher['amount']; ?></td>
				<td class="total"><?php echo $voucher['amount']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<?php foreach ($totals as $total) { ?>
					
				<?php if ($total['title'] == 'Total') { ?>
					<tr class="total-amount">
						<td colspan="3"><b><?php echo $total['title']; ?>:</b></td>
						<td><strong><?php echo $total['text']; ?></strong></td>
					</tr>
				</ul>
				<?php } else { ?>
					<tr class="other-amount">
						<td colspan="3"><b><?php echo $total['title']; ?>:</b></td>
						<td><strong><?php echo $total['text']; ?></strong></td>
					</tr>
				<?php } ?>
				
			
			<?php } ?>
			
		</tfoot>
	</table>
</div>
<script type="text/javascript"><!--
$('.checkout-product .other-amount:last').addClass('last');
$('.checkout-product .other-amount:first').addClass('first');
//--></script>

<div class="payment"><?php echo $payment; ?></div>
<?php } else { ?>
<script type="text/javascript"><!--
location = '<?php echo $redirect; ?>';
//--></script>
<?php } ?>
