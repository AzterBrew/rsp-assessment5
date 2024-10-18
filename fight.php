<?php
session_start();
if (isset($_SESSION['password']) && isset($_SESSION['user_name'])) {
    if (isset($_SESSION['actions'])) {
        $selection = $_SESSION['actions'];
        $amt = count($selection);
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Fight!</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body class="bg-fight">
            <header id="headerfight">
                <nav class="navbar">
            <img src="./images/RockPaperScissorsLogo.png" alt="Logo" class="logo">

                    <h1>Fight against Computer with 
                        <?php 
                            $i = 0;
                            foreach($selection as $choice){
                                if($i < $amt-1) {
                                    echo strtoupper($choice . ", ");
                                } 
                                if ($i == $amt-1){
                                    echo 'and ' . strtoupper($choice);
                                    break;
                                }
                                $i++;

                            }  
                        ?>
                    </h1>
                    <a href="logout.php" id="in">Logout</a>
                    <a href="main.php" id="in">Back to Start</a>
                </nav>

            </header>

            <div id="belowheader-fight">
                    <h2>Time to pick, <?php echo ucwords($_SESSION['user_name']); ?> </h2>
                </div>
                <div id="choices">
                    <label> Choose what to fight against the computer : </label>
                </div>

            <form action="outcome.php" method="POST">
                    <?php 

                    foreach ($selection as $choice){
                        //for hidden value selection arrays
                        echo '<input type="hidden" name="selection[]" value="' . htmlspecialchars($choice) . '">';
                        //for generating image and selection based on previously chosen
                        echo '<button type="submit" class="img-btn" name="action" value="' . htmlspecialchars($choice) . '">'
                        . '<img src="./images/'. strtolower(htmlspecialchars($choice)) . '.png" alt="'. strtolower(htmlspecialchars($choice)) .'"> <p>'
                        . htmlspecialchars($choice) .
                        '</p> </button>';
                    }
                    ?>
                    
                </form>

        </body>
        </html>         
    <?php    
    }

} else {
    header("Location: index.php");
    exit();
}
    ?>