<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class CreativePartner extends CI_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model("PartnerModel");
		$this->load->model("ProductModel");
		$this->load->library('pagination');
	  $this->load->helper('jephine');
	}
    
    public function CreateMonthalyRepot()
	{
	    $end = getCurrentMouthDay();
        $start = getCurrentMouthBackDay();
        $sql= "SELECT *, COUNT(`product_id`) as download , SUM(`product_price`) as total_price FROM `order_detailst` WHERE `created_at` BETWEEN '$start' AND '$end' GROUP BY `pro_user_id`";
        $query = $this->db->query($sql);
        
        if($query->num_rows()){
            foreach($query->result() as $result){
                $invoice_name = "jeph_".$result->pro_user_id.$result->order_details_id;
                $query = $this->db->query("INSERT INTO `payment_report`(`user_id`, `invoice`, `invoice_date`, `amount`, `downloads`) VALUES ('$result->pro_user_id','$invoice_name','$end','$result->total_price','$result->download')");
            }
        }
	}
	
	public function login()
	{
		$data =array();
		$data['title'] = "Partner Login |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('partner/login',$data);
	}
	

	public function postLogin()
	{
		$email = $this->input->post('email',true);
		$pass = $this->input->post('password',true);
		$details = $this->PartnerModel->partnerLoginByEmail($email);
		if(password_verify($pass,$details->user_password)){
	    if($details->user_status == 1) {
				$sdata['ptnr_id'] = $details->user_id;
				$sdata['ptnr_name'] =$details->username;
				$sdata['ptnr_email'] =$details->user_email;
				$this->session->set_userdata($sdata);
				// remember me
            if(!empty($this->input->post("remember"))) {
              setcookie ("partnerLoginId", $email, time()+ (10 * 365 * 24 * 60 * 60));  
              setcookie ("partnerLoginPass", $pass,  time()+ (10 * 365 * 24 * 60 * 60));
            } else {
              setcookie ("partnerLoginId",""); 
              setcookie ("partnerLoginPass","");
            }
            if(checkUserData($details->user_id)){
                redirect("partner-dashboard/"); 
            }else{
               redirect("tooltip/");
            }
			
		  }else{
		    $this->session->set_flashdata('flash_msg','U Are Not An Active Partner...!');
	      redirect("partner-login");
		  }
		}else{
			$this->session->set_flashdata('flash_msg','Incorrect Email Or Password...!');
			redirect("partner-login");
		}
	}

	public function register()
	{
		$data =array();
		$data['title'] = "Creative Partner |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('partner/register',$data);
	}
	
	public function tooltip()
	{
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		if ($partnerInfo == null) {
          show_404();
        }
		$data =array();
		$data['title'] = "Tool Tip |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$this->load->view('partner/tooltip',$data);
	}
	
	public function getPortfolio()
	{
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		if ($partnerInfo == null) {
          show_404();
        }
		$data =array();
		$data['title'] = "Portfolio |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$data['portfolios'] = $this->PartnerModel->getTotalList($user_id);
		$this->load->view('partner/portfolio',$data);
	}
	
	public function getReports()
	{
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		if ($partnerInfo == null) {
          show_404();
        }
		$data =array();
		$data['title'] = "Reports |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		
		$all_id = array();
		if(geUserByAllProduct($user_id)){
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
		
		if(isset($_GET['pay_status'])){
		    $pay_status = $_GET['pay_status'];
		}else{
		    $pay_status = '';  
		}
		
		if(isset($_GET['fDate'])){
            $fDate = date('Y-m-d', strtotime($_GET['fDate']));
            $tDate = date('Y-m-d', strtotime($_GET['tDate']));
            if(count($all_id)){
                $data['assetSummarys'] = $this->PartnerModel->getAssetSummaryByDate($all_id,$fDate,$tDate);
            }else{
                $data['assetSummarys'] = array();
            }
		}else{
		    if(count($all_id)){
		    $data['assetSummarys'] = $this->PartnerModel->getAssetSummary($all_id);
    		}else{
    		   $data['assetSummarys'] = array();
    		}
		}
		
		if(isset($_GET['payfDate'])){
            $payfDate = date('Y-m-d', strtotime($_GET['payfDate']));
            $paytDate = date('Y-m-d', strtotime($_GET['paytDate']));
            $data['paymentReports'] = $this->PartnerModel->getPaymtReportByDate($user_id,$payfDate,$paytDate,$pay_status);
		}else{
		    $data['paymentReports'] = $this->PartnerModel->getPaymtReport($user_id,$pay_status);
		}
		
		
		
		$this->load->view('partner/report',$data);
	}
	public function generatePdf() 
	{
	    $this->load->library('Pdf');
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		if ($partnerInfo == null) {
          show_404();
        }
        
        $all_id = array();
		if(geUserByAllProduct($user_id)){
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
		
		if(isset($_GET['pay_status'])){
		    $pay_status = $_GET['pay_status'];
		}else{
		    $pay_status = '';  
		}
		
		if(isset($_GET['fDate'])){
            $fDate = date('Y-m-d', strtotime($_GET['fDate']));
            $tDate = date('Y-m-d', strtotime($_GET['tDate']));
            if(count($all_id)){
                $data['assetSummarys'] = $this->PartnerModel->getAssetSummaryByDate($all_id,$fDate,$tDate);
            }else{
                $data['assetSummarys'] = array();
            }
		}else{
		    if(count($all_id)){
		    $data['assetSummarys'] = $this->PartnerModel->getAssetSummary($all_id);
    		}else{
    		   $data['assetSummarys'] = array();
    		}
		}
		
		if(isset($_GET['payfDate'])){
            $payfDate = date('Y-m-d', strtotime($_GET['payfDate']));
            $paytDate = date('Y-m-d', strtotime($_GET['paytDate']));
            $data['paymentReports'] = $this->PartnerModel->getPaymtReportByDate($user_id,$payfDate,$paytDate,$pay_status);
		}else{
		    $data['paymentReports'] = $this->PartnerModel->getPaymtReport($user_id,$pay_status);
		}
		
    	
    	$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    	// set document information
    	$pdf->SetCreator(PDF_CREATOR);
    	$pdf->SetAuthor('https://www.roytuts.com');
    	$pdf->SetTitle('Sales Information for Products');
    	$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
    	$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
    	// set default header data
    	//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    	// set header and footer fonts
    	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    	// set default monospaced font
    	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    	// set margins
    	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    	// set auto page breaks
    	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    	// set image scale factor
    	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    	// set font
    	$pdf->SetFont('times', 'BI', 12);
    	
    	// ---------------------------------------------------------
    	
    	
    	//Generate HTML table data from MySQL - start
    	$template = array(
    		'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    	);
    
    	$this->table->set_template($template);
    
    	$this->table->set_heading('Invoices', 'Creative Partner', 'Invoice Date', 'AMOUNT', 'Status');
    	
    	$salesinfo = $data['paymentReports'];
    		
    	foreach ($salesinfo as $sf):
    		$this->table->add_row($sf->invoice, $sf->user_id, $sf->invoice_date, $sf->downloads, $sf->status);
    	endforeach;
    	
    	$html = $this->table->generate();
    	//Generate HTML table data from MySQL - end
    	
    	// add a page
    	$pdf->AddPage();
    	
    	// output the HTML content
    	$pdf->writeHTML($html, true, false, true, false, '');
    	
    	// reset pointer to the last page
    	$pdf->lastPage();
    
    	//Close and output PDF document
    	$pdf->Output(md5(time()).'.pdf', 'D');
	}
	public function getInsights()
	{
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		if ($partnerInfo == null) {
          show_404();
        }
        
		$data =array();
		$data['title'] = "Insights |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$all_id = array();
		if(geUserByAllProduct($user_id)){
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
		
		$data['maximumUpload'] = $this->PartnerModel->getAllUploadsMonth($user_id);
		$data['maximumDownload'] = $this->PartnerModel->getAllDownloadMonth($all_id);
	    $data['maximumEarning'] = $this->PartnerModel->getAllEarningMonth($all_id);
	    $data['mostPopular'] = $this->PartnerModel->getMostPopularPhoto($all_id);
	    $data['mostPopularCat'] = $this->PartnerModel->getMostPopularCategory($all_id);
	    $data['topRankers'] = $this->PartnerModel->getTopRankersList();
	    
		$this->load->view('partner/insights',$data);
	}
	
	public function getUpkeep()
	{
	    if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));
		if ($partnerInfo == null) {
          show_404();
        }
		$data =array();
		$data['title'] = "Upkeep |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$this->load->view('partner/upkeep',$data);
	}
	
	public function passwordChange()
	{
		if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));
		if ($partnerInfo == null) {
          show_404();
        }
		$data =array();
		$data['title'] = "Change Password |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$this->load->view('partner/change_password',$data);
	}

	public function update_partner_password()
	{
		$user_id = $this->input->post('user_id',true);
		$userInfo = $this->PartnerModel->getPartnerInFo($user_id);
		$current_password = $this->input->post('current_password',true);
		$new_password = $this->input->post('new_password',true);

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[new_password]');
	 	if($this->form_validation->run()){
 	    if(password_verify($current_password,$userInfo->user_password)){
        $data = array('user_password'=>password_hash($new_password,PASSWORD_DEFAULT)); 
        $this->PartnerModel->change_password($user_id,$data);
        $this->session->set_flashdata("flash_msg_success","<font class='success'>Change Password Successfully</font>");
  	    $this->passwordChange();
      }else{
        $this->session->set_flashdata("flash_msg","<font class='success'>Sorry Not Password Change</font>");
        $this->passwordChange();
      }
	 	}else{
	 	  $this->passwordChange();
	 	}	
	}

	public function saveRegister()
	{
	  $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_email]');
		$this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('con_pass', 'Password Confirmation', 'trim|required|matches[password]');
	 	if($this->form_validation->run()){
 	    $data = array(
	        'username' => $this->input->post('name',true),
	        'user_email' =>$this->input->post('email',true),
	        'user_phone' =>$this->input->post('phone',true),
	        'user_password' =>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
	        'user_role' => '2',
	        'user_status' => '1'
	        );

	    if($this->PartnerModel->saveRegister($data)){
	      // start registration Successfull mail 
  			$mdata = array();
  			$mdata['name'] =  $this->input->post('name',true);
  			$mdata['from'] = "admin@jephine.com";
  			$mdata['admin_full_name'] = "Jephine Creative Agency";
  			$mdata['to'] = $this->input->post('email');
  			$mdata['subject'] = "Registration Successfull.";
  			$mdata['password'] = $this->input->post('password');
  			$this->PartnerModel->mail_send($mdata,'registration_successfull');
  			$this->session->set_flashdata('flash_msg_suu','Registration Successfully ! Check your email and view login Details.');
  			redirect("CreativePartner/login");
	    }else{
				$this->session->set_flashdata('flash_msg','Registration error !');
				$this->register();
	    }
	 	}else{
	 	  $this->register();
	 	}
	}

	public function dashboard()
	{
		if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
    
		$data =array();
		$data['title'] = "Partner Dashboard |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		$all_id = array();
		if(geUserByAllProduct($user_id)){
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
		$data['total_list'] = $this->PartnerModel->getTotalListCount($user_id);
	
		if(count($all_id)){
		   $data['download'] = $this->PartnerModel->getAllDownload($all_id);
		   $data['downloads'] = $this->PartnerModel->getAllDownloadRecent($all_id);
		   $data['earning'] = $this->PartnerModel->getAllEarning($all_id);
		}else{
		   $data['download'] = 0;
		   $data['earning'] = 0;
		   $data['downloads'] = array();
		}
		
		if(count($all_id)){
    		$getAllChatLists = $this->PartnerModel->getAllChatList($user_id,$all_id);
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
		
		$total_products = $this->PartnerModel->getTotalProducts($user_id);
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
		$this->load->view('partner/index',$data);
	}

  	public function profile($user_id)
	{
		$user = getDecrypt($user_id); 
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user);
    
		$data =array();
		$data['title'] = "Profile |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		
		$this->load->view('partner/profile',$data);
	}

	public function update_partner_profile()
	{
		$user_id = $this->input->post('user_id',true);
    $data =array();
		$data['title'] = "Profile |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		if($_FILES['profile_image']['name'] == '' || $_FILES['profile_image']['size'] == ''){
			$profile_image= $this->input->post('old_profile_image',true);

			$data1 = array(
				'username'=>$this->input->post('username',true),
				'user_email'=>$this->input->post('user_email',true),
				'user_phone'=>$this->input->post('user_phone',true),
				'address'=>$this->input->post('address',true),
				'country'=>$this->input->post('country',true),
				'state'=>$this->input->post('state',true),
				'city'=>$this->input->post('city',true),
				'pincode'=>$this->input->post('pincode',true),
				'image'=>$profile_image
			);

			$this->PartnerModel->update_partner($user_id,$data1);
			$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
			$data['info'] = $partnerInfo;

			$this->session->set_flashdata("flsh_msg","<font class='success'>Partner Update Successfully</font>");
			$url = 'partner-profile/'.getEncrypt($user_id);
			redirect($url);		
		}else{
			$prifile_image = $this->upload_my_image();
			if($prifile_image==NULL){
				$this->session->set_flashdata("flsh_msg","Upload image error");
				$url = 'partner-profile/'.getEncrypt($user_id);
				redirect($url);
			}else{
				$data1 = array(
					'username'=>$this->input->post('username',true),
					'user_email'=>$this->input->post('user_email',true),
					'user_phone'=>$this->input->post('user_phone',true),
					'address'=>$this->input->post('address',true),
					'country'=>$this->input->post('country',true),
					'state'=>$this->input->post('state',true),
					'city'=>$this->input->post('city',true),
					'pincode'=>$this->input->post('pincode',true),
					'image'=>$prifile_image
				);

				$this->PartnerModel->update_partner($user_id,$data1);
				$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
				$data['info'] = $partnerInfo;

				$this->session->set_flashdata("flsh_msg","<font class='success'>Partner Update Successfully</font>");
				$url = 'partner-profile/'.getEncrypt($user_id);
				redirect($url);		
			}
		}
	}

	private function upload_my_image()
	{
		$new_name = "product_".time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './assets/partner/profile/';
		$config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
		$config['max_size']             = 1000; //kb

    $this->load->library('upload', $config);

    if($this->upload->do_upload('profile_image'))
    {
    	$data = $this->upload->data();
    	return $data['file_name'];
    }
  }
  
    public function getAllOrders()
	{
		if($this->session->userdata('ptnr_id') == '') {
			redirect("partner-login");
		}
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($user_id);
		
		$data =array();
		$all_id = array();
		$data['title'] = "Order List |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['info'] = $partnerInfo;
		
		if(geUserByAllProduct($user_id)){
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id,$value['pro_id']);
			}
		}
        if(count($all_id)){
		   $data['orders'] = $this->PartnerModel->getOrderList($user_id,$all_id);
		}else{
		   $data['orders'] = array();
		}
		$this->load->view('partner/all_orders',$data);
	}
  
    public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	
}

