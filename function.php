<?php 


// Подключение к БД
function connect_bd(){
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'MarlinCourse';

	$link = mysqli_connect($host, $user, $pass, $name);	
	mysqli_query($link, "SET NAMES 'utf8'");
	return $link;
} 

// Проверка на занятость email
function get_user_by_email($email) {

	$query = "SELECT * FROM registration WHERE email='$email'";
	$user = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query)) ?? mysqli_error(connect_bd());

	return $user;
}	

// Добавление пользователя в БД
function add_user($email, $password){

	$query = "INSERT INTO registration SET email='$email', password='$password', status='user'";
	$user = mysqli_query(connect_bd(), $query) ?? mysqli_error(connect_bd());

	$id = mysqli_insert_id(connect_bd());

	return $id;
}			

// Подготовка флэш сообщения
function set_flash_message($key, $message) {
	$_SESSION[$key] = $message;
}

// Вывод сообщения на экран
function display_flash_message($key){
	echo $_SESSION[$key];
	unset($_SESSION[$key]);
}

// Перенаправление
function redirect($way){
	header("Location: $way");
	exit();
}

// Авторизация пользователя
function login($email, $password){
	$user = get_user_by_email($email);

	// Проверяем существует ли пользователь	
	if (!isset($user['email'])){
		// Пользователь не существует
		set_flash_message('danger', 'Пользователь не существует');
		redirect('page_login.php');
	}

	// Если да, проверяем совпадают ли пароли
	if (!password_verify($password, $user['password'])){
		// Пароли не совпадают
		set_flash_message('danger', 'Неверный пароль');
		redirect('page_login.php');
	}

	// Пользователь существует и пароли совпадают
	$_SESSION['user'] = $user;
	set_flash_message('succes', 'Авторизация успешна');
	redirect('users.php');
}

// add_user - user_id

// Устанавливаем статус
// Принимает пользовательское id
//return value null
// function set_status($status){
	
// }



// Редактируем общую информацию
// return value - boolean
function edit_information($id, $username, $job_title, $phone, $adress){
	$query = "UPDATE registration SET username='$username', job_title='$job_title', phone='$phone', adress='$adress' WHERE id='$id'";
	mysqli_query(connect_bd(), $query) ?? die(mysqli_error(connect_bd()));
	return true;
}

// загружаем аватар
// return null | string path
function upload_avatar($id, $image__name){

	$image_name = addslashes($image__name);
	$insert_image = "UPDATE registration SET image_name='$image_name' WHERE id=$id";
	mysqli_query(connect_bd(), $insert_image) or die(mysqli_error(connect_bd()));
}

// Добавляем ссылки на соц сети
// return null
function add_social_links($id, $vk, $telegram, $instagram){
	$query = "UPDATE registration SET vk='$vk', telegram='$telegram', instagram='$instagram' WHERE id='$id'";
	mysqli_query(connect_bd(), $query) ?? die(mysqli_error(connect_bd()));
}

// Вывод всех пользователей из БД
function get_all_users($id) {
	$query = "SELECT $id FROM registration";
	$result = mysqli_query(connect_bd(), $query) ?? die(mysqli_error(connect_bd()));
	for ($users = []; $row = mysqli_fetch_assoc($result); $users[] = $row);
	return $users;
}

// Получаем id пользователя
function get_user_by_id($id) {
	$query = "SELECT * FROM registration WHERE id='$id'";
	$user = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query)) ?? mysqli_error(connect_bd());

	return $user;
}





?>