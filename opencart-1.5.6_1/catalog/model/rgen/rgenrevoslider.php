<?php
class ModelRGenRGenRevoSlider extends Model {
	
	public function install() {
		$sql = 'CREATE TABLE IF NOT EXISTS`' . DB_PREFIX . 'rgen_revoslider` (
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

	public function getRGen($group, $store_id = 0) {
		$this->install();
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rgen_revoslider WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}

		return $data;
	}
	
}

?>