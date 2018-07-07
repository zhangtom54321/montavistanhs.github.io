<?php
    include("initialize.php");
    if(!$_SESSION['user']) {
        header("Location: index.php");
        die;
    }
    include("variables.php");

    date_default_timezone_set('America/Los_Angeles');
    $day = date('j');
    $month = date('n');
    $year = date('Y');
    $query = $connect->query("SELECT * FROM `activities` WHERE `closed` = 0");
    while($row = mysqli_fetch_array($query)) {
        $activity_id = $row['ID'];
        if($row['year'] < $year) {
            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
        } else if($row['month'] < $month && $row['year'] == $year) {
            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
        } else if($row['day'] < $day && $row['month'] == $month && $row['year'] == $year) {
            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
        }
    }

    $refresh = false;
    $query = $connect->query("SELECT * FROM `activities` WHERE `closed` = 1 AND `done` = 0");
    while($row = mysqli_fetch_array($query)) {
        if($row['year'] < $year || $row['year'] == $year && $row['month'] < $month || $row['year'] == $year && $row['month'] == $month && $row['day'] < $day) {
            $activity_id = $row['ID'];
            $update_query = $connect->query("SELECT * FROM `actuser` WHERE `AID` = $activity_id LIMIT 1");
            while($student = mysqli_fetch_array($update_query)) {
                $student_id = $student['SID'];
                $student_query = $connect->query("SELECT * FROM `users` WHERE `ID` = $student_id LIMIT 1");
                $student_record = mysqli_fetch_array($student_query);
                $student_hours = $student_record['hours'] + $row['hours'];
                $connect->query("UPDATE `users` SET `hours` = $student_hours WHERE `ID` = $student_id");
            }
            $connect->query("UPDATE `activities` SET `done` = 1 WHERE `ID` = $activity_id");
            $refresh = true;
        }
    }

    if($refresh) {
        header("Location: home.php");
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
            <div class="parallax-container" style="height: 400px;">
                <div class="parallax"><img src="images/filler3.jpg" class="responsive-img"></div>
            </div>
            <div class="light-blue darken-3 hide-on-large-only white-text center">
                <h2 class="section-header">Hello Ganesh Valliappan!</h2>
            </div>
            <div class="light-blue darken-3 hide-on-med-and-down">
                <div id="animation" class="white-text section-header center">
                    <div class="animated-typing" style="display: inline; width: auto;"></div>
                </div>
            </div>
            <div class="container">
                <?php
                    $user_activities = $connect->query("SELECT * FROM `actuser` WHERE `SID` = $id");
                    if($user_activities->num_rows == 0) {
                        echo "<h2 class=\"red-text center section-header\">Please Sign up for Events!</h2>";
                        echo "<p class=\"center\">Events that you have signed-up for will be displayed on the home page</p>";
                    } else {
                        echo "<h2 class=\"red-text center section-header\">Events you have signed-up for:</h2>";
                ?>
                        <table class="centered responsive-table">
                            <thead class="red white-text">
                                <th data-field="event-name">Event Name</th>
                                <th data-field="date">Date</th>
                                <th data-field="time">Time</th>
                                <th data-field="hours">Hours</th>
                                <th data-field="officer">Officer in Charge</th>
                            </thead>
                            <tbody class="light-blue darken-3 white-text">
                                <?php
                                    while($activity = mysqli_fetch_array($user_activities)) {
                                        $activity_id = $activity['AID'];
                                        $activity_query = $connect->query("SELECT * FROM `activities` WHERE `ID` = $activity_id LIMIT 1");
                                        $activity_record = mysqli_fetch_array($activity_query);
                                        echo "<tr>";
                                        echo "<td><a class=\"orange-text\" href=\"activity.php?id=",$activity_id,"\">",$activity_record['name'],"</a></td>";
                                        echo "<td>",$activity_record['month'],"/",$activity_record['day'],"/",$activity_record['year'],"</td>";
                                        echo "<td>",$activity_record['start_time']," ",$activity_record['start_ap']," - ",$activity_record['end_time']," ",$activity_record['end_ap'],"</td>";
                                        echo "<td>",$activity_record['hours'],"</td>";
                                        echo "<td>",$activity_record['officer'],"</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                <?php
                    }
                    echo "<h4 class=\"center\">You have <b class=\"";
                    if($semester_hours < 5) {
                        echo "red-text";
                    } else {
                        echo "green-text";
                    }
                    echo "\">",$semester_hours,"</b> hours this semester!</h4>";
                ?>
                <p class="center">You need at least 5 hours each semester to be an active member</p>
            </div>
        </main>

        <div id="typed-strings" class="hide">
            <p>^750Welcome <?=$fname ?> <?=$lname ?>!</p>
        </div>

        <?php include("footer.php"); ?>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/typed.js"></script>
        <script type="text/javascript">
            var min = ["Hello^500 Ganesh Valliappan!"];

            $(document).ready(function(){
                $('.parallax').parallax();
                $('.modal-trigger').leanModal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .9, // Opacity of modal background
                    in_duration: 300, // Transition in duration
                    out_duration: 200, // Transition out duration
                });
                $(".button-collapse").sideNav();
                $(".animated-typing").typed({
                    stringsElement: $('#typed-strings'),
                    typeSpeed: 0
                });
            });
            $('.slider').slider({full_width: true});
        </script>
    </body>
</html>
