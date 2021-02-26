<?php
session_start(); // Right at the top of your script
?>

<?php include "config.php"; ?>

<?php

$specific_id = $_SESSION["specific_id"];
$specific_name = $_SESSION["specific_name"];
$specific_price = $_SESSION["specific_price"];


if(isset($_POST['id']) && strlen($_POST['id']) != 0){
$newidofproduct = $_POST['id'];
}
else
{
	$newidofproduct = $_SESSION["specific_id"];
}


if(isset($_POST['name'])&& strlen($_POST['name']) != 0){
$newnameofproduct = $_POST['name'];
}
else
{
	$newnameofproduct = $_SESSION["specific_name"];
}


if(isset($_POST['price']) && strlen($_POST['price']) != 0){
$newpriceofproduct = $_POST['price'];
}
else
{
	$newpriceofproduct = $_SESSION["specific_price"];
}

$sql_statement = "UPDATE product
					SET Product_ID = '$newidofproduct', Product_Name = '$newnameofproduct', Price = '$newpriceofproduct'
					WHERE Product_ID = '$specific_id'";
$result = mysqli_query($db, $sql_statement);

$_SESSION['ManProductEditedID'] = $newidofproduct;





$p_man_id = $_SESSION["idOfManager"];

$sql_statement_information = "INSERT INTO edit_product (Product_ID, P_Manager_ID , Explanation) VALUES ('$newidofproduct' , '$p_man_id' , 'edited product information')";
$info_result = mysqli_query($db, $sql_statement_information);





header('Location: p_manager_producttable.php');

	?>