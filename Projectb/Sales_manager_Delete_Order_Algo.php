<?php
session_start(); // Right at the top of your script
?>
<?php include "config.php"; ?>

<?php


$Orders_id = htmlspecialchars($_GET["Manager_Order_EditID"]);





$s_man_id = $_SESSION["id_Sales_Manager"];

$sql_statement_information = "INSERT INTO edit_order (P_Manager_ID, Order_Number , Explanation) VALUES ('$s_man_id' , '$Orders_id' , 'deletion')";
$info_result = mysqli_query($db, $sql_statement_information);




$sql_statement_B = "DELETE FROM buy
					WHERE Order_Number = '$Orders_id'";

$result_b = mysqli_query($db, $sql_statement_B);




$sql_statement = "DELETE FROM orders
					WHERE Order_Number = '$Orders_id'";

$result = mysqli_query($db, $sql_statement);





header('Location: sales_manager_orders_table.php');

	?>