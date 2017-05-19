<?php
class Indicators_model extends CI_Model {
	
	function get_indicators_list(){
		$this->db->from('indicators');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('indicators', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Indicator added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add indicator successfully. Please try again.');
		}
		return $arr_return;
	}
	function indicator_exists($indicator_name){
		$this->db->where('indicator_name',$indicator_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('indicators');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function get_indicator($indicator_id){
		$this->db->from('indicators');
		$this->db->where( array('indicator_id'=>$indicator_id));
		return $this->db->get()->result();
	}
	function indicator_update_exists($indicator_id,$indicator_name){
		$q = $this->db->query("SELECT * FROM indicators WHERE indicator_id != ".$indicator_id." AND indicator_name = '$indicator_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$indicator_id){
		$this->db->where(array('indicator_id'=>$indicator_id));
		$update = $this->db->update('indicators', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Indicator updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update indicator successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($indicator_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('indicator_id'=>$indicator_id));
		$delupdate = $this->db->update('indicators', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Indicator deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting indicator');
		}
		return $arr_return;
	}


}