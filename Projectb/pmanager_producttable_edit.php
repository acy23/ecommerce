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
							<a class="nav-link" href="pmanagertable.php">Home</a>
						</li>


						<li class="nav-item">
							<a class="nav-link" href="Account_of_P_manager.php">Account</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="p_manager_producttable.php">Products</a>
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
			    <b><u>EDIT PRODUCT<u></b>
			    <br>
			    <br>
			  <tr>
			    <th><div align="center">ID</th>
			    <th><div align="center">Name<div></th>
			    <th><div align="center">Price</th>
			    <th><div align="center">Average Rating</th>
			  
			  </tr>



				<div align="center">
				<br>
				<u>INSERT NEW INFORMATIONS FOR PRODUCT<u>
				<br>
				<br>
				<form action="editinfoProductAsManager.php" method="POST">
				 <!-- <input type="text" name="id" placeholder="Enter product id">-->
				  <input type="text" name="name" placeholder="Enter product name">
				  <input type="text" name="price" placeholder="Enter product price">
				  <button>SAVE</button>
  				  <br>
				</form>
				</div>

					

			<?php 
			if(empty($_SESSION["ManProductEditedID"]))
			{$Prod_id = htmlspecialchars($_GET["ManProductEditID"]);}
			else
			{$Prod_id = $_SESSION["ManProductEditedID"];}
			$username = $_SESSION["username"];
			$password = $_SESSION["password"];

		


			$sql_statement = "SELECT * FROM `product` WHERE `Product_ID`='$Prod_id'";
			$result = mysqli_query($db, $sql_statement);	

			$row = mysqli_fetch_assoc($result);
			
			  $pid = $row['Product_ID'];
			  $name = $row['Product_Name'];
			  $price = $row['Price'];
			  $avrating = $row['Average_Rating'];

			  echo "<tr>" . "<th>" . $pid . "</th>" . "<th>" . $name . "</th>" .   "<th>" . $price . "</th>" . "<th>" . $avrating . "</th>" . "</tr>"; 
			  

			$_SESSION["specific_id"] = $pid;  
			$_SESSION["specific_name"] = $name;  
			$_SESSION["specific_price"] = $price;  


			  ?>

			  	<div align="center">
				<br>
				<br>
				<br>
				<form action="Product_manager_calculates_items_avr_rate_algo.php" method="POST">
				  <button>CALCULATE THE AVARAGE RATING</button>
  				 <br>
				 <br>
  				 <br>
  				 <br>

				</form>
				</div>

	</body>
</html>