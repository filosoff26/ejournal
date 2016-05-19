<?php
session_start();
if ($_SESSION['login']) {
  $username = $_SESSION['login'];
  $user_message = "Вы вошли как $username";
  $user_log_out= "<a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Выйти</a>";
  $group = $_SESSION['group'];
} else {
  $user_message = "";
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/table.css" rel="stylesheet" type="text/css">
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  </head>
  <body>
    <nav class="nav navbar-default hard-blue">
      <div class="container-fluid hard-blue">
        <div class="navbar-header"> 
		<a class="navbar-brand" href="index.php"><img src="img/Logo.png"></a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #458ff3">
          <?php if ($username && $group == "admin"): ?>
            <ul class="nav navbar-nav">
              <li><a href="admin.php">Администрация</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Дневник
                  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="schoolView.php">Школы</a></li>
                  <li><a href="groupView.php">Группы</a></li>
                  <li><a href="studentView.php">Ученики</a></li>
                  <li><a href="lessonsAdd.php">Занятия</a></li>
                </ul>
              </li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Выйти</a></li>
          </ul>
          <?php elseif (!$_SESSION['login']): ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="reg.php"><span class="glyphicon glyphicon-user"></span> Регистрация</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Вход</a></li>
            <li class="navbar-text"><?php echo $user_message; ?></li>         
          </ul>
          <?php endif; ?>
       </div>
      </div>
    </nav>
