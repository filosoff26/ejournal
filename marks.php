<?php
include 'access.php';
include 'mysql.php';
if ($username):
// get student list
$group_id = $_SESSION[group_id];
$query = "SELECT student_id FROM ".$mysql_prefix."students WHERE group_id='$group_id'";
$result = my_sql_query($query);
for ($i = 0; $i< mysql_num_rows($result); $i++) {
	$row = mysql_fetch_row($result);
	$students[$i] = $row[0];
}
$start_lesson = $_GET[start];
$end_lesson = $_GET[end];

$lessons = ;

foreach ($students as $student) {
	$query ()
}