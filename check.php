<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); // trim - убирает лишние пробелы
																		// фильтруем как самую обычную строку

	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	if(mb_strlen($login) < 4 || mb_strlen($login) > 12) {
		echo "Недопустимая длина логина";
		exit();
	} else if(mb_strlen($name) < 3 || mb_strlen($name) > 16){
		echo "Недопустимая длина имени";
		exit();
	} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6){
		echo "Недопустимая длина пароля (от 2 до 6 символов)";
		exit();
	}

	$pass = md5($pass."OlkejjdejIOE2");

	$mysql = new mysqli('localhost','root','','register_db'); //mysql improved(host, username, password, db name)
	$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");

	$mysql->close();

	header('Location: /authorization');
?>