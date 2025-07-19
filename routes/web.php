<?php
    require_once __DIR__ . "/../app/controllers/AuthController.php";

    $authController = new AuthController();
    
    $requestedUri = explode('?',$_SERVER["REQUEST_URI"]);
    // echo $requestedUri[0];
    // exit;

    if ($_SERVER["REQUEST_URI"] === "/public/register.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/register.php" || $_SERVER["REQUEST_URI"] === "/register.php" ) {
        $authController->register();
    } elseif ($_SERVER["REQUEST_URI"] === "/public/login.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/login.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/" ) {
        $authController->login();
    } elseif ($_SERVER["REQUEST_URI"] === "/public/logout.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/logout.php"  ) {
        $authController->logout();
    } elseif ($_SERVER["REQUEST_URI"] === "/public/index.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/index.php" ) {
        $authController->login();
    }elseif ($_SERVER["REQUEST_URI"] === "/public/forgot-password.php" || $_SERVER["REQUEST_URI"] === "/atlas-inventus/public/forgot-password.php" ) {
        $authController->forgotPassword();
    } elseif ($requestedUri[0] === "/public/reset-password.php" || $requestedUri[0]  === "/atlas-inventus/public/reset-password.php" ) {
        $authController->resetPassword();
    }else {
            require_once __DIR__ . "/../app/views/login.php";
        }
?>
