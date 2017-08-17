<?php
session_start();
include ("includes/functions.php");

$email = $_POST["email"];
$password=$_POST["password"];
$result =  checkLogin($email, $password);
if ($result==1)
{
    $_SESSION["email"] = $email;
}
echo $result;


?>