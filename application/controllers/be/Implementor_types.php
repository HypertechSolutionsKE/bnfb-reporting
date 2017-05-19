<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Implementor_types extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/implementor_types_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementor_types'] = $this->implementor_types_model->get_implementor_types_list();
			
			$data['page_title'] = 'Implementor Types List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementor_types_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Implementor Type | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementor_types_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'implementor_type_name' => $this->input->post('implementor_type_name'),
			'implementor_type_description' => $this->input->post('implementor_type_description')
		);	
		$q = $this->implementor_types_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/implementor_types/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/implementor_types/add');
		}
	}
	function edit($implementor_type_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementor_type'] = $this->implementor_types_model->get_implementor_type($implementor_type_id);

			$data['page_title'] = 'Edit Implementor Type | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementor_types_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($implementor_type_id){
		$data = array(
			'implementor_type_name' => $this->input->post('implementor_type_name'),
			'implementor_type_description' => $this->input->post('implementor_type_description')
		);	
		$q = $this->implementor_types_model->update($data,$implementor_type_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/implementor_types/edit/'.$implementor_type_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/implementor_types/edit/'.$implementor_type_id);
		}

	}
	function delete($implementor_type_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->implementor_types_model->delete($implementor_type_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/implementor_types');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/implementor_types');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

