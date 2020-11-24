<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getEncrypt($val)
{
  $valmd = md5($val);
  return 'en17yp'.$val.'crp'.$valmd; 
}

function get_current_url()
{
    $CI =& get_instance();
    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

function getDecrypt($encryption)
{
    
  $val = explode("crp", $encryption);
  $val1 = explode("en17yp", $val[0]);
  return $val1[1];
}



function getcatIdName($cat_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `category` WHERE `category_id` = '$cat_id'");
	$category =  $query->row();
	if($category){
        return $category->category_name;
	}else{
	    return '';
	}
}

function getSingalImage($pro_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_id` = '$pro_id'");
	$product =  $query->row();
	if($product){
	    return $product->pro_image;
	}else{
	    return $img = '';
	}
}

function getVerticalImage($vertical)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT pro_id FROM `products` WHERE `verticals` = '$vertical' group by verticals order by count(verticals) DESC");
	$product =  $query->row();
	if($product){
	    return getSingalImage($product->pro_id);
	}else{
	    return $img = '';
	}
}



function geImage($pro_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_id` = '$pro_id'");
	$product =  $query->row();
	
	$image = '';
	if($product){
	  return $product->pro_image;
	}else{
	  return $image;
	}
}


function getCategory()
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `category` WHERE `category_status` = '1' ORDER BY category_id DESC");
	return  $query->result();  
}

function getCountProCategory($cat_id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_cat` = '$cat_id'");
	return $num = $query->num_rows();
}

function getColor()
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `color` WHERE `status` = '1'");
	return  $query->result();  
}

function geUserDetails($user_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `users` WHERE `user_id` = '$user_id'");
	return $query->row();
}

function getUserDetails($user_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `users` WHERE `user_id` = '$user_id'");
	return $query->row();
}


function checkUserData($user_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_user_id` = '$user_id'");
	$num = $query->num_rows();
	if($num){
	   return true; 
	}else{
	   return false;  
	}
}

function getCategoryIdByName($title)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `category` WHERE `category_status` = '1' AND `category_name`='$title'");
	$row = $query->row(); 
	if($row){
			return getEncrypt($row->category_id);
	}else{
			return getEncrypt('1');
	} 
}

function geProductDetails($pro_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_id` = '$pro_id'");
	return $query->row();
}

function geProductByCatName($pro_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_id` = '$pro_id'");
	if($query->row()->pro_cat){
	    return getcatIdName($query->row()->pro_cat);  
	}else{
	   return ''; 
	}
	
}

function getProductListByCatId($cat_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `products` WHERE `pro_cat` = '$cat_id'");
	if($query->result()){
	    return $query->result();  
	}else{
	   return array(); 
	}
	
}

function geShippingById($shipping_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `shipping` WHERE `shipping_id` = '$shipping_id'");
	return $query->row();
}

function geOrderById($order_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `order` WHERE `order_id` = '$order_id'");
	return $query->row();
}

function geOrderDetailById($order_details_id)
{
  $ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `order_details` WHERE `order_details_id` = '$order_details_id'");
	return $query->row();
}

function gePaymentById($payment_id)
{
    $ci=& get_instance();
    $ci->load->database(); 
    $query = $ci->db->query("SELECT * FROM `payment` WHERE `payment_id` = '$payment_id'");
    return $query->row();
}

function geUserByAllProduct($user_id=0)
{
  	$ci=& get_instance();
	$ci->load->database(); 
	if($user_id!=0){
		# FOR OTHER USER RESSULT.
		$query = $ci->db->query("SELECT pro_id FROM `products` WHERE `pro_user_id` = '$user_id'");
	}else{
		# FOR ADMIN RESSULT.
		$query = $ci->db->query("SELECT pro_id FROM `products`");
	}
	return array_values($query->result_array());
}

function geUserByTopRank($user_id)
{
    $name = geUserDetails($user_id)->username;
    $all_id = array();
    foreach (geUserByAllProduct($user_id) as $value) {
    	array_push($all_id,$value['pro_id']);
    }
    $list = implode(', ', $all_id); 
   
    $ci=& get_instance();
    $ci->load->database(); 
    $sql="SELECT product_id,count(`product_id`) as count FROM order_details  WHERE `product_id` IN($list) group by `product_id` order by count(product_id) DESC LIMIT 1";  
    $query = $ci->db->query($sql);
    $arr = array();
	$arr = array('product_id'=>$query->row()->product_id,'downloads'=>$query->row()->count,'name'=>$name);
   return $arr;
}

function getOrderByProductDetails($order_id)
{
    $orders = array();
    $ci=& get_instance();
    $ci->load->database(); 
    $query = $ci->db->query("SELECT * FROM `order_details` WHERE `order_id` = '$order_id'");
    return  $query->result();
}

function getCurrentMouthDay()
{
    return date('Y-m').'-05';
}

function getCurrentMouthBackDay()
{
    return date("Y-m", strtotime("-1 months")).'-06';
}

function getCurrentYear()
{
    return date('Y');
}

function getImageRecognition($image_url)
{
    $api_credentials = array(
    'key' => 'acc_e9a1b1a1c396c77',
    'secret' => '2181f450932aac898168d51342aa16f4'
    );
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://api.imagga.com/v2/tags?image_url='.$image_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, $api_credentials['key'].':'.$api_credentials['secret']);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $json_response = json_decode($response);
    // if($json_response->status->type == 'success'){
    //     $img_name = ucwords($json_response->result->tags[0]->tag->en);
    // }else{
    //     $img_name =  false;
    // }
    return $json_response->result->tags;
}

function getIsTrue($user_id,$product_id)
{   
    $ci=& get_instance();
    $ci->load->database(); 
    $query = $ci->db->query("SELECT * FROM `wishlist` WHERE `user_id`='$user_id' AND `product_id` = '$product_id'");
    if($query->num_rows()){
        return true; 
    }else{
        return false;
    } 
}

