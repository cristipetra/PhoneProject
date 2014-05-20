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
		
		<?php if ($categories) { ?>
		<p class="brands-a2z"><b class="header-3"><?php echo $text_index; ?></b>&nbsp;
			<?php foreach ($categories as $category) { ?>
			<a href="index.php?route=product/manufacturer#<?php echo $category['name']; ?>"><b><?php echo $category['name']; ?></b></a>
			<?php } ?>
		</p>
		<?php foreach ($categories as $category) { ?>
		<div class="manufacturer-list">
			<div class="manufacturer-heading header-3"><?php echo $category['name']; ?><a id="<?php echo $category['name']; ?>"></a></div>
			<div class="manufacturer-content">
				<?php if ($category['manufacturer']) { ?>
				<?php for ($i = 0; $i < count($category['manufacturer']);) { ?>
				<ul>
					<?php $j = $i + ceil(count($category['manufacturer']) / 4); ?>
					<?php for (; $i < $j; $i++) { ?>
					<?php if (isset($category['manufacturer'][$i])) { ?>
					<li><a href="<?php echo $category['manufacturer'][$i]['href']; ?>"><?php echo $category['manufacturer'][$i]['name']; ?></a></li>
					<?php } ?>
					<?php } ?>
				</ul>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } ?>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
