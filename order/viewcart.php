<html>
<head>
	<title> View Book</title>
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
	$sql = "SELECT * FROM cart WHERE id='".$_POST['book_id']."'" ;
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "id: " . $row["id"]. " - Title: " . $row["title"]. " - Author: " . $row["author"]." - Category: " . $row["category"]. "<br>";
			$book_id = $row["id"];
		}
	}else{
		echo "Error ...<br>";
		// echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

?>

<!-- Add To cart -->
<form action="../order/addtocart.php" method="post"> 
	<input type="submit" value="Add to Cart">
</form>

<form action="edit.php" method="post">
	<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
	<input type="submit" value="Edit">

</form>

</body>
</html>
