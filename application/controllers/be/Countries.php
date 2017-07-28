<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class countries extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/countries_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['countries'] = $this->countries_model->get_countries_list();
			
			$data['page_title'] = 'Countries List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/countries_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Country | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/countries_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'country_name' => $this->input->post('country_name')
		);	
		$q = $this->countries_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/countries/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/countries/add');
		}
	}
	function edit($country_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['country'] = $this->countries_model->get_country($country_id);

			$data['page_title'] = 'Edit Country | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/countries_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($country_id){
		$data = array(
			'country_name' => $this->input->post('country_name')
		);	
		$q = $this->countries_model->update($data,$country_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/countries/edit/'.$country_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/countries/edit/'.$country_id);
		}

	}
	function delete($country_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->countries_model->delete($country_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/countries');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/countries');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

