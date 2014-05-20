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
		
		<?php if ($returns) { ?>
		<?php foreach ($returns as $return) { ?>
		
		<div class="return-list">
			<div class="return-id">
				<b><?php echo $text_return_id; ?></b> #<?php echo $return['return_id']; ?>
				<div class="return-status"><b><?php echo $text_status; ?></b> <?php echo $return['status']; ?></div>
			</div>
			
			
			<div class="return-content">
				<div>
					<b><?php echo $text_date_added; ?></b> <?php echo $return['date_added']; ?><br />
					<b><?php echo $text_order_id; ?></b> <?php echo $return['order_id']; ?>
				</div>
				
				<div>
					<b><?php echo $text_customer; ?></b> <?php echo $return['name']; ?>
				</div>
				
				<div class="return-info">
					<a href="<?php echo $return['href']; ?>" class="sml-button"><?php echo $button_view; ?></a>
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