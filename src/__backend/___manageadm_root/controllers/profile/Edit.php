<?php
Class Edit extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->load->model("ProfileModel");
		$this->load->library("encrypt");

	}
	public function index() {
		$level = $this->get_level();
		$id_user = $this->get_userID();
		if ($level == "user") {
			$row = $this->ProfileModel->getID("user",$id_user);
		}
		elseif ($level == "admin") {
			$row = $this->ProfileModel->getID("admin",$id_user);			
		}
		$data["profile"] = $row;
		$post_data = $this->input->post(null,true);
		if ($post_data) {
			//S:level user
			if ($level == "user") {
				$arrdata = [
					"nama" => $post_data["nama"],
					"email" => $post_data["email"],
				];
				if ($post_data["password1"] <> "" or $post_data["password2"] <> "" or $post_data["oldpassword"]) {
					if ($post_data["password1"] == $post_data["password2"]) {
						//cek old password
						$decode = $this->encrypt->decode($row->password);
						if ( md5($post_data["oldpassword"]) == $decode ) {
							$enc = md5($post_data["password1"]);
            				$pass_enc = $this->encrypt->encode($enc);
							$arrdata["password"] = $pass_enc;
						} else {
							$data["warning"] = "Old Password Wrong";
						}
					} else {
						$data["warning"] = "Password New and Confirmation Password New not same";
					}
				}
				$query = $this->ProfileModel->updateUser("user", $row->id, $arrdata);
				if ($query) { 
					$data["success"] = "Berhasil Update Profile"; 
					$row = $this->ProfileModel->getID("user",$id_user);
					$data["profile"] = $row;
				}
			}
			//E:level user
			//S:level admin
			elseif ($level == "admin") {
				$arrdata["email"] = $post_data["email"];
				if ($post_data["password1"] <> "" or $post_data["password2"] <> "" or $post_data["oldpassword"]) {
					if ($post_data["password1"] == $post_data["password2"]) {
						//cek old password
						$decode = $this->encrypt->decode($row->password);
						if ( md5($post_data["oldpassword"]) == $decode ) {
							$enc = md5($post_data["password1"]);
            				$pass_enc = $this->encrypt->encode($enc);
							$arrdata["password"] = $pass_enc;
						} else {
							$data["warning"] = "Old Password Wrong";
						}
					} else {
						$data["warning"] = "Password New and Confirmation Password New not same";
					}
				}
				$query = $this->ProfileModel->updateUser("admin", $row->id, $arrdata);
				if ($query) { 
					$data["success"] = "Berhasil Update Profile"; 
					$row = $this->ProfileModel->getID("admin",$id_user);
					$data["profile"] = $row;
				}
			}
			//E:level admin
		}
		$this->render(
			$title ="Update Profile",
			$content="profile/edit",
			$data= $data
		);
	}
}