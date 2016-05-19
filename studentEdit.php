<?php
include_once './mysql.php';
include_once './access.php';
if ($username && $group == 'admin'):
    $id=$_GET['student_id'];
    if ($id) {
        $query="SELECT * FROM ".$mysql_prefix."students WHERE student_id=$id";
        $result = my_sql_query($query);
        $data = mysql_fetch_assoc($result);
    }

    if ($_POST['student_id']) {  
        $student_id= $_POST['student_id'];
        $name = $_POST['name'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $phone3 = $_POST['phone3'];
        $contacts = $_POST['contacts'];
        $group_id = $_POST['group_id'];
        $query = "UPDATE ".$mysql_prefix."students SET name='$name', phone1='$phone1', phone2='$phone2', phone3='$phone3', contacts='$phone3', group_id='$group_id' WHERE student_id='$student_id'";
        my_sql_query($query);
        header('Location: studentView.php');
    }
    include_once './header.php';
    ?>
<div class="text-center">
<form method="post">
<?php if ($data['student_id'])
	echo '<input type=hidden name=student_id value='.$data['student_id'].'>';
?>
<br>Имя:<input class="form-control" name="name" value="<?php echo $data['name']; ?>"><br>
Контактный телефон:<input class="form-control" name="phone1" value="<?php echo $data['phone1']; ?>"><br>
Контактный телефон:<input class="form-control" name="phone2" value="<?php echo $data['phone2']; ?>"><br>
Контактный телефон:<input class="form-control" name="phone3" value="<?php echo $data['phone3']; ?>"><br>
Контакты:<input class="form-control" name="contacts" value="<?php echo $data['contacts']; ?>"><br>
Группа:<input class="form-control" name="group_id" value="<?php echo $data['group_id']; ?>"><br>
<input class="btn btn-lg" type="submit" value="Save">
</form>
</div>
<?php 
else:
    header("Location: login.php");
endif;

include 'footer.php';
?>