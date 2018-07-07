<?php
    include("initialize.php");
    include("variables.php");
    if($admin == 0) {
        header("Location: home.php");
        die;
    }

    $msg = "";
    $title = "";
    $news = "";

    if(isset($_POST['submit'])) {
        $title = stripslashes($_POST['title']);
        $news = stripslashes($_POST['news']);
        if($_POST['title'] != null && $_POST['news'] != null) {
            date_default_timezone_set('America/Los_Angeles');
            $day = date('j');
            $month = date('n');
            $year = date('Y');

            $connect->query("INSERT INTO `news` (`day`, `month`, `year`, `title`, `news`) VALUES($day, $month, $year, '$title', '$news')");

            $msg = "News posted successfully!";
        } else {
            $msg = "Please fill out the form completely!";
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
                <h2 class="red-text section-header center">Post News</h2>
                <p>Please fill out this form to post the news!</p>
                <p class="red-text"><?= $msg; ?></p>
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <input id="title" value="<?=$title; ?>" name="title" type="text">
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l8">
                            <textarea id="news" name="news" class="materialize-textarea"><?=$news; ?></textarea>
                            <label for="news">News</label>
                        </div>
                    </div>
                    <button id="submit" name="submit" class="btn-large waves-block waves-effect waves-light center-align" type="submit" style="margin: auto;">Submit
                        <i class="material-icons left">send</i>
                    </button>
                </form>
            </div>
        </main>

        <?php include("footer.php"); ?>
        <?php include("script.php"); ?>
    </body>
</html>
