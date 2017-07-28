<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('be/login_model');
		$this->load->model('be/countries_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')){
            redirect('be');
        }
		else{
			if ($this->login_model->check_admin() == false){
				$data['countries'] = $this->countries_model->get_countries_list();
				$this->load->view('be/register',$data);
			}else{
				$this->load->view('be/login');
			}
		}
	}
	function register(){
		if($this->login_model->user_exists($this->input->post('email_address')) == false){
			$user_password = md5($this->input->post('user_password'));
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_address' => $this->input->post('email_address'),
				'gender' => $this->input->post('gender'),
				'country_id' => $this->input->post('country_id'),				
				'user_password' => $user_password,
				'is_admin' => 1
			);
			$q = $this->login_model->register_user($data);
			if($q['res'] == true){
				$this->session->set_flashdata('success', 'Registration successful. Please login to continue');
				redirect("be/auth");
				//$data['success'] = 'Registration successful. Please login to continue';
				//$this->load->view('be/login',$data);
			}else{
				$data['error'] = $q['dt'];
				$this->load->view('be/register',$data);
			}
		}else{
			$data['error'] = 'The Email Address you entered already exists. Please enter a different Email Address.';
			$this->load->view('be/register',$data);
		}

	}
	function login(){
		$query = $this->login_model->validate();

		if($query['res'] == true){
			$this->session->set_userdata('bnfb_loginstate', TRUE);
			$this->session->set_userdata('user_id', $query['user_id']);
			$this->session->set_userdata('is_admin', $query['is_admin']);			
			$this->session->set_userdata('user_email', $query['user_email']);
			$this->session->set_userdata('user_name', $query['user_name']);	
			$this->session->set_userdata('profile_picture', $query['profile_picture']);				
			redirect('be');
		}
		else{
			$data['incorrect'] = 'Invalid credentials';
			$data['bnfb_loginstate'] = FALSE;
			$this->load->view('be/login',$data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}

	function pswupdate(){
		$this->load->model('be/login_model');
		$this->login_model->pswupdate();
		$this->index();
	}
}
