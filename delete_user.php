<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

if ($_SESSION['user']['status'] != 'admin') {
	delete_user($_SESSION['user']['id']);
	redirect("login.php");
}

delete_user($_GET['id']);

redirect('users.php');