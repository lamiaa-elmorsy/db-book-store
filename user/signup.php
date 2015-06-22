<?php

//TODO: check if email already exists .. 
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		//echo "Connected Successfully"."<br>";
	}

	//Insertion
	$sql = "INSERT INTO users (fname,lname,email,password,shipping_address,phone,bdate,sex,user_type) 
			VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."','".md5($_POST['password'])."', '".$_POST['shipping_address']."', '".$_POST['phone']."', '".$_POST['bdate']."', '".$_POST['sex']."', '0')" ;

	//user type by default = 0 .. Admins only have value = 1

	//echo $sql;
	if (mysqli_query($connection, $sql)){
		echo "You Have Been Signed up Successfully";
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

?>