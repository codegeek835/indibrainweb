<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("CheckoutModel");
		$this->load->model("MailModel");
		$this->load->helper('jephine');
	}
	
	public function checkout()
	{
		if($this->session->userdata('user_id') == '') {
			redirect("login");
		}
		$data= array();
		$data['breadcrumb'] = "Checkout";
		$data['title'] = "Checkout | Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$user_id= $this->session->userdata("user_id");
		$data['cus_info'] = $this->CheckoutModel->select_customer_info_by_id($user_id);
		
        $data['callback_url']       = base_url().'Checkout/callback';
        $data['surl']               = base_url().'Checkout/success';;
        $data['furl']               = base_url().'Checkout/failed';;
        $data['currency_code']      = 'INR';
        
		$this->load->view('front/checkout',$data);
	}
	
	// initialized cURL Request
    private function curl_handler($payment_id, $amount)  {
        $url            = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id         = "rzp_test_vzLUok1mIIbncq";
        $key_secret     = "UlkLpqe3VImdYusVm8MTuxhN";
        $fields_string  = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }   
    
    // callback method
    public function callback() {   
        print_r($this->input->post());     
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            
            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_flashdata('merchant_order_id', $this->input->post('merchant_order_id'));
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }
            
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }

    public function success() {
        $data['title'] = 'Razorpay Success | TechArise';
        echo "<h4>Your transaction is successful</h4>";  
        echo "<br/>";
        echo "Transaction ID: ".$this->session->flashdata('razorpay_payment_id');
        echo "<br/>";
        echo "Order ID: ".$this->session->flashdata('merchant_order_id');
    } 
     
    public function failed() {
        $data['title'] = 'Razorpay Failed | TechArise';  
        echo "<h4>Your transaction got Failed</h4>";            
        echo "<br/>";
        echo "Transaction ID: ".$this->session->flashdata('razorpay_payment_id');
        echo "<br/>";
        echo "Order ID: ".$this->session->flashdata('merchant_order_id');
    }
    
	public function saveOrder()
	{
		$user_id = getDecrypt($this->input->post('user_id'));
        $bill_data = array();
        
		$bill_data = array(
			'username' => $this->input->post('bill_username'),
			'user_email' => $this->input->post('bill_email'),
			'user_phone' => $this->input->post('bill_phone'),
			'address' => $this->input->post('bill_address'),
			'country' => $this->input->post('bill_country'),
			'state' => $this->input->post('bill_state'),
			'city' => $this->input->post('bill_city'),
			'pincode' => $this->input->post('bill_pincode')
		);
			
		$this->CheckoutModel->upateBilling($user_id,$bill_data);
		$bill_data['user_id'] = $user_id;
		$shipping_id = $this->CheckoutModel->saveShipping($bill_data);
        
		$payment_info = array(
			'payment_type' => $this->input->post('payment_gateway'),
			'payment_message' => $this->input->post('payment_message')
		);

		$payment_id  = $this->CheckoutModel->save_payment_info($payment_info);

		$payment_method = $this->input->post('payment_gateway');
		if($payment_method=='paypal'){
			$order_info = array(
				'user_id' => $user_id,
				'shipping_id' => $shipping_id,
				'payment_id' => $payment_id,
				'order_total' => $this->input->post('order_total')
			);
			$this->CheckoutModel->save_order_info($order_info);
			
			$mdata = array();
			$mdata['full_name'] = $this->session->userdata("user_name");
			$mdata['to'] = $this->session->userdata("user_email");
			$mdata['from'] = "info@jephine.com";
			$mdata['admin_full_name'] = "Jephine Creative Agency";
			$mdata['subject'] = "Order Successfully Complete.";
			$mdata['g_total'] = $this->session->userdata("g_total");
			$this->MailModel->Order_success_mail_send($mdata,'order_successfull');
			$this->cart->destroy();
			redirect('order-success');
		}
	}

	public function order_success()
	{
		$data =array();
		$data['breadcrumb'] = "Order Success";
		$data['title'] = "Order Success | Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/order_success',$data);
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
	
}
