<?php
	// Админка
    $app->add('admin/session/index', function() use($app) {
    	if(App::isAdmin()) {
	        App::render('admin/session/index', [
				'data' => $app->db->getAll("SELECT * from `session`"),
				'asks' => $app->db->getAll("SELECT * from asks")
	        ]);
   	 	}
    });	
?>