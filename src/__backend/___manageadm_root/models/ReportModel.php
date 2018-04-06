<?php

class ReportModel extends CI_Model {
	private $table = "REPORT_SOSMED";

	public function insertDB($data) {
		$query = $this->db->insert($this->table,$data);
        if ($query) { return TRUE; }
	}

	public function getReport($id_user = "", $limit, $start = 0, $from = "", $to = "") {
		$this->db->select("REPORT_SOSMED.id as id, REPORT_SOSMED.*, USER.nama as user_nama");
		$this->db->from($this->table);
		$this->db->join("USER", "REPORT_SOSMED.user_id = USER.id");
		$this->db->order_by("REPORT_SOSMED.tanggal","desc");
		if ($from <> "" and $to <> "") {
			$this->db->group_start();
			$this->db->where("REPORT_SOSMED.tanggal >=",$from);
			$this->db->where("REPORT_SOSMED.tanggal <=",$to);
			$this->db->group_end();
		}
		if ($id_user <> "") {
			$this->db->where("REPORT_SOSMED.user_id", $id_user);
		}
		$tempdb = clone $this->db;
		$total_rows = $tempdb->count_all_results();
		$this->db->limit($limit, $start);
		$result = $this->db->get()->result();
		return array(
			"total_rows" => $total_rows,
			"result"	 => $result,
		);
	}

	public function getUser($id="") {
		$this->db->order_by("nama", "asc");
		$this->db->select("id, nama");
		if ($id <> "") {
			$this->db->where("id", $id);
		}
		return $this->db->get('USER')->result();
	}

	public function getId($id) {
		$this->db->select("id, tanggal, user_id");
		$this->db->where("id",$id);
		$this->db->limit(1,0);
		return $this->db->get($this->table)->row();
	}

	public function delete($id) {
		$this->db->where("id",$id);
		$this->db->delete($this->table);
	}
}