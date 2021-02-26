
<?php
session_start(); // Right at the top of your script
?>
<?php include "config.php"; ?>

<?php

if(isset($_POST['id']) && strlen($_POST['id']) != 0 && isset($_POST['name'])&& strlen($_POST['name']) != 0 && isset($_POST['price']) && strlen($_POST['price']) != 0 ){




$newidofproduct = $_POST['id'];
$newnameofproduct = $_POST['name'];
$newpriceofproduct = $_POST['price'];


$sql_statement = "INSERT INTO product (Product_ID, Product_Name, Price, Average_Rating) VALUES ('$newidofproduct' , '$newnameofproduct' , '$newpriceofproduct' , ' ' )";


$result = mysqli_query($db, $sql_statement);





$p_man_id = $_SESSION["idOfManager"];


$sql_statement_information = "INSERT INTO edit_product (Product_ID, P_Manager_ID , Explanation) VALUES ('$newidofproduct' , '$p_man_id' , 'insertion')";

$info_result = mysqli_query($db, $sql_statement_information);





header('Location: p_manager_producttable.php');

}
else
{	
	header('Location: p_manager_producttable.php');

}
	?>