<?php
    include("initialize.php");
    include("variables.php");
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
                <h2 class="center red-text section-header">Volunteer Opportunities</h2>
                <?php
                    date_default_timezone_set('America/Los_Angeles');
                    $day = date('j');
                    $month = date('n');
                    $year = date('Y');
                    $query = $connect->query("SELECT * FROM `activities` WHERE `closed` = 0");
                    while($row = mysqli_fetch_array($query)) {
                        $activity_id = $row['ID'];
                        if($row['year'] < $year)
                            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
                        else if($row['month'] < $month && $row['year'] == $year)
                            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
                        else if($row['day'] < $day && $row['month'] == $month && $row['year'] == $year)
                            $connect->query("UPDATE `activities` SET `closed` = 1 WHERE `ID` = $activity_id");
                    }
                    $query = $connect->query("SELECT * FROM `activities` WHERE `closed` = 0 ORDER BY `ID`");
                    if($query->num_rows < 1) {
                        echo "<h4 class=\"center\">Sorry, no events at this time!</h4>";
                    } else { ?>
                        <p>Click on an event name to sign-up for it or to see a brief description of it.</p>
                        <table class="centered responsive-table">
                            <thead class="red white-text">
                                <th data-field="name">Event Name</th>
                                <th data-field="date">Date</th>
                                <th data-field="time">Time</th>
                                <th data-field="hours">Hours</th>
                                <th data-field="spots">Spots</th>
                            </thead>
                            <tbody class="light-blue darken-3 white-text">
                                <?php
                                    while($row = mysqli_fetch_array($query)) {
                                        echo "<tr>";
                                        echo "<td><a class=\"orange-text\" href=\"activity.php?id=",$row['ID'],"\">",$row['name'],"</a></td>";
                                        echo "<td>",$row['month'],"/",$row['day'],"/",$row['year'],"</td>";
                                        echo "<td>",$row['start_time'],$row['start_ap']," - ",$row['end_time'],$row['end_ap'],"</td>";
                                        echo "<td>",$row['hours'],"</td>";
                                        echo "<td>",$row['spots'],"</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    } ?>
            </div>
        </main>

        <?php include("footer.php"); ?>

        <?php include("script.php"); ?>
    </body>
</html>
