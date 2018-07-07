<?php
    include("initialize.php");
    include("variables.php");
    if($admin == 0) {
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
            <div class="container">
                <h2 class="center red-text section-header">View/Edit Events</h2>
                <p>Click on an event name to edit its details.</p>
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
                            $query = $connect->query("SELECT * FROM `activities` ORDER BY `ID`");
                            while($row = mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td><a class=\"orange-text\" href=\"editactivity.php?id=",$row['ID'],"\">",$row['name'],"</a></td>";
                                echo "<td>",$row['month'],"/",$row['day'],"/",$row['year'],"</td>";
                                echo "<td>",$row['start_time'],$row['start_ap']," - ",$row['end_time'],$row['end_ap'],"</td>";
                                echo "<td>",$row['hours'],"</td>";
                                echo "<td>",$row['spots'],"</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>

        <?php include("footer.php"); ?>
        <?php include("script.php"); ?>
    </body>
</html>
