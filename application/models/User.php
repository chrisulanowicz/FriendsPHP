<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function validate($user_details)
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('alias','Alias','trim|required|is_unique[users.alias]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|min_length[8]|matches[confirm_pw]|trim');
		$this->form_validation->set_rules('confirm_pw','Confirm Password','trim');
		$this->form_validation->set_rules('birthday','Date of Birth','required');
		if(!$this->form_validation->run())
		{
			return validation_errors();
		}
		else
		{
			$date_of_birth=new DateTime($user_details['birthday']);
			if($date_of_birth>new DateTime(date('Y-m-d')))
			{
				return "You can't be here if you weren't born yet!";
			}
			else
			{
				return "valid";
			}
		}
	}

	public function create_user($user_details)
	{
		$query="INSERT INTO users(name,alias,email,password,birthday,created_at,updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
		$values=array($user_details['name'],$user_details['alias'],$user_details['email'],password_hash($user_details['password'],PASSWORD_DEFAULT),$user_details['birthday']);
		$this->db->query($query,$values);
	}
	public function validate_login($user_details)
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password1','Password','trim|required');
		if(!$this->form_validation->run())
		{
			return validation_errors();
		}
		
		else 
		{
			$this->form_validation->set_rules('email','Email','is_unique[users.email]');
			if($this->form_validation->run())
			{
				return "Email or Password is incorrect";
			}
			else
			{
				$email=$user_details['email'];
				$query="SELECT users.password FROM users WHERE email = ?";
				$result=$this->db->query($query,$email)->row_array();
				if(password_verify($user_details['password1'],$result['password']))
				{
					return "valid";
				}
				else 
				{
					return "Email or Password is incorrect";
				}
			}
		}
	}
	public function login($email)
	{
		$query="SELECT users.id,users.alias FROM users WHERE email = ?";
		return $this->db->query($query,$email)->row_array();
	}
}
