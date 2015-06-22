<?php
require_once('config.php');

//Connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
if (!$connection){
	die("Connection Failed: ".mysqli_connecy_erro());
}else{
	echo "Connected Successfully"."<br>";
}

//Create Database
$sql = "CREATE DATABASE ".DB_NAME;
if (mysqli_query($connection, $sql)) {
    echo "Database created successfully"."<br>";
} else {
    echo "Error creating database: " . mysqli_error($connection);
}

mysqli_close($connection);

?>