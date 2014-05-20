<?php 
$l_id 		= $this->config->get('config_language_id');
$mod_id 	= $setting['mod_id'];

if(	isset($setting['cat_status']) && $setting['cat_status'] == "selc" ||
	isset($setting['prd_status']) && $setting['prd_status'] == "selp" ||
	isset($setting['brand_status']) && $setting['brand_status'] == "selb" ||
	isset($setting['info_status']) && $setting['info_status'] == "seli" )
	{ 
	if(	isset($setting['category']) && in_array($category_id, $setting['category']) ||
		isset($setting['products']) && in_array($product_id, $setting['products']) ||
		isset($setting['brands']) && in_array($brand_id, $setting['brands']) ||
		isset($setting['info']) && in_array($information_id, $setting['info']))
		{ ?>

		<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
		<div class="<?php 
			echo isset($setting['fullB']) && $setting['fullB'] == 'y' ? 'fullblock' : null; 
			echo isset($fullB_class) ? $fullB_class : null;
			?>"<?php 
			echo isset($fullB_settings) ? ' style="'.$fullB_settings.'"' : null; 
			?> id="fullB<?php echo $module ?>">>
			<div class="fullB-inner">
		<?php } ?>
		
		<?php
		/* Module start */ 
		if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
		<div class="box custom-section<?php echo isset($setting['tabStyle']) && $setting['tabStyle'] != '' ? ' tbs'.$setting['tabStyle'] : null; ?>" id="custom-section-tb<?php echo $module ?>">
			<div class="custom-tabs<?php echo isset($setting['tabAlign']) && $setting['tabAlign'] == 'c' ? ' tbs-c' : null; ?>">
				<?php 
				foreach ($section_data as $key => $value) { 
				if (isset($value['status']) && $value['status'] == 1) {?>
					<a href="#tb-<?php echo $key.$module ?>"><?php echo isset($value['title'][$l_id]) ? $value['title'][$l_id] : null; ?></a>
				<?php } } ?>
			</div>
		<?php } ?>

			<?php 
			$i = 0;
			foreach ($section_data as $key => $value) {
			if (isset($value['status']) && $value['status'] == 1) {

				/* Special products
				******************************/
				if ($value['prdTypes'] == 'special') { 
					$modSettings = array(
						'products'		=> $special_prd,
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-special mod-scroll' : ' section-special mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Latest products
				******************************/
				if ($value['prdTypes'] == 'latest') { 
					$modSettings = array(
						'products'		=> $latest_prd,
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-latest mod-scroll' : ' section-latest mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Best seller products
				******************************/
				if ($value['prdTypes'] == 'best') {
					$modSettings = array(
						'products'		=> $best_prd,
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-best mod-scroll' : ' section-best mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Category products
				******************************/
				if ($value['prdTypes'] == 'catPrd') { 
					$modSettings = array(
						'catUrl'		=> $value['category_url'],
						'products'		=> $value['catPrd_data'], //$cat_prd
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-cat mod-scroll' : ' section-cat mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Brand products
				******************************/
				if ($value['prdTypes'] == 'brandPrd') { 
					$modSettings = array(
						'products'		=> $value['brandPrd_data'], //$brand_prd
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-brand mod-scroll' : ' section-brand mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Custom products
				******************************/
				if ($value['prdTypes'] == 'custPrd') { 
					$modSettings = array(
						'products'		=> $value['custPrd_data'], //$custom_prd
						'prdboxStyle'	=> $value['prdboxStyle'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-custom mod-scroll' : ' section-custom mod-grid',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
						'count'			=> $i
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
					}else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
					}
				}
				/*******************************/



				/* Single category display section
				******************************/
				if ($value['prdTypes'] == 'catSection') { 
					$modSettings = array(
						'categories'	=> $value['category_sec_data'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-catlist cat-scroll' : ' section-catlist cat-grid secgrid-wrp',
						'key'			=> $key,
						'moduleCount'	=> $module,
						'count'			=> $i,
						'limit'			=> $value['category_sec_limit']
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
						<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
						<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
						</div>
					<?php }else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
					}
				}
				/*******************************/



				/* Selected category display section
				******************************/
				if ($value['prdTypes'] == 'selcatSection') { 
					$modSettings = array(
						'categories'	=> $value['selcat_section_data'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-selcat sel-cat-scroll' : ' section-selcat sel-cat-grid secgrid-wrp',
						'class1'		=> $value['selcat_prd_status'] == 'y' ? ' prd-y' : null,
						'key'			=> $key,
						'moduleCount'	=> $module,
						'count'			=> $i,
						'sectionStyle'	=> isset($value['selcat_prd_style']) ? $value['selcat_prd_style'] : 1,
						'limit'			=> $value['selcat_prd_limit'],
						'prdstatus'		=> $value['selcat_prd_status'],
						'prd'			=> $value['selected_cat_prd']
						
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
						<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
						<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
						</div>
					<?php }else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
					}
				}
				/*******************************/


				/* Selected brands display section
				******************************/
				if ($value['prdTypes'] == 'brandSection') { 
					$modSettings = array(
						'brands'		=> $value['selbrand_section_data'],
						'prdStyle'		=> $value['prdStyle'],
						'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
						'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
						'class'			=> $value['prdStyle'] == 'scroll' ? ' section-selbrand brand-scroll' : ' section-selbrand brand-grid secgrid-wrp',
						'class1'		=> $value['selbrand_prd_status'] == 'y' ? ' prd-y' : null,
						'key'			=> $key,
						'moduleCount'	=> $module,
						'count'			=> $i,
						'sectionStyle'	=> isset($value['selbrand_prd_style']) ? $value['selbrand_prd_style'] : 1,
						'limit'			=> $value['selbrand_prd_limit'],
						'prdstatus'		=> $value['selbrand_prd_status'],
						'prd'			=> $value['selected_brand_prd']
						
					);
					if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
						<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
						<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
						</div>
					<?php }else{
						include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
					}
				}
				/*******************************/

			}

			$i++; } ?>

		<?php if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#custom-section-tb<?php echo $module ?> .custom-tabs > a').tabs();

				$("#custom-section-tb<?php echo $module ?> .custom-tabs > a").click(function(){

					var tbId = $(this).attr('href');
					$("#custom-section-tb<?php echo $module ?> .custom-tab-pane").removeClass("active");
					$(tbId).addClass("active");

					var obj = tbId+ ".active";
					if(	$(obj + " .brand-prdsec-style2").length > 0 && $(obj + " .brand-prdsec-style2").hasClass('brand-scroll') ||
						$(obj + " .selcat-prdsec-style2").length > 0 && $(obj + " .selcat-prdsec-style2").hasClass('sel-cat-scroll')) {
						inOwl_scroll(obj);
					}
					if(	$(obj + " .brand-prdsec-style2").length > 0 && $(obj + " .brand-prdsec-style2").hasClass('brand-grid') ||
						$(obj + " .selcat-prdsec-style2").length > 0 && $(obj + " .selcat-prdsec-style2").hasClass('sel-cat-grid')) {
						inOwl_grid(obj);
					};

					//eqH(tbId);

				}).first().click();
			});
			</script>
			<div class="clearfix hr"></div>
		</div>
		<?php } 
		/* Module end 
		************************************************/ ?>
		<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
			<?php if (isset($setting['fullB']) && $setting['fullB'] == 'y') { ?>
			<script>
			jQuery(document).ready(function($) {
				$("#fullB<?php echo $module ?>").fullblock({ child: ".fullB-inner" });
			});
			</script>
			<?php } ?>
			</div>
		</div>
		<?php } ?>

<?php } ?>
<?php }else{ ?>
	
	<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
	<div class="<?php 
		echo isset($setting['fullB']) && $setting['fullB'] == 'y' ? 'fullblock' : null; 
		echo isset($fullB_class) ? $fullB_class : null;
		?>"<?php 
		echo isset($fullB_settings) ? ' style="'.$fullB_settings.'"' : null; 
	?> id="fullB<?php echo $module ?>">
		<div class="fullB-inner">
	<?php } ?>

	<?php
	/* Module start */ 
	if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
	<div class="box custom-section<?php echo isset($setting['tabStyle']) && $setting['tabStyle'] != '' ? ' tbs'.$setting['tabStyle'] : null; ?>" id="custom-section-tb<?php echo $module ?>">
		<div class="custom-tabs<?php echo isset($setting['tabAlign']) && $setting['tabAlign'] == 'c' ? ' tbs-c' : null; ?>">
			<?php 
			foreach ($section_data as $key => $value) { 
			if (isset($value['status']) && $value['status'] == 1) {?>
				<a href="#tb-<?php echo $key.$module ?>"><?php echo isset($value['title'][$l_id]) ? $value['title'][$l_id] : null; ?></a>
			<?php } } ?>
		</div>
	<?php } ?>

		<?php 
		$i = 0;
		foreach ($section_data as $key => $value) {
		if (isset($value['status']) && $value['status'] == 1) {

			/* Special products
			******************************/
			if ($value['prdTypes'] == 'special') { 
				$modSettings = array(
					'products'		=> $special_prd,
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-special mod-scroll' : ' section-special mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}
			}
			/*******************************/



			/* Latest products
			******************************/
			if ($value['prdTypes'] == 'latest') { 
				$modSettings = array(
					'products'		=> $latest_prd,
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-latest mod-scroll' : ' section-latest mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}
			}
			/*******************************/



			/* Best seller products
			******************************/
			if ($value['prdTypes'] == 'best') {
				$modSettings = array(
					'products'		=> $best_prd,
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-best mod-scroll' : ' section-best mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}
			}
			/*******************************/



			/* Category products
			******************************/
			if ($value['prdTypes'] == 'catPrd') { 
				$modSettings = array(
					'catUrl'		=> $value['category_url'],
					'products'		=> $value['catPrd_data'], //$cat_prd
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-cat mod-scroll' : ' section-cat mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}

			}
			/*******************************/



			/* Brand products
			******************************/
			if ($value['prdTypes'] == 'brandPrd') { 
				$modSettings = array(
					'products'		=> $value['brandPrd_data'], //$brand_prd
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-brand mod-scroll' : ' section-brand mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}
			}
			/*******************************/



			/* Custom products
			******************************/
			if ($value['prdTypes'] == 'custPrd' && isset($value['custPrd_data']) && $value['custPrd_data'] != '') { 
				$modSettings = array(
					'products'		=> $value['custPrd_data'], //$custom_prd
					'prdboxStyle'	=> $value['prdboxStyle'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-custom mod-scroll' : ' section-custom mod-grid',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'arrowPos'		=> $this->config->get('RGen_carouselArrow'),
					'count'			=> $i
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') {
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_tab.php');
				}else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_normal.php');
				}
			}
			/*******************************/



			/* Single category display section
			******************************/
			if ($value['prdTypes'] == 'catSection') { 
				$modSettings = array(
					'categories'	=> $value['category_sec_data'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-catlist cat-scroll' : ' section-catlist cat-grid secgrid-wrp',
					'key'			=> $key,
					'moduleCount'	=> $module,
					'count'			=> $i,
					'limit'			=> $value['category_sec_limit']
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
					<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
					<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
					</div>
				<?php }else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
				}
			}
			/*******************************/



			/* Selected category display section
			******************************/
			if ($value['prdTypes'] == 'selcatSection') { 
				$modSettings = array(
					'categories'	=> $value['selcat_section_data'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-selcat sel-cat-scroll' : ' section-selcat sel-cat-grid secgrid-wrp',
					'class1'		=> $value['selcat_prd_status'] == 'y' ? ' prd-y' : null,
					'key'			=> $key,
					'moduleCount'	=> $module,
					'count'			=> $i,
					'sectionStyle'	=> isset($value['selcat_prd_style']) ? $value['selcat_prd_style'] : 1,
					'limit'			=> $value['selcat_prd_limit'],
					'prdstatus'		=> $value['selcat_prd_status'],
					'prd'			=> $value['selected_cat_prd']
					
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
					<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
					<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
					</div>
				<?php }else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
				}
			}
			/*******************************/


			/* Selected brands display section
			******************************/
			if ($value['prdTypes'] == 'brandSection') { 
				$modSettings = array(
					'brands'		=> $value['selbrand_section_data'],
					'prdStyle'		=> $value['prdStyle'],
					'css_class'		=> isset($value['css_class']) && $value['css_class'] != '' ? ' '.$value['css_class'] : null,
					'title'			=> isset($value['title'][$l_id]) ? $value['title'][$l_id] : null,
					'class'			=> $value['prdStyle'] == 'scroll' ? ' section-selbrand brand-scroll' : ' section-selbrand brand-grid secgrid-wrp',
					'class1'		=> $value['selbrand_prd_status'] == 'y' ? ' prd-y' : null,
					'key'			=> $key,
					'moduleCount'	=> $module,
					'count'			=> $i,
					'sectionStyle'	=> isset($value['selbrand_prd_style']) ? $value['selbrand_prd_style'] : 1,
					'limit'			=> $value['selbrand_prd_limit'],
					'prdstatus'		=> $value['selbrand_prd_status'],
					'prd'			=> $value['selected_brand_prd']
					
				);
				if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
					<div id="tb-<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" class="custom-tab-pane">
					<?php include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); ?>
					</div>
				<?php }else{
					include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_customproducts_other.php'); 
				}
			}
			/*******************************/

		}

		$i++; } ?>

	<?php if ($setting['modStyle'] == "tab" && $position != 'column_left' && $position != 'column_right') { ?>
		<script type="text/javascript">
		
		$(document).ready(function(){
			$('#custom-section-tb<?php echo $module ?> .custom-tabs > a').tabs();

			$("#custom-section-tb<?php echo $module ?> .custom-tabs > a").click(function(){

				var tbId = $(this).attr('href');
				$("#custom-section-tb<?php echo $module ?> .custom-tab-pane").removeClass("active");
				$(tbId).addClass("active");

				var obj = tbId+ ".active";
				if(	$(obj + " .brand-prdsec-style2").length > 0 && $(obj + " .brand-prdsec-style2").hasClass('brand-scroll') ||
					$(obj + " .selcat-prdsec-style2").length > 0 && $(obj + " .selcat-prdsec-style2").hasClass('sel-cat-scroll')) {
					inOwl_scroll(obj);
				}
				if(	$(obj + " .brand-prdsec-style2").length > 0 && $(obj + " .brand-prdsec-style2").hasClass('brand-grid') ||
					$(obj + " .selcat-prdsec-style2").length > 0 && $(obj + " .selcat-prdsec-style2").hasClass('sel-cat-grid')) {
					inOwl_grid(obj);
				};

				//eqH(tbId);

			}).first().click();
		});
		</script>
		<div class="clearfix hr"></div>
	</div>
	<?php } 
	/* Module end 
	************************************************/ ?>
	<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
		<?php if (isset($setting['fullB']) && $setting['fullB'] == 'y') { ?>
		<script>
		jQuery(document).ready(function($) {
			$("#fullB<?php echo $module ?>").fullblock({ child: ".fullB-inner" });
		});
		</script>
		<?php } ?>
		</div>
	</div>
	<?php } ?>

<?php } ?>
