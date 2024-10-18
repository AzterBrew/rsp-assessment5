<?php
session_start();

if (isset($_SESSION['password']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main</title>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body class="bg-main">
        <header id="headermain">
            <nav class="navbar">
                <img src="./images/RockPaperScissorsLogo.png" alt="Logo" class="logo">
                <h1>Let's play ROCK, PAPER, SCISSORS</h1>
                <a href="logout.php" id="in">Logout</a>
            </nav>

        </header>

            <div id="belowheader-main">
                <div class="blackboard-background">
                    <img src="./images/blackboard.png" alt="Blackboard" class="blackboard">
                </div>
                <h2>Hello, <?php echo ucwords($_SESSION['user_name']); ?></h2>
            </div>
            <div id="choices">
                
                <label id="lblch">Choose only three available actions:</label>
            </div>
            <form action="action.php" method="POST">
                <div class="action">
                    <label><input type="checkbox" name="act[]" value="Rock">Rock</label>

                </div>
                <div class="action">
                    <label><input type="checkbox" id="act[]" name="act[]" value="Paper">Paper</label>

                </div>
                <div class="action">
                    <label><input type="checkbox" id="act[]" name="act[]" value="Scissors">Scissors</label>

                </div>
                <div class="action">
                    <label><input type="checkbox" id="act[]" name="act[]" value="Pencil">Pencil</label>
                </div>
                <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error"> * ' . $_GET['error'] . ' *</p>';
                    }
                ?>
                <button type="submit" value="submit">Proceed</button>
            </form>
        </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}

?>