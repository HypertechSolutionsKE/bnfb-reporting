<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Implementors extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/implementors_model');
		$this->load->model('be/implementor_types_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementors'] = $this->implementors_model->get_implementors_list();
			
			$data['page_title'] = 'Implementors List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementors_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementor_types'] = $this->implementor_types_model->get_implementor_types_list();

			$data['page_title'] = 'Add Implementor | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementors_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'implementor_name' => $this->input->post('implementor_name'),
			'implementor_type_id' => $this->input->post('implementor_type_id')
		);	
		$q = $this->implementors_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/implementors/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/implementors/add');
		}
	}
	function edit($implementor_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementor_types'] = $this->implementor_types_model->get_implementor_types_list();
			$data['implementor'] = $this->implementors_model->get_implementor($implementor_id);

			$data['page_title'] = 'Edit Implementor | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/implementors_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($implementor_id){
		$data = array(
			'implementor_name' => $this->input->post('implementor_name'),
			'implementor_type_id' => $this->input->post('implementor_type_id')
		);	
		$q = $this->implementors_model->update($data,$implementor_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/implementors/edit/'.$implementor_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/implementors/edit/'.$implementor_id);
		}

	}
	function delete($implementor_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->implementors_model->delete($implementor_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/implementors');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/implementors');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

