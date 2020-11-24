<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('admin');
		}
		$this->load->model('LoginModel');
	}
	public function index(){
		$data = array();
		$data['title'] = "Admin | Dashboard";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('back/admin_main',$data);
	}
	
	public function registerform(){
		$data = array();
		$data['title'] = "Admin | Register Form";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('back/register_admin',$data);
	}
	public function makeadmin(){
		$this->form_validation->set_rules('username','User Name','required|max_length[255]');
		$this->form_validation->set_rules('user_email','Email','required|is_unique[tbl_user.user_email]');
		$this->form_validation->set_rules('user_password','Password','required|min_length[6]');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[user_password]');
		$this->form_validation->set_rules('user_role','User Rules','required');
		if($this->form_validation->run()){
			$this->LoginModel->adminRgisterModel();
			$data['success_message'] = "User Successfully Added";
			$data['main_content'] = $this->load->view('back/register_admin',$data,TRUE);
			$this->load->view('back/adminpanel',$data);
		}else{
			$this->registerform();
		}

	}
	public function urltest(){
		
	}
}
