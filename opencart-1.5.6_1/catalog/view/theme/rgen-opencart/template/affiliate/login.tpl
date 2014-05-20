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
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<?php echo $text_description; ?>
		<div class="login-content">
			<div class="left box-form">
				<h2 class="header-3"><?php echo $text_new_affiliate; ?></h2>
				<div class="content"><?php echo $text_register_account; ?> <a href="<?php echo $register; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
			</div>
			<div class="right box-form">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<h2 class="header-3"><?php echo $text_returning_affiliate; ?></h2>
					<div class="content">
						<p><?php echo $text_i_am_returning_affiliate; ?></p>
						
						<label for="email"><?php echo $entry_email; ?></label>
						<input type="text" name="email" value="<?php echo $email; ?>" />
						
						<label for="password"><?php echo $entry_password; ?></label>
						<input type="password" name="password" value="<?php echo $password; ?>" />
						
						<a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a><br />
						<input type="submit" value="<?php echo $button_login; ?>" class="button dark-bt" />
						
						<?php if ($redirect) { ?>
						<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
