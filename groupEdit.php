<?php
function get_day_of_week($daynum)
{
	switch($daynum) {
		case 1: return "ПН";
		case 2: return "ВТ";
		case 3: return "СР";
		case 4: return "ЧТ";
		case 5: return "ПТ";
		case 6: return "СБ";
		case 7: return "ВС";
	}
}
include_once './mysql.php';
include_once './access.php';
if ($username && $group == 'admin'):
    $id=$_GET['group'];
    if ($id) {
        $query="SELECT * FROM ".$mysql_prefix."groups WHERE id=$id";
        $result = my_sql_query($query);
        $data = mysql_fetch_assoc($result);
		$query = "SELECT id,title FROM ".$mysql_prefix."schools";
		$result = my_sql_query($query);
		$schools = array();
		while ($row = mysql_fetch_assoc($result)) {
			$id = $row['id'];
			$schools[$id] = $row['title'];
		}		
    }

    if ($_POST['id']) {  
        $id= $_POST['id'];
        $title = $_POST['title'];
		$school = $_POST['school'];
        $day1 = $_POST['day1'];
        $time1 = $_POST['time1'];
        $day2 = $_POST['day2'];
        $time2 = $_POST['time2'];
        $query = "UPDATE ".$mysql_prefix."groups SET id='$id', title='$title', day1='$day1', time1='$time1', day2='$day2', time2='$time2' WHERE id='$id'";
        my_sql_query($query);
        header('Location: groupView.php');
    }
    include_once './header.php';
    ?>
<form method="post">
<div class="text-center">
<?php if ($data['id'])
	echo '<input type=hidden name=id value='.$data['id'].'>';
?>
<br>Group title: <input class="form-control" name="title" value="<?php echo $data['title']; ?>"><br><br>
School:
<select class="form-control" name="school">
	<?php
		foreach($schools as $index => $value)
			echo "<option value='$index'>$value</option>";
	?>
</select><br><br>
Day:
<select class="form-control" name="day1">
	<?php for ($i=1; $i<=7; $i++): ?>
	<option value="<?= $i ?>" <?= $data['day1'] == $i ? 'selected' : '' ?>><?= get_day_of_week($i) ?></option>
	<?php endfor; ?>
</select><br><br>
<input class="form-control" name="time1" type="time" value="<?php echo $data['time1']; ?>"><br><br>
Day:
<select class="form-control" name="day2">
	<?php for ($i=1; $i<=7; $i++): ?>
	<option value="<?= $i ?>" <?= $data['day2'] == $i ? 'selected' : '' ?>><?= get_day_of_week($i) ?></option>
	<?php endfor; ?>
</select><br>
<input class="form-control" name="time2" type="time" value="<?php echo $data['time2']; ?>"><br><br>
<input class="btn-lg btn" type="submit" value="Save"><br><br>
</form>
</div>
<?php 
else: header("Location: login.php");
endif;

include 'footer.php';
?>