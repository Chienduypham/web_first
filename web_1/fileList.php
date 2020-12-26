<?php 
	if (is_dir('uploads') && file_exists('uploads')){
		$dir = 'uploads';
		
	}else{
		echo 'Sory , Không tồn tại !';
		die();
	}

	$type = '*';
	if (isset($_GET['type'])) {
		$type = strtolower($_GET['type']);
	}
	$index = 1;
	foreach (glob($dir."/*".$type) as $item) {
		$i = htmlspecialchars(substr($item, 8));
		if (is_file("$dir/$i")) {
			echo '<tr>
				<th>'.($index++).'</th>
				<th>'.$i.'</th>
				<th>
					<a href= "uploads/'.$i.'">
						<button class="btn btn-primary")>Xem</button>
					</a>
				</th>
				<th>
					<a href="delete.php?item=uploads/'.$i.'">
						<button class="btn btn-danger" onclick = "check()">Xóa</button>
					</a>
				</th>
			  </tr>';
		}else{
			die();
		}
	}
			
		
 ?>