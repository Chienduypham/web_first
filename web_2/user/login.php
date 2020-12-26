<?php 
	session_start();
	require_once '../database/config.php';

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (!empty($_POST)) {
			$con = mysqli_connect("localhost", "root", "", "myblog");

			$email = $_POST['email'];

			$password = md5($_POST['password']);
			
		    $sql = "select * from users where email = '".$email."' and password = '".$password."'";

		    $email = mysqli_real_escape_string($con,$email);
			$password = mysql_real_escape_string($con,$password);
			
		    $data = excuteResult($sql);

		  if ($data !== null && count($data) > 0) {
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			
			header('Location: ../public/content.php');
			}
		  	
		  }
				
		}
	
		

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="static/login.css">
</head>
<body>
	<header>
		<div class="jumbotron head-top" style="margin-bottom:0">
			<h1>H4ck3d-icon</h1>
		</div>
	</header>
	<main>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="../public/index.php"><i class="fas fa-home"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="login.php">Đăng nhập</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">Đăng kí</a>
					</li>
				</ul>
			</div>  
		</nav>
		<div class="container login-form">
		    <h2 class="text-center">Login</h2>
		    <hr>
		    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		      <div class="form-group">
		        <label for="email"><b>Email:</b></label>
		        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		      </div>
		      <div class="form-group">
		        <label for="password"><b>Password:</b></label>
		        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
		      </div>
		      <button type="submit" class="btn btn-primary submit-btn">Submit</button>
		    </form>
	    </div>
		</main>
	
</body>
</html>