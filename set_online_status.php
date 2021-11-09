<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

if ($_SESSION['user']['status'] != 'admin') {
	set_online_status($_SESSION['user']['id'], $_POST['online_status']);
	redirect("users.php?id={$_SESSION['user']['id']}");
}

set_online_status($_GET['id'], $_POST['online_status']);

redirect('users.php');