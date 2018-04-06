<?php

class Reportsosmed extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
        $this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('ReportModel');
	}

	public function index() {
        $level_user = $this->get_level();
        if ($level_user == "user") {
            $id_user = $this->get_userID();
            $view_content = "report/report_sosmed";
        } else {
            $id_user = "";
            $view_content = "report/report_sosmed_admin";
            $data["listuser"] = $this->ReportModel->getUser();
        }

		$post_data = $this->input->post(null,true);
		if (isset($post_data["sendreport"])) {
			$this->_rules();
            if ($this->form_validation->run() === TRUE) {
                if(!filter_var($post_data["link_attach"], FILTER_VALIDATE_URL)) {
                    $data["warning"] = "URL Attach Invalid";
                    $this->render(
                        $title ="Report Tim Social Media",
                        $content= $view_content,
                        $data = $data
                    );
                    return false;
                }
                $dateTime = new DateTime("now", new DateTimeZone('Asia/Makassar'));
                $tgl_now = $dateTime->format('Y-m-d');
                $id_user = $this->get_userID();
                $arrdata = [
                    "facebook" => $post_data["fb_count"],
                    "twitter" => $post_data["twitter_count"],
                    "instagram_story" => $post_data["instastory_count"],
                    "instagram_post" => $post_data["insta_count"],
                    "line_broadcast" => $post_data["linebc_count"],
                    "line_post" => $post_data["line_count"],
                    "youtube" => $post_data["youtube_count"],
                    "link_attach" => $post_data["link_attach"],
                    "tanggal" => $tgl_now,
                    "user_id" => $id_user,
                ];
                $query = $this->ReportModel->insertDB($arrdata);
                if ($query) {
                    $data["sukses"] = "Send Report Successfully";
                }
            } else {
            	$data["warning"] = "Isi Semua Data";
            }
		}

        //S:Paging
        $q = urldecode($this->input->get("q",TRUE));
        $start = intval($this->input->get('page'));
        if ($q <> '') {
            $config['base_url'] = base_url() .  $this->adminurl.'/report?q=' . urlencode($q);
            $config['first_url'] = base_url() .  $this->adminurl.'/report?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() .  $this->adminurl.'/report';
            $config['first_url'] = base_url() . $this->adminurl.'/report';
        }
        $config['per_page'] = 20;
        if ($start <> 0) {
            $start = ($start-1) * $config['per_page'];
        }
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        if (isset($post_data["getreport"]) and ($level_user <> "user")) {
            $from = "{$post_data["year_form"]}-{$post_data["month_from"]}-{$post_data["day_from"]} 00:00:00";
            $to = "{$post_data["year_to"]}-{$post_data["month_to"]}-{$post_data["day_to"]} 23:59:59";
            $data["post"] = $post_data;
            $id_user_search = $post_data["user_id"];
            $list = $this->ReportModel->getReport($id_user_search, 0, $start, $from, $to);
        } else {
            $list = $this->ReportModel->getReport($id_user, $config["per_page"], $start);
        }
        $config['total_rows'] = $list["total_rows"];
        $count_all = 0;
        foreach ($list['result'] as $key => $value) {
            $strtanggal = date_create($value->tanggal);
            $value->tanggal = $strtanggal->format("d F Y");
            $value->instagram = intval($value->instagram_story) + intval($value->instagram_post);
            $value->line = intval($value->line_broadcast) + intval($value->line_post);
            $count_all = $count_all + (intval($value->instagram) + intval($value->line ) + intval($value->facebook) + intval($value->twitter) + intval($value->youtube));
        }
        $data["count_all"] = $count_all;
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data["list"] = $list["result"];
        $data['pagination'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $start;
        $data['q'] = $q;
        //E:Paging
        
		$this->render(
			$title ="Report Tim Social Media",
			$content= $view_content,
			$data = $data
		);
	}

    public function hapus($id) {
        $row = $this->ReportModel->getId($id);
        if ($row) {
            $level_user = $this->get_level();
            if ($level_user == "user") {
                $id_user = $this->get_userID();
                if ($id_user <> $row->user_id) {
                    $this->session->set_flashdata('message', 'Not Allowed Delete it');
                    redirect(base_url($this->adminurl.'/report'));
                    exit;
                } else {
                    $strtanggal = date_create($row->tanggal);
                    $row->tanggal = $strtanggal->format("d F Y");
                    $this->session->set_flashdata('message', 'Delete Report Date <i>'. $row->tanggal. '</i> Success');
                    $this->ReportModel->delete($id);
                    redirect(base_url($this->adminurl.'/report'));
                }
            } else {
                $strtanggal = date_create($row->tanggal);
                $row->tanggal = $strtanggal->format("d F Y");
                $this->session->set_flashdata('message', 'Delete Report Date <i>'. $row->tanggal. '</i> Success');
                $this->ReportModel->delete($id);
                redirect(base_url($this->adminurl.'/report'));
            }
        } else {
            redirect(base_url($this->adminurl.'/report'));
        }
    }

	private function _rules() {
		$form_wajib = array(
            array('field' => 'fb_count', 'label' => 'fb_count', 'rules' => 'trim|required',),
            array('field' => 'twitter_count', 'label' => 'twitter_count', 'rules' => 'trim|required',),
            array('field' => 'instastory_count', 'label' => 'instastory_count', 'rules' => 'trim|required',),
            array('field' => 'insta_count', 'label' => 'insta_count', 'rules' => 'trim|required',),
            array('field' => 'linebc_count', 'label' => 'linebc_count', 'rules' => 'trim|required',),
            array('field' => 'line_count', 'label' => 'line_count', 'rules' => 'trim|required',),
            array('field' => 'link_attach', 'label' => 'link_attach', 'rules' => 'trim|required',),
        );
        $this->form_validation->set_rules($form_wajib);
	}
}