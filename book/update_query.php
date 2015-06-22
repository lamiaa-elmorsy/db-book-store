<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		// echo "Connected Successfully"."<br>";
	}

	//values
	$book_id = $_POST['book_id'];
	$title = $_POST['title']; 
	$author = $_POST['author'];
	$publisher = $_POST['publisher']; 
	$pub_year = $_POST['pub_year'];
	$selling_price = $_POST['selling_price']; 
	$category = $_POST['category'] ;

	//TODO: if new value is empty .. don't update it ==> DONE
	$sql = "UPDATE book 
		SET
			title = '".$title."', 
			author = '".$author."',
			publisher = '".$publisher."', 
			pub_year = '".$pub_year."', 
			selling_price = '".$selling_price."', 
			category = '".$category."' 
			WHERE book.id = '".$book_id."'";

	echo $sql;			
	if (mysqli_query($GLOBALS['connection'] , $sql)){
		echo "New Book Recode Has Been Added Successfully"."<br>";
	}else{
		// echo "Error ..<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	//Check number_of_copies before update ==> DONE by triggers
	//TODO: alter to user
	$sql = "UPDATE book_copies 
		SET number_of_copies ='".$_POST['quantity_in_stock']."'
		WHERE book_id='".$book_id."'";
	
	if (mysqli_query($GLOBALS['connection'], $sql)){
		echo "New Book Quantity Has Been Added Successfully to book_copies table"."<br>";
	}else{
		// echo "Error ..<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

	//TODO: go to viewbook.php with value of book_id ==> DONE
	header('Location: viewbook.php?id='.$book_id);

?>