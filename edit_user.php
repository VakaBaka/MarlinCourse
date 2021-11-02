<meta charset="utf-8">
<?php 
include('function.php');
// require('function.php');
session_start();

if (!isset($_SESSION['user'])) {
	redirect('page_login');
}

$id = $_SESSION['user']['id'];
$username = $_POST['username'];
$job_title = $_POST['job_title'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];


edit_information($id, $username, $job_title, $phone, $adress);
// edit_information($_SESSION['user']['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

redirect('users.php');
