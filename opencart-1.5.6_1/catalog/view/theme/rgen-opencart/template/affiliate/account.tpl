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
		<div class="success"><?php echo $success; ?></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<div class="box-content1">
			<h2 class="header-3"><?php echo $text_my_account; ?></h2>
			<ul class="ul-list-1">
				<li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
				<li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
				<li><a href="<?php echo $payment; ?>"><?php echo $text_payment; ?></a></li>
			</ul>
		</div>
		
		<div class="box-content1">
			<h2 class="header-3"><?php echo $text_my_tracking; ?></h2>
			<ul class="ul-list-1">
				<li><a href="<?php echo $tracking; ?>"><?php echo $text_tracking; ?></a></li>
			</ul>
		</div>
		
		<div class="box-content1">
			<h2 class="header-3"><?php echo $text_my_transactions; ?></h2>
			<ul class="ul-list-1">
				<li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
			</ul>
		</div>

	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
