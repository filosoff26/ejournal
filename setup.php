<?php
include_once 'mysql.php';
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'users ('
        . 'id INT NOT NULL AUTO_INCREMENT KEY, '
        . 'login VARCHAR(32), '
        . 'password VARCHAR(32))');
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'students ('
        . 'student_id INT NOT NULL AUTO_INCREMENT KEY, '
        . 'name VARCHAR(60), '
        . 'phone1 VARCHAR(10), '
        . 'phone2 VARCHAR(10), '
        . 'phone3 VARCHAR(10), '
        . 'contacts VARCHAR(80), '
        . 'group_id INT)');
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'groups ('
        . 'group_id INT NOT NULL AUTO_INCREMENT KEY, '
        . 'title VARCHAR(40), '
		. 'teacher_id INT,'
        . 'day1 INT, '
        . 'time1 CHAR(5), '
        . 'day2 INT, '
        . 'time2 CHAR(5))');
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'schools ('
        . 'school_id INT NOT NULL AUTO_INCREMENT KEY, '
        . 'title VARCHAR(40),'
	. 'address VARCHAR(100),'
        . 'contacts VARCHAR(1000))');
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'lessons ('
    . 'lesson_id INT NOT NULL AUTO_INCREMENT KEY,'
    . 'group_id INT,'
    . 'date DATETIME,'
    . 'topic VARCHAR(100))');
my_sql_query('CREATE TABLE IF NOT EXISTS '.$mysql_prefix.'marks ('
    . 'mark_id INT NOT NULL AUTO_INCREMENT KEY,'
    . 'lesson_id INT,'
    . 'student_id INT,'
    . 'mark INT,'
    . 'present BOOL,'
    . 'comment varchar(100)'
    . ')');
