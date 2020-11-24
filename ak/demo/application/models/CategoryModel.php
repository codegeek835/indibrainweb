<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
    
	public function add_category_model(){
		$data['category_name'] = $this->input->post('category_name',true);
		$data['category_status'] =1;
		$this->db->insert('category',$data);
	}
	
	public function add_sub_category_model(){
		$data['sub_category_name'] = $this->input->post('sub_category_name',true);
		$data['category_sub_id'] = $this->input->post('category_sub_id',true);
		$this->db->insert('sub_category',$data);

	}
	public function get_all_category(){
		$data = $this->db->select('*')
			->from('category')
			->get()
			->result();
			return $data;
	}
	public function get_all_sub_category(){
		$data = $this->db->select('*')
			->from('sub_category')
			->order_by('sub_cat_id','desc')
			->get()
			->result();
			return $data;
	}
	
	public function delete_caegory_by_id($category_id){
		$this->db->where('category_id', $category_id);
		$this->db->delete('category');
	}
	public function delete_sub_caegory_by_id($sub_category_id){
		$this->db->where('sub_cat_id', $sub_category_id);
		$this->db->delete('sub_category');
	}
	public function edit_caegory_by_id($category_id){
		$data = $this->db
				->select('*')
				->from('category')
				->where('category_id', $category_id)
				->get()
				->row();
		return $data;
	}
	public function edit_sub_caegory_by_id($sub_category_id){
		$data = $this->db
				->select('*')
				->from('sub_category')
				->where('sub_cat_id', $sub_category_id)
				->get()
				->row();
		return $data;
	}
	public function update_caegory_by_id($cat_id,$cat_name)
	{
		$data['category_name'] = $cat_name;
		$this->db->where('category_id', $cat_id);
		$this->db->update('category', $data); 
	}
	public function update_sub_caegory_by_id($sub_category_id){
		$data['sub_category_name'] = $this->input->post('sub_category_name');
		$this->db->where('sub_cat_id', $sub_category_id);
		$this->db->update('sub_category', $data); 
	}
	
	
}