<?php

// Init + Start session
error_reporting(E_ALL & ~E_NOTICE);
session_start();

// Redirect users to the login page if not signed in
if (!is_array($_SESSION['user'])) {
    header("Location: login.php");
    die();
}

if (isset($_FILES['file']['tmp_name'])) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);

    if ($mime == 'application/pdf') {
        //Its a doc format do something
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/main.pdf');
        echo "OK";
    } else {
        echo "INVALID";
    }

    finfo_close($finfo);
} else {
    echo "ERR";
}
