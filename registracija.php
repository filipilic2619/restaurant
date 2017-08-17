<?php
session_start();
include ("includes/functions.php");
$email = $_POST["email"];
$ime = $_POST["ime"];
$password = $_POST["password"];
$telefon = $_POST["telefon"];
if(registracija($ime, $email, $password, $telefon))
{
    $_SESSION["email"]=$email;
}


?>