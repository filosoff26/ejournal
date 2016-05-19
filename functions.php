<?php
function my_sql_query($query) 
{
	$result = mysql_query($query);
	if (!$result || $result == 0) {
            echo "Query:<br><pre>$query</pre><br>";
            echo "MySQL error: ".mysql_error();
        }
		
	return $result;
}
/*
 * Эта функция выводит данные в виде таблицы 
 * Входные параметры: $data массив значений с заголовками (для <th>) и id. Id всегда первый элемент в строке.
 * Выходные данные: html код для таблицы.
 */

function bootstrap_table ($data) {
  
}

function render_table($data){
    $table .='<table class="table table-striped">';
    foreach ($data as $row_number => $row){
        if ($row_number == 0) $td = 'th';
			else $td = 'td';
        $table.='<tr>';
        foreach ($row as $value) {
            $table.="<$td>$value</$td>";
        }
        $table.="</tr>";
    }
    $table.='</table>';
    return $table;
}