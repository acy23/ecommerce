<?php
session_start(); // Right at the top of your script
?>
<?php include "config.php"; ?>

<?php
$old_password = $_SESSION['password'];

if(!empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['email'])){

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql_statement = "UPDATE sales_manager
					SET S_Manager_Name = '$name', S_Manager_Password = '$password', S_Manager_Email = '$email'
					WHERE S_Manager_Password = '$old_password'";
$result = mysqli_query($db, $sql_statement);

$_SESSION['username'] = $name;
$_SESSION['password'] = $password;

header('Location: Account_of_sales_manager.php');

}else{
header('Location: Account_of_sales_manager.php');
}
?>