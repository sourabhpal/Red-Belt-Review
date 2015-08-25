<?php 
	class Author extends CI_Model{
		function get_all_authors()
		{
		 return $this->db->query("SELECT * FROM books JOIN authors ON books.author_id = authors.id JOIN reviews ON books.id = reviews.book_id")->result_array();
		}

		function add_author($post)
		{
		 $query = "INSERT INTO authors (name) VALUES (?)";
		 $values = array($post['name']); 
		 return $this->db->query($query, $values);
		}
	}
 ?>