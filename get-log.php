<?php
include 'db_connection.php';
$response = [];
session_start();

$nickname = mysqli_real_escape_string($connection, $_POST["nickname"]);
$pass = mysqli_real_escape_string($connection, $_POST["password"]);

$sql = "SELECT id, nickname FROM users
WHERE nickname = ? AND password = SHA2(CONCAT(?, (SELECT salt FROM users WHERE nickname = ?)), 256);";

$statement = $connection->prepare($sql);

$statement->bind_param("sss", $nickname, $pass, $nickname);
$query_response = [];
$statement->bind_result($query_response['id'], $query_response['nickname']);
$statement->execute();

if ($statement->fetch()){
  $_SESSION['user_id'] = $query_response['id'];
  $_SESSION['nickname'] = $query_response['nickname'];
  $response['message'] = 'Login Riuscito';
  header('Location: home.html');
}else{
  http_response_code(400);
  $response['message'] = 'Login Fallito';
  header('Location: failed-log.php');
}
$statement->close();

echo json_encode($response);
?>