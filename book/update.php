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
	$sql = "SELECT * FROM book WHERE id='".$_POST['book_id']."'" ;
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$book_id = $row["id"];
			$title =  $row["title"];
			$author = $row["author"];
			$publisher = $row['publisher'];
			$category = $row["category"];
			$pub_year = $row['pub_year']; 
			$selling_price = $row['selling_price']; 
		}
	}else{
		// echo "Error ...<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	//Insert the book quantity_in_stock -- for that book_id
	$sql = "SELECT * FROM book_copies WHERE book_id ='".$book_id."'" ;
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$quantity_in_stock = $row["number_of_copies"];
		}
	}else{
		// echo "Error ...<br>";
		echo "Error: ".$sql."<br>".mysqli_error($connection);
	}

	mysqli_close($connection);

?>
<html>
	<head>
		<script type="text/javascript">
			function validate(){
			    if(document.getElementById('title').value.length == 0){
			            var htmlString="<?php echo $category; ?>";
 					    alert(htmlString)
			            // alert('<?php echo $title?>')
			        }
			}

		</script>
		<title>Edit Book</title>
	</head>
	<body>
	<table>
		<form action="update_query.php" method="post" onsubmit="validate()">
			<tr><td> Book Title: </td><td> <input type="text" id="title" name="title" placeholder='<?php echo $title; ?>'></td></tr>
			<tr><td>Author Name: </td><td> <input type="text" name="author" placeholder='<?php echo $author; ?>'></td></tr>
			<tr><td>Publisher: </td><td> <input type="text" name="publisher" placeholder='<?php echo $$publisher; ?>'></td></tr>
			<tr><td>Publication Year: </td><td> <input type="text" name="pub_year" placeholder='<?php echo $pub_year; ?>'></td></tr>
			<tr><td>Selling Price: </td><td> <input type="text" name="selling_price" placeholder='<?php echo $selling_price; ?>'></td></tr>
			<tr><td>Category: </td><td>
			<select name="category" placeholder='<?php echo $category; ?>'>
				<option value="science"> Science </option>
				<option value="history"> History </option>
				<option value="geography"> Geography </option>
				<option value="religion"> Religion </option>
				<option value="art"> Art </option>
			</select></td></tr>
			<tr><td>Quantity in Stock: </td><td> <input type="text" name="quantity_in_stock" placeholder='<?php echo $quantity_in_stock; ?>'></td></tr>
			<tr><td></td><td><input type="submit" value="Edit Book"> </td></tr>
			<input type="hidden" name="book_id" value="<?php echo $_POST['book_id']; ?>">
		</form>
	</table>
	</body>
</html>