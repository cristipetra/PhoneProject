<?php
class ControllerModuleRGenCustomProducts extends Controller {
	
	private $error = array(); 

	/********************************************
	CREATE TABLE FOR RGEN DB */
	public function install() {
		$this->load->model('rgen/rgencustomprd');
		$this->model_rgen_rgencustomprd->install();
	}
	/*********************************************/

	public function index() {
		$this->install();
		$this->commonData();

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('rgen_customproducts', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('module/rgen_customproducts', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$this->data['manage'] = $this->url->link('module/rgen_customproducts/customproducts', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();
		if (isset($this->request->post['rgen_customproducts_module'])) {
			$this->data['modules'] = $this->request->post['rgen_customproducts_module'];
		} elseif ($this->config->get('rgen_customproducts_module')) { 
			$this->data['modules'] = $this->config->get('rgen_customproducts_module');
		}

		$this->data['sectionlist'] = array();
		foreach ($this->data['rgen_customprds'] as $key => $value) {
			$this->data['sectionlist'][] = array(
				'name' => $value['section_name'],
				'mod_id' => $value['mod_id']
			);
		}

		/* Image tools
		******************************/
		$this->load->model('tool/image');
		$this->data['no_img'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		//echo "<pre style='color:;'>" . print_r($this->data['modules'], TRUE) . "</pre>";

		$this->categoriesAuto_layout();
		$this->productsAuto_layout();
		$this->manufacturerAuto_layout();
		$this->informationAuto_layout();

		$this->template = 'module/rgen_customproducts.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		$this->response->setOutput($this->render());
	}

	public function customproducts(){
		$this->commonData();

		$this->data['mod_id'] = $this->model_rgen_rgencustomprd->LastID();
		if ($this->data['mod_id']) {
			$this->data['mod_id']++;
		}else{
			$this->data['mod_id'] = 1;
		}

		$this->data['back'] = $this->url->link('module/rgen_customproducts', 'token=' . $this->session->data['token'], 'SSL');

		$this->template = 'module/rgen_customproducts_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		//Send the output.
		$this->response->setOutput($this->render());
	}

	public function add(){
		$this->commonData();

		$this->data['mod_id'] = $this->model_rgen_rgencustomprd->LastID();
		if ($this->data['mod_id']) {
			$this->data['mod_id']++;
		}else{
			$this->data['mod_id'] = 1;
		}

		$this->template = 'module/rgen_customproducts_data.tpl';
		$this->response->setOutput($this->render());
	}

	public function getmodule() {
		$this->commonData();
		
		if (isset($this->request->get['mod_name'])) {

			$this->data['mod_name'] = $this->request->get['mod_name'];
			$this->data['get_module'] = $this->model_rgen_rgencustomprd->getRGenValue($this->data['mod_name']);

			$this->data['modules'] = $this->data['get_module'];

			// Selected product list
			$this->data['product_data'] = array();
			if (isset($this->data['modules'][$this->data['mod_name']]['section_data'])) {
				$pr = 0;
				foreach($this->data['modules'][$this->data['mod_name']]['section_data'] as $pr_id => $result){
					if (isset($result['products']) && $result['prdTypes'] == 'custPrd') {
						$this->data['product_data'][] = $result['products'];
						$this->data['product_data'][$pr]['section_id'] = $pr_id;
						$pr++;
					}
				}	
			}
			$this->productsAuto();

			// Selected cat list
			$this->data['cat_sec_data'] = array();
			if (isset($this->data['modules'][$this->data['mod_name']]['section_data'])) {
				$ct = 0;
				foreach($this->data['modules'][$this->data['mod_name']]['section_data'] as $ct_id => $result){
					if (isset($result['selcat_section']) && $result['prdTypes'] == 'selcatSection') {
						$this->data['cat_sec_data'][] = $result['selcat_section'];
						$this->data['cat_sec_data'][$ct]['section_id'] = $ct_id;
						$ct++;
					}
				}	
			}
			$this->categoriesAuto();

			// Selected brand list
			$this->data['brand_sec_data'] = array();
			if (isset($this->data['modules'][$this->data['mod_name']]['section_data'])) {
				$br = 0;
				foreach($this->data['modules'][$this->data['mod_name']]['section_data'] as $br_id => $result){
					if (isset($result['selbrand_section']) && $result['prdTypes'] == 'brandSection') {
						$this->data['brand_sec_data'][] = $result['selbrand_section'];
						$this->data['brand_sec_data'][$br]['section_id'] = $br_id;
						$br++;
					}
				}	
			}
			$this->manufacturerAuto();

			//echo "<pre style='color:;'>" . print_r($this->data['brand_sec_data'], TRUE) . "</pre>";

			$this->template = 'module/rgen_customproducts_data.tpl';
			$this->response->setOutput($this->render());
		}
	}

	public function save(){
		$this->load->model('rgen/rgencustomprd');
		if (isset($this->request->get['mod_name'])) {
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				$this->model_rgen_rgencustomprd->editRGenValue('rgen_customprd', $this->request->get['mod_name'], $this->request->post[$this->request->get['mod_name']]);
				//echo "<pre style='color:;'>" . print_r($this->request->post[$this->request->get['mod_name']], TRUE) . "</pre>";
			}
		}else{
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				$this->model_rgen_rgencustomprd->insertRGen('rgen_customprd', $this->request->post);
			}
		}
		
	}

	public function delete(){
		$this->load->model('rgen/rgencustomprd');
		$this->data['modules'] = $this->config->get('rgen_customproducts_module');
		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];

			// Removing module settings
			if (isset($this->data['modules'])) {
				foreach($this->data['modules'] as $key => $value){
					if($this->request->get['mod_name'] == $value['mod_id']){
						unset($this->data['modules'][$key]);
					}
				}
			}

			// Removing module
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				$this->model_rgen_rgencustomprd->deleteRGenValue($mod_name);
				$this->model_rgen_rgencustomprd->editRGenSetting('rgen_customproducts', 'rgen_customproducts_module', $this->data['modules']);
			}
		}
	}

	public function commonData() {

		$this->load->model('rgen/rgencustomprd');
		$this->data['rgen_customprds'] = $this->model_rgen_rgencustomprd->getRGen('rgen_customprd');

		// Theme version
		$this->data['version'] = $this->config->get('rgen_theme_version');
		$this->data['mod'] = $this->language->get('mod');
		$this->data['ver'] = $this->language->get('ver');
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';

		$this->load->language('module/rgen_customproducts');
		$text_strings = array(
				'heading_title',
				'text_enabled',
				'text_disabled',
				'text_content_top',
				'text_content_bottom',
				'text_column_left',
				'text_column_right',
				'entry_layout',
				'entry_limit',
				'entry_image',
				'entry_position',
				'entry_status',
				'entry_sort_order',
				'button_save',
				'button_cancel',
				'button_add_module',
				'button_remove'
		);
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}
		//END LANGUAGE

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		//BREADCRUMB TRAIL
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/rgen_customproducts', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/rgen_customproducts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		$this->load->model('design/layout');
		$this->data['layoutlist'] = $this->model_design_layout->getLayouts();
		foreach ($this->data['layoutlist'] as $value) {
			$this->data['layouts'][] = array(
				'layout_id'	=>	$value['layout_id'],
				'name' 		=>	$value['name'],
				'route'		=>	$this->model_design_layout->getLayoutRoutes($value['layout_id'])
			);
		}

		//$this->data['layouts'][] = array('layout_id'=>99999, 'name' => "All pages", 'route' => "");
		//$this->data['layouts'] = $this->model_design_layout->getLayouts();

		//echo "<pre style='color:;'>" . print_r($this->data['layouts'], TRUE) . "</pre>";

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_custom');

		$this->data['mod_count'] = count($this->model_rgen_rgencustomprd->getRGen('rgen_customprd'));
		$this->data['mod_count']++;	
	}
	
	
	public function productsAuto() {
		/*********************************************************************/
		// Products
		$this->load->model('catalog/product');
		$this->data['rgen_prdlist'] = array();
		foreach ($this->data['product_data'] as $product_key => $product_value) {
			$selectedPrd = $product_value;

			if (isset($selectedPrd)) {
				foreach ($selectedPrd as $prd) {
					if (isset($prd)) {
						$prd_info = $this->model_catalog_product->getProduct($prd);
						if ($prd_info) {
							$this->data['rgen_prdlist'][$product_value['section_id']][] = array(
								'product_id' => $prd_info['product_id'],
								'name'       => $prd_info['name']
							);	
						}
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_prdlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function categoriesAuto() {
		/*********************************************************************/
		// Categories
		$this->load->model('catalog/category');
		$this->data['rgen_catlist'] = array();
		foreach ($this->data['cat_sec_data'] as $cat_key => $cat_value) {
			$selectedCat = $cat_value;
			if (isset($selectedCat)) {
				foreach ($selectedCat as $catarry) {
					if (isset($catarry)) {
						//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
						$category_info = $this->model_catalog_category->getCategory($catarry);
						if ($category_info) {
							$this->data['rgen_catlist'][$cat_value['section_id']][] = array(
								'category_id' => $category_info['category_id'],
								'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
							);	
						}
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_catlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function manufacturerAuto() {
		/*********************************************************************/
		// Manufacturer 
		$this->load->model('catalog/manufacturer');
		$this->data['rgen_brandlist'] = array();
		foreach ($this->data['brand_sec_data'] as $brd_key => $brd_value) {
			$selectedBrand = $brd_value;
			if (isset($selectedBrand)) {
				foreach ($selectedBrand as $brdarry) {
					if (isset($brdarry)) {
						//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
						$brand_info = $this->model_catalog_manufacturer->getManufacturer($brdarry);
						if ($brand_info) {
							$this->data['rgen_brandlist'][$brd_value['section_id']][] = array(
								'manufacturer_id' => $brand_info['manufacturer_id'],
								'name'        => $brand_info['name']
							);	
						}
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_brandlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}


	/*************************************************************************/


	public function categoriesAuto_layout() {
		/*********************************************************************/
		// Categories
		$this->load->model('catalog/category');
		$this->data['rgen_catlist_layout'] = array();
		
		if (isset($this->data['modules'])) {
			foreach ($this->data['modules'] as $catarry_k => $catarry) {
				if (isset($catarry['category'])) {
					foreach ($catarry['category'] as $cat) {
						$category_info = $this->model_catalog_category->getCategory($cat);
						if ($category_info) {
							$this->data['rgen_catlist_layout'][$catarry['setting_id']][] = array(
								'category_id' => $category_info['category_id'],
								'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
							);	
						}
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_catlist_layout'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function productsAuto_layout() {
		/*********************************************************************/
		// Products
		$this->load->model('catalog/product');
		$this->data['rgen_prdlist_layout'] = array();
		
		if (isset($this->data['modules'])) {
			foreach ($this->data['modules'] as $prdarry) {
				if (isset($prdarry['products'])) {
					foreach ($prdarry['products'] as $prd) {
						$prd_info = $this->model_catalog_product->getProduct($prd);
						if ($prd_info) {
							$this->data['rgen_prdlist_layout'][$prdarry['setting_id']][] = array(
								'product_id' => $prd_info['product_id'],
								'name'        => $prd_info['name']
							);	
						}
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_prdlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function manufacturerAuto_layout() {
		/*********************************************************************/
		// Manufacturer 
		$this->load->model('catalog/manufacturer');
		$this->data['rgen_brandlist_layout'] = array();

		if (isset($this->data['modules'])) {
			foreach ($this->data['modules'] as $brdarry) {
				if (isset($brdarry['brands'])) {
					foreach ($brdarry['brands'] as $brd) {
						$brand_info = $this->model_catalog_manufacturer->getManufacturer($brd);
						if ($brand_info) {
							$this->data['rgen_brandlist_layout'][$brdarry['setting_id']][] = array(
								'manufacturer_id' 	=> $brand_info['manufacturer_id'],
								'name'      		=> $brand_info['name']
							);	
						}
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_brandlist_layout'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function informationAuto_layout() {
		/*********************************************************************/
		// Information
		$this->load->model('catalog/information');
		$this->data['rgen_infolist_layout'] = array();
		
		if (isset($this->data['modules'])) {
			foreach ($this->data['modules'] as $infoarry) {
				if (isset($infoarry['info'])) {
					foreach ($infoarry['info'] as $info) {
						$information_info = $this->model_catalog_information->getInfoPage($info);
						if ($information_info) {
							$this->data['rgen_infolist_layout'][$infoarry['setting_id']][] = array(
								'information_id' 	=> $information_info['information_id'],
								'name'      		=> $information_info['title']
							);
						}
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_infolist_layout'], TRUE) . "</pre>";
		/*********************************************************************/
	}


	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/rgen_customproducts')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}


}
?>