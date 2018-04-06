<?php
//Dashboard Home Backend

class Home extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
	}
	public function index() {
		$data["data"] = "";
		$this->render(
			$title ="Dashboard",
			$content="home",
			$data= $data
		);
	}
}