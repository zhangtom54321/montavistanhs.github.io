<?php
    if(isset($_SESSION['user'])) {
        if($_SESSION['user']) {
            $user = $_SESSION['user'];
            $query = $connect->query("SELECT * FROM `users` WHERE `email`='$user' LIMIT 1");
            $row = mysqli_fetch_array($query, MYSQLI_BOTH);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $name = $fname . " " . $lname;
            $admin = false;
            $semester_hours = $row['hours'];
            $user = $row['email'];
            $id = $row['ID'];
            if($row['admin'] == 1) {
                $admin = true;
            }
            #$query = $connect->query("SELECT * FROM `users_record` WHERE `fname`='$fname' AND `lname`='$lname' LIMIT 1");
            #$record = mysqli_fetch_array($query, MYSQLI_BOTH);
        }
    } else {
        $id = -1;
    }
?>
