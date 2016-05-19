<html>
  <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/table.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
  </head>
  <body>
    <div class="row">
      <div class="dropdown">
        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><span class="caret"></span> Школа №21
        </button><a href='schoolEdit.php?school='><img style="margin-left: 5px;" width="32" height="32" src='img/b_edit.png'></a>
        <a href='groupView.php?school='><img style="margin-left: 5px;" width="32" height="32" src='img/s_rights.png'></a>
        <ul class="dropdown-menu">
          <li><a href="#"></li>
          <li><a href="#"><a href='groupView.php?school='>List</a></a></li>
          <li><a href="#">JavaScript</a></li>
        </ul>
      </div>
    </div>
	<ul class="bxslider" id="carousel">
		<li><img src="http://placehold.it/350x150?text=1" /></li>
		<li><img src="http://placehold.it/350x150?text=2" /></li>
		<li><img src="http://placehold.it/350x150?text=3" /></li>
		<li><img src="http://placehold.it/350x150?text=4" /></li>
		<li><img src="http://placehold.it/350x150?text=5" /></li>
		<li><img src="http://placehold.it/350x150?text=6" /></li>
	</ul>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/jquery.bxslider.js"></script>
    <script src="js/bootstrap.js"></script>
	<script type="text/javascript">
	$('#carousel').bxSlider({
		slideWidth: 350,
		minSlides: 3,
		maxSlides: 3,
		slideMargin: 15,
		auto: true,
		autoHover: true,
		pause: 500
	});
	
	</script>
  </body>
</html>