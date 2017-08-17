<?php
include ("includes/functions.php");

$vreme = $_POST["vreme"];
$sto = $_POST["sto"];

$out=info($vreme, $sto);

echo $out;
?>