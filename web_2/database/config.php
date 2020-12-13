<?php
	define("host", "localhost");
	define("username", "root");
	define("password", "");
	define("dbname", "myblog");

	function excute($sql)
	{
		$conn = mysqli_connect(host,username,password,dbname);
		mysqli_set_charset($conn, "utf8");

		if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
		}

		mysqli_query($conn, $sql);

		mysqli_close($conn);
	}

	function excuteResult($sql){
		$conn = mysqli_connect(host,username,password,dbname);
		mysqli_set_charset($conn, "utf8");

		if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
		}

		$result = mysqli_query($conn, $sql);
		$data = [];
		
		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  while($row = mysqli_fetch_array($result, 1 )) {
		    $data[] = $row;
		  }
		} 
		
		mysqli_close($conn);

		return $data;
	}

	function excuteOneResult($sql){
		$conn = mysqli_connect(host,username,password,dbname);
		mysqli_set_charset($conn, "utf8");

		if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
		}

		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  $row = mysqli_fetch_array($result, 1 );
		} 
		
		mysqli_close($conn);

		return $row;
	}
?>