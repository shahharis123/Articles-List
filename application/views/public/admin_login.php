<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles List</title>
    <link rel="stylesheet" href="http://localhost:8080/CI/assets/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Articles</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <?php echo anchor('user/index', 'Home', array('class' => 'nav-link btn btn-primary btn-md')); ?>
        <!-- <a class="nav-link btn btn-secondary" href="#">Sign In <span class="sr-only">(current)</span></a> -->
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0"> -->
    <?php echo form_error('query'); ?>
    <?php echo form_open('user/search', array('class' => 'form-inline my-2 my-lg-0')); ?>
      <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <?php echo form_close(); ?>  
    <!-- </form> -->
  </div>
</nav>
<div class="container">
<!-- <form action="http://localhost:8080/CI/index.php/login/admin_login" method="post"> -->
<?php echo form_open('login/admin_login'); ?>
<legend>Admin Login</legend>
<?php if($error = $this->session->flashdata('Login_failed')): ?>
<div class="row">
  <div class="col-lg-4">
  <div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
  </div>
</div>
<?php endif; ?>
  <div class="row col-lg-6">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <?php echo form_input(array("type"=>"text", "name"=>"username", "class"=>"form-control", "id"=>"exampleInputEmail", "aria-describedby"=>"emailHelp", "placeholder"=>"Username", "value"=>set_value('username'))); ?>
    <!--<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">-->
  </div>
  </div>
  <div class="row col-lg-6">
  <?php echo form_error('username'); ?>
  </div>
  <div class="row col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <?php echo form_input(array("type"=>"password", "name"=>"password", "class"=>"form-control", "id"=>"exampleInputPassword1", "placeholder"=>"Password")); ?>
    <!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
  </div>
  </div>
  <div class="row col-lg-6">
  <?php echo form_error('password'); ?>
  </div>
  <div>
  <?php echo form_reset(array("name"=>"reset", "value"=>"Reset", "class"=>"btn btn-default")); ?>
  <!--<button type="reset" class="btn btn-default">Cancel</button>-->
  <?php echo form_submit(array("name"=>"submit", "value"=>"Log In", "class"=>"btn btn-primary")); ?>
  <!--<button type="submit" class="btn btn-primary">Submit</button>-->
  </div>
  <?php echo form_close(); ?>
<!-- </form> -->
</div>
<?php include('public_footer.php'); ?>