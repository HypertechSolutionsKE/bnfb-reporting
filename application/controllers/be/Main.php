<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/biweekly_model');
		$this->load->model('be/quarterly_model');		
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['num_biweekly_pending'] = $this->biweekly_model->get_num_pending_reports();
			$data['biweekly_pending'] = $this->biweekly_model->get_pending_reports();

			$data['num_quarterly_pending'] = $this->quarterly_model->get_num_pending_reports();
			$data['quarterly_pending'] = $this->quarterly_model->get_pending_reports();
			
			$data['page_title'] = 'Dashboard | ';
	        $data['cur'] = 'Dashboard';
			$data['main_content'] = 'be/dashboard';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
}

