<?php
include_once 'mysql.php';
include_once 'access.php';
include_once 'header.php';
if($username && $group):

if ($username && $group == 'admin'):
	$group_id = $_GET['group'];
    $students = array(
        array(
            'name',
            'phone1',
            'phone2',
            'phone3',
            'contacts',
			''));
	$query="SELECT title FROM ".$mysql_prefix."groups";
	if ($group_id) $query.=" WHERE id=$group_id";
	$result=my_sql_query($query);
	$row=mysql_fetch_assoc($result);
	$group_log=$row["title"];
    $query = "SELECT * FROM ".$mysql_prefix."students";
	if ($group_id) $query .= " WHERE group_id=$group_id";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
		$row['edit'] = "<a class='btn' href='studentEdit.php?student_id=" .$row['student_id']. "'><span class='glyphicon glyphicon-pencil'></span> Edit</a>";
		unset($row['student_id']);
		unset($row['group_id']);
        array_push($students, $row);
    }
	$_SESSION['group_id'] = $group_id;
endif;
    
// print out
?>
<div class="text-center">
<?php
$table = render_table($students);
$student_log = "<h2>".$_SESSION['school_log']." - ".$group_log."</h2>";
echo $student_log;
echo $table;
?>
<a class="btn btn-lg" href="studentAdd.php">Add</a>
</div>
<?php 
else: header("Location: login.php");
endif;
include_once "footer.php";
