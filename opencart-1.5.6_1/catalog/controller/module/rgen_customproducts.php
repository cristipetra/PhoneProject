<?php  
class ControllerModuleRGenCustomProducts extends Controller {
	protected function index($setting) {
		
		$this->data['heading_title'] = sprintf($this->language->get('heading_title'), $this->config->get('config_name'));

		$this->load->model('rgen/rgencustomprd');
		$this->load->model('catalog/manufacturer');
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$this->data['button_cart']     = $this->language->get('button_cart');
		$this->data['button_moreinfo'] = $this->language->get('button_moreinfo');
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		$this->data['button_compare']  = $this->language->get('button_compare');
		$this->data['review_status']   = $this->config->get('config_review_status');
		$this->data['text_offertag']   = $this->language->get('text_offertag');

		/***************/
		$this->load->library('rgen/rgen_lib');
	
		$rgen_optimize = $this->config->get('RGen_optimize');
		$cache = $rgen_optimize['cache_pcb'];
		$theme = $this->config->get('config_template');
		$dir = 'rgen_pcb';
		$loggedIn = $this->customer->isLogged();
		$device = $this->rgen->device;
        $priceStatus = ($this->config->get('config_customer_price') && $loggedIn) || !$this->config->get('config_customer_price') ? 'py' : 'pn';
        $mobStatus = $this->config->get('RGen_optimizemob') == 1 && $device == 'm' ? 'm' : 'd';
        $taxStatus = $this->config->get('config_tax') ? 'ty' : 'tn';
        $reviewStatus = $this->config->get('config_review_status') ? 'ry' : 'rn';
        
		/***************/

		$this->data['setting'] = $setting;
		$this->data['position'] = $setting["position"];

		//echo "<pre style='color:;'>" . print_r($setting, TRUE) . "</pre>";
		//echo "<pre style='color:;'>" . print_r($this->config, TRUE) . "</pre>";
		//echo "<pre style='color:;'>" . print_r($this->data['section_data'], TRUE) . "</pre>";

		/* GET LAYOUT ID
		******************************/
		$this->load->model('design/layout');

		$this->data['getRoute'] = 'common/home';
		if (isset($this->request->get['route'])) {
			$this->data['getRoute'] = $this->request->get['route'];
		} else {
			$this->data['getRoute'] = 'common/home';
		}

		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = 'common/home';
		}
		
		$layout_id = 0;
		
		if ($route == 'product/category' && isset($this->request->get['path'])) {
			$path = explode('_', (string)$this->request->get['path']);

			if (!$this->config->get('config_maintenance')) {
				$layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
			}
		}
		
		if ($route == 'product/product' && isset($this->request->get['product_id'])) {
			$layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
		}
		
		if ($route == 'information/information' && isset($this->request->get['information_id'])) {
			$layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
		}
		
		if (!$layout_id) {
			$layout_id = $this->model_design_layout->getLayout($route);
		}
				
		if (!$layout_id) {
			$layout_id = $this->config->get('config_layout_id');
		}
		$this->data['layouts'] = $layout_id;

		/* GET CATEGORY ID
		******************************/
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
			$this->data['category_id'] = (int)array_pop($parts);
		}else{
			$this->data['category_id'] = '';
		}
		
		/* GET PRODUCT ID
		******************************/
		if (isset($this->request->get['product_id'])) {
			$this->data['product_id'] = (int)$this->request->get['product_id'];
		} else {
			$this->data['product_id'] = 0;
		}

		/* GET BRAND ID
		******************************/
		if (isset($this->request->get['manufacturer_id'])) {
			$this->data['brand_id'] = (int)$this->request->get['manufacturer_id'];
		} else {
			$this->data['brand_id'] = 0;
		} 

		/* GET INFORMATION ID
		******************************/
		if (isset($this->request->get['information_id'])) {
			$this->data['information_id'] = (int)$this->request->get['information_id'];
		} else {
			$this->data['information_id'] = 0;
		}
		
		static $module = 0;
		$this->data['module'] = $module++;
		//$this->getMod($setting);


		if($this->data['setting']) {
			
			/* Section full block style
			******************************/
			if (isset($setting['fullB']) && $setting['fullB'] == 'y') {
				
				$this->data['fullB_class'] = isset($setting['fullB_class']) && $setting['fullB_class'] != '' ? ' '.$setting['fullB_class'] : null;

				$setting['fullB_bgps1'] = isset($setting['fullB_bgps1']) ? $setting['fullB_bgps1'] : null;
				$setting['fullB_bgps2'] = isset($setting['fullB_bgps2']) ? $setting['fullB_bgps2'] : null;
				
				if (isset($setting['fullB_bgposition']) && $setting['fullB_bgposition'] != "other" && $setting['fullB_bgimg'] != '') {
					$bgPosition = $setting['fullB_bgposition'] != '' ? 'background-position: '.$setting['fullB_bgposition'].';' : 'background-position: left top;';
				}else{
					$bgPosition = $setting['fullB_bgposition'] == 'other' ? 'background-position: '.$setting['fullB_bgps1'].' '.$setting['fullB_bgps2'].';' : 'background-position: left top;';
				}

				$this->data['fullB_settings'] = isset($setting['fullB_bgcolor']) && $setting['fullB_bgcolor'] != '' ? 'background-color: '.$setting['fullB_bgcolor'].';' : null;
				$this->data['fullB_settings'] .= isset($setting['fullB_bgimg']) && $setting['fullB_bgimg'] != '' ? 'background-image: url(image/'.$setting['fullB_bgimg'].');' : null;
				$this->data['fullB_settings'] .= isset($setting['fullB_bgrepeat']) && $setting['fullB_bgimg'] != '' && $setting['fullB_bgrepeat'] != '' ? 'background-repeat: '.$setting['fullB_bgrepeat'].';' : 'background-repeat: repeat;';
				$this->data['fullB_settings'] .= $bgPosition;
				$this->data['fullB_settings'] .= isset($setting['fullB_bgAttachment']) && $setting['fullB_bgimg'] != '' && $setting['fullB_bgAttachment'] != '' ? 'background-attachment: '.$setting['fullB_bgAttachment'].';' : 'background-attachment: inherit;';
			}
			/*echo "<pre>".print_r($this->data['setting'],true)."</pre>";
			echo "<pre>".print_r($this->data['fullB_settings'],true)."</pre>";*/

			$tmp = array();
			foreach ($this->data['setting'] as $key => $value) { if ($value) { $tmp[] = $value; } }
			if($theme == "rgen-opencart"){
				if ($cache) {
					//$modName = implode("-", $tmp).$this->currency->getCode();
					$modName = serialize($tmp).$this->currency->getCode();
					$modFile = md5($modName)."_".$this->config->get('config_language_id').$mobStatus.$priceStatus.$taxStatus.$reviewStatus.$this->config->get('config_store_id');
					$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);
					if(!file_exists($cache_file)) {
						$this->getMod($setting);
						if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_customproducts.tpl')) {
							$this->template = $theme . '/template/module/rgen_customproducts.tpl';
						}
						$this->render();
						$this->rgen->cacheFile($this->render(), $cache_file);
					}else{
						$tpl = str_replace(DIR_TEMPLATE, '', $cache_file);
						$this->template = $tpl;
						$this->render();
					}
				}else{
					$this->getMod($setting);
					if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_customproducts.tpl')) {
						$this->template = $theme . '/template/module/rgen_customproducts.tpl';
						$this->render();
					}
				}
			}
		}
	}

	public function getMod($setting){
		$this->data['rgen_customprds'] = $this->model_rgen_rgencustomprd->getRGen('rgen_customprd');
		
		$sort_order = array();
		foreach ($this->data['rgen_customprds'][$setting['mod_id']]['section_data'] as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}
		array_multisort($sort_order, SORT_ASC, $this->data['rgen_customprds'][$setting['mod_id']]['section_data']);

		// Data use to get information		
		$section_data = $this->data['rgen_customprds'][$setting['mod_id']]['section_data'];

		// Data use in front end module
		$this->data['section_data']         = $section_data;
		$this->data['single_cat_section']   = array();
		$this->data['selected_cat_section'] = array();

		//echo "<pre>".print_r($this->data['fullB_settings'],true)."</pre>";


		/* Section data get information
		******************************/
		if (isset($section_data)) {
			foreach ($section_data as $key => $value) {

				if ($value['prdTypes'] == 'special') {
					
					$prdlimit = $value['prdlimit'];
					$this->special_prd($prdlimit, $setting);
				
				}
				if ($value['prdTypes'] == 'latest') {
					
					$prdlimit = $value['prdlimit'];
					$this->latest_prd($prdlimit, $setting);
				}
				if ($value['prdTypes'] == 'best') {
					
					$prdlimit = $value['prdlimit'];
					$this->best_prd($prdlimit, $setting);
				}

				if ($value['prdTypes'] == 'catPrd') {
					$this->data['section_data'][$key]['category_url'] = $this->url->link('product/category', 'path=' . $value['category_id']);
					$prdlimit = $value['prdlimit'];
					$category_id = $value['category_id'];
					$this->category_prd($prdlimit, $setting, $category_id);
					$this->data['section_data'][$key]['catPrd_data'] = $this->category_prd($prdlimit, $setting, $category_id);
				}

				if ($value['prdTypes'] == 'brandPrd') {
					$prdlimit = $value['prdlimit'];
					$brand_id = $value['brand_id'];
					$this->brand_prd($prdlimit, $setting, $brand_id);
					$this->data['section_data'][$key]['brandPrd_data'] = $this->brand_prd($prdlimit, $setting, $brand_id);
				}

				if ($value['prdTypes'] == 'custPrd') {
					$prdlimit = $value['prdlimit'];
					$products = isset($value['products']) ? $value['products'] : null;
					if (isset($products) && $products != '') {
						$this->custom_prd($prdlimit, $setting, $products);
						$this->data['section_data'][$key]['custPrd_data'] = $this->custom_prd($prdlimit, $setting, $products);
					}
				}

				/* SINGLE CATEGORY SECTION
				******************************/
				if ($value['prdTypes'] == 'catSection') {
					if (isset($value['category_sec_id'])) {

						$c_id = $value['category_sec_id'];
						// Top links
						$maincat = $this->model_catalog_category->getCategory($c_id);
						if (isset($maincat['category_id'])) {
							$maincat["href"] = $this->url->link('product/category', 'path=' . $maincat['category_id']);
							
							$level_1 = $this->model_catalog_category->getCategories($c_id);
							$level_2 = array();
							$level_3 = array();
							
							$i = 0;
							foreach ($level_1 as $l1_value) {
									
								// Sub menu links - level 1	
								$l1_value["href"]  = $this->url->link('product/category', 'path=' . $maincat['category_id'] . '_' . $l1_value['category_id']);
								$l1_value["image"] = $this->model_tool_image->resize($l1_value['image'] ? $l1_value['image'] : "no_image.jpg", $setting['img_w'], $setting['img_h']);
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
							$i++; }
						}
						$this->data['single_cat_section'] = array(
							"maincat" => $maincat,
							"level_1" => isset($level_1) ? $level_1 : null,
							"level_2" => isset($level_2) ? $level_2 : null
						);

						$this->data['section_data'][$key]['category_sec_data'] = $this->data['single_cat_section'];
						
					}
				}
				//********************


				/* SELECTED CATEGORY SECTION
				******************************/
				if ($value['prdTypes'] == 'selcatSection') {
					if (isset($value['selcat_section'])) {
						$prdlimit = isset($value['selcat_prd_limit']) && $value['selcat_prd_limit'] != '' ? $value['selcat_prd_limit'] : 5;

						foreach ($value['selcat_section'] as $selcat_k => $selcat_v) {
							$selcat_data          = $this->model_catalog_category->getCategory($selcat_v);
							$selcat_data["href"]  = $this->url->link('product/category', 'path=' . $selcat_v);
							$selcat_data["image"] = $this->model_tool_image->resize(isset($selcat_data['image']) ? $selcat_data['image'] : "no_image.jpg", $setting['img_w'], $setting['img_h']);

							$this->data['selected_cat_section'][] = $selcat_data;

							$category_id                    = $selcat_v;
							$this->data['selected_cat_prd'][$selcat_v] = $this->selcat_sec_prd($prdlimit, $setting, $category_id);
							//echo "<pre style='color:;'> Products get " . print_r($this->data['selected_cat_prd'], TRUE) . "</pre>";

						}
						$this->data['section_data'][$key]['selcat_section_data'] = $this->data['selected_cat_section'];
						$this->data['section_data'][$key]['selected_cat_prd']    = $this->data['selected_cat_prd'];

						// Resting array
						$this->data['selected_cat_section'] = '';
						$this->data['selected_cat_prd']     = '';
					}
				}
				//********************

				/* SELECTED BRANDS SECTION
				******************************/
				if ($value['prdTypes'] == 'brandSection') {
					if (isset($value['selbrand_section'])) {
						foreach ($value['selbrand_section'] as $b_id) {
							$prdlimit = isset($value['selbrand_prd_limit']) && $value['selbrand_prd_limit'] != '' ? $value['selbrand_prd_limit'] : 5;

							$brand_info = $this->model_catalog_manufacturer->getManufacturer($b_id);
							if (isset($brand_info['manufacturer_id'])) {
								$brand_info['href'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $brand_info['manufacturer_id']);
								$brand_info['image'] = $this->model_tool_image->resize($brand_info['image'] ? $brand_info['image'] : "no_image.jpg", $setting['img_w'], $setting['img_h']);
								//$brand_info['image'] = isset($brand_info['image']) ? $this->model_tool_image->resize($brand_info['image'], 80, 80) : $this->model_tool_image->resize("no_image.jpg", 80, 80);
							}

							$brand_id                                = $b_id;
							$this->data['selected_brand_section'][]  = $brand_info;
							$this->data['selected_brand_prd'][$b_id] = $this->selbrand_sec_prd($prdlimit, $setting, $brand_id);
						}
						$this->data['section_data'][$key]['selbrand_section_data'] = $this->data['selected_brand_section'];
						$this->data['section_data'][$key]['selected_brand_prd']    = $this->data['selected_brand_prd'];

						// Resting array
						$this->data['selected_brand_section'] = '';
						$this->data['selected_brand_prd'] = '';
					}
				}
				//********************

			}
		}
	}

	/* Special products
	******************************/
	public function special_prd($prdlimit, $setting) {
		$this->data['special_prd'] = array();
		$data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => isset($prdlimit) ? $prdlimit : 8
		);

		$special_prds = $this->model_catalog_product->getProductSpecials($data);

		foreach ($special_prds as $result) {
			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);

			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
					
			if ((float)$result['special']) { 
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			
			$this->data['special_prd'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id'])
			);
		}
		//echo "<pre style='color:#FFF;'>Special offer products ==> " . print_r($this->data['special_prd'], TRUE) . "</pre>";
	}


	/* Latest products
	******************************/
	public function latest_prd($prdlimit, $setting) {
		$this->data['latest_prd'] = array();
		
		$data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => isset($prdlimit) ? $prdlimit : 8
		);

		$latest_prd = $this->model_catalog_product->getProducts($data);

		foreach ($latest_prd as $result) {
			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);
						
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
					
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			
			$this->data['latest_prd'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}
		//echo "<pre style='color:#FFF;'>Special offer products ==> " . print_r($this->data['latest_prd'], TRUE) . "</pre>";
	}

	/* Bestseller products
	******************************/
	public function best_prd($prdlimit, $setting) {
		$this->data['best_prd'] = array();
		
		$limit = isset($prdlimit) ? $prdlimit : 8;

		$best_prd = $this->model_catalog_product->getBestSellerProducts($limit);
		
		foreach ($best_prd as $result) {
			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
					
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}	
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['best_prd'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}
		//echo "<pre style='color:#FFF;'>Special offer products ==> " . print_r($this->data['best_prd'], TRUE) . "</pre>";
	}


	/* Category products
	******************************/
	public function category_prd($prdlimit, $setting, $category_id) {
		$this->data['cat_prd'] = array();
		$data = array(
			'filter_category_id' => $category_id,
			'start'              => 0,
			'limit'              => isset($prdlimit) ? $prdlimit : 8
		);
		
		$cat_products = $this->model_catalog_product->getProducts($data);

		foreach ($cat_products as $result) {
			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
			
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}	
			
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
			} else {
				$tax = false;
			}				
			
			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['cat_prd'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'price'       => $price,
				'special'     => $special,
				'tax'         => $tax,
				'rating'      => $result['rating'],
				'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'			=> $this->url->link('product/product', 'product_id=' . $result['product_id'])
			);
		}
		return $this->data['cat_prd'];
		//echo "<pre style='color:;'>Category products ==> " . print_r($this->data['cat_prd'], TRUE) . "</pre>";
	}

	/* Manufacturer products
	******************************/
	public function brand_prd($prdlimit, $setting, $brand_id) {
		$this->data['brand_prd'] = array();
		$data = array(
			'filter_manufacturer_id' => $brand_id,
			'start'              => 0,
			'limit'              => isset($prdlimit) ? $prdlimit : 8
		);
		
		$cat_products = $this->model_catalog_product->getProducts($data);

		foreach ($cat_products as $result) {
			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
			
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}	
			
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
			} else {
				$tax = false;
			}				
			
			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['brand_prd'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'price'       => $price,
				'special'     => $special,
				'tax'         => $tax,
				'rating'      => $result['rating'],
				'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'			=> $this->url->link('product/product', 'product_id=' . $result['product_id'])
			);
		}
		return $this->data['brand_prd'];
		//echo "<pre style='color:#FFF;'>Category products ==> " . print_r($this->data['brand_prd'], TRUE) . "</pre>";
	}


	/* Custom products
	******************************/
	public function custom_prd($prdlimit, $setting, $products) {

		$this->data['custom_prd'] = array();
		if (isset($products)) {
			foreach ($products as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);
				
				if ($product_info) {
					$image = $this->model_tool_image->resize(isset($product_info['image'])?$product_info['image']:'no_image.jpg', $setting['img_w'], $setting['img_h']);
					
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
					} else {
						$price = false;
					}
							
					if ((float)$product_info['special']) {
						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
					} else {
						$special = false;
					}
					
					if ($this->config->get('config_review_status')) {
						$rating = $product_info['rating'];
					} else {
						$rating = false;
					}
						
					$this->data['custom_prd'][] = array(
						'product_id' => $product_info['product_id'],
						'thumb'   	 => $image,
						'name'    	 => $product_info['name'],
						'price'   	 => $price,
						'special' 	 => $special,
						'rating'     => $rating,
						'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
						'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
					);
				}
			}
		}
		return $this->data['custom_prd'];
	}

	/* Selected Category section products
	******************************/
	public function selcat_sec_prd($prdlimit, $setting, $category_id) {
		$this->data['selcat_sec_prd'] = array();
		$data = array(
			'filter_category_id' => $category_id,
			'start'              => 0,
			'limit'              => $prdlimit
		);
		
		$cat_products = $this->model_catalog_product->getProducts($data);

		foreach ($cat_products as $result) {
			
			/*$img_w = $this->config->get('config_image_product_width') - 100;
			$img_h = round($this->config->get('config_image_product_height')/$this->config->get('config_image_product_width') * $img_w);*/

			$img_w = $this->config->get('config_image_product_width');
			$img_h = $this->config->get('config_image_product_height');

			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $img_w, $img_h);
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
			
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}	
			
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
			} else {
				$tax = false;
			}				
			
			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['selcat_sec_prd'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'price'       => $price,
				'special'     => $special,
				'tax'         => $tax,
				'rating'      => $result['rating'],
				'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'			=> $this->url->link('product/product', 'product_id=' . $result['product_id'])
			);
		}
		return $this->data['selcat_sec_prd'];
		//echo "<pre style='color:;'>Category products ==> " . print_r($this->data['cat_prd'], TRUE) . "</pre>";
	}

	/* Selected Manufacturer products
	******************************/
	public function selbrand_sec_prd($prdlimit, $setting, $brand_id) {
		$this->data['selbrand_sec_prd'] = array();
		$data = array(
			'filter_manufacturer_id' => $brand_id,
			'start'              => 0,
			'limit'              => isset($prdlimit) ? $prdlimit : 8
		);
		
		$cat_products = $this->model_catalog_product->getProducts($data);

		foreach ($cat_products as $result) {

			$img_w = $this->config->get('config_image_product_width');
			$img_h = $this->config->get('config_image_product_height');

			$image = $this->model_tool_image->resize(isset($result['image'])?$result['image']:'no_image.jpg', $img_w, $img_h);
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
			
			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}	
			
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
			} else {
				$tax = false;
			}				
			
			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['selbrand_sec_prd'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'price'       => $price,
				'special'     => $special,
				'tax'         => $tax,
				'rating'      => $result['rating'],
				'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'			=> $this->url->link('product/product', 'product_id=' . $result['product_id'])
			);
		}
		return $this->data['selbrand_sec_prd'];
		//echo "<pre style='color:#FFF;'>Category products ==> " . print_r($this->data['brand_prd'], TRUE) . "</pre>";
	}

}
?>