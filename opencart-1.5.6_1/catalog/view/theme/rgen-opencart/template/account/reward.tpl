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
		
		<p class="balance"><?php echo $text_total; ?> <b><?php echo $total; ?></b>.</p>
		<table class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $column_date_added; ?></td>
					<td class="left"><?php echo $column_description; ?></td>
					<td class="right"><?php echo $column_points; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php if ($rewards) { ?>
				<?php foreach ($rewards  as $reward) { ?>
				<tr>
					<td class="left"><?php echo $reward['date_added']; ?></td>
					<td class="left"><?php if ($reward['order_id']) { ?>
						<a href="<?php echo $reward['href']; ?>"><?php echo $reward['description']; ?></a>
						<?php } else { ?>
						<?php echo $reward['description']; ?>
						<?php } ?></td>
					<td class="right"><?php echo $reward['points']; ?></td>
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
		<br />
		
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
