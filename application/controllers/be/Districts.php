<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Districts extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/districts_model');
		$this->load->model('be/countries_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['districts'] = $this->districts_model->get_districts_list();
			
			$data['page_title'] = 'Districts List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/districts_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['countries'] = $this->countries_model->get_countries_list();

			$data['page_title'] = 'Add District | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/districts_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'district_name' => $this->input->post('district_name'),
			'country_id' => $this->input->post('country_id')
		);	
		$q = $this->districts_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/districts/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/districts/add');
		}
	}
	function edit($district_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['district'] = $this->districts_model->get_district($district_id);

			$data['page_title'] = 'Edit District | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/districts_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($district_id){
		$data = array(
			'district_name' => $this->input->post('district_name'),
			'country_id' => $this->input->post('country_id')
		);	
		$q = $this->districts_model->update($data,$district_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/districts/edit/'.$district_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/districts/edit/'.$district_id);
		}

	}
	function delete($district_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->districts_model->delete($district_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/districts');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/districts');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

