<?php 
/* Mobile optimize view
******************************/	
if(
	$this->rgen->device == 'm'
	&& $this->config->get('RGen_optimizemob') == 1 
	&& $this->config->get('RGen_reaponsive_status') == 1
	){
?>
<?php if($products) {?>
<div class="box latest-prd m-mod" id="latest-prd<?php echo $module; ?>">
	<div class="box-heading header-1"><?php echo $heading_title; ?></div>
	<div class="box-product">
		<?php foreach ($products as $product) {
		include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_mprd1.tpl');
		} ?>
	</div>
	<div class="clearfix hr"></div>
</div>
<?php } ?>
<?php }else { ?>

<?php if(isset($position)){ 

	/* Product display in column 
	******************************/	
	if($position == 'column_left' || $position == 'column_right'){ ?>
		<div class="box latest-prd<?php 
			if($this->config->get('RGen_colprdView_latest') == "list1"){ ?> col-prd-thm1<?php }
			?>" id="latest-prd<?php echo $module; ?>">
			<div class="box-heading"><?php echo $heading_title; ?></div>

			<?php
			/* Column product display in list
			******************************/
			if($this->config->get('RGen_colprdView_latest') != 'scroll'){ ?>
			<ul class="box-product">
				<?php foreach ($products as $product) { ?>
				<li class="col-prd">
					<div class="image">
						<?php if ($product['special']) { ?>
						<span class="offer-tag"></span>
						<?php } ?>
						<a href="<?php echo $product['href']; ?>">
							<?php if ($product['thumb']) { ?>
							<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
							<?php } ?>
						</a>
					</div>
					<div class="info-wrp">
						<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
						<?php if ($product['price']) { ?>
						<div class="price col-price">
							<?php if (!$product['special']) { ?>
							<?php echo $product['price']; ?>
							<?php } else { ?>
							<span class="price-old"><?php echo $product['price']; ?></span>
							<span class="price-new"><?php echo $product['special']; ?></span>
							<?php } ?>
						</div>
						<?php } ?>
						<a href="<?php echo $product['href']; ?>" class="more"><?php echo $this->language->get('button_moreinfo'); ?> <span>&#8250;</span></a>
					</div>
				</li>
				<?php } ?>
			</ul><?php }

			/* Column product display in scroll
			******************************/	
			else { 
			?>
			<div class='col-prd-carousel'>
				<div class="box-product owl-carousel">
					<?php foreach ($products as $product) { ?>
					<div class="item">
						<div class="col-scroll-prd">
							<div class="image">
								<?php if ($product['special']) { ?>
								<span class="offer-tag"></span>
								<?php } ?>
								<a href="<?php echo $product['href']; ?>">
									<?php if ($product['thumb']) { ?>
									<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
									<?php } ?>
								</a>
							</div>
							<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
							<?php if ($product['price']) { ?>
							<div class="price col-price">
								<?php if (!$product['special']) { ?>
								<?php echo $product['price']; ?>
								<?php } else { ?>
								<span class="price-old"><?php echo $product['price']; ?></span>
								<span class="price-new"><?php echo $product['special']; ?></span>
								<?php } ?>
							</div>
							<?php } ?>
							<a href="<?php echo $product['href']; ?>" class="sml-button dark-bt"><?php echo $this->language->get('button_moreinfo'); ?></a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					var obj = '#latest-prd<?php echo $module; ?>';
					$(obj+ " .owl-carousel").owlCarousel({
						items:1,
						navigation : true,
						navigationText : ["",""],
						responsive:false
					});
					$(obj+" .owl-prev").addClass('prev');
					$(obj+" .owl-next").addClass('next');
					$(obj+" .owl-controls").addClass('carousel-controls');
				});
			</script>
			<?php } ?>
			
		</div><?php

	}else{
		/* Product display on slide show 
		******************************/
		$getRoute = $this->document->getRoute;

		if (
			$this->config->get('RGen_SlideShow_Mod_status') == 1 && 
			$this->config->get('RGen_SlideShow_Mod') == 'latest' && 
			$getRoute == 'common/home') { ?>
			<div class="box latest-prd slidshow-prd list-carousel" id="slidshow-box">
				<div class="box-heading header-1"><?php echo $heading_title; ?></div>
				<div class="box-product owl-carousel">
					<?php foreach ($products as $product) { ?>
					<div class="item">
						<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock1.php'); ?>
					</div>
					<?php } ?>
				</div>
				<div class="clearfix hr"></div>
			</div>

			<script type="text/javascript"><!--
			$(document).ready(function(){
				var obj = '#slidshow-box';
				$(obj+ " .owl-carousel").owlCarousel({
					items:2,
					navigation : true,
					navigationText : ["",""],
					responsive:false
				});
				$(obj+" .owl-prev").addClass('prev');
				$(obj+" .owl-next").addClass('next');
				$(obj+" .owl-controls").addClass('carousel-controls');

				if ($('.revo-slideshow-wrapper').hasClass('prdonrevo')){
					$('#slidshow-box').prependTo('.home-wrapper .revo-prdonslide');
				}else{
					if($('#content').hasClass('w-full-slideshow')){
						$('#slidshow-box').prependTo('#content .slideshow-wrapper:first');
					} else {
						$('#slidshow-box').prependTo('#content .slideshow:first');
					}	
				};
				
			});
			//--></script>

		<?php }else { 

			/* Product display in content area
			******************************/
			$modprd = $this->config->get('RGen_modPrdBlock_latest');

			?>
			<div class="box latest-prd<?php 
			
				if ($this->config->get('RGen_carouselArrow') == 'tr' || $modprd == 'prd2' || $modprd == 'prd4') { ?> arrow-tr<?php }
				if ($modprd == 'prd4') { ?> modprd4<?php }
				if ($modprd == 'prd2') { ?> modprd2<?php }
				if ($modprd == 'prd1' || $modprd == '') { ?> modprd1<?php }
				if ($this->document->RGen_modprdView[3] == 'latest-grid'){ ?> mod-grid<?php } 

				?>" id="latest-prd<?php echo $module; ?>">

				<div class="box-heading header-1"><?php echo $heading_title; ?></div>
				<div class="box-product<?php echo $this->document->RGen_modprdView[3] == 'latest-scroll' ? ' owl-carousel' : null; ?>">
					<?php foreach ($products as $product) { ?>
					<div class="item">
						<?php 
						if ($modprd == 'prd1' || $modprd == '') {
							include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock1.php');
						} elseif ($this->config->get('RGen_modPrdBlock_latest') == 'prd2') {
							include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock2.php');
						} elseif ($modprd == 'prd3') {
							include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock3.php');
						} elseif ($modprd == 'prd4') {
							include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock4.php');
						}
						?>
					</div>
					<?php } ?>
				</div>
				<div class="clearfix hr"></div>
			</div>
			<?php 
			if($this->document->RGen_modprdView[3] == 'latest-scroll'){ 
			?>
			<script type="text/javascript"><!--
			$(document).ready(function(){
				var obj = '#latest-prd<?php echo $module; ?>';
				$(obj+ " .owl-carousel").owlCarousel({
					itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
					navigation : true,
					navigationText : ["",""],
					responsiveBaseWidth: obj
				});
				$(obj+" .owl-prev").addClass('prev');
				$(obj+" .owl-next").addClass('next');
				$(obj+" .owl-controls").addClass('carousel-controls');
			});
			//--></script>
			<?php } /* <= $this->document->RGen_modprdView[1] condition end */ ?>
		<?php } /* <= on slide show product else condition end */ ?>
	<?php } /* <= column or content area condition end */ ?>
<?php } /* <= position variable check condition end */ ?>

<?php } ?>