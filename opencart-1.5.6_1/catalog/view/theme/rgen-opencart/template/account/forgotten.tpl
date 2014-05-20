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
		
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
			<p><?php echo $text_email; ?></p>
			<div class="box-form m0">
				<h2 class="header-3"><?php echo $text_your_email; ?></h2>
				<div class="content">
					<table class="form">
						<tr>
							<td><?php echo $entry_email; ?></td>
							<td><input type="text" name="email" value="" /></td>
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