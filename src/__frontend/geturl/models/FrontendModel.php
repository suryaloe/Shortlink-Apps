<?php

class FrontendModel extends CI_Model {
	private $table_link = "LINK";
	private $table_detaillink = "DETAIL_LINK";

	public function getFullurl($str){
		$this->db->select("id, count, original_url");
		$this->db->where("shortcut",$str);
		$this->db->limit(1,0);
		return $this->db->get($this->table_link)->row();
	}

	public function updateLink($id, $data) {
		$this->db->where("id",$id);
        $this->db->update($this->table_link, $data);
        if($this->db->affected_rows() > 0) {
            return true;
        }
	}

	public function InsertDetailLink($data) {
		$query = $this->db->insert($this->table_detaillink,$data);
        if ($query) { return TRUE; }
	}
}