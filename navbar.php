<?php
    if(isset($_SESSION['user'])) {
        if($admin) {
            include("admin-navbar.php");
        } else {
            include("login-navbar.php");
        }
    } else {
        include("normal-navbar.php");
    }
?>
