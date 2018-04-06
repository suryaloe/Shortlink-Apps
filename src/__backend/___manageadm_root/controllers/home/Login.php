<?php
//Dashboard Home Backend

class Login extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("LoginModel");
		$this->load->library('encrypt');
	}
	public function index() {
		$post_data = $this->input->post(null,true);
		if ($post_data) {
			if ($post_data["action"] == "login") {
				if ($post_data["user"] <> "" or $post_data["pass"] <> "") {
					$user = $post_data["user"];
					$pass = $post_data["pass"];
					//$enc = md5($pass);
            		//echo $this->encrypt->encode($enc);
            		//
					$check = $this->LoginModel->cek_user("user",$user);
					if ($check) {
						$decode = $this->encrypt->decode($check->password);
						if ( md5($pass) == $decode ) {
							//Jika Password User & Password Benar
							$this->LoginModel->updateLast("user", $check->id);
							$arrdata = array(
		                        "id"  => $check->id,
		                        "user"  => $check->username,
		                        "logged_in" => $check->username,
		                        "nama"  => $check->nama,
		                        "pass"  => $check->password,
		                        "level" => "user",
		                    );
		                    $this->session->set_userdata($arrdata);
	                    	redirect(base_url($this->adminurl));
						} else { $data["warning"] = "User or Password incorrect"; }

					} else {
						$check = array();
						$check = $this->LoginModel->cek_user("admin",$user);
						if ($check) {
							$decode = $this->encrypt->decode($check->password);
							if ( md5($pass) == $decode ) {
								//Jia Password User Admin & Password Admin Benar
								$this->LoginModel->updateLast("admin", $check->id);
								$arrdata = array(
			                        "id"  => $check->id,
			                        "user"  => $check->username,
			                        "logged_in" => $check->username,
			                        "nama"  => "ADMIN",
			                        "pass"  => $check->password,
			                        "level" => $check->level,
			                    );
			                    $this->session->set_userdata($arrdata);
		                    	redirect(base_url($this->adminurl));
							} else { $data["warning"] = "User or Password incorrect"; }
						} else {
							$data["warning"] = "User or Password incorrect";
						}
					}


				} else {
					$data["warning"] = "Please Insert User and Password";
				}
			}
		}
		$data["data"] = "";
		$this->render(
			$title ="Login to Dashboard",
			$content="login",
			$data= $data,
			true
		);
	}

	public function logout(){
		$this->session->sess_destroy();
		$arrdata = array( "id","user","logged_in","level","nama","pass",);
        $this->session->unset_userdata($arrdata);
        redirect(base_url($this->adminurl. "/login"));
	}
}