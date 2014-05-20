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
		
		<?php echo $content_top; ?>
		
		<?php if ($orders) { ?>
		<?php foreach ($orders as $order) { ?>
		<div class="order-list">
			<div class="order-id">
				<b><?php echo $text_order_id; ?></b> #<?php echo $order['order_id']; ?>
				<span class="order-status"><b><?php echo $text_status; ?></b> <?php echo $order['status']; ?></span>
			</div>
			
			<div class="order-content">
				<div>
					<b><?php echo $text_date_added; ?></b> <?php echo $order['date_added']; ?><br />
					<b><?php echo $text_products; ?></b> <?php echo $order['products']; ?>
				</div>
				<div>
					<b><?php echo $text_customer; ?></b> <?php echo $order['name']; ?><br />
					<b><?php echo $text_total; ?></b> <?php echo $order['total']; ?>
				</div>
				<div class="order-info">
					<a href="<?php echo $order['href']; ?>" class="sml-button"><?php echo $button_view; ?></a>
					<a href="<?php echo $order['reorder']; ?>" class="sml-button"><?php echo $button_reorder; ?></a>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="pagination"><?php echo $pagination; ?></div><br /><br />
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<?php } ?>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>