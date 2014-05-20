<?php 
/* Mobile optimize view
******************************/	
echo $header; ?>

<div id="content" class="category">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body<?php if($column_left || $column_right){?> col-y<?php } ?>">
	
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } ?>
		</div>
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php echo $content_top; ?>
				
		<!--CATEGORY DESCRIPTION -->
		<?php if ($this->config->get('RGen_catinfo_status') == 1 || $this->config->get('RGen_catinfo_status') == '') { ?>
		<?php if ($thumb || $description) { ?>
		<div class="category-info">
			<?php if ($thumb) { ?>
			<div class="image"><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" /></div>
			<?php } ?>
			<?php if ($description) { ?>
			<?php echo $description; ?>
			<?php } ?>
			<span class="clearfix hr"></span>
		</div>
		<?php } } ?>
		
		<!--REFINE CATEGORIES -->

		<?php 

		if ($categories) { 
			
			/* Mobile optimize view
			******************************/	
			if(
				$this->rgen->device == 'm' 
				&& $this->config->get('RGen_optimizemob') == 1 
				&& $this->config->get('RGen_reaponsive_status') == 1){ ?>

			<div class='catelist m-refinecate'>
				<h2 class='header-1'><?php echo $text_refine; ?></h2>
				<?php foreach ($categories as $category) { ?>
				<a class="link-bt" href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
				<?php } ?>
			</div>

			<?php } else {

			/* Normal view
			******************************/
			if ($this->config->get('RGen_refineCate_layout') == 'rgen') { 

			/* REFINE CATEGORY RGEN LAYOUT 
			******************************/
			?><?php if ($this->config->get('RGen_refineCate_View') == 'grid') { ?>
	        <div class="category-list refine-cate refine-grid clearfix">
	        <?php }else { ?>
	        <div class="category-list refine-cate refine-scroll">
	        <?php } ?>
				<h2 class='header-1'><span><?php echo $text_refine; ?></span></h2>
				<div class="refine-cate-wrp<?php echo $this->config->get('RGen_refineCate_View') != 'grid' ? ' owl-carousel' : null; ?>">
					<?php foreach ($categories as $category) { ?>
					<div class="cate-box">
						<a href="<?php echo $category['href']; ?>">
							<?php if ($category['pic']) { ?><img src="<?php echo $category['pic']; ?>" title="<?php echo $category['name']; ?>" alt="<?php echo $category['name']; ?>" /><?php } ?>
							<strong><?php echo $category['name']; ?></strong>
						</a>
					</div>
					<?php } ?>
				</div>
			</div><?php

			/* REFINE CATEGORY OC LAYOUT 
			******************************/
			} elseif ($this->config->get('RGen_refineCate_layout') == 'oc') {
			?><div class='catelist'>
				<h2 class='header-1'><?php echo $text_refine; ?></h2>
				<div class="clearfix">
					<?php if (count($categories) <= 5) { ?>
					<ul>
						<?php foreach ($categories as $category) { ?>
						<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
						<?php } ?>
					</ul>
					<?php } else { ?>
					<?php for ($i = 0; $i < count($categories);) { ?>
					<ul>
						<?php $j = $i + ceil(count($categories) / 4); ?>
						<?php for (; $i < $j; $i++) { ?>
						<?php if (isset($categories[$i])) { ?>
						<li><a href="<?php echo $categories[$i]['href']; ?>"><?php echo $categories[$i]['name']; ?></a></li>
						<?php } ?>
						<?php } ?>
					</ul>
					<?php } ?>
					<?php } ?>
				</div>
			</div>
			<?php }

			/* REFINE CATEGORY BUTTON LINKS
			******************************/
			else {
			?><div class='catelist catbtn'>
				<h2 class='header-1'><?php echo $text_refine; ?></h2>
				<div class="clearfix">
					<?php foreach ($categories as $category) { ?>
					<a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
					<?php } ?>
				</div>
			</div>
			<?php } ?>


		<?php } } ?>
		
		<!--PRODUCT FILTER TOOLS -->
		<?php if ($products) { ?>
		<div class="product-filter">
			<div class="sort"><b><?php echo $text_sort; ?></b>
				<select onchange="location = this.value;">
					<?php foreach ($sorts as $sorts) { ?>
					<?php if ($sorts['value'] == $sort . '-' . $order) { ?>
					<option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
					<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div class="limit"><b><?php echo $text_limit; ?></b>
				<select onchange="location = this.value;">
					<?php foreach ($limits as $limits) { ?>
					<?php if ($limits['value'] == $limit) { ?>
					<option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
					<?php } ?>
					<?php } ?>
				</select>
			</div>
			
			<div class="product-compare"><a href="<?php echo $compare; ?>" id="compare-total" class="button"><?php echo $text_compare; ?></a></div>
			<?php if(
				$this->rgen->device == 'm'
				&& $this->config->get('RGen_optimizemob') == 1 
				&& $this->config->get('RGen_reaponsive_status') == 1){ } else { ?>
				<div class="display">
					<b class="list-bt"><?php echo $text_list; ?></b> 
					<a onclick="display('grid');" class="grid-bt"><?php echo $text_grid; ?></a>
				</div>
			<?php } ?>
			<span class="hr"></span>
		</div>
		
		
		<!--PRODUCT LIST AREA -->
		<div class="product-list">
		
			<?php 
			/* Mobile optimize view
			******************************/
			if(
				$this->rgen->device == 'm' 
				&& $this->config->get('RGen_optimizemob') == 1 
				&& $this->config->get('RGen_reaponsive_status') == 1
				){
					foreach ($products as $product) {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mprd1.php');
					}

			/* Normal view
			******************************/	
				}else{
					if ($this->config->get('RGen_prdBlock_view') == 'prd1' || $this->config->get('RGen_prdBlock_view') == '') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock1.php');
					} elseif ($this->config->get('RGen_prdBlock_view') == 'prd2') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock2.php');
					} elseif ($this->config->get('RGen_prdBlock_view') == 'prd3') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock3.php');
					} elseif ($this->config->get('RGen_prdBlock_view') == 'prd4') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock4.php');
					}

				}
			?>
			<div class="clearfix"></div>
		</div>
		
		<div class="pagination"><?php echo $pagination; ?></div>
		<?php } ?>
		
		
		<?php if (!$categories && !$products) { ?>
		<div class="content"><?php echo $text_empty; ?><br /><br /></div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } ?>
		
	</div>
	
	<div class="clearfix"></div>
	<?php echo $content_bottom; ?>
	
</div>
<script type="text/javascript"><!--
<?php if ($this->config->get('RGen_refineCate_View') != 'grid') { ?>
$(document).ready(function(){
	var obj = '.refine-scroll';
	$(obj+ " .owl-carousel").owlCarousel({
		itemsCustom : [ [0, 2], [390, 3], [530, 4], [700, 6], [940, 8], [1180, 9] ],
		navigation : true,
		navigationText : ["",""],
		responsiveBaseWidth: obj
	});
	$(obj+" .owl-prev").addClass('prev');
	$(obj+" .owl-next").addClass('next');
	$(obj+" .owl-controls").addClass('carousel-controls');
});
<?php } ?>


//--></script> 
<?php echo $footer; ?>