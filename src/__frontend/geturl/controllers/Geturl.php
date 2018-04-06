<?php

class GetUrl extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("FrontendModel");
	}

	public function redirect($str){
		$short = $this->FrontendModel->getFullurl($str);
		if (!$short) {
			echo "URL Not Found";
			exit;
		} else {
			$visitor = intval($short->count) + 1;
			$arrdata["count"] = $visitor;
			$this->FrontendModel->updateLink($short->id, $arrdata);
			//redirect($short->original_url, 'location', 301);
			//exit;
			$this->load->library("BrowserDetection");
			if(isset($_SERVER['HTTP_REFERER'])) {
				$refer_site = $_SERVER['HTTP_REFERER'];	
			} else {
				$refer_site = "Direct";
			}
			$browser = new BrowserDetection();
			
			$arrdetail["ip_address"] = $this->get_real_ip();
			$arrdetail["referer"] = $refer_site;
			$arrdetail["browser"] = $browser->getName();
			$arrdetail["platform"] = $browser->getPlatform(); 
			$arrdetail["countries"] = $this->ip_info($this->get_real_ip(), "Country");;
			$arrdetail["link_id"] = $short->id;
			
			//echo $this->ip_info("36.84.224.123", "Country Code"); // IN
			//echo $this->ip_info("36.84.224.123", "State"); // Andhra Pradesh
			//echo $this->ip_info("36.84.224.123", "City"); // Proddatur
			//echo $this->ip_info("36.84.224.123", "Address"); // Proddatur, Andhra Pradesh, India
			//exit;
			$this->FrontendModel->InsertDetailLink($arrdetail);
			redirect($short->original_url, 'location', 301);
		}
	}

	private function get_real_ip() 	{
	    if (isset($_SERVER["HTTP_CLIENT_IP"]))
	    {
	        return $_SERVER["HTTP_CLIENT_IP"];
	    }
	    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	    {
	        return $_SERVER["HTTP_X_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
	    {
	        return $_SERVER["HTTP_X_FORWARDED"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
	    {
	        return $_SERVER["HTTP_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED"]))
	    {
	        return $_SERVER["HTTP_FORWARDED"];
	    }
	    else
	    {
	        return $_SERVER["REMOTE_ADDR"];
	    }
	}

	private function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
	    $output = NULL;
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    }
	    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
	    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	    $continents = array(
	        "AF" => "Africa",
	        "AN" => "Antarctica",
	        "AS" => "Asia",
	        "EU" => "Europe",
	        "OC" => "Australia (Oceania)",
	        "NA" => "North America",
	        "SA" => "South America"
	    );
	    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
	        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
	        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
	            switch ($purpose) {
	                case "location":
	                    $output = array(
	                        "city"           => @$ipdat->geoplugin_city,
	                        "state"          => @$ipdat->geoplugin_regionName,
	                        "country"        => @$ipdat->geoplugin_countryName,
	                        "country_code"   => @$ipdat->geoplugin_countryCode,
	                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
	                        "continent_code" => @$ipdat->geoplugin_continentCode
	                    );
	                    break;
	                case "address":
	                    $address = array($ipdat->geoplugin_countryName);
	                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
	                        $address[] = $ipdat->geoplugin_regionName;
	                    if (@strlen($ipdat->geoplugin_city) >= 1)
	                        $address[] = $ipdat->geoplugin_city;
	                    $output = implode(", ", array_reverse($address));
	                    break;
	                case "city":
	                    $output = @$ipdat->geoplugin_city;
	                    break;
	                case "state":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "region":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "country":
	                    $output = @$ipdat->geoplugin_countryName;
	                    break;
	                case "countrycode":
	                    $output = @$ipdat->geoplugin_countryCode;
	                    break;
	            }
	        }
	    }
	    return $output;
	}


}
