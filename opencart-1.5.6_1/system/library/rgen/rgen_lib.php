<?php
if ($this->registry->get('config')->get('config_template') === 'rgen-opencart') {
	
	$rgen_ver = "v3.04";
	$ver = $this->config->get('rgen_theme_version');
	if(!isset($ver) && $ver == "") {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "setting`(`group`, `key`, `value`) VALUES ('rgen_theme','rgen_theme_version','" . $rgen_ver . "')");
	}
	if($ver != $rgen_ver || isset($ver) && $ver == "") {
		$this->db->query("UPDATE  `" . DB_PREFIX . "setting` SET  `value` =  '" . $rgen_ver . "' WHERE  `key` =  'rgen_theme_version'");
	}

	require_once(DIR_SYSTEM . 'library/rgen/rgen.php');
	$rgen = new rgen();
	$this->registry->set('rgen', $rgen);
}

?>