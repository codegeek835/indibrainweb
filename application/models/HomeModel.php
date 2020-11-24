<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public function get_user_login_by_email($email)
	{
		$data = $this->db->select('*')
			->from('users')
			->where("user_email",$email)
			->get()
			->row();
			return $data;
	}
    
    public function getUserInFo($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users');
        return $result->row();
    }
    
	public function userLoginByEmail($email)
	{
		$data = $this->db->select('*')
			->from('users')
			->where("user_email",$email)
			->where("user_role",'3')
			->get()
			->row();
			return $data;
	}

	public function checkuserlogin($useremail)
	{
		$user_details = $this->db->select('*')
		->from('users')
		->where('user_email',$useremail)
		->get()
		->row();
		return 	$user_details;
	}
    
    public function saveRegister($data)
	{
	    $this->db->insert('users',$data);
	    return $this->db->insert_id();
	}
	
	public function mail_send($data,$template_name)
	{
		$this->load->library('email');
		$this->email->set_mailtype('html');
		$this->email->from($data['from'],$data['admin_full_name']);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$message_body = $this->load->view("mailscripts/".$template_name,$data,true);
		// echo $message_body;
		// exit();
		$this->email->message($message_body);
		$this->email->send();
		$this->email->clear();
	}

	public function get_user_by_id($user_id)
	{
    $this->db->where('user_id', $user_id);
    $result = $this->db->get('users');
    if ($this->db->affected_rows() > 0) {
      return $result->row();
    }else{
      return false;
    }	
	}
	
	public function show_product_price_range($min_range,$max_range)
	{
		$data = $this->db->select('*')
			->from('products')
			->where("pro_price BETWEEN '".$min_range."' AND '".$max_range."'")
			->get()
			->result();
		return $data;
	}
	
	public function update_user($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
	}
	
	public function change_password($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
	}
	
	
	
	public function get_product_by_category($cat_id)
	{
    $this->db->where('pro_cat', $cat_id);
    $result = $this->db->get('products');
    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }	
	}

	public function get_product_by_category_with_title($vertical,$keyword,$cat,$sby,$ltyp,$cby,$ornt,$people)
	{
        $this->db->where('verticals', $vertical);
   
        if(!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('pro_title', $keyword);
            $this->db->or_like('category', $keyword);
            $this->db->or_like('verticals', $keyword);
            $this->db->or_like('orientation', $keyword);
            $this->db->group_end();
        }
    
        if($sby){
            if($sby=='free'){
                $this->db->where('pro_price', '0');
            }else{
                $this->db->where('pro_price !=', '0');
            }
        }
        if($ltyp){
            if($ltyp!='all'){
                $this->db->where('license_type', $ltyp);
            }
        }
        if($cat){
          $this->db->where('category', $cat);  
        }
        
        if($cby){
          $this->db->where('color', $cby);  
        }
        
        if($ornt){
          $this->db->where('orientation', $ornt);  
        }
        if($people){
          $this->db->where('people <=', $people);  
        }
        
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }	
	}
	
	public function get_product_by_title($title)
	{
        $this->db->like('pro_title', $title);
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }	
	}
	
	public function get_product_by_vertical($vertical)
	{
	    $this->db->where('verticals', $vertical);
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }	
	}

	public function get_product_details($pro_id)
	{
        $this->db->where('pro_id', $pro_id);
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->row();
        }else{
          return false;
        }	
	}
	
	public function getAllOrder($user_id)
	{
        $data = $this->db->select('*')
        	->from('order')
        	->where('order.user_id',$user_id)
        	->join('users', 'users.user_id = order.user_id')
        	->join('payment', 'payment.payment_id = order.payment_id')
        	->get()
        	->result();
        	return $data;	
	}
	
	public function getMostCategory()
	{
	    $sql="SELECT products.pro_cat ,count(products.pro_cat) as pro_cat_count, order_details.product_id FROM `products` JOIN `order_details` ON `order_details`.`product_id` = `products`.`pro_id`  group by products.pro_cat order by count(products.pro_cat) DESC";   
        $query = $this->db->query($sql);
       
		return $query->result();	
	}
	
	public function getMostPhoto()
	{
	    $sql="SELECT order_details.product_id ,count(products.pro_id) as pro_id_count FROM `products` JOIN `order_details` ON `order_details`.`product_id` = `products`.`pro_id`  group by products.pro_id order by count(products.pro_id) DESC";   
        $query = $this->db->query($sql);
		return $query->row();	
	}
	
	public function getPrints()
	{
        $this->db->where('verticals', 'prints');
        $result = $this->db->get('products');
        if ($this->db->affected_rows() > 0) {
          return $result->result();
        }else{
          return false;
        }	
	}
	
	public function get_order_info_by_id($order_id){
		$data = $this->db->select('*')
						->from('order')
						->where('order_id',$order_id)
						->get()
						->row();
						return $data;
	}
	
	public function get_shipping_info_by_id($shipping_id)
	{
        $this->db->where('shipping_id', $shipping_id);
        $result = $this->db->get('shipping');
        if ($this->db->affected_rows() > 0) {
          return $result->row();
        }else{
          return false;
        }	
	}
	
	public function get_all_order_details_by_id($order_id){
		$data = $this->db->select('*')
						->from('order_details')
						->where('order_id',$order_id)
						->get()
						->result();
						return $data;
	}
	
	public function delete_order_info_by_id($order_id,$shipping_id,$payment_id){
		$this->db->where('order_id',$order_id);
		$this->db->delete('order');
		$this->db->where('order_id',$order_id);
		$this->db->delete('order_details');
		$this->db->where('shipping_id',$shipping_id);
		$this->db->delete('shipping');
		$this->db->where('payment_id',$payment_id);
		$this->db->delete('payment');
	}
	
	public function getTotalListCount($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
        $result = $this->db->get('products');
		return $result->num_rows();
	}
	
	public function getAllDownload($all_id)
	{
		$this->db->where_in('product_id', $all_id);
        $result = $this->db->get('order_details');
		return $result->num_rows();
	}
	
	public function getTotalList($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
		$this->db->group_by('pro_cat'); 
        $result = $this->db->get('products');
		return $result->result();
	}
	
	public function saveMe($user_id,$product_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id); 
        $this->db->get('wishlist');
        if ($this->db->affected_rows() > 0) {
            $this->db->where('user_id', $user_id);
            $this->db->where('product_id', $product_id);
            $this->db->delete('wishlist');
            echo "delete";
            die();
        }else{
            $data = array('user_id' => $user_id, 'product_id' =>$product_id);
            $this->db->insert('wishlist', $data);  
            echo "set";
            die();
        }
    }
    
    public function getWishlist($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('wishlist');
        if ($this->db->affected_rows() > 0) {
         return $result->result();
        }else{
            return false;
        }
    }
    
    public function deleteWishlist($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('wishlist');
        if ($this->db->affected_rows() > 0) {
         return true;
        }else{
            return false;
        }
    }
    
    
    
}