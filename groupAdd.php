<?php
include_once 'access.php';
include_once 'header.php';
if ($username && $group == 'admin'):
$title = $_POST['title'];
$day1 = $_POST['day1'];
$day2 = $_POST['day2'];
$time1 = $_POST['time1'];
$time2 = $_POST['time2'];
$school_id = $_POST['school_id'];

if (!$title)
	$err['title'] = " * required <br>";
if (!$day1)
	$err['day1'] = " * required <br>";
if (!$day2)
	$err['day2'] = " * required <br>";
if (!$time1)
	$err['time1'] = " * required <br>";
if (!$time2)
	$err['time2'] = " * required <br>";

if (!$err) {
    include_once 'mysql.php';
    $query = "INSERT INTO ".$mysql_prefix."groups (title, school_id, day1, time1, day2, time2) VALUES ('$title', '$school_id', '$day1','$time1', '$day2', '$time2') ";
    my_sql_query($query);
}

?>
<div class="text-center">
<form method="post">
Group:        <input class="form-control" type='text' name='title'>	<br>
<?php if ($_SESSION['school_id']): ?>
<input type="hidden" name="school_id" value="<?= $_SESSION['school_id'] ?>">
<?php endif; ?>

Day 1:
<div class="radio"><label><input type='radio' name='day1' value="1">Monday</label>
<label><input type='radio' name='day1' value="2">Tuesday</label>
<label><input type='radio' name='day1' value="3">Wednsday</label>
<label><input type='radio' name='day1' value="4">Thursday</label>
<label><input type='radio' name='day1' value="5">Friday</label>    
<label><input type='radio' name='day1' value="6">Saturday</label>
<label><input type='radio' name='day1' value="7">Sunday</label></div><br>
Time:         <input class="form-control" type='time' name='time1'> <br>                         
              
Day 2:
<div class="radio"><label><input type='radio' name='day2' value="1">Monday</label>
<label><input type='radio' name='day2' value="2">Tuesday</label>
<label><input type='radio' name='day2' value="3">Wednsday</label>
<label><input type='radio' name='day2' value="4">Thursday</label>
<label><input type='radio' name='day2' value="5">Friday</label>    
<label><input type='radio' name='day2' value="6">Saturday</label>
<label><input type='radio' name='day2' value="7">Sunday</label></div><br>
Time:         <input class="form-control" type='time' name='time2'><br>

              <input class="btn btn-lg" class="btn" type='submit' value="Submit">
</form>
</div>
<?php 
else: header("Location: login.php");
endif;
include_once 'footer.php'; 
?>