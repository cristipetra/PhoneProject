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
		
		<?php foreach ($downloads as $download) { ?>
		<div class="download-list">
			
			<div class="download-id">
				<b><?php echo $text_order; ?></b> <?php echo $download['order_id']; ?>
				<div class="download-status"><b><?php echo $text_size; ?></b> <?php echo $download['size']; ?></div>
			</div>
			
			<div class="download-content">
				<div>
					<b><?php echo $text_name; ?></b> <?php echo $download['name']; ?><br />
					<b><?php echo $text_date_added; ?></b> <?php echo $download['date_added']; ?>
				</div>
				<div>
					<b><?php echo $text_remaining; ?></b> <?php echo $download['remaining']; ?>
				</div>
				
				<div class="download-info">
					<?php if ($download['remaining'] > 0) { ?>
					<a href="<?php echo $download['href']; ?>" class="sml-button"><?php echo $button_download; ?></a>
					<?php } ?>
				</div>
			</div>
			
		</div>
		<?php } ?>
		<div class="pagination"><?php echo $pagination; ?></div><br /><br />
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>