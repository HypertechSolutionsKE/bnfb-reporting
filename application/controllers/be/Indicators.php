<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicators extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/indicators_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['indicators'] = $this->indicators_model->get_indicators_list();
			
			$data['page_title'] = 'Indicators List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Indicator | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'indicator_name' => $this->input->post('indicator_name'),
			'partner_name' => $this->input->post('partner_name'),
			'target_males' => $this->input->post('target_males'),
			'target_females' => $this->input->post('target_females')
		);	
		$q = $this->indicators_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/indicators/add');
			//$this->add();
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/indicators/add');
			//$resp = array('status' => 'ERR','message' => $q['dt']);
		}
	}
	function edit($indicator_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['indicator'] = $this->indicators_model->get_indicator($indicator_id);

			$data['page_title'] = 'Edit Indicator | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($indicator_id){
		$data = array(
			'indicator_name' => $this->input->post('indicator_name'),
			'partner_name' => $this->input->post('partner_name'),
			'target_males' => $this->input->post('target_males'),
			'target_females' => $this->input->post('target_females')
		);	
		$q = $this->indicators_model->update($data,$indicator_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/indicators/edit/'.$indicator_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/indicators/edit/'.$indicator_id);
		}

	}
	function delete($indicator_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->indicators_model->delete($indicator_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/indicators');
			}else{					
			$this->session->set_flashdata('success',$q['dt']);
				redirect('be/indicators');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

