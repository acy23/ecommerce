<?php
session_start(); // Right at the top of your script
?>
<?php include "config.php"; 




$Prod_id = $_SESSION["specific_id"];





$ql_statement_customer_avg_rating = "SELECT AVG(Rating) AS avg FROM `comment_rate` WHERE Product_ID = $Prod_id";
					
$result_avg_rating = mysqli_query($db, $ql_statement_customer_avg_rating);	

$avg_rating = mysqli_fetch_assoc($result_avg_rating);

$ar = $avg_rating['avg'];



$sql_statement_alteration = "UPDATE product
					SET Average_Rating = '$ar'
					WHERE Product_ID = '$Prod_id'";

$result_alt = mysqli_query($db, $sql_statement_alteration);


header('Location: p_manager_producttable.php');


?>