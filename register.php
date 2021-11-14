<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="static/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="right-panel">
            <div class="login-section">
                <h1 class="login-heading"> Register </h1>
                <?php 
                    include "utils/debug.php";

                    $error = $_REQUEST["error"] ?? false;
                    if ($error) {
                        echo "<span class=\"error\"> *username already exists </span>";
                    }
                ?>
                <form action="user_register.php" class="login-form" method="POST">
                    <input class="input-field" type="text" name="name" id="name" placeholder="Name" required>
                    <input class="input-field" type="text" name="username" id="username" placeholder="Username" required>
                    <input class="input-field" type="password" name="password" id="password" placeholder="Password" required>
                    <input class="button login" type="submit" value="Sign-Up">
                </form>
                <button class="button register" onclick="window.location.href='login.php'">Login</button>
            </div>
        </div>
    </div>
</body>

</html>