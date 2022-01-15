<?php
session_start();
require_once ("../functions.php");
global $db;


if($_POST['action'] == "go_login") 
{
	$password = trim($_POST['password']);
	$name = trim($_POST['login']);
	// $captcha_key = trim($_POST['captcha_key']);

	if(!empty($password) && !empty($name))
	{

			$sql = "SELECT `pAdminKey` FROM `admin` WHERE `Name` = '$name' LIMIT 1";
			// message('warning','Ошибка',$sql );	
			$statement = $db->prepare($sql);
			$statement->execute ();

			if($statement->rowCount())
			{
				$data = $statement->fetch();

			 	
					if($data['pAdminKey'] == $password)
				 	{
				 		session_start();
				 		$_SESSION['A_Nick'] = $name;
				 		//$_SESSION['Password'] = $password;
				 		
				 		message('success','Успех','Вы успешно авторизировались!
				 		Сейчас вас перенаправят в Личный кабинет','/admin/'); 		
				 	}	
				 	else message('warning','Ошибка','Данные введены неверно исправте ошибку и попробуйте снова!');
			}
			else message('warning','Ошибка','Данные введены неверно');
	}
	else message('warning','Ошибка','Заполните все поля');
}