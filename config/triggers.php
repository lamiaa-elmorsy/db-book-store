<?php
require_once('config.php');

//Connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD , DB_NAME);
if (!$connection){
	die("Connection Failed: ".mysqli_connecy_erro());
}else{
	echo "Connected Successfully"."<br>";
}

//Before Update Number of copies
$sql = "CREATE TRIGGER update_copies BEFORE UPDATE ON book_copies
    FOR EACH ROW
     BEGIN
         IF NEW.number_of_copies > 0 THEN
             SET NEW.number_of_copies = NEW.number_of_copies;
         ELSEIF NEW.number_of_copies < 0 THEN
             SET NEW.number_of_copies  = OLD.number_of_copies;
     END IF;
     END;";

if (mysqli_query($connection,$sql)){
	echo "Trigger created successfully";
}else {
    echo "Error creating trigger: " . mysqli_error($connection);
}

?>