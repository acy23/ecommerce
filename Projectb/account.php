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
							<a class="nav-link" href="basket.php">Basket</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="realorders.php">Orders</a>
						</li>
					</ul>

						<span class="navbar-text">
							<a class="nav-link" href="index.html">Logout</a>
						</span>
				</div>
			</div>
		</nav>
		<style>            ///////////////////////////ACCOUNT INFORMATION///////////////////////////
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
			    <b>ACCOUNT INFORMATION</b>
			    <br>
			    <br>
			  <tr>
			    <th>ID</th>
			    <th>NAME</th>
			    <th>Password</th>
			    <th>Phone Number</th>
			    <th>Email</th>
			    <th>Address</th>
			    <th>Customer ID</th>
			  </tr>
			  <br>
			  <br>
			  </body>
			  
						
			<?php 
			include "config.php";
			
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			
			$sql_statement = "SELECT *
								FROM `user`
								WHERE `User_Name`='$username' AND `Password`='$password'";

			$result = mysqli_query($db, $sql_statement);	
			$row = mysqli_fetch_assoc($result);		
			
			  $id = $row['User_ID'];
			  $first = $row['User_Name'];
			  $second = $row['Password'];
			  $third = $row['Phone_Number'];
			  $forth = $row['Email'];
			  $fifth = $row['Address'];
			  $sixth = $row['Customer_ID'];
			  echo "<tr>" . "<th>" . $id . "</th>" . "<th>" . $first . "</th>" .   "<th>" . $second . "</th>" . "<th>" . $third . "</th>" .  "<th>" . $forth . "</th>" .  "<th>" . $fifth . "</th>" .  "<th>" . $sixth . "</th>" . "</tr>"; 
			  

		
?>
				<body>
				<div align="center">
				<br>
				CHANGE:
				<br>
				<br>
				<form action="account_change.php" method="POST">
				  <input type="text" name="name" placeholder="Enter name">
				  <input type="text" name="password" placeholder="Enter password">
				  <input type="text" name="number" placeholder="Enter phone number">
				  <input type="text" name="email" placeholder="Enter email">
				  <input type="text" name="address" placeholder="Enter address">
				  <br>
				  <button>SUBMIT</button>
				  <br>
				</form>
				</div>
				</body>

	
</html>
