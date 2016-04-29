<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Friend');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$result=$this->Friend->get_friends();
			$results=$this->Friend->get_non_friends();
			$this->load->view('home',array('friends'=>$result,'other_users'=>$results));
		}
		else
		{
			redirect('/');
			die();
		}
	}
	public function view($id)
	{
		$result=$this->Friend->profile($id);
		$this->load->view('profile',array('profile'=>$result));
	}
	public function add($id)
	{
		$this->Friend->add_friend($id);
		redirect('/Friends');
	}
	public function remove($id)
	{
		$this->Friend->remove_friend($id);
		redirect('/Friends');
	}
}