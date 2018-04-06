<?php
class Ajax extends ADMIN_Controller {

	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->load->model('ToolsModel');
	}

	public function getcatname()
	{
		if(isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
			$str = urldecode($this->input->get('term',true));
			if ($str) {
				$str = urldecode($this->input->get('term',true));
				if ($str) {
					$result = $this->ToolsModel->getName($str);
					header('Content-Type: application/json');
					echo json_encode($result, JSON_PRETTY_PRINT);
				}
			}
		} else {
			header("HTTP/1.0 404 Not Found");
			die();
		}
	}
}