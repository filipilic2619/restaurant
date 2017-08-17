<?php
include ("includes/functions.php");
$json = json_encode($_POST["niz"]);

$decodedJSON = json_decode($json);

//empty1();
dodaj($decodedJSON);

?>