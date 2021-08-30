<html>
	<head>
		<title>Muscle Car Shop</title>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="./style/css.css">
		<link rel="stylesheet" type="text/css" href="./style/test.css">
		<audio autoplay loop src="./Snoop_Dog_feat_Doors_-_Rider_on_the_storm_OST_Need.ogg"></audio>
	</head>
	<body background="./images/WPS92RSX.png" style="background-size:cover;">
		<div id="header">
			<div class="button" style="margin-left:25%; float:left">
				<a class="but" href="./index.php">Главная</a>
			</div>
			<div class="button" style="margin-left:10%; float:left">
				<a class="but" href="./allmarks.php">Магазин</a>
			</div>

				<?
				if(isset($_COOKIE["login"])){?>
					<div class="button" style="margin-left:5%; float:left;">
						<a class="but" href="put.php">Продать авто</a>
					</div>
					
					<div class="button" style="margin-left:11%; float:left;">
						<a class="but" href="./authorize.php">Выйти</a>
					</div>
					<?
				}else{?>
					<div class="button" style="margin-left:20%; float:left;">
						<a class="but" href="./authorize.php">Войти</a>
					</div>
					<?
				}?>
			
		</div>
		<center>
		<div id="body" >
