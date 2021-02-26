<?php include "config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<meta charset="utf-8">
		
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
					</ul>

						<span class="navbar-text">
							<a class="nav-link" href="index.html">Logout</a>
						</span>
					
				</div>
			</div>
		</nav>
<style>
{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<br>
<div align="center">

</div>

<div align="center">
	<h2>Orders</h2>
	<br>
	<br>
	<p>Here are your past orders.</p><br>
	<table>
				<tr>
				<th>Costumer ID</th>
				<th>Product ID</th>
   				<th>Product Name</th>
   				<th>Price</th>
    			</tr>
    			<tr>
    				
    				<?php
    				$customerID = $_SESSION['customerID'];
    				$sql_statement = "SELECT add_to_basket_v2.Customer_ID , add_to_basket_v2.Product_ID, product.Product_ID , product.Product_Name, product.Price FROM add_to_basket_v2 , product WHERE add_to_basket_v2.Product_ID = product.Product_ID AND add_to_basket_v2.Customer_ID = '$customerID'  ";
    				$result = mysqli_query($db, $sql_statement);
					while($row = mysqli_fetch_assoc($result))
					{
						$id = $row['Product_ID'];
						$name = $row['Product_Name'];
						$price = $row['Price'];
  						
						echo "<tr>" . "<td>" . $customerID . "<td>" . $id . "<td>" . $name . "<td>" . $price . "</td>" .
						 "</tr>";
					}
					?>
    				
    			</tr>			
			</table>
</div>
<br><br>
<div>
<form action="leavecomment.php" method="post">
 <div align="center">
 <p>Select product to evaluate: &nbsp 

  <?php 
  	$customerID = $_SESSION['customerID'];
  	$sql = "SELECT DISTINCT Product_ID FROM add_to_basket_v2 WHERE Customer_ID = '$customerID'  ";
  	$result = mysqli_query($db, $sql);
  	while($row = mysqli_fetch_assoc($result)){
  		$id = $row['Product_ID'];
		echo "<input type='radio' name='selectedprod' value = '$id' >"  .  "<label>" . $id . "&nbsp" . "&nbsp" . "</label>" ;

	}
  ?>
  	
</p>
</div>

<div align="center">
<p>Comment</p>
<input id = "comment" type="textarea" size="50" name="comment"><br>
<p>Rate</p>
<input id = "comment" type="number" min="1" max="10" name="rate">
<input type =  "submit" value = "Submit"  >





<br>


</form>
</div>



</body>
</html>