<?php
class Crops_model extends CI_Model {
	
	function get_crops_list(){
		$this->db->from('crops');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('crops', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Crop added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Crop successfully. Please try again.');
		}
		return $arr_return;
	}
	function crop_exists($crop_name){
		$this->db->where('crop_name',$crop_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('crops');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_crop($crop_id){
		$this->db->from('crops');
		$this->db->where( array('crop_id'=>$crop_id));
		return $this->db->get()->result();
	}
	function crop_update_exists($crop_id,$crop_name){
		$q = $this->db->query("SELECT * FROM crops WHERE crop_id != ".$crop_id." AND crop_name = '$crop_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$crop_id){
		$this->db->where(array('crop_id'=>$crop_id));
		$update = $this->db->update('crops', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Crop updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Crop successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($crop_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('crop_id'=>$crop_id));
		$delupdate = $this->db->update('crops', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Crop deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Crop');
		}
		return $arr_return;
	}


}