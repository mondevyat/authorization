<?php
	ini_set('display_errors','off');
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	$pass = md5($pass."OlkejjdejIOE2");

	$mysql = new mysqli('localhost','root','','register_db'); //mysql improved(host, username, password, db name)
	
	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
	$user = $result->fetch_assoc(); // конвертируем в массив
	if (count($user) == 0){
		header('Location: /authorization/error.html');
		exit();
	}

	setcookie('user', $user['name'], time() + 3600, "/"); //(название cookie, задаём определённое значение, время жизни, место действия)

	$mysql->close();

	header('Location: /authorization');
?>