<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		$this->data['title'] = $this->document->getTitle();
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}
        
        if (isset($this->session->data['error']) && !empty($this->session->data['error'])) {
            $this->data['error'] = $this->session->data['error'];
            
            unset($this->session->data['error']);
        } else {
            $this->data['error'] = '';
        }

		$this->data['base'] = $server;
		$this->data['description'] = $this->document->getDescription();
		$this->data['keywords'] = $this->document->getKeywords();
		$this->data['links'] = $this->document->getLinks();	 
		$this->data['styles'] = $this->document->getStyles();
		$this->data['scripts'] = $this->document->getScripts();
		$this->data['lang'] = $this->language->get('code');
		$this->data['direction'] = $this->language->get('direction');
		$this->data['google_analytics'] = html_entity_decode($this->config->get('config_google_analytics'), ENT_QUOTES, 'UTF-8');
		$this->data['name'] = $this->config->get('config_name');
		
		if ($this->config->get('config_icon') && file_exists(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->data['icon'] = $server . 'image/' . $this->config->get('config_icon');
		} else {
			$this->data['icon'] = '';
		}
		
		if ($this->config->get('config_logo') && file_exists(DIR_IMAGE . $this->config->get('config_logo'))) {
			$this->data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$this->data['logo'] = '';
		}		
		
		$this->language->load('common/header');
		
		$this->data['text_home'] = $this->language->get('text_home');
		$this->data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		$this->data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
    	$this->data['text_search'] = $this->language->get('text_search');
		$this->data['text_welcome'] = sprintf($this->language->get('text_welcome'), $this->url->link('account/login', '', 'SSL'), $this->url->link('account/register', '', 'SSL'));
		$this->data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->url->link('account/logout', '', 'SSL'));
		$this->data['text_account'] = $this->language->get('text_account');
    	$this->data['text_checkout'] = $this->language->get('text_checkout');
				
		$this->data['home'] = $this->url->link('common/home');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['logged'] = $this->customer->isLogged();
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');
		$this->data['shopping_cart'] = $this->url->link('checkout/cart');
		$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		
		// Daniel's robot detector
		$status = true;
		
		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", trim($this->config->get('config_robots')));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}
		
		// A dirty hack to try to set a cookie for the multi-store feature
		$this->load->model('setting/store');
		
		$this->data['stores'] = array();
		
		if ($this->config->get('config_shared') && $status) {
			$this->data['stores'][] = $server . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			
			$stores = $this->model_setting_store->getStores();
					
			foreach ($stores as $store) {
				$this->data['stores'][] = $store['url'] . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			}
		}
				
		// Search		
		if (isset($this->request->get['search'])) {
			$this->data['search'] = $this->request->get['search'];
		} else {
			$this->data['search'] = '';
		}
		
		// Menu
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['categories'] = array();
					
		$categories = $this->model_catalog_category->getCategories(0);
		
		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();
				
				$children = $this->model_catalog_category->getCategories($category['category_id']);
				
				foreach ($children as $child) {
					$data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);
					
					$product_total = $this->model_catalog_product->getTotalProducts($data);

			/*============*/
			$i = 0;
			$level1 = array();
			$level2 = array();
			$ch1 = $this->model_catalog_category->getCategories($child['category_id']);
			$ch2 = array();

			foreach ($ch1 as $c1) {
				$d1 = array(
					'filter_category_id'  => $c1['category_id'],
					'filter_sub_category' => true
				);
				$p_total1 = $this->model_catalog_product->getTotalProducts($d1);
		
				$level1[] = array(
					'catid' => $c1['category_id'],
					'name'  => $c1['name'] . ($this->config->get('config_product_count') ? ' (' . $p_total1 . ')' : ''),
					'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $c1['category_id'])
				);

				/*============*/
				$ch2 = $this->model_catalog_category->getCategories($c1['category_id']);
				foreach ($ch2 as $c2) {
					$d2 = array(
						'filter_category_id'  => $c2['category_id'],
						'filter_sub_category' => true
					);
					$p_total2 = $this->model_catalog_product->getTotalProducts($d2);
		
					$level2[$c1['category_id']][] = array(
						'name'  => $c2['name'] . ($this->config->get('config_product_count') ? ' (' . $p_total2 . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $c1['category_id'] . '_' . $c2['category_id'])
					);
				}
				/*============*/

				if (isset($level2[$c1['category_id']])) {
					$level1[$i]['level2'] = $level2[$c1['category_id']];
				}
				$i++;
				$ch2[$c1['category_id']] = $this->model_catalog_category->getCategories($c1['category_id']);
			}
			/*============*/
			
									
					$children_data[] = array(

			'level1' => $level1,
			
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);						
				}
				
				// Level 1
				$this->data['categories'][] = array(
					'name'     => $category['name'],

			'children' => $children_data,
			
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}
		

			if (isset($this->request->get['path'])) {
				$parts = explode('_', (string)$this->request->get['path']);
				$this->data['category_id'] = (int)array_pop($parts);
			}else{
				$this->data['category_id'] = '';
			}
			if (isset($this->request->get['product_id'])) {
				$this->data['product_id'] = (int)$this->request->get['product_id'];
			} else {
				$this->data['product_id'] = 0;
			}
			if (isset($this->request->get['manufacturer_id'])) {
				$this->data['brand_id'] = (int)$this->request->get['manufacturer_id'];
			} else {
				$this->data['brand_id'] = 0;
			}
			if (isset($this->request->get['information_id'])) {
				$this->data['information_id'] = (int)$this->request->get['information_id'];
			} else {
				$this->data['information_id'] = 0;
			} 
			
		$this->children = array(
			'module/language',
			'module/currency',
			'module/cart'
		);
				
$this->load->model('design/layout');
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('catalog/information');
        
        if (isset($this->request->get['route'])) {
            $route = $this->request->get['route'];
        } else {
            $route = 'common/home';
        }
        
        $module_data = array();
        
        $this->load->model('setting/extension');
        
        $extensions = $this->model_setting_extension->getExtensions('module');        
        
        foreach ($extensions as $extension) {
            $modules = $this->config->get($extension['code'] . '_module');
        
            if ($modules) {
                foreach ($modules as $module) {
                    if ($module['position'] == 'content_header' && $module['status']) {
                        $module_data[] = array(
                            'code'       => $extension['code'],
                            'setting'    => $module,
                            'sort_order' => $module['sort_order']
                        );                
                    }
                }
            }
        }
        
        $sort_order = array(); 
      
        foreach ($module_data as $key => $value) {
              $sort_order[$key] = $value['sort_order'];
        }
        
        array_multisort($sort_order, SORT_ASC, $module_data);
        
        $this->data['modules'] = array();
        
        foreach ($module_data as $module) {
            $module = $this->getChild('module/' . $module['code'], $module['setting']);
            
            if ($module) {
                $this->data['modules'][] = $module;
            }
        }  
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		

			$this->load->library('rgen/rgen_lib');

			/* RGen data
			******************************/
			if($this->config->get('config_template') == "rgen-opencart"){
				$this->children[] = 'module/rgen_theme';
				$this->children[] = 'module/rgen_megamenu';
				$this->children[] = 'common/rgen-positions/rgen_header_top';
			}
			
			$this->data['text_account'] = $this->language->get('text_account');
			$this->data['text_order'] = $this->language->get('text_order');
			$this->data['text_newsletter'] = $this->language->get('text_newsletter');

			$this->data['account'] = $this->url->link('account/account', '', 'SSL');
			$this->data['order'] = $this->url->link('account/order', '', 'SSL');
			$this->data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');
			
			//echo "<pre style='color:#fff;'>" . print_r($this->document->themecss, TRUE) . "</pre>";

			
    	$this->render();
	} 	
}
?>
