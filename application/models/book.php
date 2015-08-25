<?php 
	class Book extends CI_Model{
		function get_remaining_books()
		{
		 $top3 = $this->db->query("SELECT books.title FROM books JOIN authors ON books.author_id = authors.id JOIN reviews ON books.id = reviews.book_id ORDER BY reviews.created_at DESC LIMIT 3")->result_array();
		 // var_dump($top3);
		 $query = ("SELECT * FROM books JOIN authors ON books.author_id = authors.id JOIN reviews on books.id = reviews.book_id WHERE books.title NOT IN (?, ?, ?)");
		 return $this->db->query($query, array($top3[0]['title'], $top3[1]['title'], $top3[2]['title']))->result_array();
		}

		function add_book($post)
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