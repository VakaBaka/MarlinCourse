<?php 
session_start();
session_id();
require('function.php');

var_dump($_SESSION['user']);
var_dump($_POST);

// $id = $_SESSION['user']['id'];
// $username = $_POST['username'];
// $job_title = $_POST['job_title'];
// $phone = $_POST['phone'];
// $adress = $_POST['adress'];

// $query = "UPDATE registration SET username='$username', job_title='$job_title', phone='$phone', adress='$adress' WHERE id='$id'";
// mysqli_query(connect_bd(), $query);



// edit_information($_SESSION['user']['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

var_dump($_SESSION['user']['id']);
var_dump(get_user_by_id($_GET['id']));
$user = get_user_by_id($_GET['id']);
var_dump($user['email']);
var_dump($_SESSION['all_users']);

var_dump($_SESSION['user']['email']);
// $_SESSION = [];
var_dump($_FILES['image']);
// upload_avatar(35, $_FILES['image']['tmp_name'], $_FILES['image']['name']);

// $select = "SELECT image FROM registration WHERE id='35'";
// $avatar = mysqli_fetch_assoc(mysqli_query(connect_bd(), $select)) or mysqli_error(connect_bd());
// var_dump($avatar);
// mysqli_fetch_assoc($select);
?>

