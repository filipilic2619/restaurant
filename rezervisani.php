<?php
include ("includes/functions.php");

$vreme = $_POST["vreme"];

$out=implode(',', rezervisani($vreme));

echo $out;
?>