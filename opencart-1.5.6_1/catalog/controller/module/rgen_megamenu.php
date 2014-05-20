<?php
class ControllerModuleRGenMegaMenu extends Controller {
	protected function index($setting) {
		static $module = 0;
		$this->data['module'] = $module++;

		/***************/
		$rgen_optimize = $this->config->get('RGen_optimize');
		$cache = $rgen_optimize['cache_mgmenu'];
		$theme = $this->config->get('config_template');
		$dir = 'rgen_megamenu';

		$device = $this->rgen->device;
		$loggedIn = $this->customer->isLogged();
		$priceStatus = ($this->config->get('config_customer_price') && $loggedIn) || !$this->config->get('config_customer_price') ? 'py' : 'pn';
		$taxStatus = $this->config->get('config_tax') ? 'ty' : 'tn';
		/***************/

		if($theme == "rgen-opencart"){
			if ($cache) {
				$modFile = md5('rgen_megamenu'.$this->currency->getCode())."_".$this->config->get('config_language_id').$device.$priceStatus.$taxStatus.$this->config->get('config_store_id');
				$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);
				if(!file_exists($cache_file)) {
					$this->buildMegamenu();
					if (file_exists(DIR_TEMPLATE . $theme . '/template/common/rgen_megamenu.tpl')) {
						$this->template = $theme . '/template/common/rgen_megamenu.tpl';
					}
					$this->render();
					$this->rgen->cacheFile($this->render(), $cache_file);
				}else{
					$tpl = str_replace(DIR_TEMPLATE, '', $cache_file);
					$this->template = $tpl;
					$this->render();
				}
			}else{
				$this->buildMegamenu();
				if (file_exists(DIR_TEMPLATE . $theme . '/template/common/rgen_megamenu.tpl')) {
					$this->template = $theme . '/template/common/rgen_megamenu.tpl';
					$this->render();
				}
			}
		}
		
	}

	protected function buildMegamenu() {

		$this->load->model('rgen/rgenmegamenu');
		$this->load->model('catalog/manufacturer');
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$this->data['rgen_megamenus'] = $this->model_rgen_rgenmegamenu->getRGen('rgen_megamenu');
		$allMenuDescriptions = $this->model_rgen_rgenmegamenu->allDescriptionGet('rgen_megamenu');
		$this->document->rgen_megamenus = $this->data['rgen_megamenus'];
		//echo "<pre style=''>" . print_r($this->document->rgen_megamenus, TRUE) . "</pre>";

		// Custom html variables
		$t = 'htmlData_top';
		$r = 'htmlData_right';
		$b = 'htmlData_bottom';
		$l = 'htmlData_left';
		
		//echo "<pre> ".$this->data['module']." ==> ".print_r($this->model_rgen_rgenmegamenu->allDescriptionGet('rgen_megamenu'),true)."</pre>";

		foreach ($this->data['rgen_megamenus'] as $key => $value) {
			// Mearging Custom HTML data 
			if (isset($allMenuDescriptions[$key]['htmlData'])) {
				$this->document->rgen_megamenus[$key]['custom_html']['htmlData'] = $allMenuDescriptions[$key]['htmlData'];
			}
			// Mearging Products custom HTML data 
			if (isset($allMenuDescriptions[$key]['products']['t'])) {
				$this->document->rgen_megamenus[$key]['products'][$t] = $allMenuDescriptions[$key]['products']['t'];
			}
			if (isset($allMenuDescriptions[$key]['products']['r'])) {
				$this->document->rgen_megamenus[$key]['products'][$r] = $allMenuDescriptions[$key]['products']['r'];
			}
			if (isset($allMenuDescriptions[$key]['products']['b'])) {
				$this->document->rgen_megamenus[$key]['products'][$b] = $allMenuDescriptions[$key]['products']['b'];
			}
			if (isset($allMenuDescriptions[$key]['products']['l'])) {
				$this->document->rgen_megamenus[$key]['products'][$l] = $allMenuDescriptions[$key]['products']['l'];
			}
			// Mearging Brands custom HTML data 
			if (isset($allMenuDescriptions[$key]['brands']['t'])) {
				$this->document->rgen_megamenus[$key]['brands'][$t] = $allMenuDescriptions[$key]['brands']['t'];
			}
			if (isset($allMenuDescriptions[$key]['brands']['r'])) {
				$this->document->rgen_megamenus[$key]['brands'][$r] = $allMenuDescriptions[$key]['brands']['r'];
			}
			if (isset($allMenuDescriptions[$key]['brands']['b'])) {
				$this->document->rgen_megamenus[$key]['brands'][$b] = $allMenuDescriptions[$key]['brands']['b'];
			}
			if (isset($allMenuDescriptions[$key]['brands']['l'])) {
				$this->document->rgen_megamenus[$key]['brands'][$l] = $allMenuDescriptions[$key]['brands']['l'];
			}
			// Mearging Categry mega custom HTML data 
			if (isset($allMenuDescriptions[$key]['cat_mega']['t'])) {
				$this->document->rgen_megamenus[$key]['cat_mega'][$t] = $allMenuDescriptions[$key]['cat_mega']['t'];
			}
			if (isset($allMenuDescriptions[$key]['cat_mega']['r'])) {
				$this->document->rgen_megamenus[$key]['cat_mega'][$r] = $allMenuDescriptions[$key]['cat_mega']['r'];
			}
			if (isset($allMenuDescriptions[$key]['cat_mega']['b'])) {
				$this->document->rgen_megamenus[$key]['cat_mega'][$b] = $allMenuDescriptions[$key]['cat_mega']['b'];
			}
			if (isset($allMenuDescriptions[$key]['cat_mega']['l'])) {
				$this->document->rgen_megamenus[$key]['cat_mega'][$l] = $allMenuDescriptions[$key]['cat_mega']['l'];
			}
			// Mearging Categry normal custom HTML data 
			if (isset($allMenuDescriptions[$key]['cat_normal']['t'])) {
				$this->document->rgen_megamenus[$key]['cat_normal'][$t] = $allMenuDescriptions[$key]['cat_normal']['t'];
			}
			if (isset($allMenuDescriptions[$key]['cat_normal']['r'])) {
				$this->document->rgen_megamenus[$key]['cat_normal'][$r] = $allMenuDescriptions[$key]['cat_normal']['r'];
			}
			if (isset($allMenuDescriptions[$key]['cat_normal']['b'])) {
				$this->document->rgen_megamenus[$key]['cat_normal'][$b] = $allMenuDescriptions[$key]['cat_normal']['b'];
			}
			if (isset($allMenuDescriptions[$key]['cat_normal']['l'])) {
				$this->document->rgen_megamenus[$key]['cat_normal'][$l] = $allMenuDescriptions[$key]['cat_normal']['l'];
			}
			// Mearging dropdown custom HTML data 
			if (isset($allMenuDescriptions[$key]['dropdown']['t'])) {
				$this->document->rgen_megamenus[$key]['dropdown'][$t] = $allMenuDescriptions[$key]['dropdown']['t'];
			}
			if (isset($allMenuDescriptions[$key]['dropdown']['r'])) {
				$this->document->rgen_megamenus[$key]['dropdown'][$r] = $allMenuDescriptions[$key]['dropdown']['r'];
			}
			if (isset($allMenuDescriptions[$key]['dropdown']['b'])) {
				$this->document->rgen_megamenus[$key]['dropdown'][$b] = $allMenuDescriptions[$key]['dropdown']['b'];
			}
			if (isset($allMenuDescriptions[$key]['dropdown']['l'])) {
				$this->document->rgen_megamenus[$key]['dropdown'][$l] = $allMenuDescriptions[$key]['dropdown']['l'];
			}

			/* CATEGORY NORMAL CASE
			******************************/
			if ($value['menu_type'] == 'cat_normal') {
				if (isset($value['cat_normal']['cat_id'])) {
					$this->document->cat_normal[$key] = $this->getCat($value['cat_normal']['cat_id']);
					$this->document->rgen_megamenus[$key]['cat_normal']['cat_data'] = $this->document->cat_normal[$key];
				}
			}
			

			/* CATEGORY MEGA MENU CASE
			******************************/
			if ($value['menu_type'] == 'cat_mega') {
				if (isset($value['cat_mega']['cat_id'])) {
					$this->document->cat_mega[$key] = $this->getCat($value['cat_mega']['cat_id']);
				}
			}

			//$this->document->cat_mega[$key][] 
			
			/* BRANDS MEGA MENU
			******************************/
			if ($value['menu_type'] == 'brands') {
				if (isset($value['brands']['brand_id'])) {
					foreach ($value['brands']['brand_id'] as $b_id) {
						$brand_info = $this->model_catalog_manufacturer->getManufacturer($b_id);
						if (isset($brand_info['manufacturer_id'])) {
							$brand_info['href'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $brand_info['manufacturer_id']);
							$brand_info['image'] = $this->model_tool_image->resize(isset($brand_info['image']) ? $brand_info['image'] : "no_image.jpg", 80, 80);
							//$brand_info['image'] = isset($brand_info['image']) ? $this->model_tool_image->resize($brand_info['image'], 80, 80) : $this->model_tool_image->resize("no_image.jpg", 80, 80);
						}
						$this->document->brand_data[$key][] = $brand_info;
					}
				}
			}

			/* PRODUCTS MEGA MENU
			******************************/
			if ($value['menu_type'] == 'products') {
				if (isset($value['products']['prd_id'])) {
					foreach ($value['products']['prd_id'] as $prd_id) {
						$prd_info = $this->model_catalog_product->getProduct($prd_id);

						if (isset($prd_info['product_id'])) {
							if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
								$price = $this->currency->format($this->tax->calculate($prd_info['price'], $prd_info['tax_class_id'], $this->config->get('config_tax')));
							} else {
								$price = false;
							}

							if ((float)$prd_info['special']) {
								$special = $this->currency->format($this->tax->calculate($prd_info['special'], $prd_info['tax_class_id'], $this->config->get('config_tax')));
							} else {
								$special = false;
							}

							$this->document->prdmenu_data[$key][] = array(
								'product_id' 	=> $prd_info['product_id'],
								'name' 			=> $prd_info['name'],
								'image' 		=> $this->model_tool_image->resize(isset($prd_info['image']) ? $prd_info['image'] : "no_image.jpg", $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')),
								'price' 		=> $price,
								'special' 		=> $special,
								'href' 			=> $this->url->link('product/product', 'product_id=' . $prd_info['product_id'])
							);
						}
					}
				}
			}

		}

		if ($this->document->rgen_megamenus) {
			$sort_order = array();
			foreach ($this->document->rgen_megamenus as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}
			array_multisort($sort_order, SORT_ASC, $this->document->rgen_megamenus);
		}
	}

	protected function getCat($cidData){
		$cidData_arr = array();
		foreach ($cidData as $c_id) {
			// Top links
			$maincat = $this->model_catalog_category->getCategory($c_id);
			//echo "<pre style='color:#fff;'>" . print_r($maincat, TRUE) . "</pre>";
			if (isset($maincat['category_id'])) {
				$maincat["href"] = $this->url->link('product/category', 'path=' . $maincat['category_id']);
				$maincat["image"] = $this->model_tool_image->resize($maincat['image'] ? $maincat['image'] : "no_image.jpg", $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
				
				$level_1 = $this->model_catalog_category->getCategories($c_id);
				$level_2 = array();
				$level_3 = array();
				//echo "<pre style='color:#fff;'>level_1" . print_r($level_1, TRUE) . "</pre>";

				$i = 0;
				foreach ($level_1 as $l1_value) {
						
					// Sub menu links - level 1	
					$l1_value["href"] = $this->url->link('product/category', 'path=' . $maincat['category_id'] . '_' . $l1_value['category_id']);
					$l1_value["image"] = $this->model_tool_image->resize($l1_value['image'] ? $l1_value['image'] : "no_image.jpg", $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
					$level_1[$i] = $l1_value;
					
					$subcat = $this->model_catalog_category->getCategories($l1_value['category_id']);
					if ($subcat) {
						$level_2[$l1_value['category_id']] = $subcat;

						// Sub menu links - level 2	
						$j = 0;
						foreach ($level_2[$l1_value['category_id']] as $l2_value) {
							$l2_value["href"] = $this->url->link('product/category', 'path=' . $maincat['category_id'] . '_' . $l1_value['category_id'] . '_' . $l2_value['category_id']);
							$level_2[$l1_value['category_id']][$j] = $l2_value;
						$j++; }
					}
					if (isset($level_2[$l1_value['category_id']])) {
						foreach ($level_2[$l1_value['category_id']] as $l2_value) {
							if (isset($l2_value)) {
								$subcat = $this->model_catalog_category->getCategories($l2_value['category_id']);
								if ($subcat) {
									$level_3[$l2_value['category_id']] = $subcat;
									
									// Sub menu links - level 3	
									$k = 0;
									foreach ($level_3[$l2_value['category_id']] as $l3_value) {
										$l3_value["href"] = $this->url->link('product/category', 'path=' . $maincat['category_id'] . '_' . $l1_value['category_id'] . '_' . $l2_value['category_id'] . '_' . $l3_value['category_id']);
										$level_3[$l2_value['category_id']][$k] = $l3_value;
									$k++; }
								}
							}
						}
					}
				$i++; }
			}
			$cidData_arr[] = array(
				"maincat" => $maincat,
				"level_1" => isset($level_1) ? $level_1 : null,
				"level_2" => isset($level_2) ? $level_2 : null,
				"level_3" => isset($level_3) ? $level_3 : null
			);
		}
		return $cidData_arr;
	}

} ?>