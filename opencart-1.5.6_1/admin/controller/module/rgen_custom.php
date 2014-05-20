<?php
class ControllerModuleRgenCustom extends Controller {
	private $error = array(); 

	/********************************************
	CREATE TABLE FOR RGEN DB */
	public function install() {
		$this->load->model('rgen/rgencustom');
		$this->model_rgen_rgencustom->install();
		$this->model_rgen_rgencustom->installDataTable();
	}
	/*********************************************/

	public function index() {
		// Theme version
		$this->data['version'] = $this->config->get('rgen_theme_version');
		$this->data['mod'] = $this->language->get('mod');
		$this->data['ver'] = $this->language->get('ver');
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';

		$this->install();
		$this->language->load('module/rgen_custom');

		$this->document->setTitle($this->language->get('heading_title'));
		
		// COLOUR PICKER FILES
		$this->document->addStyle('view/stylesheet/jquery.colorpicker.css');
		$this->document->addScript('view/javascript/jquery/jquery.colorpicker.js');
		
		/********************************************
		POST DATA TO RGEN CUSTOM DB */
		$this->load->model('rgen/rgencustom');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_rgen_rgencustom->editRGen('rgen_custom', $this->request->post);	
			$this->add_entry();

			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('module/rgen_custom', 'token=' . $this->session->data['token'], 'SSL'));
		}
		/*********************************************/

		// Common data loading
		$this->commonData();

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

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
			'href'      => $this->url->link('module/rgen_custom', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/rgen_custom', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		$this->data['modules'] = array();
		if (isset($this->request->post['rgen_custom_module'])) {
			$this->data['modules'] = $this->request->post['rgen_custom_module'];
		} elseif ($this->config->get('rgen_custom_module')) { 
			$this->data['old_modules'] = $this->config->get('rgen_custom_module');
		}
		
		$this->data['modules'] = $this->model_rgen_rgencustom->getRGen("rgen_custom");

		$this->delete_old_entry();
		$this->add_entry();

		// Data sorting
		$sort_order = array();
		foreach ($this->data['modules'] as $key => $value) {
			$parts = explode('rgen_custom_module', (string)$value['mod_id']);
			$this->data['sort_data'] = (int)array_pop($parts);
			$sort_order[$key] = $this->data['sort_data'];
		}
		array_multisort($sort_order, SORT_ASC, $this->data['modules']);

		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_custom');

		$this->template = 'module/rgen_custom.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	public function delete_old_entry() {
		$this->data['entry_check'] = $this->model_rgen_rgencustom->getRGen("rgen_custom");
		
		if (isset($this->data['old_modules'])) {
			$check_arr = end($this->data['old_modules']);
		}else{
			$check_arr = '';
		}
		
		if(isset($this->data['old_modules']) && !isset($check_arr['data'])){
			$i = count($this->data['modules']);
			foreach ($this->data['old_modules'] as $value) {
				$this->data['modules']['rgen_custom_module' . $i] = $value;
				$this->data['modules']['rgen_custom_module' . $i]['mod_id'] = 'rgen_custom_module' . $i;
			$i++; }
		}
	}

	public function add_entry() {
		$this->data['add_entry'] = $this->model_rgen_rgencustom->getRGen("rgen_custom");
		$this->data['rgen_setting'] = array();
		foreach ($this->data['add_entry'] as $key => $value) {
			$this->data['rgen_setting']['rgen_custom_module'][] = array(
				'mod_id' 		=> $value['mod_id'],
				'layout_id' 	=> $value['layout_id'],
				
				'category' 		=> isset($value['category']) ? $value['category'] : null,
				'products' 		=> isset($value['prd']) ? $value['prd'] : null,
				'brands' 		=> isset($value['brand']) ? $value['brand'] : null,
				'info' 			=> isset($value['info']) ? $value['info'] : null,

				'cat_status' 	=> isset($value['cat_status']) ? $value['cat_status'] : null,
				'prd_status' 	=> isset($value['prd_status']) ? $value['prd_status'] : null,
				'brand_status' 	=> isset($value['brand_status']) ? $value['brand_status'] : null,
				'info_status' 	=> isset($value['info_status']) ? $value['info_status'] : null,

				'fullB' 			=> isset($value['fullB']) ? $value['fullB'] : 'n',
				'fullB_class' 		=> isset($value['fullB_class']) ? $value['fullB_class'] : 'n',
				'fullB_bgcolor' 	=> isset($value['fullB_bgcolor']) ? $value['fullB_bgcolor'] : null,
				'fullB_bgimg' 		=> isset($value['fullB_bgimg']) ? $value['fullB_bgimg'] : null,
				'fullB_bgrepeat'	=> isset($value['fullB_bgrepeat']) ? $value['fullB_bgrepeat'] : null,
				'fullB_bgposition' 	=> isset($value['fullB_bgposition']) ? $value['fullB_bgposition'] : null,
				'fullB_bgAttachment' 	=> isset($value['fullB_bgAttachment']) ? $value['fullB_bgAttachment'] : null,
				'fullB_bgps1' 	=> isset($value['fullB_bgps1']) ? $value['fullB_bgps1'] : null,
				'fullB_bgps2' 	=> isset($value['fullB_bgps2']) ? $value['fullB_bgps2'] : null,

				'position' 		=> $value['position'], 
				'status' 		=> $value['status'], 
				'sort_order'	=> $value['sort_order'],
				'data'			=> 'new'
			);
		}
		$this->model_rgen_rgencustom->addRGenSetting("rgen_custom", $this->data['rgen_setting']);
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_setting'], TRUE) . "</pre>";
	}

	public function getmodule() {
		$this->commonData();
		//echo "<pre style='color:;'>" . print_r($this->data['modules'], TRUE) . "</pre>";
		
		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];
			$this->data['get_module'] = $this->model_rgen_rgencustom->getRGenValue($mod_name);
			if ($this->model_rgen_rgencustom->descriptionGet($mod_name)) {
				if (!isset($this->data['get_module'][$mod_name]['title'])) {
					$this->data['get_module'][$mod_name]['title'] = $this->model_rgen_rgencustom->titleGet($mod_name);
				}
				$this->data['get_module'][$mod_name]['description'] = $this->model_rgen_rgencustom->descriptionGet($mod_name);
			}

			$this->data['modules'] = $this->data['get_module'];
			$this->categoriesAuto();
			$this->productsAuto();
			$this->manufacturerAuto();
			$this->informationAuto();

			$this->template = 'module/rgen_custom_data.tpl';
			$this->response->setOutput($this->render());
		}
	}

	public function add(){
		$this->commonData();

		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];

			/* Module rows
			******************************/
			$this->template = 'module/rgen_custom_add.tpl';
			$this->response->setOutput($this->render());
		}
	}

	public function create(){
		$this->load->model('rgen/rgencustom');

		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				//echo "<pre style='color:;'>" . print_r($this->request->post, TRUE) . "</pre>";
				/*$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post[$mod_name]['title']);
				$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post[$mod_name]['description']);*/
				$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post[$mod_name]);
				unset($this->request->post[$mod_name]['title']);
				unset($this->request->post[$mod_name]['description']);
				$this->model_rgen_rgencustom->insertRGen("rgen_custom", $this->request->post);
				$this->add_entry();
			}
		}
	}

	public function edit(){
		$this->load->model('rgen/rgencustom');
		$this->load->model('setting/setting');

		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];

			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				if (isset($this->request->post)) {
					/*$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post['title']);
					$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post['description']);*/
					$this->model_rgen_rgencustom->descriptionEdit($mod_name, "rgen_custom", $this->request->post);
					unset($this->request->post['title']);
					unset($this->request->post['description']);
					$this->model_rgen_rgencustom->editRGenValue("rgen_custom", $mod_name, $this->request->post);
					$this->add_entry();

				}
			}
			
		}
	}

	public function delete(){
		$this->load->model('rgen/rgencustom');

		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];
			//echo "<pre style='color:;'>" . print_r($mod_name, TRUE) . "</pre>";
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				$this->model_rgen_rgencustom->deleteRGenValue($mod_name);
				$this->model_rgen_rgencustom->descriptionDelete($mod_name);
				$this->add_entry();
			}
		}
	}

	public function clearCache() {
		$this->load->library('rgen/rgen_lib');
		if (isset($this->request->get['name'])) {
			//echo "<pre>".print_r($this->request->get['name'],true)."</pre>";
			$this->rgen->removeAll($this->config->get('config_template'), $this->request->get['name']);	
		}
	}

	public function categoriesAuto() {
		/*********************************************************************/
		// Categories
		$this->load->model('catalog/category');
		$this->data['rgen_catlist'] = array();
		
		foreach ($this->data['modules'] as $catarry) {
			if (isset($catarry['category'])) {
				foreach ($catarry['category'] as $cat) {
					$category_info = $this->model_catalog_category->getCategory($cat);
					if ($category_info) {
						$this->data['rgen_catlist'][$catarry['mod_id']][] = array(
							'category_id' => $category_info['category_id'],
							'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
						);	
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_catlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function productsAuto() {
		/*********************************************************************/
		// Products
		$this->load->model('catalog/product');
		$this->data['rgen_prdlist'] = array();
		
		foreach ($this->data['modules'] as $prdarry) {
			if (isset($prdarry['prd'])) {
				foreach ($prdarry['prd'] as $prd) {
					$prd_info = $this->model_catalog_product->getProduct($prd);
					if ($prd_info) {
						$this->data['rgen_prdlist'][$prdarry['mod_id']][] = array(
							'product_id' => $prd_info['product_id'],
							'name'        => $prd_info['name']
						);	
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_prdlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function manufacturerAuto() {
		/*********************************************************************/
		// Manufacturer 
		$this->load->model('catalog/manufacturer');
		$this->data['rgen_brandlist'] = array();
		
		foreach ($this->data['modules'] as $brdarry) {
			if (isset($brdarry['brand'])) {
				foreach ($brdarry['brand'] as $brd) {
					$brand_info = $this->model_catalog_manufacturer->getManufacturer($brd);
					if ($brand_info) {
						$this->data['rgen_brandlist'][$brdarry['mod_id']][] = array(
							'manufacturer_id' 	=> $brand_info['manufacturer_id'],
							'name'      		=> $brand_info['name']
						);	
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_brandlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}
	public function informationAuto() {
		/*********************************************************************/
		// Information
		$this->load->model('catalog/information');
		$this->data['rgen_infolist'] = array();
		
		foreach ($this->data['modules'] as $infoarry) {
			if (isset($infoarry['info'])) {
				foreach ($infoarry['info'] as $info) {
					$information_info = $this->model_catalog_information->getInfoPage($info);
					if ($information_info) {
						$this->data['rgen_infolist'][$infoarry['mod_id']][] = array(
							'information_id' 	=> $information_info['information_id'],
							'name'      		=> $information_info['title']
						);
					}
				}
			}
		}
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_infolist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function commonData() {
		$this->load->model('rgen/rgencustom');
		$this->language->load('module/rgen_custom');

		/* Image tools
		******************************/
		$this->load->model('tool/image');
		$this->data['no_img'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		
		/* Language arrays
		******************************/
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
				'button_remove',
				'tab_module',
				'entry_class',
				'entry_title',
				'entry_description',
				'ver'
		);
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}

		$this->load->model('design/layout');
		$this->data['layoutlist'] = $this->model_design_layout->getLayouts();
		foreach ($this->data['layoutlist'] as $value) {

			$this->data['layouts'][] = array(
				'layout_id'	=>	$value['layout_id'],
				'name' 		=>	$value['name'],
				'route'		=>	$this->model_design_layout->getLayoutRoutes($value['layout_id'])
			);
		}
		$this->data['layouts'][] = array('layout_id'=>99999, 'name' => "All pages", 'route' => "");

		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		$this->data['token'] = $this->session->data['token'];

		/* Module rows
		******************************/
		/*$this->data['module_row'] = count($this->model_rgen_rgencustom->getRGen("rgen_custom"));
		$this->data['module_row']++;*/
		$this->data['module_row'] = $this->model_rgen_rgencustom->LastID();
		if ($this->data['module_row']) {
			$this->data['module_row']++;
		}else{
			$this->data['module_row'] = 1;
		}
		//echo "<pre style='color:;'> Return last key row ==> " . print_r($this->data['module_row'], TRUE) . "</pre>";
		
		
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/rgen_custom')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>