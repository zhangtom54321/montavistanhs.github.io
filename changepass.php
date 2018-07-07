<?php
    include("initialize.php");
    if(!$_SESSION['user']){
        header("Location: index.php");
        die;
    }
    include("variables.php");

    $msg = "";
    if(isset($_POST['change-btn'])) {
        if($_POST['current-password'] != null && $_POST['password1'] != null && $_POST['password2'] != null) {
            $pass = sha1(stripslashes($_POST['current-password']));
            $query = $connect->query("SELECT * FROM `users` WHERE `email`='$user' AND `pass` = '$pass' LIMIT 1");
            if($query->num_rows > 0) {
                if($_POST['password1'] == $_POST['password2']) {
                    $password_hash = sha1($_POST['password2']);
                    $connect->query("UPDATE `users` SET `pass` = '$password_hash' WHERE `email` = '$user' AND `pass` = '$pass'");
                    $msg = "Password updated!";
                } else {
                    $msg = "The new passwords do not match!";
                }
            } else {
                $msg = "Invalid email or password!";
            }
        } else {
            $msg = "Please complete the form! ".$_POST['user']." ".$_POST['current-password']." ".$_POST['password1']." ".$_POST['password2'];
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
                <h2 class="center red-text section-header">Change Password</h2>
                <p>Please fill out this form to change your password.</p>
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">email</i>
                            <input disabled id="user" name="user" type="text" class="validate" value="<?=$user; ?>">
                            <label for="user">Email</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">label</i>
                            <input id="current-password" name="current-password" type="password" class="validate">
                            <label for="current-password">Current Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">lock</i>
                            <input id="password1" name="password1" type="password" class="validate">
                            <label for="password1">New Password</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">lock</i>
                            <input id="password2" name="password2" type="password" class="validate">
                            <label for="password2">Retype New Password</label>
                        </div>
                    </div>
                    <p class="red-text"><?=$msg; ?></p>
                    <div style="text-align: center;">
                        <button id="change-btn" name="change-btn" class="btn-large waves-effect waves-light center-align" type="submit" style="margin: auto;">Change Password
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
