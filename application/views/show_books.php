<html>
<head>
  <meta charset="UTF-8">
  <title>Users</title>
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
		            echo "<li><a href='/users/logoff'><span class='glyphicon glyphicon-plus'></span> Add Book and Review</a></li>";
		            echo "<li><a href='/users/logoff'>Logoff <span class='glyphicon glyphicon-log-out'></span></a></li>";
		          }
		         ?>
		     </ul>
		   </div><!--/.nav-collapse -->
		 </div><!--/.container -->
		<div class="container">
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
      			<?php  ?>
      		</div>
		</div>
	</div>
</body>
</html>