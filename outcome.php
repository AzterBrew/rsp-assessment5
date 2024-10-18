<?php
session_start();
if (isset($_SESSION['password']) && isset($_SESSION['user_name'])) {
    if (isset($_POST['selection'])) {
        $selection = $_POST['selection'];

        $compResIndex = compRandom(count($selection));
        $comchoice = $selection[$compResIndex];
        $userchoice = $_POST['action'];
        $results = res($comchoice, $userchoice, $_SESSION['user_name']);
        $userstat = " ";
        if ($results == $_SESSION['user_name']) {
            $userstat = "win";
        } elseif ($results == 'CPU') {
            $userstat = "lose";
        } else {
            $userstat = "tie";
        }
        $isTie = false;
        if ($results == "tie") {
            $isTie = true;
        }
    } else {
        echo 'no detected choice';
    }

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Results</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="bg-main">
        <header id="headermain">
            <nav class="navbar">
            <img src="./images/RockPaperScissorsLogo.png" alt="Logo" class="logo">
                <h1>RESULTS : 
                    <?php 
                    if($isTie){
                        echo "IT'S A TIE";
                    } else {
                        echo ucwords($results) . ' WON!';
                        } ?> 
                </h1>
                <a href="logout.php" id="res">Logout</a>
                <a href="main.php" id="res">Back to Start</a>
            </nav>
        </header>
        <div id="belowheader-main">
            <div class="parent">
                <div id="user" class="child">
                    <h1> USER chose <?php echo $userchoice ?> </h1>
                </div>
                <div id="cpu" class="child">
                    <h1>CPU chose <?php echo $comchoice ?> </h1>
                </div>
            </div>        
        </div>
        <?php 
            echo '<img id="img-end" src="./images/' . strtolower(htmlspecialchars($userstat)) . '.gif" alt="stat">' ; 
        ?> 
    </body>
    </html>
<?php 
} else {
    header("Location: index.php");
    exit();
}

function compRandom($max){
    $index = rand(0,$max-1);
    return $index;
}

function res($cpu,$user, $u){
    $c = 'CPU';
    $r = 'Rock'; $p = 'Paper'; $s = 'Scissors'; $h = 'Pencil';     

    if ($cpu === $user) {
        return 'tie';
    } else
    if ($user== $r) {
        if ($cpu == $p) {
            return $c;
        } else {
            return $u; //rock wins over sci and hook 
        }
    } else if ($user == $p) {
        if ($cpu == $r) {
            return $u;
        } else { 
            return $c;
        }
    } else if ($user == $s) {
        if ($cpu == $p) {
            return $u; 
        } else {
            return $c;
        }
    } else if ($user == $h) {
        if ($cpu == $p) {
            return $u;
        } else {
            return $c;
        }
    }
    return 0;
} 

?>
