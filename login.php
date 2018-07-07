<?php
    include("initialize.php");
    if(isset($_SESSION['user'])){
        header("Location: home.php");
        die;
    }
    include("variables.php");

    $msg = "";
    if(isset($_POST['login'])) {
        if($_POST['user'] != null && $_POST['pass'] != null) {
            $user = stripslashes($_POST['user']);
            $pass = sha1(stripslashes($_POST['pass']));
            $query = $connect->query("SELECT * FROM `users` WHERE `email`='$user' AND `pass` = '$pass' LIMIT 1");
            if($query->num_rows > 0) {
                $row = mysqli_fetch_array($query, MYSQLI_BOTH);
                $_SESSION['user'] = $row['email'];
                header("Location: home.php");
                die;
            } else {
                $msg = "Invalid email or password!";
            }
        } else {
            $msg = "Please enter your email and password!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbar.php"); ?>
        </header>

        <main>
            <div class="container">
                <h2 class="center red-text section-header">Login</h2>
                <form method="post" class="center">
                    <div class="row">
                        <div class="input-field col s12 m6 offset-l3">
                            <i class="material-icons prefix">email</i>
                            <input id="user" name="user" type="text" class="validate">
                            <label for="user">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 offset-l3">
                            <i class="material-icons prefix">label</i>
                            <input id="pass" name="pass" type="password" class="validate">
                            <label for="pass">Current Password</label>
                        </div>
                    </div>
                    <p class="red-text center"><?=$msg; ?></p>
                    <div style="text-align: center;">
                        <button id="login-btn" name="login" class="btn-large waves-effect waves-light center-align" type="submit" style="margin: auto;">Login
                            <i class="material-icons left">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <?php include("footer.php"); ?>
        <?php include("script.php"); ?>
    </body>
</html>
