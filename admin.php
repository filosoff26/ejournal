<?php
include './access.php';
include_once 'functions.php';
if ($username && $group == 'admin'):
    include_once 'mysql.php';
    $query = "SELECT id, login, password, name, `group` FROM ".$mysql_prefix."users";
    $result = mysql_query($query);
    $users = array (array('id', 'login', 'password', 'name', 'group'));
    while ($row = mysql_fetch_assoc($result)) {
        array_push($users, $row);
    }
  $table = render_table ($users, "userEdit.php?id=");
  include './header.php';
?>
<div class="text-center">
<h1>Админка</h1>
<p>Типа для избранных</p>
<h2>Пользователи</h2>
<?php
echo $table;
else:
    echo "<em>Access denied</em>";
endif;
?>
<div>
<?php
include 'footer.php';
?>
