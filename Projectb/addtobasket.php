<?php
/*
<?php
include "config.php";

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
{
	$myvar = $_POST['someAction'];
    $sql_statement = "INSERT INTO add_to_basket (Product_ID) VALUES ('$myvar')";

    if ($conn->query($sql_statement) === TRUE) {
  		echo "New record created successfully";
	} else {
  		echo "Error: " . $sql_statement . "<br>" . $conn->error;
	}
}
?>
*/
?>

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

$sql = "INSERT INTO add_to_basket (Product_ID) VALUES ('$myvar')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>