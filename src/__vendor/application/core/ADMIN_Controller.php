<?php
class ADMIN_Controller extends MX_Controller
{
	protected $username;
	public $adminurl;
	protected $level;
	protected $nama;

	public function __construct() {
		parent::__construct();
		$this->load->config("backend");
		$this->load->library('session');
		$this->adminurl = $this->config->item('admin_url');
		$this->title = $this->config->item('title');
		define('ADMIN_URL', base_url($this->adminurl."/"));
		define('ASSETSADMIN_URL', base_url("assets_admin")."/");

	}

	public function render($title, $content, $data, $single = false) {
		if ($single == false) {
			$data["title"] = $title . " - " . $this->title;
			$this->load->view("___template_backend/header",$data);
			$this->load->view("___template_backend/menu", $data);
			$this->load->view($content,$data);
			$this->load->view("___template_backend/footer", $data);
		} else {
			$data["title"] = $title . " - " . $this->title;
			$this->load->view($content, $data);
		}
	}

	protected function login_check() {
		if (!$this->session->userdata('logged_in')) {
            redirect($this->adminurl."/login");
        }
        $this->username = $this->session->userdata('logged_in');
        $this->level = $this->session->userdata('level');
        $this->nama = $this->session->userdata('nama');
	}

	protected function get_userID() {
		if (!$this->session->userdata('id')) {
            redirect($this->adminurl."/login");
        }
        return $this->session->userdata('id');
	}

	protected function get_level(){
		if (!$this->session->userdata('logged_in')) {
            redirect($this->adminurl."/login");
        }
        return $this->level;
	}

	protected function get_nama(){
		if (!$this->session->userdata('logged_in')) {
            redirect($this->adminurl."/login");
        }
        return $this->nama;
	}

	protected function permission_user($level,$return = true) {
		$ok = 0;
		foreach ($level as $l) {
			if ($l == $this->level) {
				$ok = 1;
			}
		}
		if ($ok == 0) { 
			if ($return) {
				return false;
			} else {
				echo "Not Allowed User ";
				echo '<input action="action" onclick="window.history.go(-1); return false;" type="button" value="Back" />';
				exit;
			}
			
		}
		else { return true; }
	}
}