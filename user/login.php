<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		//echo "Connected Successfully"."<br>";
	}

	//check if login correct
	$sql = "SELECT * FROM users 
			WHERE email = '".$_POST['email']."' AND password = '".md5($_POST['password']) ."'" ;
	
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) == 1){
		while($row = mysqli_fetch_assoc($result)){
			echo " Hello " . $row["fname"]. " " . $row["lname"]." <br>";
		}
	}else{
		echo "Invalid username or password";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}
	mysqli_close($connection);

?>
