<?php
include_once "access.php";
include_once "mysql.php";
include_once "header.php";
if ($username && $group):
echo "<form method='POST'>";
$lesson = array(array('group','date','edit'));
$query = "SELECT * FROM ".$mysql_prefix."lessons";
$result = my_sql_query($query);
$i=0;
while($row = mysql_fetch_assoc($result)) {
	if ($i < 4) {
	$query = "SELECT title FROM ".$mysql_prefix."groups WHERE id='$row[group_id]'";
	$result = my_sql_query($query);
	$display_row = array (
		'group' => mysql_fetch_row($result)[0],
		'date' => date("d-m-Y", strtotime($row['date'])),
		'edit' => "<a href='lessonEdit.php?id=$row[lesson_id]'>Edit</a>"
	);
	$i++;
	array_push($lesson, $display_row);
	}
}
$table = render_table($lesson);
echo $table;
echo "</form>";
else: header("Location: login.php");
endif;