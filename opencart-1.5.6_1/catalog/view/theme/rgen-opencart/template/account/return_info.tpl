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
		
		<table class="list">
			<thead>
				<tr>
					<td class="left" colspan="2"><?php echo $text_return_detail; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left" style="width: 50%;"><b><?php echo $text_return_id; ?></b> #<?php echo $return_id; ?><br />
						<b><?php echo $text_date_added; ?></b> <?php echo $date_added; ?></td>
					<td class="left" style="width: 50%;"><b><?php echo $text_order_id; ?></b> #<?php echo $order_id; ?><br />
						<b><?php echo $text_date_ordered; ?></b> <?php echo $date_ordered; ?></td>
				</tr>
			</tbody>
		</table><br /><br />
	
		<h2 class="header-3"><?php echo $text_product; ?></h2><br />
		<table class="list">
			<thead>
				<tr>
					<td class="left" style="width: 33.3%;"><?php echo $column_product; ?></td>
					<td class="left" style="width: 33.3%;"><?php echo $column_model; ?></td>
					<td class="right" style="width: 33.3%;"><?php echo $column_quantity; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left"><?php echo $product; ?></td>
					<td class="left"><?php echo $model; ?></td>
					<td class="right"><?php echo $quantity; ?></td>
				</tr>
			</tbody>
		</table>
		<table class="list">
			<thead>
				<tr>
					<td class="left" style="width: 33.3%;"><?php echo $column_reason; ?></td>
					<td class="left" style="width: 33.3%;"><?php echo $column_opened; ?></td>
					<td class="left" style="width: 33.3%;"><?php echo $column_action; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left"><?php echo $reason; ?></td>
					<td class="left"><?php echo $opened; ?></td>
					<td class="left"><?php echo $action; ?></td>
				</tr>
			</tbody>
		</table>
		
		<?php if ($comment) { ?>
		<table class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $text_comment; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left"><?php echo $comment; ?></td>
				</tr>
			</tbody>
		</table><br /><br />
		<?php } ?>
		<?php if ($histories) { ?>
		<h2 class="header-3"><?php echo $text_history; ?></h2><br />
		<table class="list">
			<thead>
				<tr>
					<td class="left" style="width: 33.3%;"><?php echo $column_date_added; ?></td>
					<td class="left" style="width: 33.3%;"><?php echo $column_status; ?></td>
					<td class="left" style="width: 33.3%;"><?php echo $column_comment; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($histories as $history) { ?>
				<tr>
					<td class="left"><?php echo $history['date_added']; ?></td>
					<td class="left"><?php echo $history['status']; ?></td>
					<td class="left"><?php echo $history['comment']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
