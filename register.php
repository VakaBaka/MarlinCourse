<?php 
include("function.php");
session_start();

$email = $_POST['email'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user = get_user_email($email);


if ($user) {
	set_flash_message('exist', 'Данный емейл уже существует!');
	redirect('page_register.php');
	exit;
}

add_user($email, $hash);
var_dump(add_user($email, $hash));

set_flash_message('succes', 'Пользователь успешно зарегистрирован!');
redirect('page_login.php');

?>