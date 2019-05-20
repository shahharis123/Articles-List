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
      <?php echo anchor('login/index', 'Log In', array('class' => 'nav-link btn btn-primary btn-md')); ?>
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
