<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disaggregation_levels extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/disaggregation_levels_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['disaggregation_levels'] = $this->disaggregation_levels_model->get_disaggregation_levels_list();
			
			$data['page_title'] = 'Disaggregation Levels List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/disaggregation_levels_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Disaggregation Level | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/disaggregation_levels_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'disaggregation_level_name' => $this->input->post('disaggregation_level_name')
		);	
		$q = $this->disaggregation_levels_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/disaggregation_levels/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/disaggregation_levels/add');
		}
	}
	function edit($disaggregation_level_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['disaggregation_level'] = $this->disaggregation_levels_model->get_disaggregation_level($disaggregation_level_id);

			$data['page_title'] = 'Edit Disaggregation Level | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/disaggregation_levels_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($disaggregation_level_id){
		$data = array(
			'disaggregation_level_name' => $this->input->post('disaggregation_level_name')
		);	
		$q = $this->disaggregation_levels_model->update($data,$disaggregation_level_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/disaggregation_levels/edit/'.$disaggregation_level_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/disaggregation_levels/edit/'.$disaggregation_level_id);
		}

	}
	function delete($disaggregation_level_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->disaggregation_levels_model->delete($disaggregation_level_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/disaggregation_levels');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/disaggregation_levels');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

