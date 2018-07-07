<?php include("initialize.php"); ?>

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
                <h2 class="section-header center red-text">Forgot Password?</h2>
                <p>Fill out the form below to get started. By default, your username is your e-mail and your password is your full name that you submitted on your membership app. If you have forgotten your password, a temporary one will be emailed to you.</p>
                <form>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="text" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <button class="btn-large waves-effect waves-light center-align" type="submit" name="action">Submit
                        <i class="material-icons left">send</i>
                    </button>
                </form>
            </div>
        </main>

        <?php include("footer.php"); ?>

        <?php include("script.php"); ?>

    </body>
</html>
