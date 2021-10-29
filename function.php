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

// Проверка на действительность email
function get_user_email($email) {

	$query = "SELECT * FROM registration WHERE email='$email'";
	$email = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query)) ?? mysqli_error(connect_bd());

	return $email;
}	

// Добавление пользователя в БД
function add_user($email, $hash){

	$query = "INSERT INTO registration SET email='$email', password='$hash'";
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
	if (isset($_SESSION[$key])) {
		echo $_SESSION[$key];
		unset($_SESSION[$key]);
	} 
}

// Перенаправление
function redirect($way){
	header("Location: $way");
	exit();
}

// Авторизация пользователя
function login($email, $password){
	$query = "SELECT * FROM registration WHERE email='$email'";
	$user = mysqli_fetch_assoc(mysqli_query(connect_bd(), $query));

	if ($user['email']):	// Проверяем существует ли пользователь	
		// Если да, проверяем совпадают ли пароли
		if (password_verify($password, $user['password'])):		

			// Пароли совпадают
			$_SESSION['auth'] = true;
			redirect('users.php');

		else:	// Пароли не совпадают
			set_flash_message('wrong', 'Неверный пароль');
			$_SESSION['auth'] = false;
			redirect('page_login.php');
		endif;

	else:	// Пользователь не существует
		set_flash_message('not_exist', 'Пользователь не существует');
		$_SESSION['auth'] = false;
		redirect('login.php');
	endif;
}













?>