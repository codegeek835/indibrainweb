<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("HomeModel");
		$this->load->model("ProductModel");
		$this->load->library('pagination');
		$this->load->helper('buisness');
	}

	public function index()
	{
		$data =array();
		$data['title'] = "Home | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['slider'] = $this->load->view('front/slider','',true);
		//$data['popup'] = $this->load->view('front/popup','',true);
		$data['recommended'] = $this->ProductModel->get_all_product_limit();
		$data['features'] = $this->ProductModel->get_all_product_limit();
		$this->load->view('front/index',$data);
	}
 
	
	public function productpage()
	{
		$data =array();
		$data['breadcrumb'] = "Product List";
		$data['title'] = "Product | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['slider'] = $this->load->view('front/advertise_top','',true);

		// Start pagination
		$config['base_url'] = base_url().'/Home/productpage/';
		$config['total_rows'] = $this->db->count_all("products");
		$config['per_page'] = 6;
		$config["full_tag_open"] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '<i class="linearicons-arrow-right"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '<i class="linearicons-arrow-left"></i>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['products'] = $this->load->HomeModel->get_all_product_pagination($config['per_page'],$this->uri->segment(3));

		// End pagination
		//$data['post_by_brand_id'] = $this->load->ProductModel->get_all_product();
		$this->load->view('front/product_list',$data);
	}

	public function product_details($product_id)
	{
		$data =array();
		$data['breadcrumb'] = "Product Details";
		$data['title'] = "Product | Ramsons Ayurveda";
		$data['description'] ="Welcome to Ramsons Ayurveda";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['product_info'] = $this->HomeModel->get_product_by_id($product_id);
	
		$this->load->view('front/product_details',$data);
	}
	
	
	
	public function product($category)
	{
		
		echo $category.','.$_GET['subcat'];
	}
	
	public function show_post_by_brand_id($brand_id)
	{
		$data =array();
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->post_brand_by_id($brand_id);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}
	
	public function show_post_by_sub_cat_id($sub_cat_id)
	{
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->post_sub_cat_by_id($sub_cat_id);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}
	
	public function _404_page()
	{
		$this->load->view('front/404');
	}

	public function show_product_by_price_range()
	{
		$data = array();
		$min_range = $this->input->post('amount1');
		$max_range = $this->input->post('amount2');
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->show_product_price_range($min_range,$max_range);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}

	public function contact_page()
	{
		$data =array();
		$data['slider'] = "";
		$data['recommended'] = "";
		$data['main_content'] = $this->load->view('front/contact_page','',true);
		$data['category_brand'] = "";
		$this->load->view('front/index',$data);
	}

	public function insert_contact_info()
	{
		$this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
		if($this->form_validation->run())
		{
			$this->ContactModel->insert_contact_data();
			$this->session->set_flashdata("flash_msg","<h3 class='alert alert-success text-center'>Message Send Successfully.</h3>");
      redirect('contact');
    }else{
      $this->contact_page();
    }
	}

}
