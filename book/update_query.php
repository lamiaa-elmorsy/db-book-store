<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		// echo "Connected Successfully"."<br>";
	}


	//TODO: if new value is empty .. don't update it
	$sql = "UPDATE book 
		SET
			title = '".$_POST['title']."', 
			author = '".$_POST['author']."',
			publisher = '".$_POST['publisher']."', 
			pub_year = '".$_POST['pub_year']."', 
			selling_price = '".$_POST['selling_price']."', 
			category = '".$_POST['category']."' 
			WHERE book.id = '".$_POST['book_id']."'";

	echo $sql;			
	if (mysqli_query($GLOBALS['connection'] , $sql)){
		echo "New Book Recode Has Been Added Successfully"."<br>";
	}else{
		// echo "Error ..<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	$sql = "UPDATE book_copies 
		SET number_of_copies ='".$_POST['quantity_in_stock']."'
		WHERE book_id='".$_POST['book_id']."'";
	
	if (mysqli_query($GLOBALS['connection'], $sql)){
		echo "New Book Quantity Has Been Added Successfully to book_copies table"."<br>";
	}else{
		// echo "Error ..<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

	//TODO: go to viewbook.php with value of book_id
	header('Location: viewall.php');

?>