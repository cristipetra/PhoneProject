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
		<?php if ($profiles) { ?>

		<table class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $column_profile_id; ?></td>
					<td class="left"><?php echo $column_created; ?></td>
					<td class="left"><?php echo $column_status; ?></td>
					<td class="left"><?php echo $column_product; ?></td>
					<td class="right"><?php echo $column_action; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php if ($profiles) { ?>
				<?php foreach ($profiles as $profile) { ?>
				<tr>
					<td class="left">#<?php echo $profile['id']; ?></td>
					<td class="left"><?php echo $profile['created']; ?></td>
					<td class="left"><?php echo $status_types[$profile['status']]; ?></td>
					<td class="left"><?php echo $profile['name']; ?></td>
					<td class="right"><a href="<?php echo $profile['href']; ?>"><img src="catalog/view/theme/default/image/info.png" alt="<?php echo $button_view; ?>" title="<?php echo $button_view; ?>" /></a></td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td class="center" colspan="5"><?php echo $text_empty; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<div class="pagination"><?php echo $pagination; ?></div>
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<?php } ?>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
		</div>

	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>