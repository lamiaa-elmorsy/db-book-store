<?php
require_once('config.php');

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);

if (!$connection){
	die("Connection Failed: ".mysqli_connecy_erro());
}else{
	echo "Connected Successfully";
}

mysqli_close($connection);

?>