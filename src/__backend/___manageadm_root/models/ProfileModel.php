<?php
class ProfileModel extends CI_Model {
	private $table_user = "USER";
	private $table_admin = "ADMIN_USER";

	public function getID($level = "user", $id) {
		if ($level == "user") {
			$this->db->select("id, nama, email, username, password");
			$this->db->where("id",$id);
			$this->db->limit(1,0);
			return $this->db->get($this->table_user)->row();
		}
		elseif ($level == "admin") {
			$this->db->select("id, email, username, password");
			$this->db->where("id",$id);
			$this->db->limit(1,0);
			return $this->db->get($this->table_admin)->row();
		}
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
}