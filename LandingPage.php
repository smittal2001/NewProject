<!doctype html>
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
if (isset($_POST['register'])) {
      $name = $conn->real_escape_string($_POST['name']);
      $email = $conn->real_escape_string($_POST['email']);
      $password = $conn->real_escape_string($_POST['password']);
      $bio = $conn->real_escape_string($_POST['bio']);

      $currentAnime = $conn->real_escape_string($_POST['currentAnime']);

      echo "hello 2 ";

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $sql = $conn->query("SELECT id FROM users WHERE email='$email'");
          if ($sql->num_rows > 0)
              exit('failedUserExists');
          else {
              $ePassword = password_hash($password, PASSWORD_BCRYPT);
              echo $name;
              echo $bio;
              echo $currentAnime;

              $conn->query("INSERT INTO users (name,password,email,bio,currentAnime) VALUES ('$name', '$password', '$email','$bio','$currentAnime')");
              $sql2 = "INSERT INTO users (username, password, email, bio, currentAnime) VALUES ('".$name."','".$ePassword."','".$email."','".$bio."','".$currentAnime."')";
              $stmt = $conn->prepare($sql2);
              $stmt->bind_param("sssss",$name,$password,$email,$bio,$currentAnime);
              $stmt->execute();




              $sql = $conn->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
              $data = $sql->fetch_assoc();

              $_SESSION['loggedIn'] = 1;
              // $_SESSION['name'] = $name;
              $_SESSION['email'] = $email;
              $_SESSION['userID'] = $data['id'];
              $_SESSION['user'] = $name;
              exit('success');
          }
      } else
          exit('failedEmail');
  }

  if (isset($_POST['logIn'])) {
       $username = $conn->real_escape_string($_POST['username']);
       $password = $conn->real_escape_string($_POST['password']);

       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $sql = $conn->query("SELECT id, password, username, email FROM users WHERE username ='$username'");
           if ($sql->num_rows == 0)
               exit('failed');
           else {
               $data = $sql->fetch_assoc();
               $passwordHash = $data['password'];
               $email = $data['email'];

               if (password_verify($password, $passwordHash)) {
                   $_SESSION['loggedIn'] = 1;
                   $_SESSION['user'] = $data['username'];
                   $_SESSION['email'] = $email;
                   $_SESSION['userID'] = $data['id'];

                   exit('success');
               } else
                   exit('failed');
           }
       } else
           exit('failed');
   }
  $conn->close();

 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>


      .div1
      {
        top: 150px;
        left: 30%;
        margin: auto;
        text-align: center;
        position: absolute;
				font-size: 64px;
				color: #144F6A;
      }

      .landing{
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 10px #888888;
        position: absolute;
        top: 25%;
        left: 30%;
        margin: auto;
        width: 40%;
        z-index: 1;
        height: 500px;
        color: #2196F3;
        background: #26B3FF;

      }
      .Loginbutton
      {
        background: #ffffff;
        width: 280px;
        position: absolute;
        bottom: 100px;
        left: 30px;
        padding: 15px 25px;
        font-size: 32px;
        cursor: pointer;
        text-align: center;
      }

      .Loginbutton:active {
        background-color: #ffffff;
        transform: translateY(4px);
      }
      .RegisterButton {
        background: #ffffff;
        width: 280px;
        position: absolute;
        bottom: 100px;
        right: 30px;
        padding: 15px 25px;
        font-size: 32px;
        cursor: pointer;
        text-align: center;
      }
      button:hover {background-color: #98A3A8}

      .RegisterButton:active {
        background-color: #ffffff;
        transform: translateY(4px);
      }

			.modal:nth-of-type(2) {
			    z-index: 1052 !important;
			}
			.modal-backdrop.show:nth-of-type(2) {
			    z-index: 1051 !important;
			}
      .modal-backdrop {
        /* bug fix - no overlay */
        display: none;
    }

    </style>
    <title>Login</title>
  </head>
  <body>


<div class = "container">

  <div class= "landing">
    <div class = "div1">Web Project</div>
    <button type="button" class="Loginbutton" data-toggle="modal" data-target="#LoginPageModal" > Login </button>
    <button type="button" class="RegisterButton" data-toggle="modal" data-target="#RegisterPageModal" > Sign up </button>

  </div>
</div>

  <!-- Modal 1 sign in ask for username and password -->
  <div class="modal fade" id="LoginPageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action = "">
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" class="form-control" name = "username" id="Luser" placeholder="Enter username...">
            </div>
						<div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name = "password" id="Lpassword" placeholder="Enter password...">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id = "loginBtn" >Login</button>
        </div>
      </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="RegisterPageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" >
						<div class="form-group">
							<label for="exampleInputPassword1">Username</label>
							<input type="text" class="form-control" name = "username" id="username" placeholder="Enter username...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Email</label>
							<input type="text" class="form-control" name = "email" id="email" placeholder="Enter email...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name = "password" id="password" placeholder="Enter password...">
						</div>
            <div class="form-group">
              <label for="exampleInputPassword1">Which Anime are you currently watching?</label>
              <input type="text" class="form-control" name = "currentAnime" id="currentAnime" placeholder="Enter anime...">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Which anime do you want to watch?</label>
              <input type="text" class="form-control" name = "animeWishlist" id="animeWishlist" placeholder="Type which anime you want to watch...">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Bio</label>
              <input type="text" class="form-control" name = "bio" id="bio" placeholder="Type Bio...">
            </div>
            </form>

        </div>
        <div class="modal-footer">

					  <button type="submit" class="btn btn-primary" id = "registerForm"> Done </button>
        </div>
      </form>
      </div>
    </div>
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type = "text/javascript">
      $(document).ready(function () {
        $("#registerForm").on('click', function () {
          var name = $('#username').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var currentAnime = $('#currentAnime').val();
          var profileImage = $('#profileImage').val();
          var bio = $('#bio').val();
          if(name != "" && email != "" && password != "" )
          {
            $.ajax({
              url: "LandingPage.php",
              method: "POST",
              dataType: 'text',
              data: {
                register: 1,
                name: name,
                email: email,
                password: password,
                currentAnime: currentAnime,
                bio: bio
              }, success: function(response) {
                if (response === 'failedEmail')
                    alert('Please insert valid email address!');
                else if (response === 'failedUserExists')
                    alert('User with this email already exists!');
                else
                    window.location.assign('http://localhost:8080/WebProject/ProfilePage.php');
              }
            });
          } else { alert('Check Inputs');}

        });
    //  });

      $("#loginBtn").on('click', function () {
               var username = $("#Luser").val();
               var password = $("#Lpassword").val();

               if (username != "" && password != "") {
                    $.ajax({
                        url: 'LandingPage.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            logIn: 1,
                            username: username,
                            password: password
                        }, success: function (response) {
                            if (response === 'failed')
                                alert('Please check your login details!');
                            else
                                window.location.assign('http://localhost:8080/WebProject/ProfilePage.php');
                        }
                    });
               } else
                   alert('Please Check Your Inputs');
           });
        });
    </script>
  </body>
</html>
