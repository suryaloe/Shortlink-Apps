<?php
class LinkModel extends CI_Model {
	private $table_link = "LINK";
	private $table_user = "USER";
	private $table_detail = "DETAIL_LINK";

	public function checkShortcut($str){
		$this->db->select("id, shortcut");
		$this->db->limit(1,0);
		return $this->db->get($this->table_link)->row();
	}

	public function insertDB($data) {
		$query = $this->db->insert($this->table_link,$data);
        if ($query) { return TRUE; }
	}

	public function getListURL($id_user="", $limit = 1, $start = 0, $q = "") {
		$this->db->select($this->table_link.".id as id, original_url, ".$this->table_user.".nama as nama, created_date, shortcut, count");
		$this->db->from($this->table_link);
		$this->db->join($this->table_user,$this->table_link.'.user_id = '.$this->table_user.'.id');
		$this->db->order_by("LINK.created_date", "desc");
		$this->db->limit($limit, $start);
		if ($id_user <> "") {
			$this->db->where($this->table_link.".user_id",$id_user);
		}
		$this->db->group_start();
		$this->db->like($this->table_link.".shortcut", $q);
		$this->db->or_like($this->table_link.".original_url", $q);
		$this->db->group_end();
		return $this->db->get()->result();
	}

	public function countListURL($id_user="",$q="") {
		$this->db->select("id");
		if ($id_user <> "") {
			$this->db->where("user_id",$id_user);
		}
		$this->db->group_start();
		$this->db->like("shortcut", $q);
		$this->db->or_like("original_url", $q);
		$this->db->group_end();
		$this->db->from($this->table_link);
		return $this->db->count_all_results();
	}

	public function getListURL_bydate($id_user="", $from, $to) {
		$this->db->select("id, original_url, created_date, shortcut, count");
		$this->db->order_by("created_date", "desc");
		if ($id_user <> "") {
			$this->db->where("user_id",$id_user);
		}
		$this->db->where("created_date >=",$from);
		$this->db->where("created_date <=",$to);
		//$this->db->group_start();
		//$this->db->like("shortcut", $q);
		//$this->db->or_like("original_url", $q);
		//$this->db->group_end();
		return $this->db->get($this->table_link)->result();
	}

	public function getUser($id="") {
		$this->db->order_by("nama", "asc");
		$this->db->select("id, nama");
		if ($id <> "") {
			$this->db->where("id", $id);
		}
		return $this->db->get($this->table_user)->result();
	}

	public function getLink_fromid($id) {
		$this->db->where("id", $id);
		$this->db->limit(1,0);
		return $this->db->get($this->table_link)->row();
	}

	public function getType_detaillink($type="", $id) {
		$this->db->distinct();
		$this->db->select($type);
		$this->db->where("link_id",$id);
		return $this->db->get($this->table_detail)->result();
	}

	public function getCountData_detaillink($type="",$value="", $id) {
		$this->db->select($type);
		$this->db->where($type, $value);
		$this->db->where("link_id", $id);
		$this->db->from($this->table_detail);
		return $this->db->count_all_results();
	}

	public function getDetaillink_fromlinkid($id) {
		$this->db->where("link_id", $id);
		return $this->db->get($this->table_detail)->result();
	}
}