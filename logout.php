<?php
session_start();
session_destroy();
setcookie('key', '', time()-3600);
header('Location: index.php');
