<?php
$hostname="localhost";
$username="root";
$password="";
$database="progetto_aws";

$connection=new mysqli($hostname,$username,$password,$database);

if ($connection->connect_error) {
  die("Processo fallito: " . $connection->connect_error);
} 
?>