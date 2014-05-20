<?php 
class ModelRGenRGentheme extends Model {

	public function install() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_theme` (
			`store_id` int(11) NOT NULL DEFAULT "0",
			`group` varchar(32) NOT NULL,
			`key` varchar(64) NOT NULL,
			`value` mediumtext NOT NULL,
			`serialized` tinyint(1) NOT NULL,
			PRIMARY KEY (`key`)
		)ENGINE=MyISAM DEFAULT CHARSET=utf8;';
		$this->db->query($sql);
	}
	
	public function uninstall() {
		$sql = 'DROP TABLE IF EXISTS `' . DB_PREFIX . 'rgen_theme`';
		$this->db->query($sql);
	}

	public function getRGen($group, $store_id = 0) {
		$this->install();
		
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
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
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `key` = '" . $this->db->escape($key) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}
		return $data;
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
	
	public function insertRGen($group, $data, $store_id = 0) {
		//$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_theme SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rgen_theme SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(serialize($value)) . "', serialized = '1'");
			}
		}
	}
	
	public function deleteRGen($group, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
	}

	public function deleteRGenValue($key, $store_id = 0) {
		//$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `key= '" . $this->db->escape($key) . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "rgen_theme WHERE store_id = '" . (int)$store_id . "' AND `key` = '" . $this->db->escape($key) . "'");
	}
	
	public function editRGenValue($key = '', $value = '', $store_id = 0) {
		
		if (!is_array($value)) {
			$this->db->query("UPDATE `" . DB_PREFIX . "rgen_theme` SET  `value` = '" . $this->db->escape($value) . "' WHERE  `" . DB_PREFIX . "rgen_theme`.`key` ='" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
		} else {
			$this->db->query("UPDATE `" . DB_PREFIX . "rgen_theme` SET  `value` = '" . $this->db->escape(serialize($value)) . "' WHERE  `" . DB_PREFIX . "rgen_theme`.`key` ='" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
		}
	}
	public function editRGenSettingValue($key = '', $value = '', $store_id = 0) {
		
		if (!is_array($value)) {
			//echo "<pre style='color:;'>SQL If function ==> " . print_r($key, TRUE) . "</pre>";
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET  `value` = '" . $this->db->escape($value) . "' WHERE  `" . DB_PREFIX . "setting`.`key` ='" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
		} else {
			//echo "<pre style='color:;'>SQL Else function ==> " . print_r($key, TRUE) . "</pre>";
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET  `value` = '" . $this->db->escape(serialize($value)) . "' WHERE  `" . DB_PREFIX . "setting`.`key` ='" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
		}
	}
	
}
?>