<?php
session_start(); // Right at the top of your script
?>

<?php include "config.php"; ?>

<?php

$order_id = $_SESSION["specific_id"];  
$invoice_id = $_SESSION["specific_invoice_id"];




if(isset($_POST['Order_ids']) && strlen($_POST['Order_ids']) != 0){
$new_id_of_order = $_POST['Order_ids'];
}
else
{
	$new_id_of_order = $_SESSION["specific_id"];
}



if(isset($_POST['Invoice_Number']) && strlen($_POST['Invoice_Number']) != 0){
$new_invoice_id = $_POST['Invoice_Number'];
}
else
{
	$new_invoice_id = $_SESSION["specific_invoice_id"];
}




$sql_statement = "UPDATE orders
					SET Order_Number = '$new_id_of_order', Invoice_ID = '$new_invoice_id'
					WHERE Order_Number = '$order_id'";

$result = mysqli_query($db, $sql_statement);

$_SESSION['Manager_Order_EditID'] = $new_id_of_order;



$sql_statement_b = "UPDATE buy
					SET Order_Number = '$new_id_of_order'
					WHERE Order_Number = '$orderss_id'";

$result_b = mysqli_query($db, $sql_statement_b);


$sql_statement_ed = "UPDATE edit_order
					SET Order_Number = '$new_id_of_order'
					WHERE Order_Number = '$orderss_id'";

$result_ed = mysqli_query($db, $sql_statement_ed);




$s_man_id = $_SESSION["id_Sales_Manager"];

$sql_statement_information = "INSERT INTO edit_order (S_Manager_ID , Order_Number ,Explanation) VALUES ('$s_man_id' , '$new_id_of_order' , 'user order edit')";
$info_result = mysqli_query($db, $sql_statement_information);





header('Location: sales_manager_orders_table.php');

	?>