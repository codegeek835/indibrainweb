<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerModel extends CI_Model {

	public function get_user_login_by_email($email)
	{
		$data = $this->db->select('*')
			->from('users')
			->where("user_email",$email)
			->get()
			->row();
			return $data;
	}
    
    public function getPartnerInFo($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users');
        return $result->row();
    }
  
	public function partnerLoginByEmail($email)
	{
		$data = $this->db->select('*')
			->from('users')
			->where("user_email",$email)
			->where("user_role",'2')
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
	
  public function get_product_by_id($product_id){
		$this->db->select('*');
	    $this->db->from('products');
		 $this->db->where('pro_id',$product_id);
	    $query = $this->db->get();
	    return $query->row();
	}


	public function get_product_by_cat($product_id,$cat_id){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('pro_id !=' ,$product_id);
		$this->db->where('pro_cat',$cat_id);
		$query = $this->db->get();
		return $query->result();
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
	
	public function update_partner($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data);
		return true;
	}
	
	public function change_password($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
	}

	public function getTotalListCount($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
        $result = $this->db->get('products');
		return $result->num_rows();
	}
	
	public function getTotalProducts($user_id)
	{
	    $this->db->where('pro_user_id', $user_id);
		$this->db->order_by('created_at','ASC');
		$result = $this->db->get('products');
		if ($this->db->affected_rows() > 0) {
    		foreach($result->result() as $chatList){
                $time=strtotime($chatList->created_at);
                $month=date("M",$time);
    		    $monthBy[] = array('id'=>$chatList->pro_id,'date'=>$month);
    		}
		}else{
		   $monthBy = array(); 
		}
		return $monthBy;
	}
	
	public function getTotalList($user_id)
	{
		$this->db->where('pro_user_id', $user_id);
		$this->db->group_by('pro_cat'); 
        $result = $this->db->get('products');
		return $result->result();
	}

	public function getAllOrder($user_id,$all_id)
	{
		$this->db->where_in('product_id', $all_id);
    $result = $this->db->get('order_details');
		return $result->num_rows();
	}

	public function getAllDownload($all_id)
	{
		$this->db->where_in('product_id', $all_id);
        $result = $this->db->get('order_details');
		return $result->num_rows();
	}
	
	public function getAllDownloadRecent($all_id)
	{
	    $list = implode(', ', $all_id); 
        $sql="SELECT *, COUNT(`product_id`) as downloads ,SUM(`product_price`) as price FROM order_details  WHERE `product_id` IN($list) GROUP BY `product_id`";    
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getAssetSummary($all_id)
	{
	    $list = implode(', ', $all_id); 
        $sql="SELECT *, COUNT(`product_id`) as downloads ,SUM(`product_price`) as price FROM order_details  WHERE `product_id` IN($list) GROUP BY `product_id`";    
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getAssetSummaryByDate($all_id,$fDate,$tDate)
	{
	    //BETWEEN '$fDate' AND '$tDate'
	    $list = implode(', ', $all_id); 
        $sql="SELECT *, COUNT(`product_id`) as downloads ,SUM(`product_price`) as price FROM order_details  WHERE `product_id` IN($list) AND `created_at` BETWEEN '$fDate' AND '$tDate' GROUP BY `product_id`";    
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getPaymtReport($user_id,$pay_status)
	{
	    
	    if($pay_status=='1'){
	        $this->db->where('status', '1');
	    }else if($pay_status=='0'){
	        $this->db->where('status', '0');
	    }
	    
	    $this->db->where('user_id', $user_id);
        $result = $this->db->get('payment_report');
		return $result->result();
	}
	
	public function getPaymtReportByDate($user_id,$payfDate,$paytDate,$pay_status)
	{   
	    if($pay_status=='1'){
	        $sql="SELECT * FROM payment_report  WHERE `user_id` ='$user_id' AND `status`= '1' AND `invoice_date` BETWEEN '$payfDate' AND '$paytDate'";    
	    }else if($pay_status=='0'){
	        $sql="SELECT * FROM payment_report  WHERE `user_id` ='$user_id'  AND `status`= '0' AND `invoice_date` BETWEEN '$payfDate' AND '$paytDate'";    
	    }else{
	        $sql="SELECT * FROM payment_report  WHERE `user_id` ='$user_id' AND `invoice_date` BETWEEN '$payfDate' AND '$paytDate'";    
	    }
	
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getAllDownloadMonth($all_id)
	{
	    
	    if(count($all_id)>0){
	        $this->db->where_in('product_id', $all_id);
    	    $this->db->where('month(created_at)', date('m'));
            $result = $this->db->get('order_details');
    		return $result->num_rows();
	    }else{
	       return 0; 
	    }
	    
	}
	
	public function getAllEarningMonth($all_id)
	{
	     if(count($all_id)>0){
        $this->db->select('SUM(product_price) as price');
        $this->db->where_in('product_id', $all_id);
        $this->db->where('month(created_at)', date('m'));
        $this->db->from('order_details');
        $result = $this->db->get();
        return $result->row();
	     }else{
	       return array(); 
	    }
	}
	
	public function getAllUploadsMonth($user_id)
	{
	    $this->db->where('pro_user_id', $user_id);
	    $this->db->where('month(created_at)', date('m'));
        $result = $this->db->get('products');
		return $result->num_rows();
	}
	

	public function getMostPopularPhoto($all_id)
	{
	    if(count($all_id)>0){
	    $list = implode(', ', $all_id); 
        $sql="SELECT product_id,count(`product_id`) FROM order_details  WHERE `product_id` IN($list) group by `product_id` order by count(product_id) DESC LIMIT 1";  
        
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return $result->row()->product_id;
        }else{
            return 0;
        }
	    }else{
	        return 0;
	    }
	}
	
	public function getMostPopularCategory($all_id)
	{
	     if(count($all_id)>0){
	    $list = implode(', ', $all_id); 
	    $sql="SELECT products.pro_cat,count(products.pro_cat) FROM `products` JOIN `order_details` ON `order_details`.`product_id` = `products`.`pro_id`  WHERE order_details.product_id IN($list) group by products.pro_cat order by count(order_details.product_id) DESC LIMIT 1";   
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return $result->row()->pro_cat;
        }else{
            return 0;
        }
	     }else{
	        return 0;
	    }
	}
	
	public function getTopRankersList()
	{
	    $sql="SELECT products.pro_user_id,count(products.pro_user_id) FROM `products` JOIN `order_details` ON `order_details`.`product_id` = `products`.`pro_id` group by products.pro_user_id order by count(products.pro_user_id) DESC LIMIT 4";
          
        $result = $this->db->query($sql);
        
        if ($this->db->affected_rows() > 0) {
            return $result->result();
        }else{
           return array(); 
        }

	}
	
	public function getAllChatList($user_id,$all_id)
	{
	     if(count($all_id)>0){
	         
		$this->db->where_in('product_id', $all_id);
		$this->db->order_by('created_at','ASC');
		$result = $this->db->get('order_details');
		if ($this->db->affected_rows() > 0) {
    		foreach($result->result() as $chatList){
                $time=strtotime($chatList->created_at);
                $month=date("M",$time);
    		    $monthBy[] = array('price'=>$chatList->product_price,'date'=>$month);
    		}
		}else{
		   $monthBy = array(); 
		}
		return $monthBy;
	     }else{
           return array(); 
        }
	}
	
	public function getAllEarning($all_id)
	{
	    $earn = 0;
        $this->db->select_sum('product_price');
        $this->db->where_in('product_id', $all_id);
        $this->db->from('order_details');
        $query = $this->db->get();
        if($query->result()['0']->product_price){
           $earn = $query->result()['0']->product_price; 
        }else{
           $earn = 0; 
        }
    
		return $earn;
	}
	
	public function getPendingOrder($user_id,$all_id)
	{
		$pending = array();
		$this->db->where_in('product_id', $all_id);
    $result = $this->db->get('order_details');
		if($result->result()){
			foreach ($result->result() as $value) {
				if(geOrderById($value->order_id)->order_status == 'pending')
				{
					$pending[] = $value;
				}
			}
		}
		return count($pending);
	}

	public function getOrderList($user_id,$all_id)
	{
		$this->db->where_in('product_id', $all_id);
    $result = $this->db->get('order_details');
    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }	
	}
}