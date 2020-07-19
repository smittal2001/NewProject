<!doctype html>
<html lang="en">
  <head>
    <style>
    .upper{
      left: 300px;
      right: 300px;
      padding: 30px 30px 30px 30px;
      height: 250px;
      position: fixed;
      font-size: 25px;
      color: #2196F3;
      background: #eee;

    }
    .sidenav {
    width: 250px;
    height: 600px;
    position: fixed;
    z-index: 1;
    top: 250px;
    left: 170px;
    background: #eee;
    overflow-x: hidden;
    padding: 8px 0;
    border: 1px solid yellow;
  }

  .sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #2196F3;
    display: block;
  }
  .sidenav button {
    text-align: center;
    width: 100px;
  }

  .sidenav a:hover {
    color: #064579;
  }
    .personalInfo {
    width: 300px;
    height: 100px;
    border: 1px solid blue;
  }
  .bio {
    width: 100%;
    height: 60px;
    background: #ffffff;
    padding: 0px 50px 5px 50px;
    font-size: 14px;
  }
  .Profile{
    left: 300px;
    right: 300px;
    top: 250px;
    border: 1px solid green;
    position: fixed;
    z-index: 1;
    height: 600px;
    color: #2196F3;
    background: #eee;
  }
  .personalInfo{
    width: 800px;
    height: 200px;
    border: 1px solid blue;


  }
  #listItem
  {
    height: 80px;
    background: #ffffff;
    padding: 30px 50px 10px 50px;
    font-size: 30px;


  }


     </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>
      Profile Page
    </title>
  </head>
  <body>

    <div class="upper">
  <h1 class="display-4"><?php
  session_start();
  echo "" . $_SESSION['user'] . "'s Profile";
  ?></h1>

<!-- navbar code -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Explore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Trending</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">All Time</a>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Romance</a>
          <a class="dropdown-item" href="#">Mystery</a>
          <a class="dropdown-item" href="#">New Generation</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Favorites</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Something Else</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>

</nav>
<!-- side navbar code -->
<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Post</a>
  <div class = "container">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
      Post
    </button>
  </div>


</div>


<!-- peronal posts-->

  <div class="Profile" >
    <div class="container">
      <div class="container-fluid">
    <div class="row" >
      <div class="col-lg " id ="listItem">Posts: 50</div>
      <div class="col-lg" id ="listItem">Followers: 50</div>
      <div class="col-lg " id ="listItem">Following: 50</div>
    </div>
  </div>
</div>


    <div class="container">
      <div class = "bio">  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </div>
    </div>


  </div>
  </div>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action = "Post.php">
            <div class="form-group">
              <label for="exampleInputPassword1">Post</label>
              <input type="text" class="form-control" name = "userpost" id="exampleInputPassword1" placeholder="Start Typing...">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div

  <?php
  session_start();
    if(isset($_SESSION['Wrong']))
    {
      echo "<div> You entered an incorrect username or password </div>";
        unset($_SESSION['Wrong']);
    }

  ?>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
