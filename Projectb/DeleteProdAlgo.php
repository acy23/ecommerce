<?php
session_start(); // Right at the top of your script
?>

<?php include "config.php"; ?>

<?php


$Prod_id = htmlspecialchars($_GET["deletionid"]);





$p_man_id = $_SESSION["idOfManager"];

$sql_statement_information = "INSERT INTO edit_product (Product_ID, P_Manager_ID , Explanation) VALUES ('$newidofproduct' , '$p_man_id' , 'deletion')";
$info_result = mysqli_query($db, $sql_statement_information);






$sql_statement = "DELETE FROM product
					WHERE Product_ID = '$Prod_id'";

$result = mysqli_query($db, $sql_statement);



$sql_statement_cr = "DELETE FROM comment_rate
					WHERE Product_ID = '$Prod_id'";

$result_cr = mysqli_query($db, $sql_statement_cr);


$sql_statement_ab = "DELETE FROM add_to_basket
					WHERE Product_ID = '$Prod_id'";

$result_ab = mysqli_query($db, $sql_statement_ab);

$sql_statement_ep = "DELETE FROM edit_product
					WHERE Product_ID = '$Prod_id'";

$result_ep = mysqli_query($db, $sql_statement_ep);




header('Location: p_manager_producttable.php');

	?>