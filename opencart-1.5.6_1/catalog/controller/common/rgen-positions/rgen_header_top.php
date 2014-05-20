<?php
class ControllerCommonRgenPositionsRGenHeaderTop extends Controller {
    public function index() {
        $this->load->model('design/layout');
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('catalog/information');
 
        if (isset($this->request->get['route'])) {
            $route = (string)$this->request->get['route'];
        } else {
            $route = 'common/home';
        }
 
        $layout_id = 0;
 
        if ($route == 'product/category' && isset($this->request->get['path'])) {
            $path = explode('_', (string)$this->request->get['path']);
 
            $layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
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

        //echo "<pre>".print_r($layout_id,true)."</pre>";
 
        $module_data = array();
 
        $this->load->model('setting/extension');
 
        $extensions = $this->model_setting_extension->getExtensions('module');

        //echo "<pre>".print_r($extensions,true)."</pre>";
 
        foreach ($extensions as $extension) {
            $modules = $this->config->get($extension['code'] . '_module');
 
            if ($modules) {
            	foreach ($modules as $module) {
            		
            		if ($module['position'] == 'tp_above' && $module['status']) {
            			//echo "<pre>".print_r($module,true)."</pre>";
            			// Check for layout id

            			if (
            				isset($module['cat_status']) && $module['cat_status'] == "selc" ||
            				isset($module['prd_status']) && $module['prd_status'] == "selp" ||
            				isset($module['brand_status']) && $module['brand_status'] == "selb" ||
            				isset($module['info_status']) && $module['info_status'] == "seli"
            				){
            				if (
	        					isset($module['products']) && in_array($this->data['product_id'], $module['products']) && $module['layout_id'] == $layout_id || 
								isset($module['category']) && in_array($this->data['category_id'], $module['category']) && $module['layout_id'] == $layout_id || 
								isset($module['brands']) && in_array($this->data['brand_id'], $module['brands']) && $module['layout_id'] == $layout_id || 
								isset($module['info']) && in_array($this->data['information_id'], $module['info']) && $module['layout_id'] == $layout_id
								){
	            				$module_data[] = array(
		                            'code'       => $extension['code'],
		                            'setting'    => $module,
		                            'sort_order' => $module['sort_order']
		                        );
	            			}
            			}elseif($module['layout_id'] == 99999 || $module['layout_id'] == $layout_id){
            				$module_data[] = array(
	                            'code'       => $extension['code'],
	                            'setting'    => $module,
	                            'sort_order' => $module['sort_order']
	                        );
            			}
            		}
                }
            }
        }
 		//echo "<pre>".print_r($module_data,true)."</pre>";       
        $sort_order = array();
 
        foreach ($module_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }
 
        array_multisort($sort_order, SORT_ASC, $module_data);
 
        $this->data['modules'] = array();
 
        foreach ($module_data as $module) {
        	//echo "<pre>Final array ==> ".print_r($module,true)."</pre>";
            $module = $this->getChild('module/' . $module['code'], $module['setting']);
 
            if ($module) {
                $this->data['modules'][] = $module;
            }
        }
 
 		if($this->config->get('config_template') == "rgen-opencart"){
	        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/rgen-positions/rgen_header_top.tpl')) {
	            $this->template = $this->config->get('config_template') . '/template/common/rgen-positions/rgen_header_top.tpl';
	        }
	        $this->render();
        }
    }
}
?>