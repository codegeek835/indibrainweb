<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("CheckoutModel");
		$this->load->model("MailModel");
	}
	
	public function viewLogin()
	{
		$data =array();
		$data['breadcrumb'] = "Login";
		$data['title'] = "Login | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/login',$data);
	}

	public function customer_registration()
	{
		$this->form_validation->set_rules('cus_name', 'Customer Name', 'trim|required|min_length[5]');
		// $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('cus_email', 'Email', 'required|valid_email|is_unique[tbl_customer.cus_email]');
		$this->form_validation->set_rules('cus_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('con_pass', 'Password Confirmation', 'trim|required|matches[cus_password]');
	 	if($this->form_validation->run()){
			$customer_id = $this->CheckoutModel->save_customer_info();
			$sdata = array();
			$sdata['cus_id'] = $customer_id;
			$sdata['cus_name'] = $this->input->post('cus_name');
			$sdata['cus_email'] = $this->input->post('cus_email');
			$sdata['cus_id'] = $this->session->set_userdata($sdata);
			// start registration Successfull mail 
			$mdata = array();
			$mdata['name'] = $this->input->post('cus_name');
			$mdata['from'] = "admin@sumon-it.com";
			$mdata['admin_full_name'] = "sumon-it.com";
			$mdata['to'] = $this->input->post('cus_email');
			$mdata['subject'] = "Registration Successfull......";
			$mdata['password'] = $this->input->post('cus_password');
			$this->MailModel->mail_send($mdata,'registration_successfull');

			// end registration successfull  mail 
			redirect("checkout");
		}else{
			$this->viewLogin();//checkout means login page
		}
	}

	public function customer_login()
	{
		$cus_email = $this->input->post('cus_email',true);
		$cus_pass = md5($this->input->post('cus_password',true));
		$user_details = $this->CheckoutModel->get_user_login_by_email($cus_email);
		if($cus_pass==$user_details->cus_password){
			$sdata['cus_id'] = $user_details->cus_id;
			$sdata['cus_name'] =$user_details->cus_name;
			$sdata['cus_email'] =$user_details->cus_email;
			$sdata['cus_id'] = $this->session->set_userdata($sdata);
			redirect("my-account");
		}else{
			$this->session->set_flashdata('flash_msg','Incorrect Email Or Password...!');
			redirect("Checkout/viewLogin");
		}
	}

	public function checkout()
	{
		if($this->session->userdata('cus_id') == '') {
			redirect("login");
		}
		$data= array();
		$data['breadcrumb'] = "Checkout";
		$data['title'] = "Checkout | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);

		$customer_id= $this->session->userdata("cus_id");
		$data['cus_info'] = $this->CheckoutModel->select_customer_info_by_id($customer_id);

		$this->load->view('front/checkout',$data);
	}

	public function saveOrder()
	{
		$customer_id = $this->input->post('cus_id');
		if($this->input->post('checkbox')){
			$this->form_validation->set_rules('cus_name', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('cus_email', 'Email Address', 'trim|required');
			$this->form_validation->set_rules('cus_phone', 'Mobile Number', 'trim|required');
			$this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('cus_state', 'State', 'trim|required');
			$this->form_validation->set_rules('cus_city', 'City', 'trim|required');
			$this->form_validation->set_rules('cus_zip', 'Zip Code', 'trim|required|min_length[4]');

			$this->form_validation->set_rules('ship_name', 'Ship Full Name', 'trim|required');
			$this->form_validation->set_rules('ship_email', 'Ship Email Address', 'trim|required');
			$this->form_validation->set_rules('ship_phone', 'Ship Mobile Number', 'trim|required');
			$this->form_validation->set_rules('ship_address', 'Ship Address', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('ship_state', 'Ship State', 'trim|required');
			$this->form_validation->set_rules('ship_city', 'Ship City', 'trim|required');
			$this->form_validation->set_rules('ship_zip', 'Ship Zip Code', 'trim|required|min_length[4]');
			if ($this->form_validation->run() == FALSE)
			{
			  $this->checkout();
			}else {
				$ship_data = array(
					'cus_id' => $customer_id,
					'is_ship' => '1',
					'ship_name' => $this->input->post('ship_name'),
					'ship_email' => $this->input->post('ship_email'),
					'ship_mobile' => $this->input->post('ship_phone'),
					'ship_address' => $this->input->post('ship_address'),
					'ship_state' => $this->input->post('ship_state'),
					'ship_city' => $this->input->post('ship_city'),
					'ship_zip' => $this->input->post('ship_zip')
				);

				$set_data = array(
					'cus_name' => $this->input->post('cus_name'),
					'cus_email' => $this->input->post('cus_email'),
					'cus_company' => $this->input->post('cus_company'),
					'cus_mobile' => $this->input->post('cus_phone'),
					'cus_address' => $this->input->post('cus_address'),
					'cus_state' => $this->input->post('cus_state'),
					'cus_city' => $this->input->post('cus_city'),
					'cus_zip' => $this->input->post('cus_zip')
				);
			}
		}else{
			$this->form_validation->set_rules('cus_name', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('cus_email', 'Email Address', 'trim|required');
			$this->form_validation->set_rules('cus_phone', 'Mobile Number', 'trim|required');
			$this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('cus_state', 'State', 'trim|required');
			$this->form_validation->set_rules('cus_city', 'City', 'trim|required');
			$this->form_validation->set_rules('cus_zip', 'Zip Code', 'trim|required|min_length[4]');

			if ($this->form_validation->run() == FALSE)
			{
			  $this->checkout();
			}else {
				$ship_data = array(
					'cus_id' => $customer_id,
					'is_ship' => '0',
					'ship_name' => $this->input->post('cus_name'),
					'ship_email' => $this->input->post('cus_email'),
					'ship_mobile' => $this->input->post('cus_phone'),
					'ship_address' => $this->input->post('cus_address'),
					'ship_state' => $this->input->post('cus_state'),
					'ship_city' => $this->input->post('cus_city'),
					'ship_zip' => $this->input->post('cus_zip')
				);

				$set_data = array(
					'cus_name' => $this->input->post('cus_name'),
					'cus_email' => $this->input->post('cus_email'),
					'cus_company' => $this->input->post('cus_company'),
					'cus_mobile' => $this->input->post('cus_phone'),
					'cus_address' => $this->input->post('cus_address'),
					'cus_state' => $this->input->post('cus_state'),
					'cus_city' => $this->input->post('cus_city'),
					'cus_zip' => $this->input->post('cus_zip')
				);
			}
		}

		$this->CheckoutModel->upateBilling($customer_id,$set_data);
		$shipping_id = $this->CheckoutModel->saveShipping($ship_data);

		$payment_info = array(
			'payment_type' => $this->input->post('payment_gateway'),
			'payment_message' => $this->input->post('payment_message')
		);

		$payment_id  = $this->CheckoutModel->save_payment_info($payment_info);

		$payment_method = $this->input->post('payment_gateway');
		if($payment_method=='cash_on_delivery'){
			$order_info = array(
				'cus_id' => $customer_id,
				'shipping_id' => $shipping_id,
				'payment_id' => $payment_id,
				'order_total' => $this->input->post('order_total')
			);
			$this->CheckoutModel->save_order_info($order_info);
			
			$mdata = array();
			$mdata['cus_full_name'] = $this->session->userdata("cus_name");
			$mdata['to'] = $this->session->userdata("cus_email");
			$mdata['from'] = "info@ramsonsayurveda.com";
			$mdata['admin_full_name'] = "Ramsonsayurveda";
			$mdata['subject'] = "Order Successfully Complete......";

			$mdata['g_total'] = $this->session->userdata("g_total");
			$this->MailModel->Order_success_mail_send($mdata,'order_successfull');

			$this->cart->destroy();
			redirect('order-success');
		}

		if($payment_method=='paypal')
		{
			redirect('order-success');
		}
	}

	public function myAccount()
	{
		if($this->session->userdata('cus_id') == '') {
			redirect("login");
		}
		$data= array();
		$data['breadcrumb'] = "My Account";
		$data['title'] = "My Account | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);

		$customer_id= $this->session->userdata("cus_id");
		$data['cus_info'] = $this->CheckoutModel->select_customer_info_by_id($customer_id);
		$this->load->view('front/my_account',$data);
	}
	
	public function customer_logout()
	{
		$this->session->sess_destroy();
		redirect("Home");
	}

	public function order_success()
	{
		$data =array();
		$data['breadcrumb'] = "Order Success";
		$data['title'] = "Order Success | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/order_success',$data);
	}
}
