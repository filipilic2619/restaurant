<?php
session_start();
include ("includes/functions.php");

$vreme = $_POST["vreme"];
$sto = $_POST["sto"];
$user = $_SESSION["email"];
echo $user;
rezervisi($vreme, idConv($sto), $user);

?>