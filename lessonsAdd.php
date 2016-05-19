<?php
include_once 'access.php';
include_once 'mysql.php';
if ($username && $group):
$table = $mysql_prefix.'lessons';
$fields = array (
	array ('name' => 'lesson_id',
		   'type' => 'id'),
	array ('name' => 'date',
		   'type' => 'datetime'),
	array ('name' => 'group_id',
		   'type' => 'int'),
	array ('name' => 'topic',
		   'type' => 'string')
	);

function select_once($table, $id, &$fields)
{
    $query = "SELECT * FROM $table WHERE id=$id";
    $result = my_sql_query($query);
    if (!$result) return false;
    $row = mysql_fetch_array($result);
    foreach ($row as $i => $value) {
        $fields[$i]['value'] = $value;
    }
    
}

function render_form($fields)
{
    $result = "<form method=post>";
    foreach ($fields as $field) {
        switch ($field['type']) {
            case 'string': 
                $result .= "<label>$field[label]: <input name=$field[name] value='$field[value]'>";
                break;
            case 'int':
                $result .= "<label>$field[label]: <input name=$field[name] value='$field[value]'>";
                break;
            case 'datetime':
                $result .= "<label>$field[label]: <input name=$field[name] value='$field[value]' type=datetime>";
                break;
            case 'id':
                $result .= "<input type=hidden name=$field[name] value=$field[value]>";
                break;
	    }
    }
    $result .= "</form>";
    return $result;
}

include_once 'header.php';

$schoolyear_start_weekday=array(
    2015 => 2,
    2016 => 4
);

function get_next_lesson($start_day, $day1, $day2)
{
	if (($start_day > $day1) && ($start_day < $day2)) {
		$res = $day2 - $start_day;
	} else $res = 7 - $day2 + $day1;
	return $res;
}


if ($_GET['fill']) {
    $fill_group = $_GET['fill'];
    // получить расписание
    $result = my_sql_query('SELECT day1,day2,time1,time2 FROM '.$mysql_prefix.'groups WHERE id='.$fill_group);
    if (!$result) {
		$error = "no group";
		break;
	}
	$days = mysql_fetch_row($result);
    $day1 = $days[0];
    $day2 = $days[1];
	$time1 = $days[2];
	$time2 = $days[3];
    $start_date = $_GET['start'];
	$end_date = $_GET['end'];
    $date = DateTime::createFromFormat("d.m.Y", $start_date);
    $end_date = DateTime::createFromFormat("d.m.Y", $end_date);

	// вычислить дату ближайшего занятия
	while ( $date < $end_date ) {
		$next_lesson = get_next_lesson($date->format("N"), $day1, $day2); 
		$date->add(new DateInterval("P".$next_lesson."D"));
		if ($date <= $end_date) {
			echo $date->format("j.m.y");			
		}
		$datetime= $date->format('Y-m-d ');
		if ($date->format("N") == $day1) {
		$datetime.=$time1;
		} else {
		$datetime.=$time2;	
		}
		$datetime.=":00";
		$result = my_sql_query("INSERT INTO ".$mysql_prefix."lessons (date, group_id) VALUES ('$datetime', '$fill_group')");
		echo "<br>";
	}
	
	
}
?>

<form><pre>
group: <input name="fill" value="<?php echo $_SESSION['group_id']; ?>">
start: <input name="start">
end:   <input name="end">
       <input type="submit">
</pre></form>	   
<?
echo $error;
//select_once($table, 1, $fields);
//echo render_form($fields);
else: header("Location: login.php");
EndIf;
include_once 'footer.php';
