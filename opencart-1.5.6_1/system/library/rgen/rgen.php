<?php
require_once(DIR_SYSTEM . 'library/rgen/minify.class.php');
require_once(DIR_SYSTEM . 'library/rgen/Mobile_Detect.php');

class rgen {
	public $min;
	public $cssFiles = array();
	public $jsFiles = array();
	public $device = 'd';

	public function __construct() {
		$detectDevice = new Mobile_Detect();
		if($detectDevice->isMobile()) {
			if ($detectDevice->isTablet()) {
				$this->device = 't';
			} else {
				$this->device = 'm';
			}
		}
	}

	public function getRoute(){
		$getRoute = isset($this->request->get['route']) ? $this->request->get['route'] : 'common/home';
		return $getRoute;
	}
	
	public function group($data){
		$group = implode(',', $data);
		return $group;
	}

	public function minHTML($data){
		$re = '%# Collapse whitespace everywhere but in blacklisted elements.
		(?>             # Match all whitespans other than single space.
		[^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
		| \s{2,}        # or two or more consecutive-any-whitespace.
		) # Note: The remaining regex consumes no text at all...
		(?=             # Ensure we are not in a blacklist tag.
		[^<]*+        # Either zero or more non-"<" {normal*}
		(?:           # Begin {(special normal*)*} construct
		<           # or a < starting a non-blacklist tag.
		(?!/?(?:textarea|pre|script)\b)
		[^<]*+      # more non-"<" {normal*}
		)*+           # Finish "unrolling-the-loop"
		(?:           # Begin alternation group.
		<           # Either a blacklist start tag.
		(?>textarea|pre|script)\b
		| \z          # or end of file.
		)             # End alternation group.
		)  # If we made it here, we are not in a blacklist tag.
		%Six';

		return $output = preg_replace($re, " ", $data);

	}

	/*=================================================================
	CSS MANIFY */

	// ASSETS FUNCTIONS 
	public function cssGroup($filePath){
		$this->cssFiles[] = $filePath;
	}

	public function minCSS($cssfiles) {
		$minFileName = md5(implode('-', $cssfiles));
		$CSSFiles = $cssfiles;
		$min = new minify;
		$CSSFile = $min->compress('css', $CSSFiles, 'catalog/view/theme/rgen-opencart/stylesheet/cached_'.$minFileName.'_rgmin.css');
		return 'catalog/view/theme/rgen-opencart/stylesheet/cached_'.$minFileName.'_rgmin.css';
	}

	public function clearCSS() {
		$path = str_replace('admin/view/template/', 'catalog/view/theme/', DIR_TEMPLATE);
		$files = glob($path.'rgen-opencart/stylesheet/*_rgmin.css');
		if ($files) {
			foreach ($files as $file) {
				if (file_exists($file)) {
					unlink($file);
				}
			}
		}
	}

	/*=================================================================
	JS MANIFY */

	// ASSETS FUNCTIONS 
	public function jsGroup($filePath){
		$this->jsFiles[] = $filePath;
	}

	public function minJS($jsfiles) {
		$minFileName = md5(implode('-', $jsfiles));
		$JSFiles = $jsfiles;
		$min = new minify;
		$JSFiles = $min->compress('js', $JSFiles, 'catalog/view/theme/rgen-opencart/js/cached_'.$minFileName.'_rgmin.js');
		return 'catalog/view/theme/rgen-opencart/js/cached_'.$minFileName.'_rgmin.js';
	}

	public function clearJS() {
		$path = str_replace('admin/view/template/', 'catalog/view/theme/', DIR_TEMPLATE);
		$files = glob($path.'rgen-opencart/js/*_rgmin.js');
		if ($files) {
			foreach ($files as $file) {
				if (file_exists($file)) {
					unlink($file);
				}
			}
		}
	}

	/*=================================================================*/

	public function removeAll($theme, $folder) {
		$path = str_replace('admin/view/template/', 'catalog/view/theme/', DIR_TEMPLATE);
		$files = glob($path . $theme.'/rgen-cache'.$folder.'/*');
		if (is_dir($path . $theme.'/rgen-cache'.$folder)) {
			if ($files) {
				foreach ($files as $file) {
					if (file_exists($file)) {
						unlink($file);
					}
				}
			}
		}else{
			return 'not found';
		}
	}

	public function removeFile($theme, $file) {
		$path = str_replace('admin/view/template/', 'catalog/view/theme/', DIR_TEMPLATE);
		$file = $path . $theme.'/rgen-cache'.$file;
		if (file_exists($file)) {
			unlink($file);
		}
	}


	// CACHING FUNCTIONS
	public function cacheFile($fileData, $cachefile){
		if ($cachefile != '') {
			$fp = fopen($cachefile, 'w');
			fwrite($fp, $fileData);
			fclose($fp);
		}
	}

	public function cacheFilePath($theme, $dir, $file){
		if (is_dir(DIR_TEMPLATE . $theme.'/rgen-cache/'.$dir.'/')) {
			$cache_file = DIR_TEMPLATE . $theme.'/rgen-cache/'.$dir.'/'.$file.'.tpl';
			return  $cache_file;
		}
	}

	public function getCache($theme, $dir, $key) {
		$file = DIR_TEMPLATE . $theme.'/rgen-cache/'.$dir.'/cache.'.$key;
		if (file_exists($file)) { 
			$cache = file_get_contents($file);
			$data = unserialize($cache);
			return $data;
		}
	}

	public function setCache($theme, $dir, $key, $value) {
		$file = DIR_TEMPLATE . $theme.'/rgen-cache/'.$dir.'/cache.'.$key;
		$this->delete($file);

		$handle = fopen($file, 'w');
		fwrite($handle, serialize($value));
		fclose($handle);
	}

	public function delete($file) {
		if (file_exists($file)) { unlink($file); }
	}

	/*public function testfunction(){
		$files = glob('catalog/view/theme/rgen-opencart/stylesheet/*_rgmin.css');
		$files = glob('catalog/view/theme/rgen-opencart/js/*_rgmin.js');
		echo "<pre>".print_r($files,true)."</pre>";
	}*/
}