<?php 
    require_once '../database/config.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if(!empty($_POST)){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $re_pwd = $_POST['psw-repeat'];

        if ($name == '' || $password =='' || $re_pwd == '' || $email == '') {
          echo "Bạn cần nhập đầy đủ thông tin !";
        }else {
          if ($password !== $re_pwd) {
            echo "Xác nhận lại mật khẩu !";
          }else{
            $sql = "INSERT INTO users (name, email, password) VALUES ('".$name."','".$email."','".$password."')";
            excute($sql);
            header("Location: login.php");
            die();
          }

        }
      }
    }

 ?>
<!DOCTYPE html>
<html>
<header>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="static/register.css">
</header>
<body>
  <header>
    <div class="jumbotron head-top" style="margin-bottom:0">
      <h1 class="text-left">H4ck3d-icon</h1>
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
            <a class="nav-link" href="login.php">Đăng nhập</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="register.php">Đăng kí</a>
          </li>
        </ul>
      </div>  
    </nav>
<!-- form -->
    <form class="modal-content" style=" margin: 0 auto 0 auto;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="container">
        <h1>Register</h1>
        <hr>
        <label for="name"><b>User Name</b></label>
        <input type="text" placeholder="Enter User Name" name="name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        
        <div class="clearfix">
          <button type="submit" class="signupbtn">Register</button>
        </div>
      </div>
    </form>
<!-- end form -->
  </main>
</body>
</html>
