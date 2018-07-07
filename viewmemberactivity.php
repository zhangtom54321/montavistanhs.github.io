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
                <h2 class="red-text section-header center">View Member Activity</h2>
                <div id="table">
                    <table class="centered responsive-table white-text">
                        <thead class="red">
                            <tr>
                                <th data-field="ID">ID</th>
                                <th data-field="fname">First Name</th>
                                <th data-field="lname">Last Name</th>
                                <th data-field="current-hours">Current Sem</th>
                                <th data-field="so1">Soph 1st</th>
                                <th data-field="so2">Soph 2nd</th>
                                <th data-field="ju1">Juni 1st</th>
                                <th data-field="ju2">Juni 2nd</th>
                                <th data-field="se1">Seni 1st</th>
                                <th data-field="se2">Seni 2nd</th>
                                <th data-field="total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $color = "green";
                                $query1 = $connect->query("SELECT * FROM `users_record` ORDER BY `ID` ASC");
                                $query2 = $connect->query("SELECT * FROM `users` ORDER BY `ID` ASC");
                                while($row = mysqli_fetch_array($query1)) {
                                    $current = mysqli_fetch_array($query2);
                                    echo "<tr class='light-blue darken-3'>";
                                    echo "<td>",$row['ID'],"</td>";
                                    echo "<td>",$row['fname'],"</td>";
                                    echo "<td>",$row['lname'],"</td>";
                                    if($current['hours'] >= 5)
                                        $color = "green";
                                    else
                                        $color = "red";
                                    echo "<td class='",$color,"'>",$current["hours"],"</td>";
                                    $total = 0;
                                    for($i = 4; $i <= 9; $i++) {
                                        if($row['start_sem'] + 3 > $i) {
                                            echo "<td class='black'>0</td>";
                                        } else if($row[$i] == 0 && $i != 9 && $row[$i + 1] == 0 || $i == 9 && $row[$i] == 0) {
                                            echo "<td class='grey'>0</td>";
                                        }
                                        else {
                                            if($row[$i] >= 5)
                                                $color = "green";
                                            else
                                                $color = "red";
                                            echo "<td class='",$color,"'>",$row[$i],"</td>";
                                        }
                                        $total += $row[$i];
                                    }
                                    echo "<td class='amber darken-3'><b>",$total,"</b></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="center">
                    <a class="btn waves-effect waves-light" onclick="Materialize.showStaggeredList('#staggered-legend')"><i class="left material-icons">info</i>What do the colors mean?</a>
                    <ul id="staggered-legend" class="staggered-list">
                        <li><b class="green-text">Green</b>: Met requirements</li>
                        <li><b class="red-text">Red</b>: Did not meet requirements</li>
                        <li><b class="amber-text text-darken-3">Orange</b>: Total hours over high school career</li>
                        <li><b class="grey-text">Grey</b>: Future semester</li>
                        <li><b>Black</b>: Was not part of NHS yet</li>
                    </ul>
                </div>
            </div>
        </main>

        <?php include("footer.php"); ?>
        <?php include("script.php"); ?>
    </body>
</html>
