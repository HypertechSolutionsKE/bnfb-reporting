<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_sessions extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/training_sessions_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['training_sessions'] = $this->training_sessions_model->get_training_sessions_list();
			
			$data['page_title'] = 'Training Sessions List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/training_sessions_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Training Session | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/training_sessions_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'training_session_name' => $this->input->post('training_session_name'),
			'training_session_description' => $this->input->post('training_session_description')
		);	
		$q = $this->training_sessions_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/training_sessions/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/training_sessions/add');
		}
	}
	function edit($training_session_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['training_session'] = $this->training_sessions_model->get_training_session($training_session_id);

			$data['page_title'] = 'Edit Training Session | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/training_sessions_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($training_session_id){
		$data = array(
			'training_session_name' => $this->input->post('training_session_name'),
			'training_session_description' => $this->input->post('training_session_description')
		);	
		$q = $this->training_sessions_model->update($data,$training_session_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/training_sessions/edit/'.$training_session_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/training_sessions/edit/'.$training_session_id);
		}

	}
	function delete($training_session_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->training_sessions_model->delete($training_session_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/training_sessions');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/training_sessions');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

