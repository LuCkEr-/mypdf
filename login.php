<?php
    // Init + Start session
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();

    // Redirect users to the main page if already signed in
    if (is_array($_SESSION['user'])) {
        header("Location: upload.php");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <script src="login.js"></script>
    </head>

    <body>
        <section class="section">
            <div class="columns is-mobile is-centered is-vcentered" style="height: 92.5vh">

                <div class="column is-one-fifth-fullhd is-one-third-desktop is-two-thirds-tablet is-full-mobile">
                    <div class="container">

                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    PDF Uploader
                                </p>
                            </header>

                            <div class="card-content">
                                <form id="login-form" onsubmit="return login();">
                                    <div class="field">
                                        <p class="control has-icons-left has-icons-right">
                                            <input id="login-email" class="input" type="email" required placeholder="Email">

                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="field">
                                        <p class="control has-icons-left">
                                            <input id="login-password" class="input" type="password" required placeholder="Password">

                                            <span class="icon is-small is-left">
                                              <i class="fas fa-lock"></i>
                                            </span>
                                        </p>

                                        <p id="login-error" class="help is-danger is-hidden">Invalid email/password</p>
                                    </div>

                                    <div class="field">
                                        <p class="control">
                                            <button class="button is-success">
                                                Log in
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>