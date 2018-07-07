<!DOCTYPE html>
<html>
    <head>
        <!-- Browser setup -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favi.ico" />
        <title>Monta Vista NHS</title>

        <!-- CSS, fonts, etc. -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,300italic,400italic,600italic,700italic,800italic|Raleway:400,100,200,300,500,700,600,800,900|Ubuntu:400,300,300italic,700italic,700,500,400italic,500italic|Nunito:400,300,700|Inconsolata:400,700' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="new/MVNHS/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="new/MVNHS/css/style.css" />
    </head>
    <body style="height: 100%;" class="black">
        <main>
            <a href="new/MVNHS/index.php">
                <div style="font-size: 2em; margin-left: 2em; margin-top: 1em; font-family: 'Inconsolata', sans-serif;" class="green-text section-header">
                    <div class="animated-typing" style="display: inline; width: auto; color: #00FF00;" ></div>
                </div>
            </a>
        </main>
        <!-- JS -->
        <script type="text/javascript" src="new/MVNHS/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="new/MVNHS/js/materialize.min.js"></script>
        <script type="text/javascript" src="new/MVNHS/js/typed.js"></script>
        <script type="text/javascript">
            var min = ["Welcome to the error page for MVNHS!^1000<br>I think you came here by accident...^1000<br>Click <b class=\"white-text\">here</b> to go back to the home page...^1000<br>Otherwise you would be reading this message...^1000<br>Wondering why you ever came here in the first place...^1000<br>If the website broke, then email the webmaster...^1000<br>He must have screwed up by coding too late at night...^1000<br>I wanted to talk to someone who understands me...^1000<br>Do you think you understand me?^1000<br>Rhetorical question...Don't answer that...^1000<br>Anyway I think its time that you got back to the home page...^1000<br><b>Goodbye!</b>"];

            $(document).ready(function(){
                $(".animated-typing").typed({
                    strings: min,
                    typeSpeed: 0
                });
            });
        </script>
    </body>
</html>
