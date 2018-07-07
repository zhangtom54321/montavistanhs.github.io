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
                <h2 class="center red-text section-header">Meet the Officers</h2>
                <div class="row">
                    <?php
                        $query = $connect->query("SELECT * FROM `officers`");
                        $count = 1;
                        while($officer = mysqli_fetch_array($query)) {
                            $officer_name = $officer['fname']." ".$officer['lname'];
                            $picture = "images/".strtolower($officer['fname']).".jpg";
                            if(!file_exists($picture)) {
                                $picture = "images/default.jpg";
                            }
                    ?>
                    <div class="col s12 m6 l4">
                        <div class="card large">
                            <div class="card-image waves-effect waves-block waves-light">
                                <?php
                                    echo "<img class=\"activator responsive-img\" src=\"",$picture,"\">";
                                ?>
                            </div>
                            <div class="card-content red white-text">
                                <span class="card-title activator white-text"><?=$officer_name; ?><i class="material-icons right">more_vert</i></span>
                                <p><?=$officer['job']; ?></p>
                            </div>
                            <div class="card-reveal light-blue darken-3 white-text">
                                <span class="card-title"><?=$officer_name; ?><i class="material-icons right">close</i></span>
                                <p><?=$officer['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

        <?php include("footer.php"); ?>

        <?php include("script.php"); ?>
    </body>
</html>
