<?php
Class User extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->permission_user(array("admin"),false);
		$this->load->model("AdminModel");
		$this->load->library("encrypt");

	}

	public function tambah($id="") {
		if ($id <> "") {
			$row = $this->AdminModel->getID($id);
			if ($row) {
				$data["user"] = $row;
			} else {
				redirect($this->adminurl."/admin/user/add");
			}
		}

		$post_data = $this->input->post(null,true);
		if ($post_data) {
			if ($post_data["action"] == "new") {
				if ($post_data["password1"] == $post_data["password2"]) {
					$enc = md5($post_data["password1"]);
            		$pass_enc = $this->encrypt->encode($enc);
					$arrdata = [
						"nama" => $post_data["nama"],
						"email" => $post_data["email"],
						"username" => $post_data["username"],
						"password" => $pass_enc,
					];
					$query = $this->AdminModel->addUser("user",$arrdata);
					if ($query) {
						$data["success"] = "Berhasil Menambahkan User ". $post_data["nama"];
					}
				}
			}
			elseif ($post_data["action"] == "edit") {
				if ($post_data["password1"] <> "" or $post_data["password2"] <> "") {
					if ($post_data["password1"] == $post_data["password2"]) {
						$enc = md5($post_data["password1"]);
            			$pass_enc = $this->encrypt->encode($enc);
						$arrdata["password"] =  $pass_enc;
					} else {
						$data["warning"] = "Password and Confirmation Password not same";
					}
				}
				$arrdata["nama"] = $post_data["nama"];
				$arrdata["email"] = $post_data["email"];
				$arrdata["username"] = $post_data["username"];
				$query = $this->AdminModel->updateUser("user", $id, $arrdata);
				if ($query) {
					$data["success"] = "Berhasil Update User ". $row->nama;
					$row = $this->AdminModel->getID($id);
					$data["user"] = $row;
				}
				 
			}
		}
		$q = urldecode($this->input->get("q",TRUE));
		$start = intval($this->input->get('page'));
		if ($q <> '') {
            $config['base_url'] = base_url() .  $this->adminurl.'/admin/user/add?q=' . urlencode($q);
            $config['first_url'] = base_url() .  $this->adminurl.'/admin/user/add?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() .  $this->adminurl.'/admin/user/add';
            $config['first_url'] = base_url() . $this->adminurl.'/admin/user/add';
        }
        $config['per_page'] = 10;
        if ($start <> 0) {
            $start = ($start-1) * $config['per_page'];
        }
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $level_user = $this->get_level();
		if ($level_user == "user") {
			$id_user = $this->get_userID();
		} else {
			$id_user = "";
		}
        $total = $this->AdminModel->countUser($q);
        $config['total_rows'] = $total;
        $list = $this->AdminModel->getUser($config["per_page"], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data["list"] = $list;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $start;
        $data['q'] = $q;
        if ($id <> "") {
        	$title ="Edit User";
        	$content="adminarea/user_edit";
        } else {
        	$content="adminarea/user_add";
        	$title ="Add User";
        }
		$this->render(
			$title,
			$content,
			$data= $data
		);
	}


	public function delete($id){
		$row = $this->AdminModel->getID($id);
		if ($row) {
			$this->session->set_flashdata('message', 'Deleted <i>"' . $row->nama . '"</i> Sukses');
			$this->AdminModel->deleteUser("user",$id);
			redirect($this->adminurl."/admin/user/add");
		} else {
			redirect($this->adminurl."/admin/user/add");
		}
		
	}
} 