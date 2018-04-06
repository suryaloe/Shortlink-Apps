<?php
class ToolsModel extends CI_Model {
	public function getName($str = "") {
		$this->db->like('name', $str);
		$query = $this->db->get('CATEGORY_FBGROUP')->result();
		foreach ($query as $val) {
			$val->value = $val->name;
		}
		return $query;
	}

	public function getbyName($str)
	{
		$this->db->where('name', $str);
		$this->db->limit(1,0);
		return $this->db->get('CATEGORY_FBGROUP')->row();
	}

	public function insertCat($name) {
		$arr = [ "name" => $name];
		$query = $this->db->insert('CATEGORY_FBGROUP', $arr);
		if ($query) {
			$insert_id = $this->db->insert_id();
        	return $insert_id;
		}
	}

	public function insertGroup($data)
	{

		$query = $this->db->insert('FB_GROUP', $data);
		if ($query) {
			return true;
		}
	}

	public function countgetGroup($q = "") {
		$arrLike = array("FB_GROUP.link" => $q, "CATEGORY_FBGROUP.name" => $q);
		$this->db->select('
			FB_GROUP.id as id, FB_GROUP.link, CATEGORY_FBGROUP.name
		');
		$this->db->from('FB_GROUP');
		$this->db->join('CATEGORY_FBGROUP', 'FB_GROUP.category = CATEGORY_FBGROUP.id');
		$this->db->or_like($arrLike);
		$this->db->order_by('CATEGORY_FBGROUP.name', 'asc');
		return $this->db->count_all_results();
	}
	public function getGroup($limit, $start = 0, $q = "")
	{
		$arrLike = array("FB_GROUP.link" => $q, "CATEGORY_FBGROUP.name" => $q);
		$this->db->select('
			FB_GROUP.id as id, FB_GROUP.link, CATEGORY_FBGROUP.name, USER.nama as user
		');
		$this->db->from('FB_GROUP');
		$this->db->join('CATEGORY_FBGROUP', 'FB_GROUP.category = CATEGORY_FBGROUP.id');
		$this->db->join('USER', 'FB_GROUP.user = USER.id', 'left');
		$this->db->or_like($arrLike);
		$this->db->limit($limit, $start);
		$this->db->order_by('CATEGORY_FBGROUP.name', 'asc');
		return $this->db->get()->result();
	}

	public function getbyId($id)
	{
		
		$this->db->where('id', $id);
		return $this->db->get('FB_GROUP')->row();
	}

	public function deleteGroup($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('FB_GROUP');
	}
}