<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

if ($_SESSION['user']['status'] != 'admin') {
	edit_credentials($_SESSION['user']['id'], $_POST['email'], $_POST['password']);
	redirect("page_login.php");
}

edit_credentials($_GET['id'], $_POST['email'], $_POST['password']);

redirect('users.php');