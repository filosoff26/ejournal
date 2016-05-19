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
include_once 'access.php';
include_once 'header.php';
include_once 'mysql.php';
if ($username && $group): 
$group = $_GET['group'];

$school_id=$_GET['school'];
$_SESSION['school_id'] = $school_id;
$groups = array(array('title','day1','time1','day2','time2', '', ''));
$query = "SELECT ".$mysql_prefix."schools.title AS s_title,"
		  .$mysql_prefix."groups.title AS g_title,"
		  .$mysql_prefix."groups.id,teacher_id,day1,time1,day2,time2 "
		  ."FROM ".$mysql_prefix."groups "
		  ."JOIN ".$mysql_prefix."schools "
		  ."ON ".$mysql_prefix."groups.school_id = "
		  .$mysql_prefix."schools.id";
if ($school_id) $query .= " WHERE school_id=$school_id";
$result= my_sql_query($query);
while ($row = mysql_fetch_assoc($result)) {
	$row['day1'] = get_day_of_week($row['day1']);
	$row['day2'] = get_day_of_week($row['day2']);
	$row['edit'] = "<a class='btn' href='groupEdit.php?group=" .$row['id']. "'><span class='glyphicon glyphicon-pencil'></span> Edit</a>";
	$row['students'] = "<a class='btn' href='studentView.php?group=" .$row['id']. "'><span class='glyphicon glyphicon-list'></span> List</a>";
	unset($row['teacher_id']);
	unset($row['id']);
	if (!$s_title) $school_log="<h2>".$row['s_title']."</h2>";
	$_SESSION['school_log'] = $row['s_title']; 
	unset($row['s_title']);
	array_push($groups, $row);
}
$table = render_table($groups);
?>
<div class="text-center">
<form>
<br>
<label>Group title: <input class="form-control" type="text" name="group"></label>
             <input class="btn" type="submit">
</form>
<?= $school_log.$table; ?>
<a class="btn btn-lg" href="groupAdd.php">Add</a>
</div>
<?php
else: header("Location: login.php");
endif;
include_once 'footer.php'; 