<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

if ($_SESSION['user']['status'] != 'admin') {
	$_SESSION['user']['image_name'] = implode('', upload_avatar($_SESSION['user']['id'], $_FILES['image']['name']));
	redirect("users.php?id={$_SESSION['user']['id']}");
}

upload_avatar($_GET['id'], $_FILES['image']['name']);

redirect('users.php');