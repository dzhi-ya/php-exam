<?php
// Авторизация
	$app->add('login', function() use($app) {
		if(!App::isAuth()) {
			$app->is('GET', function() use($app) {
				App::render('login', [
					'title' => 'Опросник | Авторизация'
				]);
			});

			$app->is('POST', function() use($app) {
				$email = trim($_POST['email']);
				$password = md5(trim($_POST['password']));	

				if( ($result = $app->db->getRow('SELECT * FROM users WHERE email=?s AND password=?s', $email, $password)) ) {
					$app->login($result['name'], $result['id']);

					$app->redirect('index');

					return;
				} else {
					App::flashPush('login', 'Неправильный логин или пароль');
				}	

				App::render('login', [
					'title' => 'Опросник | Авторизация'
				]);						
			});
		}		
	});	
?>