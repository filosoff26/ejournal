<?php
/*
 * Функции базы данных
 * 1. Учет состава групп и расписания занятий.
 * 2. Учет посещаемости и успеваемости, список пройденных тем.
 * 3. Учет оплаты за обучение.
 *  - вывести всю группу
 *  - вывести одного учащегося и его посещаемость, успеваемость, оплаты
 *  - вывести список должников
 */
include 'auth.php';
include 'access.php';
include 'header.php';
?>
<head>
<script src="js/jquery.bxslider.ajax.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider').bxSlider();
        });
</script>
</head>
<body>

<?php include 'footer.php'; ?>
