<?php
session_start();
include ("includes/functions.php");
echo getIme($_SESSION["email"]);

?>