<?php 
include_once "access.php";
include_once "mysql.php";
include_once "header.php";
if ($username && $group):
$school = $_GET['school'];

if ($school = 'all') {
    $schools = array(array('Title','Address','Contacts', '', ''));
    $query = "SELECT * FROM ".$mysql_prefix."schools";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
		$row['edit'] = "<a class='btn' href='schoolEdit.php?school=" .$row['id']. "'><span class='glyphicon glyphicon-pencil'></span> Edit</a>";

		$row['groups'] = "<a class='btn' href='groupView.php?school=" .$row['id']. "'><span class='glyphicon glyphicon-list'></span> List</a>";
		unset($row['id']);
        array_push($schools, $row);
        $output .= bootstrap_table($schools);
              
    }
    $table = render_table($schools);
}
else {
    $schools = array(array('Title','Address','Contacts', 'Edit'));
    $query = "SELECT * FROM ".$mysql_prefix."schools WHERE schools='$school'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
		$row['edit'] = "<a href='schoolEdit.php?school=" .$row['id']. "'>Edit</a>";
		unset($row['id']);
		array_push($schools, $row);
                $title = $row['title'];
                $icons = $row['edit'] . $row['students'];
    }
    $table = render_table($schools);
}
?>
<br>
<div class="text-center">
<form>
<label>School title: <input class="form-control" type="text" name="school"></label>
             <input class="btn" type="submit">
</form>

<?= $table; ?>
<a class="btn btn-lg" href="schoolAdd.php">Add</a>
</div>
<?php
else: header("Location: login.php");
endif;
include_once 'footer.php'; 