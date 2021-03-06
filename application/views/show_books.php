<html>
<head>
  <meta charset="UTF-8">
  <title>Books and Reviews</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  </style>
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
  <script type="text/javascript">
  </script>
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
		            echo "<li><a href='/books/add_book'><span class='glyphicon glyphicon-plus'></span> Add Book and Review</a></li>";
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
      			<div class="col-md-6">
      				<h2><em><u>Recent Book Reviews</u></em></h2>
      			<?php
      			// var_dump($top_books);
      				foreach ($top_books as $top_book)
      				{
      					
      					echo "<h3>Title: <a href='/books/show/{$top_book['id']}'>". $top_book['title'] ."</a><br></h3>";
      					echo "<h4>Author: ". $top_book['name'] ."<br></h4>";
      					for ($i = 0; $i < $top_book['rating']; $i++)
      					{
      						echo "<img src='/assets/star.png' height='25' width='25'>";
      					}
      					$star = 5 - $top_book['rating'];
      					for ($i = 0; $i < $star; $i++)
      					{
      						echo "<img src='/assets/blank.png' height='25' width='25'>";
      					}
      					echo "<br><h5>Review: ". $top_book['review'] ."<br></h5>";
      					echo "<h6>Posted on: ". $top_book['created_at'] ."<br></h6>";
      					echo "<br>";
      				}
      			?>
      			</div>
      			<div class="col-md-6" id="scroll">
      				<h2><em><u>Other Books With Reviews</u></em></h2>
      				<?php
  					foreach ($remaining_books as $remaining_book)
  					{
  						echo "<a href='/books/show/{$remaining_book['id']}'><h4>". $remaining_book['title'] ."<br></h4></a>";
  						echo "<br>";
  					}
      				?>
      			</div>
      		</div>
		</div>
	</div>
</body>
</html>