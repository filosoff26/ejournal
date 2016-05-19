<?php
if (basename($_SERVER['SCRIPT_NAME']) == basename(__FILE__)) {
    header("Location: index.php");
}
session_start();
if ($_SESSION['login']) {
    $username = $_SESSION['login'];
    $user_message = "<p>Logged in as $username</p>";
    $group = $_SESSION['group'];
}
else {
    $user_message = "<p>Welcome, guest!</p>";
}
