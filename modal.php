<?php
    $msg = "";
    if(isset($_POST['login'])) {
        if($_POST['user'] != null && $_POST['pass'] != null) {
            $user = stripslashes($_POST['user']);
            $pass = sha1(stripslashes($_POST['pass']));
            $query = $connect->query("SELECT * FROM `users` WHERE `email`='$user' AND `pass` = '$pass' LIMIT 1");
            if($query->num_rows > 0){
                $row = mysqli_fetch_array($query, MYSQLI_BOTH);
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $row['ID'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['pass'] = $pass;
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

<div id="login" class="modal">
    <p class="red-text"><?=$msg; ?></p>
    <form class="row" method="post">
        <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="user" type="text" name="user" class="validate">
            <label for="user">Email</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">label</i>
            <input id="pass" type="password" name="pass" class="validate">
            <label for="pass">Password</label>
        </div>
        <div style="text-align: center;">
            <button class="btn-large waves-effect waves-light center-align" type="submit" name="login" style="margin: auto;">Login
                <i class="material-icons left">send</i>
            </button>
            <a class="btn-large waves-effect waves-light center-align" href="forgotpass.php" style="margin: auto;"><i class="material-icons left">lock</i>Forgot password?</a>
        </div>
    </form>
</div>

<div id="register" class="modal">
    <h5 class="center">Come to the next NHS meeting and talk to one of the officers to sign up!</h5>
</div>
