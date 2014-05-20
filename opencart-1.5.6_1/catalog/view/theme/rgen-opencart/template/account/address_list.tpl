<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body address-list">
		
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
		<?php } ?>
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<div class="box-form m0">
			<h2 class="header-3"><?php echo $text_address_book; ?></h2>	
			<ul>
				<?php foreach ($addresses as $result) { ?>
				<li>
					<?php echo $result['address']; ?>
					<span class="address-options">
						<a href="<?php echo $result['update']; ?>" class="sml-button"><?php echo $button_edit; ?></a>
						<a href="<?php echo $result['delete']; ?>" class="sml-button"><?php echo $button_delete; ?></a>
					</span>
				</li>
				<?php } ?>	
			</ul>
		</div>
		
		<div class="buttons">
			<div class="left"><a href="<?php echo $back; ?>" class="button dark-bt"><?php echo $button_back; ?></a></div>
			<div class="right"><a href="<?php echo $insert; ?>" class="button dark-bt"><?php echo $button_new_address; ?></a></div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>