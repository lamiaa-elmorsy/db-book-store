<html>
	<head>
		<title>Books Options</title>
	</head>
	<body>
	<table>
		<tr>
			<td>
				Search for a Book by:
			</td>
			<td>
				<form action="search.php" method="post"> 
					<select name="search_by">
						<option value="id"> ID </option>
						<option value="title"> Title </option>
						<option value="author"> Author </option>
						<option value="publisher"> Publisher </option>
					</select>
					<input type="text" name="search_for" placeholder = "Search for..">
					<input type="submit" value="Search">
				</form>
				
			</td>
		</tr>
		<tr>
			<td>
				Search for Book By Category:
			</td>
			<td>
				<form action="search_by_category.php" method="post"> 
					<select name="category">
						<option value="science"> Science </option>
						<option value="history"> History </option>
						<option value="geography"> Geography </option>
						<option value="religion"> Religion </option>
						<option value="art"> Art </option>
					</select>
					<input type="submit" value="Search">
				</form>
				
			</td>
		</tr>
		<tr>
			<td>
				Insert new Book
			</td>
			<td>
				<form action="newbook.html" method="post"> 
					<input type="submit" value="Add New Book">
				</form>
				
			</td>
		</tr>
		<tr>
			<td>
				View All Books
			</td>
			<td>
				<form action="viewall.php" method="post"> 
					<input type="submit" value="View All Books">
				</form>
				
			</td>
		</tr>
	</table>
	</body>
</html>