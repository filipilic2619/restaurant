<?php
session_start();
include ("includes/functions.php");

$vreme = $_POST["vreme"];
$user = $_SESSION["email"];

$out=implode(',', rezervisaniuser($vreme, $user));

echo $out;
?>