
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
				<li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
				<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
			</ul>
		</div>
		
		
		<div class="box-content1">
			<h2 class="header-3"><?php echo $text_my_orders; ?></h2>
			<ul class="ul-list-1">
				<li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
				<li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
				<?php if ($reward) { ?>
				<li><a href="<?php echo $reward; ?>"><?php echo $text_reward; ?></a></li>
				<?php } ?>
				<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
				<li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>


			<li><a href="<?php echo $my_designs; ?>"><?php echo $text_my_designs; ?></a></li>
			

			
				<li><a href="<?php echo $recurring; ?>"><?php echo $text_recurring; ?></a></li>
			</ul>
		</div>
		
		<div class="box-content1">
			<h2 class="header-3"><?php echo $text_my_newsletter; ?></h2>
			<ul class="ul-list-1">
				<li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
			</ul>
		</div><br /><br />
		
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>