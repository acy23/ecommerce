<?php
session_start(); // Right at the top of your script
?>

<?php


include "config.php";


if (isset($_POST['inputUsername']) && isset($_POST['inputPassword']))
{
	$username = $_POST['inputUsername'];
	$password = $_POST['inputPassword'];

	$sql_statement = 	"SELECT *
						FROM `user`
						WHERE `User_Name`='$username' AND `Password`='$password'";
	$result = mysqli_query($db, $sql_statement);	
	$row = mysqli_fetch_assoc($result);		
	$id = $row['User_ID'];


	$sql_statement = 	"SELECT *
						FROM `product_manager`
						WHERE `P_Manager_Name`='$username' AND `P_Manager_Password`='$password'";
	$result = mysqli_query($db, $sql_statement);	
	$row = mysqli_fetch_assoc($result);		
	$id2 = $row['P_Manager_ID'];


	$sql_statement = 	"SELECT *
						FROM `sales_manager`
						WHERE `S_Manager_Name`='$username' AND `S_Manager_Password`='$password'";
	$result = mysqli_query($db, $sql_statement);	
	$row = mysqli_fetch_assoc($result);		
	$id3 = $row['S_Manager_ID'];


	if(isset($id)){
		
		$sql_statement = 	"SELECT *
						FROM `user`
						WHERE `User_Name`='$username' AND `Password`='$password'";
		$result = mysqli_query($db, $sql_statement);	
		$row = mysqli_fetch_assoc($result);	
		$address = $row['Address'];
		$CID = $row['Customer_ID'];
		$_SESSION['address'] = $address;
		$_SESSION['customerID'] = $CID;
		

		$_SESSION['logged']=true;
  		$_SESSION['username']=$username;
  		$_SESSION['password']=$password;
		header ('Location: table.php');
	}
	else if(isset($id2)) {
		$_SESSION['logged']=true;
  		$_SESSION['username']=$username;
  		$_SESSION['password']=$password;

  		$sql_statement = "SELECT *
								FROM `product_manager`
								WHERE `P_Manager_Name`='$username' AND `P_Manager_Password`='$password'";

			$result = mysqli_query($db, $sql_statement);	
			$row = mysqli_fetch_assoc($result);		
			
			$_SESSION['idOfManager'] = $row['P_Manager_ID'];


		header ('Location: pmanagertable.php');
	}

	else if(isset($id3))
	{
		$_SESSION['logged']=true;
  		$_SESSION['username']=$username;
  		$_SESSION['password']=$password;

  		$sql_statement = "SELECT *
						FROM `sales_manager`
						WHERE `S_Manager_Name`='$username' AND `S_Manager_Password`='$password'";

		$result = mysqli_query($db, $sql_statement);	
		$row = mysqli_fetch_assoc($result);		
			
		$_SESSION['id_Sales_Manager'] = $row['S_Manager_ID'];




		header ('Location: sales_manager_table.php');
	}
	else{
		header ('Location: index.php');
	}

}


	?>

