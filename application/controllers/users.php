<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		$this->load->view('welcome');
	}
	
	public function signin_action()
	{
		$user = $this->User->get_user($this->input->post());
		if($user)
		{
			$this->session->set_userdata('LoggedIn', true);
			$this->session->set_userdata('current_user_id', $user['id']);
			$this->session->set_userdata('name', $user['name']);
			$success[] = 'Login successful!';
			$this->session->set_flashdata('success', $success);
			redirect('/books');
		}
		else
		{
			$error[] = 'No matching record found!';
			$this->session->set_flashdata('errors', $error);
			$this->index();
		}
	}

	public function register_action()
	{
		$result = $this->User->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'Registration successful!';
			$this->session->set_flashdata('success', $success);
			$this->User->add_user($this->input->post());
			redirect("/");
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			$this->index();
		}
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

//end of main controller