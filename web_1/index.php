<?php 
	require_once 'upload.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Upload file</title>
	<style type="text/css">
		.form-upload{
			background-color: #ccc;
			margin: auto;
			margin-top: 100px;
			border: 5px solid #99ccff;
			padding: 50px;
			width: 600px;	
			
		}
		hr{
			background-color: green;
		}
		.btn-upload{
			padding: 8px;
		}
		.list-file{
			margin-top: 50px;
		}
		.form-type{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<header>
		<h1 class="text-center text-success">UPLOAD</h1>
		<hr>
	</header>
	<main>
		<!-- Show lỗi upload -->
		<div class="container">
			<?php
			if(!empty($error)){
				echo '
				<div class="alert alert-warning">
	  				<strong>Warning !</strong> "'.$error['fileUpload'].'"
				</div>
				';
			} 
			 ?>
			 <!-- form tải tệp  -->
			<form method="post" enctype="multipart/form-data" class="form-upload">
				<div class="form-row">
					<div class="col">
						<input type="file" name="fileUpload" id="fileUpload" class="btn btn-info">
					</div>
					<div class="col">
						<input type="submit" value="upload" name="submit" class="btn-upload btn btn-success float-right">
					</div>
				</div>
			</form>
			<!-- chọn kiểu file --> 
			<form class="form-type form-row" style="margin-left: 250px;width: 1050px;" method="get"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="col">
					<input type="text" name="type" class="form-control">
				</div>
				<div class="col">
					<input type="submit" value="Search" class="btn btn-info ">
				</div>
  				
			</form>
			<!-- Bảng hiển thị danh sách tệp -->
			<table class="table table-bordered table-hover list-file">
				<thead>
					<tr class="text-center" style="color: #3399ff;">
						<th width="50px">STT</th>
						<th>File</th>
						<th width="50px">Xem</th>
						<th width="50px">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require_once 'fileList.php';
					?>
				</tbody>
			</table>
		</div>
	</main>
	<footer style="margin-top: 50px;">
		<hr>
		<h1 class="text-center text-primary">END</h1>
	</footer>	
</body>
</html>