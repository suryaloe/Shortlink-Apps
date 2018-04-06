<?php
Class AdminModel extends CI_Model {
	private $table_user = "USER";
	private $table_admin = "ADMIN_USER";

	public function addUser($level = "user", $data) {
		if ($level == "user") {
			$query = $this->db->insert($this->table_user,$data);
		} 
		elseif ($level == "admin") {
			$query = $this->db->insert($this->table_admin,$data);
		}
        if ($query) { return TRUE; }
	}

	public function updateUser($level = "user", $id, $data) {
		$this->db->where("id",$id);
		if ($level == "user") {
			$this->db->update($this->table_user, $data);
		}
		elseif ($level == "admin") {
			$this->db->update($this->table_admin, $data);
		}
        if($this->db->affected_rows() > 0) {
            return true;
        }
	}

	public function deleteUser($level = "user", $id) {
		$this->db->where("id", $id);
		if ($level == "user") { 
			$this->db->delete($this->table_user);	
		} elseif ($level == "admin") {
			$this->db->delete($this->table_admin);
		}
        
	}

	public function getUser($limit, $start=0, $q="") {
		$this->db->select("id, nama, email, username");
		$this->db->order_by("nama", "asc");
		$this->db->limit($limit, $start);
		
		$this->db->group_start();
		$this->db->like("nama", $q);
		$this->db->or_like("username", $q);
		$this->db->or_like("email", $q);
		$this->db->group_end();
		
		return $this->db->get($this->table_user)->result();
	}

	public function countUser($q = "") {
		$this->db->select("id");
		$this->db->group_start();
		$this->db->like("nama", $q);
		$this->db->or_like("username", $q);
		$this->db->or_like("email", $q);
		$this->db->group_end();
		$this->db->from($this->table_user);
		return $this->db->count_all_results();
	}

	public function getID($id) {
		$this->db->select("id, nama, email, username");
		$this->db->where("id",$id);
		$this->db->limit(1,0);
		return $this->db->get($this->table_user)->row();
	}
}