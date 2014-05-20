<?php 
class ModelRgenRgenmegamenu extends Model {
	
	/********************************************
	DESCRIPTION FUNCTIONS */
	public function installDataTable() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_megamenu_description` (
			`rgen_id` int(11) NOT NULL AUTO_INCREMENT,
			`language_id` int(11) NOT NULL DEFAULT "1",
			`mod_id` varchar(32) NOT NULL,
			`group` varchar(32) NOT NULL,
			`value` mediumtext NOT NULL,
			PRIMARY KEY (`rgen_id`)
		)ENGINE=MyISAM DEFAULT CHARSET=utf8;';
		$this->db->query($sql);
	}
	
	public function descriptionAdd($mod_id, $group, $data) {
		foreach ($data as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "rgen_megamenu_description` SET `language_id` = '" . (int)$language_id . "', `mod_id` = '" . $this->db->escape($mod_id) . "', `group` = '" . $this->db->escape($group) . "', `value` = '" . $this->db->escape($value) . "'");
		}
	}

	public function descriptionEdit($mod_id, $group, $data) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_megamenu_description WHERE mod_id = '" . $this->db->escape($mod_id) . "'");
		foreach ($data as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "rgen_megamenu_description` SET `language_id` = '" . (int)$language_id . "', `mod_id` = '" . $this->db->escape($mod_id) . "', `group` = '" . $this->db->escape($group) . "', `value` = '" . $this->db->escape($value) . "'");
		}
	}

	public function descriptionDelete($mod_id) {
		echo "<pre style='color:;'>" . print_r($mod_id, TRUE) . "</pre>";
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_megamenu_description WHERE mod_id = '" . $this->db->escape($mod_id) . "'");
	}

	public function descriptionGet($mod_id) {
		$data = array(); 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_megamenu_description WHERE mod_id = '" . $this->db->escape($mod_id) . "'");
		foreach ($query->rows as $result) {
			$data[$result['language_id']] = $result['value'];
		}
		return $data;
	}
	public function allDescriptionGet($group) {
		$data = array(); 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_megamenu_description WHERE `group` = '" . $this->db->escape($group) . "'");
		foreach ($query->rows as $result) {
			$menuID = explode('-', $result['mod_id']);
			/*
			$menuID[0] = Menu ID (rgen_menu1)
			$menuID[1] = Menu type (cat_normal)
			$menuID[2] = DATA position (t)
			*/
			if ($menuID[1] == "htmlData") {
				$data[$menuID[0]][$menuID[1]][$result['language_id']] = $result['value'];
			}else{
				$data[$menuID[0]][$menuID[1]][$menuID[2]][$result['language_id']] = $result['value'];
			}
		}
		return $data;
	}
	/*********************************************/

	public function install() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_megamenu` (
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

	public function uninstall() {
		$sql = 'DROP TABLE IF EXISTS `' . DB_PREFIX . 'rgen_megamenu`';
		$this->db->query($sql);
	}

	public function LastID($limit = 1) {
		$data = array(); 
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rgen_megamenu` ORDER BY `rgen_id` DESC LIMIT " . (int)$limit . "");
		foreach ($query->rows as $result) {
			$data = $result['rgen_id'];
		}
		return $data;
	}

	public function getRGen($group, $store_id = 0) {
		$this->install();
		
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_megamenu WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}

		return $data;
	}

	public function getRGenValue($key, $store_id = 0) {
		$data = array(); 
		//SELECT * FROM `oc_rgen_megamenu` WHERE store_id = 0 AND `key` = 'rgen_megamenu_module1'
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_megamenu WHERE store_id = '" . (int)$store_id . "' AND `key` = '" . $this->db->escape($key) . "'");
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}
		return $data;
	}

	public function insertRGen($group, $data, $store_id = 0) {
		//$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		foreach ($data as $key => $value) {
			echo "<pre style='color:;'>This is sql query function ==> " . print_r($key, TRUE) . "</pre>";
			if (!is_array($value)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_megamenu SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_megamenu SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(serialize($value)) . "', serialized = '1'");
			}
		}
	}

	public function addRGenSetting($group, $data, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");

		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(serialize($value)) . "', serialized = '1'");
			}
		}
	}
	public function editRGenSetting($group = '', $key = '', $value = '', $store_id = 0) {
		if (!is_array($value)) {
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND `store_id` = '" . (int)$store_id . "'");
		} else {
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `value` = '" . $this->db->escape(serialize($value)) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND `store_id` = '" . (int)$store_id . "'");
		}
	}
	
	public function editRGen($group, $data, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_megamenu WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");

		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_megamenu SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_megamenu SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(serialize($value)) . "', serialized = '1'");
			}
		}
	}
	
	public function deleteRGen($group, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_megamenu WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
	}

	public function deleteRGenValue($key, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_megamenu WHERE store_id = '" . (int)$store_id . "' AND `key` = '" . $this->db->escape($key) . "'");
	}
	
	public function editRGenValue($group = '', $key = '', $value = '', $store_id = 0) {
		if (!is_array($value)) {
			//echo "<pre style='color:;'> SQL QUEARY ==> " . print_r($value, TRUE) . "</pre>";
			//$this->db->query("UPDATE " . DB_PREFIX . "rgen_megamenu SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
			$this->db->query("UPDATE `" . DB_PREFIX . "rgen_megamenu` SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND `store_id` = '" . (int)$store_id . "'");
		} else {
			//echo "<pre style='color:;'>ELSE SQL QUEARY ==> " . print_r($value, TRUE) . "</pre>";

			//$this->db->query("UPDATE " . DB_PREFIX . "rgen_megamenu SET `value` = '" . $this->db->escape(serialize($value)) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "', serialized = '1'");
			$this->db->query("UPDATE `" . DB_PREFIX . "rgen_megamenu` SET `value` = '" . $this->db->escape(serialize($value)) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND `store_id` = '" . (int)$store_id . "'");
		}
	}	
}
?>