<?php 
class ControllerStudioUploadArt extends Controller { 
	public function index() {

		$this->load->language('studio/upload_art');

		$this->data['heading_title']  = $this->language->get('heading_title');
		$this->data['text_copyright'] = $this->language->get('text_copyright');
		$this->data['text_browse']    = $this->language->get('text_browse');
		$this->data['text_select_colors']    = $this->language->get('text_select_colors');
		$this->data['text_below_colors']    = $this->language->get('text_below_colors');
		$this->data['text_background']    = $this->language->get('text_background');		
		$this->data['button_cancel']  = $this->language->get('button_cancel');
		$this->data['button_agree']   = $this->language->get('button_agree');
		$this->data['button_upload']  = $this->language->get('button_upload');
		$this->data['button_change_image']  = $this->language->get('button_change_image');
		$this->data['button_apply']  = $this->language->get('button_apply');
		$this->data['button_remove_color']  = $this->language->get('button_remove_color');
		$this->data['button_cancel_remove_color']  = $this->language->get('button_cancel_remove_color');

		$this->load->model('opentshirts/design_color');
		$this->data['colors'] = $this->model_opentshirts_design_color->getColors(); 

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/studio/upload_art.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/studio/upload_art.tpl';
		} else {
			$this->template = 'default/template/studio/upload_art.tpl';
		}
		
		$this->response->setOutput($this->render());
  	}

  	public function upload_image() {
		
		$this->language->load('studio/upload_art');
		
		$json = array();
		
		if (!empty($this->request->files['file']['name'])) {
			$filename = html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8');
			
			$allowed = array();
			
			$filetypes = explode(',', 'jpg,png,gif,JPG');
			
			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}
			
			if (!in_array(utf8_substr(strrchr($filename, '.'), 1), $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
       		}
						
			if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
			}
		} else {
			$json['error'] = $this->language->get('error_upload');
		}
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && !isset($json['error'])) {
			if (is_uploaded_file($this->request->files['file']['tmp_name']) && file_exists($this->request->files['file']['tmp_name'])) {
				$file = substr(md5(rand()), 0, 8) . '-' . basename($filename) ;
				
				if(move_uploaded_file($this->request->files['file']['tmp_name'], DIR_IMAGE . 'data/bitmaps/' . $file))
				{
					$json['filename'] = $file;
					
					$this->load->model('tool/image');
					$json['thumb'] = $this->model_tool_image->resize('data/bitmaps/' .$file, 300, 300);

					$this->load->model('opentshirts/bitmap');
					$json['id_bitmap'] = $this->model_opentshirts_bitmap->addCustomerBitmap(array('name' => $file, 'image_file' => $file));

					$json['file_original'] = 'image/data/bitmaps/'.$file;
					
					$json['success'] = $this->language->get('text_upload');
				} else {
					$json['error'] = $this->language->get('error_upload');
				}
			
			}
		}	

		$this->response->setOutput(json_encode($json));		
	}
}
?>