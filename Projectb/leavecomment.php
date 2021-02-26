
<?php
session_start();
include "config.php";
if (isset($_POST['selectedprod'])){
	$customerID = $_SESSION['customerID'];
	$selectedprod = $_POST['selectedprod'];
	$commented = $_POST['comment'];
	$rating = $_POST['rate'];

	$sql = "INSERT INTO comment_rate VALUES ('$selectedprod' , '$customerID' , '$commented' , '$rating' )  ";
	if($db->query($sql) === TRUE){
		
		header ('Location: realorders.php');

	}
	else{
		echo "Something went wrong";
	}

}
else{

	echo "you r wrong!!";
}

?>