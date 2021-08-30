<?
	require_once('./utils/db.php');
	require_once('./templates/header.php');
	
	$ispost = $_SERVER['REQUEST_METHOD']=="POST";
	$login = $_COOKIE['login'];
	$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `login`='$login'"));
	$marka = mysql_query("SELECT * FROM `marka` WHERE 1");
	$fuel = array('Бензин','Дизель','Электро');
	$unit = array('Передний','Задний','Полный');
	
	if($ispost){
		$thisiduser = $user['id'];
		$thisidmarka = $_REQUEST['id_marka'];
		$thisname = $_REQUEST['name'];
		$thisfuel = $_REQUEST['fuel'];
		$thispower = $_REQUEST['power'];
		$thisdescript = $_REQUEST['descript'];
		$thisunit = $_REQUEST['unit'];
		$thisprice = $_REQUEST['price'];
		
		$uploaddir = './images/';
		$uploadfile = $uploaddir . basename($_FILES['file_img']['name']); 
		if (is_uploaded_file($_FILES['file_img']['tmp_name'])) {
			move_uploaded_file($_FILES['file_img']['tmp_name'], $uploadfile);
			$thisfotoname = basename($_FILES['file_img']['name']);
			$insert = "INSERT INTO `auto`(
					`name`,`id_marka`,
					`id_user`,`price`,
					`fuel`,`unit`,`power`,
					`descript`,`src`) 
				VALUES(
					'$thisname','$thisidmarka',
					'$thisiduser','$thisprice',
					'$thisfuel','$thisunit','$thispower',
					'$thisdescript','$thisfotoname')";
			mysql_query( $insert);
			print_r($_FILES);
			echo(mysql_error());
		} 
		
	}
	?>
	<form method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Модель</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Марка</td>
				<td>
					<select name="id_marka">
						<?while($row = mysql_fetch_assoc($marka)){?>
							<option value=<?=$row['id']?> <?if (($ispost)&&($row['id']==$_REQUEST['id_marka'])){?> selected<?}?>>
								<?echo($row['name']);?>
							</option>
						<?}?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Топливо</td>
				<td>
					<select name="fuel">
						<?for($i=0;$i<3;$i++){?>
							<option value=<?=$fuel[$i]?> <?if (($ispost)&&($fuel[$i]==$_REQUEST['fuel'])){?> selected<?}?>>
								<?echo($fuel[$i]);?>
							</option>
						<?}?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Мощность</td>
				<td><input type="text" name="power"></td>
			</tr>
			<tr>
				<td>Привод</td>
				<td>
					<select name="unit">
						<?for($i=0;$i<3;$i++){?>
							<option value=<?=$unit[$i]?> <?if (($ispost)&&($unit[$i]==$_REQUEST['power'])){?> selected<?}?>>
								<?echo($unit[$i]);?>
							</option>
						<?}?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Описание</td>
				<td><textarea  rows='1' name = "descript" selected></textarea></td>
			</tr>
			<tr>
				<td>Фото</td>
				<td><input type="file" name="file_img"></td>
			</tr>
			<tr>
				<td>Цена</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Отправить Авто"></td>
			</tr>
		</table>
	</form>
	<?
	require_once('./templates/footer.php');
