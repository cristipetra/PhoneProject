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
			<div class="content box-form m0">
				<table class="form">
					<tr>
						<td><?php echo $entry_newsletter; ?></td>
						<td><?php if ($newsletter) { ?>
							<input type="radio" name="newsletter" value="1" checked="checked" />
							<?php echo $text_yes; ?>&nbsp;
							<input type="radio" name="newsletter" value="0" />
							<?php echo $text_no; ?>
							<?php } else { ?>
							<input type="radio" name="newsletter" value="1" />
							<?php echo $text_yes; ?>&nbsp;
							<input type="radio" name="newsletter" value="0" checked="checked" />
							<?php echo $text_no; ?>
							<?php } ?></td>
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