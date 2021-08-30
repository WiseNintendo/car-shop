<?
	require_once('./utils/db.php');
	require_once('./templates/header.php');
	
	$markaid=$_REQUEST['marka'];
	$marka = mysql_fetch_array(mysql_query("SELECT * FROM `marka` WHERE `id`='$markaid'"));
	$auto = mysql_query("SELECT * FROM `auto` WHERE `id_marka`='$markaid' AND `id_user`>0");
	?>
	<div style="margin-top:10px;">
	<img src=<?="./icons/" . $marka['src'];?> style="width:150px;box-shadow: 0 20px 20px rgba(0,0,0,1)">
	</div>
	<div style="color:white;">
	<b>
	<?echo($marka['name']);?>
	</b>
	</div>
	<hr>
	
	<form action="onecar.php">
	<?while($row = mysql_fetch_assoc($auto)){?>	
		<div id="thiscar" style="width:100%;height:200px;background-color:silver;padding:5px;">
			<button type="submit" name="auto" value=<?echo($row['id']);?> style="border:none;height:200px;width:100%;background-color:black;">
				<div id="foto" style="float:left;height:100px;width:200px;">
					<img src=<?echo("./images/" . $row['src']);?> style="height:120px;width:200px;">
				</div>
				<table style="color:white;">
					<tr>
						<td>Модель:</td>
						<td><?echo($row['name']);?></td>
					</tr>
					<tr>
						<td>Топливо: </td>
						<td><?echo($row['fuel']);?></td>
					</tr>
					<tr>
						<td>Привод: </td>
						<td><?echo($row['unit']);?></td>
					</tr>
					<tr>
						<td>Мощность: </td>
						<td><?echo($row['power'] . " л.с.");?></td>
					</tr>
					<tr>
						<td>Цена: </td>
						<td><?echo($row['price'] . " р.");?></td>
					</tr>
				</table>
			</button>
		</div>
	<?}?>
	</form>
	
	<?require_once('./templates/footer.php');
