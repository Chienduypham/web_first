<?php
	include_once "../../database/config.php";
	$id = $title = $id_category = $content = $picture = "";
	if (!empty($_POST)) {
		
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
			$title = str_replace('"', '\\"', $title);
		}
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
		if(isset($_POST['id_category'])){
			$id_category = $_POST['id_category'];
		}
		if(isset($_POST['content'])){
			$content = $_POST['content'];
			$content = str_replace('"', '\\"', $content);
		}
		if(isset($_POST['picture'])){
			$picture = $_POST['picture'];
			$picture = str_replace('"', '\\"', $picture);
		}
		if (!empty($title)) {
			if($id == ''){
				// $create_at = $update_at = date('Y-m-d H:s:i');
				$sql = 'insert into posts(id,title,id_category,picture,content) values ("'.$id.'","'.$title.'","'.$id_category.'", "'.$picture.'","'.$content.'")';
			}else{
				$sql = 'update posts set title = "'.$title.'", id_category = "'.$id_category.'" , picture = "'.$picture.'" , content = "'.$content.'" where id='.$id;
			}
			

			excute($sql);

			header("Location: index.php");

			die();
		}
	}
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = 'select * from posts where id = '.$id;
		$posts = excuteOneResult($sql);
		if ($posts != null) {
		 	$title = $posts['title'];
		 	$id_category = $posts['id_category'];
		 	$picture = $posts['picture'];
		 	$content = $posts['content'];
		 } 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add_content</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

 
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
						<a class="nav-link" href="../category">Quản lí danh mục</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Quản lí bài viết</a>
					</li>
				</ul>
			</div>  
		</nav>

		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center" style="margin-top:20px; ">Thêm bài viết</h2>
					<hr style="background-color: #99ff66;">
				</div>
				<div class="panel-body">
					<form action="" method="post">
					  <div class="form-group">
					    <label for="title"><b>Tên bài viết :</b></label>
					    <input type="text" name="id" value="<?=$id?>" hidden="true">
					    <input type="text" class="form-control" placeholder="Nhập tiêu đề"  name="title" value="<?=$title?>">
					  </div>
					  <div class="form-group">
					    <label for="picture"><b>Danh mục :</b></label>
					    <select class="form-control" name ="id_category">
					    	<option>--Lựa chọn danh mục--</option>
					    	<?php 
					    		$sql = "select * from category";
								$categoryList = excuteResult($sql);
								foreach ($categoryList as $item) {
									if ($item['id'] == $id_category) {
										echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
									}else{
										echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
									}
								}
									
					    	 ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="picture"><b>Hình ảnh :</b></label>
					    <input type="text" class="form-control" placeholder="Nhập hình ảnh"  name="picture" value="<?=$picture?>" onchange="update_picture()" id = "picture">
					    <img src="<?=$picture?>" style="max-width: 100px; margin-top: 10px;" id = "picture_post">
					  </div>
					  <div class="form-group">
					    <label for="picture"><b>Nội dung :</b></label>
					    <textarea class="form-control" rows="5" name="content" placeholder="Nhập nội dung bài viết ..." id ="content"><?=$content?></textarea>
					  </div>
					  
					  <button type="submit" class="btn btn-success">Lưu</button>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function update_picture() {
				$('#picture_post').attr('src', $('#picture').val());
			}
			$(function(){
				 $('#content').summernote();
			})
		</script>	
</body>
</html>
