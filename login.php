<?php 
session_start();
include('function.php');

$email = $_POST['email'];
$password = $_POST['password'];

$user = login($email, $password);



if (!isset($user)) {
    set_flash_message('danger', 'Неверный логин или пароль!');
    redirect('page_login.php');
}

if ($user['status'] != 'admin') {
    redirect("users.php?id={$user['id']}");
}

$users = get_all_users('*');

redirect('create_user.php');





?>