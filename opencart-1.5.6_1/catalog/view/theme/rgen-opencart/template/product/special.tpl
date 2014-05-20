<?php 
/* Mobile optimize view
******************************/	
echo $header; ?>

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
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<?php }?>
		
	</div>
	
	<div class="clearfix"></div>
	<?php echo $content_bottom; ?>

</div>
<?php echo $footer; ?>