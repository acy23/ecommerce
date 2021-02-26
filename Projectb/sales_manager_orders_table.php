<?php
session_start(); // Right at the top of your script
?>
<?php include "config.php"; ?>
<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>E-commerce</title>
		<meta name="description" content="Bootstrap Recitation">
		<meta name="author" content="CS306-201802">
		
		<! Bootstrap files >
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-ligh">
			<div class="container"
				<a class="navbar-brand" href="table.html">
					<img src="img/balloon.png" width="30" height="30" class="d-inline-block align-top">
					Project X.   .Sales. .Manager.       .
				</a>

				<! responsive design >
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"</span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="sales_manager_table.php">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="Account_of_sales_manager.php">Account</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="sales_manager_orders_table.php">Orders</a>
						</li>
					</ul>



						<span class="navbar-text">
							<a class="nav-link" href="index.html">Logout</a>
						</span>
				</div>
			</div>
		</nav>
		<style>            ///////////////////////////STYLE INFO///////////////////////////
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			</style>
			</head>
			<body>
			  <div align="center">
			  <table>
			    <br>
			    <b>ALL ORDERS</b>
			    <br>
			  <tr>
			    <th><div align="center">Order Number</th>
			    <th><div align="center">Customer Information</th>
			    <th><div align="center">Invoice Number</th>
			    <th><div align="center">Address</th>
			    <th><div align="center">Actions</th>
			    
			    
			  </tr>
		

					

			<?php 

			$username = $_SESSION["username"];
			$password = $_SESSION["password"];

	    	$_SESSION['Manager_Order_EditID']="0";


			$sql_statement = "SELECT * FROM `orders`";
			$result = mysqli_query($db, $sql_statement);	




		while($row = mysqli_fetch_assoc($result)){
			
			  	$order_id = $row['Order_Number'];

				if($row['NonUser_Information'] == '-')
				{	

					$sql_statement_user_id = "SELECT * FROM `buy` WHERE Order_Number = $order_id";
					
					$result_id = mysqli_query($db, $sql_statement_user_id);	
					
					$customer_ids= mysqli_fetch_assoc($result_id);
					
					$customer_info = $customer_ids['Customer_ID'];
				}
				else
				{
			  	$customer_info = $row['NonUser_Information'];
				}


			 	 $invoice_id = $row['Invoice_ID'];

			 	 if($row['Location'] == '-')
				{	

					$sql_statement_customer_id_for_location = "SELECT * FROM `buy` WHERE Order_Number = $order_id";
					
					$result_location = mysqli_query($db, $sql_statement_customer_id_for_location);	
					
					$customers_ids_for_location= mysqli_fetch_assoc($result_location);
					
					$specific_id = $customers_ids_for_location['Customer_ID'];


					$sql_statement_customer_ids = "SELECT * FROM `user` WHERE Customer_ID = $specific_id";
					
					$result_for_address = mysqli_query($db, $sql_statement_customer_ids);	
					
					$customer_address= mysqli_fetch_assoc($result_for_address);
					



					$address = $customer_address['Address'];
				}
				else
				{
			  	$address = $row['Location'];
				}

				if($row['NonUser_Information'] == '-')
				{	

			 	echo "<tr>" . "<th>" . $order_id . "</th>" . "<th>"  . "Customer ID: " .  $customer_info . "</th>" .   "<th>" . $invoice_id . "</th>" . "<th>" . $address . "</th>"  .  "<th>" . "<a class = 'btn btn-success' href = 'sales_manager_order_edit_table_user.php?Manager_Order_EditID=$order_id'  role ='button' >Edit</a>"  .  "<a class = 'btn btn-danger' href = 'Sales_manager_Delete_Order_Algo.php?Manager_Order_EditID=$order_id' role ='button'>Delete</a>" . "</th>" . "</tr>"; 
				}
				else
				{
			  	echo "<tr>" . "<th>" . $order_id . "</th>" . "<th>" . $customer_info . "</th>" .   "<th>" . $invoice_id . "</th>" . "<th>" . $address . "</th>"  .  "<th>" . "<a class = 'btn btn-success' href = 'sales_manager_order_edit_table_nonuser.php?Manager_Order_EditID=$order_id'  role ='button' >Edit</a>"  .  "<a class = 'btn btn-danger' href = 'Sales_manager_Delete_Order_Algo.php?Manager_Order_EditID=$order_id' role ='button'>Delete</a>" . "</th>" . "</tr>"; 

				}

			  }


			  ?>

	<br> <br>
	<br>  <br>
	<br> THE ORDER LIST<br>
	<br><br>
	</body>
</html>