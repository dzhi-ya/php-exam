<?php
    $app->add('admin/session/add', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	            App::render('admin/session/add');
	        });
	        
	        $app->is('POST', function() use($app) {
	            $name = $_POST['name'];
	            $url = sha1( time() . rand(1, 1000) );
                
	            $app->db->query("INSERT INTO `session`(name, url) VALUES(?s, ?s)", $name, $url);
	            
	            $app->redirect('admin/session/index');
	        });    
        }            
    });    	 