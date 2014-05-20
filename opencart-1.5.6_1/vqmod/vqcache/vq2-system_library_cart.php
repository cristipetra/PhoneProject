<?php
class Cart {
	private $config;
	private $db;
	private $data = array();
	private $data_recurring = array();

  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->customer = $registry->get('customer');
		$this->session = $registry->get('session');
		$this->db = $registry->get('db');
		$this->tax = $registry->get('tax');
		$this->weight = $registry->get('weight');

		if (!isset($this->session->data['cart']) || !is_array($this->session->data['cart'])) {
      		$this->session->data['cart'] = array();
    	}
	}
	      
  	public function getProducts() {
		if (!$this->data) {
			foreach ($this->session->data['cart'] as $key => $quantity) {
				$product = explode(':', $key);
				$product_id = $product[0];

				if(!is_numeric($product_id)) {
					continue;
				}

			
				$stock = true;
	
				// Options
				if (!empty($product[1])) {
					$options = unserialize(base64_decode($product[1]));
				} else {
					$options = array();
				} 
                
                // Profile
                
                if (!empty($product[2])) {
                    $profile_id = $product[2];
                } else {
                    $profile_id = 0;
                }
				
				$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");
				
				if ($product_query->num_rows) {
					$option_price = 0;
					$option_points = 0;
					$option_weight = 0;
	
					$option_data = array();
	
					foreach ($options as $product_option_id => $option_value) {
						$option_query = $this->db->query("SELECT po.product_option_id, po.option_id, od.name, o.type FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_option_id = '" . (int)$product_option_id . "' AND po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");
						
						if ($option_query->num_rows) {
							if ($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio' || $option_query->row['type'] == 'image') {
								$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$option_value . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
								
								if ($option_value_query->num_rows) {
									if ($option_value_query->row['price_prefix'] == '+') {
										$option_price += $option_value_query->row['price'];
									} elseif ($option_value_query->row['price_prefix'] == '-') {
										$option_price -= $option_value_query->row['price'];
									}
	
									if ($option_value_query->row['points_prefix'] == '+') {
										$option_points += $option_value_query->row['points'];
									} elseif ($option_value_query->row['points_prefix'] == '-') {
										$option_points -= $option_value_query->row['points'];
									}
																
									if ($option_value_query->row['weight_prefix'] == '+') {
										$option_weight += $option_value_query->row['weight'];
									} elseif ($option_value_query->row['weight_prefix'] == '-') {
										$option_weight -= $option_value_query->row['weight'];
									}
									
									if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
										$stock = false;
									}
									
									$option_data[] = array(
										'product_option_id'       => $product_option_id,
										'product_option_value_id' => $option_value,
										'option_id'               => $option_query->row['option_id'],
										'option_value_id'         => $option_value_query->row['option_value_id'],
										'name'                    => $option_query->row['name'],
										'option_value'            => $option_value_query->row['name'],
										'type'                    => $option_query->row['type'],
										'quantity'                => $option_value_query->row['quantity'],
										'subtract'                => $option_value_query->row['subtract'],
										'price'                   => $option_value_query->row['price'],
										'price_prefix'            => $option_value_query->row['price_prefix'],
										'points'                  => $option_value_query->row['points'],
										'points_prefix'           => $option_value_query->row['points_prefix'],									
										'weight'                  => $option_value_query->row['weight'],
										'weight_prefix'           => $option_value_query->row['weight_prefix']
									);								
								}
							} elseif ($option_query->row['type'] == 'checkbox' && is_array($option_value)) {
								foreach ($option_value as $product_option_value_id) {
									$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
									
									if ($option_value_query->num_rows) {
										if ($option_value_query->row['price_prefix'] == '+') {
											$option_price += $option_value_query->row['price'];
										} elseif ($option_value_query->row['price_prefix'] == '-') {
											$option_price -= $option_value_query->row['price'];
										}
	
										if ($option_value_query->row['points_prefix'] == '+') {
											$option_points += $option_value_query->row['points'];
										} elseif ($option_value_query->row['points_prefix'] == '-') {
											$option_points -= $option_value_query->row['points'];
										}
																	
										if ($option_value_query->row['weight_prefix'] == '+') {
											$option_weight += $option_value_query->row['weight'];
										} elseif ($option_value_query->row['weight_prefix'] == '-') {
											$option_weight -= $option_value_query->row['weight'];
										}
										
										if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
											$stock = false;
										}
										
										$option_data[] = array(
											'product_option_id'       => $product_option_id,
											'product_option_value_id' => $product_option_value_id,
											'option_id'               => $option_query->row['option_id'],
											'option_value_id'         => $option_value_query->row['option_value_id'],
											'name'                    => $option_query->row['name'],
											'option_value'            => $option_value_query->row['name'],
											'type'                    => $option_query->row['type'],
											'quantity'                => $option_value_query->row['quantity'],
											'subtract'                => $option_value_query->row['subtract'],
											'price'                   => $option_value_query->row['price'],
											'price_prefix'            => $option_value_query->row['price_prefix'],
											'points'                  => $option_value_query->row['points'],
											'points_prefix'           => $option_value_query->row['points_prefix'],
											'weight'                  => $option_value_query->row['weight'],
											'weight_prefix'           => $option_value_query->row['weight_prefix']
										);								
									}
								}						
							} elseif ($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
								$option_data[] = array(
									'product_option_id'       => $product_option_id,
									'product_option_value_id' => '',
									'option_id'               => $option_query->row['option_id'],
									'option_value_id'         => '',
									'name'                    => $option_query->row['name'],
									'option_value'            => $option_value,
									'type'                    => $option_query->row['type'],
									'quantity'                => '',
									'subtract'                => '',
									'price'                   => '',
									'price_prefix'            => '',
									'points'                  => '',
									'points_prefix'           => '',								
									'weight'                  => '',
									'weight_prefix'           => ''
								);						
							}
						}
					} 
				
					if ($this->customer->isLogged()) {
						$customer_group_id = $this->customer->getCustomerGroupId();
					} else {
						$customer_group_id = $this->config->get('config_customer_group_id');
					}
					
					$price = $product_query->row['price'];
					
					// Product Discounts
					$discount_quantity = 0;
					
					foreach ($this->session->data['cart'] as $key_2 => $quantity_2) {
						$product_2 = explode(':', $key_2);
						
						if ($product_2[0] == $product_id) {
							$discount_quantity += $quantity_2;
						}
					}
					
					$product_discount_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND quantity <= '" . (int)$discount_quantity . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity DESC, priority ASC, price ASC LIMIT 1");
					
					if ($product_discount_query->num_rows) {
						$price = $product_discount_query->row['price'];
					}
					
					// Product Specials
					$product_special_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC, price ASC LIMIT 1");
				
					if ($product_special_query->num_rows) {
						$price = $product_special_query->row['price'];
					}						
			
					// Reward Points
					$product_reward_query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");
					
					if ($product_reward_query->num_rows) {	
						$reward = $product_reward_query->row['points'];
					} else {
						$reward = 0;
					}
					
					// Downloads		
					$download_data = array();     		
					
					$download_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download p2d LEFT JOIN " . DB_PREFIX . "download d ON (p2d.download_id = d.download_id) LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE p2d.product_id = '" . (int)$product_id . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
				
					foreach ($download_query->rows as $download) {
						$download_data[] = array(
							'download_id' => $download['download_id'],
							'name'        => $download['name'],
							'filename'    => $download['filename'],
							'mask'        => $download['mask'],
							'remaining'   => $download['remaining']
						);
					}
					
					// Stock
					if (!$product_query->row['quantity'] || ($product_query->row['quantity'] < $quantity)) {
						$stock = false;
					}
                    
                    $recurring = false;
                    $recurring_frequency = 0;
                    $recurring_price = 0;
                    $recurring_cycle = 0;
                    $recurring_duration = 0;
                    $recurring_trial_status = 0;
                    $recurring_trial_price = 0;
                    $recurring_trial_cycle = 0;
                    $recurring_trial_duration = 0;
                    $recurring_trial_frequency = 0;
                    $profile_name = '';
                    
                    if ($profile_id) {
                        $profile_info = $this->db->query("SELECT * FROM `" . DB_PREFIX . "profile` `p` JOIN `" . DB_PREFIX . "product_profile` `pp` ON `pp`.`profile_id` = `p`.`profile_id` AND `pp`.`product_id` = " . (int) $product_query->row['product_id'] . " JOIN `" . DB_PREFIX . "profile_description` `pd` ON `pd`.`profile_id` = `p`.`profile_id` AND `pd`.`language_id` = " . (int) $this->config->get('config_language_id') . " WHERE `pp`.`profile_id` = " . (int) $profile_id . " AND `status` = 1 AND `pp`.`customer_group_id` = " . (int) $customer_group_id)->row;
                        
                        if ($profile_info) {
                            $profile_name = $profile_info['name'];
                            
                            $recurring = true;
                            $recurring_frequency = $profile_info['frequency'];
                            $recurring_price = $profile_info['price'];
                            $recurring_cycle = $profile_info['cycle'];
                            $recurring_duration = $profile_info['duration'];
                            $recurring_trial_frequency = $profile_info['trial_frequency'];
                            $recurring_trial_status = $profile_info['trial_status'];
                            $recurring_trial_price = $profile_info['trial_price'];
                            $recurring_trial_cycle = $profile_info['trial_cycle'];
                            $recurring_trial_duration = $profile_info['trial_duration'];
                        }
                    }
					
					$this->data[$key] = array(
						'key'                       => $key,
						'product_id'                => $product_query->row['product_id'],
						'name'                      => $product_query->row['name'],
						'model'                     => $product_query->row['model'],
						'shipping'                  => $product_query->row['shipping'],
						'image'                     => $product_query->row['image'],
						'option'                    => $option_data,
						'download'                  => $download_data,
						'quantity'                  => $quantity,
						'minimum'                   => $product_query->row['minimum'],
						'subtract'                  => $product_query->row['subtract'],
						'stock'                     => $stock,
						'price'                     => ($price + $option_price),
						'total'                     => ($price + $option_price) * $quantity,
						'reward'                    => $reward * $quantity,
						'points'                    => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $quantity : 0),
						'tax_class_id'              => $product_query->row['tax_class_id'],
						'weight'                    => ($product_query->row['weight'] + $option_weight) * $quantity,
						'weight_class_id'           => $product_query->row['weight_class_id'],
						'length'                    => $product_query->row['length'],
						'width'                     => $product_query->row['width'],
						'height'                    => $product_query->row['height'],
						'length_class_id'           => $product_query->row['length_class_id'],
                        'profile_id'                => $profile_id,
                        'profile_name'              => $profile_name,
                        'recurring'                 => $recurring,
                        'recurring_frequency'       => $recurring_frequency,
                        'recurring_price'           => $recurring_price,
                        'recurring_cycle'           => $recurring_cycle,
                        'recurring_duration'        => $recurring_duration,
                        'recurring_trial'           => $recurring_trial_status,
                        'recurring_trial_frequency' => $recurring_trial_frequency,
                        'recurring_trial_price'     => $recurring_trial_price,
                        'recurring_trial_cycle'     => $recurring_trial_cycle,
                        'recurring_trial_duration'  => $recurring_trial_duration,
					);
				} else {
					$this->remove($key);
				}
			}
		}


		/* -------- CUSTOM CART --------- */

		foreach ($this->session->data['cart'] as $key => $quantity) {
			

			$composition = explode(':', $key);
			$id_composition = $composition[0];

			if(is_numeric($id_composition)) {
				continue;
			}

			$stock = true;
		
			// Options
			if (isset($composition[1])) {
				$options = unserialize(base64_decode($composition[1]));
			} else {
				//echo("options for printable product not defined: ");
			} 

			// Profile
                
            /*if (!empty($product[2])) {
                $profile_id = $product[2];
            } else {
                $profile_id = 0;
            }*/ 
            $profile_id = 0;
			
			$composition_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "composition c LEFT JOIN " . DB_PREFIX . "design d ON (c.id_composition = d.id_composition) WHERE c.id_composition = '" . $id_composition . "' AND c.deleted = '0' AND c.editable = '1' ");

			if ($composition_query->num_rows) {
				$product_id = $composition_query->row['product_id'];

				$flag_remove = false;

				$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");
				if(!$product_query->num_rows) {
					$this->remove($key);
				}
				$option_price = 0;
				$option_points = 0;
				$option_weight = 0;
		
				$option_data = array();

				// Product Discounts
				$amount_products = 0;
				
				foreach ($this->session->data['cart'] as $key_2 => $quantity_2) {
					$product_2 = explode(':', $key_2);
					
					if ($product_2[0] == $id_composition) {
						$amount_products += $quantity_2;
					}
				}

				$color_groups_prices = array();
				$query_quantity_index = $this->db->query("SELECT quantity_index FROM " . DB_PREFIX . "printable_product_quantity WHERE product_id='" . (int)$product_id . "' AND quantity <= " . (int)$amount_products . " ORDER BY quantity DESC LIMIT 1 ");
				if($query_quantity_index->num_rows==0) {
					$flag_remove = true;
				} else {
					$quantity_index = $query_quantity_index->row["quantity_index"]; //column to take prices from
					$query_price = $this->db->query("SELECT price, id_product_color_group FROM " . DB_PREFIX . "printable_product_quantity_price WHERE product_id='" . (int)$product_id . "' AND quantity_index='" . (int)$quantity_index . "' ");
					if($query_price->num_rows==0) {
						$flag_remove = true;
					} else {
						foreach ($query_price->rows as $result) {
							$color_groups_prices[$result['id_product_color_group']] = $result["price"];
						}
					}
				}

				$product_color_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "printable_product_color WHERE id_product_color = '" . $options['id_product_color']. "' AND deleted = '0'");
				if(!$product_color_query->num_rows) {
					$flag_remove = true;
				}
				$product_color_data = $product_color_query->row;

				///product color
				if(isset($color_groups_prices[$product_color_data['id_product_color_group']])) {
		    		$option_price += $color_groups_prices[$product_color_data['id_product_color_group']];
		    	}

				$option_data[] = array(
					'product_option_id'       => '',
					'product_option_value_id' => '',
					'option_id'               => '',
					'option_value_id'         => '',
					'name'                    => 'Product Color',
					'option_value'            => $product_color_data['name'],
					'type'                    => '',
					'quantity'                => '',
					'subtract'                => '',
					'price'                   => '0',
					'price_prefix'            => '+',
					'points'                  => '0',
					'points_prefix'           => '+',								
					'weight'                  => '0',
					'weight_prefix'           => '+'
				);

				$product_size_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "printable_product_size WHERE id_product_size = '" . $options['id_product_size']. "' AND deleted = '0'");
				if(!$product_size_query->num_rows) {
					$flag_remove = true;
				}
				$product_size_data = $product_size_query->row;

				$query = $this->db->query("SELECT id_product_size, upcharge FROM " . DB_PREFIX . "printable_product_size_upcharge WHERE product_id = '" . (int)$product_id . "' ");
				$upcharge = array();
				foreach ($query->rows as $result) {
					$upcharge[$result["id_product_size"]] = $result["upcharge"];
		    	}
		    	if(isset($upcharge[$options['id_product_size']])) {
		    		$option_price += $upcharge[$options['id_product_size']];
		    	}

				///product size
				$option_data[] = array(
					'product_option_id'       => '',
					'product_option_value_id' => '',
					'option_id'               => '',
					'option_value_id'         => '',
					'name'                    => 'Product Size',
					'option_value'            => $product_size_data['description'],
					'type'                    => '',
					'quantity'                => '',
					'subtract'                => '',
					'price'                   => (isset($upcharge[$options['id_product_size']]))?$upcharge[$options['id_product_size']]:'0',
					'price_prefix'            => '+',
					'points'                  => '0',
					'points_prefix'           => '+',								
					'weight'                  => '0',
					'weight_prefix'           => '+'
				);


				///get printing price
				require_once(DIR_SYSTEM . 'library/' . $options['printing_method'] . "_cart.php");

				$class = preg_replace('/[^a-zA-Z0-9]/', '', $options['printing_method']) . 'Cart';

				$controller = new $class($this->config, $this->session, $this->db, $this->data);

				$printing_data = $controller->getPrintData($key);
				
				if($printing_data['flag_remove']) {
					$flag_remove = true;
				} else {
					$option_price += $printing_data['option_price'];
					$option_data = array_merge($option_data, $printing_data['option_data']);
				}			


				if ($this->customer->isLogged()) {
					$customer_group_id = $this->customer->getCustomerGroupId();
				} else {
					$customer_group_id = $this->config->get('config_customer_group_id');
				}
				
				$price = 0;
		
				// Reward Points
				$product_reward_query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");
				
				if ($product_reward_query->num_rows) {	
					$reward = $product_reward_query->row['points'];
				} else {
					$reward = 0;
				}
				
				// Downloads		
				$download_data = array();     		
				
				/*$download_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download p2d LEFT JOIN " . DB_PREFIX . "download d ON (p2d.download_id = d.download_id) LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE p2d.product_id = '" . (int)$product_id . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
			
				foreach ($download_query->rows as $download) {
					$download_data[] = array(
						'download_id' => $download['download_id'],
						'name'        => $download['name'],
						'filename'    => $download['filename'],
						'mask'        => $download['mask'],
						'remaining'   => $download['remaining']
					);
				}*/
				
				// Stock
				/*if (!$product_query->row['quantity'] || ($product_query->row['quantity'] < $quantity)) {
					$stock = false;
				}*/

				$recurring = false;
                $recurring_frequency = 0;
                $recurring_price = 0;
                $recurring_cycle = 0;
                $recurring_duration = 0;
                $recurring_trial_status = 0;
                $recurring_trial_price = 0;
                $recurring_trial_cycle = 0;
                $recurring_trial_duration = 0;
                $recurring_trial_frequency = 0;
                $profile_name = '';
                
                /*if ($profile_id) {
                    $profile_info = $this->db->query("SELECT * FROM `" . DB_PREFIX . "profile` `p` JOIN `" . DB_PREFIX . "product_profile` `pp` ON `pp`.`profile_id` = `p`.`profile_id` AND `pp`.`product_id` = " . (int) $product_query->row['product_id'] . " JOIN `" . DB_PREFIX . "profile_description` `pd` ON `pd`.`profile_id` = `p`.`profile_id` AND `pd`.`language_id` = " . (int) $this->config->get('config_language_id') . " WHERE `pp`.`profile_id` = " . (int) $profile_id . " AND `status` = 1 AND `pp`.`customer_group_id` = " . (int) $customer_group_id)->row;
                    
                    if ($profile_info) {
                        $profile_name = $profile_info['name'];
                        
                        $recurring = true;
                        $recurring_frequency = $profile_info['frequency'];
                        $recurring_price = $profile_info['price'];
                        $recurring_cycle = $profile_info['cycle'];
                        $recurring_duration = $profile_info['duration'];
                        $recurring_trial_frequency = $profile_info['trial_frequency'];
                        $recurring_trial_status = $profile_info['trial_status'];
                        $recurring_trial_price = $profile_info['trial_price'];
                        $recurring_trial_cycle = $profile_info['trial_cycle'];
                        $recurring_trial_duration = $profile_info['trial_duration'];
                    }
                }*/

				if ($flag_remove === true) {
					$this->remove($key);
				} else {
					$this->data[$key] = array(
						'key'             => $key,
						'id_composition'  => $composition_query->row['id_composition'] ,
						'product_id'      => $product_query->row['product_id'],
						'name'            => $composition_query->row['name'] . ' on ' . $product_query->row['name'],
						'model'           => $product_query->row['model'],
						'shipping'        => $product_query->row['shipping'],
						'image'           => 'data/designs/design_' . $composition_query->rows[0]['id_design'] . '/design_image.png',
						'option'          => $option_data,
						'download'        => $download_data,
						'quantity'        => $quantity,
						'minimum'         => $product_query->row['minimum'],
						'subtract'        => $product_query->row['subtract'],
						'stock'           => $stock,
						'price'           => ($price + $option_price),
						'total'           => ($price + $option_price) * $quantity,
						'reward'          => $reward * $quantity,
						'points'          => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $quantity : 0),
						'tax_class_id'    => $product_query->row['tax_class_id'],
						'weight'          => ($product_query->row['weight'] + $option_weight) * $quantity,
						'weight_class_id' => $product_query->row['weight_class_id'],
						'length'          => $product_query->row['length'],
						'width'           => $product_query->row['width'],
						'height'          => $product_query->row['height'],
						'length_class_id' => $product_query->row['length_class_id'],
						'profile_id'                => $profile_id,
                        'profile_name'              => $profile_name,
                        'recurring'                 => $recurring,
                        'recurring_frequency'       => $recurring_frequency,
                        'recurring_price'           => $recurring_price,
                        'recurring_cycle'           => $recurring_cycle,
                        'recurring_duration'        => $recurring_duration,
                        'recurring_trial'           => $recurring_trial_status,
                        'recurring_trial_frequency' => $recurring_trial_frequency,
                        'recurring_trial_price'     => $recurring_trial_price,
                        'recurring_trial_cycle'     => $recurring_trial_cycle,
                        'recurring_trial_duration'  => $recurring_trial_duration,				
					);
				}
			} else {
				$this->remove($key);
			}
		}

		/* -------- END CUSTOM CART --------- */
			
		return $this->data;
  	}

    public function getRecurringProducts(){
        $recurring_products = array();
        
        foreach ($this->getProducts() as $key => $value) {
            if ($value['recurring']) {
                $recurring_products[$key] = $value;
            }
        }
        
        return $recurring_products;
    }
		  
  	public function add($product_id, $qty = 1, $option, $profile_id) {
        $key = (int) $product_id . ':';
        
        if ($option) {
            $key .= base64_encode(serialize($option)) . ':';
        }  else {
            $key .= ':';
        }
        
        if ($profile_id) {
            $key .= (int) $profile_id;
        }

        if ((int) $qty && ((int) $qty > 0)) {
            if (!isset($this->session->data['cart'][$key])) {
                $this->session->data['cart'][$key] = (int) $qty;
            } else {
                $this->session->data['cart'][$key] += (int) $qty;
            }
        }

        $this->data = array();
  	}



  	public function addPrintable($id_composition, $qty = 1, $option = array()) {

    	if (!$option) {
      		$key = $id_composition;
    	} else {
      		$key = $id_composition . ':' . base64_encode(serialize($option));
    	}
    	
		if ((int)$qty && ((int)$qty > 0)) {
    		if (!isset($this->session->data['cart'][$key])) {
      			$this->session->data['cart'][$key] = (int)$qty;
    		} else {
      			$this->session->data['cart'][$key] += (int)$qty;
    		}
		}
		
		$this->data = array();
  	}

			
  	public function update($key, $qty) {
    	if ((int)$qty && ((int)$qty > 0)) {
      		$this->session->data['cart'][$key] = (int)$qty;
    	} else {
	  		$this->remove($key);
		}
		
		$this->data = array();
  	}

  	public function remove($key) {
		if (isset($this->session->data['cart'][$key])) {
     		unset($this->session->data['cart'][$key]);
  		}
		
		$this->data = array();
	}
	
  	public function clear() {
		$this->session->data['cart'] = array();
		$this->data = array();
  	}
	
  	public function getWeight() {
		$weight = 0;
	
    	foreach ($this->getProducts() as $product) {
			if ($product['shipping']) {
      			$weight += $this->weight->convert($product['weight'], $product['weight_class_id'], $this->config->get('config_weight_class_id'));
			}
		}
	
		return $weight;
	}
	
  	public function getSubTotal() {
		$total = 0;
		
		foreach ($this->getProducts() as $product) {
			$total += $product['total'];
		}

		return $total;
  	}
	
	public function getTaxes() {
		$tax_data = array();
		
		foreach ($this->getProducts() as $product) {
			if ($product['tax_class_id']) {
				$tax_rates = $this->tax->getRates($product['price'], $product['tax_class_id']);
				
				foreach ($tax_rates as $tax_rate) {
					if (!isset($tax_data[$tax_rate['tax_rate_id']])) {
						$tax_data[$tax_rate['tax_rate_id']] = ($tax_rate['amount'] * $product['quantity']);
					} else {
						$tax_data[$tax_rate['tax_rate_id']] += ($tax_rate['amount'] * $product['quantity']);
					}
				}
			}
		}
		
		return $tax_data;
  	}

  	public function getTotal() {
		$total = 0;
		
		foreach ($this->getProducts() as $product) {
			$total += $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'];
		}

		return $total;
  	}
	  	
  	public function countProducts() {
		$product_total = 0;
			
		$products = $this->getProducts();
			
		foreach ($products as $product) {
			$product_total += $product['quantity'];
		}		
					
		return $product_total;
	}
	  
  	public function hasProducts() {
    	return count($this->session->data['cart']);
  	}

    public function hasRecurringProducts(){
        return count($this->getRecurringProducts());
    }
  
  	public function hasStock() {
		$stock = true;
		
		foreach ($this->getProducts() as $product) {
			if (!$product['stock']) {
	    		$stock = false;
			}
		}
		
    	return $stock;
  	}
  
  	public function hasShipping() {
		$shipping = false;
		
		foreach ($this->getProducts() as $product) {
	  		if ($product['shipping']) {
	    		$shipping = true;
				
				break;
	  		}		
		}
		
		return $shipping;
	}
	
  	public function hasDownload() {
		$download = false;
		
		foreach ($this->getProducts() as $product) {
	  		if ($product['download']) {
	    		$download = true;
				
				break;
	  		}		
		}
		
		return $download;
	}	
}
?>