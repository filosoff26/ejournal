<?php
function form_bool($val)
{
	$checked = $val ? "checked" : "";
	return "<input type=checkbox $checked> name=present42>";
}
include_once "access.php";
include_once "mysql.php";
include_once "header.php";
if ($username && $group):
	echo "<form method='POST'>";
	$id=$_GET[id];
	$query = "SELECT * FROM ".$mysql_prefix."lessons WHERE lesson_id=$id";
	$result = my_sql_query($query);
	$lesson = mysql_fetch_assoc($result);
	$query = "SELECT * FROM ".$mysql_prefix."marks WHERE lesson_id=$id";
	$result = my_sql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$res=my_sql_query("SELECT name FROM".$mysql_prefix."students WHERE student_id=$row[student_id]");
		$name = mysql_fetch_row($res)[0];
		$mark = array(
			'name' => $name,
			'present' => form_bool($row[present]),
			'mark' => $row[mark],
			'comment' => $row[comment]
		);
		array_push($marks, $mark);
	}
	
	
	echo "</form>";
else: header("Location: login.php");
endif;
?>
<input type=checkbox <?php if ($present) echo "checked";?> >