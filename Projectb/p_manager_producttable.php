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
				<a class="navbar-brand" href="salesmanagertable.html">
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
			    <b>EDIT PRODUCTS</b>
			    <br>
			    <br>
			  <tr>
			    <th><div align="center">ID</th>
			    <th><div align="center">Name</th>
			    <th><div align="center">Price</th>
			    <th><div align="center">Avarage Rating</th>
			    <th><div align="center">Actions</th>
			    
			    
			  </tr>
			  <br>
				<div align="center">
				<br>
				ADD A PRODUCT:
				<br>
				<br>
				<form action="AddProdcutAlgo.php" method="POST">
				  <input type="text" name="id" placeholder="Enter a product id">
				  <input type="text" name="name" placeholder="Enter a product name">
				  <input type="text" name="price" placeholder="Enter the product's price">
				  <button>ADD</button>
  				  <br>
				</form>
				</div>

					

			<?php 
			
			unset($_SESSION['ManProductEditedID']);

			$username = $_SESSION["username"];
			$password = $_SESSION["password"];

	    	$_SESSION['ManProductEditID']="0";


			$sql_statement = "SELECT * FROM `product`";
			$result = mysqli_query($db, $sql_statement);	



		while($row = mysqli_fetch_assoc($result)){
			
			  $id = $row['Product_ID'];
			  $first = $row['Product_Name'];
			  $second = $row['Price'];
			  $third = $row['Average_Rating'];


			  echo "<tr>" . "<th>" . $id . "</th>" . "<th>" . $first . "</th>" .   "<th>" . $second . "</th>" . "<th>" . $third . "</th>"  .  "<th>" . "<a class = 'btn btn-success' href = 'pmanager_producttable_edit.php?ManProductEditID=$id'  role ='button' >Edit</a>"  .  "<a class = 'btn btn-danger' href = 'DeleteProdAlgo.php?deletionid=$id' role ='button'>Delete</a>" . "</th>" . "</tr>"; 
			  }


			  ?>

	<br> <br>
	<br>  <br>
	<br> THE PRODUCT LIST<br>
	<br><br>
	</body>
</html>