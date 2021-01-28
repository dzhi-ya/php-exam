<?php
    $app->add('admin/session/delete', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	            if(isset($_GET['id'])) {
	                $id = intval($_GET['id']);     
					$app->db->query('DELETE FROM `session` WHERE id=?i', $id);
					$app->redirect('admin/session/index');
	            }
	        });
    	}
    });
?>