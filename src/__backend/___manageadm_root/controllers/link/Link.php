<?php

class Link extends ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->login_check();
		$this->load->model("LinkModel");
	}

	public function index()
	{
		$level_user = $this->get_level();
		if ($level_user == "user") {
			$id_user = $this->get_userID();
		} else {
			$id_user = "";
		}
		
		$list = $this->LinkModel->getListURL($id_user, 5);
		foreach ($list as $key => $value) {
			$value->shortcut = str_replace("http://","",base_url($value->shortcut));
			$strtanggal = date_create($value->created_date);
			$value->tanggal = $strtanggal->format("d F Y H:i");
		}

		$data["list_url"] = $list;
		$this->render(
			$title ="Add Short URL",
			$content="link/add",
			$data= $data
		);
	}

	public function add(){
		$post_data = $this->input->post(null,true);
		if ($post_data) {
			if (isset($post_data["original_url"])) {
				$original_url = $post_data["original_url"];
				if (filter_var($original_url, FILTER_VALIDATE_URL) === FALSE) {
					header('Content-Type: application/json');
    				$response["status"] = "failed";
    				echo json_encode($response, JSON_PRETTY_PRINT);
    				return false;
				}
				$level_user = $this->get_level();
				if ($level_user == "user") {
					$id_user = $this->get_userID();	
				} else {
					$id_user = 0;	
				}
				
				$rand_link = $this->random_str();
				$check_link = $this->LinkModel->checkShortcut($rand_link);
				if ($check_link) {
					do {
					    $rand_link = $this->random_str();
						$check_link = $this->LinkModel->checkShortcut($rand_link);
					} while (!$check_link);
				}

				//S:InsertDB
				$dateTime = new DateTime("now", new DateTimeZone('Asia/Makassar'));
				$tgl_now = $dateTime->format('Y-m-d H:i:s');
				if (strpos($original_url, '?') !== false) {
					$original_url .= '&utm_source=rkytk&utm_medium=share&utm_campaign='.$this->get_userID(); 
				} else {
					$original_url .= '?utm_source=rkytk&utm_medium=share&utm_campaign='.$this->get_userID(); 
				}
				
			    $arrdata = [
			    	"created_date" => $tgl_now,
			    	"user_id" => $id_user,
			    	"count" => 0,
			    	"shortcut" => $rand_link,
			    	"original_url" => $original_url,
			    ];
			    $query = $this->LinkModel->insertDB($arrdata);
			    if ($query) {
			    	$response["status"] = "success";
			    	$strtanggal = date_create($tgl_now);
			    	$response["data"]["link"] = base_url("/".$rand_link);
			    	$response["data"]["original"] = $original_url;
        			$response["data"]["date"] = $strtanggal->format("d F Y H:i");

			    } else {
			    	$response["status"] = "failed";
			    }
			} else {

			}
		} else {
			$response["status"] = "failed";
		}
		
	    
	    header('Content-Type: application/json');
	    echo json_encode($response, JSON_PRETTY_PRINT);
		//E:InsertDB

	}

	public function daftar(){
		$q = urldecode($this->input->get("q",TRUE));
		$start = intval($this->input->get('page'));
		if ($q <> '') {
            $config['base_url'] = base_url() .  $this->adminurl.'/link/list?q=' . urlencode($q);
            $config['first_url'] = base_url() .  $this->adminurl.'/link/list?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() .  $this->adminurl.'/link/list';
            $config['first_url'] = base_url() . $this->adminurl.'/link/list';
        }
        $config['per_page'] = 20;
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
        $total = $this->LinkModel->countListURL($id_user,$q);
        $config['total_rows'] = $total;
        $list = $this->LinkModel->getListURL($id_user, $config["per_page"], $start, $q);
        foreach ($list as $key => $value) {
			$value->shortcut = str_replace("http://","",base_url($value->shortcut));
			$strtanggal = date_create($value->created_date);
			$value->tanggal = $strtanggal->format("d/m/Y H:i");
		}
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data["list"] = $list;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $start;
        $data['q'] = $q;
        $data["script_js"] = '<script type="text/javascript" src="'.ASSETSADMIN_URL.'js/bootstrap-table.js"></script>';
		$this->render(
			$title ="List Short URL",
			$content="link/list",
			$data= $data
		);
	}

	public function report(){
		$level_user = $this->get_level();
		if ($level_user == "user") {
			$id_user = $this->get_userID();
			$data["listuser"] = "";
		} else {
			$id_user = "";
			$data["listuser"] = $this->LinkModel->getUser();
		}
		$post_data = $this->input->post(null, true);
		if ($post_data) {
			$data["post"] = $post_data;
			if ($level_user == "admin") { $id_user = $post_data["user_id"]; }
			
			$from = "{$post_data["year_form"]}-{$post_data["month_from"]}-{$post_data["day_from"]} 00:00:00";
			$to = "{$post_data["year_to"]}-{$post_data["month_to"]}-{$post_data["day_to"]} 23:59:59";
			$list = $this->LinkModel->getListURL_bydate($id_user,$from, $to);
			$jml = 0;
			foreach ($list as $l) { $jml = $jml + $l->count; }
			$data["count"] = $jml;
			$data["list"] = $list;
		} else {
			$data["data"] = "";
			$data["count"] = 0;
		}
		$data["script_js"] = '<script type="text/javascript" src="'.ASSETSADMIN_URL.'js/bootstrap-table.js"></script>';
		$this->render(
			$title ="Report Short URL",
			$content="link/report",
			$data= $data
		);
	}

	public function detail($id) {
		$row = $this->LinkModel->getLink_fromid($id);
		if ($row) {
			$level_user = $this->get_level();
			if ($level_user == "user") {
				$id_user = $this->get_userID();
				$data["listuser"] = "";
			} else {
				$id_user = "";
				$data["listuser"] = $this->LinkModel->getUser();
			}
			if ($id_user <> "") {
				//jika user biasa
				if ($row->user_id <> $id_user) {
					redirect($this->adminurl);
					return false;
				}
			}

			$id_link = $row->id;
			$data["click_count"] = $row->count;
			//S:get detail visitor
			//$detail_link = $this->LinkModel->getDetaillink_fromlinkid($id_link);
			$platform = $this->LinkModel->getType_detaillink("platform",$id_link);
			$browser = $this->LinkModel->getType_detaillink("browser",$id_link);
			$countries = $this->LinkModel->getType_detaillink("countries",$id_link);
			$referer = $this->LinkModel->getType_detaillink("referer",$id_link);
			
			$data["platform_field"] = $platform;
			$data["browser_field"] = $browser;
			$data["countries_field"] = $countries;
			$color_platform = array();
			$color_browser = array();
			for($i=0;$i<=count($platform)-1;$i++) {
				$color_platform[] = $this->random_color();
			}
			for($i=0;$i<=count($browser)-1;$i++) {
				$color_browser[] = $this->random_color();
			}
			foreach ($platform as $p) {
				$temp = $this->LinkModel->getCountData_detaillink("platform",$p->platform, $id_link);
				$p->count = $temp;
			}
			
			$count_countries = 0;
			foreach ($countries as $c) {
				$temp = $this->LinkModel->getCountData_detaillink("countries",$c->countries, $id_link);
				$c->count = $temp;
				$count_countries += $temp;
			}
			$data["countries"] = $countries;
			$data["countries_count"] = $count_countries;

			foreach ($browser as $p) {
				$temp = $this->LinkModel->getCountData_detaillink("browser",$p->browser, $id_link);
				$p->count = $temp;
			}

			foreach ($referer as $r) {
				$temp = $this->LinkModel->getCountData_detaillink("referer",$r->referer, $id_link);
				if (strpos($r->referer,"facebook.com") <> 0) {
					$r->referer = "Facebook";
				} 
				elseif(strpos($r->referer,"t.co") <> 0) {
					$r->referer = "Twitter";
				}
				else {
					$r->referer = str_replace(array("http://","https://"),"",$r->referer);
				}
				$r->count = $temp;
			}
			$c_facebook = 0;
			$c_all = 0;
			foreach ($referer as $key => $r) {
				$c_all += $r->count;
				if ($r->referer == "Facebook") {
					$c_facebook = $c_facebook + $r->count;
					unset($referer[$key]);
				}
			}

			$values = new stdClass;
			$values->referer = "Facebook";
			$values->count = $c_facebook;
			$fb = $values;
			array_push($referer, $fb);
			$referer = array_values($referer);
			$data["referer"] = $referer;
			$data["referer_count"] = $c_all;
			$data["script_js"] = '<script src="'.ASSETSADMIN_URL.'bower_components/chart.js/dist/Chart.min.js"></script>'."\n";
			//$data["script_js"] .= '<script src="'.ASSETSADMIN_URL.'js/views/charts.js"></script>'."\n";
			$data["script_js"] .= <<<null
<script>

var doughnutData = {
    labels: [
null;
foreach ($browser as $b) {
	$data["script_js"] .= "'{$b->browser}',";
}
$data["script_js"] .= <<<null
    ],
    datasets: [{
      data: [
null;
foreach ($browser as $b) {
	$data["script_js"] .= "'{$b->count}',";
}
$data["script_js"] .= <<<null
      ],
      backgroundColor: [
null;
foreach ($color_browser as $color) {
	$data["script_js"] .= "'#{$color}',";
}
$data["script_js"] .= <<<null
      ],
      hoverBackgroundColor: [
null;
foreach ($color_browser as $color) {
	$data["script_js"] .= "'#{$color}',";
}
$data["script_js"] .= <<<null
      ]
    }]
  };
  var ctx = document.getElementById('canvas-3');
  var chart = new Chart(ctx, {
    type: 'doughnut',
    data: doughnutData,
    options: {
      responsive: true
    }
  });

  var pieData = {
    labels: [
null;
foreach ($platform as $p) {
	$data["script_js"] .= "'{$p->platform}',";
}
$data["script_js"] .= <<<null
    ],
    datasets: [{
      data: [
null;
foreach ($platform as $p) {
	$data["script_js"] .= "'{$p->count}',";
}
$data["script_js"] .= <<<null
      ],
      backgroundColor: [
null;
foreach ($color_platform as $color) {
	$data["script_js"] .= "'#{$color}',";
}
$data["script_js"] .= <<<null
],
      hoverBackgroundColor: [
null;
foreach ($color_platform as $color) {
	$data["script_js"] .= "'#{$color}',";
}
$data["script_js"] .= <<<null
      ]
    }]
  };
  var ctx = document.getElementById('canvas-5');
  var chart = new Chart(ctx, {
    type: 'pie',
    data: pieData,
    options: {
      responsive: true
    }
  });


  var polarData = {
    datasets: [{
      data: [
        11,
        16,
        7,
        3,
        14
      ],
      backgroundColor: [
null;
foreach ($color_platform as $color) {
	$data["script_js"] .= "'#{$color}',";
}
$data["script_js"] .= <<<null
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
null;
foreach ($platform as $p) {
	$data["script_js"] .= "'{$p->platform}',";
}
$data["script_js"] .= <<<null

    ]
  };
  var ctx = document.getElementById('canvas-6');
  var chart = new Chart(ctx, {
    type: 'polarArea',
    data: polarData,
    options: {
      responsive: true
    }
  });

  var doughnutData = {
    labels: [
      'Red',
      'Green',
      'Yellow'
    ],
    datasets: [{
      data: [300, 50, 100],
      backgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ],
      hoverBackgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ]
    }]
  };
  var ctx = document.getElementById('canvas-3');
  var chart = new Chart(ctx, {
    type: 'doughnut',
    data: doughnutData,
    options: {
      responsive: true
    }
  });
</script>
null;

			$this->render(
				$title ="Analytics URL",
				$content="link/detail",
				$data= $data
			);
			
		} else {
			redirect($this->adminurl);
		}
	}

	private function random_str($type = 'alphanum', $length = 8)
	{
	    switch($type)
	    {
	        case 'basic'    : return mt_rand();
	            break;
	        case 'alpha'    :
	        case 'alphanum' :
	        case 'num'      :
	        case 'nozero'   :
	                $seedings             = array();
	                $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	                $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	                $seedings['num']      = '0123456789';
	                $seedings['nozero']   = '123456789';
	                
	                $pool = $seedings[$type];
	                
	                $str = '';
	                for ($i=0; $i < $length; $i++)
	                {
	                    $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
	                }
	                return $str;
	            break;
	        case 'unique'   :
	        case 'md5'      :
	                    return md5(uniqid(mt_rand()));
	            break;
	    }
	}

	private function random_color_part() {
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	private function random_color() {
    	return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

}