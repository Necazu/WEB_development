<?php
$hostname = "localhost";
$username = "root";
$password = "";
$bd = "ciudatenii";

$conexiune = mysqli_connect($hostname,$username,$password)
or die ("<<<Eroare 1>>>");

$baza_date = mysqli_select_db($conexiune,$bd)
or die ("<<<Eroare 2>>>");
?>