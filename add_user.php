<?php 
include('function.php');
session_start();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (!isset($_SESSION['user']) and $_SESSION['user']['status'] != 'admin') {
	redirect('page_login');
}

if (get_user_by_email($email)) {
	set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
	redirect('create_user.php');
	exit;
}

$id = add_user($email, $password);

edit_information($id, $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

add_social_links($id, $_POST['vk'], $_POST['telegram'], $_POST['instagram']);

set_flash_message('succes_add_user', 'Пользователь добавлен!');

redirect('users.php');


