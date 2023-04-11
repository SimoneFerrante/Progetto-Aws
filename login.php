<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <form action="get-log.php" method="post">
                <div class="form-group">
                    <input type="text" name="nickname" placeholder="Nickname" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" required/>
                </div>
                <input type="submit" class="btn"/>
            </form>
        </div>
    </body>
</html>