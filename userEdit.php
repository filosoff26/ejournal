<?php
/*
 * Редактирование пользователя: 1. Получение id пользователя из массива GET.
 * 2. Получение данных из бд.
 * 3. Вывод формы с значениями из бд.
 */
include_once './mysql.php';
include './access.php';
if ($username && $group == 'admin'):
    $id=$_GET['id'];
    if ($id) {
        $query="SELECT `id`, login, password, `name`, `group` FROM ".$mysql_prefix."users WHERE id=$id";
        $result = mysql_query($query);
        $data = mysql_fetch_assoc($result);
    }

    if ($_POST['id']) {    
        $id = $_POST['id'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $group = $_POST['group'];
        $query = "UPDATE ".$mysql_prefix."users SET "
                . "login='$login',"
                . "name='$name',"
                . "password='$password',"
                . "`group`='$group' WHERE id=$id";
        my_sql_query($query);
        header('Location: admin.php');
    }
    include './header.php';
    ?>
    <form method="post">
        <?php if ($data['id'])
            echo '<input type=hidden name=id value='.$data['id'].'>';
        ?>
        <table class="invisible">
            <tr>
                <td>login:</td>
                <td><input name="login" value="<?php echo $data['login']; ?>"></td>
            </tr>
            <tr>
                <td>password:</td>
                <td><input name="password" value="<?php echo $data['password']; ?>"></td>
            </tr>
            <tr>
                <td>name: </td>
                <td><input name="name" value="<?php echo $data['name']; ?>"></td>
            </tr>
            <tr>
                <td>group: </td>
                <td>
                    <select name="group">
                        <option value="admin"
                                <?php if ($data['group'] == 'admin')
                                        echo 'selected';?>>admin</option>
                        <option value="users"
                                <?php if ($data['group'] == 'users')
                                        echo 'selected';?>>users</option>
                        <option value="moderator"
                                <?php if ($data['group'] == 'moderator')
                                        echo 'selected';?>>moderator</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save"></td>
            </tr>
    </form>
<?php 
else:
    echo "Access denied";
endif;
