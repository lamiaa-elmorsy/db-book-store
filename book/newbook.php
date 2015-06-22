<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		echo "Connected Successfully"."<br>";
	}

	//Insert Book
	$sql = "INSERT INTO book (title, author,publisher, pub_year, selling_price, category) 
			VALUES ('".$_POST['title']."', '".$_POST['author']."', '".$_POST['publisher']."', '".$_POST['pub_year']."', 
				'".$_POST['selling_price']."', '".$_POST['category']."')" ;

	if (mysqli_query($connection, $sql)){
		$book_id = mysqli_insert_id($connection); //last id - new record
		echo "New Book Recode Has Been Added Successfully"."<br>";
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	//Insert the book quantity_in_stock -- for that book_id
	$sql = "INSERT INTO book_copies (book_id, number_of_copies) 
			VALUES ('".$book_id."', '".$_POST['quantity_in_stock']."')" ;

	if (mysqli_query($connection, $sql)){
		// echo "New Book Quantity Has Been Added Successfully to book_copies table"."<br>";
		header('Location: viewbook.php?id='.$book_id);
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}



	mysqli_close($connection);

?>