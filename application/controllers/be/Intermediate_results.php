<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intermediate_results extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/intermediate_results_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['intermediate_results'] = $this->intermediate_results_model->get_intermediate_results_list();
			
			$data['page_title'] = 'Intermediate Results List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/intermediate_results_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Intermediate Result | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/intermediate_results_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'intermediate_result_name' => $this->input->post('intermediate_result_name')
		);	
		$q = $this->intermediate_results_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/intermediate_results/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/intermediate_results/add');
		}
	}
	function edit($intermediate_result_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['intermediate_result'] = $this->intermediate_results_model->get_intermediate_result($intermediate_result_id);

			$data['page_title'] = 'Edit Intermediate Result | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/intermediate_results_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($intermediate_result_id){
		$data = array(
			'intermediate_result_name' => $this->input->post('intermediate_result_name')
		);	
		$q = $this->intermediate_results_model->update($data,$intermediate_result_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/intermediate_results/edit/'.$intermediate_result_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/intermediate_results/edit/'.$intermediate_result_id);
		}

	}
	function delete($intermediate_result_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->intermediate_results_model->delete($intermediate_result_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/intermediate_results');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/intermediate_results');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

