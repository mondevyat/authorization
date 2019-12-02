<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Authorization Form</title>
</head>
<body>
	<div class="container mt-4">
		<?php
			ini_set('display_errors','off');
			if($_COOKIE['user'] == ''):
		?>
		<div class="row">
			<div class="col">

				<h1>Форма регистрации</h1>
				<form action="check.php" method="post">
					<input type="text" class="form-control" name="login" id ="login" placeholder="Введите логин"><br>
					<input type="text" class="form-control" name="name" id ="name" placeholder="Введите имя"><br>
					<input type="password" class="form-control" name="pass" id ="pass" placeholder="Введите пароль"><br>
					<button class="btn btn-success" type="submit">Регистрация</button>
				</form>
			</div>

			<div class="col1">
				<h1>Форма авторизации</h1>
				<form action="auth.php" method="post">
					<input type="text" class="form-control" name="login" id ="login" placeholder="Введите логин"><br>
					<input type="password" class="form-control" name="pass" id ="pass" placeholder="Введите пароль"><br>
					<span>
						<button class="btn btn-success" type="submit">Войти</button>
						<a href="/authorization/reset.html">Забыли пароль?</a>
					</span>	
				</form>
			</div>
			
			<?php else:?>
			<p>Добро пожаловать, <?=$_COOKIE['user']?>. <a href="exit.php">Желаете выйти?</a></p>
			<?php endif;?>

		</div>
	</div>
</body>
</html>