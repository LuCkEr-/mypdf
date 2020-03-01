<?php
// Init + Start session
error_reporting(E_ALL & ~E_NOTICE);
session_start();

include("config.php");

// Handle AJAX request
switch ($_POST['req']) {
    // Invalid request
    default:
        echo "ERR";
        break;

    // Sign In
    case "in":
        // Already signed in
        if (is_array($_SESSION['user'])) {
            die("OK");
        }

        // Check given email & password
        if (isset($users[$_POST['email']]) && $_POST['password'] == $users[$_POST['email']]) {
            $_SESSION['user'] = [
                "email" => $_POST['email']
            ];
            echo "OK";
        } else {
            echo "ERR";
        }
        break;

    // Sign out
    case "out":
        unset ($_SESSION['user']);
        echo "OK";
        break;
}
