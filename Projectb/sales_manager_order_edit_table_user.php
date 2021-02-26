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
					Project X.   Product Manager.       .
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
			    <br>
			    <b><u>EDIT ORDER<u></b>
			    <br>
			    <br>
			  <tr>
		   		<th><div align="center">Order Number</th>
			    <th><div align="center">Customer Information</th>
			    <th><div align="center">Invoice Number</th>
			    <th><div align="center">Address</th>
			  
			  </tr>



				<div align="center">
				<br>
				<u>INSERT NEW INFORMATIONS FOR ORDER<u>
				<br>
				<br>
				<form action="Edit_info_Order_as_Manager_for_user_Algo.php" method="POST">
				 <!-- <input type="text" name="Order_ids" placeholder="Enter new order id">-->
				  <input type="text" name="Invoice_Number" placeholder="Enter new invoice number">
				  <button>SAVE</button>
  				  <br>
				</form>
				</div>

					

			<?php 

			if(empty($_SESSION["Manager_Order_EditID"]))
			{$Orders_id = htmlspecialchars($_GET["Manager_Order_EditID"]);}
			else
			{$Orders_id = $_SESSION["Manager_Order_EditID"];}

		


			$username = $_SESSION["username"];
			$password = $_SESSION["password"];

		


			$sql_statement = "SELECT * FROM `orders` WHERE Order_Number ='$Orders_id'";
			$result = mysqli_query($db, $sql_statement);	

			$row = mysqli_fetch_assoc($result);

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




			  echo "<tr>" . "<th>" . $order_id . "</th>" . "<th>" . "Customer ID: " . $customer_info . "</th>" .   "<th>" . $invoice_id . "</th>" . "<th>" . $address . "</th>"  . "</tr>"; 			

			$_SESSION["specific_id"] = $order_id;  
			$_SESSION["specific_info"] = $customer_info;  
			$_SESSION["specific_invoice_id"] = $invoice_id;
			$_SESSION["specific_address"] = $address;


			  ?>

			  	

	</body>
</html>