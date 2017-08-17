<?php
session_start();
include ("includes/functions.php");

$username = $_POST["username"];
$password=$_POST["password"];
$result =  checkLoginAdmin($username, $password);
if ($result==1)
{
    $_SESSION["admin"] = $username;
}
echo $result;


?>