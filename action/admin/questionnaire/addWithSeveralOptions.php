<?php
    $app->add('admin/questionnaire/addWithSeveralOptions', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	            App::render('admin/questionnaire/addWithSeveralOptions');
	        });
	        
	        $app->is('POST', function() use($app) {
	            $session_id = $_POST['session_id'];
                $payload = $_POST['payload'];
                $variant_json = $_POST['variant_json'];

	            $app->db->query("INSERT INTO asks(session_id, type, payload) VALUES(?i, ?s, ?s)", $session_id, $variant_json, $payload);
	            
	            $app->redirect('admin/questionnaire/index&session_id='.$_POST['session_id'].'');
	        });    
        }            
    });    	 
	
?>