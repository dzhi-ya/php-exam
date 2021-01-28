<?php
// Выход
	$app->add('logout', function() use($app) {
		if(App::isAuth()) {
			App::logout();

			$app->redirect('index');
		}
	});		
?>