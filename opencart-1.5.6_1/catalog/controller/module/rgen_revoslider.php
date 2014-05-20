<?php
class ControllerModuleRGenRevoSlider extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->language->load('module/rgen_revoslider');
		$this->data['heading_title'] = $this->language->get('heading_title');

		/***************/
		$this->load->library('rgen/rgen_lib');
		$rgen_optimize = $this->config->get('RGen_optimize');
		$cache = $rgen_optimize['cache_revo'];
		$theme = $this->config->get('config_template');
		$dir = 'rgen_revoslider';

		$device = $this->rgen->device;
		/***************/


		/* Loading files
		******************************/
		$this->document->addScript('catalog/view/theme/' . $this->config->get('config_template') . '/revo/rs-plugin/js/jquery.themepunch.plugins.min.js');
		$this->document->addScript('catalog/view/theme/' . $this->config->get('config_template') . '/revo/rs-plugin/js/jquery.themepunch.revolution.min.js');
		$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/revo/rs-plugin/css/settings.css');
		$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/revo/rs-plugin/css/style.css');

		/* Module settings
		******************************/
		$this->data['setting'] = $setting;


		/* Slide show size
		******************************/
		$this->data['setting'] = $setting;

		if ($this->data['setting']['slider_size'] == 'normal') {
			$this->data['rvclass'] = ' bannercontainer';
		}elseif ($this->data['setting']['slider_size'] == 'rv-wfs') {
			$this->data['rvclass'] = ' fullscreen-container';
		}elseif ($this->data['setting']['slider_size'] == 'rv-pfs') {
			$this->data['rvclass'] = ' bannercontainer';
		}elseif ($this->data['setting']['slider_size'] == 'rv-wfws') {
			$this->data['rvclass'] = ' fullwidthbanner-container';
		}elseif ($this->data['setting']['slider_size'] == 'rv-pfws') {
			$this->data['rvclass'] = ' bannercontainer';
		}else {
			$this->data['rvclass'] = ' bannercontainer';
		}
		//echo "<pre>".print_r($this->data['setting'],true)."</pre>";

		$this->data['getRoute'] = 'common/home';
	    if (isset($this->request->get['route'])) {
	        $this->data['getRoute'] = $this->request->get['route'];
	    } else {
	        $this->data['getRoute'] = 'common/home';
	    }

	    $this->data['prdonslide'] = isset($setting['prdonrevo']) ? ' prdonrevo' : '';
		
		$this->data['module'] = $module++;

		if($theme == "rgen-opencart"){
			$tmp = array();
			foreach ($this->data['setting'] as $key => $value) { if ($value) { $tmp[] = $value; } }
			if ($cache) {
				//$modName = implode("-", $tmp);
				$modName = serialize($tmp);
				$modFile = md5($modName)."_".$this->config->get('config_language_id').$device.$this->config->get('config_store_id');;
				$cache_file = $this->rgen->cacheFilePath($theme, $dir, $modFile);

				if(!file_exists($cache_file)) {
					$this->buildSlider();
					if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_revoslider.tpl')) {
						$this->template = $theme . '/template/module/rgen_revoslider.tpl';
					}
					$this->render();
					$this->rgen->cacheFile($this->render(), $cache_file);
				}else{
					$tpl = str_replace(DIR_TEMPLATE, '', $cache_file);
					$this->template = $tpl;
					$this->render();
				}
			}else{
				$this->buildSlider();
				if (file_exists(DIR_TEMPLATE . $theme . '/template/module/rgen_revoslider.tpl')) {
					$this->template = $theme . '/template/module/rgen_revoslider.tpl';
					$this->render();
				}
			}
		}
		//Choose which template to display this module with
		/*if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/rgen_revoslider.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/rgen_revoslider.tpl';
		}*/

		//Render the page with the chosen template
		//$this->render();

	}

	protected function buildSlider() {

		/* Language  IDs
		******************************/
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		$lng_id = $this->config->get('config_language_id');

		/* Module data from db
		******************************/
		$this->load->model('rgen/rgenrevoslider');
		$this->data['RGen_revoslider'] = $this->model_rgen_rgenrevoslider->getRGen("rgen_revoslider");

		/* Sorting module data
		******************************/
		$sorting = $this->data['RGen_revoslider'][$this->data['setting']['mod_id']];
		if (isset($sorting)) {
			if (isset($sorting['slides'])) {
				// Sorting slides
				foreach ($sorting['slides'] as $sl_key => $sl_value) {
					$sl_sort_order[$sl_key] = $sl_value['sort_order'];
				}
				array_multisort($sl_sort_order, SORT_ASC, $sorting['slides']);

				// Create new array for captions
				$newCpArray = array();
				foreach ($sorting['slides'] as $sl_key => $sl_value) { 
					if(isset($sl_value['captions'])){
					$newCpArray['s'.$sl_key.'_cp'] = $sl_value['captions']; 
					}
				}

				// Sorting new caption array 
				$i=0;
				foreach ($newCpArray as $result) {
					$cp_sort_order = array();
					if(isset($newCpArray['s'.$i.'_cp'])){
						foreach ($newCpArray['s'.$i.'_cp'] as $cp_key => $cp_value) {
							//echo "<pre style='color:#fff;'> Js data ==> <br>" . print_r($cp_value, TRUE) . "</pre>";
							$cp_sort_order[$cp_key] = isset($cp_value['sort_order']) ? $cp_value['sort_order'] : null;
						}
						array_multisort($cp_sort_order, SORT_ASC, $newCpArray['s'.$i.'_cp']);	
					}
					$i++; 
				}

				// Assign new caption array to main array
				$s=0;
				foreach ($sorting['slides'] as $result) {
					if(isset($result['captions']) && isset($newCpArray['s'.$s.'_cp'])){
					$result['captions'] = $newCpArray['s'.$s.'_cp'];
					}
					$newSlideArray[] = $result;
					$s++; 
				}
				$sorting['slides'] = $newSlideArray;
			}
		}
		$this->data['RGen_revoslider'][$sorting['mod_id']] = $sorting;

		/* Caption configuration
		******************************/
		$this->data['captions'] = array();
		$this->data['cp_attr'] 	= array();
		$this->data['cp_style'] = array();
		$newSlides = array();
		foreach($this->data['RGen_revoslider'] as $revoslider){
			if (isset($revoslider['slides'])) {
				$this->data['captions'][$revoslider['mod_id']] = array(
					'mod_id' => $revoslider['mod_id']
					);
				$sld=0;
				foreach($revoslider['slides'] as $slides) {
					if (isset($slides['captions'])) {
						$cp=0;
						foreach($slides['captions'] as $result){
							
							// Generating arrays 
							$cp_position 		= explode(',', isset($result['cp_position']) ? $result['cp_position'] : null);
							$starttime 			= explode(',', isset($result['displaytime']) ? $result['displaytime'] : null);
							$endtime 			= explode(',', isset($result['displaytime']) ? $result['displaytime'] : null);
							$cp_speed 			= explode(',', isset($result['cp_speed']) ? $result['cp_speed'] : null);
							$cp_animation 		= explode(',', isset($result['cp_animation']) ? $result['cp_animation'] : null);
							$cp_video_options 	= explode(',', isset($result['cp_video_options']) ? $result['cp_video_options'] : null);
							$cp_link 			= explode(',', isset($result['cp_link']) ? $result['cp_link'] : null);
							$cpimage_common		= isset($result['cpimage_common']) ? $result['cpimage_common'] : null;
							$cpimage			= isset($result['cpimage'][$lng_id]) ? $result['cpimage'][$lng_id] : null;
							
							//echo "<pre style='color:#fff;'><h1>" . print_r($cp_animation, TRUE) . "</h1></pre>";
							if(isset($result['slide_id'])){
								$this->data['captions'][$revoslider['mod_id']][$result['slide_id']]['cp'.$cp] = array(
									'cptype' => $result['cptype'],
									'name' => $result['name'],
									'status' => isset($result['status']) ? $result['status'] : null,
									'sort_order' => isset($result['sort_order']) ? $result['sort_order'] : null,

									'starttime' => 
										isset($starttime[1]) && $starttime[1] != "" ? 
										' data-start="' . $starttime[1] . '"' :
										null,

									'endtime' => 
										isset($endtime[2]) && $endtime[2] != "" && $endtime[2] != 0 ? 
										' data-end="' . $endtime[2] . '"' :
										null,

									'cptext' => 
										isset($result['htmlData_cptext_common']) && $result['htmlData_cptext_common'] != "" ? 
										html_entity_decode(isset($result['htmlData_cptext_common']) ? $result['htmlData_cptext_common'] : null, ENT_QUOTES, 'UTF-8') :
										html_entity_decode(isset($result['htmlData_cptext'][$lng_id]) ? $result['htmlData_cptext'][$lng_id] : null, ENT_QUOTES, 'UTF-8'),

									'cptext_cssclass' =>
										isset($result['cptext_cssclass']) && $result['cptext_cssclass'] != "" ? 
										$result['cptext_cssclass'] :
										null,


									'cpimage' => 
										isset($result['cpimage_common']) && $result['cpimage_common'] != "" ? 
										'image/' . $cpimage_common :
										'image/' . $cpimage,
									
									'cpvideo' => 
										isset($result['htmlData_cpvideo_common']) && $result['htmlData_cpvideo_common'] != "" ? 
										html_entity_decode(isset($result['htmlData_cpvideo_common']) ? $result['htmlData_cpvideo_common'] : null, ENT_QUOTES, 'UTF-8') :
										html_entity_decode(isset($result['htmlData_cpvideo'][$lng_id]) ? $result['htmlData_cpvideo'][$lng_id] : null, ENT_QUOTES, 'UTF-8'),

									'cpvideo_size' => 
										isset($cp_video_options[0]) && $cp_video_options[0] == "yes" ? 
										' fullscreenvideo' :
										null,
									'cpvideo_autoplay' => 
										isset($cp_video_options[1]) && $cp_video_options[1] == "yes" ? 
										' data-autoplay="true"' :
										' data-autoplay="false"',
									'cpvideo_nextslide' => 
										isset($cp_video_options[2]) && $cp_video_options[2] == "yes" ? 
										' data-nextslideatend="true"' :
										' data-nextslideatend="false"',
										
									'position' => 
										isset($cp_position) && $cp_position[0] == "absolute" ? 
										(
											isset($cp_position[1], $cp_position[2]) ? 
											' data-x="' . $cp_position[1] . '" data-y="' . $cp_position[2] . '"' :
											null
										) :
										(
											isset($cp_position[1], $cp_position[2], $cp_position[3], $cp_position[4]) ? 
											' data-x="' . $cp_position[1] . '" data-y="' . $cp_position[2] . '"' . ' data-hoffset="' . $cp_position[3] . '"' . ' data-voffset="' . $cp_position[4] . '"' :	
											null
										),

									'speed' => 
										isset($cp_speed[0]) && $cp_speed[0] != "" ? 
										' data-speed="' . $cp_speed[0] . '"' :
										null,
									'endspeed' => 
										isset($cp_speed[1]) && $cp_speed[1] != "" ? 
										' data-endspeed="' . $cp_speed[1] . '"' :
										null,
									'animation' =>
										isset($cp_animation[0], $cp_animation[2]) ? 
										' ' . $cp_animation[0] . ' ' . $cp_animation[2] :
										null,
									'easing' =>
										isset($cp_animation[1]) ? 
										' data-easing="' . $cp_animation[1] . '"' :
										null,
									'endeasing' =>
										isset($cp_animation[3]) ? 
										' data-endeasing="' . $cp_animation[3] . '"' :
										null,
									'link' =>
										isset($cp_link[0]) && $cp_link[0] != "" ? 
										$cp_link[0] :
										null,
									'linkopen' =>
										isset($cp_link[1]) && $cp_link[1] == "yes" ? 
										' target="_blank"' :
										null,

								);
								
								// Caption attributes 
								$attr = $this->data['captions'][$revoslider['mod_id']][$result['slide_id']]['cp'.$cp];

								$autoPlay = $attr['cptype'] == 'video' ? $attr['cpvideo_autoplay'] : null;
								$nextSlide = $attr['cptype'] == 'video' ? $attr['cpvideo_nextslide'] : null;

								$this->data['cp_attr'][$revoslider['mod_id']][$result['slide_id']]['cp'.$cp] = 
								$attr['starttime'] .
								$attr['endtime'] .
								$attr['position'] .
								$attr['speed'] .
								$attr['endspeed'] .
								$attr['easing'] .
								$attr['endeasing'] .
								$autoPlay . 
								$nextSlide;

							}
						$cp++; }
					}
					$sld++;
				}
			}
		}
		
		/* Slide configuration
		******************************/
		$this->data['slides'] = array();
		foreach($this->data['RGen_revoslider'] as $revoslider){
			if (isset($revoslider['slides'])) {
				$this->data['slides'][$revoslider['mod_id']] = array(
						'mod_id' => $revoslider['mod_id']
						);
				foreach ($revoslider['slides'] as $result) {
					$ssd 				= explode(',', isset($result['slot_speed_delay']) ? $result['slot_speed_delay'] : null);
					$sld_link 			= explode(',', isset($result['sld_link']) ? $result['sld_link'] : null);
					$slideimage_common 	= isset($result['slideimage_common']) ? $result['slideimage_common'] : null;
					$slideimage 		= isset($result['slideimage'][$lng_id]) ? $result['slideimage'][$lng_id] :null;
					$bgoptions 			= explode(',', isset($result['bg_options']) ? $result['bg_options'] : null);

					//echo "<pre style='color:#fff;'><h1>" . print_r($result, TRUE) . "</h1></pre>";
					$this->data['slides'][$revoslider['mod_id']]['slide_config'][$result['slide_id']] = array(
										"slide_id" => $result['slide_id'],
										"slidename" => $result['slidename'],
										"status" => $result['status'],
										"sort_order" => $result['sort_order'],
										"slideimage" => 
											isset($result['slideimage_common']) && $result['slideimage_common'] != "" ?
											$slideimage_common :
											$slideimage,

										"slidebg" => 
											isset($result['slidebg']) && $result['slidebg'] != "" ? 
											'style="background-color:' . $result['slidebg'] . ';"' :
											null,

										"transition" =>
											isset($result['transition']) && $result['transition'] != "" ? 
											' data-transition="' . $result['transition'] . '"' :
											null,

										"slotamount" =>
											isset($ssd[0]) && $ssd[0] != "" ? 
											' data-slotamount="' . $ssd[0] . '"' :
											null,

										"bgrepeat" =>
											isset($bgoptions[0]) && $bgoptions[0] != "" ? 
											' data-bgrepeat="' . $bgoptions[0] . '"' :
											null,

										"bgfit" =>
											isset($bgoptions[1]) && $bgoptions[1] != "" ? 
											' data-bgfit="' . $bgoptions[1] . '"' :
											null,

										"bgposition" =>
											isset($bgoptions[2]) && $bgoptions[2] != "" ? 
											' data-bgposition="' . $bgoptions[2] . '"' :
											null,

										"masterspeed" =>
											isset($ssd[1]) && $ssd[1] != "" ? 
											' data-masterspeed="' . $ssd[1] . '"' :
											null,

										"delay" =>
											isset($ssd[2]) && $ssd[2] != "" ? 
											' data-delay="' . $ssd[2] . '"' :
											null,

										"link" =>
											isset($sld_link[0]) && $sld_link[0] != "" ? 
											' data-link="' . $sld_link[0] . '"' :
											null,

										"linkopen" =>
											isset($sld_link[1]) && $sld_link[0] != "" ? 
											' data-linkopen="' . $sld_link[1] . '"' :
											null
					);
				}
				foreach ($this->data['slides'][$revoslider['mod_id']]['slide_config'] as $result) {
					$this->data['slides'][$revoslider['mod_id']]['slide_attr'][$result['slide_id']] = 
						$result['transition'] .
						$result['slotamount'] .
						$result['masterspeed'] .
						$result['delay'] .
						$result['link'] .
						$result['linkopen'];
				}
			}
		}
		
		/* JS configuration
		******************************/
		$this->data['js_config'] = array();
		foreach($this->data['RGen_revoslider'] as $revoslider){
			$this->data['js_config'][$revoslider['mod_id']] = array(
				'mod_id' => $revoslider['mod_id'],

				'fullWidth' => 
					isset($revoslider['sliderType']) && $revoslider['sliderType'] == "fw" ? 
					'fullWidth: "' . 'on' . '",' : 
					'fullWidth: "' . 'off' . '",',

				'fullScreen' => 
					isset($revoslider['sliderType']) && $revoslider['sliderType'] == "fs" ? 
					'fullScreen: "' . 'on' . '",' : 
					'fullScreen: "' . 'off' . '",',

				'fullScreenOffsetContainer' => 
					isset($revoslider['fullScreenOffsetContainer']) && $revoslider['fullScreenOffsetContainer'] != "" ? 
					'fullScreenOffsetContainer: "' . $revoslider['fullScreenOffsetContainer'] . '",' : 
					null,

				'delay' => 
					isset($revoslider['delay']) && $revoslider['delay'] != "" ? 
					'delay: ' . $revoslider['delay'] . ',' : 
					'delay: ' . 5000 . ',',

				'onHoverStop' => 
					isset($revoslider['onHoverStop']) && $revoslider['onHoverStop'] != "" ? 
					'onHoverStop: "' . $revoslider['onHoverStop'] . '",' : 
					'onHoverStop: "' . 'off' . '",',

				'startwidth' => 
					isset($revoslider['startwidth']) && $revoslider['startwidth'] != "" ? 
					'startwidth: ' . $revoslider['startwidth'] . ',' : 
					'startwidth: ' . '1170' . ',',
					
				'startheight' => 
					isset($revoslider['startheight']) && $revoslider['startheight'] != ""? 
					'startheight: ' . $revoslider['startheight'] . ',' : 
					'startheight: ' . '600' . ',',

				'hideCaptionAtLimit' => 
					isset($revoslider['hideCaptionAtLimit']) &&  $revoslider['hideCaptionAtLimit'] != "" ? 
					'hideCaptionAtLimit: ' . $revoslider['hideCaptionAtLimit'] . ',' : 
					'hideCaptionAtLimit: ' . '0' . ',',

				'hideAllCaptionAtLilmit' => 
					isset($revoslider['hideAllCaptionAtLilmit']) &&  $revoslider['hideAllCaptionAtLilmit'] != "" ? 
					'hideAllCaptionAtLilmit: ' . $revoslider['hideAllCaptionAtLilmit'] . ',' : 
					'hideAllCaptionAtLilmit: ' . '0' . ',',
					
				'hideSliderAtLimit' => 
					isset($revoslider['hideSliderAtLimit']) &&  $revoslider['hideSliderAtLimit'] != "" ? 
					'hideSliderAtLimit: ' . $revoslider['hideSliderAtLimit'] . ',' : 
					'hideSliderAtLimit: ' . '0' . ','
			);
		}
		$this->data['js'] = array();
		foreach ($this->data['js_config'] as $result) {
			$this->data['js'][$result['mod_id']] = 
				/*$result['fullWidth'] . 
				$result['fullScreen'] . */
				/*$result['fullScreenOffsetContainer'] . */
				$result['delay'] . 
				$result['onHoverStop'] . 
				/*$result['startwidth'] . 
				$result['startheight'] . */
				$result['hideCaptionAtLimit'] . 
				$result['hideAllCaptionAtLilmit'] . 
				$result['hideSliderAtLimit']
			;
		}
		
		// All slider data 
		$this->data['js'];
		$this->data['slides'];
		$this->data['captions'];
		$this->data['cp_attr'];
		$this->data['cp_style'];
		
		/*echo "<pre style='color:#fff;'> Js data ==> <br>" . print_r($this->data['js'], TRUE) . "</pre>";
		echo "<pre style='color:#fff;'> Slide data ==> <br>" . print_r($this->data['slides'], TRUE) . "</pre>";
		echo "<pre style='color:#fff;'> Caption data ==> <br>" . print_r($this->data['captions'], TRUE) . "</pre>";
		echo "<pre style='color:#fff;'> Caption attributes ==> <br>" . print_r($this->data['cp_attr'], TRUE) . "</pre>";
		echo "<pre style='color:#fff;'> Caption style data ==> <br>" . print_r($this->data['cp_style'], TRUE) . "</pre>";*/

		/* Caption style data
		******************************/
		$this->data['cpstyles'] = $this->model_rgen_rgenrevoslider->getRGen("revo_cp_styles");
		$this->data['css_config'] = array();
		foreach ($this->data['RGen_revoslider'][$this->data['setting']['mod_id']]['slides'] as $slide_data) {
			if(isset($slide_data['captions'])){
			foreach($slide_data['captions'] as $cp_data){
				foreach ($this->data['cpstyles'] as $key => $value) {
					if (isset($cp_data['cptext_cssclass'])) {
						if ($value['classname'] == $cp_data['cptext_cssclass']) {
							$this->data['css_config'][$this->data['setting']['mod_id']][$value['classname']] = array(
								'css' => isset($value['css']) ? $value['css'] : null,
								'fonturl_val' => isset($value['fonturl']) && $value['fonturl'] != '' ? $value['fonturl'] : null,
								'fonturl' => isset($value['fonturl']) && $value['fonturl'] != '' ? $this->document->addStyle($value['fonturl']) : null,
								'classname' => isset($value['classname']) ? $value['classname'] : null
							);
						}
					}
				}
				
			}
			}
		}
		/*echo "<pre style='color:#fff;'> Setting data ==> <br>" . print_r($this->data['css_config'], TRUE) . "</pre>";
		echo "<pre style='color:#fff;'> Js data ==> <br>" . print_r($this->data['cpstyles'], TRUE) . "</pre>";*/
		
		$this->document->RGen_revoslider = $this->data['RGen_revoslider'];
	} 
}
?>