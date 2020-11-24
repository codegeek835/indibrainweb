<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model {
	public function get_all_order(){
		$data = $this->db->select('*')
						->from('order')
						->join('users', 'users.user_id = order.user_id')
						->join('payment', 'payment.payment_id = order.payment_id')
						->get()
						->result();
						return $data;
	}
	public function get_order_info_by_id($order_id){
		$data = $this->db->select('*')
						->from('order')
						->where('order_id',$order_id)
					//	->order_by('order_id','desc')
						->get()
						->row();
						return $data;
	}
	public function get_customer_info_by_id($customer_id){
		$data = $this->db->select('*')
						->from('customer')
						->where('cus_id',$customer_id)
						->get()
						->row();
						return $data;
	}
	public function get_shipping_info_by_id($shipping_id){
		$data = $this->db->select('*')
						->from('shipping')
						->where('shipping_id',$shipping_id)
						->get()
						->row();
						return $data;
	}
	public function get_all_order_details_by_id($order_id){
		$data = $this->db->select('*')
						->from('order_details')
						->where('order_id',$order_id)
						->get()
						->result();
						return $data;
	}
	public function delete_order_info_by_id($order_id,$shipping_id,$payment_id){
		$this->db->where('order_id',$order_id);
		$this->db->delete('order');
		$this->db->where('order_id',$order_id);
		$this->db->delete('order_details');
		$this->db->where('shipping_id',$shipping_id);
		$this->db->delete('shipping');
		$this->db->where('payment_id',$payment_id);
		$this->db->delete('payment');
	}
}