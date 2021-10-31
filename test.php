<?php 
session_start();
require('function.php');
// var_dump($_SESSION['user']);

// $query = "SELECT * FROM registration";
// $user = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query)) ?? mysqli_error(connect_bd());

$query = "SELECT * FROM registration";
$result = mysqli_query(connect_bd(), $query) or die(mysqli_error(connect_bd()));
for ($users = []; $row = mysqli_fetch_assoc($result); $users[] = $row);
var_dump($users);

// foreach(get_all_users() as $user){
//     echo $user['id'] . '<br>';
// }

?>

