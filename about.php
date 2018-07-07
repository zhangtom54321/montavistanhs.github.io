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
                <h2 class="center red-text section-header">About Us</h2>
                <h4 class="red-text">What is the National Honor Society?</h4>
                <p>The National Honor Society (NHS) and National Junior Honor Society (NJHS) are the nation's premier organizations established to recognize outstanding high school and middle level students. More than just an honor roll, NHS and NJHS serve to honor those students who have demonstrated excellence in the areas of Scholarship, Leadership, Service, and Character (and Citizenship for NJHS). These characteristics have been associated with membership in the organization since their beginnings in 1921 and 1929.<br>
                Today, it is estimated that more than one million students participate in activities of the NHS and NJHS. NHS and NJHS chapters are found in all 50 states, the District of Columbia, Puerto Rico, many U.S. Territories, and Canada. Chapter membership not only recognizes students for their accomplishments, but challenges them to develop further through active involvement in school activities and community service.<br>
                To learn more about the National Honor Society go to <a href="http://www.nhs.us/">http://www.nhs.us/</a></p>
                <h4 class="red-text">How do I apply?</h4>
                <p>To join NHS, you must apply during the one-week membership drive period at the beginning of each semester. You cannot apply after the week is over. Freshmen may not apply for their NHS membership. Sophomores may apply for their NHS membership at the beginning of their first semester at Monta Vista. You must re-apply for membership each and every semester. To qualify, you must have a GPA of 3.3 or higher.</p>
                <h4 class="red-text">What are the club requirements?</h4>
                <p>To be eligible to wear NHS insignia at graduation, seniors must be active NHS members in their graduating semester. A senior is active if they earn at least 5 community service hours (after accounting for deductions for missed meetings and activities) by the end of March in the last semester before graduation.<br>
                For any semester before the final semester, a member is active if they earn at least 5 community service hours during the semester (after accounting for deductions for missed meetings and activities).<br>
                Members must have also paid membership dues in order to be counted as active for the semester. If you owe us membership fees for a prior semester, you must pay us before end of March to receive your NHS insignia.</p>
                <div class="center">
                    <a class="btn waves-effect waves-light" onclick="Materialize.showStaggeredList('#staggered-rewards-list')"><i class="left material-icons">grade</i>Show me the rewards!</a>
                    <ul id="staggered-rewards-list" class="staggered-list">
                        <li><b>Honorary Member: certificate (active 1-2 semesters)</b></li>
                        <li><b>Life Member: stole and certificate (active 5-6 semesters)</b></li>
                    </ul>
                </div>
                <h4 class="red-text">When are the meetings?</h4>
                <p>We have mandatory meetings periodically throughout each semester (usually during tutorial on the first Thursday of each month). If you miss a meeting, you will be penalized with a one-hour deduction.<p>
                <h4 class="red-text">How do I contact the club?</h4>
                <p>Here's how you can get in contact with us if you have any questions, comments, or suggestions about Monta Vista National Honor Society or any upcoming activities.<br>Club email address: <a href="mailto:mvnhsofficers@gmail.com">mvnhsofficers@gmail.com</a></p>
            </div>
        </main>


        <?php include("footer.php"); ?>

        <?php include("script.php"); ?>
    </body>
</html>
