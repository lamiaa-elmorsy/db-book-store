<html>
	<head>
		<title> View All</title>
	</head>
	<body>
		<?php
			require_once('../config/config.php');

			//Connection
			$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			if (!$connection){
				die("Connection Failed: ".mysqli_connecy_erro());
			}else{
				echo "Connected Successfully"."<br>";
			}
			//-------------------------------------------------
			// echo "Hello"."<br>";
			// echo $_POST["title"];

			$sql = "SELECT * FROM book WHERE book.category ='".$_POST['category']."'" ;
			$results = mysqli_query($connection, $sql);
			if (mysqli_num_rows($results) > 0){
				while($row = mysqli_fetch_assoc($results)){
					echo "id: " . $row["id"]. " - Title: " . $row["title"]. "<br Author: >" . $row["author"]. "<br> Category:".
					$row["category"]. "<br>";
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