<?php  
class ControllerModuleRgenTheme extends Controller {
	protected function index() {
		
		$this->language->load('module/rgen_theme');
		$this->load->model('setting/setting');

		$this->data['RGenData_mod'] = $this->config->get('RGenData_mod');
		$this->data['RGen_module'] 	= $this->config->get('RGen_module');
		$this->data['RGen_theme']	= $this->model_setting_setting->getSetting('rgen_theme');

		//echo "<pre style='color:#fff;'>" . print_r($this->data['RGen_theme'], TRUE) . "</pre>";

		/* GENERATING BODY CLASS
		******************************/		
		$RGen_ly = $this->config->get('RGen_layout');
		if ($RGen_ly == 'bx' || $RGen_ly == '') { $lycls = 'bx'; } else { $lycls = 'fw'; }
		if (
			isset($this->data['RGen_theme']['RGen_theme_option']) && 
			isset($this->data['RGen_theme']['RGen_theme_optionStatus']) && 
			$this->data['RGen_theme']['RGen_theme_optionStatus'] == 1
			){
			if ($this->data['RGen_theme']['RGen_theme_option'] == 1) {
				$this->document->body_class = 'thm-1 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 2) {
				$this->document->body_class = 'thm-2 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 3) {
				$this->document->body_class = 'thm-3 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 3.1) {
				$this->document->body_class = 'thm-3 boxed ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 4) {
				$this->document->body_class = 'thm-4 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 4.1) {
				$this->document->body_class = 'thm-4 boxed ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 5) {
				$this->document->body_class = 'thm-5 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 6) {
				$this->document->body_class = 'thm-6 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 7) {
				$this->document->body_class = 'thm-7 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 8) {
				$this->document->body_class = 'thm-8 ' . $lycls;
			}elseif ($this->data['RGen_theme']['RGen_theme_option'] == 9) {
				$this->document->body_class = 'thm-9 ' . $lycls;
			}else{
				$this->document->body_class = $lycls;
			}
		}else {
			$this->document->body_class = $lycls;
		}

		/* MODULE PRODUCT DISPLAY STYLE
		******************************/
		if (isset($this->data['RGen_theme']['RGen_modprdView'])) {
			$this->document->RGen_modprdView = explode(',', isset($this->data['RGen_theme']['RGen_modprdView']) ? $this->data['RGen_theme']['RGen_modprdView'] : null);
			//echo "<pre style='color:#fff;'>" . print_r($this->document->RGen_modprdView, TRUE) . "</pre>";
		}else{
			$this->document->RGen_modprdView[0] = 'special-scroll';
			$this->document->RGen_modprdView[1] = 'featured-scroll';
			$this->document->RGen_modprdView[2] = 'best-scroll';
			$this->document->RGen_modprdView[3] = 'latest-scroll';
		}

		/* MODULE PRODUCT DISPLAY STYLE
		******************************/
		$this->document->getRoute = 'common/home';
		if (isset($this->request->get['route'])) {
		    $this->document->getRoute = $this->request->get['route'];
		} else {
		    $this->document->getRoute = 'common/home';
		}



		/* GET LANGUAGE ID
		******************************/
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		$this->data['language_id'] = array();
		foreach ($this->data['languages'] as $result) {
      		$this->data['language_id'][] = array(
        		'language_id' => $result['language_id']
      		);
    	}
		$this->document->Lang_id = $this->data['language_id'];
		//echo "<pre style='color:#fff;'>" . print_r($this->document->Lang_id, TRUE) . "</pre>";
		

		/* Information menu 
		******************************/
		$this->data['informations'] = array();
		foreach ($this->model_catalog_information->getInformations() as $result) {
			$this->data['informations'][] = array(
				'title' => $result['title'],
				'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
			);
		}
		$this->document->RGen_infoMenu = $this->data['informations'];
		

		// ALL RGEN MODULE ARRAYS
		$this->data['RGen_ddMenu'] 		= array();
		$this->data['RGen_menu_item']	= array();
		$this->data['RGen_HtmlMenu']	= array();
		$this->data['RGen_HtmlMenuMod']	= array();
		$this->data['RGen_Menu']		= array();
		$this->data['RGen_CustomFt']	= array();
		$this->data['RGen_social']		= array();

		if($this->data['RGen_module']){
			/* CUSTOM DROPDOWN MENU
			******************************/
			$i = 0;
			foreach ($this->data['RGen_module'] as $result) {
				$m = 0; //[0] = DROPDOWN MENU
				$this->data['RGen_ddMenu'][$this->data['language_id'][$i]['language_id']] = array(
					'name'			=>	$result['Menu'][$m]['name'],	
					'url'			=>	$result['Menu'][$m]['url'],
					'ddMenuItems'	=>	$result['Menu'][$m]['ddMenuItems']
				);
				$i++;
			}

			/* CUSTOM MENU ITEMS
			******************************/
			$i = 0;
			foreach ($this->data['RGen_module'] as $result) {
				$m = 1; //[1] = MENU ITEMS
				$this->data['RGen_menu_item'][$this->data['language_id'][$i]['language_id']] = array(
					'RGen_menu_items'	=>	$result['Menu'][$m]['RGen_menu_items']
				);
				$sort_order = array();
				foreach ($this->data['RGen_menu_item'][$this->data['language_id'][$i]['language_id']]['RGen_menu_items'] as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
				}
				array_multisort($sort_order, SORT_ASC, $this->data['RGen_menu_item'][$this->data['language_id'][$i]['language_id']]['RGen_menu_items']);
				$i++;
			}

			/* CUSTOM HTML MENU
			******************************/
			$i = 0;
			foreach ($this->data['RGen_module'] as $result) {
				$m = 2; //[2] = HTML MENU
				$this->data['RGen_HtmlMenu'][$this->data['language_id'][$i]['language_id']] = array(
					'name'		=>	isset($result['Menu'][$m]['name']) ? $result['Menu'][$m]['name'] : '',
					'htmldata'	=>	isset($result['Menu'][$m]['htmldata']) ? $result['Menu'][$m]['htmldata'] : ''
				);
				$i++;
			}

			/* CUSTOM HTML MENU MOD
			******************************/
			$i = 0;
			foreach ($this->data['RGen_module'] as $result) {
				$m = 3; //[3] = UNLIMITED HTML MENU MOD
				if(isset($result['Menu'][$m])){
					$this->data['RGen_HtmlMenuMod'][$this->data['language_id'][$i]['language_id']] = array(
						'RGen_HtmlMenuMod'	=>	$result['Menu'][$m]['htmMenu']
					);
					$sort_order = array();
					foreach ($this->data['RGen_HtmlMenuMod'][$this->data['language_id'][$i]['language_id']]['RGen_HtmlMenuMod'] as $key => $value) {
						$sort_order[$key] = $value['sort_order'];
					}
					array_multisort($sort_order, SORT_ASC, $this->data['RGen_HtmlMenuMod'][$this->data['language_id'][$i]['language_id']]['RGen_HtmlMenuMod']);
				}
				$i++;
			}

			/* CUSTOM FOOTER
			******************************/
			$i = 0;
			foreach ($this->data['RGen_module'] as $result) {
				$this->data['RGen_CustomFt'][$this->data['language_id'][$i]['language_id']] = array(
					'ftAbout_title' =>	isset($result['ftAbout_title']) ? $result['ftAbout_title'] : '',
					'ftAbout'       =>	isset($result['ftAbout']) ? $result['ftAbout'] : ''
				);
				$i++;
			}
			
			//echo "<pre style='color:#fff;'>" . print_r($this->data['RGen_prdmenu_data'], TRUE) . "</pre>";
		}

		
		if($this->data['RGenData_mod']){
			/* MENU SORT ORDER
			******************************/
			$i = 0;
			foreach ($this->data['RGenData_mod']['RGen_menu_sort'] as $result) {
	      		$this->data['RGen_Menu'][] = array(
					'sort_order' => $result['sort_order']
	      		);
		    	$i++;
		    }
		    //echo "<pre style='color:#fff;'>" . print_r($this->data['RGenData_mod'], TRUE) . "</pre>";
			$this->data['RGen_Menu'][0]['RGen_catMenu'] 	= 'RGen_catMenu';
			$this->data['RGen_Menu'][1]['RGen_infoMenu'] 	= $this->data['informations'];
			$this->data['RGen_Menu'][2]['RGen_myAccount'] 	= 'RGen_myAccount';
			$this->data['RGen_Menu'][3]['ddMenu'] 			= $this->data['RGen_ddMenu'];
			$this->data['RGen_Menu'][4]['RGen_menu_item'] 	= $this->data['RGen_menu_item'];
			$this->data['RGen_Menu'][5]['RGen_HtmlMenu'] 	= $this->data['RGen_HtmlMenu'];
			
			//echo "<pre style='color:#fff;'>" . print_r($this->data['RGen_Menu'], TRUE) . "</pre>";
			$sort_order = array();
			foreach ($this->data['RGen_Menu'] as $key => $value) {
				if (isset($value['sort_order'])) {
					$sort_order[$key] = $value['sort_order'];
				}else{
					$sort_order[$key] = 0;
				}
			}
			array_multisort($sort_order, SORT_ASC, $this->data['RGen_Menu']);

			/* CUSTOM SOCIAL ICONS
			******************************/
			$i = 0;
			if(isset($this->data['RGenData_mod']['RGen_social'])){
				foreach ($this->data['RGenData_mod']['RGen_social'] as $result) {
					if(isset($result['status'])){ 
						$result['status'];
					} else { 
						$result['status'] = 0; 
					}
		      		$this->data['RGen_social'][] = array(
		        		'normal' => $result['normal'],
			    		'hover'  => $result['hover'],
						'url'  => $result['url'],
						'status'  => $result['status'],
						'sort_order' => $result['sort_order']
		      		);
					
		    	$i++; }
		    	$sort_order = array();
				foreach ($this->data['RGen_social'] as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
				}
				array_multisort($sort_order, SORT_ASC, $this->data['RGen_social']);
				//echo "<pre style='color:#fff;'>" . print_r($this->data['RGen_social'], TRUE) . "</pre>";
			}
		}

		if(!$this->data['RGen_Menu']){
			$this->data['RGen_Menu'][0]['RGen_catMenu'] 	= 'RGen_catMenu';
			$this->data['RGen_Menu'][1]['RGen_infoMenu'] 	= $this->data['informations'];
			$this->data['RGen_Menu'][2]['RGen_myAccount'] 	= 'RGen_myAccount';
			$this->data['RGen_Menu'][3]['ddMenu'] 			= $this->data['RGen_ddMenu'];
			$this->data['RGen_Menu'][4]['RGen_menu_item'] 	= $this->data['RGen_menu_item'];
			$this->data['RGen_Menu'][5]['RGen_HtmlMenu'] 	= $this->data['RGen_HtmlMenu'];
		}

		$this->document->RGen_ddMenu		= $this->data['RGen_ddMenu'];
		$this->document->RGen_menu_item		= $this->data['RGen_menu_item'];
		$this->document->RGen_HtmlMenu		= $this->data['RGen_HtmlMenu'];
		$this->document->RGen_HtmlMenuMod	= $this->data['RGen_HtmlMenuMod'];
		$this->document->RGen_Menu 			= $this->data['RGen_Menu'];
		$this->document->RGen_CustomFt 		= $this->data['RGen_CustomFt'];
		$this->document->RGen_social 		= $this->data['RGen_social'];
		$this->document->RGen_theme			= $this->data['RGen_theme'];
		
		//echo "<pre style='color:#fff;'>" . print_r($this->document->RGen_allcatdata, TRUE) . "</pre>";

	}
}


?>