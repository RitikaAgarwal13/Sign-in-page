<?php

$HOSTNAME ='localhost';
$USERNAME='root';
$PASSWORD='root';
$DATABASE='signupforms';

$con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$con)
    die("Could not connect".mysqli_connect_error());

?>