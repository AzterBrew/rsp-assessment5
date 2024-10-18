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
            $userstat = "win.png";
        } elseif ($results == 'CPU') {
            $userstat = "lose.gif";
        } else {
            $userstat = "tie.jpg";
        }
        $isTie = false;
        if ($results == 'tie') {
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
                <h1>RESULTS : 
                    <?php 
                    if($isTie){
                        echo "IT'S A TIE";
                    } else {
                        echo ucwords($results) . ' WON!';
                        } ?> 
                </h1>
                <a href="logout.php">Logout</a>
                <a href="main.php">Back to Start</a>
            </nav>
        </header>
        <div id="belowheader-main">
            <div class="parent">
                <div id="user" class="child">
                    <h1><?php echo ucwords($_SESSION['user_name']); ?> chose <?php echo $userchoice ?> </h1>
                </div>
                <div id="cpu" class="child">
                    <h1>CPU chose <?php echo $comchoice ?> </h1>
                    <!-- <img src=" " alt=""> -->
                </div>
            </div>        
        </div>
        <?php 
            echo '<img id="img-end" src="./images/' . strtolower(htmlspecialchars($userstat)) . '" alt="stat">' ; 
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
    $r = 'Rock'; $p = 'Paper'; $s = 'Scissors'; $h = 'Hook';     

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
        } else { //paper loses to sci and hook
            return $c;
        }
    } else if ($user == $s) {
        if ($cpu == $p) {
            return $u; 
        } else {
            return $c;
        }
    } else if ($user == $h) {
        if ($cpu == $r) {
            return $c;
        } else {
            return $u;
        }
    }
    // r > sc && h
    // s > p
    // p > r
    // h > p && s


    return 0;
} 

?>
