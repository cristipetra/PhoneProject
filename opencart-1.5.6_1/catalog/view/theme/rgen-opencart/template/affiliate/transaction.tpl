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
		
		<p class="balance"><?php echo $text_balance; ?> <b><?php echo $balance; ?></b>.</p>

		<table class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $column_date_added; ?></td>
					<td class="left"><?php echo $column_description; ?></td>
					<td class="right"><?php echo $column_amount; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php if ($transactions) { ?>
				<?php foreach ($transactions  as $transaction) { ?>
				<tr>
					<td class="left"><?php echo $transaction['date_added']; ?></td>
					<td class="left"><?php echo $transaction['description']; ?></td>
					<td class="right"><?php echo $transaction['amount']; ?></td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td class="center" colspan="5"><?php echo $text_empty; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="pagination"><?php echo $pagination; ?></div>
		<br /><br />
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>