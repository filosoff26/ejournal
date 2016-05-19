<?php
include 'header.php';

if ($username):

    if ($_POST['displayname']) {
        $displayname = $_POST['displayname'];
        $query = "UPDATE users SET name='$displayname' WHERE login='$username'";
        $result = mysql_query($query);
        if ($result)
            $message = 'Done';
    }
    else {
        $query = "SELECT name FROM users WHERE login='$username'";
        $result = mysql_query($query);
        $row = mysql_fetch_row($result);
        $displayname = $row[0];
    }

?>
<h1>Информация</h1>
<form method="post">
    <pre>
Отображаемое имя:   <input name="displayname" value="<?php echo $displayname; ?>">
                    <input type="submit" value="Save"> <?php echo $message; ?>
    </pre>
</form>

<?php
else:
    echo "<em>Access denied</em>";
endif;

include 'footer.php';