<?php 
	class Review extends CI_Model{
		function get_all_books()
		{
		 return $this->db->query("SELECT * FROM books")->result_array();
		}

		function get_first_three()
		{
			return $this->db->query("SELECT * FROM reviews JOIN books ON books.id = reviews.book_id JOIN authors ON books.author_id = authors.id ORDER BY reviews.created_at DESC LIMIT 3")->result_array();
		}

		function add_book($wall_id, $post)
		{
		 $query = "INSERT INTO books (user_id, book, wall_id, created_at) VALUES (?,?,?,NOW())";
		 $values = array($this->session->userdata['current_user_id'], $book['book'], $wall_id); 
		 return $this->db->query($query, $values);
		}
		 
		function delete_book_by_id($book_id)
		{
			return $this->db->query("DELETE FROM books WHERE id = ?", $book_id);	
		}

	}
 ?>