<?php
if (basename($_SERVER['SCRIPT_NAME']) == basename(__FILE__)) {
    header("Location: index.php");
}
ini_set('display_erors', TRUE);
ini_set('display_startup_erors', TRUE);

$mysql_host = 'localhost';
$mysql_user = 'floran3com_soft';
$mysql_password = 'nadip8913';
$mysql_db_name = 'floran3com_soft';
$mysql_prefix = 'nadip_';
mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_db_name);
include_once 'functions.php';
my_sql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci' ");

