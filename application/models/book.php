<?php 
	class Book extends CI_Model{
		function get_all_books($user_id)
		{
		 return $this->db->query("SELECT * FROM books JOIN users ON books.user_id = users.id 
		 						JOIN reviews on books.id = reviews.book_id
		 						ORDER BY created_at DESC")->result_array();
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