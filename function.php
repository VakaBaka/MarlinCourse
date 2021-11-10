<?php 


// Подключение к БД
function connect_pdo(){

	$pdo = new PDO('mysql:host=localhost;dbname=MarlinCourse;charset=utf8;', 'root', 'root');

	return $pdo;
} 

// Проверка на занятость email
function get_user_by_email(string $email) {

	$stmt = connect_pdo()->prepare("SELECT * FROM registration WHERE email=?");
	$stmt->execute([$email]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	return $user;
}	

// Добавление пользователя в БД
function add_user(string $email, string $password){

	$connection = connect_pdo();
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$mysql = "INSERT INTO registration(email, password, status) VALUES(?, ?, ?)";
	$connection->prepare($mysql)->execute([$email, $hash, 'user']);
	$id = $connection->lastInsertId();
	return $id;
}			

// Подготовка флэш сообщения
function set_flash_message(string $key, string $message) {

	$_SESSION[$key] = $message;
}

// Вывод сообщения на экран
function display_flash_message(string $key){

	echo $_SESSION[$key];
	unset($_SESSION[$key]);
}

// Перенаправление
function redirect(string $way){

	header("Location: $way");
	exit();
}

// Авторизация пользователя
function login(string $email, string $password){

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

// Устанавливаем статус
function set_online_status(int $id, string $status){

	$mysql = "UPDATE registration SET online_status=? WHERE id=?";
	$stmt = connect_pdo()->prepare($mysql);
	connect_pdo()->prepare($mysql)->execute([$status, $id]);
	get_user_by_id($id);
}

// Редактируем общую информацию
function edit_information(int $id, string $username, string $job_title, string $phone, string $adress){

	$mysql = "UPDATE registration SET username=?, job_title=?, phone=?, adress=? WHERE id=? ";
	connect_pdo()->prepare($mysql)->execute([$username, $job_title, $phone, $adress, $id]);
	get_user_by_id($id);
}

// загружаем аватар
// return null | string path
function upload_avatar(int $id, string $image__name){

	$image_name = addslashes($image__name);
	$mysql = "UPDATE registration SET image_name=? WHERE id=?";
	connect_pdo()->prepare($mysql)->execute([$image_name, $id]);
	get_user_by_id($id);
}

// Добавляем ссылки на соц сети
function add_social_links(int $id, string $vk, string $telegram, string $instagram){
	
	$mysql = "UPDATE registration SET vk=?, telegram=?, instagram=? WHERE id=?";
	connect_pdo()->prepare($mysql)->execute([$vk, $telegram, $instagram, $id]);
	get_user_by_id($id);
}

// Вывод всех пользователей из БД
function get_all_users() {
	
	$data = connect_pdo()->query("SELECT * FROM registration")->fetchAll(PDO::FETCH_ASSOC);
	foreach ($data as $row) {
    	$users[] = $row;
	}

	return $users;
}

// Получаем id пользователя
function get_user_by_id(int $id) {

	$stmt = connect_pdo()->prepare("SELECT * FROM registration WHERE id=?");
	$stmt->execute([$id]);
	$user = $stmt->fetch();
	return $user;
}

// Удалить пользователя
function delete_user(int $id){

	$mysql = "DELETE FROM registration WHERE id=?";
	$stmt = connect_pdo()->prepare($mysql);
	$stmt->execute([$id]);
}

// Редактирование авторизационных данных
function edit_credentials(int $id, string $email, string $password){
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$mysql = "UPDATE registration SET email=?, password=? WHERE id=?";
	connect_pdo()->prepare($mysql)->execute([$email, $hash, $id]);
}




?>