<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php"); ?>
    </head>
    <body style="height: 100%;" class="black">
        <main>
            <a href="index.php">
                <div style="font-size: 2em; margin-left: 2em; margin-top: 1em; font-family: 'Inconsolata', sans-serif;" class="green-text section-header">
                    <div class="animated-typing" style="display: block; width: auto; color: #00FF00;" ></div>
                </div>
            </a>
        </main>
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/typed.js"></script>
        <script type="text/javascript">
            var min = ["Welcome to the error page for MVNHS!^1000<br>I think you came here by accident...^1000<br>Click <b class=\"white-text\">here</b> to go back to the home page...^1000<br>Otherwise you would be reading this message...^1000<br>Wondering why you ever came here in the first place...^1000<br>If the website broke, then email the webmaster...^1000<br>He must have screwed up by coding too late at night...^1000<br>I wanted to talk to someone who understands me...^1000<br>Do you think you understand me?^1000<br>Rhetorical question...Don't answer that...^1000<br>Anyway I think its time that you got back to the home page...^1000<br><b>Goodbye!</b>"];

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
                    strings: min,
                    typeSpeed: 0
                });
            });

            $('.slider').slider({full_width: true});
        </script>
    </body>
</html>
