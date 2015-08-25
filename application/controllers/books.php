<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Book');
  }

  public function index()
  {
    
    $this->load->view('show_books');
  }

}