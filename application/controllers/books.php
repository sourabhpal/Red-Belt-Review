<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Book');
    $this->load->model('Review');
    $this->load->model('Author');
  }

  public function index()
  {
    $top_books = $this->Review->get_first_three();
    $remaining_books = $this->Book->get_remaining_books();
    $this->load->view('show_books', array('top_books' => $top_books, 
                                          'remaining_books' => $remaining_books)
                                          );
  }

  public function add_book()
  {
    $authors = array("authors" => $this->Author->get_all_authors());
    $this->load->view('new_book', $authors);
  }

}