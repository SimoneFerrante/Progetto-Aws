<?php
$hostname="localhost";
$db_name="progetto_aws";
$password="";
$username="root";
$connection = new mysqli($hostname, $username, $password, $db_name);
$response=[];
if ($connection->connect_error) {
  $response['message'] = 'Connessione Fallita';
  http_response_code(400);
  echo json_encode($response);
  die;
}
return $connection;
?>