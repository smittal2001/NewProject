<!doctype html>
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

			.modal:nth-of-type(even) {
			    z-index: 1052 !important;
			}
			.modal-backdrop.show:nth-of-type(even) {
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
              <input type="text" class="form-control" name = "username" id="exampleInputPassword1" placeholder="Enter username...">
            </div>
						<div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="text" class="form-control" name = "password" id="exampleInputPassword1" placeholder="Enter password...">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
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
          <form method="post" action = "">
						<div class="form-group">
							<label for="exampleInputPassword1">Username</label>
							<input type="text" class="form-control" name = "username" id="exampleInputPassword1" placeholder="Enter username...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name = "password" id="exampleInputPassword1" placeholder="Enter password...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Re-enter password</label>
							<input type="text" class="form-control" name = "password2" id="exampleInputPassword1" placeholder="Re enter password...">
						</div>

        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegisterPageModal2"> Next </button>
        </div>
      </form>
      </div>
    </div>
  </div>

	<div class="modal fade" id="RegisterPageModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action = "">
						<div class="form-group">
							<label for="exampleInputPassword1">Which Anime are you currently watching?</label>
							<input type="text" class="form-control" name = "username" id="exampleInputPassword1" placeholder="Enter anime...">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Which anime do you want to watch?</label>
							<input type="text" class="form-control" name = "password" id="exampleInputPassword1" placeholder="Enter password...">
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegisterPageModal3"> Next </button>
				</div>
			</form>
			</div>
		</div>
	</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
