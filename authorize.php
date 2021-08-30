<?
		require_once('./utils/db.php');
		require_once('./templates/header.php');
		
		$login='';
		$password='';
		
		if (($_SERVER['REQUEST_METHOD'])=='POST') {
			$login=trim($_REQUEST['login']);
			$password=trim($_REQUEST['password']);
			$result=mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `login`='$login' AND `password`='$password'"));
			if($result <> false){ 
				setcookie('login',$login,0,'/');
				setcookie('password',$password,0,'/');
				echo("Авторизация прошла успешно! ");
				
				?><a href='./index.php'><?echo("На главную");?></a>
				<?
				die();
			}
		}
	?> 
	<div style='background:white;'> 
		<form method="POST" >
			Логин:<br>
			<input name="login" type="text" value=<?=$login;?>>
			<br>
			Пароль:<br>
			<input name="password" type="password" value=<?=$password;?> >
			<br>
			<input type="submit" value="Войти" ><br>
		</form>
	</div>
<?
require_once("./templates/footer.php");
