<?php
	// Регистрация
	$app->add('reg', function() use($app) {
		if(!App::isAuth()) {
			$app->is('GET', function() use($app) {
				App::render('reg', [
					'title' => 'Опросник | Регистрация Эксперта'
				]);
			});

			$app->is('POST', function() use($app) {
				$name = trim($_POST['name']);
				$email = trim($_POST['email']);
				$telephone = trim($_POST['telephone']);
				$password = trim($_POST['password']);
				$repeat_password = trim($_POST['repeat_password']);

				if($password === $repeat_password) {
					if(preg_match("/^[a-zA-Z0-9]{8,20}$/", $password))  {
						if( !$app->db->getRow('SELECT * FROM users WHERE email=?s', $email) ) {
							$app->db->query('INSERT INTO users(name, email, password, telephone) VALUES(?s, ?s, ?s, ?s)', $name, $email, md5($password), $telephone);

							$result = $app->db->getRow('SELECT * FROM users WHERE email=?s', $email);

							$app->login($result['name'], $result['id']);

							$app->redirect('index');

							return;
						} else {
							App::flashPush('email', 'Пользователь с таким email уже есть');
						}
					} else {
						App::flashPush('email', 'Пароль может состоять только из латинских букв и цифр и должен быть длиной от 8 до 20 символов');
					}						
				} else {
					App::flashPush('email', 'Пароли должны совпадать');
				}


				App::render('reg', [
					'title' => 'Опросник | Регистрация Эксперта'
				]);
			});
		}
	});	
?>