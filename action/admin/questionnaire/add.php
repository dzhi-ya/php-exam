<?php
    $app->add('admin/questionnaire/add', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	            App::render('admin/questionnaire/add');
	        });
	        
	        $app->is('POST', function() use($app) {
	            $session_id = $_POST['session_id'];
				$payload = $_POST['payload'];
	            
	            $app->db->query("INSERT INTO asks(session_id, type, payload) VALUES(?i, ?i, ?s)", $session_id, 1, $payload);
	            
	            $app->redirect('admin/questionnaire/index&session_id='.$_POST['session_id'].'');
	        });    
        }            
    });    	 
	
?>