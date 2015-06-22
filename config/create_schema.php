<?php
require_once('config.php');

//Connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD , DB_NAME);
if (!$connection){
	die("Connection Failed: ".mysqli_connecy_erro());
}else{
	echo "Connected Successfully"."<br>";
}

//Create Tables
//Books
$sql = "CREATE TABLE book(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(20) NOT NULL,
	author VARCHAR(20) NOT NULL,
	publisher VARCHAR(20) NOT NULL,
	pub_year INT,
	selling_price INT NOT NULL,
	category VARCHAR(20) NOT NULL
	)";

if (mysqli_query($connection,$sql)){
	echo "Table books created successfully";
}else {
    echo "Error creating table books: " . mysqli_error($connection);
}

//Publishers
$sql = "CREATE TABLE publishers(
	id INT AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(20) NOT NULL,
	lname VARCHAR(20) NOT NULL,
	address VARCHAR(20) NOT NULL,
	phone VARCHAR(20) NOT NULL
	)";
if (mysqli_query($connection,$sql)){
	echo "Table books created successfully";
}else {
    echo "Error creating table books: " . mysqli_error($connection);
}

//Users
$sql = "CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(20) NOT NULL,
	lname VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL,
	shipping_address VARCHAR(20) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	bdate DATE NOT NULL,
	sex BIT NOT NULL,
	user_type BIT NOT NULL
	)";
if (mysqli_query($connection,$sql)){
	echo "Table books created successfully";
}else {
    echo "Error creating table books: " . mysqli_error($connection);
}

//Orders
$sql = "CREATE TABLE orders(
	id INT AUTO_INCREMENT PRIMARY KEY,
	book_id INT NOT NULL,
	user_id INT NOT NULL,
	order_date DATE NOT NULL
	)";
if (mysqli_query($connection,$sql)){
	echo "Table orders created successfully";
}else {
    echo "Error creating table orders: " . mysqli_error($connection);
}

//Cart
$sql = "CREATE TABLE cart(
	id INT AUTO_INCREMENT PRIMARY KEY,
	book_id INT NOT NULL,
	user_id INT NOT NULL,
	order_id INT NOT NULL,
	quantity INT NOT NULL,
	)";
if (mysqli_query($connection,$sql)){
	echo "Table cart created successfully";
}else {
    echo "Error creating table cart: " . mysqli_error($connection);
}

//Book Copies
$sql = "CREATE TABLE book_copies(
	book_id INT NOT NULL,
	number_of_copies INT NOT NULL
	)";
if (mysqli_query($connection,$sql)){
	echo "Table books created successfully";
}else {
    echo "Error creating table books: " . mysqli_error($connection);
}


mysqli_close($connection);

?>