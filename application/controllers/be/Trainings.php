<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainings extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/trainings_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['trainings'] = $this->trainings_model->get_trainings_list();
			
			$data['page_title'] = 'Trainings List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/trainings_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Training | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/trainings_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'training_name' => $this->input->post('training_name'),
			'training_description' => $this->input->post('training_description')
		);	
		$q = $this->trainings_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/trainings/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/trainings/add');
		}
	}
	function edit($training_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['training'] = $this->trainings_model->get_training($training_id);

			$data['page_title'] = 'Edit Training | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/trainings_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($training_id){
		$data = array(
			'training_name' => $this->input->post('training_name'),
			'training_description' => $this->input->post('training_description')
		);	
		$q = $this->trainings_model->update($data,$training_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/trainings/edit/'.$training_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/trainings/edit/'.$training_id);
		}

	}
	function delete($training_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->trainings_model->delete($training_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/trainings');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/trainings');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

