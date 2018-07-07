<?php
    include("initialize.php");
    include("variables.php");

    date_default_timezone_set('America/Los_Angeles');

    $activity_id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `activities` WHERE `ID` = $activity_id LIMIT 1");
    $row = mysqli_fetch_array($query);

    if(isset($_POST['signup'])) {
        $connect->query("INSERT INTO `actuser` (`SID`, `AID`) VALUES($id, $activity_id)");
        $activity_query = $connect->query("SELECT * FROM `activities` WHERE `ID` = $activity_id LIMIT 1");
        $activity = mysqli_fetch_array($activity_query);
        $spots = $activity['spots'] - 1;
        $connect->query("UPDATE `activities` SET `spots` = $spots WHERE `ID` = $activity_id");
        header("Location: activity.php?id=$activity_id");
        die;
    }

    if(isset($_POST['cancel'])) {
        $connect->query("DELETE FROM `actuser` WHERE `SID` = $id AND `AID` = $activity_id");
        $activity_query = $connect->query("SELECT * FROM `activities` WHERE `ID` = $activity_id LIMIT 1");
        $activity = mysqli_fetch_array($activity_query);
        $spots = $activity['spots'] + 1;
        $connect->query("UPDATE `activities` SET `spots` = $spots WHERE `ID` = $activity_id");

        date_default_timezone_set('America/Los_Angeles');
        $today = date("Y-m-d");
        $activity_date = date($activity['year']."-".$activity['month']."-".$activity['day']);
        $today_time = strtotime($today);
        $activity_time = strtotime($activity_date);
        if($today_time + 604800 > $activity_time) {
            $user_query = $connect->query("SELECT * FROM `users` WHERE `ID` = $id LIMIT 1");
            $user = mysqli_fetch_array($user_query);
            $hours = $user['hours'] - 1;
            $connect->query("UPDATE `users` SET `hours` = $hours WHERE `ID` = $id");
        }
        header("Location: activity.php?id=$activity_id");
        die;
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
                <h2 class="red-text section-header center">Activity Details</h2>
                <?php
                    if(isset($_SESSION['user']) && !$_SESSION['user']) {
                        echo "<p>Please log in to sign up for this event!</p>";
                    } else {
                        $query = $connect->query("SELECT * FROM `actuser` WHERE `SID` = $id AND `AID` = $activity_id LIMIT 1");
                        if($query->num_rows == 1) {
                            echo "<p>You can view activity details or cancel the planned activity here. Please note that you can cancel a planned activity up to 24 hours before the activity or before the activity fills up. To cancel an activity after this, please contact us through e-mail. Note that if you just don't show up to an activity before contacting us, there will be consquences.</p>";
                        }
                    }
                ?>
                <h4 class="red-text">Event Name: <?=$row['name']; ?></h4>
                <p><b>Description:</b> <?=$row['description']; ?></p>
                <p><b>Location:</b> <?=$row['location']; ?></p>
                <p><b>Date:</b> <?php echo date('l jS \of F Y',mktime(0,0,0,$row['month'],$row['day'],$row['year'])); ?></p>
                <p><b>Time:</b> <?php echo "From ",$row['start_time']," ",$row['start_ap']," to ",$row['end_time']," ",$row['end_ap']; ?> (<?=$row['hours']; ?> hours)</p>
                <p><b>Officer In Charge:</b> <?=$row['officer']; ?></p>
                <p><b>Spots Left:</b> <?=$row['spots']; ?></p>
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']) {
                        $date_query = $connect->query("SELECT * FROM `activities` WHERE `ID` = $activity_id");
                        $date = mysqli_fetch_array($date_query);
                        if($date['closed'] == 0) {
                            if($query->num_rows < 1) {
                ?>
                                <form method="post" class="center">
                                    <div style="text-align: center;">
                                        <button id="signup-btn" name="signup" class="btn-large waves-effect waves-light center-align" type="submit" style="margin: auto;">
                                            Sign Up!
                                            <i class="material-icons left">done</i>
                                        </button>
                                    </div>
                                </form>
                <?php
                            } else {
                ?>
                                <form method="post" class="center">
                                    <div style="text-align: center;">
                                        <button id="cancel-btn" name="cancel" class="btn-large waves-effect waves-light center-align" type="submit" style="margin: auto;">
                                            Cancel
                                            <i class="material-icons left">not_interested</i>
                                        </button>
                                    </div>
                                </form>
                <?php
                            }
                        } else {
                            echo "<h4 class=\"center\">Event has ended!</h4>";
                        }
                    }
                ?>
            </div>
        </main>

        <?php include("footer.php"); ?>

        <?php include("script.php"); ?>
    </body>
</html>
