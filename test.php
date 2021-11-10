<?php 
session_start();
// // session_id();
require('function.php');
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// print($_SERVER['DOCUMENT_ROOT']);

echo "<hr>";
echo mt_rand(1, 87);
echo "<hr>";



// // var_dump($_SESSION['user']['image_name']);
// // $image = upload_avatar($_SESSION['user']['id'], $_FILES['image']['name']);
// // var_dump($image);



var_dump($_POST);


// var_dump(add_user($_POST['email'], $_POST['password']));
// var_dump($_GET);
// // $id = $_SESSION['user']['id'];
// // $username = $_POST['username'];
// // $job_title = $_POST['job_title'];
// // $phone = $_POST['phone'];
// // $adress = $_POST['adress'];

// // $query = "UPDATE registration SET username='$username', job_title='$job_title', phone='$phone', adress='$adress' WHERE id='$id'";
// // mysqli_query(connect_bd(), $query);

// $user = get_user_by_id($_GET['id']) ?? $_SESSION['user'];
// var_dump($user);
// // edit_information($_SESSION['user']['id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['adress']);

// var_dump($_SESSION['user']['id']);
// // var_dump(get_user_by_id($_GET['id']));
// // $user = get_user_by_id($_GET['id']);
// var_dump($user['email']);
// var_dump($_SESSION['all_users']);

// var_dump($_SESSION['user']['email']);
// // $_SESSION = [];
// var_dump($_FILES['image']);
// // upload_avatar(35, $_FILES['image']['tmp_name'], $_FILES['image']['name']);

// // $select = "SELECT image FROM registration WHERE id='35'";
// // $avatar = mysqli_fetch_assoc(mysqli_query(connect_bd(), $select)) or mysqli_error(connect_bd());
// // var_dump($avatar);
// // mysqli_fetch_assoc($select);

// print_r(PDO::getAvailableDrivers());

// $pdo = new PDO('mysql:host=localhost;dbname=MarlinCourse;charset=utf8;', 'root', 'root');

// $mysql = 'SELECT * FROM registration';

// $statement = connect_pdo()->query($mysql);
// // $users = $statement->fetchAll(PDO::FETCH_ASSOC);

// $user = $statement->fetch(PDO::FETCH_ASSOC);

// foreach ($user as $key) {
// 	echo $key . '<br>';
// }

// var_dump($user);
// echo '<hr>';
// var_dump($users);

// $id = '24';
// $username = 'Alisa';
// $job_title = 'IT';
// $phone = '12345';
// $adress = 'City';
// $status = 'online';

// function connect_pdo(){
// 	$pdo = new PDO('mysql:host=localhost;dbname=MarlinCourse;charset=utf8;', 'root', 'root');

// 	return $pdo;
// }

// function get_all_users_pdo() {
	
// 	$data = connect_pdo()->query("SELECT * FROM registration")->fetchAll();
// 	// $users = [];
// 	foreach ($data as $row) {
//     	$users[] = $row;
// 	}

// 	return $users;
// }

// function update_users_pdo($id, $username, $job_title, $phone, $adress){
// 	$mysql = "UPDATE registration SET username=?, job_title=?, phone=?, adress=? WHERE id=$id ";
// 	$stmt = connect_pdo()->prepare($mysql);
// 	connect_pdo()->prepare($mysql)->execute([$username, $job_title, $phone, $adress]);

// }

// function set_online_status_pdo($id, $status){
	
// 	$mysql = "UPDATE registration SET online_status=? WHERE id=$id";
// 	$stmt = connect_bd()->prepare($mysql);
// 	connect_pdo()->prepare($mysql)->execute([$status]);
// 	// get_user_by_id($id);
// }

// function add_user_pdo($email, $password){
// 	$connection = connect_pdo();
// 	$hash = password_hash($password, PASSWORD_DEFAULT);
	
// 	$mysql = "INSERT INTO registration(email, password, status) VALUES(?, ?, ?)";
// 	$connection->prepare($mysql)->execute([$email, $hash, 'user']);
// 	$id = $connection->lastInsertId();
// 	return $id;
// }		
// function get_user_by_id_pdo($id) {
// 	// $query = "SELECT * FROM registration WHERE id=$id";
// 	// $user = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query)) ?? mysqli_error(connect_bd());

// 	$stmt = connect_pdo()->prepare("SELECT * FROM registration WHERE id=$id");
// 	$stmt->execute();
// 	$user = $stmt->fetch();
// 	return $user;
// }	

// $id = add_user_pdo('test1234@mail.ru', '123');
// var_dump($id);
// update_users_pdo($id, $username, $job_title, $phone, $adress);
// set_online_status_pdo($id, $status);
// var_dump(get_all_users_pdo());
// $users = get_all_users_pdo();
// var_dump($users)

// function get_user_by_email($email) {

// 	$stmt = connect_pdo()->prepare("SELECT * FROM registration WHERE email=?");
// 	$stmt->execute([$email]);
// 	$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 	return $user;
// }	
$user = get_user_by_email($_POST['email']);
var_dump($user);
?>

