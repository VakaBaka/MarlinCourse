<meta charset="utf-8">
<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

if ($_SESSION['user']['status'] != 'admin') {
	$_SESSION['user'] = edit_information($_SESSION['user']['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);
	redirect("users.php?id={$_SESSION['user']['id']}");
}

edit_information($_GET['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

redirect("users.php");
