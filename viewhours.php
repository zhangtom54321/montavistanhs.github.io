<?php
    include("initialize.php");
    if(!$_SESSION['user']){
        header("Location: index.php");
        die;
    }
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
                <h2 class="red-text section-header center">View Hours</h2>
                <?php
                    $so1 = $record['so1']; $so2 = $record['so2'];
                    $ju1 = $record['ju1']; $ju2 = $record['ju2'];
                    $se1 = $record['se2']; $se2 = $record['se2'];
                    $current = $row['hours'];
                    $total = $so1 + $so2 + $ju1 + $ju2 + $se1 + $se2;
                ?>
                <table class="centered white-text">
                    <thead class="red">
                        <th data-field="semester">Semester</th>
                        <th data-field="hours">Number of Hours</th>
                    </thead>
                    <tbody class="light-blue darken-3">
                        <tr><td>Current Semester</td><td><?=$current; ?></td></tr>
                        <tr><td>Sophomore 1st Semester</td><td><?=$so1; ?></td></tr>
                        <tr><td>Sophomore 2nd Semester</td><td><?=$so2; ?></td></tr>
                        <tr><td>Junior 1st Semester</td><td><?=$ju1; ?></td></tr>
                        <tr><td>Junior 2nd Semester</td><td><?=$ju2; ?></td></tr>
                        <tr><td>Senior 1st Semester</td><td><?=$se1; ?></td></tr>
                        <tr><td>Senior 2nd Semester</td><td><?=$se2; ?></td></tr>
                        <tr id="table-hover" class="light-blue darken-4"><td>Total High School Career</td><td><?=$total; ?></td></tr>
                    </tbody>
                </table>
                <p class="center">***After each semester ends, the total hours for that semester will be updated***</p>
            </div>
        </main>

        <?php include("footer.php"); ?>
        <?php include("script.php"); ?>
    </body>
</html>
