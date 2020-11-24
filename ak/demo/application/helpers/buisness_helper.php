<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function get_dropdown($id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `sub_category` WHERE category_sub_id = '$id'");
	if($query->num_rows() >0 ){
		return true;
	}else{
		return false;
	}
}

function getAllCategory($start,$end)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `category` LIMIT $start,$end");
	return  $query->result();
}

function subcategoryByCatId($cat_id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `sub_category` WHERE category_sub_id = '$cat_id'");
	return  $query->result();
}

function countCategory()
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `category`");
	return  $query->num_rows();
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function get_current_url()
{
	$CI =& get_instance();
	$url = $CI->config->site_url($CI->uri->uri_string());
	return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}  

function get_total_review($product_id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	
	$query = $ci->db->query("SELECT * FROM `write_review` WHERE `product_id` = $product_id" );
	$query1 = $ci->db->query("SELECT * FROM `write_review` WHERE `product_id` = $product_id ORDER BY id ASC LIMIT 5");
	$rate_details = $query1->result();

	$rate = 0;
	$total_rat = 0;
	$excellent = 0;   
	$good = 0;
	$average = 0;   
	$poor = 0;
	$terrible = 0;

	$total = count($query->result());
	if($total){
		foreach ($query->result() as $value) {
			$rate += $value->rating;
			if($value->rating=='1'){
				$terrible = $terrible+1;
			}elseif ($value->rating=='2') {
				$poor = $poor+1;
			}elseif ($value->rating == '3') {
				$average = $average+1;
			}elseif ($value->rating=='4') {
				$good = $good+1;
			}elseif ($value->rating=='5') {
				$excellent = $excellent+1;
			}
		}
		$total_rat = round($rate/$total);
	}

	$review = "<span class='rating-star'>";
	for ($i=0; $i < 5; $i++) { 
		if($i < $total_rat){
			$review .= "<i class='fa fa-star rated'></i>";
		}else{
			$review .= "<i class='fa fa-star rated-mute'></i>";
		}
	}
	$review .= "</span>";

	$btn_rating = "<span class='rated'>";
	for ($i=0; $i < 5; $i++) { 
		if($i < $total_rat){
			$btn_rating .= "<i class='fa fa-star'></i>";
		}else{
			$btn_rating .= "<i class='far fa-star'></i>";
		}
	}
	$btn_rating .= "</span>";

	return array('total' => $total, 'total_rat' => $total_rat, 'rating' => $review, 'btn_rating' => $btn_rating, 'excellent'=> $excellent, 'good' => $good, 'average'=> $average, 'poor'=> $poor, 'terrible'=> $terrible,'rate_details'=>$rate_details);
} 

function get_user_details($id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `users` WHERE `id` = $id");
	$row = $query->result();
	if($row){
		return $row[0]; 
	}else{
		return array(); 
	}	
}  

function getUserName($id)
{
	$ci=& get_instance();
	$ci->load->database(); 
	$query = $ci->db->query("SELECT * FROM `users` WHERE `id` = $id");
	return $query->result()[0]->full_name;		
}  

function get_map_key()
{
	//return "AIzaSyDpxe7fGVRVw1NBFimXyrK4jDKWHP78jFM";
	return "AIzaSyAFe6U7nQiEuQhsVw6I1k0nAiwmZaPo3-Y"; ///USA
	//return "AIzaSyCepYx-AqiUhCtTr-NLyPOkVEl-MIaCXI4";//////// the festivity
}  






