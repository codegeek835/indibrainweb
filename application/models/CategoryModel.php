<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model 
{
    
	public function add_category_model()
	{
		$data['category_name'] = $this->input->post('category_name',true);
		$data['category_status'] =1;
		$this->db->insert('category',$data);
	}
	

	public function get_all_category()
	{
		$data = $this->db->select('*')
			->from('category')
			->get()
			->result();
			return $data;
	}
	
	
	
	public function delete_caegory_by_id($category_id)
	{
		$this->db->where('category_id', $category_id);
		$this->db->delete('category');
	}
	
	
	public function update_caegory_by_id($cat_id,$cat_name)
	{
		$data['category_name'] = $cat_name;
		$this->db->where('category_id', $cat_id);
		$this->db->update('category', $data); 
	}
	

}