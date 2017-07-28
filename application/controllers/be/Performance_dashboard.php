<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance_dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/indicators_model');
		$this->load->model('be/countries_model');
		$this->load->model('be/performance_dashboard_model');

	}
	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			//$data['biweekly_reports'] = $this->biweekly_model->get_reports_list();
			$data['indicators'] = $this->indicators_model->get_indicators_list();
			$data['countries'] = $this->countries_model->get_countries_list();
			
			$data['page_title'] = 'Performance Dashboard | ';
	        $data['cur'] = 'Performance Dashboard';			
			$data['main_content'] = 'be/performance_dashboard';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function get_trainings_data(){
		$period_from = $this->input->post('pd_trainings_from');
		$period_to = $this->input->post('pd_trainings_to');
		$indicator_id = $this->input->post('pd_trainings_indicator_id');
		$country_id = $this->input->post('pd_trainings_country_id');
		
		$trainings_data = $this->performance_dashboard_model->get_trainings_data($period_from,$period_to,$indicator_id,$country_id);
		echo json_encode($trainings_data, JSON_NUMERIC_CHECK);
	}


}