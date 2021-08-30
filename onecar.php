<?
	require_once('./utils/db.php');
	require_once('./templates/header.php');
	
	$autoid=$_REQUEST['auto'];
	$auto = mysql_fetch_array(mysql_query("SELECT * FROM `auto` WHERE `id`='$autoid'"));
	$markaid = $auto['id_marka'];
	$marka = mysql_fetch_array(mysql_query("SELECT * FROM `marka` WHERE `id`='$markaid'"));
	?>
	<div id="autoinfo" style="background-color:black;width:100%; color:White;">
		<div style="height:200px;width:200px;float:left;">
			<img src=<?echo("./images/" . $auto['src']);?> style="height:220px;width:320px;background-color:red;">
		</div>
		<table style="color:White;">
			<tr>
				<td>Модель:</td>
				<td><?echo($auto['name']);?></td>
			</tr>
			<tr>
				<td>Марка: </td>
				<td><?echo($marka['name']);?></td>
			</tr>
			<tr>
				<td>Топливо: </td>
				<td><?echo($auto['fuel']);?></td>
			</tr>
			<tr>
				<td>Привод: </td>
				<td><?echo($auto['unit']);?></td>
			</tr>
			<tr>
				<td>Мощность: </td>
				<td><?echo($auto['power'] . " л.с.");?></td>
			</tr>
			<tr>
				<td>Цена: </td>
				<td><?echo($auto['price'] . " р.");?></td>
			</tr>
			
			<?
			if(isset($_COOKIE['login'])){
				$iduser = $auto['id_user'];
				$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `id`='$iduser'"));
				?>
				<tr>
					<td>tel.:</td>
					<td><?echo($user['telefone']);?></td>
					
				</tr><?
			}else{
				?>
				<tr>
					<td><?echo("Авторизуйтесь, чтобы увидеть номер владельца авто.");?></td>
				</tr><?
			}?>
		</table>
		<hr style="margin-top:60px;">
		<div id="autoinfo">
			<?echo($auto['descript']);?>
		</div>
	</div>
	
	<?require_once('./templates/footer.php');
