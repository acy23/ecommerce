<?php include "config.php"; ?>
<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Basket</title>

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
<br><br>
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

<div align="center">
	<form action = "basket.php" method = "post">
		<table>
			<tr>
				
				<th>Product ID</th>
	   			<th>Product Name</th>
	    		<th>Price</th>
	    		<th>Total</th>
	    		<th>Remove</th>
	    	</tr>
	    	<tr>
	    		
	    		<?php
	    		
	    		 	
	    		 	$username = $_SESSION['username'];
					$password = $_SESSION['password'];
					$myquery = "SELECT Customer_ID FROM `user` WHERE `User_Name` = '$username' AND `Password` = '$password' ";
					$resulting = mysqli_query($db, $myquery);
					$rowww = mysqli_fetch_assoc($resulting);
					$cid = $rowww['Customer_ID'];
	    			$sql = "SELECT * FROM `add_to_basket` , `product` WHERE add_to_basket.Customer_ID = '$cid' AND product.Product_ID = add_to_basket.Product_ID ";
	    			
	    			$resultt = mysqli_query($db, $sql);
	    			while ($roww = mysqli_fetch_assoc($resultt)) {
	  				
	  				$myname = $roww['Product_Name'];
	  				$myprice = $roww['Price'];
	  				$myid = $roww['Product_ID'];

	  				echo "<tr>"  . "<td>" . $myid . "</td>" . "<td>" . $myname . "</td>" . "<td>" . $myprice . "</td>" . "<td>" . 

	  				" "   .  "</td>"  . "<td>" . "<input type='submit' name='someAction' value= '$myid'>" . "</td>" . "</tr>";



	  				}
	    			
	    		?>
	    		

	    	</tr>
	    	<tr>
	    		<td>  </td>
	    		<td>  </td>
				<td>  </td>
				
				<td>
					<?php
						$thisql = "SELECT SUM(Price) AS value_sum FROM `add_to_basket` , `product` WHERE add_to_basket.Customer_ID = '$cid' AND product.Product_ID = add_to_basket.Product_ID";

						$result = mysqli_query($db, $thisql); 
						$row = mysqli_fetch_assoc($result); 
						$sum = $row['value_sum'];
						if (isset($sum)) {
							echo $sum . " " . "TL"; 
						}

						
						

					?>
				</td>

	    	</tr>

		</table>
	</form>

</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cs306_v2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$myquery = "SELECT Customer_ID FROM `user` WHERE `User_Name` = '$username' AND `Password` = '$password' ";
		$resulting = mysqli_query($db, $myquery);
		$rowww = mysqli_fetch_assoc($resulting);
		$cid = $rowww['Customer_ID'];

		$myvar = $_POST['someAction'];	
		$sql = "DELETE FROM add_to_basket WHERE Customer_ID = '$cid' AND Product_ID = '$myvar' LIMIT 1 " ;
		

		if($conn->query($sql) === TRUE){
			header('Location: basket.php');

		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
}
$conn->close();
?>


<br>
<div align="center">
<p>In order to complete the shopping and see the Orders click the 'Checkout' button ! </p
</div>

<div align="center">
	<form method="post" action="checkout.php">
    	<button name="hardestpart" type="submit">Checkout</button>
	</form>
</div>


</body>
</html>