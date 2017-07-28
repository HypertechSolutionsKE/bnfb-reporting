<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thematic_areas extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/thematic_areas_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['thematic_areas'] = $this->thematic_areas_model->get_thematic_areas_list();
			
			$data['page_title'] = 'Thematic Areas List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/thematic_areas_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Thematic Area | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/thematic_areas_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'thematic_area_name' => $this->input->post('thematic_area_name'),
			'thematic_area_description' => $this->input->post('thematic_area_description')
		);	
		$q = $this->thematic_areas_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/thematic_areas/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/thematic_areas/add');
		}
	}
	function edit($thematic_area_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['thematic_area'] = $this->thematic_areas_model->get_thematic_area($thematic_area_id);

			$data['page_title'] = 'Edit Thematic Area | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/thematic_areas_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($thematic_area_id){
		$data = array(
			'thematic_area_name' => $this->input->post('thematic_area_name'),
			'thematic_area_description' => $this->input->post('thematic_area_description')
		);	
		$q = $this->thematic_areas_model->update($data,$thematic_area_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/thematic_areas/edit/'.$thematic_area_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/thematic_areas/edit/'.$thematic_area_id);
		}

	}
	function delete($thematic_area_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->thematic_areas_model->delete($thematic_area_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/thematic_areas');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/thematic_areas');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

