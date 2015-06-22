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
			            var title="<?php echo $title; ?>";
			            document.getElementById('title').value = title
 					    // alert(htmlString)
			        }
   			    if(document.getElementById('author').value.length == 0){
			            var author="<?php echo $author; ?>";
			            document.getElementById('author').value = author
			        }
			    if(document.getElementById('publisher').value.length == 0){
			            var publisher="<?php echo $publisher; ?>";
			            document.getElementById('publisher').value = publisher
			        }
   			    if(document.getElementById('pub_year').value.length == 0){
			            var pub_year="<?php echo $pub_year; ?>";
			            document.getElementById('pub_year').value = pub_year
			        }
			    if(document.getElementById('selling_price').value.length == 0){
			            var selling_price="<?php echo $selling_price; ?>";
			            document.getElementById('selling_price').value = selling_price
			        }
   			    if(document.getElementById('category').value.length == 0){
			            var category="<?php echo $category; ?>";
			            document.getElementById('category').value = category
			        }
			}

		</script>
		<title>Edit Book</title>
	</head>
	<body>
	<table>
		<form action="update_query.php" method="post" onsubmit="validate()">
			<tr><td> Book Title: </td><td> <input type="text" id="title" name="title" placeholder='<?php echo $title; ?>'></td></tr>
			<tr><td>Author Name: </td><td> <input type="text" id ="author" name="author" placeholder='<?php echo $author; ?>'></td></tr>
			<tr><td>Publisher: </td><td> <input type="text" id="publisher" name="publisher" placeholder='<?php echo $$publisher; ?>'></td></tr>
			<tr><td>Publication Year: </td><td> <input type="text" id="pub_year" name="pub_year" placeholder='<?php echo $pub_year; ?>'></td></tr>
			<tr><td>Selling Price: </td><td> <input type="text" id="selling_price" name="selling_price" placeholder='<?php echo $selling_price; ?>'></td></tr>
			<tr><td>Category: </td><td>
			<select id="category" name="category" placeholder='<?php echo $category; ?>'>
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