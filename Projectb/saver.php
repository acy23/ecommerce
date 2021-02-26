<?php include 'config.php'; ?>
<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Products</title>
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
</head>
<body>
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

<div align="center" >
		<form action = "table.php" method="post">
			<table>
				<tr>
				<th>Product ID</th>
   				<th>Product Name</th>
    			<th>Price</th>
    			<th>Rate</th>
    			<th>BUY</th>
    			</tr>
    			<tr>
    				<td>
    				<?php
    				$sql_statement = "SELECT * FROM product";
    				$result = mysqli_query($db, $sql_statement);
					while($row = mysqli_fetch_assoc($result))
					{
						$id = $row['Product_ID'];
						$first = $row['Product_Name'];
						$second = $row['Price'];
  						$third = $row['Average_Rating'];
  						$myvar = $row['Product_ID'];
						echo "<tr>" . "<td>" . $id . "<td>" . $first . "<td>" . $second . "<td>" . $third . "</td>" .
						"<td>" . "<input type='submit' name='someAction' value= '$myvar' >" . "</td>". "</tr>";
					}
					?>
    				</td>
    			</tr>			
			</table>
		</form>	
</div>			

<p>
<?php 
//if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])){
//	$myvar = $_POST['someAction'];
//	echo " its: " . $myvar;
//}
?>

</p>


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
		
		$sql = "INSERT INTO add_to_basket (Product_ID , Customer_ID ) VALUES ('$myvar' , '$cid' )";

		if($conn->query($sql) === TRUE){
			echo "";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	


	
}
$conn->close();
?>


<br><br>
<div align="center">
<h2>Selected Item and Information</h2>
<style>
table, th, td {
  border: 1px solid black;
}

table {
  width: 65%;
}
</style>

<table class="center">
  <tr>
    <th>Item</th>
    <th>Price</th>
    <th>Prdouct ID</th>
    <th>Customer ID</th>
  </tr>
  <tr>
  	<td>
  		<?php 
  		
  		$sqll = "SELECT * FROM product WHERE Product_ID = '$myvar' "; 
  		$resultt = mysqli_query($db, $sqll); 		
  		while ($roww = mysqli_fetch_assoc($resultt)) {
  			$cid = $_SESSION['customerID'];
  			$myname = $roww['Product_Name'];
  			$myprice = $roww['Price'];
  			$myid = $roww['Product_ID'];

  			echo "<tr>" . "<td>" . $myname . "</td>" . "<td>" . $myprice . "</td>" . "<td>" . $myid . "</td>" . "<td>" . $cid . "</td>" .      "</tr>";
  		}
  		
  		?>
  	</td>	    
  </tr>

</table>
<br><br>
<form action = "basket.php">
	<a href="basket.php"> <button> Go To Basket </button>
	</a>
	

</form> 




<br><br>




</body>
</html>