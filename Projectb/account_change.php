<?php
session_start();
include "config.php";
$old_password = $_SESSION['password'];

if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['number']) && !empty($_POST['email']) && !empty($_POST['address'])){

$name = $_POST['name'];
$password = $_POST['password'];
$number = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['address'];

																			/////////UPDATE ROW
$sql_statement = "UPDATE user
					SET User_Name = '$name', Password = '$password', Phone_Number = '$number', Email = '$email', Address = '$address'
					WHERE Password = '$old_password'";
$result = mysqli_query($db, $sql_statement);

$_SESSION['username'] = $name;
$_SESSION['password'] = $password;

header('Location: account.php');

}else{
	echo "The form is not set.";
}
?>