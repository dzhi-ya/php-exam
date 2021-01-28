<?php
	// Админка
    $app->add('admin/questionnaire/index', function() use($app) {
    	if(App::isAdmin()) {
			if(isset($_GET['session_id'])){
				App::render('admin/questionnaire/index', [
					'data' => $app->db->getAll("SELECT * from asks where session_id = " . $_GET['session_id'] . "")
				]);
			} else {
				App::render('admin/questionnaire/index', [
					'data' => $app->db->getAll("SELECT * from asks")
				]);
			}
   	 	}
    });	
?>