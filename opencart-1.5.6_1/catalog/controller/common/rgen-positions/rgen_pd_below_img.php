<?php
class ControllerCommonRgenPositionsRGenPdBelowImg extends Controller {
    public function index() {
        $this->load->model('design/layout');
        $this->load->model('catalog/product');
        
        if (isset($this->request->get['route'])) {
            $route = (string)$this->request->get['route'];
        } else {
            $route = 'common/home';
        }
 
        $layout_id = 0;
 
        if ($route == 'product/product' && isset($this->request->get['product_id'])) {
            $layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
        }
 
        if (!$layout_id) {
            $layout_id = $this->model_design_layout->getLayout($route);
        }
 
        if (!$layout_id) {
            $layout_id = $this->config->get('config_layout_id');
        }

		/* GET PRODUCT ID
		******************************/
		if (isset($this->request->get['product_id'])) {
			$this->data['product_id'] = (int)$this->request->get['product_id'];
		} else {
			$this->data['product_id'] = 0;
		}

        $module_data = array();
 
        $this->load->model('setting/extension');
 
        $extensions = $this->model_setting_extension->getExtensions('module');

        //echo "<pre>".print_r($extensions,true)."</pre>";
 
        foreach ($extensions as $extension) {
            $modules = $this->config->get($extension['code'] . '_module');
 
            if ($modules) {
            	foreach ($modules as $module) {
            		
            		if ($module['position'] == 'pd_below_img' && $module['status']) {
            			if (isset($module['prd_status']) && $module['prd_status'] == "selp"){
            				if (isset($module['products']) && in_array($this->data['product_id'], $module['products']) && $module['layout_id'] == $layout_id){
	            				$module_data[] = array(
		                            'code'       => $extension['code'],
		                            'setting'    => $module,
		                            'sort_order' => $module['sort_order']
		                        );
	            			}
            			}elseif($module['layout_id'] == $layout_id){
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
 
 		if($this->config->get('config_template') == "rgen-opencart"){
	        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/rgen-positions/rgen_pd_below_img.tpl')) {
	            $this->template = $this->config->get('config_template') . '/template/common/rgen-positions/rgen_pd_below_img.tpl';
	        }
	        $this->render();
        }
    }
}
?>