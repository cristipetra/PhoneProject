<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body contactus">
		
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php echo $content_top; ?>
		
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td class="left">
						<div class="contact-info">
							<div class="content">
								
								<h2 class="header-3"><?php echo $text_address; ?></h2>
								<h3 class="header-4"><?php echo $store; ?></h3>
								<?php echo $address; ?><br /><br /><br />
								
								
								<?php if ($telephone) { ?>
								<h2 class="header-3"><?php echo $text_telephone; ?></h2>
								<strong><?php echo $telephone; ?><br /></strong>
								<br /><br /><br />
								<?php } ?>
								
								
								<?php if ($fax) { ?>
								<h2 class="header-3"><?php echo $text_fax; ?></h2>
								<strong><?php echo $fax; ?></strong>
								<?php } ?>
								
							</div>
						</div>
					</td>
					<td class="right box-form">
						<h2 class="header-3"><?php echo $text_contact; ?></h2>
						<div class="content">
							
							<table>
								<tr>
									<td>
										<label for="name"><?php echo $entry_name; ?></label>
										<input type="text" name="name" style="margin-right:20px" value="<?php echo $name; ?>" />
										<?php if ($error_name) { ?>
										<span class="error"><?php echo $error_name; ?></span>
										<?php } ?>
									</td>
									<td>
										<label for="email"><?php echo $entry_email; ?></label>
										<input type="text" name="email" value="<?php echo $email; ?>" />
										<?php if ($error_email) { ?>
										<span class="error"><?php echo $error_email; ?></span>
										<?php } ?>	
									</td>
								</tr>
							</table>
							
							<label for="enquiry"><?php echo $entry_enquiry; ?></label>
							<textarea name="enquiry" cols="30" rows="5"><?php echo $enquiry; ?></textarea>
							<?php if ($error_enquiry) { ?>
							<span class="error"><?php echo $error_enquiry; ?></span>
							<?php } ?>
							
							<label for="captcha"><?php echo $entry_captcha; ?></label>
							<input type="text" name="captcha" value="<?php echo $captcha; ?>" />
							<img src="index.php?route=information/contact/captcha" class="captchaimg" alt="" />
							<?php if ($error_captcha) { ?>
							<span class="error"><?php echo $error_captcha; ?></span>
							<?php } ?>
						</div>
						<input type="submit" value="<?php echo $button_continue; ?>" class="button dark-bt" />
						
					</td>
				</tr>
			</table>
		</form>
		
	</div>
	<div class="clearfix"></div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
