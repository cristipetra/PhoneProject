<?php
$modprd = $modSettings['prdboxStyle'];

/* Mobile optimize view
******************************/	
if(
	$this->rgen->device == "m"
	&& $this->config->get('RGen_optimizemob') == 1 
	&& $this->config->get('RGen_reaponsive_status') == 1
	){
?>
	<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane<?php 
		echo $modSettings['class'];
		echo $modSettings['css_class'];
		if ($modprd == 'prd1' || $modprd == '') { echo ' modprd1'; }
		if ($modprd == 'prd4') { echo ' modprd4'; }
		?>">
		<?php foreach ($modSettings['products'] as $product) {
			include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_mprd1.tpl');
		} ?>
	</div>

<?php }else { 

	/* Tab view
	******************************/	
	?><div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane<?php 
		echo $modSettings['class'];
		echo $modSettings['css_class'];
		if ($modprd == 'prd1' || $modprd == '') { echo ' modprd1'; }
		if ($modprd == 'prd4') { echo ' modprd4'; }
		?>">
		<div class="box-product<?php $modSettings['prdStyle'] == 'scroll' ? ' owl-carousel' : null; ?>">
			<?php foreach ($modSettings['products'] as $product) { ?>
				<div class="item">
					<?php
						if ($modprd == 'prd1' || $modprd == '') {
							include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock1.php');
						} elseif ($modprd == 'prd2') {
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
	</div>
	<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
	<script type="text/javascript">
	var owl<?php echo $modSettings['key'].$modSettings['moduleCount']; ?> = $("#tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?> .box-product");
	$(document).ready(function(){
		owl<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>.owlCarousel({
			itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
			navigation : true,
			navigationText : ["",""],
			responsiveBaseWidth: "#tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>"
		});
		$(".owl-prev").addClass('prev');
		$(".owl-next").addClass('next');
		$(".owl-controls").addClass('carousel-controls');
	});
	$(window).on("click",".custom-tabs > a",function(){
		owl<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>.owlCarousel();
	});
	</script>
	<?php } ?>

<?php } ?>