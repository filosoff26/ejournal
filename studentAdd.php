<?php
include 'mysql.php';
include 'access.php';
include 'header.php';
if ($username && $group):
$name = mysql_real_escape_string($_POST['name']);
$phone1 = mysql_real_escape_string($_POST['phone1']);
$phone2 = mysql_real_escape_string($_POST['phone2']);
$phone3 = mysql_real_escape_string($_POST['phone3']);
$contacts = mysql_real_escape_string($_POST['contacts']);
$group_id = mysql_real_escape_string($_POST['group_id']);

if ($name && $phone1 && $contacts && $group_id) {

    $query = "INSERT INTO ".$mysql_prefix."students (name, phone1, phone2, phone3, contacts, group_id) "
        . " VALUES ('$name', '$phone1', '$phone2','$phone3', '$contacts', '$group_id') ";
    $result = mysql_query($query);
}
?>
<div class="text-center">
<form method="post"><br>	
 Имя:              <input class="form-control" type='text' name='name'><br>
 Контактный телефон:   <input class="form-control" type='text' name='phone1'><br>
 Контактный телефон:    <input class="form-control" type='text' name='phone2'><br>
 Контактный телефон:    <input class="form-control" type='text' name='phone3'><br>
 Контакты:          <input class="form-control" type='text' name='contacts'><br>
 Группы:             <input class="form-control" type='text' name='group_id'><br>
 
 <input class="btn btn-lg" type='submit' value="Submit"></input>
</form>
</div>
<?php
else: header("Location: login.php");
endif;
include 'footer.php';
?>