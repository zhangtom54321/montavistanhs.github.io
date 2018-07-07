<div id="home-navbar" class="navbar-fixed">
    <ul id="dropdown" class="dropdown-content">
        <li class="red"><a class="white-text" href="viewhours.php">View Hours</a></li>
        <li class="divider"></li>
        <li class="red"><a class="white-text" href="changepass.php">Change Password</a></li>
        <li class="divider"></li>
        <li class="red"><a class="white-text" href="logout.php">Log Out</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper light-blue darken-3">
            <a href="index.php" class="brand-logo center" style="font-weight: 600;">Monta Vista NHS</a>
            <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a id="display-name" class="dropdown-button waves-effect waves-light" data-activates="dropdown">Welcome <?=$fname ?> <?=$lname ?>!<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a class="waves-effect waves-light" href="about.php"><i class="material-icons left">description</i>About Us</a></li>
                <li><a class="waves-effect waves-light" href="officers.php"><i class="material-icons left">contacts</i>Officers</a></li>
                <li><a class="waves-effect waves-light" href="activites.php"><i class="material-icons left">location_on</i>Events</a></li>
            </ul>
            <ul id="mobile-nav" class="side-nav">

                <li><a href="activites.php"><i class="material-icons left">location_on</i>Events</a></li>
                <li><a href="about.php"><i class="material-icons left">description</i>About Us</a></li>
                <li><a href="officers.php"><i class="material-icons left">contacts</i>Officers</a></li>
                <li><a href="logout.php"><i class="material-icons left">send</i>Log Out</a></li>
            </ul>
        </div>
    </nav>
</div>
