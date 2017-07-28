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
		$q = $this->milestones_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/milestones/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/milestones/add');
		}
	}
	function edit($milestone_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['milestone'] = $this->milestones_model->get_milestone($milestone_id);

			$data['page_title'] = 'Edit Milestone | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/milestones_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($milestone_id){
		$data = array(
			'milestone_name' => $this->input->post('milestone_name'),
			'milestone_description' => $this->input->post('milestone_description')
		);	
		$q = $this->milestones_model->update($data,$milestone_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/milestones/edit/'.$milestone_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/milestones/edit/'.$milestone_id);
		}

	}
	function delete($milestone_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->milestones_model->delete($milestone_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/milestones');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/milestones');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

