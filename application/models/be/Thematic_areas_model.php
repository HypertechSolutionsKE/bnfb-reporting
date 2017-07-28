<?php
class thematic_areas_model extends CI_Model {
	
	function get_thematic_areas_list(){
		$this->db->from('thematic_areas');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('thematic_areas', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Thematic Area added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Thematic Area successfully. Please try again.');
		}
		return $arr_return;
	}
	function thematic_area_exists($thematic_area_name){
		$this->db->where('thematic_area_name',$thematic_area_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('thematic_areas');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_thematic_area($thematic_area_id){
		$this->db->from('thematic_areas');
		$this->db->where( array('thematic_area_id'=>$thematic_area_id));
		return $this->db->get()->result();
	}
	function thematic_area_update_exists($thematic_area_id,$thematic_area_name){
		$q = $this->db->query("SELECT * FROM thematic_areas WHERE thematic_area_id != ".$thematic_area_id." AND thematic_area_name = '$thematic_area_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$thematic_area_id){
		$this->db->where(array('thematic_area_id'=>$thematic_area_id));
		$update = $this->db->update('thematic_areas', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Thematic Area updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Thematic Area successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($thematic_area_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('thematic_area_id'=>$thematic_area_id));
		$delupdate = $this->db->update('thematic_areas', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Thematic Area deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Thematic Area');
		}
		return $arr_return;
	}


}