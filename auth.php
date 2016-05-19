<?php

/*
 * Файл авторизации
 * Узнает пользователя по кукам или по логин/паролю
 * Результат работы - начатая сессия с полями 'login' и 'group'
 */
if (basename($_SERVER['SCRIPT_NAME']) == basename(__FILE__)) {
    header("Location: index.php");
}
include_once 'mysql.php';
session_start();

// check cookie key
$input_key = $_COOKIE['key'];
if ($input_key) {
    $query = "SELECT `login`,`key`,`group` FROM nadip_users WHERE `key`='$input_key' ";
    $result = mysql_query($query);
    if (mysql_num_rows($result)){
        $row = mysql_fetch_array($result);
        $login = $row['login'];
        $_SESSION['login'] = $login;
        $group = $row['group'];
        $_SESSION['group'] = $group;
    }
}

// check login & password
$login = $_POST['login'];
$password = $_POST['password'];
if ($login && $password) {
    $query = "SELECT login,password,`group` FROM nadip_users"
            . " WHERE login='$login'"
            . " AND password='$password'";
    $result = my_sql_query($query);
    if (mysql_num_rows($result)) {
        $row = mysql_fetch_array($result);
        $_SESSION['login'] = $login;
        $_SESSION['group'] = $row['group'];
        $key = hash('md5', time().$login);
        $query = "UPDATE nadip_users SET `key`='$key' WHERE login='$login'";
        mysql_query($query);
        setcookie('key', $key, time() + 60*60*24*7);
    }
    else {
        $error = "wrong login or password";
    }
}

