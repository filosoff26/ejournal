<?php
session_start();
if ($_SESSION['login']) {
    $username = $_SESSION['login'];
    $user_message = "<p>Logged in as $username</p>";
    $group = $_SESSION['group'];
}
else {
    $user_message = "<p>Welcome, guest!</p>";
}
?>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/table.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <ul class='headerTable'>
            <li class="headerInTable"><a href="index.php">Main</a></li>
            <?php
            if ($username && $group == "admin"):
                ?>
                <li class="headerInTable"><a href="student.php">Student</a></li>
                <?php
            endif;
            if ($username && $group == "admin"):
                ?>
                <li class="headerInTable"><a href="admin.php">Admin</a></li>
                <?php
            endif;
            if (!$_SESSION['login']) {
            echo '<li class="headerInTable"><a href="reg.php">Registration</a></li>';
            echo '<li class="headerInTable"><a href="login.php">Login</a></li>';
            }
            else {
            echo '<li class="headerInTable"><a href="logout.php">Logout</a></li>';
            }
            ?> 
        </ul><br>
        <?php echo $user_message; 
        ?>
    </body>
</html>