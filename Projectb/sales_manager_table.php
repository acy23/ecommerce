<?php
session_start(); // Right at the top of your script
?>

<?php include "config.php";?>

<!doctype html>

<form action="userCheck.php" method="POST">
<select name="username">

<form action="userCheck.php" method="POST">
<select name="password">

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
							<a class="nav-link" href="#">Home</a>
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
						

	</body>
</html>

<?php 
	
	
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];

	echo  "<p><center>Welcome back $username .</center></p>"  . "<p><center>Please select a menu to proceed...</center></p>";

?>