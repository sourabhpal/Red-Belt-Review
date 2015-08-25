<html>
<head>
  <meta charset="UTF-8">
  <title>Add a New Book</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
  <script type="text/javascript"></script>
  <style>
	.form {
		width: 600px;
	}
	h3 {
		text-align: center;
	}
	p {
		display: inline-block;
	}
  </style>
</head>
<body>
	<div class="main-container">
		<nav class="navbar navbar-default navbar-fixed-top">
		   <div class="container">
		     <div class="navbar-header">
		       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		       </button>
		       <span class="navbar-brand"><span class='glyphicon glyphicon-user'></span><?php echo " ". $this->session->userdata('name'); ?></span>
		     </div>
		     <div id="navbar" class="navbar-collapse collapse">
		      <ul class="nav navbar-nav navbar-right">
		        <?php 
		          if($this->session->userdata('LoggedIn')){
		            echo "<li><a href='/books'><span class='glyphicon glyphicon-home'></span> Home</a></li>";
		            echo "<li><a href='/users/logoff'>Logoff <span class='glyphicon glyphicon-log-out'></span></a></li>";
		          }
		         ?>
		     </ul>
		   </div><!--/.nav-collapse -->
		 </div><!--/.container -->
	 	</nav>
		<div class="container" id="below">
			<div class="row">
		      <?php 
		      if ($this->session->userdata('success'))
		      {
		        ?>
		        <div class="alert alert-success">
		          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		          <strong>Nice!</strong>
		          <?php 
		          foreach($this->session->userdata('success') as $s){
		            echo $s;
		          }
		          ?>
		        </div>
		        <?php
		        $this->session->unset_userdata('success');
		      }
		      if ($this->session->userdata('errors'))
		      {
		        ?>
		        <div class="alert alert-danger">
		          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		          <strong>Error!</strong>
		          <?php 
		          foreach($this->session->userdata('errors') as $error){
		            echo $error;
		          }
		          ?>
		        </div>
		        <?php
		        $this->session->unset_userdata('errors');
		      }
		      ?>
      		</div>
      		<div class="row">
      			<div class="container form">
      				<h3>Add a New Book and Review!</h3>
      			<form class='form-horizontal' role='form' action='/books/new_action' method='post'>
		          <div class="form-group">
		            <label>Book Title: </label>
		            <input type="text" class="form-control" name="name" required>
		          </div>
		          <div class="form-group">
		            <label>Author: </label>
		            <select class="form-control" name="author">
		            	<option disable selected>Please select an author</option>
		            	<?php
		            		foreach ($authors as $author)
		            		{
		            			echo "<option value='{$author['name']}'>{$author['name']}</option>";
		            		}
		            	?>
		            </select>
		            <label>Or Add a new Author: </label>
		            <input type="text" class="form-control" name="name" required>
		          </div>
		          <div class="form-group">
		            <label>Review: </label>
		            <input type="text" class="form-control" name="review" required>
		          </div>
		          <div class="form-group">
		            <label>Rating: </label>
		            <select name="rating">
		            	<option value="1">1</option>
		            	<option value="2">2</option>
		            	<option value="3">3</option>
		            	<option value="4">4</option>
		            	<option value="5">5</option>
		            </select>
		            <p>stars</p>
		          </div>
		          <div class="form-group">
		            <button type="submit" class="btn btn-lg btn-primary pull-right">Add Book and Review</button>
		          </div>
		        </form>
		        </div>
      		</div>
		</div>
	</div>
</body>
</html>