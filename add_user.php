<?php 
include('function.php');
session_start();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}
if (get_user_by_email($email)) {
	set_flash_message('email_exist', 'Данный емейл уже существует!');
	redirect('create_user.php');
}
add_user($email, $password);

edit_information($email, $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

add_social_links($email, $_POST['vk'], $_POST['telegram'], $_POST['instagram']);

set_flash_message('succes_add_user', 'Пользователь добавлен!');

redirect('users.php');
