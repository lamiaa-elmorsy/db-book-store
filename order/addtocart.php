<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		// echo "Connected Successfully"."<br>";
	}

	//Insert book to the cart
	$sql = "INSERT INTO cart (book_id, user_id, order_id, quantity) 
			VALUES ('".$_POST['book_id']."', '".$_POST['user_id']."', '".$_POST['order_id']."', 
				'".$_POST['quantity']."')" ;


	if (mysqli_query($connection, $sql)){
		echo "New Book Recode Has Been Added Successfully to Your Cart"."<br>";
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	//Insert the book quantity_in_stock -- for that book_id
	$sql = "SELECT number_of_copies FROM book_copies WHERE book_id='".$_POST['book_id']."'" ;

	if (mysqli_query($connection, $sql)){
		echo "New Book Quantity Has Been Added Successfully to book_copies table"."<br>";
		$number_of_copies = $row['number_of_copies'];

		$number_of_copies = $number_of_copies - $_POST['quantity'];
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	if($number_of_copies > 0){
		$sql = "UPDATE book_copies SET number_of_copies ='".$number_of_copies."' WHERE book_id='".$_POST['book_id']."'";

		if (mysqli_query($connection, $sql)){
		
		echo "New Book Quantity Has Been Added Successfully Updated"."<br>";
		}else{
			echo "Error: ".$sql."<br>".mysqli_error($connection);
		}
	}else{
		// echo "Negative quantity!<br>";
		echo "This quantity is not available!<br>";
	}


	mysqli_close($connection);
	
	header('Location: viewcart.php');

?>