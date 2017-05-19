<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_users extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/system_users_model');
		$this->load->model('be/countries_model');
		$this->load->model('be/user_titles_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['system_users'] = $this->system_users_model->get_system_users_list();
			
			$data['page_title'] = 'System Users List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/system_users_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['user_titles'] = $this->user_titles_model->get_user_titles_list();

			$data['page_title'] = 'Add System User | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/system_users_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		if($this->system_users_model->system_user_exists($this->input->post('email_address')) == false){
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_address' => $this->input->post('email_address'),
				'gender' => $this->input->post('gender'),
				'country_id' => $this->input->post('country_id'),
				'user_title_id' => $this->input->post('user_title_id'),
				'user_password' => md5($this->input->post('user_password')),
				'is_admin' => $this->input->post('is_admin')
			);	
			$q = $this->system_users_model->save($data);
			if ($q['res'] == true){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/system_users/add');
			}else{
				$this->session->set_flashdata('error',$q['dt']);
				redirect('be/system_users/add');
			}
		}else{
			$data['error'] = 'The Email Address you entered already exists. Please enter a different Email Address.';
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['user_titles'] = $this->user_titles_model->get_user_titles_list();

			$data['page_title'] = 'Add System User | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/system_users_add';
			$this->load->view('be/includes/template',$data);

		}
	}
	function edit($system_user_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['user_titles'] = $this->user_titles_model->get_user_titles_list();
			$data['system_user'] = $this->system_users_model->get_system_user($system_user_id);

			$data['page_title'] = 'Edit System User | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/system_users_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($system_user_id){
		if($this->system_users_model->system_user_update_exists($system_user_id,$this->input->post('email_address')) == false){
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_address' => $this->input->post('email_address'),
				'gender' => $this->input->post('gender'),
				'country_id' => $this->input->post('country_id'),
				'user_title_id' => $this->input->post('user_title_id'),
				'is_admin' => $this->input->post('is_admin')
			);	
			$q = $this->system_users_model->update($data,$system_user_id);
			if ($q['res'] == true){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/system_users/edit/'.$system_user_id);
			}else{
				$this->session->set_flashdata('error',$q['dt']);
				redirect('be/system_users/edit/'.$system_user_id);
			}
		}else{
			$data['error'] = 'The Email Address you entered already exists. Please enter a different Email Address.';
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['user_titles'] = $this->user_titles_model->get_user_titles_list();
			$data['system_user'] = $this->system_users_model->get_system_user($system_user_id);

			$data['page_title'] = 'Edit System User | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/system_users_add';
			$this->load->view('be/includes/template',$data);

		}

	}
	function delete($system_user_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->system_users_model->delete($system_user_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/system_users');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/system_users');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

