<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$target_dir = 'uploads/';
		$target_file = $target_dir . $_FILES["fileUpload"]["name"];
		$file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		$error = array();

		// Kiểm tra kích cỡ file upload
		if ($_FILES['fileUpload']['size'] > 5*1024*1024) {
			$error['fileUpload'] = 'Chỉ cho phép upload file dưới 5MB !';
		}
		// Kiểm tra kiểu file
		$file_allow = array('jpg', 'png', 'jpeg', 'gif', 'txt', 'pdf');
		if(!in_array($file_type, $file_allow)) {
			  $error['fileUpload'] = "Sorry, File không được cho phép .";
			 
		}
		
		// Kiểm tra file tồn tại
		if (file_exists($target_file)) {
			$error['fileUpload'] = 'File đã tồn tại . Vui lòng thử lại !';
		}
		//  Xử lí upload
		if (empty($error)) {
			if (move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $target_file)) {
				$flag = 1;
				echo '
				<div class="alert alert-success">
	  				<strong>Upload thành công !</strong>
				</div>
				';
			}else{
				echo '
				<div class="alert alert-danger">
	  				<strong>Upload thất bại !</strong>
				</div>
				';
			}
		}
	}

 ?>