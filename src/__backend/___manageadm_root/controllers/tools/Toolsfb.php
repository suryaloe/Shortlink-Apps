<?php 

class Toolsfb extends ADMIN_Controller {

	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->load->model('ToolsModel');
	}

	public function fbgroup()
	{
		$postdata = $this->input->post(null, true);
		if ($postdata) {
			$get = $this->ToolsModel->getbyName($postdata['cat']);
			if ($get) {
				$category = $get->id;
			} else {
				$newcat = $this->ToolsModel->insertCat($postdata['cat']);
				$category = $newcat;
			}
			$id_user = $this->get_userID();
			$arrdata = [
				"link" => trim($postdata['link']),
				"category" => $category,
				'user' => $id_user
			];
			$query = $this->ToolsModel->insertGroup($arrdata);
			if ($query) {
				$data["success"] = "Success Add Group";
			}
		}
		$data['script_js'] = '<script src="'.ASSETSADMIN_URL.'js/jQueryUI/jquery-ui.js"></script>';
		/*Start Pagination*/
		$q = urldecode($this->input->get("q",TRUE));
		$start = intval($this->input->get('page'));
		if ($q <> '') {
            $config['base_url'] = base_url() .  $this->adminurl.'/tools/fbgroup?q=' . urlencode($q);
            $config['first_url'] = base_url() .  $this->adminurl.'/tools/fbgroup?q?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() .  $this->adminurl.'/tools/fbgroup';
            $config['first_url'] = base_url() . $this->adminurl.'/tools/fbgroup';
        }
        $config['per_page'] = 15;
        if ($start <> 0) {
            $start = ($start-1) * $config['per_page'];
        }
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $total = $this->ToolsModel->countgetGroup($q);
        $config['total_rows'] = $total;
        $list = $this->ToolsModel->getGroup($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data["list"] = $list;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $start;
        $data['q'] = $q;
		/*Stop Pagination*/
		$this->render(
			$title ="Facebook Group Database",
			$content="tools/fbgroup",
			$data= $data
		);
	}

	public function fbgroupdel($id)
	{
		$row = $this->ToolsModel->getbyId($id);
		if ($row) {
			$id_user = $this->get_userID();
			$level_user = $this->get_level();
			if ($level_user == "user") {
				if ($id_user == $row->user) {
					$this->ToolsModel->deleteGroup($id);
					$this->session->set_flashdata('message', 'Delete Group FB Success');
	            	redirect(base_url($this->adminurl.'/tools/fbgroup'));
				} else {
					$this->session->set_flashdata('warning', 'Not Allowed Delete');
	            	redirect(base_url($this->adminurl.'/tools/fbgroup'));
				}				
			} else {
				$this->ToolsModel->deleteGroup($id);
				$this->session->set_flashdata('message', 'Delete Group FB Success');
	            redirect(base_url($this->adminurl.'/tools/fbgroup'));
			}
			

		} else {
			$this->session->set_flashdata('warning', 'Not Found');
            redirect(base_url($this->adminurl.'/tools/fbgroup'));
		}
	}

	public function postfb()
	{

	}


	public function linkads()
	{

	}

}