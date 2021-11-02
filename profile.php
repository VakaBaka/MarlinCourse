<?php 
session_start();
include('function.php');

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

// if ($_SESSION['user']['status'] != 'admin') {
// 	redirect("page_profile.php?id={$_SESSION['id']}");
// }

redirect("page_profile.php?id={$_GET['id']}");