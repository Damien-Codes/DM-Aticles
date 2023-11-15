<?php

  session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="http://127.0.0.1/clean-blog/admin-panel/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../comments-admins/style/style.css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#"><img src="http://127.0.0.1/clean-blog/assets/img/logo.png" alt="DM-Articles" width="125px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

<?php if(isset($_SESSION['adminname'])) : ?>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link text-white" style="margin-left: 20px;" href="http://127.0.0.1/clean-blog/admin-panel/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1/clean-blog/admin-panel/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1/clean-blog/admin-panel/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1/clean-blog/admin-panel/posts-admins/show-posts.php" style="margin-left: 20px;">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1/clean-blog/admin-panel/comments-admins/show-comments.php" style="margin-left: 20px;">Comments</a>
          </li>

<?php endif; ?>
          
          
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">

          <?php if(isset($_SESSION['adminname'])) : ?>




          <li class="nav-item dropdown">
            
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['adminname']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="http://127.0.0.1/clean-blog/admin-panel/admins/logout.php">Logout</a>
            </div>
          </div>
          </li>




          

            <?php else : ?>

          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php">login
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
          <?php endif; ?>
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container">