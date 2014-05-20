<?php  
class ControllerModuleSlideshow extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->load->model('design/banner');
		$this->load->model('tool/image');
		
		$this->document->addScript('catalog/view/javascript/jquery/nivo-slider/jquery.nivo.slider.pack.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/slideshow.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/slideshow.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/slideshow.css');
		}
		
		$this->data['width'] = $setting['width'];
		$this->data['height'] = $setting['height'];
		
		$this->data['banners'] = array();
		
		if (isset($setting['banner_id'])) {
			$results = $this->model_design_banner->getBanner($setting['banner_id']);
			  
			foreach ($results as $result) {
				if (file_exists(DIR_IMAGE . $result['image'])) {
					$this->data['banners'][] = array(
						'title' => $result['title'],
						'link'  => $result['link'],
						'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height'])
					);
				}
			}
		}
		
		$this->data['module'] = $module++;
						
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/slideshow.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/slideshow.tpl';
		} else {
			$this->template = 'default/template/module/slideshow.tpl';
		}
		

			/* RGen data
			******************************/
			if($this->config->get('config_template') == "rgen-opencart"){

				/* SLIDE SHOW CAPTION DATA
				+++++++++++++++++++++++++++*/
				$this->load->model('localisation/language');
				$this->data['languages'] = $this->model_localisation_language->getLanguages();
				$this->data['language_id'] = array();
				foreach ($this->data['languages'] as $result) {
		      		$this->data['language_id'][] = array(
		        		'language_id' => $result['language_id']
		      		);
		    	}
				$this->data['RGen_module'] = $this->config->get('RGen_module');

				$this->data['caption1']	= array();
				$this->data['caption2']	= array();

				if($this->data['RGen_module']){
					$i = 0;
					foreach ($this->data['RGen_module'] as $result) {
						$capArr = 'cap1_' . $this->data['language_id'][$i]['language_id'];
						if(isset($result[$capArr])){
							$this->data['caption1'][$this->data['language_id'][$i]['language_id']] = array(
								'captions'		=>	$result[$capArr]
							);	
						}
						$i++;
					}
				}
				$this->document->caption1 = $this->data['caption1'];
				/*+++++++++++++++++++++++++++*/
				
				$capStatus = $this->config->get('RGen_capStatus');
				$cap = $this->config->get('RGen_cap');

				if (isset($capStatus) && $capStatus == 1){
					if ($cap == 'c1') { $this->data['cpcls'] = " cap1"; }
					if ($cap == 'c2') { $this->data['cpcls'] = " cap2"; }
					if ($cap == 'c3') { $this->data['cpcls'] = " cap3"; }
					if ($cap == 'c4') { $this->data['cpcls'] = " cap4"; }
					if ($cap == 'c5') { $this->data['cpcls'] = " cap5"; }
					if ($cap == 'c6') { $this->data['cpcls'] = " cap6"; }
				}else{
					$this->data['cpcls'] = null;
				}
			}
			
		$this->render();
	}
}
?>