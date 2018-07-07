<?php
    include("initialize.php");
    include("variables.php");
    if($admin == 0) {
        header("Location: home.php");
        die;
    }
    
    $msg = "";
    $event_name = "";
    $description = "";
    $location = "";
    $hours = "";
    $spots = "";
    $start_time = "";
    $end_time = "";
    $day = "";
    $month = "";
    $year = 2016;

    if(isset($_POST['submit'])) {
        $event_name = addslashes($_POST['name']);
        $description = stripslashes(str_replace("\n", "</br>", $_POST['description']));
        $location = addslashes($_POST['location']);
        $hours = stripslashes($_POST['hours']);
        $spots = stripslashes($_POST['spots']);
        $start_time = stripslashes($_POST['start-time']);
        $end_time = stripslashes($_POST['end-time']);
        $day = stripslashes($_POST['day']);
        $month = stripslashes($_POST['month']);
        $year = stripslashes($_POST['year']);
        if($_POST['name'] != null && $_POST['description'] != null && $_POST['location'] != null && $_POST['start-time'] != null && !(empty($_POST['start-aorp'])) && $_POST['end-time'] != null && !(empty($_POST['end-aorp'])) && $_POST['hours'] != null && $_POST['day'] != null && $_POST['month'] != null && $_POST['year'] != null) {
            $spots -= 1;
            $query = $connect->query("SELECT * FROM `activities` ORDER BY `ID` DESC LIMIT 1");
            $row = mysqli_fetch_array($query, MYSQLI_BOTH);
            $activity_id = $row['ID'] + 1;

            $saorp = "PM";
            if($_POST['start-aorp'] == "sam") {
                $saorp = "AM";
            }
            $eaorp = "PM";
            if($_POST['end-aorp'] == "eam") {
                $eaorp = "AM";
            }

            $connect->query("INSERT INTO `activities` (`ID`, `name`, `officer`, `description`, `location`, `hours`, `spots`, `closed`, `day`, `month`, `year`, `start_time`, `start_ap`, `end_time`, `end_ap`, `done`) VALUES($activity_id, '$event_name', '$name', '$description', '$location', $hours, $spots, 0, $day, $month, $year, '$start_time', '$saorp', '$end_time', '$eaorp', 0)");

            $connect->query("INSERT INTO `actuser` (`SID`, `AID`) VALUES($id, $activity_id)");

            $msg = "Event entered successfully!";
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
                <h2 class="red-text section-header center">Add an Event</h2>
                <p>Please fill out this form to add a new event to the list!</p>
                <p class="red-text"><?= $msg; ?></p>
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <input id="name" value="<?=$event_name; ?>" name="name" type="text">
                            <label for="name">Event Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l8">
                            <textarea id="description" name="description" class="materialize-textarea"><?=$description; ?></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l8">
                            <textarea id="location" name="location" class="materialize-textarea"><?=$location; ?></textarea>
                            <label for="location">Location (include address)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="start-time" value="<?=$start_time; ?>" name="start-time" type="text" length="5">
                            <label for="start-time">Start Time (i.e. 04:30)</label>
                        </div>
                        <input name="start-aorp" type="radio" value="sam" id="sam">
                        <label for="sam">AM</label>
                        <input name="start-aorp" type="radio" value="spm" id="spm">
                        <label for="spm">PM</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="end-time" value="<?=$end_time; ?>" name="end-time" type="text" length="5">
                            <label for="end-time">End Time (i.e. 05:30)</label>
                        </div>
                        <input name="end-aorp" type="radio" value="eam" id="eam">
                        <label for="eam">AM</label>
                        <input name="end-aorp" type="radio" value="epm" id="epm">
                        <label for="epm">PM</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 l4">
                            <input id="hours" value="<?=$hours; ?>" name="hours" type="text" length="3">
                            <label for="hours">Hours</label>
                        </div>
                        <div class="input-field col s6 l4">
                            <input id="spots" value="<?=$spots; ?>" name="spots" type="text" length="2">
                            <label for="spots">Spots</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 l3">
                            <input id="day" value="<?=$day; ?>" name="day" type="text" length="2">
                            <label for="day">Day (i.e. 06)</label>
                        </div>
                        <div class="input-field col s4 l3">
                            <input id="month" value="<?=$month; ?>" name="month" type="text" length="2">
                            <label for="month">Month (i.e. 12)</label>
                        </div>
                        <div class="input-field col s4 l2">
                            <input id="year" value="<?=$year; ?>" name="year" type="text" length="4">
                            <label for="year">Year</label>
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
