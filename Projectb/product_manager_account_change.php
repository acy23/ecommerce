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

$sql_statement = "UPDATE product_manager
					SET P_Manager_Name = '$name', P_Manager_Password = '$password', P_Manager_Email = '$email'
					WHERE P_Manager_Password = '$old_password'";
$result = mysqli_query($db, $sql_statement);

$_SESSION['username'] = $name;
$_SESSION['password'] = $password;

header('Location: Account_of_P_manager.php');

}else{
header('Location: Account_of_P_manager.php');
}
?>