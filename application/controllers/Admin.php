<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('admin');
		}
		$this->load->model('AdminModel');
		$this->load->model("PartnerModel");
		$this->load->model("ProductModel");
		$this->load->helper('jephine');
	}
	
	public function index()
	{
		$data = array();
		$data['title'] = "Admin | Dashboard";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['recent_product'] = $this->AdminModel->get_recent_product();
		$user_id = $this->session->userid;
		
		$all_id = array();
		if(geUserByAllProduct()){
			foreach (geUserByAllProduct() as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
		$data['total_list'] = $this->PartnerModel->getTotalListCount($user_id);
		$getTotalSubscripation = $this->AdminModel->getTotalUser(array('user_role'=>2,'user_levelNot'=>''));
		$data['totalSubscripation'] = $getTotalSubscripation['recordCount'];
		
		$getTotalPartners = $this->AdminModel->getTotalUser(array('user_role'=>2));
		$data['totalPartners'] = $getTotalPartners['recordCount'];
		
		
		$getTotalUsers = $this->AdminModel->getTotalUser(array('user_role'=>3));
		$data['totalUsers'] = $getTotalUsers['recordCount'];
		
		if(count($all_id)){
		   $data['totalAssets'] = count($all_id);   
		   $data['saleThisMonth'] = $this->PartnerModel->getTotalSalesCurrentMonth($all_id);
		}else{
		   $data['totalAssets'] = 0;
		   $data['saleThisMonth'] = array('price'=>0);
		}
		$getMonthViewData = $this->PartnerModel->getAllSecondChatList(array());
		$data['qGetMonthViewData'] = $getMonthViewData['data'];
		$data['monthViewRecordCount'] = $getMonthViewData['recordCount'];
		
		$getQuarterlyViewData = $this->PartnerModel->getAllSecondChatList(array('viewType'=>'quarterly'));
		$data['qGetQuarterlyViewData'] = $getQuarterlyViewData['data'];
		$data['quarterlyViewRecordCount'] = $getQuarterlyViewData ['recordCount'];
		
		$getYearViewData = $this->PartnerModel->getAllSecondChatList(array('viewType'=>'yearly'));
		$data['qGetYearViewData'] = $getYearViewData['data'];
		$data['yearViewRecordCount'] = $getYearViewData['recordCount'];
		
		//echo $this->db->last_query();exit;
		//print_r($getYearViewData);exit;
		if(count($all_id)){
    		$getAllChatLists = $this->PartnerModel->getAllChatList($user_id,$all_id);
    		//print_r($getAllChatLists);exit;
			$jan_d = $jan_e = $feb_d = $feb_e =$mar_d = $mar_e =$apr_d = $apr_e =$may_d = $may_e =$jun_d = $jun_e = $jul_d = $jul_e = $aug_d = $aug_e =$sep_d = $sep_e =$oct_d = $oct_e =$nov_d = $nov_e =$dec_d = $dec_e = $jan_as = $feb_as = $mar_as = $apr_as = $may_as = $jun_as = $jul_as = $aug_as =$sep_as = $oct_as = $nov_as = $dec_as =0;
    		
    		foreach($getAllChatLists as $chatList){
    		    if($chatList['date'] =='Jan'){
    		        $jan_d = $jan_d+1;
    		        $jan_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Feb'){
    		        $feb_d = $feb_d+1;
    		        $feb_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Mar'){
    		        $mar_d = $mar_d+1;
    		        $mar_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Apr'){
    		        $apr_d = $apr_d+1;
    		        $apr_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='May'){
    		        $may_d = $may_d+1;
    		        $may_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Jun'){
    		        $jun_d = $jun_d+1;
    		        $jun_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Jul'){
    		        $jul_d = $jul_d+1;
    		        $jul_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Aug'){
    		        $aug_d = $aug_d+1;
    		        $aug_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Sep'){
    		        $sep_d = $sep_d+1;
    		        $sep_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Oct'){
    		        $oct_d = $oct_d+1;
    		        $oct_e += $chatList['price'];
    		    }
    		    if($chatList['date'] =='Nov'){
    		        $nov_d = $nov_d+1;
    		        $nov_e += $chatList['price'];
    		    }
    		    
    		    if($chatList['date'] =='Dec'){
    		        $dec_d = $dec_d+1;
    		        $dec_e += $chatList['price'];
    		    }
    		}
    		
     	    $data['download_chat'] = array('Jan' => $jan_d, 'Feb' => $feb_d ,'Mar' =>$mar_d, 'Apr' => $apr_d ,'May' => $may_d ,'Jun' => $jun_d, 'Jul' => $jul_d, 'Aug' => $aug_d, 'Sep' => $sep_d, 'Oct' => $oct_d ,'Nov' => $nov_d, 'Dec' => $dec_d);
    		$data['earning_chat'] = array('Jan' => $jan_e, 'Feb' => $feb_e ,'Mar' =>$mar_e, 'Apr' => $apr_e ,'May' => $may_e ,'Jun' => $jun_e, 'Jul' => $jul_e, 'Aug' => $aug_e, 'Sep' => $sep_e, 'Oct' => $oct_e ,'Nov' => $nov_e, 'Dec' => $dec_e);
		}else{
		   $data['download_chat'] =  array();
		   $data['earning_chat'] = array();
		}
		
		$total_products = $this->PartnerModel->getTotalProducts();
		if($total_products){
        foreach($total_products as $products){
		    if($products['date'] =='Jan'){
		        $jan_as = $jan_as+1;
		    }
		    if($products['date'] =='Feb'){
		        $feb_as = $feb_as+1;
		    }
		    if($products['date'] =='Mar'){
		        $mar_as = $mar_as+1;
		    }
		    if($products['date'] =='Apr'){
		        $apr_as = $apr_as+1;		    
		    }
		    if($products['date'] =='May'){
		        $may_as = $may_as+1;
		    }
		    if($products['date'] =='Jun'){
		        $jun_as = $jun_as+1;
		    }
		    if($products['date'] =='Jul'){
		        $jul_as = $jul_as+1;
		    }
		    if($products['date'] =='Aug'){
		        $aug_as = $aug_as+1;
		    }
		    if($products['date'] =='Sep'){
		        $sep_as = $sep_as+1;
		    }
		    if($products['date'] =='Oct'){
		        $oct_as = $oct_as+1;
		    }
		    if($products['date'] =='Nov'){
		        $nov_as = $nov_as+1;
		    }
		    
		    if($products['date'] =='Dec'){
		        $dec_as = $dec_as+1;
		    }
		}
		$data['asset_chat'] = array('Jan' => $jan_as, 'Feb' => $feb_as ,'Mar' =>$mar_as, 'Apr' => $apr_as ,'May' => $may_as ,'Jun' => $jun_as, 'Jul' => $jul_as, 'Aug' => $aug_as, 'Sep' => $sep_as, 'Oct' => $oct_as ,'Nov' => $nov_as, 'Dec' => $dec_as);
		}else{
		    $data['asset_chat'] = array();
		}
		$this->load->view('back/admin_main',$data);
	}

	public function registerform()
	{
		$data = array();
		$data['title'] = "Admin | Register Form";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('back/register_admin',$data);
	}

	public function makeadmin()
	{
		$this->form_validation->set_rules('username','User Name','required|max_length[255]');
		$this->form_validation->set_rules('user_email','Email','required|is_unique[tbl_user.user_email]');
		$this->form_validation->set_rules('user_password','Password','required|min_length[6]');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[user_password]');
		$this->form_validation->set_rules('user_role','User Rules','required');
		if($this->form_validation->run()){
			$this->AdminModel->adminRgisterModel();
			$data['success_message'] = "User Successfully Added";
			$data['main_content'] = $this->load->view('back/register_admin',$data,TRUE);
			$this->load->view('back/adminpanel',$data);
		}else{
			$this->registerform();
		}
	}

	public function adminlogout()
	{
		$this->session->sess_destroy();
		$data['success_message'] = "Successfully Logout...!";
		$this->load->view('login',$data);	
	}

	public function partner_list()
	{
		$data = array();
		$data['title'] = "Admin | Partner List";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['users'] = $this->AdminModel->get_all_partner();
		$this->load->view('back/partner_list',$data);    
	}
	

	public function user_status($user_id)
	{
	    $status = getUserDetails($user_id)->user_status;
	    if($status=='1'){
	        $data = array('user_status'=>'0');
	    }else{
	        $data = array('user_status'=>'1');
	    }
	 
		$this->AdminModel->update_status($user_id,$data);
		$this->session->set_flashdata("flsh_msg","<font class='success'>Status Update Successfully</font>");
        redirect('user-list');
	}
	
	public function partner_status($user_id)
	{
	    $status = getUserDetails($user_id)->user_status;
	    if($status=='1'){
	        $data = array('user_status'=>'0');
	    }else{
	        $data = array('user_status'=>'1');
	    }
	 
		$this->AdminModel->update_status($user_id,$data);
		$this->session->set_flashdata("flsh_msg","<font class='success'>Status Update Successfully</font>");
        redirect('partner-list');
	}
	

	public function save_partner()
	{
		$this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email|is_unique[users.user_email]');
		if($this->form_validation->run()){
			if($_FILES['partner_image']['name'] == '' || $_FILES['partner_image']['size'] == ''){
				$data = array(
					'username'=>$this->input->post('username',true),
					'user_email'=>$this->input->post('user_email',true),
					'user_phone'=>$this->input->post('user_phone',true),
					'user_password'=>password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT),
					'address'=>$this->input->post('address',true),
					'country'=>$this->input->post('country',true),
					'state'=>$this->input->post('state',true),
					'city'=>$this->input->post('city',true),
					'pincode'=>$this->input->post('pincode',true),
					'user_role' => '2',
					'user_status' => '1'
				);
				$this->AdminModel->add_partner($data);
		    $this->session->set_flashdata("flsh_msg","<font class='success'>Partner Added Successfully</font>");
      	redirect('partner-list');
			}else{
				$profile_image = $this->upload_partner_image();
				if($profile_image == NULL){
					$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
					$this->partner_list();
				}else{
		    	$data = array(
						'username'=>$this->input->post('username',true),
						'user_email'=>$this->input->post('user_email',true),
						'user_phone'=>$this->input->post('user_phone',true),
						'user_password'=>password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT),
						'address'=>$this->input->post('address',true),
						'country'=>$this->input->post('country',true),
						'state'=>$this->input->post('state',true),
						'city'=>$this->input->post('city',true),
						'pincode'=>$this->input->post('pincode',true),
						'image'=>$profile_image,
						'user_role' => '2',
						'user_status' => '1'
					);
					$this->AdminModel->add_partner($data);
			    $this->session->set_flashdata("flsh_msg","<font class='success'>Partner Added Successfully</font>");
	      	redirect('partner-list');
				}
			}
		}else{
			$this->partner_list();
		}
	}

	public function update_partner()
	{
		$partner_id = $this->input->post('partner_id',true);
		if($this->input->post('user_password',true)){
			$password = password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT);
		}else{
			$password = $this->input->post('password',true);
		}
		if($_FILES['partner_image']['name'] == '' || $_FILES['partner_image']['size'] == ''){
			$profile_image = $this->input->post('old_image',true);
			$data = array(
				'username'=>$this->input->post('username',true),
				'user_email'=>$this->input->post('user_email',true),
				'user_phone'=>$this->input->post('user_phone',true),
				'user_password'=>$password,
				'address'=>$this->input->post('address',true),
				'country'=>$this->input->post('country',true),
				'state'=>$this->input->post('state',true),
				'city'=>$this->input->post('city',true),
				'pincode'=>$this->input->post('pincode',true),
				'image'=>$profile_image
			);

			if($this->AdminModel->update_partner($partner_id,$data)){
	    	$this->session->set_flashdata("flsh_msg","<font class='success'>Partner Updated Successfully</font>");
	      redirect('partner-list');
			}else{
				$this->partner_list();
			}
		}else{
			$profile_image = $this->upload_partner_image();
			if($profile_image == NULL){
				$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
				$this->partner_list();
			}else{
	    	$data = array(
					'username'=>$this->input->post('username',true),
					'user_email'=>$this->input->post('user_email',true),
					'user_phone'=>$this->input->post('user_phone',true),
					'user_password'=>$password,
					'address'=>$this->input->post('address',true),
					'country'=>$this->input->post('country',true),
					'state'=>$this->input->post('state',true),
					'city'=>$this->input->post('city',true),
					'pincode'=>$this->input->post('pincode',true),
					'state'=>$this->input->post('state',true),
					'image'=>$profile_image
				);

				if($this->AdminModel->update_partner($partner_id,$data)){
		    	$this->session->set_flashdata("flsh_msg","<font class='success'>Partner Updated Successfully</font>");
		      redirect('partner-list');
				}else{
					$this->partner_list();
				}
			}
		}
	}

	public function delete_partner($partner_id)
	{
		$this->AdminModel->delete_partner($partner_id);
		$this->session->set_flashdata("flsh_msg","<font class='success'>Partner Deleted Successfully</font>");
        redirect('partner-list');
	}

	public function user_list()
	{
		$data = array();
		$data['title'] = "Admin | User List";
		$data['description'] ="Welcome to Admin Panel";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['users'] = $this->AdminModel->get_all_user();
		$this->load->view('back/user_list',$data);    
	}

	public function save_user()
	{
		$this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email|is_unique[users.user_email]');
		if($this->form_validation->run()){
			if($_FILES['user_image']['name'] == '' || $_FILES['user_image']['size'] == ''){
				$data = array(
					'username'=>$this->input->post('username',true),
					'user_email'=>$this->input->post('user_email',true),
					'user_phone'=>$this->input->post('user_phone',true),
					'user_password'=>password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT),
					'address'=>$this->input->post('address',true),
					'country'=>$this->input->post('country',true),
					'state'=>$this->input->post('state',true),
					'city'=>$this->input->post('city',true),
					'pincode'=>$this->input->post('pincode',true),
					'user_role' => '3',
					'user_status' => '1'
				);
				$this->AdminModel->add_user($data);
	    	$this->session->set_flashdata("flsh_msg","<font class='success'>User Added Successfully</font>");
      	redirect('user-list');
			}else{
				$profile_image = $this->upload_user_image();
				if($profile_image == NULL){
					$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
      		redirect('user-list');
				}else{
		    	$data = array(
						'username'=>$this->input->post('username',true),
						'user_email'=>$this->input->post('user_email',true),
						'user_phone'=>$this->input->post('user_phone',true),
						'user_password'=>password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT),
						'address'=>$this->input->post('address',true),
						'country'=>$this->input->post('country',true),
						'state'=>$this->input->post('state',true),
						'city'=>$this->input->post('city',true),
						'pincode'=>$this->input->post('pincode',true),
						'image' =>$profile_image,
						'user_role' => '3',
						'user_status' => '1'
					);
					$this->AdminModel->add_user($data);
		    	$this->session->set_flashdata("flsh_msg","<font class='success'>User Added Successfully</font>");
	      	redirect('user-list');
				}
			}
		}else{
			$this->user_list();
		}
	}

	public function update_user()
	{
		$user_id = $this->input->post('user_id',true);
		if($this->input->post('user_password',true)){
			$password = password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT);
		}else{
			$password = $this->input->post('password',true);
		}

		if($_FILES['user_image']['name'] == '' || $_FILES['user_image']['size'] == ''){
			$profile_image = $this->input->post('old_image',true);
			$data = array(
				'username'=>$this->input->post('username',true),
				'user_email'=>$this->input->post('user_email',true),
				'user_phone'=>$this->input->post('user_phone',true),
				'user_password'=>$password,
				'address'=>$this->input->post('address',true),
				'country'=>$this->input->post('country',true),
				'state'=>$this->input->post('state',true),
				'city'=>$this->input->post('city',true),
				'pincode'=>$this->input->post('pincode',true),
				'image'=>$profile_image
			);

			if($this->AdminModel->update_user($user_id,$data)){
		    $this->session->set_flashdata("flsh_msg","<font class='success'>User Updated Successfully</font>");
	      redirect('user-list');
			}else{
				$this->user_list();
			}
		}else{
			$profile_image = $this->upload_user_image();
			if($profile_image == NULL){
				$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
				$this->user_list();
			}else{
	    	$data = array(
					'username'=>$this->input->post('username',true),
					'user_email'=>$this->input->post('user_email',true),
					'user_phone'=>$this->input->post('user_phone',true),
					'user_password'=>$password,
					'address'=>$this->input->post('address',true),
					'country'=>$this->input->post('country',true),
					'state'=>$this->input->post('state',true),
					'city'=>$this->input->post('city',true),
					'pincode'=>$this->input->post('pincode',true),
					'image'=>$profile_image
				);

				if($this->AdminModel->update_user($user_id,$data)){
			    $this->session->set_flashdata("flsh_msg","<font class='success'>User Updated Successfully</font>");
		      redirect('user-list');
				}else{
					$this->user_list();
				}
			}
		}
	}

	public function delete_user($user_id)
	{
		$this->AdminModel->delete_user($user_id);
		$this->session->set_flashdata("flsh_msg","<font class='success'>User Deleted Successfully</font>");
    redirect('user-list');
	}

	private function upload_partner_image()
	{
		$new_name = "partner_".time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './assets/partner/profile/';
		$config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
		$config['max_size']             = 1000; //kb

    $this->load->library('upload', $config);

    if($this->upload->do_upload('partner_image'))
    {
    	$data = $this->upload->data();
    	return $data['file_name'];
    }
  }

  private function upload_user_image()
	{
		$new_name = "user_".time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './assets/front/profile/';
		$config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
		$config['max_size']             = 1000; //kb

    $this->load->library('upload', $config);

    if($this->upload->do_upload('user_image'))
    {
    	$data = $this->upload->data();
    	return $data['file_name'];
    }
  }
}
