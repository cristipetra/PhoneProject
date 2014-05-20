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
		
		<div class="sitemap-info">
			<div class="left">
				<ul class="ul-list-1 first">
					<?php foreach ($categories as $category_1) { ?>
					<li><a href="<?php echo $category_1['href']; ?>"><?php echo $category_1['name']; ?></a>
						<?php if ($category_1['children']) { ?>
						<ul class="ul-list-1">
							<?php foreach ($category_1['children'] as $category_2) { ?>
							<li><a href="<?php echo $category_2['href']; ?>"><?php echo $category_2['name']; ?></a>
								<?php if ($category_2['children']) { ?>
								<ul class="ul-list-1">
									<?php foreach ($category_2['children'] as $category_3) { ?>
									<li><a href="<?php echo $category_3['href']; ?>"><?php echo $category_3['name']; ?></a></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="right">
				<ul class="ul-list-1 first">
					<li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
					<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a>
						<ul class="ul-list-1">
							<li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
							<li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
							<li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
							<li><a href="<?php echo $history; ?>"><?php echo $text_history; ?></a></li>
							<li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
						</ul>
					</li>
					<li><a href="<?php echo $cart; ?>"><?php echo $text_cart; ?></a></li>
					<li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
					<li><a href="<?php echo $search; ?>"><?php echo $text_search; ?></a></li>
					<li><?php echo $text_information; ?>
						<ul class="ul-list-1">
							<?php foreach ($informations as $information) { ?>
							<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
							<?php } ?>
							<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<?php echo $footer; ?>
