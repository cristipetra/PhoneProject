<?php
class ControllerModuleFeatured extends Controller {
	protected function index($setting) {
		$this->language->load('module/featured'); 

      	$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		
		$this->load->model('catalog/product'); 
		
		$this->load->model('tool/image');

		$this->data['products'] = array();

		$products = explode(',', $this->config->get('featured_product'));		

		if (empty($setting['limit'])) {
			$setting['limit'] = 5;
		}
		
		$products = array_slice($products, 0, (int)$setting['limit']);
		
		foreach ($products as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {
				if ($product_info['image']) {
					$image = $this->model_tool_image->resize($product_info['image'], $setting['image_width'], $setting['image_height']);
				} else {
					$image = false;
				}

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
					
				$this->data['products'][] = array(
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

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/featured.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/featured.tpl';
		} else {
			$this->template = 'default/template/module/featured.tpl';
		}


			/* RGen data
			******************************/
			if($this->config->get('config_template') == "rgen-opencart"){
				
				/* MODULE PRODUCT DISPLAY STYLE */
				$RGen_modprdView = $this->config->get('RGen_modprdView');
				
				if (isset($RGen_modprdView)) {
					$this->document->RGen_modprdView = explode(',', isset($RGen_modprdView) ? $RGen_modprdView : null);
				}else{
					$this->document->RGen_modprdView[0] = 'special-scroll';
					$this->document->RGen_modprdView[1] = 'featured-scroll';
					$this->document->RGen_modprdView[2] = 'best-scroll';
					$this->document->RGen_modprdView[3] = 'latest-scroll';
				}

				$this->document->getRoute = isset($this->request->get['route']) ? $this->request->get['route'] : 'common/home';

				$this->data['button_cart'] = $this->language->get('button_cart');
				$this->data['button_moreinfo'] = $this->language->get('button_moreinfo');
				$this->data['button_wishlist'] = $this->language->get('button_wishlist');
				$this->data['button_compare'] = $this->language->get('button_compare');
				$this->data['review_status'] = $this->config->get('config_review_status');
				$this->data['text_offertag'] = $this->language->get('text_offertag');

				static $module = 0;
	        	$this->data['module'] = $module++;
	        	$this->data['position'] = $setting['position'];
			}
        	
		$this->render();
	}
}
?>