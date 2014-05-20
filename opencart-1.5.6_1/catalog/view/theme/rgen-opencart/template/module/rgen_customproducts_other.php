<?php 
/* Single category display section
******************************/
if ($value['prdTypes'] == 'catSection') { ?>
<?php 

/* Content area 
******************************/
if ($position != 'column_left' && $position != 'column_right') { ?>
	<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
		
		<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
		<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
		<div class="box-heading header-1"><?php echo $modSettings['title']; ?><a href="<?php echo $modSettings['categories']['maincat']['href']; ?>" class="link-bt"><?php echo $this->language->get('text_viewall'); ?></a></div>
		<?php } }

		if (isset($modSettings['categories']['maincat'])) {
			if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { $row = 1; ?>
				<div class="row" data-col="6">
					<?php foreach ($modSettings['categories']['level_1'] as $level_1_k => $level_1_v) { ?>
					<div class="col">
						<div class="sec-box">
							<div class="sec-main">
								<a href="<?php echo $level_1_v['href']; ?>" class="img"><img src="<?php echo $level_1_v['image']; ?>" alt=""></a>
								<a href="<?php echo $level_1_v['href']; ?>" class="hd"><span><?php echo $level_1_v['name']; ?></span></a>
							</div>
							<ul>
								<?php 
								$ct_l = 1;
								$ct_limit = isset($modSettings['limit']) && $modSettings['limit'] != '' ? $modSettings['limit'] : 10000;
								if (isset($modSettings['categories']['level_2'][$level_1_v['category_id']])) {
								foreach ($modSettings['categories']['level_2'][$level_1_v['category_id']] as $level_2_k => $level_2_v) { 
								if ($ct_l <= $ct_limit) { ?>
								<li><a href="<?php echo $level_2_v['href']; ?>" title="<?php echo $level_2_v['name']; ?>"><?php echo $level_2_v['name']; ?></a></li>
								<?php } $ct_l++; } } ?>
							</ul>
						</div>
					</div>
					<?php if ($row >= 6){ echo '<b class="clearfix"></b>'; $row = 1; }; $row++; } ?>
				</div>
			<?php }else{ ?>
				<div class="row scroll">
					<div class="owl-carousel box-product">
					<?php foreach ($modSettings['categories']['level_1'] as $level_1_k => $level_1_v) { ?>
					<div class="col">
						<div class="sec-box">
							<div class="sec-main">
								<a href="<?php echo $level_1_v['href']; ?>" class="img"><img src="<?php echo $level_1_v['image']; ?>" alt=""></a>
								<a href="<?php echo $level_1_v['href']; ?>" class="hd"><span><?php echo $level_1_v['name']; ?></span></a>
							</div>
							<ul>
								<?php 
								$ct_l = 1;
								$ct_limit = isset($modSettings['limit']) && $modSettings['limit'] != '' ? $modSettings['limit'] : 10000;
								if (isset($modSettings['categories']['level_2'][$level_1_v['category_id']])) {
								foreach ($modSettings['categories']['level_2'][$level_1_v['category_id']] as $level_2_k => $level_2_v) { 
								if ($ct_l <= $ct_limit) { ?>
								<li><a href="<?php echo $level_2_v['href']; ?>" title="<?php echo $level_2_v['name']; ?>"><?php echo $level_2_v['name']; ?></a></li>
								<?php } $ct_l++; } } ?>
							</ul>
						</div>
					</div>
					<?php } ?>
					</div>
				</div>
			<?php }
		} ?>

		<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
		<div class="clearfix hr"></div>
		<?php } ?>
		
	</div>
	<?php if ($value['prdStyle'] == 'scroll') { ?>
	<script type="text/javascript">
	$(document).ready(function() {
		var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
		$(obj + " .owl-carousel").owlCarousel({
			itemsCustom : [ [0, 1], [390, 3], [530, 4], [700, 5], [940, 6], [1180, 7] ],
			navigation : false,
			navigationText : ["",""],
			responsiveBaseWidth: obj
		});
		$(".owl-prev").addClass('prev');
		$(".owl-next").addClass('next');
		$(".owl-controls").addClass('carousel-controls');
	});
	</script>
	<?php } ?>
<?php 
/* Side column
******************************/
}else{ ?>
	<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
		<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
		<div class="box-heading header-3"><a href="<?php echo $modSettings['categories']['maincat']['href']; ?>"><?php echo $modSettings['title']; ?></a></div>
		<?php }
		if (isset($modSettings['categories']['maincat'])) {
			if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { $row = 1; ?>
				<?php foreach ($modSettings['categories']['level_1'] as $level_1_k => $level_1_v) { ?>
				<div class="sec-box">
					<div class="sec-main">
						<a href="<?php echo $level_1_v['href']; ?>" class="img"><img src="<?php echo $level_1_v['image']; ?>" alt=""></a>
						<a href="<?php echo $level_1_v['href']; ?>" class="hd"><span><?php echo $level_1_v['name']; ?></span></a>
					</div>
					<ul>
						<?php 
						$ct_l = 1;
						$ct_limit = isset($modSettings['limit']) && $modSettings['limit'] != '' ? $modSettings['limit'] : 10000;
						if (isset($modSettings['categories']['level_2'][$level_1_v['category_id']])) {
						foreach ($modSettings['categories']['level_2'][$level_1_v['category_id']] as $level_2_k => $level_2_v) { 
						if ($ct_l <= $ct_limit) { ?>
						<li><a href="<?php echo $level_2_v['href']; ?>" title="<?php echo $level_2_v['name']; ?>"><?php echo $level_2_v['name']; ?></a></li>
						<?php } $ct_l++; } } ?>
					</ul>
				</div>
				<?php } ?>
			<?php }else{ ?>
				<div class="owl-carousel box-product">
					<?php foreach ($modSettings['categories']['level_1'] as $level_1_k => $level_1_v) { ?>
					<div class="sec-box">
						<div class="sec-main">
							<a href="<?php echo $level_1_v['href']; ?>" class="img"><img src="<?php echo $level_1_v['image']; ?>" alt=""></a>
							<a href="<?php echo $level_1_v['href']; ?>" class="hd"><span><?php echo $level_1_v['name']; ?></span></a>
						</div>
						<ul>
							<?php 
							$ct_l = 1;
							$ct_limit = isset($modSettings['limit']) && $modSettings['limit'] != '' ? $modSettings['limit'] : 10000;
							if (isset($modSettings['categories']['level_2'][$level_1_v['category_id']])) {
							foreach ($modSettings['categories']['level_2'][$level_1_v['category_id']] as $level_2_k => $level_2_v) { 
							if ($ct_l <= $ct_limit) { ?>
							<li><a href="<?php echo $level_2_v['href']; ?>" title="<?php echo $level_2_v['name']; ?>"><?php echo $level_2_v['name']; ?></a></li>
							<?php } $ct_l++; } } ?>
						</ul>
					</div>
					<?php } ?>
				</div>
			<?php }
		} ?>
	</div>
	<?php if ($value['prdStyle'] == 'scroll') { ?>
	<script type="text/javascript">
	$(document).ready(function() {
		var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
		$(obj + " .owl-carousel").owlCarousel({
			singleItem: true,
			navigation : false,
			responsive : true
		});
		$(".owl-prev").addClass('prev');
		$(".owl-next").addClass('next');
		$(".owl-controls").addClass('carousel-controls');
	});
	</script>
	<?php } ?>
<?php } ?>
<?php } ?>



<?php 
/* Selected category display section
******************************/
if ($value['prdTypes'] == 'selcatSection') {

/* Content area 
******************************/
if ($position != 'column_left' && $position != 'column_right') {

	/* Selected category display with products
	******************************/
	if ($modSettings['prdstatus'] == 'y') {
		
		/* Section style 1
		******************************/
		if ($modSettings['sectionStyle'] == '1') { ?>
		
			<div class="selcat-prdsec-style1 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
				<?php } }
				if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { 
						$row = 1; $grid = 3; 
						?>
						<div class="row" data-col="<?php echo $grid; ?>">
							<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="col<?php if ($row >= $grid){ echo ' last'; } ?>">
								<div class="sec-box-wrp">
									<div class="sec-box">
										<b class="hov-img"></b>
										<div class="sec-main">
											<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
											<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
										</div>
										<a href="<?php echo $selcat_v['href']; ?>" class="link-bt"><?php echo $this->language->get('text_viewall'); ?></a>
									</div>
									<ul class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
										foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { ?>
										<li class="prd">
											<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
											<div class="info">
												<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
												<strong class="price">
													<?php if (!$prd_v['special']) { ?>
													<span class="new"><?php echo $prd_v['price']; ?></span>
													<?php } else { ?>
													<span class="old"><?php echo $prd_v['price']; ?></span>
													<span class="new"><?php echo $prd_v['special']; ?></span>
													<?php } ?>
												</strong>
											</div>
											<b></b>
										</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
							<?php if ($row >= $grid){ echo '<b class="clearfix hr"></b>'; $row = 0; }; $row++; } ?>
						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="owl-carousel box-product">
							<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="col">
								<div class="sec-box-wrp">
									<div class="sec-box">
										<b class="hov-img"></b>
										<div class="sec-main">
											<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
											<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
										</div>
										<a href="<?php echo $selcat_v['href']; ?>" class="link-bt"><?php echo $this->language->get('text_viewall'); ?></a>
									</div>
									<ul class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
										foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { ?>
										<li class="prd">
											<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
											<div class="info">
												<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
												<strong class="price">
													<?php if (!$prd_v['special']) { ?>
													<span class="new"><?php echo $prd_v['price']; ?></span>
													<?php } else { ?>
													<span class="old"><?php echo $prd_v['price']; ?></span>
													<span class="new"><?php echo $prd_v['special']; ?></span>
													<?php } ?>
												</strong>
											</div>
											<b></b>
										</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
							<?php } ?>
							</div>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($value['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				$(obj + " .owl-carousel").owlCarousel({
					itemsCustom : [ [0, 1], [390, 1], [530, 1], [700, 2], [940, 2], [1180, 3] ],
					navigation : false,
					navigationText : ["",""],
					responsiveBaseWidth: obj
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php }else{ 

		/* Section style 2
		******************************/?>
			<div class="selcat-prdsec-style2 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
				<?php } }
				if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { 
						$row = 1; $grid = 3; 
						?>
						<div class="row" data-col="<?php echo $grid; ?>">
							<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="col<?php if ($row >= $grid){ echo ' last'; } ?>">
								<div class="sec-box-wrp1">
									<div class="sec-box-hd">
										<a href="<?php echo $selcat_v['href']; ?>" class="hd"><?php echo $selcat_v['name']; ?></a>
										<a href="<?php echo $selcat_v['href']; ?>" style="background-image:url(<?php echo $selcat_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
										<b></b>
									</div>
									<div class="sec-prd-outer">
										<div class="sec-prd owl-carousel">
											<?php 
											if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
												$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selcat_v['category_id']]);
												foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { 
													if ($pd > $items) { $pd = 1; }
													if ($pd == 1) { echo '<div>'; }
													?>
													<div class="prd">
														<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
														<div class="info">
															<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
															<strong class="price">
																<?php if (!$prd_v['special']) { ?>
																<span class="new"><?php echo $prd_v['price']; ?></span>
																<?php } else { ?>
																<span class="old"><?php echo $prd_v['price']; ?></span>
																<span class="new"><?php echo $prd_v['special']; ?></span>
																<?php } ?>
															</strong>
														</div>
														<b></b>
													</div>
													<?php if ($pd == $items) { echo '</div>';  } ?>
													<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
												<?php $pd++; $pd_count++;
												} 
											} ?>
										</div>
									</div>
								</div>
							</div>
							<?php if ($row >= $grid){ echo '<b class="clearfix hr"></b>'; $row = 0; }; $row++; } ?>

							<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
							<script type="text/javascript">
							$(document).ready(function() {
								var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
								inOwl_grid(obj);
							});
							</script>
							<?php } ?>

						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="owl-carousel box-product">
							<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="col">
								<div class="sec-box-wrp1">
									<div class="sec-box-hd">
										<a href="<?php echo $selcat_v['href']; ?>" class="hd"><?php echo $selcat_v['name']; ?></a>
										<a href="<?php echo $selcat_v['href']; ?>" style="background-image:url(<?php echo $selcat_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
										<b></b>
									</div>
									<div class="sec-prd-outer">
										<div class="sec-prd">
											<?php 
											if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
												$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selcat_v['category_id']]);
												foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { 
													if ($pd > $items) { $pd = 1; }
													if ($pd == 1) { echo '<div>'; }
													?>
													<div class="prd">
														<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
														<div class="info">
															<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
															<strong class="price">
																<?php if (!$prd_v['special']) { ?>
																<span class="new"><?php echo $prd_v['price']; ?></span>
																<?php } else { ?>
																<span class="old"><?php echo $prd_v['price']; ?></span>
																<span class="new"><?php echo $prd_v['special']; ?></span>
																<?php } ?>
															</strong>
														</div>
														<b></b>
													</div>
													<?php if ($pd == $items) { echo '</div>';  } ?>
													<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
												<?php $pd++; $pd_count++;
												} 
											} ?>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							</div>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($value['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				inOwl_scroll(obj);
				<?php } ?>
				$(obj + " .box-product").owlCarousel({
					itemsCustom : [ [0, 1], [390, 1], [530, 1], [700, 2], [940, 3], [1180, 4] ],
					navigation : false,
					navigationText : ["",""],
					responsiveBaseWidth: obj
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } ?>
	
	<?php }

	/* Selected category normal display 
	******************************/
	else { ?>

		<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
			
			<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
			<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
			<?php } }

			if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
				if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { $row = 1; ?>
					<div class="row" data-col="6">
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
						<div class="col">
							<div class="sec-box">
								<div class="sec-main">
									<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
									<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
								</div>
							</div>
						</div>
						<?php if ($row >= 6){ echo '<b class="clearfix"></b>'; $row = 1; }; $row++; } ?>
					</div>
				<?php }else{ ?>
					<div class="row scroll">
						<div class="owl-carousel box-product">
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
						<div class="col">
							<div class="sec-box">
								<div class="sec-main">
									<a href="<?php echo isset($selcat_v['href']) ? $selcat_v['href'] : null; ?>" class="img"><img src="<?php echo isset($selcat_v['image']) ? $selcat_v['image'] : null; ?>" alt=""></a>
									<a href="<?php echo isset($selcat_v['href']) ? $selcat_v['href'] : null; ?>" class="hd"><span><?php echo isset($selcat_v['name']) ? $selcat_v['name'] : null; ?></span></a>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
					</div>
				<?php }
			} ?>
			<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<div class="clearfix hr"></div>
			<?php } ?>
		</div>
		<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
		<script type="text/javascript">
		$(document).ready(function() {
			var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
			$(obj + " .owl-carousel").owlCarousel({
				itemsCustom : [ [0, 1], [390, 3], [530, 4], [700, 5], [940, 6], [1180, 7] ],
				navigation : false,
				navigationText : ["",""],
				responsiveBaseWidth: obj
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
		</script>
		<?php } ?>

	<?php } ?>

<?php 

/* Side column
******************************/
}else{

	/* Selected category display with products
	******************************/
	if ($modSettings['prdstatus'] == 'y') {
		
		/* Section style 1
		******************************/
		if ($modSettings['sectionStyle'] == '1') { ?>
		
			<div class="selcat-prdsec-style1 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-3"><?php echo $modSettings['title']; ?></div>
				<?php }

				if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { ?>
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
						<div class="sec-box-wrp">
							<div class="sec-box col-sec-box">
								<b class="hov-img"></b>
								<div class="sec-main">
									<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
									<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
								</div>
							</div>
							<ul class="sec-prd">
								<?php 
								if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
								foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { ?>
								<li class="prd">
									<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
									<div class="info">
										<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
										<strong class="price">
											<?php if (!$prd_v['special']) { ?>
											<span class="new"><?php echo $prd_v['price']; ?></span>
											<?php } else { ?>
											<span class="old"><?php echo $prd_v['price']; ?></span>
											<span class="new"><?php echo $prd_v['special']; ?></span>
											<?php } ?>
										</strong>
									</div>
									<b></b>
								</li>
								<?php } } ?>
							</ul>
							<a href="<?php echo $selcat_v['href']; ?>" class="view-bt"><?php echo $this->language->get('text_viewall'); ?></a>
							
						</div>
						<b class="clearfix hr"></b>
						<?php } ?>
					<?php }else{ ?>
						<div class="owl-carousel box-product">
							<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="sec-box-wrp">
								<div class="sec-box col-sec-box">
									<b class="hov-img"></b>
									<div class="sec-main">
										<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
										<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
									</div>
								</div>
								<ul class="sec-prd">
									<?php 
									if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
									foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { ?>
									<li class="prd">
										<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
										<div class="info">
											<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
											<strong class="price">
												<?php if (!$prd_v['special']) { ?>
												<span class="new"><?php echo $prd_v['price']; ?></span>
												<?php } else { ?>
												<span class="old"><?php echo $prd_v['price']; ?></span>
												<span class="new"><?php echo $prd_v['special']; ?></span>
												<?php } ?>
											</strong>
										</div>
										<b></b>
									</li>
									<?php } } ?>
								</ul>
								<a href="<?php echo $selcat_v['href']; ?>" class="view-bt"><?php echo $this->language->get('text_viewall'); ?></a>
							</div>
							<?php } ?>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($value['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				$(obj + " .owl-carousel").owlCarousel({
					singleItem: true,
					navigation : false,
					responsive : true
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php }else{ 

		/* Section style 2
		******************************/?>
			<div class="selcat-prdsec-style2 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-3"><?php echo $modSettings['title']; ?></div>
				<?php } }
				if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { ?>
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
						<div class="sec-box-wrp1 box-product">
							<div class="sec-box-hd">
								<a href="<?php echo $selcat_v['href']; ?>" class="hd"><?php echo $selcat_v['name']; ?></a>
								<a href="<?php echo $selcat_v['href']; ?>" style="background-image:url(<?php echo $selcat_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
								<b></b>
							</div>
							<div class="sec-prd-outer">
								<div class="sec-prd owl-carousel">
									<?php 
									if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
										$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selcat_v['category_id']]);
										foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { 
											if ($pd > $items) { $pd = 1; }
											if ($pd == 1) { echo '<div>'; }
											?>
											<div class="prd">
												<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
												<div class="info">
													<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
													<strong class="price">
														<?php if (!$prd_v['special']) { ?>
														<span class="new"><?php echo $prd_v['price']; ?></span>
														<?php } else { ?>
														<span class="old"><?php echo $prd_v['price']; ?></span>
														<span class="new"><?php echo $prd_v['special']; ?></span>
														<?php } ?>
													</strong>
												</div>
												<b></b>
											</div>
											<?php if ($pd == $items) { echo '</div>';  } ?>
											<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
										<?php $pd++; $pd_count++;
										} 
									} ?>
								</div>
							</div>
						</div>
						<b class="clearfix hr"></b>
						<?php } ?>

						<script type="text/javascript">
						$(document).ready(function() {
							var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
							inOwl_grid_column(obj);
						});
						</script>

					<?php }else{ ?>
						<div class="owl-carousel box-product">
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
							<div class="sec-box-wrp1">
								<div class="sec-box-hd">
									<a href="<?php echo $selcat_v['href']; ?>" class="hd"><?php echo $selcat_v['name']; ?></a>
									<a href="<?php echo $selcat_v['href']; ?>" style="background-image:url(<?php echo $selcat_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
									<b></b>
								</div>
								<div class="sec-prd-outer">
									<div class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selcat_v['category_id']]) && !empty($modSettings['prd'])) {
											$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selcat_v['category_id']]);
											foreach ($modSettings['prd'][$selcat_v['category_id']] as $prd_k => $prd_v) { 
												if ($pd > $items) { $pd = 1; }
												if ($pd == 1) { echo '<div>'; }
												?>
												<div class="prd">
													<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
													<div class="info">
														<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
														<strong class="price">
															<?php if (!$prd_v['special']) { ?>
															<span class="new"><?php echo $prd_v['price']; ?></span>
															<?php } else { ?>
															<span class="old"><?php echo $prd_v['price']; ?></span>
															<span class="new"><?php echo $prd_v['special']; ?></span>
															<?php } ?>
														</strong>
													</div>
													<b></b>
												</div>
												<?php if ($pd == $items) { echo '</div>';  } ?>
												<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
											<?php $pd++; $pd_count++;
											} 
										} ?>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					<?php }
				} ?>
			</div>
			<?php if ($value['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				inOwl_scroll_column(obj);
				$(obj + " .box-product").owlCarousel({
					singleItem : true,
					navigation : false,
					responsive : true
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } ?>
	
	<?php }

	/* Selected category normal display 
	******************************/
	else { ?>

		<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
			
			<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
			<div class="box-heading header-3"><?php echo $modSettings['title']; ?></div>
			<?php }
			if (isset($modSettings['categories']) && !empty($modSettings['categories'])) {
				if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { $row = 1; ?>
					<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
					<div class="sec-box">
						<div class="sec-main">
							<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
							<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
						</div>
					</div>
					<?php } ?>
				<?php }else{ ?>
					<div class="owl-carousel box-product">
						<?php foreach ($modSettings['categories'] as $selcat_k => $selcat_v) { ?>
						<div class="sec-box">
							<div class="sec-main">
								<a href="<?php echo $selcat_v['href']; ?>" class="img"><img src="<?php echo $selcat_v['image']; ?>" alt=""></a>
								<a href="<?php echo $selcat_v['href']; ?>" class="hd"><span><?php echo $selcat_v['name']; ?></span></a>
							</div>
						</div>
						<?php } ?>
					</div>
				<?php }
			} ?>
			<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<div class="clearfix hr"></div>
			<?php } ?>
		</div>
		<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
		<script type="text/javascript">
		$(document).ready(function() {
			var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
			$(obj + " .owl-carousel").owlCarousel({
				singleItem: true,
				navigation : false,
				responsive : true
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
		</script>
		<?php } ?>

	<?php } ?>

<?php } ?>

<?php } ?>



<?php 
/* Selected brands display section
******************************/
if ($value['prdTypes'] == 'brandSection') { 

/* Content area 
******************************/
if ($position != 'column_left' && $position != 'column_right') {

	/* Selected brands display with products
	******************************/
	if ($modSettings['prdstatus'] == 'y') {
		
		/* Section style 1
		******************************/
		if ($modSettings['sectionStyle'] == '1') { ?>
			<div class="brand-prdsec-style1 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
				<?php } }

				if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { 
						$row = 1; $grid = 3; 
						?>
						<div class="row" data-col="<?php echo $grid; ?>">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="col<?php if ($row >= $grid){ echo ' last'; } ?>">
								<div class="brd-box-prd">
									<div class="brd-hd">
										<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
										<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
										<b></b>
									</div>
									<ul class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
										foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { ?>
										<li class="prd">
											<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
											<div class="info">
												<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
												<strong class="price">
													<?php if (!$prd_v['special']) { ?>
													<span class="new"><?php echo $prd_v['price']; ?></span>
													<?php } else { ?>
													<span class="old"><?php echo $prd_v['price']; ?></span>
													<span class="new"><?php echo $prd_v['special']; ?></span>
													<?php } ?>
												</strong>
											</div>
											<b></b>
										</li>
										<?php } } ?>
									</ul>
								</div>
								
							</div>
							<?php if ($row >= $grid){ echo '<b class="clearfix hr"></b>'; $row = 0; }; $row++; } ?>
						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="owl-carousel box-product">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="col">
								<div class="brd-box-prd">
									<div class="brd-hd">
										<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
										<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
										<b></b>
									</div>
									<ul class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
										foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { ?>
										<li class="prd">
											<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
											<div class="info">
												<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
												<strong class="price">
													<?php if (!$prd_v['special']) { ?>
													<span class="new"><?php echo $prd_v['price']; ?></span>
													<?php } else { ?>
													<span class="old"><?php echo $prd_v['price']; ?></span>
													<span class="new"><?php echo $prd_v['special']; ?></span>
													<?php } ?>
												</strong>
											</div>
											<b></b>
										</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
							<?php } ?>
							</div>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				$(obj + " .owl-carousel").owlCarousel({
					itemsCustom : [ [0, 1], [390, 1], [530, 2], [700, 2], [940, 3], [1180, 4] ],
					navigation : false,
					navigationText : ["",""],
					responsiveBaseWidth: obj
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } 

		/* Section style 2
		******************************/
		else { ?>
			<div class="brand-prdsec-style2 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
				<?php } }

				if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { 
						$row = 1; $grid = 3; 
						?>
						<div class="row" data-col="<?php echo $grid; ?>">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="col<?php if ($row >= $grid){ echo ' last'; } ?>">
								<div class="sec-box-wrp1">
									<div class="sec-box-hd">
										<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
										<a href="<?php echo $selbrand_v['href']; ?>" style="background-image:url(<?php echo $selbrand_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
										<b></b>
									</div>
									<div class="sec-prd-outer">
										<div class="sec-prd owl-carousel">
											<?php 
											if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
												$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selbrand_v['manufacturer_id']]);
												foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { 
													if ($pd > $items) { $pd = 1; }
													if ($pd == 1) { echo '<div>'; }
													?>
													<div class="prd">
														<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
														<div class="info">
															<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
															<strong class="price">
																<?php if (!$prd_v['special']) { ?>
																<span class="new"><?php echo $prd_v['price']; ?></span>
																<?php } else { ?>
																<span class="old"><?php echo $prd_v['price']; ?></span>
																<span class="new"><?php echo $prd_v['special']; ?></span>
																<?php } ?>
															</strong>
														</div>
														<b></b>
													</div>
													<?php if ($pd == $items) { echo '</div>';  } ?>
													<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
												<?php $pd++; $pd_count++;
												} 
											} ?>
										</div>
									</div>
								</div>
							</div>
							<?php if ($row >= $grid){ echo '<b class="clearfix hr"></b>'; $row = 0; }; $row++; } ?>
							
							<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
							<script type="text/javascript">
							$(document).ready(function() {
								var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
								inOwl_grid(obj);
							});
							</script>
							<?php } ?>
						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="owl-carousel box-product">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="col">
								<div class="sec-box-wrp1">
									<div class="sec-box-hd">
										<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
										<a href="<?php echo $selbrand_v['href']; ?>" style="background-image:url(<?php echo $selbrand_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
										<b></b>
									</div>
									<div class="sec-prd-outer">
										<div class="sec-prd">
											<?php 
											if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
												$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selbrand_v['manufacturer_id']]);
												foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { 
													if ($pd > $items) { $pd = 1; }
													if ($pd == 1) { echo '<div>'; }
													?>
													<div class="prd">
														<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
														<div class="info">
															<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
															<strong class="price">
																<?php if (!$prd_v['special']) { ?>
																<span class="new"><?php echo $prd_v['price']; ?></span>
																<?php } else { ?>
																<span class="old"><?php echo $prd_v['price']; ?></span>
																<span class="new"><?php echo $prd_v['special']; ?></span>
																<?php } ?>
															</strong>
														</div>
														<b></b>
													</div>
													<?php if ($pd == $items) { echo '</div>';  } ?>
													<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
												<?php $pd++; $pd_count++;
												} 
											} ?>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							</div>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				inOwl_scroll(obj);
				<?php } ?>
				$(obj + " .box-product").owlCarousel({
					itemsCustom : [ [0, 1], [390, 1], [530, 1], [700, 2], [940, 3], [1180, 4] ],
					navigation : false,
					navigationText : ["",""],
					responsiveBaseWidth: obj
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } ?>
		
	<?php }

	/* Selected brands normal display 
	******************************/
	else { ?>

		<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
			<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
			<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
			<?php } }

			if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
				if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { 
					$row = 1; $grid = 8;
					?>
					<div class="row" data-col="<?php echo $grid; ?>">
						<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
						<div class="col<?php if ($row >= $grid){ echo ' last'; } ?>">
							<div class="sec-box">
								<div class="sec-main">
									<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
									<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><span><?php echo $selbrand_v['name']; ?></span></a>
								</div>
							</div>
						</div>
						<?php if ($row >= $grid){ echo '<b class="clearfix"></b>'; $row = 0; }; $row++; } ?>
					</div>
				<?php }else{ ?>
					<div class="row">
						<div class="owl-carousel box-product">
						<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
						<div class="col">
							<div class="sec-box">
								<div class="sec-main">
									<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
									<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><span><?php echo $selbrand_v['name']; ?></span></a>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
					</div>
				<?php }
			} ?>
			<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<div class="clearfix hr"></div>
			<?php } ?>
		</div>
		<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
		<script type="text/javascript">
		$(document).ready(function() {
			var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
			$(obj + " .owl-carousel").owlCarousel({
				itemsCustom : [ [0, 3], [390, 3], [530, 4], [700, 6], [940, 7], [1180, 8] ],
				navigation : false,
				navigationText : ["",""],
				responsiveBaseWidth: obj
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
		</script>
		<?php } ?>
	
	<?php } ?>

<?php 

/* Side column
******************************/
}else{
	
	/* Selected brands display with products
	******************************/
	if ($modSettings['prdstatus'] == 'y') {
		
		/* Section style 1
		******************************/
		if ($modSettings['sectionStyle'] == '1') { ?>
			<div class="brand-prdsec-style1 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-3"><?php echo $modSettings['title']; ?></div>
				<?php }

				if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { ?>
						<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
						<div class="brd-box-prd">
							<div class="brd-hd">
								<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
								<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
								<b></b>
							</div>
							<ul class="sec-prd">
								<?php 
								if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
								foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { ?>
								<li class="prd">
									<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
									<div class="info">
										<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
										<strong class="price">
											<?php if (!$prd_v['special']) { ?>
											<span class="new"><?php echo $prd_v['price']; ?></span>
											<?php } else { ?>
											<span class="old"><?php echo $prd_v['price']; ?></span>
											<span class="new"><?php echo $prd_v['special']; ?></span>
											<?php } ?>
										</strong>
									</div>
									<b></b>
								</li>
								<?php } } ?>
							</ul>
						</div>
						<?php } ?>
					<?php }else{ ?>
						<div class="owl-carousel box-product">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="brd-box-prd">
								<div class="brd-hd">
									<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
									<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
									<b></b>
								</div>
								<ul class="sec-prd">
									<?php 
									if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
									foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { ?>
									<li class="prd">
										<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
										<div class="info">
											<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
											<strong class="price">
												<?php if (!$prd_v['special']) { ?>
												<span class="new"><?php echo $prd_v['price']; ?></span>
												<?php } else { ?>
												<span class="old"><?php echo $prd_v['price']; ?></span>
												<span class="new"><?php echo $prd_v['special']; ?></span>
												<?php } ?>
											</strong>
										</div>
										<b></b>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<?php } ?>
						</div>
					<?php }
				} ?>
			</div>
			<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				$(obj + " .owl-carousel").owlCarousel({
					singleItem: true,
					navigation : false,
					responsive : true
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } 

		/* Section style 2
		******************************/
		else { ?>
			<div class="brand-prdsec-style2 box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
				<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
				<div class="box-heading header-3"><?php echo $modSettings['title']; ?></div>
				<?php } 

				if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
					if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { ?>
						<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
						<div class="sec-box-wrp1">
							<div class="sec-box-hd">
								<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
								<a href="<?php echo $selbrand_v['href']; ?>" style="background-image:url(<?php echo $selbrand_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
								<b></b>
							</div>
							<div class="sec-prd-outer">
								<div class="sec-prd owl-carousel">
									<?php 
									if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
										$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selbrand_v['manufacturer_id']]);
										foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { 
											if ($pd > $items) { $pd = 1; }
											if ($pd == 1) { echo '<div>'; }
											?>
											<div class="prd">
												<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
												<div class="info">
													<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
													<strong class="price">
														<?php if (!$prd_v['special']) { ?>
														<span class="new"><?php echo $prd_v['price']; ?></span>
														<?php } else { ?>
														<span class="old"><?php echo $prd_v['price']; ?></span>
														<span class="new"><?php echo $prd_v['special']; ?></span>
														<?php } ?>
													</strong>
												</div>
												<b></b>
											</div>
											<?php if ($pd == $items) { echo '</div>';  } ?>
											<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
										<?php $pd++; $pd_count++;
										} 
									} ?>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<script type="text/javascript">
						$(document).ready(function() {
							var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
							inOwl_grid_column(obj);
						});
						</script>
					<?php }else{ ?>
						<div class="owl-carousel box-product">
							<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
							<div class="sec-box-wrp1">
								<div class="sec-box-hd">
									<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><?php echo $selbrand_v['name']; ?></a>
									<a href="<?php echo $selbrand_v['href']; ?>" style="background-image:url(<?php echo $selbrand_v['image']; ?>);" class="img"><img src="catalog/view/theme/rgen-opencart/image/rgen/spacer.png" alt=""></a>
									<b></b>
								</div>
								<div class="sec-prd-outer">
									<div class="sec-prd">
										<?php 
										if (isset($modSettings['prd'][$selbrand_v['manufacturer_id']]) && !empty($modSettings['prd'])) {
											$pd = 1; $pd_count = 1; $items = 4;  $count = count($modSettings['prd'][$selbrand_v['manufacturer_id']]);
											foreach ($modSettings['prd'][$selbrand_v['manufacturer_id']] as $prd_k => $prd_v) { 
												if ($pd > $items) { $pd = 1; }
												if ($pd == 1) { echo '<div>'; }
												?>
												<div class="prd">
													<a href="<?php echo $prd_v['href']; ?>" class="p-img"><img src="<?php echo $prd_v['thumb']; ?>" alt="<?php echo $prd_v['name']; ?>"></a>
													<div class="info">
														<a href="<?php echo $prd_v['href']; ?>" class="name"><?php echo $prd_v['name']; ?></a>
														<strong class="price">
															<?php if (!$prd_v['special']) { ?>
															<span class="new"><?php echo $prd_v['price']; ?></span>
															<?php } else { ?>
															<span class="old"><?php echo $prd_v['price']; ?></span>
															<span class="new"><?php echo $prd_v['special']; ?></span>
															<?php } ?>
														</strong>
													</div>
													<b></b>
												</div>
												<?php if ($pd == $items) { echo '</div>';  } ?>
												<?php if ($pd_count == $count && $pd != $items) { echo '</div>'; } ?>
											<?php $pd++; $pd_count++;
											} 
										} ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					<?php }
				} ?>
				<?php if ($setting['modStyle'] != "tab" && $position != 'column_left' && $position != 'column_right') { ?>
				<div class="clearfix hr"></div>
				<?php } ?>
			</div>
			<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
				var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
				inOwl_scroll_column(obj);
				$(obj + " .box-product").owlCarousel({
					singleItem: true,
					navigation : false,
					responsive : true
				});
				$(".owl-prev").addClass('prev');
				$(".owl-next").addClass('next');
				$(".owl-controls").addClass('carousel-controls');
			});
			</script>
			<?php } ?>

		<?php } ?>
		
	<?php }

	/* Selected brands normal display 
	******************************/
	else { ?>

		<div class="box custom-section<?php echo $modSettings['class'].$modSettings['css_class'].$modSettings['class1']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>">
				
			<?php if(isset($modSettings['title']) && !empty($modSettings['title'])) { ?>
			<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
			<?php }

			if (isset($modSettings['brands']) && !empty($modSettings['brands'])) {
				if (isset($modSettings['prdStyle']) && $modSettings['prdStyle'] != 'scroll') { ?>
					<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
					<div class="sec-box">
						<div class="sec-main">
							<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
							<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><span><?php echo $selbrand_v['name']; ?></span></a>
						</div>
					</div>
					<?php } ?>
				<?php }else{ ?>
					<div class="owl-carousel box-product">
					<?php foreach ($modSettings['brands'] as $selbrand_k => $selbrand_v) { ?>
					<div class="sec-box">
						<div class="sec-main">
							<a href="<?php echo $selbrand_v['href']; ?>" class="img"><img src="<?php echo $selbrand_v['image']; ?>" alt=""></a>
							<a href="<?php echo $selbrand_v['href']; ?>" class="hd"><span><?php echo $selbrand_v['name']; ?></span></a>
						</div>
					</div>
					<?php } ?>
					</div>
				<?php }
			} ?>
		</div>
		<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
		<script type="text/javascript">
		$(document).ready(function() {
			var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
			$(obj + " .owl-carousel").owlCarousel({
				singleItem: true,
				navigation : false,
				responsive : true
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
		</script>
		<?php } ?>
	
	<?php } ?>

<?php } ?>

<?php } ?>