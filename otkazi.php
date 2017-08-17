<?php
session_start();
include ("includes/functions.php");

$vreme = $_POST["vreme"];
$sto = $_POST["sto"];


otkazi($vreme, idConv($sto), $_SESSION["email"]);

?>