<?php  
class ControllerModuleRgenCustom extends Controller {
	
	protected function index($setting) {
		static $module = 0;
		$this->data['module'] = $module++;
		
		/***************/
		$this->load->library('rgen/rgen_lib');
		$rgen_optimize = $this->config->get('RGen_optimize');
		$cache = $rgen_optimize['cache_customhtml'];
		$theme = $this->config->get('config_template');
		$dir = 'rgen_customhtml';
		/***************/

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->document->Layout = $this->layoutlist();

		//echo "<pre>".print_r($this->data['languages'],true)."</pre>";

		$this->data['heading_title'] = sprintf($this->language->get('heading_title'), $this->config->get('config_name'));

		$this->data['setting'] = $setting;
		$this->data['position'] = isset($setting["position"]) ? $setting["position"] : null;
		
		if ($this->data['module'] == 0) {
			$this->document->footer_cards = array();
			if ($this->config->get('rgen_custom_module')) {
				foreach ($this->config->get('rgen_custom_module') as $k => $v) {
					if ($v['position'] == 'footer_cards' && $v['status'] == 1) {
						$this->getMod($v['mod_id'], $v['layout_id']);
						$this->document->footer_cards[$v['mod_id']] = isset($this->data['RGen_custom'][$v['mod_id']]) ? $this->data['RGen_custom'][$v['mod_id']] : '';
					}
				}
			}
		}
		//echo "<pre>".print_r($this->document->footer_cards,true)."</pre>";

		// Display module on default positions
		if($this->data['setting'] && $this->data['setting']['position'] != 'footer_cards') {

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
			
			$tmp = array();
			foreach ($this->data['setting'] as $key => $value) { if ($value) { $tmp[] = $value; } }
			if($theme == "rgen-opencart"){
				if ($cache) {
					//$modName = implode("-", $tmp);
					$modName = serialize($tmp);
					$modFile = md5($modName)."_".$this->config->get('config_language_id').$this->config->get('config_store_id');
					$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);
					if(!file_exists($cache_file)) {
						$this->getMod($this->data['setting']['mod_id'], $this->data['setting']['layout_id']);
						if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_custom.tpl')) {
							$this->template = $theme . '/template/module/rgen_custom.tpl';
						}
						$this->render();
						$this->rgen->cacheFile($this->render(), $cache_file);
					}else{
						$tpl = str_replace(DIR_TEMPLATE, '', $cache_file);
						$this->template = $tpl;
						$this->render();
					}
				}else{
					$this->getMod($this->data['setting']['mod_id'], $this->data['setting']['layout_id']);
					$this->data['product_mods'] = $this->data['setting'];
					if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_custom.tpl')) {
						$this->template = $theme . '/template/module/rgen_custom.tpl';
						$this->render();
					}
				}
			}
		}
	}

	public function cacheData($cacheKey, $data, $prefix = ''){

		$theme = $this->config->get('config_template');
		$dir = 'rgen_customhtml';

		foreach($data as $dk => $dv) {
			// Saving title data
			foreach ($dv['title'] as $k => $v) {
				if ($v != '') {
					$modFile = $prefix.'title_'.md5($dk)."_".$k;
					$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);
					$this->rgen->cacheFile(html_entity_decode($v, ENT_QUOTES, 'UTF-8'), $cache_file);
					$data[$dk]['title'][$k] = $modFile;
				}
				
			}

			// Saving description data
			foreach ($dv['description'] as $k => $v) {
				if ($v != '') {
					$modFile = $prefix.'description_'.md5($dk)."_".$k;
					$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);
					$this->rgen->cacheFile(html_entity_decode($v, ENT_QUOTES, 'UTF-8'), $cache_file);
					$data[$dk]['description'][$k] = $modFile;
				}
			}
		}
		
		// Caching array
		$this->rgen->setCache($theme, $dir, $cacheKey, $data);
	}

	protected function getMod($modId, $layoutID) {
		if ($this->document->Layout == $layoutID || $layoutID == 99999) {
			//echo "<pre>".print_r($this->data['module'],true)."</pre>";
			$this->load->model('rgen/rgencustom');
			$this->data['RGen_custom'] = $this->model_rgen_rgencustom->getRGenCustomMod($modId);

			//echo "<pre>".print_r($this->data['RGen_custom'],true)."</pre>";

			$descriptionGet = $this->model_rgen_rgencustom->descriptionGet($modId);
			if ($descriptionGet) {
				if (!isset($this->data['RGen_custom'][$modId]['title'])) {
					if (isset($descriptionGet['title'])) {
						$this->data['RGen_custom'][$modId]['title'] = $descriptionGet['title'];
					}
				}
				//$this->data['RGen_custom'][$modId]['title'] = $descriptionGet['title'];
				$this->data['RGen_custom'][$modId]['description'] = $descriptionGet['description'];
			}


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
		}
		//$this->document->RGen_custom 	=	$this->data['RGen_custom'];
	}

	protected function layoutlist() {

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

		return $this->data['layouts'];
	}

	protected function sorting($modArr){
		//echo "<pre>".print_r($modArr,true)."</pre>";
		if ($modArr) {
			$sort_order = array();
			foreach ($modArr as $key => $value) {
				$sort_order[$key] = isset($value['sort_order']) ? $value['sort_order'] : 0;
			}
			array_multisort($sort_order, SORT_ASC, $modArr);
		}
		return $modArr;
	}
}
?>