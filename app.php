<?php
	session_start();

	// Библиотека для работы с бд
	require_once('lib/safemysql.class.php');
	// Главный класс приложения
	require_once('AppClass.php');

	define('ADMIN_LOGIN', 'admin@mail.ru');
	define('ADMIN_PASS_MD5', '827ccb0eea8a706c4c34a16891f84e7b');	

	if(isset($_GET['a'])) {
		$action = $_GET['a'];
	} else {
		$action = DEFAULT_ACTION;
	}

	$app = new App();

	// Массив с действиями
	$actions = [
		'index',
		'reg',
		'captcha',
		'login',
		'logout',
		'session',
		'admin/login',
		'admin/questionnaire/index',
		'admin/questionnaire/add',
		'admin/questionnaire/addWithSeveralOptions',
		'admin/questionnaire/edit',
		'admin/questionnaire/delete',
		'admin/session/index',
		'admin/session/add',
		'admin/session/delete'
	];	

	// Тут происходит загрузка действий
	foreach($actions as $name) {
		include("action/$name.php");
	}

	try {
		$app->run($action);
	} catch(HttpException $exp) {
		echo "Страница не найдена!";
	}