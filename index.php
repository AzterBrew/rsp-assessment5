<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div id="login">
        <form action="login.php" method="POST" class="indexform">
            <img src="./images/RockPaperScissorsLogo.png" alt="">
            <h2>User Login</h2>
            <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error-login">' . $_GET['error'] . '</p>';
                }
            
            ?>
            <div class="input-box">
            <label>Username</label>
            <input type="text" name="uname" placeholder="Username">
            </div>

            <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
   
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>