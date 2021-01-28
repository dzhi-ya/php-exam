<?php
	// Авторизация админа
	$app->add('admin/login', function() use($app) {
		if(!$app->isAdmin()) {
			$app->is('GET', function() use($app) {
				App::render('admin/login');
			});

			$app->is('POST', function() use($app) {
				$login = trim($_POST['login']);
				$password = md5(trim($_POST['password']));	

				if($login === ADMIN_LOGIN AND $password === ADMIN_PASS_MD5)	{
					$_SESSION['admin'] = true;

					$app->redirect('admin/session/index');

					return;
				} else {
					App::flashPush('admin', 'Логин или пароль неправильные');
				}		
				$app->redirect('admin/login');
			});						
		} else {
			$app->redirect('admin/session/index');
		}
	});	  
?>