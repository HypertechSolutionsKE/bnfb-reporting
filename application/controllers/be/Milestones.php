<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Milestones extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/milestones_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['milestones'] = $this->milestones_model->get_milestones_list();
			
			$data['page_title'] = 'Milestones List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/milestones_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Milestone | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/milestones_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'milestone_name' => $this->input->post('milestone_name'),
			'milestone_description' => $this->input->post('milestone_description')
		);	
		//$region_name = $this->input->post('region_name');
		//if($this->regions_model->region_exists($region_name) == false){
			$q = $this->milestones_model->save($data);
			if ($q['res'] == true){
				$this->session->set_flashdata('success',$q['dt']);
				$this->add();
				//$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				//$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		//}else{
			//$resp = array('status' => 'ERR','message' => 'This Region already exists in the database');
		//}
			
		//echo json_encode($resp);

	}
	function edit($milestone_id){

	}
	function update($milestone_id){

	}
}

