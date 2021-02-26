<?php session_start(); ?>
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
					Project X   "....."
				</a>

				<! responsive design >
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"</span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="table.php">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="Account.php">Account</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">Basket</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="orders.php">Orders</a>
						</li>
					</ul>

						<span class="navbar-text">
							<a class="nav-link" href="index.html">Logout</a>
						</span>
				</div>
			</div>
		</nav>
		<style>            ///////////////////////////ORDER INFORMATION///////////////////////////
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
				<h2>Orders</h2>
			  <div align="center">
			  <table>
			    <br>
			    <br>
			    <b>ORDERS</b>
			    <br>
			  <tr>
			    <th>ID</th>
			    <th>NAME</th>
			    <th>PRICE</th>
			    <th>RATING</th>
			  </tr>
			  <br>
			  <br>
			  </body>

		<?php 
			include "config.php";

			$customerID = $_SESSION['customerID'];

														//////////////////GET PRODUCT COUNT//////////////////
			$sql_statement = "SELECT COUNT(Customer_ID)
								FROM add_to_basket
								WHERE Customer_ID = '$customerID'";
			$result = mysqli_query($db, $sql_statement);	
			$row = mysqli_fetch_assoc($result);	
			$count = $row['COUNT(Customer_ID)'];	
		
														//////////////////GET PRODUCT IDs//////////////////

			$sql_statement = "SELECT Product_ID FROM add_to_basket WHERE Customer_ID = '$customerID'";
			$result = mysqli_query($db, $sql_statement);

			$products = array();

			for ($i=0; $i <$count ; $i++) { 
			
				$row = mysqli_fetch_assoc($result);
				$products[$i] = $row['Product_ID'];
				//echo $products[$i];
				}
			
														//////////////////GET PRODUCT INFO & PRINT//////////////////
			for ($i=0; $i <$count ; $i++) { 

				$sql_statement = "SELECT * FROM product WHERE Product_ID = '$products[$i]'";
				$result = mysqli_query($db, $sql_statement);
				$row = mysqli_fetch_assoc($result);

				$first = $row['Product_ID'];
				$second = $row['Product_Name'];
			  	$third = $row['Price'];
			  	$forth = $row['Average_Rating'];

			  	echo "<tr>" . "<th>" . $first . "</th>" . "<th>" . $second . "</th>" .   "<th>" . $third . "</th>" . "<th>" . $forth . "</th>" . "</tr>";
			  }
			  ?>

			  		<style>            ///////////////////////////INVOICE INFORMATION///////////////////////////
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
			    <b>INVOICE</b>
			    <br>
			  <tr>
			    <th> ORDER NO </th>
			    <th> NAME </th>
			    <th> IVOICE NO </th>
			    <th> ADDRESS </th>
			  </tr>
			  <br>
			  <br>
			  </body>

		<?php 
		include "config.php";

													//////////////////GET ORDER NUMBERS//////////////////

		$sql_statement = "SELECT Order_Number FROM buy WHERE Customer_ID = '$customerID'";
		$result = mysqli_query($db, $sql_statement);

		$orders = array();

		for ($i=0; $i <$count ; $i++) { 
		
			$row = mysqli_fetch_assoc($result);
			$orders[$i] = $row['Order_Number'];
			}

													//////////////////GET ORDER INFO & PRINT//////////////////
		for ($i=0; $i <$count ; $i++) { 

			$sql_statement = "SELECT * FROM orders WHERE Order_Number = '$orders[$i]'";
			$result = mysqli_query($db, $sql_statement);
			$row = mysqli_fetch_assoc($result);

			$first = $row['Order_Number'];
			$second = $row['NonUser_Information'];
		  	$third = $row['Invoice_ID'];
		  	$forth = $row['Location'];

		  	if ($second == "-") {
		  		$second = $_SESSION['username'];
		  		$forth = $_SESSION['address'];
		  	}

		  	echo "<tr>" . "<th>" . $first . "</th>" . "<th>" . $second . "</th>" .   "<th>" . $third . "</th>" . "<th>" . $forth . "</th>" . "</tr>";
		  }
		

		 ?>