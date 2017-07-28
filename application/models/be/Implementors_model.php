<?php
class Implementors_model extends CI_Model {
	
	function get_implementors_list(){
		$this->db->select('i.*, it.implementor_type_id, it.implementor_type_name');
		$this->db->from('implementors as i');
		$this->db->join('implementor_types as it', 'i.implementor_type_id = it.implementor_type_id');
		$this->db->where( array('i.is_deleted'=>0));
		return $this->db->get()->result();		
	}
	function save($data){
		$insert = $this->db->insert('implementors', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Implementor added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Implementor successfully. Please try again.');
		}
		return $arr_return;
	}
	function implementor_exists($implementor_name){
		$this->db->where('implementor_name',$implementor_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('implementors');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_implementor($implementor_id){
		$this->db->from('implementors');
		$this->db->where( array('implementor_id'=>$implementor_id));
		return $this->db->get()->result();
	}
	function implementor_update_exists($implementor_id,$implementor_name){
		$q = $this->db->query("SELECT * FROM implementors WHERE implementor_id != ".$implementor_id." AND implementor_name = '$implementor_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$implementor_id){
		$this->db->where(array('implementor_id'=>$implementor_id));
		$update = $this->db->update('implementors', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Implementor updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Implementor successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($implementor_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('implementor_id'=>$implementor_id));
		$delupdate = $this->db->update('implementors', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Implementor deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Implementor');
		}
		return $arr_return;
	}


}