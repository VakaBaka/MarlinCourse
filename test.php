<?php 
session_start();
require('function.php');

var_dump($_SESSION['user']);
var_dump($_POST);

$id = $_SESSION['user']['id'];
$username = $_POST['username'];
$job_title = $_POST['job_title'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];

$query = "UPDATE registration SET username='$username', job_title='$job_title', phone='$phone', adress='$adress' WHERE id='$id'";
mysqli_query(connect_bd(), $query);



// edit_information($_SESSION['user']['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);



// var_dump(get_all_users('*'));

// var_dump($_SESSION);
// $_SESSION = [];

?>

