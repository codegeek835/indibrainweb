<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Product extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('jephine');
		$data = array();
		$this->load->model("PartnerModel");
		$this->load->model("ProductModel");
	}
	public function addProduct()
	{
	  $data =array();
		$data['title'] = "Add Product |  Crossover Bollywood Se";
		$data['description'] ="Welcome to Crossover Bollywood Se";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$this->load->view('back/add_product',$data);
	}
	
	public function showProduct()
	{
	  $data =array();
		$data['title'] = "Product List |  Crossover Bollywood Se";
		$data['description'] ="Welcome to Crossover Bollywood Se";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_product'] = $this->ProductModel->get_all_product();
		$this->load->view('back/product_list',$data);
	}
	
	public function insert_product()
	{
		$product_image = $this->upload_product_image();
		if($product_image == ''){
			$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
			redirect("Product/addProduct");
		}else{
    		$image = $this->ProductModel->add_product_model($product_image);
    	  $this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
    		redirect('product-list');
		}
	}
	
	public function editProduct($product_id)
	{
	  $data =array();
		$data['title'] = "Edt Product |  Crossover Bollywood Se";
		$data['description'] ="Welcome to Crossover Bollywood Se";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$this->load->view('back/edit_product',$data);	
	}
	    
	public function update_product()
	{
		if($_FILES['pro_image']['name'] == '' || $_FILES['pro_image']['size'] == ''){
		  $product_id = $this->input->post('pro_id',true);
			$product_image= $this->input->post('old_pro_image',true);
			$this->ProductModel->update_product_model($product_image);
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			redirect('edit-product/'.$product_id);
		}else{
			$product_id = $this->input->post('pro_id',true);
			$product_image = $this->upload_product_image();
			if($product_image==NULL){
				$this->session->set_flashdata("update_pro_msg","Upload image error");
				redirect('edit-product/'.$product_id);
			}else{
				$this->ProductModel->update_product_model($product_image);
				$file_dir = 'uploads/'.$this->input->post('old_pro_image',true); 
        unlink($file_dir);
				$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
				redirect('edit-product/'.$product_id);
			}
		}
	}
	
	public function delete_product($product_id)
	{
		$this->ProductModel->delete_product_model($product_id);
		$this->session->set_flashdata('product_delete','Product Deleted Successfully');
		redirect('product-list');
	}
	
	private function upload_product_image()
	{
		$new_name = "product_".time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'png|gif|jpg|jpeg';
		$config['max_size']             = 1000; //kb

    $this->load->library('upload', $config);
    if($this->upload->do_upload('pro_image'))
    {
    	$data = $this->upload->data();
    	return $data['file_name'];
    }
  }

	public function showMyProduct()
	{
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));
    
	  $data =array();
		$data['title'] = "Product List |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['product_select'] = $this->ProductModel->get_my_product_sel($user_id);
		$data['product_review'] = $this->ProductModel->get_my_product_rev($user_id);
		$data['product_reject'] = $this->ProductModel->get_my_product_rej($user_id);
		$data['info'] = $partnerInfo;
		$this->load->view('partner/my_upload',$data);
	}

	public function addMyProduct()
	{
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));

	  $data =array();
		$data['title'] = "Add Product |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['info'] = $partnerInfo;
		$this->load->view('partner/add_product',$data);
	}
	
	public function uploadMyProductImage()
	{
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));

	  $data =array();
		$data['title'] = "Upload Product Image |  Jephine Creative Agency";
		$data['description'] ="Welcome to Jephine Creative Agency";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['info'] = $partnerInfo;
		$this->load->view('partner/upload_product',$data);
	}
	
	public function insert_my_product()
	{
		$product_image = $this->upload_my_product_image();
		
		if($product_image == ''){
			$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
			redirect("Product/addMyProduct");
		}else{
        $image = $this->ProductModel->add_my_product_model($product_image);
        $this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
        redirect('my-upload');
		}
	}
	
	public function insert_my_upload()
	{
	    $user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));
		$images = $this->upload_my_product_image();
		
		if($images == ''){
			$this->session->set_flashdata("flsh_msg","<font class='success'>image uploading error</font>");
			redirect("Product/addMyProduct");
		}else{
		    $product_image =  explode(",",$images);
            $all_tag =  getImageRecognition($product_image[1]);
            $data =array();
    		$data['title'] = "Add Product |  Jephine Creative Agency";
    		$data['description'] ="Welcome to Jephine Creative Agency";
    		$data['keywords'] = str_replace(" ", ",", $data['title']);
    		$data['all_cat'] = $this->ProductModel->get_all_category();
    		$data['info'] = $partnerInfo;
    		$data['images'] = $all_tag;
    		$data['image_name'] = $product_image[0];
    		$this->load->view('partner/add_product',$data);
		}
	}

	public function editMyProduct($product_id)
	{
		$user_id = $this->session->userdata('ptnr_id');
		$partnerInfo = $this->PartnerModel->getPartnerInFo($this->session->userdata('ptnr_id'));

	  $data =array();
		$data['title'] = "Edt Product |  Crossover Bollywood Se";
		$data['description'] ="Welcome to Crossover Bollywood Se";
		$data['keywords'] = str_replace(" ", ",", $data['title']);
		$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['info'] = $partnerInfo;
		$this->load->view('partner/edit_product',$data);	
	}
	    
	public function update_my_product()
	{
		if($_FILES['pro_image']['name'] == '' || $_FILES['pro_image']['size'] == ''){
		  $product_id = $this->input->post('pro_id',true);
			$product_image= $this->input->post('old_pro_image',true);
			$this->ProductModel->update_product_model($product_image);
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			redirect('edit-my-product/'.$product_id);
		}else{
			$product_id = $this->input->post('pro_id',true);
			$product_image = $this->upload_my_product_image();
			if($product_image==NULL){
				$this->session->set_flashdata("update_pro_msg","Upload image error");
				redirect('edit-my-product/'.$product_id);
			}else{
				$this->ProductModel->update_product_model($product_image);
				$file_dir = 'uploads/'.$this->input->post('old_pro_image',true); 
        unlink($file_dir);
				$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
				redirect('edit-my-product/'.$product_id);
			}
		}
	}

	public function delete_my_product($product_id)
	{
		$this->ProductModel->delete_product_model($product_id);
		$this->session->set_flashdata('product_delete','Product Deleted Successfully');
		redirect('my-upload');
	}

    private function upload_my_product_image()
	{
		$new_name = "product_".time();
		$config['file_name'] = $new_name;
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'png|gif|jpg|jpeg';
		$config['max_size']             = 1000; //kb

    $this->load->library('upload', $config);

    if($this->upload->do_upload('pro_image'))
    {
    	$data = $this->upload->data();
    	$img_path = base_url('uploads/').$data['file_name'];
    	
        if($data['file_name']){
            $ret_img = $data['file_name'].','.$img_path;
        }else{
          $ret_img = '';  
        }
    	return $ret_img;
    }
  }
}

?>