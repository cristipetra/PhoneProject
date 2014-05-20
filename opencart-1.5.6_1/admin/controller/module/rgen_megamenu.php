<?php
class ControllerModuleRGenMegaMenu extends Controller {
	
	private $error = array();

	// Custom html variables
	private $t = 'htmlData_top';
	private $r = 'htmlData_right';
	private $b = 'htmlData_bottom';
	private $l = 'htmlData_left';

	/********************************************
	CREATE TABLE FOR RGEN DB */
	public function install() {
		$this->load->model('rgen/rgenmegamenu');
		$this->model_rgen_rgenmegamenu->install();
		$this->model_rgen_rgenmegamenu->installDataTable();
	}
	/*********************************************/

	public function index() {
		$this->install();
		$this->commonData();

		// COLOUR PICKER FILES
		$this->document->addStyle('view/stylesheet/jquery.colorpicker.css');
		$this->document->addScript('view/javascript/jquery/jquery.colorpicker.js');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->data['modules'] = $this->data['rgen_megamenu'];

		//echo "<pre style='color:;'>" . print_r($this->data['modules'], TRUE) . "</pre>";

		$this->template = 'module/rgen_megamenu.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		$this->response->setOutput($this->render());
	}

	public function rgenModule(){
		$this->commonData();

		$this->data['mod_id'] = $this->model_rgen_rgenmegamenu->LastID();
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

		$this->data['mod_id'] = $this->model_rgen_rgenmegamenu->LastID();
		if ($this->data['mod_id']) {
			$this->data['mod_id']++;
		}else{
			$this->data['mod_id'] = 1;
		}
		//echo "<pre style='color:;'>" . print_r($this->data['mod_id'], TRUE) . "</pre>";

		$this->template = 'module/rgen_megamenu_form.tpl';
		$this->response->setOutput($this->render());
	}

	public function getmodule() {
		$this->commonData();
		if (isset($this->request->get['mod_name'])) {

			$this->data['mod_name'] = $this->request->get['mod_name'];
			$this->data['get_module'] = $this->model_rgen_rgenmegamenu->getRGenValue($this->data['mod_name']);

			//echo "<pre style='color:;'>" . print_r($this->data['get_module'], TRUE) . "</pre>";
			// Mearging Custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-htmlData')) {
				$this->data['get_module'][$this->data['mod_name']]['custom_html']['htmlData'] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-htmlData');
			}
			// Mearging Products custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-t')) {
				$this->data['get_module'][$this->data['mod_name']]['products'][$this->t] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-t');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-r')) {
				$this->data['get_module'][$this->data['mod_name']]['products'][$this->r] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-r');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-b')) {
				$this->data['get_module'][$this->data['mod_name']]['products'][$this->b] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-b');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-l')) {
				$this->data['get_module'][$this->data['mod_name']]['products'][$this->l] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-products-l');
			}
			// Mearging Brands custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-t')) {
				$this->data['get_module'][$this->data['mod_name']]['brands'][$this->t] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-t');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-r')) {
				$this->data['get_module'][$this->data['mod_name']]['brands'][$this->r] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-r');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-b')) {
				$this->data['get_module'][$this->data['mod_name']]['brands'][$this->b] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-b');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-l')) {
				$this->data['get_module'][$this->data['mod_name']]['brands'][$this->l] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-brands-l');
			}
			// Mearging Categry mega custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-t')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_mega'][$this->t] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-t');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-r')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_mega'][$this->r] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-r');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-b')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_mega'][$this->b] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-b');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-l')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_mega'][$this->l] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_mega-l');
			}
			// Mearging Categry normal custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-t')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_normal'][$this->t] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-t');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-r')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_normal'][$this->r] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-r');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-b')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_normal'][$this->b] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-b');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-l')) {
				$this->data['get_module'][$this->data['mod_name']]['cat_normal'][$this->l] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-cat_normal-l');
			}
			// Mearging dropdown custom HTML data 
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-t')) {
				$this->data['get_module'][$this->data['mod_name']]['dropdown'][$this->t] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-t');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-r')) {
				$this->data['get_module'][$this->data['mod_name']]['dropdown'][$this->r] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-r');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-b')) {
				$this->data['get_module'][$this->data['mod_name']]['dropdown'][$this->b] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-b');
			}
			if ($this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-l')) {
				$this->data['get_module'][$this->data['mod_name']]['dropdown'][$this->l] = $this->model_rgen_rgenmegamenu->descriptionGet($this->data['mod_name'].'-dropdown-l');
			}
			//echo "<pre style='color:;'>" . print_r($this->data['get_module'], TRUE) . "</pre>";

			// Main data array
			$this->data['modules'] = $this->data['get_module'];

			// Category list
			if (isset($this->data['get_module'][$this->data['mod_name']]['cat_normal']['cat_id'])) {
				$this->data['cat_normal_list'] = $this->data['get_module'][$this->data['mod_name']]['cat_normal']['cat_id'];
				$this->categoriesAuto();
			}
			if (isset($this->data['get_module'][$this->data['mod_name']]['cat_mega']['cat_id'])) {
				$this->data['cat_normal_list'] = $this->data['get_module'][$this->data['mod_name']]['cat_mega']['cat_id'];
				$this->categoriesAuto();
			}

			// Brand list
			if (isset($this->data['get_module'][$this->data['mod_name']]['brands']['brand_id'])) {
				$this->data['brand_list'] = $this->data['get_module'][$this->data['mod_name']]['brands']['brand_id'];
				$this->manufacturerAuto();
			}

			// Product list
			if (isset($this->data['get_module'][$this->data['mod_name']]['products']['prd_id'])) {
				$this->data['product_list'] = $this->data['get_module'][$this->data['mod_name']]['products']['prd_id'];
				$this->productsAuto();
			}

			$this->template = 'module/rgen_megamenu_data.tpl';
			$this->response->setOutput($this->render());
		}
		//echo "<pre style='color:;'>" . print_r($this->data['module_row'], TRUE) . "</pre>";
	}

	public function save(){
		$this->load->model('rgen/rgenmegamenu');
		$this->load->model('setting/setting');

		/*if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->data['getThemeName'] = $this->request->post['RGen_themeSettings'];
			$this->model_setting_setting->editSetting('rgen_theme', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('module/rgen_theme', 'token=' . $this->session->data['token'], 'SSL'));
			$this->savetheme();
			echo "<pre style='color:;'>" . print_r($this->request->server['REQUEST_METHOD'] == 'GET', TRUE) . "</pre>";
		}*/

		$this->data['mod_id'] = $this->model_rgen_rgenmegamenu->LastID();
		if ($this->data['mod_id']) {
			$this->data['mod_id']++;
		}else{
			$this->data['mod_id'] = 1;
		}
		
		if (isset($this->request->get['mod_name'])) {
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				
				if (isset($this->request->get['mod_status'])) {
					$mgStatus['rgen_megamenu_status'] = array("rgen_megamenu_status" => '0');
					$this->model_setting_setting->editSetting('rgen_megamenu', $mgStatus['rgen_megamenu_status']);
				}else{
					$this->model_setting_setting->editSetting('rgen_megamenu', $this->request->post['rgen_megamenu_status']);
					unset($this->request->post['rgen_megamenu_status']);
				}
				//echo "<pre style='color:;'>" . print_r($this->request->post, TRUE) . "</pre>";
				
				//echo "<pre style='color:;'>" . print_r($this->request->post, TRUE) . "</pre>";

				// Save custom html data
				$postData = $this->request->get['mod_name'];
				$this->saveCustomHTML($postData);
				$this->saveProductsHTML($postData);
				$this->saveBrandsHTML($postData);
				$this->saveCatMegaHTML($postData);
				$this->saveCatNormalHTML($postData);
				$this->saveDropdownHTML($postData);

				//$this->model_setting_setting->editSetting('rgen_megamenu', $this->request->post['rgen_megamenu_status']);

				$this->model_rgen_rgenmegamenu->editRGenValue('rgen_megamenu', $this->request->get['mod_name'], $this->request->post[$this->request->get['mod_name']]);
			}
		}else{
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
				
				if (isset($this->request->get['mod_status'])) {
					$mgStatus['rgen_megamenu_status'] = array("rgen_megamenu_status" => '0');
					$this->model_setting_setting->editSetting('rgen_megamenu', $mgStatus['rgen_megamenu_status']);
				}else{
					$this->model_setting_setting->editSetting('rgen_megamenu', $this->request->post['rgen_megamenu_status']);
					unset($this->request->post['rgen_megamenu_status']);
				}

				// Save custom html data
				//echo "<pre style='color:;'>" . print_r($this->request->post, TRUE) . "</pre>";
				$postData = key($this->request->post);
				//echo "<pre style='color:;'>Get first key of array ==> " . print_r($postData, TRUE) . "</pre>";
				$this->saveCustomHTML($postData);
				$this->saveProductsHTML($postData);
				$this->saveBrandsHTML($postData);
				$this->saveCatMegaHTML($postData);
				$this->saveCatNormalHTML($postData);
				$this->saveDropdownHTML($postData);

				$this->model_rgen_rgenmegamenu->insertRGen('rgen_megamenu', $this->request->post);
				$mod_name = $this->request->post;
			}
		}
		
	}
	public function saveCustomHTML($postData){
		if (isset($this->request->post[$postData]['custom_html']['htmlData']) && $this->request->post[$postData]['menu_type'] == 'custom_html') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-htmlData','rgen_megamenu', $this->request->post[$postData]['custom_html']['htmlData']);
			unset($this->request->post[$postData]['custom_html']['htmlData']);
		}
	}
	public function saveProductsHTML($postData){
		if (isset($this->request->post[$postData]['products'][$this->t]) && $this->request->post[$postData]['menu_type'] == 'products') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-products-t','rgen_megamenu', $this->request->post[$postData]['products'][$this->t]);
			unset($this->request->post[$postData]['products'][$this->t]);
		}
		if (isset($this->request->post[$postData]['products'][$this->r]) && $this->request->post[$postData]['menu_type'] == 'products') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-products-r','rgen_megamenu', $this->request->post[$postData]['products'][$this->r]);
			unset($this->request->post[$postData]['products'][$this->r]);
		}
		if (isset($this->request->post[$postData]['products'][$this->b]) && $this->request->post[$postData]['menu_type'] == 'products') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-products-b','rgen_megamenu', $this->request->post[$postData]['products'][$this->b]);
			unset($this->request->post[$postData]['products'][$this->b]);
		}
		if (isset($this->request->post[$postData]['products'][$this->l]) && $this->request->post[$postData]['menu_type'] == 'products') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-products-l','rgen_megamenu', $this->request->post[$postData]['products'][$this->l]);
			unset($this->request->post[$postData]['products'][$this->l]);
		}
	}
	public function saveBrandsHTML($postData){
		if (isset($this->request->post[$postData]['brands'][$this->t]) && $this->request->post[$postData]['menu_type'] == 'brands') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-brands-t','rgen_megamenu', $this->request->post[$postData]['brands'][$this->t]);
			unset($this->request->post[$postData]['brands'][$this->t]);
		}
		if (isset($this->request->post[$postData]['brands'][$this->r]) && $this->request->post[$postData]['menu_type'] == 'brands') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-brands-r','rgen_megamenu', $this->request->post[$postData]['brands'][$this->r]);
			unset($this->request->post[$postData]['brands'][$this->r]);
		}
		if (isset($this->request->post[$postData]['brands'][$this->b]) && $this->request->post[$postData]['menu_type'] == 'brands') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-brands-b','rgen_megamenu', $this->request->post[$postData]['brands'][$this->b]);
			unset($this->request->post[$postData]['brands'][$this->b]);
		}
		if (isset($this->request->post[$postData]['brands'][$this->l]) && $this->request->post[$postData]['menu_type'] == 'brands') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-brands-l','rgen_megamenu', $this->request->post[$postData]['brands'][$this->l]);
			unset($this->request->post[$postData]['brands'][$this->l]);
		}
	}
	public function saveCatMegaHTML($postData){
		if (isset($this->request->post[$postData]['cat_mega'][$this->t]) && $this->request->post[$postData]['menu_type'] == 'cat_mega') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_mega-t','rgen_megamenu', $this->request->post[$postData]['cat_mega'][$this->t]);
			unset($this->request->post[$postData]['cat_mega'][$this->t]);
		}
		if (isset($this->request->post[$postData]['cat_mega'][$this->r]) && $this->request->post[$postData]['menu_type'] == 'cat_mega') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_mega-r','rgen_megamenu', $this->request->post[$postData]['cat_mega'][$this->r]);
			unset($this->request->post[$postData]['cat_mega'][$this->r]);
		}
		if (isset($this->request->post[$postData]['cat_mega'][$this->b]) && $this->request->post[$postData]['menu_type'] == 'cat_mega') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_mega-b','rgen_megamenu', $this->request->post[$postData]['cat_mega'][$this->b]);
			unset($this->request->post[$postData]['cat_mega'][$this->b]);
		}
		if (isset($this->request->post[$postData]['cat_mega'][$this->l]) && $this->request->post[$postData]['menu_type'] == 'cat_mega') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_mega-l','rgen_megamenu', $this->request->post[$postData]['cat_mega'][$this->l]);
			unset($this->request->post[$postData]['cat_mega'][$this->l]);
		}
	}
	public function saveCatNormalHTML($postData){
		if (isset($this->request->post[$postData]['cat_normal'][$this->t]) && $this->request->post[$postData]['menu_type'] == 'cat_normal') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_normal-t','rgen_megamenu', $this->request->post[$postData]['cat_normal'][$this->t]);
			unset($this->request->post[$postData]['cat_normal'][$this->t]);
		}
		if (isset($this->request->post[$postData]['cat_normal'][$this->r]) && $this->request->post[$postData]['menu_type'] == 'cat_normal') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_normal-r','rgen_megamenu', $this->request->post[$postData]['cat_normal'][$this->r]);
			unset($this->request->post[$postData]['cat_normal'][$this->r]);
		}
		if (isset($this->request->post[$postData]['cat_normal'][$this->b]) && $this->request->post[$postData]['menu_type'] == 'cat_normal') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_normal-b','rgen_megamenu', $this->request->post[$postData]['cat_normal'][$this->b]);
			unset($this->request->post[$postData]['cat_normal'][$this->b]);
		}
		if (isset($this->request->post[$postData]['cat_normal'][$this->l]) && $this->request->post[$postData]['menu_type'] == 'cat_normal') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-cat_normal-l','rgen_megamenu', $this->request->post[$postData]['cat_normal'][$this->l]);
			unset($this->request->post[$postData]['cat_normal'][$this->l]);
		}
	}
	public function saveDropdownHTML($postData){
		if (isset($this->request->post[$postData]['dropdown'][$this->t]) && $this->request->post[$postData]['menu_type'] == 'dropdown') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-dropdown-t','rgen_megamenu', $this->request->post[$postData]['dropdown'][$this->t]);
			unset($this->request->post[$postData]['dropdown'][$this->t]);
		}
		if (isset($this->request->post[$postData]['dropdown'][$this->r]) && $this->request->post[$postData]['menu_type'] == 'dropdown') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-dropdown-r','rgen_megamenu', $this->request->post[$postData]['dropdown'][$this->r]);
			unset($this->request->post[$postData]['dropdown'][$this->r]);
		}
		if (isset($this->request->post[$postData]['dropdown'][$this->b]) && $this->request->post[$postData]['menu_type'] == 'dropdown') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-dropdown-b','rgen_megamenu', $this->request->post[$postData]['dropdown'][$this->b]);
			unset($this->request->post[$postData]['dropdown'][$this->b]);
		}
		if (isset($this->request->post[$postData]['dropdown'][$this->l]) && $this->request->post[$postData]['menu_type'] == 'dropdown') {
			$this->model_rgen_rgenmegamenu->descriptionEdit($postData.'-dropdown-l','rgen_megamenu', $this->request->post[$postData]['dropdown'][$this->l]);
			unset($this->request->post[$postData]['dropdown'][$this->l]);
		}
	}


	public function delete(){
		$this->load->model('rgen/rgenmegamenu');
		if (isset($this->request->get['mod_name'])) {
			$mod_name = $this->request->get['mod_name'];
		
			// Removing module
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){

				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-htmlData');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-products-t');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-products-r');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-products-b');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-products-l');	
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-brands-t');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-brands-r');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-brands-b');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-brands-l');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_mega-t');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_mega-r');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_mega-b');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_mega-l');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_normal-t');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_normal-r');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_normal-b');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-cat_normal-l');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-dropdown-t');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-dropdown-r');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-dropdown-b');
				$this->model_rgen_rgenmegamenu->descriptionDelete($mod_name.'-dropdown-l');

				$this->model_rgen_rgenmegamenu->deleteRGenValue($mod_name);
			}
		}
	}

	public function commonData() {

		$this->load->model('rgen/rgenmegamenu');
		$this->data['rgen_megamenu'] = $this->model_rgen_rgenmegamenu->getRGen('rgen_megamenu');

		// Theme version
		$this->data['version'] = $this->config->get('rgen_theme_version');
		$this->data['mod'] = $this->language->get('mod');
		$this->data['ver'] = $this->language->get('ver');
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';

		$this->load->language('module/rgen_megamenu');
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
				'entry_example' //this is an example extra field added
		);
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}
		//END LANGUAGE

		//This creates an error message. The error['warning'] variable is set by the call to function validate() in this controller (below)
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
			'href'      => $this->url->link('module/rgen_megamenu', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/rgen_megamenu', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_megamenu');

		$this->data['mod_count'] = count($this->model_rgen_rgenmegamenu->getRGen('rgen_megamenu'));
		$this->data['mod_count']++;	
	}
	
	public function categoriesAuto() {
		/*********************************************************************/
		// Categories
		$this->load->model('catalog/category');
		$selectedCat = $this->data['cat_normal_list'];
		$this->data['rgen_catlist'] = array();
		
		if (isset($selectedCat)) {
			foreach ($selectedCat as $catarry) {
				if (isset($catarry)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$category_info = $this->model_catalog_category->getCategory($catarry);
					if ($category_info) {
						$this->data['rgen_catlist'][] = array(
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
		$selectedPrd = $this->data['product_list'];
		$this->data['rgen_prdlist'] = array();

		if (isset($selectedPrd)) {
			foreach ($selectedPrd as $prd) {
				if (isset($prd)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$prd_info = $this->model_catalog_product->getProduct($prd);
					if ($prd_info) {
						$this->data['rgen_prdlist'][] = array(
							'product_id' => $prd_info['product_id'],
							'name'       => $prd_info['name']
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
		$selectedBrand = $this->data['brand_list'];
		$this->data['rgen_brandlist'] = array();

		if (isset($selectedBrand)) {
			foreach ($selectedBrand as $brdarry) {
				if (isset($brdarry)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$brand_info = $this->model_catalog_manufacturer->getManufacturer($brdarry);
					if ($brand_info) {
						$this->data['rgen_brandlist'][] = array(
							'manufacturer_id' => $brand_info['manufacturer_id'],
							'name'        => $brand_info['name']
						);	
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_brandlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function clearCache() {
		$this->load->library('rgen/rgen_lib');
		if (isset($this->request->get['name'])) {
			$this->rgen->removeAll($this->config->get('config_template'), $this->request->get['name']);	
		}
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/rgen_megamenu')) {
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