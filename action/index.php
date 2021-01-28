<?php	
	// Главная страница
	$app->add('index', function() use($app) {
		App::render('index', [
			'title' => 'Опросник | Главная'
		]);
	});
?>