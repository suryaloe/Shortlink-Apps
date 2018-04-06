<?php
class LoginModel extends CI_Model {
	private $table_user = "USER";
	private $table_admin = "ADMIN_USER";

	public function cek_user($type, $user) {
		if ($type == "user") {
			$this->db->where("username", $user);
			$this->db->limit(1,0);
			return $this->db->get($this->table_user)->row();

		} elseif ($type == "admin") {
			$this->db->where("username", $user);
			$this->db->limit(1,0);
			return $this->db->get($this->table_admin)->row();
		}
	}

	public function updateLast($type,$id) {
		$this->db->where('id', $id);
		$dateTime = new DateTime("now", new DateTimeZone('Asia/Makassar'));
        $now = $dateTime->format('Y-m-d H:i:s');
        if ($type == "user") { 
        	$this->db->update($this->table_user, array('last_login' => $now));													
        } elseif ($type == "admin") {
        	$this->db->update($this->table_admin, array('last_login' => $now));													
        }
	}
}