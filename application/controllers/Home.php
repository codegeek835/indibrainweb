<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("HomeModel");
		$this->load->model("ProductModel");
		$this->load->library('pagination');
		$this->load->helper('jephine');
	}

	public function index()
	{
		$data = array();
		$data['title'] = "Home |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['most_categorys'] = $this->HomeModel->getMostCategory();
		$data['most_slider'] = $this->HomeModel->getMostPhoto();
		$data['prints'] = $this->HomeModel->getPrints();
		$this->load->view('front/index', $data);
	}

	public function myAccount($id)
	{
		$user_id = getDecrypt($id);
		$data = array();
		$data['title'] = "My Account |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['user'] = $this->HomeModel->getUserInFo($user_id);
		$data['orders'] = $this->HomeModel->getAllOrder($user_id);
		$data['payments'] = $this->HomeModel->getAllOrder($user_id);
		$this->load->view('front/account', $data);
	}

	public function view_order($order_id)
	{
		$data = array();
		$data['title'] = "View Order |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);

		$order_info = $this->HomeModel->get_order_info_by_id(getDecrypt($order_id));
		$data['order_info'] = $order_info;
		$shipping_id = $order_info->shipping_id;
		$data['ship_info'] = $this->HomeModel->get_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->HomeModel->get_all_order_details_by_id(getDecrypt($order_id));
		$this->load->view('front/order_details', $data);
	}

	public function delete_order($order_id)
	{
		$order_info = $this->HomeModel->get_order_info_by_id(getDecrypt($order_id));

		$order_id = $order_info->order_id;
		$shipping_id = $order_info->shipping_id;
		$payment_id = $order_info->payment_id;
		$user_id = getEncrypt($order_info->user_id);
		$this->HomeModel->delete_order_info_by_id($order_id, $shipping_id, $payment_id);
		$this->session->set_flashdata("flsh_msg", "<font class='success'>Order Deleted Successfully</font>");
		redirect('my-account/' . $user_id);
	}

	public function profileSetting()
	{
		$user_id = $this->input->post('user_id', true);
		if ($_FILES['profile_image']['name'] == '' || $_FILES['profile_image']['size'] == '') {
			$profile_image  = $this->input->post('old_image', true);
			$data = array(
				'username' => $this->input->post('username', true),
				'user_email' => $this->input->post('user_email', true),
				'user_phone' => $this->input->post('user_phone', true),
				'address' => $this->input->post('address', true),
				'country' => $this->input->post('country', true),
				'state' => $this->input->post('state', true),
				'city' => $this->input->post('city', true),
				'pincode' => $this->input->post('pincode', true),
				'image' => $profile_image
			);
			$this->HomeModel->update_user($user_id, $data);
			$this->session->set_flashdata("flash_msg", "<font class='success'>User Update Successfully</font>");
			$url = 'my-account/' . getEncrypt($user_id);
			redirect($url);
		} else {
			$profile_image = $this->upload_user_image();
			$data = array(
				'username' => $this->input->post('username', true),
				'user_email' => $this->input->post('user_email', true),
				'user_phone' => $this->input->post('user_phone', true),
				'address' => $this->input->post('address', true),
				'country' => $this->input->post('country', true),
				'state' => $this->input->post('state', true),
				'city' => $this->input->post('city', true),
				'pincode' => $this->input->post('pincode', true),
				'image' => $profile_image
			);
			$this->HomeModel->update_user($user_id, $data);
			$this->session->set_flashdata("flash_msg", "<font class='success'>User Update Successfully</font>");
			$url = 'my-account/' . getEncrypt($user_id);
			redirect($url);
		}
	}

	public function changePassword()
	{
		$user_id = $this->input->post('user_id', true);
		$userInfo = $this->HomeModel->getUserInFo($user_id);
		$current_password = $this->input->post('current_password', true);
		$new_password = $this->input->post('new_password', true);
		if (password_verify($current_password, $userInfo->user_password)) {
			$data = array('user_password' => password_hash($new_password, PASSWORD_DEFAULT));
			$this->HomeModel->change_password($user_id, $data);
			$this->session->set_flashdata("flash_msg", "<font class='success'>Change Password Successfully</font>");
			$url = 'my-account/' . getEncrypt($user_id);
			redirect($url);
		} else {
			$this->session->set_flashdata("flash_msg", "<font class='success'>Sorry Not Password Change</font>");
			$url = 'my-account/' . getEncrypt($user_id);
			redirect($url);
		}
	}

	public function login()
	{
		$data = array();
		$data['title'] = "Login |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/login', $data);
	}

	public function admin_login()
	{
		if (isset($this->session->userid)) {
			redirect('/dashboard');
		} else {
			$this->load->view('login');
		}
	}

	public function checklogin()
	{
		$data = array();
		$useremail = $this->input->post('user_email', TRUE);
		$userpassword = $this->input->post('user_password', TRUE);

		$user_details = $this->HomeModel->checkuserlogin($useremail);
		if (password_verify($userpassword, $user_details->user_password)) {
			if ($user_details->user_status == 1) {
				if ($user_details->user_role == 1) {
					$session_data['userid'] 	= $user_details->user_id;
					$session_data['username']	= $user_details->username;
					$session_data['useremail']	= $user_details->user_email;
					$session_data['userrole'] 	= $user_details->user_role;
					$session_data['userstatus']	= $user_details->user_status;
					$this->session->set_userdata($session_data);
					redirect("dashboard");
				} else {
					$data['error_message'] = "U Are Not An Admin User...!";
					$this->load->view('login', $data);
				}
			} else {
				$data['error_message'] = "U Are Not An Active User...!";
				$this->load->view('login', $data);
			}
		} else {
			redirect('Home/login_error');
		}
	}

	public function login_error()
	{
		$data['error_message'] = "Incorrect Username Or Password...!";
		$this->load->view('login', $data);
	}

	public function postLogin()
	{
		$email = $this->input->post('email', true);
		$pass = $this->input->post('password', true);

		$details = $this->HomeModel->userLoginByEmail($email);

		if (password_verify($pass, $details->user_password)) {
			if ($details->user_status == 1) {
				$sdata['user_id'] = $details->user_id;
				$sdata['user_name'] = $details->username;
				$sdata['user_email'] = $details->user_email;
				$this->session->set_userdata($sdata);
				$url = 'my-account/' . getEncrypt($details->user_id);
				// remember me
				if (!empty($this->input->post("remember"))) {
					setcookie("userLoginId", $email, time() + (10 * 365 * 24 * 60 * 60));
					setcookie("userLoginPass", $pass,  time() + (10 * 365 * 24 * 60 * 60));
				} else {
					setcookie("userLoginId", "");
					setcookie("userLoginPass", "");
				}

				redirect($url);
			} else {
				$this->session->set_flashdata('flash_msg', 'U Are Not An Active User...!');
				redirect("Home/login");
			}
		} else {
			$this->session->set_flashdata('flash_msg', 'Incorrect Email Or Password...!');
			redirect("Home/login");
		}
	}

	public function register()
	{
		$data = array();
		$data['title'] = "Registration |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/register', $data);
	}

	public function saveRegister()
	{
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_email]');
		$this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		$this->form_validation->set_rules('con_pass', 'Password Confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('name', true),
				'user_email' => $this->input->post('email', true),
				'user_phone' => $this->input->post('phone', true),
				'user_password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'user_role' => '3',
				'user_status' => '1'
			);
			if ($this->HomeModel->saveRegister($data)) {
				// start registration Successfull mail 
				$mdata = array();
				$mdata['name'] =  $this->input->post('name', true);
				$mdata['from'] = "admin@jephine.com";
				$mdata['admin_full_name'] = "Jephine Creative Agency";
				$mdata['to'] = $this->input->post('email');
				$mdata['subject'] = "Registration Successfull.";
				$mdata['password'] = $this->input->post('password');
				$this->HomeModel->mail_send($mdata, 'registration_successfull');
				$this->session->set_flashdata('flash_msg_suu', 'Registration Successfully ! Check your email and view login Details.');
				redirect("Home/login");
			} else {
				$this->session->set_flashdata('flash_msg', 'Registration error !');
				$this->register();
			}
		} else {
			$this->register();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}

	public function getVertical($vertical)
	{
		$data = array();
		$data['title'] = "Photo List |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['vertical'] = $vertical;

		$data['products'] = $this->HomeModel->get_product_by_vertical($vertical);

		$this->load->view('front/vertical', $data);
	}
	public function category($vertical)
	{
		//$cat_id = getDecrypt($category); 
		$data = array();
		$data['title'] = "Photo List |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['vertical'] = $vertical;
		if (isset($_GET['s'])) {
			$title = $_GET['s'];
		} else {
			$title = NULL;
		}

		if (isset($_GET['sby'])) {
			$sby = $_GET['sby'];
		} else {
			$sby = NULL;
		}

		if (isset($_GET['ltyp'])) {
			$ltyp = $_GET['ltyp'];
		} else {
			$ltyp = NULL;
		}

		if (isset($_GET['cby'])) {
			$cby = $_GET['cby'];
		} else {
			$cby = NULL;
		}

		if (isset($_GET['ornt'])) {
			$ornt = $_GET['ornt'];
		} else {
			$ornt = NULL;
		}

		if (isset($_GET['cat'])) {
			$cat = $_GET['cat'];
		} else {
			$cat = NULL;
		}

		if (isset($_GET['people'])) {
			$people = $_GET['people'];
		} else {
			$people = NULL;
		}
		//$data['products'] = $this->HomeModel->get_product_by_category($cat_id);
		$data['products'] = $this->HomeModel->get_product_by_category_with_title($vertical, $title, $cat, $sby, $ltyp, $cby, $ornt, $people);
		$data['most_categorys'] = $this->HomeModel->getMostCategory();
		$this->load->view('front/listing', $data);
	}


	public function getTitle()
	{
		$data = array();
		$data['title'] = "Photo List |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['encuser'] = '';
		if (isset($_GET['s'])) {
			$title = $_GET['s'];
			$data['products'] = $this->HomeModel->get_product_by_title($title);
		}

		$this->load->view('front/listing', $data);
	}

	public function viewDetails($pro_id)
	{
		$product_id = getDecrypt($pro_id);
		$data = array();
		$data['title'] = "Photo Details |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['product'] = $this->HomeModel->get_product_details($product_id);
		$this->load->view('front/view_details', $data);
	}

	public function viewPartnerDetails($pat_id)
	{
		$user_id = getDecrypt($pat_id);

		$all_id = array();
		if (geUserByAllProduct($user_id)) {
			foreach (geUserByAllProduct($user_id) as $value) {
				array_push($all_id, $value['pro_id']);
			}
		}

		$data = array();
		$data['title'] = "Partner Details |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['assets'] = $this->HomeModel->getTotalListCount($user_id);
		if (count($all_id)) {
			$data['download'] = $this->HomeModel->getAllDownload($all_id);
		} else {
			$data['download'] = array();
		}
		$data['portfolios'] = $this->HomeModel->getTotalList($user_id);
		$data['user_name'] = getUserDetails($user_id)->username;
		$this->load->view('front/partner_details', $data);
	}

	public function aboutUs()
	{
		$data = array();
		$data['title'] = "About Us |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/about_us', $data);
	}

	public function show_cart()
	{
		$data = array();
		$data['title'] = "Cart |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/cart', $data);
	}

	public function checkout()
	{
		$data = array();
		$data['title'] = "Checkout |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		echo "string";
		die();
		$this->load->view('front/checkout', $data);
	}

	public function _404_page()
	{
		//$data['main_content'] = $this->load->view('front/404','',true);
		$this->load->view('front/404');
	}

	public function contact_page()
	{
		$data = array();
		$data['slider'] = "";
		$data['recommended'] = "";
		$data['main_content'] = $this->load->view('front/contact_page', '', true);
		$data['category_brand'] = "";
		$this->load->view('front/index', $data);
	}

	public function insert_contact_info()
	{
		$this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
		if ($this->form_validation->run()) {
			$this->ContactModel->insert_contact_data();
			$this->session->set_flashdata("flash_msg", "<h3 class='alert alert-success text-center'>Message Send Successfully.</h3>");
			redirect('contact');
		} else {
			$this->contact_page();
		}
	}

	private function upload_user_image()
	{
		$new_name = "user_" . time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './assets/front/profile/';
		$config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
		$config['max_size']             = 1000; //kb

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('profile_image')) {
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}

	public function getListing1()
	{
		$data = array();
		$data['title'] = "Listing |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/listing1', $data);
	}

	public function getListing2()
	{
		$data = array();
		$data['title'] = "Listing |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/listing2', $data);
	}

	public function saveMe($vals)
	{
		$val = explode("-", $vals);
		$this->HomeModel->saveMe($val[1], $val[0]);
	}

	public function myWishlist($id)
	{
		$user_id = getDecrypt($id);
		$data = array();
		$data['title'] = "My Wishlist |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['wishlists'] = $this->HomeModel->getWishlist($user_id);
		$this->load->view('front/wishlis', $data);
	}

	public function deleteWishlist($id, $user_id)
	{
		$this->HomeModel->deleteWishlist($id);
		$url = 'my-wishlist/' . getEncrypt($user_id);
		redirect($url);
	}

	public function partnerProgram()
	{
		$data = array();
		$data['title'] = "Partner Program |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/partner_program', $data);
	}
	public function demo1()
	{
		$data = array();
		$data['title'] = "Demo |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/demo1', $data);
	}

	public function demo2()
	{
		$data = array();
		$data['title'] = "Demo |  Jephine Creative Agency";
		$data['description'] = "Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$this->load->view('front/demo2', $data);
	}
}
