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
		
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		
		<div class="content box-form m0">
		
			<h2 class="header-3"><?php echo $text_your_details; ?></h2>
			<table class="form">
				<tr>
					<td><?php echo $entry_firstname; ?> <span class="required">*</span></td>
					<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" />
						<?php if ($error_firstname) { ?>
						<span class="error"><?php echo $error_firstname; ?></span>
						<?php } ?></td>
				</tr>
				<tr>
					<td><?php echo $entry_lastname; ?> <span class="required">*</span></td>
					<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" />
						<?php if ($error_lastname) { ?>
						<span class="error"><?php echo $error_lastname; ?></span>
						<?php } ?></td>
				</tr>
				<tr>
					<td><?php echo $entry_email; ?> <span class="required">*</span></td>
					<td><input type="text" name="email" value="<?php echo $email; ?>" />
						<?php if ($error_email) { ?>
						<span class="error"><?php echo $error_email; ?></span>
						<?php } ?></td>
				</tr>
				<tr>
					<td><?php echo $entry_telephone; ?> <span class="required">*</span></td>
					<td><input type="text" name="telephone" value="<?php echo $telephone; ?>" />
						<?php if ($error_telephone) { ?>
						<span class="error"><?php echo $error_telephone; ?></span>
						<?php } ?></td>
				</tr>
				<tr>
					<td><?php echo $entry_fax; ?></td>
					<td><input type="text" name="fax" value="<?php echo $fax; ?>" /></td>
				</tr>
			</table>
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