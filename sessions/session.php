<?php
session_start();

function displayMessage() {

    if (isset($_SESSION['error'])) {
        echo"<div class='alert-overlay'>
                <div class='alert alert-danger alert-dismissible fade show static-alert' role='alert' align='center' id='autoFadeAlert'>"
                . $_SESSION['error'] .
                "</div>
            </div> ";
        unset($_SESSION['error']);  // Clear message after displaying
    }

    if (isset($_SESSION['success'])) {
        echo"<div class='alert-overlay'>
                <div class='alert alert-success alert-dismissible fade show static-alert' role='alert' align='center' id='autoFadeAlert'>"
                . $_SESSION['success'] .
                "</div>
            </div> ";
        unset($_SESSION['success']);  // Clear message after displaying
    }
}


function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function logout() {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
