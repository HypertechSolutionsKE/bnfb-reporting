<?php
class Districts_model extends CI_Model {
	
	function get_districts_list(){
		$this->db->select('i.*, it.country_id, it.country_name');
		$this->db->from('districts as i');
		$this->db->join('countries as it', 'i.country_id = it.country_id');
		$this->db->where( array('i.is_deleted'=>0));
		return $this->db->get()->result();		
	}
	function save($data){
		$insert = $this->db->insert('districts', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'District/Province added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add District/Province successfully. Please try again.');
		}
		return $arr_return;
	}
	function district_exists($district_name){
		$this->db->where('district_name',$district_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('districts');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_district($district_id){
		$this->db->from('districts');
		$this->db->where( array('district_id'=>$district_id));
		return $this->db->get()->result();
	}
	function district_update_exists($district_id,$district_name){
		$q = $this->db->query("SELECT * FROM districts WHERE district_id != ".$district_id." AND district_name = '$district_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$district_id){
		$this->db->where(array('district_id'=>$district_id));
		$update = $this->db->update('districts', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'District/Province updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update District/Province successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($district_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('district_id'=>$district_id));
		$delupdate = $this->db->update('districts', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'District/Province deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting District/Province');
		}
		return $arr_return;
	}


}