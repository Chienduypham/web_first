<?php
	include_once "../../database/config.php";
	$id = $name = "";
	if (!empty($_POST)) {
		
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			$name = str_replace('"', '\\"', $name);
		}
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
		if (!empty($name)) {
			if($id == ''){
				// $create_at = $update_at = date('Y-m-d H:s:i');
				$sql = 'insert into category(name) values ("'.$name.'")';
			}else{
				$sql = 'update category set name = "'.$name.'" where id='.$id;
			}
			

			excute($sql);

			header("Location: index.php");

			die();
		}
	}
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = 'select * from category where id = '.$id;
		$category = excuteOneResult($sql);
		if ($category != null) {
		 	$name = $category['name'];
		 } 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add_category</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<style>
	.head-top{
		background-image: url(image/img_3.jpg);
		background-size: cover;
		background-position: center;
	}
	.head-top h1{
		color: #ff6666;
	}
	</style>
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
						<a class="nav-link" href="index.php">Quản lí danh mục</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Quản lí bài viết</a>
					</li>
				</ul>
			</div>  
		</nav>

		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center" style="margin-top:20px; ">Thêm danh mục</h2>
					<hr style="background-color: #99ff66;">
				</div>
				<div class="panel-body">
					<form action="" method="post">
					  <div class="form-group">
					    <label for="name"><b>Tên danh mục :</b></label>
					    <input type="text" name="id" value="<?=$id?>" hidden="true">
					    <input type="text" class="form-control" placeholder="Nhập danh mục" id="name" name="name" value="<?=$name?>">
					  </div>
					  
					  <button type="submit" class="btn btn-success">Lưu</button>
					</form>
				</div>
			</div>
		</div>	
</body>
</html>
