<?php
class User_titles_model extends CI_Model {
	
	function get_user_titles_list(){
		$this->db->from('user_titles');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('user_titles', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'User Title added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add User Title successfully. Please try again.');
		}
		return $arr_return;
	}
	function user_title_exists($user_title_name){
		$this->db->where('user_title_name',$user_title_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('user_titles');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_user_title($user_title_id){
		$this->db->from('user_titles');
		$this->db->where( array('user_title_id'=>$user_title_id));
		return $this->db->get()->result();
	}
	function user_title_update_exists($user_title_id,$user_title_name){
		$q = $this->db->query("SELECT * FROM user_titles WHERE user_title_id != ".$user_title_id." AND user_title_name = '$user_title_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$user_title_id){
		$this->db->where(array('user_title_id'=>$user_title_id));
		$update = $this->db->update('user_titles', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'User Title updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update User Title successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($user_title_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('user_title_id'=>$user_title_id));
		$delupdate = $this->db->update('user_titles', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'User Title deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting User Title');
		}
		return $arr_return;
	}


}