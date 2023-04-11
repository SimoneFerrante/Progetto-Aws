<?php
  $username = mysqli_real_escape_string($db, $_POST["nickname"]);
  $pass = mysqli_real_escape_string($db, $_POST["password"]);
  $sql = "SELECT id,nickname FROM users WHERE nickname = ? AND password = SHA2(CONCAT(?, (SELECT salt FROM users WHERE nickname = ?)), 256);";
  $stmt = $db->prepare($sql);
  
  $stmt->bind_param("sss", $nickname, $password, $nickname);
  $stmt->bind_result($nickname);
  $stmt->execute();
  if ($stmt->fetch())
    echo "<p>Bentornato: {$nickname}</p>";
  else
    echo "<p>Login Fallito</p>";
  $stmt->close();
?>