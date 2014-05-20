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
		
		<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
		<?php } ?>
		
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		
		<div class="login-content">
			<div class="left box-form">
				<h2 class="header-3"><?php echo $text_new_customer; ?></h2>
				<div class="content">
					<p><b><?php echo $text_register; ?></b></p>
					<p><?php echo $text_register_account; ?></p>
					<a href="<?php echo $register; ?>" class="button dark-bt"><?php echo $button_continue; ?></a>
				</div>
			</div>
			<div class="right box-form">
				<h2 class="header-3"><?php echo $text_returning_customer; ?></h2>
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<div class="content">
						<p><?php echo $text_i_am_returning_customer; ?></p>
						<label for="email"><?php echo $entry_email; ?></label>
						
						<input type="text" name="email" value="<?php echo $email; ?>" />
						
						<label for="password"><?php echo $entry_password; ?></label>
						<input type="password" name="password" value="<?php echo $password; ?>" />
						<a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
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
<script type="text/javascript"><!--
$('#login input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#login').submit();
	}
});
//--></script> 
<?php echo $footer; ?>