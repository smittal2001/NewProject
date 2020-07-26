<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
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
    if (isset($_POST['openUser']))
    {

      $username = $conn->real_escape_string($_POST['username']);
    }
    else{
      echo "" . $_SESSION['user'] . "'s Profile";
    }
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
        <?php

        error_reporting(0);
        $servername = 'localhost';
        $username = 'root';
        $password = 'ankith_sloth';
        $dbname = 'Project1';

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn -> connect_error)
        {
          die("connection failed; ". $conn-> connect_error);
        }
        session_start();
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        echo "<select id='selectddl'>";
        echo "<option>----Search Users--</option>";
        while($row = $result->fetch_assoc())
        {
            echo "<option id = 'search'>".$row['username']."</option>";
        }
        echo "</select>";
        ?>
    </nav>
  </div>
  <?php
      $servername = 'localhost';
      $username = 'root';
      $password = 'ankith_sloth';
      $dbname = 'Project1';

      $conn = new mysqli($servername,$username,$password,$dbname);

      if($conn -> connect_error)
      {
        die("connection failed; ". $conn-> connect_error);
      }
      session_start();

      if(isset($_POST['searchUsers']))
      {
        $search = $_POST["search"];
        $sql = "SELECT * FROM users WHERE username LIKE '%$search%'";
        $result = $conn->query($sql);
        $table = '<div class="list-group">';
        while($row = $result->fetch_assoc())
        {
          $username = $row['username'];
          $table .= '<a data-user-name = '.$username.' onclick = "openUser(this)" class="list-group-item list-group-item-action">'.$row['username'].'</a>';
        }
        $table .= '</div>';
        echo $table;
      }
   ?>
</div>



<!-- side navbar code -->
<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Post</a>
  <div class = "container">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#postModal">
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



  <!-- post preiview -->

  <?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'ankith_sloth';
    $dbname = 'Project1';

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn -> connect_error)
    {
      die("connection failed; ". $conn-> connect_error);
    }
    if (isset($_POST['openUser']))
    {

      $user = $conn->real_escape_string($_POST['username']);
    }
    else{
      $user = $_SESSION['user'];
    }

    $query = "SELECT userposts.username, animeTopic, post, userposts.likes, userposts.postid FROM userposts INNER JOIN users ON users.username = '$user'";
    $result = $conn->query($query) or die($conn->error);



    //<h5 class='card-title'>Card title</h5>

    // start a table tag in the HTML

    while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
      if($row['username'] != $user){
        continue;
      }
      $postID = $row['postid'];
      echo "<div class='card'>
      <div class='card-header' id = 'post' data-post-id = '$postID' onclick = 'openModal(this)'>
        <h5 class='card-title'>" . $row['animeTopic'] . "</h5>
      </div>
      <div class='card-body' data-post-id = '$postID' onclick = 'openModal(this)'>";
      //echo "";
      echo "<h5 class='card-subtitle mb-2 text-muted'>@". $row['username']. "</h5>";
      echo "<p class='card-text'>". $row['post']. "</p>";
    //  echo $postID;
      echo "<a class='card-link'>Comments:100</a>";
      echo "<a class='card-link'>Likes:".$row['likes']."</a>";
      echo //"  <a href='#' class='card-link'>Another link</a>
      "</div>
        </div>";
      }

      $animeTopic = 'naruto';
      $post = 'Believe it!';
      $username = 'NarutoLover123';
      echo "<div id='myModal' class='modal'>";
            echo   "<!-- Modal content -->
                <div class='modal-content'>
                  <span class='close'>&times;</span>
                </div>

              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Post</h5>

              </div>";
        if (isset($_POST['postComments']))
        {
          $postID = $conn->real_escape_string($_POST['postID']);
          $sql = "SELECT userposts.username, animeTopic, post, userposts.likes, userposts.postid FROM userposts INNER JOIN users ON users.username = '$user'";
          $result = $conn->query($sql);
          if ($result->num_rows === 0)
              exit('no posts');
          else
            {
              while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
                if($row['postid'] === $postID){


                  $animeTopic = $row['animeTopic'];
                  $post = $row['post'];
                  $username = $row['username'];
                  $likes = $row['likes'];
                  //echo $row['animeTopic'];
                  // echo $postID;
                  echo "
                    <div class='modal-body'>
                        <div class='card' style='width: 18rem;'>
                        <div class='card-header' id = 'post' data-post-id = '$postID' onclick = 'openModal(this)'>
                          <h5 class='card-title'>". $animeTopic ."</h5>
                        </div>
                        <div class='card-body' data-post-id = '$postID' onclick = 'openModal(this)'>

                         <h5 class='card-subtitle mb-2 text-muted'>@ ".$username."</h5>
                         <p class='card-text'> ".$post." </p>

                      <a class='card-link'>Comments:100</a>
                        <a class='card-link'>Likes:".$likes."</a>
                        </div>
                          </div>";
                }
            }

          }
        }
        echo "<div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary'>Post</button>
        </div>
      </form>
      </div>";







    $conn->close(); //Make sure to close out the database connection
    ?>

      </div>


    </div>
  </div>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action = "Post.php">
            <div class="form-group">
              <label for="exampleInputPassword1">Anime Name</label>
              <input type="text" class="form-control" name = "anime" id="exampleInputPassword1" placeholder="Anime">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Discussion</label>
              <input type="text" class="form-control" name = "userpost" id="exampleInputPassword1" placeholder="Start Typing...">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <?php
  //session_start();
    if(isset($_SESSION['Wrong']))
    {
      echo "<div> You entered an incorrect username or password </div>";
        unset($_SESSION['Wrong']);
    }

  ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type = "text/javascript">



    // Get the button that opens the modal
    //var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    //var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    openModal = function(post) {
      var postID = post.getAttribute("data-post-id");
      $.ajax({
          url: 'ProfilePage.php',
          method: 'POST',
          dataType: 'text',
          data: {
              postComments: 1,
              postID: postID
          }, success: function (response) {
              console.log(postID);
              console.log(response);


          }
      });
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
    }
    openUser = function(user) {
      var username = user.getAttribute("data-user-name");
      console.log(username);
      $.ajax({
          url: 'ProfilePage.php',
          method: 'POST',
          dataType: 'text',
          data: {
              openUser: 1,
              username: username
          }, success: function (response) {
              console.log(response);
              window.location = window.location;

          }
      });
    }



    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //   modal.style.display = "none";
    // }
    //
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //     modal.style.display = "none";
    //   }
    // }


    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

    <script type="text/javascript">
      $("#selectddl").chosen();
    </script>

  </body>
</html>
