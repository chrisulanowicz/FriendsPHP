<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function get_non_friends()
	{
		$query="SELECT users.id AS non_id,users.alias FROM users WHERE users.id <> ? AND users.id NOT IN (SELECT user2.id AS friend_id FROM users LEFT JOIN friendships ON users.id=friendships.user_id LEFT JOIN users AS user2 ON friendships.friend_id=user2.id WHERE friendships.user_id=?);";
		$values=array($this->session->userdata['user_id'],$this->session->userdata['user_id']);
		return $this->db->query($query,$values)->result_array();
	}
	public function profile($id)
	{
		$query="SELECT users.name,users.alias,users.email,DATE_FORMAT(users.birthday,'%M %d, %Y') AS birthday FROM users WHERE users.id = ?";
		return $this->db->query($query,$id)->row_array();
	}
	public function add_friend($id)
	{
		$query="INSERT INTO friendships(user_id,friend_id) VALUES (?,?)";
		$values=array($this->session->userdata('user_id'),$id);
		$this->db->query($query,$values);
		$query="INSERT INTO friendships(user_id,friend_id) VALUES (?,?)";
		$values=array($id,$this->session->userdata('user_id'));
		$this->db->query($query,$values);
	}
	public function get_friends()
	{
		$query="SELECT user2.alias,user2.id AS friend_id FROM users LEFT JOIN friendships ON users.id=friendships.user_id LEFT JOIN users AS user2 ON friendships.friend_id=user2.id WHERE friendships.user_id=?";
		$values=array($this->session->userdata('user_id'));
		return $this->db->query($query,$values)->result_array();
	}
	public function remove_friend($id)
	{
		$query="DELETE FROM friendships WHERE friendships.user_id = ? AND friendships.friend_id = ?";
		$values=array($this->session->userdata('user_id'),$id);
		$this->db->query($query,$values);
		$query="DELETE FROM friendships WHERE friendships.user_id = ? AND friendships.friend_id = ?";
		$values=array($id,$this->session->userdata('user_id'));
		$this->db->query($query,$values);
	}
}