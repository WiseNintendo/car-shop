<?
	require_once('./utils/db.php');
	require_once('./templates/header.php');
	
	$marka=mysql_query('SELECT * FROM `marka` WHERE 1');
	?>
	<div>
	<form method="POST" action="onecompany.php"><?
		while($row=mysql_fetch_assoc($marka)){
			?>
			<button type="submit" name="marka" value=<?=$row['id']?> style="background-color:white;width:200px;">
				<div id="companyes" style="padding:20px; background-color:white; margin:5px;float:down; box-shadow: 0 0 10px rgba(0,0,0,0.5)">
					<div style="float:bottom;"><b><?echo($row['name']);?></b></div>
					<img src=<?echo("./icons/" . $row['src']);?> style="width:100px;height:100px;">
					
				</div>
			</button>
		<?}
	?></form>
	</div>
	<?require_once('./templates/footer.php');

