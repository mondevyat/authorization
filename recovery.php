<?php
	ini_set('display_errors','off');
	$connect = mysqli_connect('localhost','root','','register_db');
	$login = mysqli_real_escape_string($connect,$_POST['login']);
	$mail = mysqli_real_escape_string($connect,$_POST['e-mail']);

	$sqlquery = "SELECT `id` FROM `users` WHERE `login`='{$login}' LIMIT 1";
    $sql = mysqli_query($connect,$sqlquery) or die(mysqli_error($connect));
    if (mysqli_num_rows($sql)==1)
    {
		$newpass = array ("92", "83", "7", "66", "45", "4", "36", "22", "1", "0", 
       	            "k", "l", "m", "n", "o", "p", "q", "1r", "3s", "a", "b", "c", "d", "5e", "f", "g", "h", "i", "j6", "t", "u", "v9", "w", 	"x5", "6y", "z5");
	     for ($k = 0; $k < 6; $k++)
   	     {
   	       shuffle($newpass);
   	       $string = $string.$newpass[1];
         }
		$sqlquery = "UPDATE `users` SET `pass`='{$string}' WHERE `login`='{$login}' ";
    	$sql = mysqli_query($connect,$sqlquery) or die(mysqli_error($connect));

		mail($mail, "Запрос на восстановление пароля", "Hello, $login. Your new password: $string");
    }
 	echo "На ваш почтовый ящик было отправлено письмо с новым паролем!";
?>