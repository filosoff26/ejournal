<?php
include_once 'access.php';
include_once 'header.php';
if ($username && $group == 'admin'):
$title = $_POST['title'];
$address = $_POST['address'];
$contacts = $_POST['contacts'];


if (!$title)
	$err['title'] = " * required <br>";
if (!$address)
	$err['address'] = " * required <br>";
if (!$contacts)
	$err['contacts'] = " * required <br>";

if (!$err) {
    include_once 'mysql.php';
    $query = "INSERT INTO ".$mysql_prefix."schools (title, address, contacts) VALUES ('$title','$address', '$contacts') ";
    my_sql_query($query);
	header("Location: schoolView.php");
}

?>
<div class="text-center">
<form method="post">
<label>Title:    <input class="form-control" name='title'></label><br>

<label>Address:  <input class="form-control" name='address'></label><br>

Contacts: <textarea class="form-control" name='contacts'></textarea><br>
 
	  <input class="btn btn-lg" type='submit' value="Отправить">
</form>
</div>
<?php 
else: header("Location: login.php");
endif;
include_once 'footer.php'; 
?>