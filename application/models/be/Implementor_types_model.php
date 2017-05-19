<?php
class Implementor_types_model extends CI_Model {
	
	function get_implementor_types_list(){
		$this->db->from('implementor_types');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('implementor_types', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Implementor Type added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Implementor Type successfully. Please try again.');
		}
		return $arr_return;
	}
	function implementor_type_exists($implementor_type_name){
		$this->db->where('implementor_type_name',$implementor_type_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('implementor_types');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_implementor_type($implementor_type_id){
		$this->db->from('implementor_types');
		$this->db->where( array('implementor_type_id'=>$implementor_type_id));
		return $this->db->get()->result();
	}
	function implementor_type_update_exists($implementor_type_id,$implementor_type_name){
		$q = $this->db->query("SELECT * FROM implementor_types WHERE implementor_type_id != ".$implementor_type_id." AND implementor_type_name = '$implementor_type_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$implementor_type_id){
		$this->db->where(array('implementor_type_id'=>$implementor_type_id));
		$update = $this->db->update('implementor_types', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Implementor Type updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Implementor Type successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($implementor_type_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('implementor_type_id'=>$implementor_type_id));
		$delupdate = $this->db->update('implementor_types', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Implementor Type deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Implementor Type');
		}
		return $arr_return;
	}


}