<?php
// Init + Start session
error_reporting(E_ALL & ~E_NOTICE);
session_start();

// Redirect users to the login page if not signed in
if (!is_array($_SESSION['user'])) {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Upload
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <script src="login.js"></script>
    <script src="upload.js"></script>
</head>

<body>
    <section class="section">
        <div class="columns is-mobile is-centered is-vcentered" style="height: 92.5vh">

            <div class="column is-one-quarter-fullhd is-half-desktop is-two-thirds-tablet is-full-mobile">
                <div class="container">

                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Upload new PDF
                            </p>

                            <a class="card-header-icon" aria-label="more options" onclick="logout()">
                                Log out
                                <span class="icon">
                                    <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                </span>
                            </a>
                        </header>

                        <div class="card-content">
                            <form id="upload-form" onsubmit="return upload();">

                                <div class="field">
                                    <div id="file" class="file has-name is-fullwidth">
                                        <label class="file-label">
                                            <input id="file-input" class="file-input" type="file" name="resume" onchange="onFileSelected(this)">

                                            <span class="file-cta">
                                                <span class="file-icon">
                                                    <i class="fas fa-upload"></i>
                                                </span>

                                                <span class="file-label">
                                                    Choose a file
                                                </span>
                                            </span>

                                            <span class="file-name">
                                                No file selected
                                            </span>
                                        </label>
                                    </div>

                                    <p id="upload-error" class="help is-danger is-hidden">Only PDF files are supported</p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <button id="upload-submit" class="button is-primary" disabled>
                                            Upload
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>

                        <footer class="card-footer">
                            <a href="index.html" target="_blank" class="card-footer-item">View PDF</a>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>