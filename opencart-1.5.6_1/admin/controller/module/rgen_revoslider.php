<?php
class ControllerModuleRGenRevoSlider extends Controller {

	private $error = array(); 

	/********************************************
	CREATE TABLE FOR RGEN DB */
	public function install() {
		$this->load->model('rgen/rgenrevoslider');
		$this->model_rgen_rgenrevoslider->install();
	}
	/*********************************************/
	
	/* Module index
	******************************/
	public function index() {
		// Theme version
		$this->data['version'] = $this->config->get('rgen_theme_version');
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';
		
		$this->install();

		$this->commonData();
		
		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('rgen_revoslider', $this->request->post);		
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		/* Links
		******************************/
		$this->data['create'] = $this->url->link('module/rgen_revoslider/manageslider', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['manage'] = $this->url->link('module/rgen_revoslider/sliderlist', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['action'] = $this->url->link('module/rgen_revoslider', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

	
		$this->data['modules'] = array();
		if (isset($this->request->post['rgen_revoslider_module'])) {
			$this->data['modules'] = $this->request->post['rgen_revoslider_module'];
		} elseif ($this->config->get('rgen_revoslider_module')) { 
			$this->data['modules'] = $this->config->get('rgen_revoslider_module');
		}

		/* Slider list
		******************************/
		$this->data['sliderlist'] = array();
		$this->load->model('rgen/rgenrevoslider');
		$results = $this->model_rgen_rgenrevoslider->getRGen("rgen_revoslider");
		foreach ($results as $result) {
			$this->data['sliderlist'][] = array(
				'slidername' => $result['sliderName'],
				'mod_id' => $result['mod_id']
			);
		}

		/* Layouts
		******************************/
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		//Choose which template file will be used to display this request.
		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_revoslider');
		
		$this->template = 'module/rgen_revoslider.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		$this->response->setOutput($this->render());
	}


	/* Slider list
	******************************/
	public function sliderlist() {
		$this->commonData();
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';
		
		/* Breadcrumbs arrays
		******************************/
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
			'href'      => $this->url->link('module/rgen_revoslider', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->load->model('rgen/rgenrevoslider');
		$this->data['module_row'] = $this->model_rgen_rgenrevoslider->LastID();
		if ($this->data['module_row']) {
			$this->data['module_row']++;
		}else{
			$this->data['module_row'] = 1;
		};
		

		/* Links
		******************************/
		$this->data['create'] = $this->url->link('module/rgen_revoslider/slider', 'token=' . $this->session->data['token'] . '&mod_id=revoslider_module' . $this->data['module_row'], 'SSL');
		$this->data['action'] = $this->url->link('module/rgen_revoslider', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('module/rgen_revoslider', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		/* Slider list
		******************************/
		$this->data['sliderlist'] = array();
		$this->load->model('rgen/rgenrevoslider');

		// Data sorting
		$data = $this->model_rgen_rgenrevoslider->getRGen("rgen_revoslider");		
		$sort_order = array();
		foreach ($data as $key => $value) {
			$parts = explode('rgen_custom_module', (string)$value['mod_id']);
			$this->data['sort_data'] = (int)array_pop($parts);
			$sort_order[$key] = $this->data['sort_data'];
		}
		array_multisort($sort_order, SORT_ASC, $data);

		$results = $data;
		foreach ($results as $result) {
			$this->data['sliderlist'][] = array(
				'slidername'	=> $result['sliderName'],
				'mod_id'		=> $result['mod_id'],
				'edit'			=> $this->url->link('module/rgen_revoslider/slider', 'token=' . $this->session->data['token'] . '&mod_id=' . $result['mod_id'], 'SSL'),
				'delete'		=> $this->url->link('module/rgen_revoslider/delete', 'token=' . $this->session->data['token'] . '&mod_id=' . $result['mod_id'], 'SSL')
			);
		}

		//echo "<pre style='color:;'>" . print_r($this->data['sliderlist'], TRUE) . "</pre>";
		//echo "<pre style='color:;'>" . print_r($this->data['sliderlist'], TRUE) . "</pre>";

		$this->template = 'module/rgen_revoslider_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		$this->response->setOutput($this->render());
	}

	/* Delete module
	******************************/
	public function delete() {
		$this->load->model('rgen/rgenrevoslider');
		$this->load->language('module/rgen_revoslider');

		if (isset($this->request->get['mod_id'])) {
			$this->data['mod_id'] = $this->request->get['mod_id'];
		}
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_rgen_rgenrevoslider->deleteRGenValue($this->data['mod_id']);
			$this->session->data['text_delete'] = $this->language->get('text_delete');
		}
	}

	/* Edit slider
	******************************/
	public function slider() {

		// Loading module data
		$this->commonData();
		$this->get_slider();

		// Slider counter
		$this->data['count'] = count($this->model_rgen_rgenrevoslider->getRGen('rgen_revoslider'))+1;
		
		// Module row
		$this->load->model('rgen/rgenrevoslider');
		$this->data['module_row'] = $this->model_rgen_rgenrevoslider->LastID();
		if ($this->data['module_row']) {
			$this->data['module_row']++;
		}else{
			$this->data['module_row'] = 1;
		};
		
		// Links
		$this->data['stylemanager'] = $this->url->link('module/rgen_revoslider/stylebuilder', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['sliderlist'] = $this->url->link('module/rgen_revoslider/sliderlist', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('module/rgen_revoslider/sliderlist', '&token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		// Caption style data
		$this->data['cpstyles'] = $this->model_rgen_rgenrevoslider->getRGen("revo_cp_styles");
		foreach ($this->data['cpstyles'] as $cpstyle) {
			if(isset($cpstyle['fonturl'])){
			$this->document->addStyle($cpstyle['fonturl']);
			}

		}

		// Back URL
		/*$url = $this->request['QUERY_STRING'];
		echo "<pre style='color:;'>" . print_r("index.php?".$url, TRUE) . "</pre>";*/
		//echo "<pre style='color:;'>" . print_r("index.php?".$this->request->server['QUERY_STRING'], TRUE) . "</pre>";
		$_SESSION['backURL'] = "index.php?".$this->request->server['QUERY_STRING'];
		/*if ($checkURL) {
			$_SESSION['backURL'] = $checkURL;
		}else{
			$_SESSION['backURL'] = $this->data['saveslider'];
		}*/

		// Permission checker
		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_revoslider');

		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';
		
		// Module template
		$this->template = 'module/rgen_revoslider_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
		
	}


	/* Sorting slide and captions
	******************************/
	public function sortData($sorting){
		if (isset($sorting)) {
			if (isset($sorting['slides'])) {
				// Sorting slides
				foreach ($sorting['slides'] as $sl_key => $sl_value) {
					$sl_sort_order[$sl_key] = $sl_value['sort_order'];
				}
				array_multisort($sl_sort_order, SORT_ASC, $sorting['slides']);

				// Create new array for captions
				$newCpArray = array();
				if (isset($sorting['slides'])) {
					foreach ($sorting['slides'] as $sl_key => $sl_value) { 
						if(isset($sl_value['captions'])){
						$newCpArray['s'.$sl_key.'_cp'] = $sl_value['captions']; 
						}
					}
				}

				// Sorting new caption array 
				$i=0;
				foreach ($newCpArray as $result) {
					$cp_sort_order = array();
					if(isset($newCpArray['s'.$i.'_cp'])){
						foreach ($newCpArray['s'.$i.'_cp'] as $cp_key => $cp_value) {
							$cp_sort_order[$cp_key] = isset($cp_value['sort_order']) ? $cp_value['sort_order'] :null;
						}
						array_multisort($cp_sort_order, SORT_ASC, $newCpArray['s'.$i.'_cp']);	
					}
					$i++; 
				}

				// Assign new caption array to main array
				$s=0;
				if (isset($sorting['slides'])) {
				foreach ($sorting['slides'] as $result) {
					if (isset($newCpArray['s'.$s.'_cp'])) {
						$result['captions'] = $newCpArray['s'.$s.'_cp'];	
					}
					$newSlideArray[] = $result;
					$s++; 
				}
				}
				$sorting['slides'] = $newSlideArray;
			}
		}
		return $sorting;
	}

	/* Edit slider
	******************************/
	public function stylebuilder() {
		$this->commonData();

		$this->load->model('rgen/rgenrevoslider');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_rgen_rgenrevoslider->editCpStyle('revo_cp_styles', $this->request->post);
			//echo "<pre style='color:;'>" . print_r($this->request->post, TRUE) . "</pre>";
			//$this->model_rgen_rgenrevoslider->editRGenValue($this->request->get['mod_id'], $this->request->post['mod_id']);
			$this->session->data['success'] = $this->language->get('text_success');
			if (isset($this->request->get['mod_id'])) {
				$this->redirect($this->url->link('module/rgen_revoslider/editslider', 'token=' . $this->session->data['token'] . '&mod_id=' . $this->request->get['mod_id'], 'SSL'));
			}
		}
		
		/* Links
		******************************/
		$this->data['token'] = $this->session->data['token'];
		

		/* Caption style data
		******************************/
		$this->data['cpstyles'] = $this->model_rgen_rgenrevoslider->getRGen("revo_cp_styles");

		if ($this->data['cpstyles']) {
			foreach ($this->data['cpstyles'] as $sty_key => $sty_value) {
				$sty_key_val = explode('style', $sty_key);
				$sty_sort_order[] = $sty_key_val[1];
			}
			array_multisort($sty_sort_order, SORT_ASC, $this->data['cpstyles']);
		}
		

		// echo "<pre style='color:;'>" . print_r($this->config->get('revo_cp_styles'), TRUE) . "</pre>";

		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_revoslider');

		$this->template = 'module/rgen_stylebuilder.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	public function commonData() {
		$this->load->language('module/rgen_revoslider');
		$this->document->setTitle($this->language->get('heading_title'));

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
				'ver'
		);
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		/* Breadcrumbs arrays
		******************************/
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
			'href'      => $this->url->link('module/rgen_revoslider', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		/* Languages
		******************************/
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		/* Image tools
		******************************/
		$this->load->model('tool/image');
		$this->data['no_img'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
	}

	public function arrayData(){
		//$module_row;
		$this->data['lng_id'] = $this->config->get('config_language_id');
		$json = file_get_contents("view/image/rgen_theme/webfonts.json", true);
		$decode = json_decode($json, true);
		$this->data['webfonts'] = array();
		foreach ($decode['items'] as $key => $value) {
			// FONT FAMILY
			$item_family = $decode['items'][$key]['family'];
			$item_family_trunc =  str_replace(' ','+',$item_family);
			$webfonts[$item_family_trunc] = $item_family;
		}
		//print_r ($default);
		$this->data['defaultFont'] = array( 
			'Arial', 
			'Verdana', 
			'Helvetica', 
			'Lucida Grande', 
			'Trebuchet MS', 
			'Times New Roman', 
			'Tahoma', 
			'Georgia'
			);
		$this->data['FontCase'] = array(
			'Select case' 	=> '', 
			'None' 		=> 'none', 
			'Inherit'	=> 'inherit', 
			'Capitalize'=> 'capitalize', 
			'Lowercase' => 'lowercase', 
			'Uppercase' => 'uppercase'
			);

		$this->data['sliderType'] = array('Normal' => 'normal', 'Full page width' => 'fpw', 'Full window width' => 'fw', 'Full screen' => 'fs');
		$this->data['captionType'] = array( 'Text' => 'text', 'Image' => 'image', 'Video' => 'video');
		$this->data['captionData'] = array( 'Common' => 'common', 'Multi language' => 'multi-l');
		$this->data['yesNo'] = array( 'Yes' => 'yes', 'No' => 'no');
		$this->data['posType'] = array( 'Absolute' => 'absolute', 'Offset' => 'offset');
		$this->data['offsetX'] = array( 'Left' => 'left', 'Center' => 'center', 'Right' => 'right');
		$this->data['offsetY'] = array( 'Top' => 'top', 'Center' => 'center', 'Bottom' => 'bottom');
		$this->data['bgrepeat'] = array( 'no-repeat', 'repeat', 'repeat-x', 'repeat-y');
		$this->data['bgfit'] = array( 'cover', 'contain', 'normal');
		$this->data['bgposition'] = array( 'left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom');
		$this->data['transition'] = array(
				'Slide To Top'								=> 'slidetop',
				'Slide To Bottom'							=> 'slidebottom',
				'Slide To Right'							=> 'slideright',
				'Slide To Left'								=> 'slideleft',
				'Slide Horizontal'						 	=> 'slidehorizontal',
				'Slide Vertical'							=> 'slidevertical',
				'Slide Boxes'								=> 'boxslide',
				'Slide Slots Horizontal'					=> 'slotslide-horizontal',
				'Slide Slots Vertical'						=> 'slotslide-vertical',
				'Fade Boxes'								=> 'boxfade',
				'Fade Slots Horizontal'						=> 'slotfade-horizontal',
				'Fade Slots Vertical'						=> 'slotfade-vertical',
				'Fade and Slide from Right'					=> 'fadefromright',
				'Fade and Slide from Left'					=> 'fadefromleft',
				'Fade and Slide from Top'					=> 'fadefromtop',
				'Fade and Slide from Bottom'				=> 'fadefrombottom',
				'Fade To Left and Fade From Right'			=> 'fadetoleftfadefromright',
				'Fade To Right and Fade From Left'			=> 'fadetorightfadefromleft',
				'Fade To Top and Fade From Bottom'			=> 'fadetotopfadefrombottom',
				'Fade To Bottom and Fade From Top'			=> 'fadetobottomfadefromtop',
				'Parallax to Right'							=> 'parallaxtoright',
				'Parallax to Left'							=> 'parallaxtoleft',
				'Parallax to Top'							=> 'parallaxtotop',
				'Parallax to Bottom'						=> 'parallaxtobottom',
				'Zoom Out and Fade From Right'				=> 'scaledownfromright',
				'Zoom Out and Fade From Left'				=> 'scaledownfromleft',
				'Zoom Out and Fade From Top'				=> 'scaledownfromtop',
				'Zoom Out and Fade From Bottom'				=> 'scaledownfrombottom',
				'ZoomOut'									=> 'zoomout',
				'ZoomIn'									=> 'zoomin',
				'Zoom Slots Horizontal'						=> 'slotzoom-horizontal',
				'Zoom Slots Vertical'						=> 'slotzoom-vertical',
				'Fade'									 	=> 'fade',
				'Random Flat'								=> 'random-static',
				'Random Flat and Premium'					=> 'random',
				'Curtain from Left'							=> 'curtain-1',
				'Curtain from Right'						=> 'curtain-2',
				'Curtain from Middle'						=> 'curtain-3',
				'3D Curtain Horizontal'						=> '3dcurtain-horizontal',
				'3D Curtain Vertical'						=> '3dcurtain-vertical',
				'Cube Vertical'								=> 'cube',
				'Cube Horizontal'							=> 'cube-horizontal',
				'In Cube Vertical'							=> 'incube',
				'In Cube Horizontal'						=> 'incube-horizontal',
				'TurnOff Horizontal'						=> 'turnoff',
				'TurnOff Vertical'							=> 'turnoff-vertical',
				'Paper Cut'									=> 'papercut',
				'Fly In'									=> 'flyin',
				'Random Premium'							=> 'random-premium',
				'Random Flat and Premium'					=> 'random'
			);
		$this->data['IncomingAnimation'] = array(
				'Short from Top'			=> 'sft',
				'Short from Bottom'			=> 'sfb',
				'Short from Right'			=> 'sfr',
				'Short from Left'			=> 'sfl',
				'Long from Top'				=> 'lft',
				'Long from Bottom'			=> 'lfb',
				'Long from Right'			=> 'lfr',
				'Long from Left'			=> 'lfl',
				'Skew from Left'			=> 'skewfromleft',
				'Skew from Right'			=> 'skewfromright',
				'Skew Short from Left'		=> 'skewfromleftshort',
				'Skew Short from Right'		=> 'skewfromrightshort',
				'Fading'					=> 'fade',
				'Fade in, Rotate from a Random position and Degree'	=> 'randomrotate'
			);
		$this->data['OutgoingAnimation'] = array(
				'Short to Top'				=> 'stt',
				'Short to Bottom'			=> 'stb',
				'Short to Right'			=> 'str',
				'Short to Left'				=> 'stl',
				'Long to Top'				=> 'ltt',
				'Long to Bottom'			=> 'ltb',
				'Long to Right'				=> 'ltr',
				'Long to Left'				=> 'ltl',
				'Skew to Left'				=> 'skewtoleft',
				'Skew to Right'				=> 'skewtoright',
				'Skew Short to Left'		=> 'skewtoleftshort',
				'Skew Short to Right'		=> 'skewtorightshort',
				'Fading'					=> 'fadeout',
				'Fade in, Rotate from a Random position and Degree'	=> 'randomrotateout'
			);
		$this->data['easing'] = array(
				'Linear.easeNone',
				'Power0.easeIn',
				'Power0.easeInOut',
				'Power0.easeOut',
				'Power1.easeIn', 
				'Power1.easeInOut', 
				'Power1.easeOut', 
				'Power2.easeIn', 
				'Power2.easeInOut', 
				'Power2.easeOut', 
				'Power3.easeIn', 
				'Power3.easeInOut', 
				'Power3.easeOut', 
				'Power4.easeIn', 
				'Power4.easeInOut', 
				'Power4.easeOut', 
				'Quad.easeIn', 
				'Quad.easeInOut', 
				'Quad.easeOut', 
				'Cubic.easeIn', 
				'Cubic.easeInOut', 
				'Cubic.easeOut', 
				'Quart.easeIn', 
				'Quart.easeInOut', 
				'Quart.easeOut', 
				'Quint.easeIn', 
				'Quint.easeInOut', 
				'Quint.easeOut', 
				'Strong.easeIn', 
				'Strong.easeInOut', 
				'Strong.easeOut', 
				'Back.easeIn', 
				'Back.easeInOut', 
				'Back.easeOut', 
				'Bounce.easeIn', 
				'Bounce.easeInOut', 
				'Bounce.easeOut', 
				'Circ.easeIn', 
				'Circ.easeInOut', 
				'Circ.easeOut', 
				'Elastic.easeIn', 
				'Elastic.easeInOut', 
				'Elastic.easeOut', 
				'Expo.easeIn', 
				'Expo.easeInOut', 
				'Expo.easeOut', 
				'Sine.easeIn', 
				'Sine.easeInOut', 
				'Sine.easeOut', 
				'SlowMo.ease'
			);
		
	}

	/* Add slide
	******************************/
	/*public function createslider() {
		$this->load->model('rgen/rgenrevoslider');

		$this->commonData();
		$this->arrayData();
		
		$this->data['module_row'] = $this->model_rgen_rgenrevoslider->LastID();
		if ($this->data['module_row']) {
			$this->data['module_row']++;
		}else{
			$this->data['module_row'] = 1;
		};

		$this->template = 'module/rgen_revoslider_slideedit.tpl';
		$this->response->setOutput($this->render());

		echo "<pre style='color:;'> Return last key row ==> " . print_r($this->data['module_row'], TRUE) . "</pre>";
		//$this->data['module_row'] = count($this->model_rgen_rgenrevoslider->getRGen("rgen_revoslider"));
	}*/

	/* Slide functions
	******************************/
	public function revmove_slide() {
		if (isset($this->request->get['slideid']) && isset($this->request->get['mod_id'])) {
			$this->data['mod_id'] = $this->request->get['mod_id'];
			$this->get_slider();
			unset($this->data['revoslider']['slides'][$this->request->get['slideid']]);
			$this->model_rgen_rgenrevoslider->editRGenValue($this->data['mod_id'], $this->data['revoslider']);
			//echo "<pre style='color:;'>" . print_r($this->data['revoslider'], TRUE) . "</pre>";
		}
	}
	public function edit_slide() {
		$this->load->model('rgen/rgenrevoslider');

		$this->commonData();
		$this->arrayData();

		if (isset($this->request->get['sld_name'])) {
			//echo "<pre style='color:;'>Slier name ==> " . print_r($this->request->get['sld_name'], TRUE) . "</pre>";
			if(isset($this->request->get['mod_id'])){
				$this->get_slider();
			}
			$this->data['sld_name'] = str_replace('slide', '', $this->request->get['sld_name']);
			if (isset($this->data['revoslider']['slides'][$this->data['sld_name']])) {
				//echo "<pre style='color:;'>New slide data ==> " . print_r($this->data['revoslider'], TRUE) . "</pre>";
				$this->data['slide'] 	= $this->data['revoslider']['slides'][$this->data['sld_name']];
			}
		}
		$this->template = 'module/rgen_revoslider_slideedit.tpl';
		$this->response->setOutput($this->render());
	}

	public function get_slider() {
		$this->load->model('rgen/rgenrevoslider');
		$this->data['mod_id'] = $this->request->get['mod_id'];

		if (isset($this->request->get['sld_name'])) {
		$this->data['sld_id'] = $this->request->get['sld_name'];
		}
		
		//echo "<pre style='color:;'>Slier name ==> " . print_r($this->data['sld_id'], TRUE) . "</pre>";
		$this->data['revoslider'] = $this->model_rgen_rgenrevoslider->getRevoSlider("rgen_revoslider", $this->data['mod_id']);
		foreach ($this->data['revoslider'] as $key => $value) {
			$this->data['revoslider'] = $value;
		}
		//echo "<pre style='color:;'>Slier name ==> " . print_r($this->data['revoslider'], TRUE) . "</pre>";
	}

	public function save() {
		
		$this->get_slider();
		$this->data['sld_id'] = str_replace('slide', '', $this->data['sld_id']);

		if ($this->data['revoslider']) {

			isset($this->request->post["sliderName"]) ? 
			$this->data['revoslider']["sliderName"] = $this->request->post["sliderName"] : 
			$this->data['revoslider']["sliderName"];

			isset($this->request->post["delay"]) ? 
			$this->data['revoslider']["delay"] = $this->request->post["delay"] : 
			$this->data['revoslider']["delay"];

			isset($this->request->post["onHoverStop"]) ? 
			$this->data['revoslider']["onHoverStop"] = $this->request->post["onHoverStop"] : 
			$this->data['revoslider']["onHoverStop"];

			isset($this->request->post["timerPos"]) ? 
			$this->data['revoslider']["timerPos"] = $this->request->post["timerPos"] : 
			$this->data['revoslider']["timerPos"];

			isset($this->request->post["hideCaptionAtLimit"]) ? 
			$this->data['revoslider']["hideCaptionAtLimit"] = $this->request->post["hideCaptionAtLimit"] : 
			null;

			isset($this->request->post["hideAllCaptionAtLilmit"]) ? 
			$this->data['revoslider']["hideAllCaptionAtLilmit"] = $this->request->post["hideAllCaptionAtLilmit"] : 
			null;

			isset($this->request->post["hideSliderAtLimit"]) ? 
			$this->data['revoslider']["hideSliderAtLimit"] = $this->request->post["hideSliderAtLimit"] : 
			null;

			if (isset($this->request->post["slides"])) {
				$this->data['revoslider']["slides"][$this->data['sld_id']] = $this->request->post["slides"][$this->data['sld_id']];
			}

			$this->model_rgen_rgenrevoslider->editRGenValue($this->data['mod_id'], $this->data['revoslider']);
		}else{
			if ($this->request->post) {
				$this->data['revoslider'][$this->data['mod_id']] = $this->request->post;
				$this->model_rgen_rgenrevoslider->editRGen("rgen_revoslider", $this->data['revoslider']);	
			}
			
		}
	}

	public function clearCache() {
		$this->load->library('rgen/rgen_lib');
		if (isset($this->request->get['name'])) {
			echo "<pre>".print_r($this->request->get['name'],true)."</pre>";
			$this->rgen->removeAll($this->config->get('config_template'), $this->request->get['name']);	
		}
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/rgen_revoslider')) {
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