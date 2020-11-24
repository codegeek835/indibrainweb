<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model 
{
	public function add_product_model($product_image)
	{
		$data['pro_user_id'] = $this->input->post('pro_user_id',true);
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['category'] = getcatIdName($this->input->post('pro_cat',true));
		$data['verticals'] = $this->input->post('verticals',true);
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['license_type'] = $this->input->post('license_type',true);
		$data['orientation'] = $this->input->post('orientation',true);
		$data['color'] = $this->input->post('color',true);
		$data['people'] = $this->input->post('people',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image;
		$data['is_featured'] = $this->input->post('is_featured',true);
		$this->db->insert('products',$data);	
	}
	
	
	public function add_my_product_model($images)
	{
	    $product_image =  explode(",",$images);
	    
		$data['pro_user_id'] = $this->input->post('pro_user_id',true);
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['category'] = getcatIdName($this->input->post('pro_cat',true));
		$data['verticals'] = $this->input->post('verticals',true);
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['license_type'] = $this->input->post('license_type',true);
		$data['orientation'] = $this->input->post('orientation',true);
		$data['color'] = $this->input->post('color',true);
		$data['people'] = $this->input->post('people',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image[0];
		$data['is_featured'] = $this->input->post('is_featured',true);
		//echo getImageRecognition($product_image[1]);
		//die();
		$this->db->insert('products',$data);	
	}
	public function get_all_product_limit()
	{
		$data = $this->db->select('*')
			->from('products')
			->order_by('pro_id','desc')
			->limit("6")
			->get()
			->result();
			return $data;
	}
	
	public function get_all_is_featured()
	{
		$data = $this->db->select('*')
			->from('products')
			->order_by('pro_id','desc')
			->where('is_featured','1')
			->limit("4")
			->get()
			->result();
			return $data;
	}
	
	public function get_all_category()
	{
		$data = $this->db->select('*')
			->from('category')
			->order_by('category_id','desc')
			->get()
			->result();
			return $data;
	}
	
	public function get_all_product()
	{
		$data = $this->db->select('*')
			->from('products')
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}

	public function get_my_product($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
    $result = $this->db->get('products');
    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }
	}
	
	
	public function get_my_product_sel($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
		$this->db->where('pro_status','1');
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }
	}
	
	public function get_my_product_rev($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
		$this->db->where('pro_status','2');
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }
	}
	
	public function get_my_product_rej($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
		$this->db->where('pro_status','3');
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }
	}
	
		
	public function edit_product_model($product_id)
	{
		$data = $this->db->select('*')
			->from('products')
			->order_by('pro_id','desc')
			->where('pro_id',$product_id)
			->get()
			->row();
			return $data;
	}
	
	public function update_product_model($product_image)
	{
		$product_id = $this->input->post('pro_id',true);
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['category'] = getcatIdName($this->input->post('pro_cat',true));
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['license_type'] = $this->input->post('license_type',true);
		$data['orientation'] = $this->input->post('orientation',true);
		$data['color'] = $this->input->post('color',true);
		$data['people'] = $this->input->post('people',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image;
		$data['is_featured'] = $this->input->post('is_featured',true);
		$this->db->where('pro_id',$product_id);
		$this->db->update('products',$data);	
	}
	
	public function delete_product_model($product_id)
	{
		$product_image = $this->edit_product_model($product_id);
		if($product_image){
		  $file_dir = 'uploads/'.$product_image->pro_image; 
        unlink($file_dir);
      }   
		$this->db->where('pro_id', $product_id);
		$this->db->delete('products');
	}
}
