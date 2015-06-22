<html>
	<head>
		<title> View All</title>
	</head>
	<body>
		<?php
			session_start();
			require_once('../config/config.php');

			//Connection
			$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			if (!$connection){
				die("Connection Failed: ".mysqli_connecy_erro());
			}else{
				//echo "Connected Successfully"."<br>";
			}
			//------------------------------------------------

			$search_by = $_POST['search_by'];
			$search_for = $_POST['search_for'];

			$sql = "SELECT * FROM book WHERE ".$search_by." LIKE '%".$search_for."%'" ;
			$results = mysqli_query($connection, $sql);
			if (mysqli_num_rows($results) > 0){
				while($row = mysqli_fetch_assoc($results)){
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