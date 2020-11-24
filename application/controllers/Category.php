<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Category Controller
*/
class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data =array();
		$this->load->model('CategoryModel');
	}
	
	public function save_category()
	{
		$this->form_validation->set_rules('category_name','Category Name','required|min_length[2]');
		if($this->form_validation->run()){
		$this->CategoryModel->add_category_model();
	    $this->session->set_flashdata("flsh_msg","<font class='success'>Category Added Successfully</font>");
           redirect('category-list');
		}else{
			$this->show_category_list();
		}
	}
	
	
	public function show_category_list()
	{
	  $data = array();
		$data['title'] = "Admin | Category List";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_cats']= $this->CategoryModel->get_all_category();
		$this->load->view('back/category_list',$data);
	}
	
	public function update_category()
	{
		$cat_id = $this->input->post('category_id',true);
		$cat_name = $this->input->post('category_name',true);
		
		$this->CategoryModel->update_caegory_by_id($cat_id,$cat_name);
		$this->session->set_flashdata('flsh_msg','Category Updated Successfully',10);
	    redirect('category-list');
	}

	public function delete_category($category_id)
	{
		$this->CategoryModel->delete_caegory_by_id($category_id);
		$this->session->set_flashdata("flsh_msg","<font class='success'>Category Deleted Successfully</font>");
           redirect('category-list');
	}

}
