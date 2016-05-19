<?php
header("Location : index.php");
include 'mysql.php';

$login = $_POST['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$realname = $_POST['name'];

if ($login && $password && $confirm) {
    if ($password != $confirm) {
        $error_password = "passwords does not match";
    }
    else {
        mysql_connect($mysql_host, $mysql_user, $mysql_password);
        mysql_select_db($mysql_db_name);

        $query = "INSERT INTO users (login, password, name) "
                . " VALUES ('$login', '$password', '$realname') ";
        $result = mysql_query($query);
        if (mysql_errno() == 1062) {
            $error_login = 'user already exists';
        }
    }
}
?><?php include 'header.php'; ?>
<form method="post">
    <pre>
        login:              <input name="login"> <?php echo $error_login; ?> 
        отображаемое имя:   <input name="name">
        pass:               <input name="password" type="password">
        confirm:            <input name="confirm" type="password"> <?php echo $error_password; ?> 
                            <input type="submit" value="Go!">
    </pre>
</form>
<?php include 'footer.php'; 
