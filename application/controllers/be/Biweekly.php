<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biweekly extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		//$this->load->model('be/main_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			//$data['total_currencies'] = $this->main_model->get_total_currencies();
			//$data['total_system_users'] = $this->main_model->get_total_system_users();
			
			$data['page_title'] = 'Bi-Weekly Reports List | ';
			$data['main_content'] = 'be/biweekly_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
}

