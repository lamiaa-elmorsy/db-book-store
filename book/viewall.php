<html>
<head>
	<title> View All Books</title>
</head>
<body>

<?php
	require_once('../config/config.php');

	//Connection
	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (!$connection){
		die("Connection Failed: ".mysqli_connecy_erro());
	}else{
		// echo "Connected Successfully"."<br>";
	}

	//Select all from db
	$sql = "SELECT * FROM book" ;
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$title = $row['title'];
			$author = $row['author'];
			$publisher = $row['publisher'];
			$pub_year = $row['pub_year'];
			$selling_price = $row['selling_price'];					
			$category = $row['category'];

			echo "id: " . $id. " - Title: " . $title. "<br Author: >" . $author. "<br> Category:".
			$category."selling_price: ".$selling_price."<br>";
			echo "----------------------------------------<br>";

			// echo "id: " . $row["id"]. " - Title: " . $row["title"]. " - Author: " . $row["author"]." - Category: " . $row["category"]. "";
			 // Add To cart
			 echo "
				<form action='../order/addtocart.php' method='post'> 
					<input type='hidden' name='book_id' value='".$row["id"]."'>
					<input type='submit' value='Add to Cart'>
				</form>";

			 echo "
				<form action='viewbook.php' method='post'> 
					<input type='hidden' name='book_id' value='".$row["id"]."'>
					<input type='submit' value='View Book'>
				</form>";

		}
	}else{
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

?>
	<form action="index.php" method="post"> 
		<input type="submit" value="Back">
	</form>

</body>
</html>
