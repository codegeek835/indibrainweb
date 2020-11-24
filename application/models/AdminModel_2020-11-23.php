<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model 
{

	public function adminRgisterModel()
	{
		$data['username'] = $this->input->post('username',true);
		$data['user_email'] = $this->input->post('user_email',true);
		$data['user_password'] = password_hash($this->input->post('user_password',true),PASSWORD_DEFAULT);
		$data['user_role'] = $this->input->post('user_role',true);
		$data['user_status'] = '1';
		$this->db->insert('users',$data);
	}

	public function get_recent_product()
	{
		$this->db->order_by('pro_id', 'DESC');
		$this->db->limit(6);
		$result = $this->db->get('products');

    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }
	}

	public function get_all_partner()
	{
		$this->db->where('user_role', '2');
		$result = $this->db->get('users');
    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }
	}

	public function add_partner($data)
	{
		$this->db->insert('users',$data);
		return true;
	}

	public function update_partner($partner_id,$data)
	{
		$this->db->where('user_id', $partner_id);
		$this->db->update('users', $data);
		return true;
	}

	public function delete_partner($partner_id)
	{
		$this->db->where('user_id', $partner_id);
		$this->db->delete('users');
		return true;
	}
	
	public function update_status($user_id,$data)
	{
	    $this->db->where('user_id', $user_id);
		$this->db->update('users', $data);
	}

	public function get_all_user()
	{
		$this->db->where('user_role', '3');
		$result = $this->db->get('users');
    if ($this->db->affected_rows() > 0) {
      return $result->result();
    }else{
      return false;
    }
	}

	public function add_user($data)
	{
		$this->db->insert('users',$data);
		return true;
	}

	public function update_user($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data);
		return true;
	}

	public function delete_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('users');
		return true;
	}

}