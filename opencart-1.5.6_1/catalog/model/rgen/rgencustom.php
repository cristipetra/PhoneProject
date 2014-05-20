<?php 
class ModelRgenRgencustom extends Model {
	public function install() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_custom` (
			`rgen_id` int(11) NOT NULL AUTO_INCREMENT,
			`store_id` int(11) NOT NULL DEFAULT "0",
			`group` varchar(32) NOT NULL,
			`key` varchar(64) NOT NULL,
			`value` mediumtext NOT NULL,
			`serialized` tinyint(1) NOT NULL,
			PRIMARY KEY (`rgen_id`)
		)ENGINE=MyISAM DEFAULT CHARSET=utf8;';
		$this->db->query($sql);
	}

	public function installDataTable() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_custom_description` (
			`rgen_id` int(11) NOT NULL AUTO_INCREMENT,
			`language_id` int(11) NOT NULL DEFAULT "1",
			`mod_id` varchar(32) NOT NULL,
			`group` varchar(32) NOT NULL,
			`value` mediumtext NOT NULL,
			PRIMARY KEY (`rgen_id`)
		)ENGINE=MyISAM DEFAULT CHARSET=utf8;';
		$this->db->query($sql);
	}

	public function getRGen($group, $store_id = 0) {
		/*$this->install();
		$this->installDataTable();*/
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_custom WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}

		return $data;
	}

	public function getRGenCustomMod($key, $store_id = 0) {
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_custom WHERE store_id = '" . (int)$store_id . "' AND `key` = '" . $this->db->escape($key) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}
		return $data;
	}

	public function descriptionGet($mod_id) {
		$data = array(); 

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_custom_description WHERE mod_id = '" . $this->db->escape($mod_id) . "'");
		foreach ($query->rows as $result) {
			if (isset($result['title'])) {
				$data['title'][$result['language_id']] = $result['title'];
			}
			$data['description'][$result['language_id']] = $result['value'];
		}

		return $data;
	}

}
?>