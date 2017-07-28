<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_titles extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/user_titles_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['user_titles'] = $this->user_titles_model->get_user_titles_list();
			
			$data['page_title'] = 'User Titles List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/user_titles_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add User Title | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/user_titles_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'user_title_name' => $this->input->post('user_title_name'),
			'user_title_description' => $this->input->post('user_title_description')
		);	
		$q = $this->user_titles_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/user_titles/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/user_titles/add');
		}
	}
	function edit($user_title_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['user_title'] = $this->user_titles_model->get_user_title($user_title_id);

			$data['page_title'] = 'Edit User Title | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/user_titles_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($user_title_id){
		$data = array(
			'user_title_name' => $this->input->post('user_title_name'),
			'user_title_description' => $this->input->post('user_title_description')
		);	
		$q = $this->user_titles_model->update($data,$user_title_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/user_titles/edit/'.$user_title_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/user_titles/edit/'.$user_title_id);
		}

	}
	function delete($user_title_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->user_titles_model->delete($user_title_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/user_titles');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/user_titles');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

