<?php 
	class Frontend_Controller extends MX_Controller {
		protected $template;
		public function __construct(){
			parent::__construct();
			$this->load->model("AdminModel");
			$this->loadTemplate();
			//define('THEMESPATH', '');
		}
		
		public function render($title, $theme, $data=null) 
		{
			if (is_array($theme)) {
				foreach ($theme as $key => $value) {
					$this->load->view($this->template.$key,$value);
				}
			} else {
				$arrSosmed = [
						"facebook" => $this->AdminModel->getKey("facebook")->value,
						"twitter" => $this->AdminModel->getKey("twitter")->value,
						"instagram" => $this->AdminModel->getKey("instagram")->value,
						"youtube" => $this->AdminModel->getKey("youtube")->value,
				];
				$p['themes'] = [
					'title' => $title,
					'css' => base_url('assets/css/'),
					'js' => base_url('assets/js/'),
					'images' => base_url('images/'),
				];
				$p["sosmed"] = $arrSosmed;
				$themes = array();
				$this->render($title,
				[
					'_part/header' => $p,
					$theme => $data,
					'_part/footer' => $p,
				]				
				);
			}
			
		}
		
		private function loadTemplate()
		{
			$template = $this->AdminModel->getTemplate('template');
			if ($template == null) {
				$template = $this->config->item('template');
			} else {
				$this->config->set_item('template', $template);
			}
			if (!is_dir(TEMPLATES_DIR . $template)) {
				show_error('The selected template does not exists!');
			}
			$this->template = 'templates' . DIRECTORY_SEPARATOR . $template . DIRECTORY_SEPARATOR;
			define('THEMESPATH', $this->template);
		}

		public function getTgl($tgl,$f){
			$tgl = new DateTime($tgl);
			return $tgl->format($f);
		}

		public function create_slug($string){
			$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
			$slug=preg_replace('/ /', '-', $slug);
			return strtolower($slug);
		}
	}