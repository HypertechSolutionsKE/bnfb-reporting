<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crops extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/crops_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['crops'] = $this->crops_model->get_crops_list();
			
			$data['page_title'] = 'Crops List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/crops_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Crop | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/crops_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'crop_name' => $this->input->post('crop_name'),
			'crop_description' => $this->input->post('crop_description')
		);	
		$q = $this->crops_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/crops/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/crops/add');
		}
	}
	function edit($crop_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['crop'] = $this->crops_model->get_crop($crop_id);

			$data['page_title'] = 'Edit Crop | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/crops_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($crop_id){
		$data = array(
			'crop_name' => $this->input->post('crop_name'),
			'crop_description' => $this->input->post('crop_description')
		);	
		$q = $this->crops_model->update($data,$crop_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/crops/edit/'.$crop_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/crops/edit/'.$crop_id);
		}

	}
	function delete($crop_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->crops_model->delete($crop_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/crops');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/crops');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

