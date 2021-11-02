<?php 
include("function.php");
session_start();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user = get_user_by_email($email);


if ($user) {
	set_flash_message('danger', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.');
	redirect('page_register.php');
	exit;
}

add_user($email, $password);

set_flash_message('succes', 'Регистрация успешна!');
redirect('page_login.php');

?>