<?php 
if (isset($setting['mod_id']) && isset($RGen_custom)) {
	$l_id 	= $this->config->get('config_language_id');
	$mod_id = $setting['mod_id'];

	if ($RGen_custom[$mod_id]['position'] == 's_right' || $RGen_custom[$mod_id]['position'] == 's_left') {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/RGen_customhtml_sticky.tpl");
	} 

	elseif ($RGen_custom[$mod_id]['position'] == 'ft_social') {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/RGen_customhtml_footer.tpl");
	}

	elseif ($RGen_custom[$mod_id]['position'] == 'ft_below') {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/RGen_customhtml_footerbottom.tpl");
	}

	elseif ($RGen_custom[$mod_id]['position'] == 'tp_above') {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/RGen_customhtml_header.tpl");
	}

	elseif (
		$RGen_custom[$mod_id]['position'] == 'pd_above_img' ||
		$RGen_custom[$mod_id]['position'] == 'pd_below_img' ||
		$RGen_custom[$mod_id]['position'] == 'pd_above_options' ||
		$RGen_custom[$mod_id]['position'] == 'pd_below_options' ||
		$RGen_custom[$mod_id]['position'] == 'pd_above_tb' ||
		$RGen_custom[$mod_id]['position'] == 'pd_above_rel' ||
		$RGen_custom[$mod_id]['position'] == 'pd_tb'
		){
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/RGen_customhtml_".$RGen_custom[$mod_id]['position'].".tpl");
	}
	
	// Specific Category 
	elseif (isset($RGen_custom[$mod_id]['cat_status']) && $RGen_custom[$mod_id]['cat_status'] == "selc") { 
		if(isset($RGen_custom[$mod_id]['category']) && in_array($category_id, $RGen_custom[$mod_id]['category'])) {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/rgen_custom.php");
		}
	}

	// Specific Product 
	elseif (isset($RGen_custom[$mod_id]['prd_status']) && $RGen_custom[$mod_id]['prd_status'] == "selp") {
		if(isset($RGen_custom[$mod_id]['prd']) && in_array($product_id, $RGen_custom[$mod_id]['prd'])) {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/rgen_custom.php");
		}
	}

	// Specific Brands
	elseif (isset($RGen_custom[$mod_id]['brand_status']) && $RGen_custom[$mod_id]['brand_status'] == "selb") {
		if(isset($RGen_custom[$mod_id]['brand']) && in_array($brand_id, $RGen_custom[$mod_id]['brand'])) {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/rgen_custom.php");
		}
	}

	// Specific Information
	elseif (isset($RGen_custom[$mod_id]['info_status']) && $RGen_custom[$mod_id]['info_status'] == "seli") {
		if(isset($RGen_custom[$mod_id]['info']) && in_array($information_id, $RGen_custom[$mod_id]['info'])) {
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/rgen_custom.php");
		}
	}

	else{
		include VQMod::modCheck("catalog/view/theme/rgen-opencart/template/common/rgen_custom.php");	
	}
	
} ?>
