<?php
	include_once '../../database/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lí danh mục</title>
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
		/*font-size: */
	}
	</style>
</head>
<body>
	<header>
		<div class="jumbotron head-top" style="margin-bottom:0">
			<h1><i>H4ck3d-icon</i></h1>
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
						<a class="nav-link active" href="#" >Quản lí danh mục</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../content">Quản lí bài viết</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Đăng xuất</a>
					</li>
				</ul>
			</div>  
		</nav>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center" style="margin-top:20px;">Quản lí danh mục</h2>
					<hr style="background-color: #99ff66;">
				</div>
				<div class="panel-body">
					<a href="add.php">
						<button class="btn btn-success" style="margin-bottom: 20px;">Thêm danh mục</button>
					</a>
					
					<table class="table table-bordered table-hover">
						<thead>
							<tr class="text-center" style="color: #3399ff;">
								<th width="50px">STT</th>
								<th>Tên danh mục</th>
								<th width="50px">Sửa</th>
								<th width="50px">Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from category";
								$categoryList = excuteResult($sql);
								$index = 1;
								foreach ($categoryList as $item) {
								 	echo '<tr>
											<th>'.($index++).'</th>
											<th>'.$item['name'].'</th>
											<th>
											<a href= "add.php?id='.$item["id"].'"><button class="btn btn-warning">Sửa</button></a>
											</th>
											<th>
											<button class="btn btn-danger" onclick="deleteCategory('.$item["id"].')">Xóa</button>
											</th>
										  </tr>';
								 } 
							?>
						</tbody>
					
					</table>
					
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function deleteCategory(id) {
				console.log(id)
				var option = confirm("Bạn có chắc chắn muốn xóa danh mục này không ?")
				if (!option) {
					return;
				}
				$.post('ajax.php', 
					{'id': id,
					'action' : "delete"
					 }, 
					function(data) {
						location.reload()
				});
			}

		</script>
	</main>
	
</body>
</html>
