<?php
session_start();

if (isset($_POST['act']) && !empty($_POST['act'])) {
    $aActions = $_POST['act'];
    if (count($aActions) == 3) {
        $_SESSION['actions'] = $aActions;
        header("Location: fight.php");
        exit();
    }
    header("Location: main.php?error=Select 3 to proceed");
    exit();
    // Now you can process the selected actions
    
} else {
    // Handle the case where no checkboxes were selected
    header("Location: main.php?error=Please select actions");
    exit();
}
