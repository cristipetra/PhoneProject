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
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
			<div class="box-form m0">
				<h2 class="header-3"><?php echo $text_password; ?></h2>
				<div class="content">
					<table class="form">
						<tr>
							<td><?php echo $entry_password; ?> <span class="required">*</span></td>
							<td><input type="password" name="password" value="<?php echo $password; ?>" />
								<?php if ($error_password) { ?>
								<span class="error"><?php echo $error_password; ?></span>
								<?php } ?></td>
						</tr>
						<tr>
							<td><?php echo $entry_confirm; ?> <span class="required">*</span></td>
							<td><input type="password" name="confirm" value="<?php echo $confirm; ?>" />
								<?php if ($error_confirm) { ?>
								<span class="error"><?php echo $error_confirm; ?></span>
								<?php } ?></td>
						</tr>
					</table>
				</div>
			</div>
			
			
			<div class="buttons">
				<div class="left"><a href="<?php echo $back; ?>" class="button dark-bt"><?php echo $button_back; ?></a></div>
				<div class="right">
					<input type="submit" value="<?php echo $button_continue; ?>" class="button dark-bt" />
				</div>
			</div>
		</form>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>