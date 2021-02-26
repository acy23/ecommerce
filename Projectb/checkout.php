<?php
session_start();
include "config.php";
if (isset($_POST['hardestpart'])){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cs306_v2";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	$customerID = $_SESSION['customerID'];
	$sqltwo = "INSERT INTO add_to_basket_v2 ( Product_ID , Customer_ID ) SELECT  Product_ID , Customer_ID FROM    add_to_basket  WHERE 
	Customer_ID = '$customerID' ";

    if($conn->query($sqltwo) === TRUE){

   	  
      echo " Yeah it's working check database. ";
      
      
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    
	$sqlthree = "DELETE FROM add_to_basket WHERE Customer_ID = '$customerID' ";
	if($conn->query($sqlthree) === TRUE){
		header ('Location: realorders.php');

	}


}


?>