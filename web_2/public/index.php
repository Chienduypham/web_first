<?php
	include_once '../database/config.php';
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<header>
		<div class="jumbotron head-top" style="margin-bottom:0">
			<h1>H4ck3d-icon</h1>
		</div>
	</header>
	<main>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../user/login.php">Đăng nhập</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../user/register.php">Đăng kí</a>
					</li>
				</ul>
			</div>  
		</nav>
		<div class="tab" style="height: 420px;">
			<?php 
				$sql = "select * from category";
				$categoryList = excuteResult($sql);
				foreach ($categoryList as $item) {
					$value = $item['name'];
					echo '<button class="tablinks" onclick="openCity(event,\''.$value.'\')" id="'.$item['id'].'">'.$item['name'].'</button>';
				}
									
			 ?>
  		</div>
  			<?php 
  		// 		$sql_1 = "select posts.title ,posts.id , posts.picture , posts.updated_at , category.name from posts left join category on posts.id_category = category.id where category.id = ".$id;		   
				// $postList = excuteResult($sql_1);
								
				// foreach ($postList as $item) {
  				$sql_2 = "select * from category";
				$categoryList = excuteResult($sql_2);
				foreach ($categoryList as $item) {
					$value = $item['name'];
					echo '<div id="'.$value.'" class="tabcontent">
							  <h3>'.$value.'</h3>
							  <p>London is the capital city of England.</p>
						  </div>';
				}
  			 ?>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("1").click();
</script>
			
	
</body>
</html>
