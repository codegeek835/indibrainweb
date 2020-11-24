<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutModel extends CI_Model 
{	
	public function save_customer_info()
	{
		$data = array();
		$data['cus_name'] = $this->input->post('cus_name');
		$data['cus_email'] = $this->input->post('cus_email');
		$data['cus_password'] = md5($this->input->post('cus_password'));
		$this->db->insert("customer",$data);
		$customerid = $this->db->insert_id();
		return $customerid;
	}

	public function select_customer_info_by_id($customer_id)
	{
		$data = $this->db->select('*')
			->from('customer')
			->where("cus_id",$customer_id)
			->get()
			->row();
			return $data;
	}

	public function upateBilling($cus_id,$data)
	{
		$this->db->where("cus_id",$cus_id);
		$this->db->update("customer",$data);
	}

	public function saveShipping($data)
	{
		$this->db->insert("shipping",$data);
		$customer_ship_id = $this->db->insert_id();
		return $customer_ship_id;
	}

	public function get_user_login_by_email($cus_email)
	{
		$data = $this->db->select('*')
			->from('customer')
			->where("cus_email",$cus_email)
			->get()
			->row();
			return $data;
	}

	public function save_payment_info($data)
	{
		$this->db->insert("payment",$data);
		return $this->db->insert_id();
	}

	public function save_order_info($orderdata)
	{
		$this->db->insert("order",$orderdata);
		$order_id = $this->db->insert_id();

		foreach ($this->cart->contents() as $order_product){
			$o_details_data['order_id'] = $order_id;
			$o_details_data['product_id'] = $order_product['id'];
			$o_details_data['product_name'] = $order_product['name'];
			$o_details_data['product_price'] = $order_product['price'];
			$o_details_data['sales_quantity'] = $order_product['qty'];
			$this->db->insert("order_details",$o_details_data);
		}
		$sql = "UPDATE products, order_details
		SET products.pro_quantity = products.pro_quantity - order_details.sales_quantity 
		WHERE products.pro_id = order_details.product_id 
		AND order_details.order_id = '$order_id'";
		$this->db->query($sql);
	}
}