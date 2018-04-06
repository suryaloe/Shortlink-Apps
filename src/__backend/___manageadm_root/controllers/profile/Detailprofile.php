<?php
Class Detailprofile extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->load->model("ProfileModel");
		$this->load->library("encrypt");

	}

	public function index(){
		$level = $this->get_level();
		$id_user = $this->get_userID();
		if ($level == "user") {
			$row = $this->ProfileModel->getID("user",$id_user);
		}
		elseif ($level == "admin") {
			$row = $this->ProfileModel->getID("admin",$id_user);			
		}
		$data["profile"] = $row;
		$this->render(
			$title ="View Profile",
			$content="profile/detail",
			$data= $data
		);
	}
}