<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <div class="main-container">
    <div class="row">
      <div class="col-md-12">
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
    </div>
    <div class="container">
      <h1>Welcome!</h1>
      <h3>Register!</h3>
      <div class="col-md-5">
        <form class='form-horizontal' role='form' action='/main/register_action' method='post'>
          
          <div class="form-group">
            <label>Full Name: </label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Alias: </label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">@</span>
              <input type="text" class="form-control" name="alias" placeholder="Username" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="form-group">
            <label>Email Address: </label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" placeholder="must be at least 8 characters" required>
          </div>
          <div class="form-group">
            <label>Password Confirmation: </label>
            <input type="password" class="form-control" name="passwordconf" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Register</button>
          </div>
        </form>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-5" id="right">
        <h3>Login!</h3>
        <form class="form-vertical" role='form' action='/main/signin_action' method='post'>
          <div class="form-group">
            <label>Email Address: </label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
          </div>
        </form>
      </div>
    </div> <!-- /container -->
  </div>
</body>
</html>