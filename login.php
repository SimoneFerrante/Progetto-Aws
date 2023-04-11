<?php
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>
        <form action="get-log.php" method="post">
            <input type="text" name="nickname" placeholder="Nickname" required/><br>
            <input type="password" name="password" placeholder="Password" required/><br>
            <input type="submit"/><br>
        </form>
    </body>
</html>